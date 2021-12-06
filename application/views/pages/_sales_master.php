
<?php
  $this->load->view('templates/header');
  if($index == 'show_list'){
    $this->load->view('pages/control_panel');
    $this->load->view('pages/sales_list',$cus_invoices);   
  }

  elseif($index == 'show_inv_new'){
    $this->load->view('pages/sales_invoice');
 
  }
  elseif($index == 'show_inv_edit'){
    $this->load->view('pages/sales_invoice',$invoice_id);

  }
  
  $this->load->view('templates/footer');
    
?>