<?php
class Bi_refund_invoices extends CI_Model {


    public $refund_invoice_id;     
    public $refund_tax; 
    public $refund_total; 
    // public $refund_note; 
    
    function insert_refunded_invoice($refund_invoice){
                    $this->load->database();  
          
                    $this->refund_invoice_id= $refund_invoice['refund_invoice_id'];
                    // $this->refund_tax= $refund_invoice['refund_tax'];
                    $this->refund_total= $refund_invoice['refund_total'];                    
                    // $this->$refund_note= $refund_invoice['refund_note'];                    
                    $this->db->insert('refund_invoices', $this);
                    return $this->db->insert_id();
    }

    function get_refunded_invoice($id){
        $this->load->database();  
        $this ->db->where('refund_id', $id);
        $refunded_invoice = $this->db->get('refund_invoices');

        $array = $refunded_invoice->result_array();

        var_dump($array);
        return; 
        return $array[0]; 

    }
    
}