<?php
  $this->load->view('templates/header');
  if($index == 'show_list'){
    $this->load->view('pages/control_panel');
    $this->load->view('pages/invoice_list',$sup_invoices);   
  }

  elseif($index == 'show_inv_new'){
    $this->load->view('pages/invoice_view');
 
  }
  elseif($index == 'show_inv_edit'){
    $this->load->view('pages/invoice_view',$invoice_id);
  

  }
  
  $this->load->view('templates/footer');
    
?>