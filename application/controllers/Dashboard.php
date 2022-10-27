<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MYT_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('Model_dashboard','dashboard');
   	}

	function index(){
		$data['title']          = 'Dashboard';
		$data['product_arr']  	= $this->dashboard->fetch_product_details();
		$data['sale_arr']     	= $this->dashboard->fetch_sale_details();
		$data['employee_arr']  	= $this->dashboard->fetch_employee_details();
		$data['bar_arr'] 		= $this->dashboard->fetch_bar_details();
		$data['extra']          = null;
		$data['main_content']   = 'system/dashboard';
        $this->load->view('system/include/layout',$data);
	}

	function set_language($language){
		$this->session->set_userdata('language', $language);
		redirect("", "refresh");
	}

	function fetch_finance_year_period(){
		echo json_encode($this->form_drop->financial_period_drop($this->input->get_post('financial_year_auto_id'),1));
	}
}