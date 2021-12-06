<?php
class Bi_cus_items extends CI_Model {


    public $cus_item_id;
    public $cus_item_quantity;
    public $cus_unit_price;
    public $cus_discount;
    public $cus_invoice_id;


    public function insert_inv_item($inv_items){

        $this->cus_item_id = $inv_items['item_id']; 
        $this->cus_item_quantity = $inv_items['item_quantity']; 
        $this->cus_unit_price = $inv_items['unit_price']; 

        $this->cus_invoice_id =$inv_items['cus_invoice_id']; 
      

        $this->db->insert('cus_items', $this);
        return $this->db->insert_id();
    }

    
    public function update_inv_item($inv_items){
        $this->cus_item_id = $inv_items['item_id']; 
        $this->cus_item_quantity = $inv_items['item_quantity']; 
        $this->cus_unit_price = $inv_items['unit_price']; 
        $this->cus_invoice_id =$inv_items['cus_invoice_id']; 
      
        $this->db->where('cus_id', $inv_items['cus_id']);
        $status= $this->db->update('cus_items', $this);
         return $status;

}

 

    
    public function get_invoice_item($ID){
        $this->load->database();
        $query = $this->db-> query('SELECT cus_id,cus_item_id, IF(item_serial IS NULL, item_name,CONCAT(item_name ,"-[",item_serial,"]")) AS item_name, cus_item_quantity, cus_unit_price, cus_discount
                                    FROM pot.cus_items 
                                    JOIN item_s ON item_s.item_id = cus_items.cus_item_id                                
                                    WHERE cus_invoice_id='.$ID ); 
        $invoice_items=  $query->result_array();
        return $invoice_items; 
    }

    public function delete_row($id){
        $this->load->database();  
        $this -> db -> where('cus_id', $id);
        $status = $this -> db -> delete('cus_items');
        return $status; 
    }   

    public function insert_return_items(){
        
    }
}
