<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier extends MYT_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('Model_supplier','supplier');
   	}

	function index(){
		$data['title']   		= $this->lang->line('supplier_module');
        $data['extra'] 			= null;
        $data['detail']  		= $this->load->view('system/hrm/supplier/add_new_supplier',$data,true);
        $data['main_content'] 	= 'system/hrm/supplier/all_suppliers';
        $this->load->view('system/include/layout',$data);
	}

	function fetch_suppliers(){
		$this->load->library('datatables');
		$this->datatables->select("supplier_auto_id,supplier_company_name,supplier_secondary_code,supplier_email,supplier_mobile,supplier_fax,supplier_address,supplier_city,supplier_note,is_active");
		$this->datatables->from("tbl_hrm_suppliers");
		$this->datatables->where("company_auto_id={$this->_['company_auto_id']}");
		$this->datatables->edit_column('status', '<div class="material-switch pull-right"><input id="supplier_status_$1" onchange="change_supplier_status($1,$2)" type="checkbox" $3 /><label for="supplier_status_$1" class="label-success"></label></div>', 'supplier_auto_id,is_active,checkbox_status(is_active)');
        $this->datatables->edit_column('action', '<center><span><a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="Attachments" onclick="attachment_modal(\'$1\',\'$2\',\'EMP\');"><i class="fa fa-paperclip fa-1x color"></i></a> <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="Profile" onclick="fetch_menu_rights(\'$1\',\'$2\');"><i class="fa fa-bars fa-1x color"></i></a> <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit" onclick="edit_supplier(\'$1\',\'$2\');"><i class="fa fa-pencil fa-1x color"></i></a></span></center>', 'supplier_auto_id,supplier_company_name');
        echo $this->datatables->generate('json', 'ISO-8859-1');
	}

	function save_supplier(){
		$supplier_auto_id = $this->input->post('supplier_auto_id');
		$this->form_validation->set_rules('supplier_company_name','lang:supplier_company_name','trim|required');
	    $this->form_validation->set_rules('supplier_mobile','lang:supplier_mobile','trim|required');
	    if($this->form_validation->run()==FALSE){
	        echo json_encode(array('status'=>0,'log_status'=>5,'title'=>$this->lang->line('supplier_create'),'message'=> validation_errors()));
	    }else{
	  		echo json_encode($this->supplier->save_supplier()); 
	    }
	}

	function fetch_supplier_data(){
		echo json_encode($this->supplier->fetch_supplier_data());
	}

	function change_supplier_status(){
		echo json_encode($this->supplier->change_supplier_status());
	}
}