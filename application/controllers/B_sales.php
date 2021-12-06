<?php 
class B_sales extends ci_controller{

    public function index(){
		$this->load->helper('url');

        $data['title'] = base_url();

        $this->load->model('Bi_cus_invoice');  
        $data['index']='show_list'; 
        $data['cus_invoices'] = $this->Bi_cus_invoice->get_all(); 
        $this->load->view('pages/_sales_master',$data);
        return;

    }

    function is_available(){
        $this->load->database();
        $segment= $this->uri->segment(3,0);	        

        $item=$this->db->query("SELECT item_id,item_name,item_code FROM item_s WHERE item_code='".$segment."' LIMIT 1"); 
        $array	= $item->result_array();
   
        if(isset($array[0])){
            header('content-type: application/json; charset=utf-8');
            echo json_encode($array[0]); 
        }
        else{            
            header("HTTP/1.0 404 Not Found");        
        }
        
 
    }

    function get_product(){
        $this->load->database();
        $segment= $this->uri->segment(3,0);	
        

        $item=$this->db->query("SELECT* FROM item_s WHERE item_code='".$segment."'"); 
		
        $array	= $item->result_array();

		header('content-type: application/json; charset=utf-8');
		echo json_encode($array[0]); 
        // $this->load->view('pages/master_expenses',$data);
    }

    function get_product_data(){
        $_id= $this->uri->segment(3,0);	
        $this->load->model('Bi_products'); 
        $product_info = $this->Bi_products->get_item_det($_id); 

        header('content-type: application/json; charset=utf-8');
		echo json_encode($product_info[0]); 

    }

    function edit_invoice(){

        $segment=$this->uri->segment(3,0);
   
        if($segment ==='new')
        {
            $this->load->model('Bi_cus_invoice');  
            $ticket = $this->Bi_cus_invoice->getSerial_ticket(); 
            $data['barcode']= $ticket->barcode; 
            $data['index']='show_inv_new'; 
            $this->load->view('pages/_sales_master',$data);
        }
        elseif($segment==='edit')
        {
                $data['invoice_id']=$this->uri->segment(4,0);
                $data['index']='show_inv_edit';            
                $this->load->view('pages/_sales_master',$data);               
        }

        elseif($segment==='json_data'){
            $ID=$this->uri->segment(4,0);
            $this->load->model('Bi_cus_invoice');  
            $this->load->model('Bi_cus_items'); 
            $invoice_details = $this->Bi_cus_invoice->get_invoice_details($ID);
            $invoice_items = $this->Bi_cus_items->get_invoice_item($ID); 
            $invoice_details=$invoice_details[0]; 
            $invoice_details['items']=$invoice_items;
 
            header('content-type:application/json;charset=utf-8');

            echo json_encode($invoice_details); 
        }

        
    } 

    function getSerial_ticket($ticket){
        $this->load->helper('barcode');
        barcode($filepath="", $text=$ticket);    
    }

    function save_invoice(){

   
        $this->load->helper('url'); 
        $this->load->model('Bi_cus_invoice');  
        $this->load->model('Bi_cus_items'); 
            $invoice_details = $this->input->post() ; 
            $inv_items = $this->input->post() ; 
                unset($invoice_details['items']);
            $inv_items=$inv_items['items'];    
   
            $invoice_details['items_quantities'] = count($inv_items);      

        //create invoice first -> take invoce id and insert items with relation to invoice. 
        $cus_invoice_id=$this->Bi_cus_invoice->save($invoice_details);
       
 
        if($cus_invoice_id)// we can validate her 
        {         
            foreach ($inv_items as $key => $value) {
                $value['cus_invoice_id']=$cus_invoice_id; 
 
                $status = $this->Bi_cus_items->insert_inv_item($value); 
           
            }

             redirect(base_url('B_sales/edit_invoice/edit/'.$cus_invoice_id));

        }else{
            $message= 'save_invoice -> main '; 
            show_error($message,$status_code='500',$heading = 'Internal System Error Was Encountered, review code');
        }       
    }

    function update_invoice(){

        $this->load->helper('url'); 
        $this->load->model('Bi_cus_invoice');  
        $this->load->model('Bi_cus_items'); 
        $invoice_details = $this->input->post() ; 



        $inv_items = $this->input->post() ; 
        //     unset($invoice_details['items']);
        $inv_items=$inv_items['items']; 
          $invoice_details['ci_item_quan'] = count($inv_items); 

 
        //create invoice first -> take invoce id and insert items with relation to invoice. 
        $invoice_id=$this->uri->segment(3,0);

        $balance=$this->Bi_cus_items->get_invoice_item($invoice_id); 
        $new_items=array();
        $exist_items=array();
        $delete_items=array();
  
        foreach($inv_items as $k =>$v){
            foreach ($balance as $key => $value) {       
                if($v['item_id']===$value['cus_item_id']){
                    array_push($exist_items,$inv_items[$k]); 
                    unset($balance[$key]); 
                    unset($inv_items[$k]);
                    break;
                }               
            }         
        }
   
   
        foreach($inv_items as $k =>$v){
            array_push($new_items,$inv_items[$k]); 
        }
        
        foreach ($balance as $key => $value) {
            array_push($delete_items,$balance[$key]);                         
        }  
     

            $status= $this->Bi_cus_invoice->update_invoice($invoice_id,$invoice_details);
            if($status){
                // serach for items that has to be deleted 
                if(count($new_items)>0){
                    foreach ($new_items as $key => $value) {
                        $value['cus_invoice_id']=$invoice_id; 
                        $insert_resp = $this->Bi_cus_items->insert_inv_item($value); 
                        if(!$insert_resp)
                        {
                            $message= 'insert item -> main '; 
                            show_error($message,$status_code='500',$heading = 'Internal System Error Was Encountered, review code');
                        }
                    }
                }
                if(count($exist_items)>0){
                    foreach ($exist_items as $key => $value) {
                        $value['cus_invoice_id']=$invoice_id; 
                        $update_resp = $this->Bi_cus_items->update_inv_item($value); 
                        if(!$update_resp)
                        {
                            $message= 'update item -> main '; 
                            show_error($message,$status_code='500',$heading = 'Internal System Error Was Encountered, review code');
                        }
                    }
                }
                if(count($delete_items)>0){
                    foreach ($delete_items as $key => $value) {
                        $deleted_item = $this->Bi_cus_items->delete_row($value['cus_id']); 
                        if(!$deleted_item)
                        {
                            $message= 'delete item -> main '; 
                            show_error($message,$status_code='500',$heading = 'Internal System Error Was Encountered, review code');
                        }
                    }
                }
                redirect(base_url('B_sales/edit_invoice/edit/'.$invoice_id));
        }
    }
    
    function print_invoice($ID){
    
           $this->load->model('Bi_cus_invoice');  
            $this->load->model('Bi_cus_items'); 
            $invoice_details = $this->Bi_cus_invoice->get_invoice_details($ID);
            $invoice_items = $this->Bi_cus_items->get_invoice_item($ID); 
            $invoice_details=$invoice_details[0]; 
            $invoice_details['items']=$invoice_items;
            $data['invoice_details']=$invoice_details;


        $this->load->view('templates/header');

        $this->load->view('pages/invoice_print',$data);
        $this->load->view('templates/footer');

    }

    function generate_serial_number(){
        $Allowed_Charaters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
         echo substr(str_shuffle($Allowed_Charaters), 0, 13);
         str_shuffle();
         return;
 
    }

    function sales_refund(){

        // to refund, we need the invoice serial and the item that will be refunded. 
        // then we have to validate if the item and invoice serial are correct
        // the function should return boolen 
        // grand approve
        // send acknowledge 

        $this->load->view('templates/header');
        $this->load->view('pages/sales_refund_view');
        $this->load->view('templates/footer');
        // $this->load->helper('url'); 
        // $invoice_serial=$this->input->post();
        // $this->load->model('Bi_cus_invoice'); 
        
        //get product 

    }

    function invoiceBySerial($serial_number){

        // $incoming_serial=$this->input->post();
        $this->load->model('Bi_cus_invoice');  
        $this->load->model('Bi_cus_items'); 
        $invoice_info = $this->Bi_cus_invoice->invoiceBySerial($serial_number);
        if($invoice_info){
            $invoice_items = $this->Bi_cus_items->get_invoice_item($invoice_info[0]['ci_id']); 
            $invoice_info=$invoice_info[0]; 
            $invoice_info['items']=$invoice_items;
         }
         else{
            $message= 'invoice serial error '; 
                        show_error($message,$status_code='500',$heading = 'Internal System Error Was Encountered, review code');
         }

        header('content-type:application/json;charset=utf-8');

        echo json_encode($invoice_info); 

    }

    function refund_process(){
        
        $this->load->model('Bi_refund_invoices');  
        $this->load->model('Bi_items_refund');  

        $incoming_array = $this->input->post() ; 
        
        // var_dump($incoming_array);
        // return; 
        if($incoming_array){
            $inv_items=$incoming_array['items'];

            $refund_invoice['refund_invoice_id'] = $incoming_array['invoice_id'];  
            
            $refunded_invoice['refund_tax'] = $incoming_array['invoice_tax']; 
            $refund_invoice['refund_total'] = $incoming_array['invoice_total']; 
            // $refund_invoice['refund_note'] = $incoming_array['refund_note']; 
            $refunded_invoice_id= $this->Bi_refund_invoices->insert_refunded_invoice($refund_invoice);
    
            if(!$refunded_invoice_id){
                $message= 'Insert error '; 
                show_error($message,$status_code='500',$heading = 'Data Base Insert Error, review code');
                return; 
            }
           
                foreach ($inv_items as $key => $value) {  
            
                    $refunded_items['ref_invoice_id']           = $refunded_invoice_id;
                    $refunded_items['items_refund_item']        = $value['item_id'];
                    $refunded_items['items_refund_quantity']    = $value['item_quantity'];      
                    $refunded_items['items_refund_price']       = $value['item_price'];
                    $refunded_items['items_refund_tax']         = $value['item_tax'];
                    $refunded_items['items_refund_total']       = $value['total'];
        
                 

                    $response= $this->Bi_items_refund->insert_refund_item($refunded_items);
                    if(!$response){
                        $message= 'Insert error '; 
                        show_error($message,$status_code='500',$heading = 'Data Base Insert Error, review code');
                        return; 
                    }
                  
                    // echo $response; 
                }
                echo $refunded_invoice_id;
                $this->retrieve_refunded_invoice($refunded_invoice_id);
            
  
        }
        else{
            $message= 'POST error '; 
            show_error($message,$status_code='501',$heading = ' Insert Error, review code');
        }
    
   
        

    }

    function retrieve_refunded_invoice($invoice_id){
           
        $this->load->model('Bi_refund_invoices');  
        $this->load->model('Bi_items_refund');  
        $refunded_invoice=$this->Bi_refund_invoices->get_refunded_invoice($invoice_id); 

        if($refunded_invoice){
            $refunded_items=$this->Bi_items_refund->get_refunded_items( $refunded_invoice['refund_id']); 

            $refunded_invoice['items']=$refunded_items; 
        }
        

        // take the invoice id and retrive the items from the items refund database;
     
        var_dump($refunded_invoice);
        // var_dump($refunded_items);


    }

    function retrieve_ref_items_by_id(){
        
    }

   

}
