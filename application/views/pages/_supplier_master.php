<?php

    $this->load->view('templates/header');


        if($index == 'show_list'){       
            $this->load->view('pages/control_panel');         
            $this->load->view('pages/vendors_list',$vendors);    
        }

        elseif($index == 'vendor_new'){
            $this->load->view('pages/vendor_view');
        }

        elseif($index == 'vendor_edit'){
            $this->load->view('pages/vendor_view',$vendor_id);
        }
        elseif($index == 'vendor_view'){
            $this->load->view('pages/vendor_view',$vendor_id);
            if(isset($sup_invoices)){
                $this->load->view('pages/vendor_invoice_list',$sup_invoices);
              }
        
        }

    $this->load->view('templates/footer');


    
?>