<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Company extends MYT_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('Model_company','company');
   	}

	function index(){
		$data['title']   		= $this->lang->line('title');
        $data['extra'] 			= $this->company->fetch_company_data();
        // $data['detail']  		= $this->load->view('system/company/add_new_stores',$data,true);
        $data['main_content'] 	= 'system/company/all_companies';
        $this->load->view('system/include/layout',$data);
	}

	function save_company(){
		$this->form_validation->set_rules('company_name','Company name','trim|required');
		$this->form_validation->set_rules('company_currency_code','Currency Code phone','trim|required');
		$this->form_validation->set_rules('company_currency_decimal','Decimal','trim|required');
		$this->form_validation->set_rules('company_currency_symbol','Symbol','trim|required');
	    if($this->form_validation->run()==FALSE){
	        echo json_encode(array('status'=>0,'log_status'=>5,'title'=>$this->lang->line('title'),'message'=> validation_errors()));
	    }else{
	  		echo json_encode($this->company->save_company()); 
	    }
	}
}