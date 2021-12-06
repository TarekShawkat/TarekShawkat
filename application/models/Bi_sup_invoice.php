<?php
class Bi_sup_invoice extends CI_Model {
    
        public $invoice_num;       
        public $invoice_date;
        public $si_serial_num;
        public $p_item_quantity;
        public $si_item_total;
        public $si_tax_id;
        public $si_paid;
        public $si_supplier_id;
        public $is_active;
        public $invoice_status;
        public $invoice_payments_id;
  
        public function get_last_ten_entries(){
                $this->load->database();
                $query = $this->db->get('sup_invoice');               
                return $query->result();
              
        }

        public function get_all(){

                $this->load->database();
		$sup_invoices = $this->db->query('  SELECT si_id,si_serial_num,invoice_num,invoice_date,p_item_quantity,CAST(si_paid AS DECIMAL(12,2))AS si_paid,supplier_company AS si_supplier_id,si_note,invoice_status 
                                                    FROM sup_invoice 
                                                    JOIN supplier_s ON sup_invoice.si_supplier_id = supplier_s.supplier_id ORDER BY si_id DESC  '); 
      
                $array = $sup_invoices->result_array();                 
                return $array;
        }


        // should be moved to Bi-Vendors
        public function get_supplier(){
            $this->load->database();
            $query = $this->db->query(' SELECT supplier_id,supplier_name 
                                        FROM supplier_s');
            $supplier = $query->result_array();      
            return $supplier;
        }
        
        function save($invoice_details){
                $this->load->database();

                $this->invoice_num      =$invoice_details['vendor_reference'];      
                $this->invoice_date     =$invoice_details['invoice_date'];       
                $this->si_item_total    =$invoice_details['total_noTax'];
                $this->si_serial_num  = $this->getSerial_ticket()->barcode;
                $this->p_item_quantity    =$invoice_details['p_item_quantity'];
            
                $this->si_tax_id        =$invoice_details['Tax_amount'];
                $this->si_paid          =$invoice_details['total_withTax'];
                $this->si_supplier_id   =$invoice_details['vendor_id'];
                $this->invoice_status   =1 ;// status 1=>draft 2=>open 3=>paid  
           
                $this->db->insert('sup_invoice', $this);
                return $this->db->insert_id();
        }

        function get_invoice_details($ID){
                $this->load->database();
                $query = $this->db-> query('    SELECT          si_id, invoice_num,si_serial_num,p_item_quantity,si_item_total,si_tax_id,si_paid,invoice_date,invoice_status,si_supplier_id,supplier_company 
                                                FROM            pot.sup_invoice 
                                                LEFT JOIN       supplier_s ON sup_invoice.si_supplier_id = supplier_s.supplier_id 
                                                WHERE           si_id ='.$ID); 
                $invoice_details=  $query->result_array();
                return $invoice_details; 
        }


        function update_invoice($invoice_id,$invoice_details){
                $this->load->database();

                $this->invoice_num      =$invoice_details['vendor_reference'];      
                $this->invoice_date     =$invoice_details['invoice_date']; 
                $this->si_serial_num   =$invoice_details['serial_num'];        
                $this->p_item_quantity    =$invoice_details['p_item_quantity'];
                $this->si_item_total    =$invoice_details['total_noTax'];
                $this->si_tax_id        =$invoice_details['Tax_amount'];
                $this->si_paid          =$invoice_details['total_withTax'];
                $this->si_supplier_id   =$invoice_details['vendor_id'];
                $this->invoice_status   =2 ;// status 1=>draft 2=>open 3=>paid  
                $this->db->where('si_id', $invoice_id);
                // var_dump($this); return; 

               $status= $this->db->update('sup_invoice', $this);
                return $status;
                
              
        }

        function getSerial_ticket(){
                
                $this->load->database();
                $query = $this->db-> query("    SELECT CONCAT('PO','',cur_date,if(mcount<100,if(mcount<10,CONCAT('00',mcount),CONCAT('0',mcount)),mcount),if(dcount<10,CONCAT('0',dcount),dcount)) AS barcode 
                                                FROM (SELECT REPLACE( DATE_FORMAT(CURDATE(), '%y%m%d'),'-','') AS cur_date,(SELECT COUNT(*)+1 FROM pot.sup_invoice 
                                                WHERE MONTH(si_date_auto)= MONTH(current_date())) AS mcount,(SELECT COUNT(*)+1 FROM pot.sup_invoice WHERE DATE(si_date_auto)= current_date()) AS dcount)AS barcode_data; "); 

                $code_row= $query->row(); 
                return $code_row; 
        }

        function get_vendor_inv($ID){
                $this->load->database();
                $query = $this->db-> query("    SELECT si_id,invoice_date,si_serial_num,p_item_quantity,CAST(si_item_total AS DECIMAL(12,2))AS si_item_total ,CAST(si_paid AS DECIMAL(12,2))AS si_paid ,invoice_num,invoice_status 
                                                FROM pot.sup_invoice 
                                                WHERE si_supplier_id =".$ID); 
                $invoices= $query->result_array(); 
                return $invoices;
        }

   

       

               

               


}
?>
