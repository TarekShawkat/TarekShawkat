<?php
class Bi_items_refund extends CI_Model {


    public $ref_invoice_id; 
    public $items_refund_item; 
    public $items_refund_quantity; 
    public $items_refund_tax;  
    public $items_refund_total;
    public $items_refund_price;
   
        function insert_refund_item($refunded_items){
                    $this->load->database();  
             
                
                    $this->ref_invoice_id= $refunded_items['ref_invoice_id'];                   
                    $this->items_refund_item= $refunded_items['items_refund_item'];
                    $this->items_refund_quantity= $refunded_items['items_refund_quantity'];
                    $this->items_refund_price= $refunded_items['items_refund_price'];
                    $this->items_refund_tax= $refunded_items['items_refund_tax'];              
                    $this->items_refund_total= $refunded_items['items_refund_total'];
          
                    
                    $this->db->insert('items_refund', $this);
                    return $this->db->insert_id();
        }

        function get_refunded_items($id){
              
                $this->load->database();  
                $this ->db->where('ref_invoice_id', $id);
                $refunded_invoice = $this->db->get('items_refund');
        
                $array = $refunded_invoice->result_array();
                return $array; 
        }
    }