<?php
class Bi_cus_invoice extends CI_Model {


    public $ci_date;
    public $ci_serial_num;
    public $serial_ref; 
    public $ci_item_quan;
    public $ci_total;
    public $ci_tax_id;
    public $ci_due;
    public $ci_note;
    public $ci_customer_id;
    public $invoice_status; 


    public function get_all(){

        $this->load->database();
        $cus_invoices = $this->db->query('SELECT 
                                                ci_id,
                                                ci_date,
                                                ci_serial_num,
                                                serial_ref,
                                                ci_item_quan,
                                                CAST(ci_total AS DECIMAL (12 , 2 )) AS ci_total,
                                                CAST(ci_due AS DECIMAL (12 , 2 )) AS ci_due,
                                                ci_customer_id
                                            FROM
                                                cus_invoice
                                            ORDER BY ci_id DESC '); 

        $array = $cus_invoices->result_array();                 
        return $array;
    }

    function save($invoice_details){
        $this->load->database();

        $this->ci_date          =$invoice_details['invoice_date'];      
        $this->ci_serial_num    =$this->getSerial_ticket()->barcode;
        $this->ci_item_quan     =$invoice_details['items_quantities'];
        $this->ci_total         =$invoice_details['total_noTax'];
        $this->ci_tax_id        =$invoice_details['total_withTax'];
        $this->ci_due           =$invoice_details['total_withTax'];
        $this->ci_customer_id   =$invoice_details['customer_name'];
        $this->invoice_status = 0; 
   
        $this->db->insert('cus_invoice', $this);
        return $this->db->insert_id();
    }

    function get_invoice_details($ID){
        $this->load->database();
        $query = $this->db-> query('    SELECT 
                                            ci_date,
                                            ci_serial_num,
                                            ci_item_quan,
                                            ci_total,
                                            ci_tax_id,
                                            ci_due,
                                            ci_customer_id
                                        FROM
                                            pot.cus_invoice
                                        WHERE
                                            ci_id ='.$ID); 
        $invoice_details=  $query->result_array();
        return $invoice_details; 
    }

    function update_invoice($invoice_id,$invoice_details){
        $this->load->database();

        $this->ci_date          =$invoice_details['invoice_date'];      
        $this->ci_serial_num    =$invoice_details['serial_num'];       
        $this->ci_item_quan     =$invoice_details['ci_item_quan'];
        $this->ci_total         =$invoice_details['total_noTax'];
        $this->ci_tax_id        =$invoice_details['Tax_amount'];
        $this->ci_due           =$invoice_details['total_withTax'];
        $this->ci_customer_id   =$invoice_details['customer_name'];
        $this->db->where('ci_id', $invoice_id);
        // var_dump($this); return; 

       $status= $this->db->update('cus_invoice', $this);
        return $status;       
    }

    function getSerial_ticket(){
        $this->load->database();
        $query = $this->db-> query("SELECT 
                                        CONCAT('SI',
                                                '',
                                                cur_date,
                                                IF(mcount < 100,
                                                    IF(mcount < 10,
                                                        CONCAT('00', mcount),
                                                        CONCAT('0', mcount)),
                                                    mcount),
                                                IF(dcount < 10,
                                                    CONCAT('0', dcount),
                                                    dcount)) AS barcode
                                    FROM
                                        (SELECT 
                                            REPLACE(DATE_FORMAT(CURDATE(), '%y%m%d'), '-', '') AS cur_date,
                                                (SELECT 
                                                        COUNT(*) + 1
                                                    FROM
                                                        pot.cus_invoice
                                                    WHERE
                                                        MONTH(ci_date) = MONTH(CURRENT_DATE())) AS mcount,
                                                (SELECT 
                                                        COUNT(*) + 1
                                                    FROM
                                                        pot.cus_invoice
                                                    WHERE
                                                        ci_date = CURRENT_DATE()) AS dcount
                                        ) AS barcode_data;"); 

       $code_row= $query->row(); 
       return $code_row;        
    }

    function invoicesByMonth(){
        $this->load->database();
        $query = $this->db-> query("SELECT count(*) AS invoicesByMonth FROM pot.cus_invoice WHERE MONTH(ci_date) = MONTH(curdate()) ;"); 
        $invoicesByMonth= $query->row(); 
        return $invoicesByMonth;   

    }

    function invoicesByDay(){
        $this->load->database();
        $query = $this->db-> query("SELECT count(*) AS invoicesByDay FROM pot.cus_invoice WHERE DAY(ci_date) = DAY(curdate());"); 
        $invoicesByDay= $query->row(); 
        return $invoicesByDay;   

    }

    function SalesByDay(){
        $this->load->database();
        $query = $this->db-> query(" SELECT CAST(sum(ci_due) AS DECIMAL(12,2))AS SalesByDay FROM pot.cus_invoice WHERE DAY(ci_date)=DAY(curdate());"); 
        $SalesByDay= $query->row(); 
        return $SalesByDay;   

    }

    function SalesByMonth(){
        $this->load->database();
        $query = $this->db-> query(" SELECT CAST(sum(ci_due) AS DECIMAL(12,2))AS SalesByMonth FROM pot.cus_invoice WHERE MONTH(ci_date)=MONTH(curdate());"); 
        $SalesByMonth= $query->row(); 
        return $SalesByMonth;   

    }

    function invoiceBySerial($serial){
        $this->load->database();
        $query = $this->db-> query('    SELECT 
                                            ci_id,
                                            ci_date,
                                            ci_serial_num,
                                            ci_item_quan,
                                            ci_total,
                                            ci_tax_id,
                                            ci_due,
                                            ci_customer_id
                                        FROM
                                            pot.cus_invoice
                                        WHERE
                                        ci_serial_num ="'.$serial.'"'); 
        $invoice_details=  $query->result_array();
        return $invoice_details; 
    }


    function refund_invoice($serial,$invoice_details){
        $this->load->database();

        $this->ci_date          =$invoice_details['invoice_date'];      
        $this->ci_serial_num    =$this->getSerial_ticket()->barcode;
        $this->invoice_ref      = $serial; 
        $this->ci_item_quan     =$invoice_details['items_quantities'];
        $this->ci_total         =$invoice_details['total_noTax'];
        $this->ci_tax_id        =$invoice_details['total_withTax'];
        $this->ci_due           =$invoice_details['total_withTax'];
        $this->ci_customer_id   =$invoice_details['customer_name'];
        $this->invoice_status = 0; 
   
        $this->db->insert('cus_invoice', $this);
        return $this->db->insert_id();
    }

};
?>
