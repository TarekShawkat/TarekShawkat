<?php
class Bi_vendor extends CI_Model {
        
        public $supplier_company; 
        public $supplier_name;         
        public $supplier_add; 
        public $supplier_phone; 

        public function get_all(){

                $this->load->database();
                $query = $this->db->get('supplier_s');
               
                return $query->result_array();
              
        }

        public function vendors_name(){

                $this->load->database();
                $query = $this->db->query('SELECT supplier_id, supplier_company FROM supplier_s'); 
                return $query->result_array();
        }

        public function insert_vendor($vendor_data){
                $this->load->database();
                $this->supplier_name    = $vendor_data['vendor_name']; 
                $this->supplier_company = $vendor_data['company_name'];
                $this->supplier_add     = $vendor_data['vendor_add'];
                $this->supplier_phone   = $vendor_data['vendor_phone'];

                $this->db->insert('supplier_s', $this);
                return $this->db->insert_id();
        }

        public function update_vendor($vendor_data,$vendor_id){

                $this->load->database();

                $this->supplier_name    = $vendor_data['vendor_name']; 
                $this->supplier_company = $vendor_data['company_name'];
                $this->supplier_add     = $vendor_data['vendor_add'];
                $this->supplier_phone   = $vendor_data['vendor_phone'];

                $this->db->where('supplier_id', $vendor_id);   

                $status= $this->db->update('supplier_s', $this);
                return $status;
                
        }

        public function get_vendor($vendor_id){

                $this->load->database();      

                $query = $this->db->get_where('supplier_s', array('supplier_id' => $vendor_id));
                $result_array=$query->result_array(); 
                return $result_array;
        }
}




        ?>