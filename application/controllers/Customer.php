<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends MYT_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('Model_customer','customer');
   	}

	function index(){
		$data['title']   		= $this->lang->line('customer_module');
        $data['extra'] 			= null;
        $data['detail']  		= $this->load->view('system/hrm/customer/add_new_customer',$data,true);
        $data['main_content'] 	= 'system/hrm/customer/all_customers';
        $this->load->view('system/include/layout',$data);
	}

	function fetch_customers(){
		$this->load->library('datatables');
        $this->datatables->select("customer_auto_id,customer_name,customer_secondary_code,customer_address,customer_city,customer_email,customer_mobile,customer_discount,customer_note,is_active");
        $this->datatables->from('tbl_hrm_customers');
        $this->datatables->where("company_auto_id={$this->_['company_auto_id']}");
        $this->datatables->add_column('address', '$1', 'address(customer_address,customer_city)');
        $this->datatables->add_column('balance', '<span class="pull-right">0.00</span>', 'customer_auto_id');
        $this->datatables->add_column('status', '<div class="material-switch"><input id="person_status_$1" onchange="change_customer_status($1,$2)" type="checkbox" $3 /><label for="person_status_$1" class="label-success"></label></div>', 'customer_auto_id,is_active,checkbox_status(is_active)');
        $this->datatables->add_column('action', '<center><span><a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="Attachments" onclick="attachment_modal(\'$1\',\'$2\',\'EMP\');"><i class="fa fa-paperclip fa-1x color"></i></a> <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Profile" onclick="fetch_menu_rights(\'$1\',\'$2\');"><i class="fa fa-bars fa-1x color"></i></a> <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" onclick="edit_customer(\'$1\',\'$2\');"><i class="fa fa-pencil fa-1x color"></i></a></span></center>', 'customer_auto_id,customer_name');
        echo $this->datatables->generate('json', 'ISO-8859-1');
	}

	function save_customer(){
		$customer_auto_id = $this->input->post('customer_auto_id');
		$this->form_validation->set_rules('customer_name','lang:common_full_name','trim|required');
	    $this->form_validation->set_rules('customer_city','lang:customer_city','trim|required');
	    if($this->form_validation->run()==FALSE){
	        echo json_encode(array('status'=>0,'log_status'=>5,'title'=>$this->lang->line('customer_create'),'message'=> validation_errors()));
	    }else{
	  		echo json_encode($this->customer->save_customer()); 
	    }
	}

	function fetch_customer_data(){
		echo json_encode($this->customer->fetch_customer_data());
	}

	function change_customer_status(){
		echo json_encode($this->customer->change_customer_status());
	}
}