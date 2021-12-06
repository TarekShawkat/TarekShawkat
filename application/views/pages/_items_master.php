<?php
               
    $this->load->view('templates/header');
    if($index == 'show_list' ){
       $this->load->view('pages/control_panel');

        $this->load->view('pages/table',$items);    
      }
    
      elseif($index == 'show_inv_new'){
        $this->load->view('pages/item_new');
     
      }
      elseif($index == 'show_inv_edit'){
        $this->load->view('pages/item_view');
      
    
      }
      
    
    // if(!$status)
    // {
    //     $this->load->view('pages/item_new');
    // }
    // else{
    //     $this->load->view('pages/item_view');
    // }
  
    $this->load->view('templates/footer');
    
?>