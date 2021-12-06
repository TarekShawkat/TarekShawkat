<?php 
class B_sales extends ci_controller{

    public function index()
	{
		$this->load->helper('url');

        $data['title'] = base_url();

        $this->load->model('Bi_cus_invoice');  
        $data['index']='show_list'; 
        $data['cus_invoices'] = $this->Bi_cus_invoice->get_all(); 
        $this->load->view('pages/_sales_master',$data);
        return;

    }

    function refund_process(){
        var_dump($_POST);
    }
}
?>