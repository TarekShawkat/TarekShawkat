<?php 
class B_purchase extends ci_controller{

    public function index(){
		$data['title'] = base_url();
        $this->load->model('Bi_sup_invoice');  
        $data['index']='show_list'; 
        $data['sup_invoices'] = $this->Bi_sup_invoice->get_all(); 	
        $this->load->view('pages/_invoice_master',$data);
        return;

    }

    function edit_invoice(){
        $segment=$this->uri->segment(3,0);
   
        if($segment ==='new'){
            $this->load->model('Bi_sup_invoice');  
            $ticket = $this->Bi_sup_invoice->getSerial_ticket(); 
            $data['barcode']= $ticket->barcode; 
            $data['index']='show_inv_new'; 
            $this->load->view('pages/_invoice_master',$data);
        }
        elseif($segment==='edit')
        {
            $id=$this->uri->segment(4,0);
                $data['index']='show_inv_edit'; 
                $data['invoice_id']=$id;    
             
                $this->load->view('pages/_invoice_master',$data);               
        }

        elseif($segment==='json_data'){
            $ID=$this->uri->segment(4,0);
            $this->load->model('Bi_sup_invoice');  
            $this->load->model('Bi_sup_items'); 
            $invoice_details = $this->Bi_sup_invoice->get_invoice_details($ID);
            $invoice_items = $this->Bi_sup_items->get_invoice_item($ID); 
            $invoice_details=$invoice_details[0]; 
            $invoice_details['items']=$invoice_items;
            // $data['invoice_details']=$invoice_details;
            // $data['invoice_items']=$invoice_items;      
    
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
        $this->load->model('Bi_sup_invoice');  
        $this->load->model('Bi_sup_items'); 
            $invoice_details = $this->input->post() ; 
            $inv_items = $this->input->post() ; 
                unset($invoice_details['items']);
            $inv_items=$inv_items['items'];    
   
            $invoice_details['p_item_quantity'] = count($inv_items); 
        //create invoice first -> take invoce id and insert items with relation to invoice. 
        $sup_invoice_id=$this->Bi_sup_invoice->save($invoice_details);
       
        // if($sup_invoice_id>0)// we can validate her 
        if($sup_invoice_id)// we can validate her 
        {         
            foreach ($inv_items as $key => $value) {
                $value['sup_invoice_id']=$sup_invoice_id; 
 
                $status = $this->Bi_sup_items->insert_inv_item($value); 
           
            }
             redirect(base_url('B_purchase/edit_invoice/edit/'.$sup_invoice_id));

        }else{
            $message= 'save_invoice -> main '; 
            show_error($message,$status_code='500',$heading = 'Internal System Error Was Encountered, review code');
        }       
    }

    function update_invoice(){

        $this->load->helper('url'); 
        $this->load->model('Bi_sup_invoice');  
        $this->load->model('Bi_sup_items'); 
        $invoice_details = $this->input->post() ; 
        // var_dump($invoice_details);
    
        $inv_items = $this->input->post() ; 
        //     unset($invoice_details['items']);
        $inv_items=$inv_items['items'];   
        $invoice_details['p_item_quantity'] = count($inv_items);    
        // var_dump($inv_items);
        //create invoice first -> take invoce id and insert items with relation to invoice. 
        $invoice_id=$this->uri->segment(3,0);

        $invoice_exist_items=$this->Bi_sup_items->get_invoice_item($invoice_id); 


        $arr_items_id=array();  
        foreach ($invoice_exist_items as $key => $value) {
                array_push($arr_items_id,$value['sup_id']); 

        }
         
        $new_items=array();
        $exist_items=array();
        $delete_items=array();
        $exist=''; 
        foreach($arr_items_id as $x =>$y){
            foreach($inv_items as $d => $f){             
                if($y ===$f['sup_id']){            
                    $exist=true;  
                    break ;           
                }
                else{
                    $exist=false; 
                }
            }        
            if($exist===false){
            array_push($delete_items,$y);              
            }   
        }

            foreach($inv_items as $d => $f){   
                if(empty($f['sup_id'])){
                    array_push($new_items,$inv_items[$d]); 
                }
                elseif(!empty($f['sup_id'])){
                    array_push($exist_items,$inv_items[$d]); 
                }
            }

            $status= $this->Bi_sup_invoice->update_invoice($invoice_id,$invoice_details);
            if($status){
                // serach for items that has to be deleted 
                if(count($new_items)>0){
                    foreach ($new_items as $key => $value) {
                        $value['sup_invoice_id']=$invoice_id; 
                        $insert_resp = $this->Bi_sup_items->insert_inv_item($value); 
                        if(!$insert_resp)
                        {
                            $message= 'insert item -> main '; 
                            show_error($message,$status_code='500',$heading = 'Internal System Error Was Encountered, review code');
                        }
                    }
                }
                if(count($exist_items)>0){
                    foreach ($exist_items as $key => $value) {
                        $value['sup_invoice_id']=$invoice_id; 
                        $update_resp = $this->Bi_sup_items->update_inv_item($value); 
                        if(!$update_resp)
                        {
                            $message= 'update item -> main '; 
                            show_error($message,$status_code='500',$heading = 'Internal System Error Was Encountered, review code');
                        }
                    }
                }
                if(count($delete_items)>0){
                    foreach ($delete_items as $key => $value) {
                        $deleted_item = $this->Bi_sup_items->delete_row($value); 
                        if(!$deleted_item)
                        {
                            $message= 'delete item -> main '; 
                            show_error($message,$status_code='500',$heading = 'Internal System Error Was Encountered, review code');
                        }
                    }
                }
                redirect(base_url('B_purchase/edit_invoice/edit/'.$invoice_id));
        }
    } 

    function purchase_refund(){
        
    }


}
