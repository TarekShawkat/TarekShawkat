<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');

		$this->load->model('Bi_cus_invoice');
		$data['inv_Month']= $this->Bi_cus_invoice->invoicesByMonth();
		$data['inv_Day']= $this->Bi_cus_invoice->invoicesByDay();
		$data['sales_Day']= $this->Bi_cus_invoice->SalesByDay();
		$data['sales_Month']= $this->Bi_cus_invoice->SalesByMonth();

		$this->load->view('pages/_main_master',$data);
		return;
	
	}
}
