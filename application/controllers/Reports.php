<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends MYT_Controller {

	function __construct(){
        parent::__construct();
   	}

	function products_report(){
		$data['title']   		= "Products Report";
        $data['extra'] 			= NULL;
        $data['main_content'] 	= 'system/reports/products_report';
        $this->load->view('system/include/layout',$data);
	}

	function employees_report(){
		$data['title']   		= "Employees Report";
        $data['extra'] 			= NULL;
        $data['main_content'] 	= 'system/reports/employees_report';
        $this->load->view('system/include/layout',$data);
	}

	function suppliers_report(){
		$data['title']   		= "Suppliers Report";
        $data['extra'] 			= NULL;
        $data['main_content'] 	= 'system/reports/suppliers_report';
        $this->load->view('system/include/layout',$data);
	}

	function customers_report(){
		$data['title']   		= "Customers Report";
        $data['extra'] 			= NULL;
        $data['main_content'] 	= 'system/reports/customers_report';
        $this->load->view('system/include/layout',$data);
	}

	function sales_report(){
		$data['title']   		= "Sales Report";
        $data['extra'] 			= NULL;
        $data['main_content'] 	= 'system/reports/sales_report';
        $this->load->view('system/include/layout',$data);
	}

	function expenses_report(){
		$data['title']   		= "Expenses Report";
        $data['extra'] 			= NULL;
        $data['main_content'] 	= 'system/reports/expenses_report';
        $this->load->view('system/include/layout',$data);
	}
}