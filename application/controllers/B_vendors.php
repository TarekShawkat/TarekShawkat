<?php 
class B_vendors extends ci_controller{


    public function index(){

		$this->load->helper('url');
            $data['title'] = base_url(); 
            $this->load->model('Bi_vendor'); 
    
            $data['index']='show_list'; 
            $data['vendors'] = $this->Bi_vendor->get_all(); 
        $this->load->view('pages/_supplier_master',$data);
        return;
    }

    public function edit_vendor(){

        $segment=$this->uri->segment(3,0);
        if($segment)
        {
            if($segment ==='new')
            {
                $data['index']='vendor_new'; 
                $this->load->view('pages/_supplier_master',$data);
            }
            elseif($segment==='edit')
            {
                $id=$this->uri->segment(4,0);
                if($id){
                    $data['index']='vendor_edit'; 
                    $data['vendor_id']=$id; 
                    $this->load->view('pages/_supplier_master',$data);
                }
                else{
                    $message= 'segment is not supplied '; 
                    show_error($message,$status_code='500',$heading = 'Internal System Error Was Encountered'); 
                }
            }
            elseif($segment==='view')
            {
                $id=$this->uri->segment(4,0);
                if($id){
                    $data['index']='vendor_view'; 
                    $data['vendor_id']=$id; 
                    $data['sup_invoices']=$this->get_vendor_invoices($id);  
              
                    $this->load->view('pages/_supplier_master',$data);
                }
                else{
                    $message= 'segment is not supplied '; 
                    show_error($message,$status_code='500',$heading = 'Internal System Error Was Encountered'); 
                }    
            }
            elseif($segment==='json_data'){
                $ID=$this->uri->segment(4,0);
                $this->load->model('Bi_vendor');  
                $vendor_info = $this->Bi_vendor->get_vendor($ID); 
                $vendor_info=$vendor_info[0]; 

                header('content-type:application/json;charset=utf-8');
                echo json_encode($vendor_info); 
            }
        }
        else
        {
            $message= 'segment status is not supplied '; 
            show_error($message,$status_code='500',$heading = 'Internal System Error Was Encountered');
        }
    }

    public function create_vendor(){
        $vendor_data=$this->input->post();
        $this->load->helper('url'); 
        $this->load->model('Bi_vendor');  
        $vendor_id=$this->Bi_vendor->insert_vendor($vendor_data);

        if($vendor_id){
        
            redirect(base_url('B_vendors/edit_vendor/edit/'.$vendor_id));
        }
        else{
            $message= 'model create error '; 
            show_error($message,$status_code='500',$heading = 'Internal System Error Was Encountered');
        }
    }

    public function update_vendor(){
      $vendor_id=$this->uri->segment(3,0);
      $vendor_data=$this->input->post();
      $this->load->model('Bi_vendor');  
      $response=$this->Bi_vendor->update_vendor($vendor_data,$vendor_id);

      if($response){
        redirect(base_url('B_vendors/edit_vendor/edit/'.$vendor_id));
      }
      else{
        $message= 'update vendor error '; 
        show_error($message,$status_code='500',$heading = 'Internal System Error Was Encountered');
      }



    }
    public function delete_vendor(){
        
    }

    public function get_vendors_list(){

        $this->load->model('Bi_vendor'); 
         $vendors= $this->Bi_vendor->vendors_name();

         header('content-type:application/json;charset=utf-8');
         echo json_encode($vendors);        
    }

    function get_vendor_invoices($ID){
        $this->load->model('Bi_sup_invoice'); 
        $sup_invoices = $this->Bi_sup_invoice->get_vendor_inv($ID);
        return $sup_invoices; 
    }

 

    

    
  
}