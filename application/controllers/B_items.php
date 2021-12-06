<?php 
class B_items extends ci_controller{

    
    public function index()
	{
		$this->load->model('Bi_products');
		$data['items']= $this->Bi_products->get_all();
        $status=false;
        $data['index']='show_list'; 
		$this->load->view('pages/_items_master',$data);
        
    }

    function edit_item()
    {         
        // 0 new
        if ($this->uri->segment(3,0)== 0)
        {     
            //new second time
            if($this->uri->segment(4,0)== 1)
            {
             
                $incoming_array = $this->input->post() ; 
                // var_dump($incoming_array);
                $this->load->model('Bi_products');
                $response = $this->Bi_products->insert_item($incoming_array);
                if(!$response)
                {
                    echo 'something went wrong';
                }
                else{redirect($this->index());} 
            }
             //new first time
            else{  
                $data['title'] = base_url();   
                $data["status"]=false; // means new item, empty form 
                $data['index']='show_inv_new'; 
                $this->load->view('pages/_items_master',$data);
            }     
        }
        // 1 view 
        elseif ($this->uri->segment(3,0)== 1)	
        {                 
            $_id= $this->uri->segment(4,0);
            $data['title'] = base_url();
            $this->load->model('Bi_products');
            $data['item'] = $this->Bi_products->get_item($_id); 
            $data["status"]=true; // means existing item,
            $data['index']='show_inv_edit'; 
            $this->load->view('pages/_items_master',$data);
        }
        //2 edit
        elseif ($this->uri->segment(3,0)== 2)	
        { 
            $_id= $this->uri->segment(4,0);
            $data['title'] = base_url();
            $this->load->model('Bi_products');
            $data['item'] = $this->Bi_products->get_item($_id); 
            $data["status"]=false; // means existing item, data hidden
            $data['index']='show_inv_edit'; 
            $data["item_id"]=$_id;
         
            $this->load->view('pages/_items_master',$data);       
        }

        //edit for second time
        elseif ($this->uri->segment(3,0)== 3)
        {
            $item_array = $this->input->post() ; 
      
            $_id= $this->uri->segment(4,0);
            $data['title'] = base_url();
            $this->load->model('Bi_products');
       
            $response = $this->Bi_products->update_item($_id, $item_array);
            if(!$response)
            {
                echo 'something went wrong';
            }
            else{redirect($this->index());} 
        }	    
        return; 
    }

    function delete($user_id){
        $this->load->model('Bi_products');
        $status = $this->Bi_products->delete_row($user_id);
        if($status)
        {
            redirect($this->index());
        }
        else{
            echo 'error: call the owner'; 
        } 
    }

    function _json(){
        header('content-type:application/json;charset=utf-8');

        echo json_encode($data); 
    }

    function get_items_list()
    {
        $this->load->model('Bi_products');
        $items = $this->Bi_products->get_items_all();
        header('content-type:application/json;charset=utf-8');

        echo json_encode($items); 

    }
}
