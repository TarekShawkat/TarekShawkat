<?php
class Bi_purchase extends CI_Model {

   // Depreciated 
  
        public $purhcase_id;
        public $purchase_inv;
        public $purchase_date;
        public $p_inv_tax;
        public $p_inv_total;
        public $p_inv_extra;

        
        

        public function get_entries()
        {
                $this->load->database();
                $query = $this->db->get('purchased');
               
                return $query->result();
              
        }

        public function get_all()
        {
                $this->load->database();

		$items	=$this->db->query('     SELECT item_id, item_name,item_quantity,item_price,item_discount,supplier_name AS item_supplier,item_car_type,item_serial,item_code 
                                                FROM item_s 
                                                join supplier_s on item_s.item_supplier = supplier_s.supplier_id'); 
                                                                               
                                                                            
                                                        

                $array = $items->result_array();
                
                return $array;
        }

        public function insert_entry()
        {
               

                $this->purchase_inv  =       $_POST['purchase_inv']; 
                $this->purchase_date =       $_POST['purchase_date'];
                $this->p_inv_tax     =       $_POST['p_inv_tax'];
                $this->p_inv_total   =       $_POST['p_inv_total'];
                $this->p_inv_extra   =       $_POST['p_inv_extra'];


            

    
                $this->db->insert('purchased', $this);
                return $this->db->insert_id();
        }


               

               


}
?>
