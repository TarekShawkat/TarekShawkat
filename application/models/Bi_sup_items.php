<?php
class Bi_sup_items extends CI_Model {
    
   

    public $sup_item_id;
    public $sup_item_quantity;
    public $sup_cost_price;
    public $sup_unit_price;
    public $sup_invoice_id;
    public $sup_inv_discount; 

    // public $lang = array(   'sup_id'=>'م',
    //                         'sup_item_id'=>'الصنف',
    //                         'sup_item_quantity'=>'الكميه',
    //                         'sup_cost_price'=>'سعر التكلفة',
    //                         'sup_unit_price'=>'سعر البيع',
    //                         'sup_invoice_id'=>'رقم الفاتوة'

    // ); 


    public function insert_inv_item($inv_items){
        // var_dump($inv_items); 
        $this->sup_item_id = $inv_items['item_id']; 
        $this->sup_item_quantity = $inv_items['item_quantity']; 
        $this->sup_cost_price = $inv_items['unit_price']; 
        // $this->$sup_unit_price = $inv_items['']; 
        // $this->sup_inv_discount = $inv_items['discount']; 
        $this->sup_invoice_id =$inv_items['sup_invoice_id']; 
      

        $this->db->insert('sup_items', $this);
        return $this->db->insert_id();
    }

    public function get_invoice_item($ID){
        $this->load->database();
        $query = $this->db-> query('SELECT sup_id, sup_item_id AS item_id, item_name, sup_item_quantity,sup_cost_price 
                                    FROM pot.sup_items 
                                    JOIN item_s ON item_s.item_id = sup_items.sup_item_id 
                                    WHERE sup_invoice_id='.$ID ); 
        $invoice_items=  $query->result_array();
        return $invoice_items; 
    }

    public function update_inv_item($inv_items){
                // var_dump($inv_items); 
                $this->sup_item_id = $inv_items['item_id']; 
                $this->sup_item_quantity = $inv_items['item_quantity']; 
                $this->sup_cost_price = $inv_items['unit_price']; 
                // $this->$sup_unit_price = $inv_items['']; 
                // $this->sup_inv_discount = $inv_items['discount']; 
                $this->sup_invoice_id =$inv_items['sup_invoice_id']; 
              
                $this->db->where('sup_id', $inv_items['sup_id']);
                $status= $this->db->update('sup_items', $this);
                 return $status;

    }

    public function delete_row($id){
        $this->load->database();  
        $this -> db -> where('sup_id', $id);
        $status = $this -> db -> delete('sup_items');
        return $status; 
    }   
    
}
