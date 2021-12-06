<?php
class Bi_products extends CI_Model {

 
        
        public $item_name;
        public $item_quantity;
        public $item_unit_price;
        public $part_number;
        public $item_serial;
        public $item_discount_id;
        public $profit_margin;
        public $item_prop_id;
        // public $lang = array (  'item_id'=>'م',
        //                         'item_name'=>'الصنف',
        //                         'item_quantity'=>'الكميه',
        //                         'item_unit_price'=>'السعر',
        //                         'part_number'=>'كود الصنف',
        //                         'item_serial'=>'سيريال',
        //                         'item_discount_id'=>'خصم',
        //                         'item_prop_id'=>'مواصفات'

        // ); 


        public function get_all()
        {
                $this->load->database();            
		$items =$this->db->query('      SELECT          item_id, item_name,item_quantity,CAST(item_unit_price AS DECIMAL(12,2))AS item_unit_price ,item_discount_id,part_number 
                                                FROM            item_s 
                                                ORDER BY        item_id DESC;
                                        '); 
                $array = $items->result_array();
                return $array;
        }

        public function get_item($_id)
        {
                $this->load->database();
                $query =$this->db->query('      SELECT  item_name,item_quantity,item_unit_price,item_discount_id,part_number, item_serial, profit_margin, item_cost_price 
                                                FROM    item_s 
                                                WHERE   item_id='.$_id
                                        ); 
                return $query->result_array();        
        }

        public function insert_item($data)
        {
                $this->load->database();                 
                $this->item_name        =       $data['item_name'];
                $this->item_quantity    =       $data['item_quantity'];
                $this->item_unit_price  =       $data['item_unit_price']; 
                $this->item_cost_price  =       $data['item_cost_price'];                  
                $this->part_number      =       $data['part_number'];
                $this->item_serial      =       $data['item_serial'];
                $this->profit_margin    =       $data['profit_margin'];
                $this->item_discount_id =       $data['item_discount_id'];
                $response = $this->db->insert('item_s', $this);
                if($response)
                {
                return $this->db->insert_id();           
                }
                else{
                        return $response; 
                }
        }

        public function update_item($id, $data)
        {
                $this->item_name        =       $data['item_name'];
                $this->item_quantity    =       $data['item_quantity'];
                $this->item_unit_price  =       $data['item_unit_price'];       
                $this->item_cost_price  =       $data['item_cost_price'];             
                $this->part_number      =       $data['part_number'];
                $this->item_serial      =       $data['item_serial'];
                $this->item_discount_id =       $data['item_discount_id'];
                $this->profit_margin    =       $data['profit_margin'];
                $this->load->database();  
                $this->db->where('item_id', $id);
                $response = $this->db->update('item_s', $this);
                return $response; 
        }

        public function delete_row($id){
                $this->load->database();  
                $this -> db -> where('item_id', $id);
                $status = $this -> db -> delete('item_s');
                return $status; 
            }   
            
        public function get_items_all()
        {
                $this->load->database(); 
                $query =$this->db->query(' SELECT item_id,IF(item_serial IS NULL, item_name,CONCAT(item_name ,"-[",item_serial,"]")) AS item_name FROM item_s');  
                return $query->result_array();     

        }

        public function get_item_det($_id)
        {
                $this->load->database();
                $query =$this->db->query('      SELECT  IF(item_serial IS NULL, item_name,CONCAT(item_name ,"-[",item_serial,"]")) AS item_name,item_quantity,REPLACE(FORMAT(item_unit_price, 2),",","") AS item_unit_price,item_discount_id,part_number, item_serial
                                                FROM    item_s 
                                                WHERE   item_id='.$_id
                                        ); 
                return $query->result_array();        
        }

        
}
?>
