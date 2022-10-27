<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Branch extends MYT_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('Model_branch','branch');
   	}

	function index(){
		$data['title']   		= $this->lang->line('branch_module');
        $data['extra'] 			= null;
        $data['timezone_arr'] 	= timezone_arr();
        $data['detail']  		= $this->load->view('system/branches/add_new_branch',$data,true);
        $data['main_content'] 	= 'system/branches/all_branches';
        $this->load->view('system/include/layout',$data);
	}

	function fetch_branches(){
  		$this->load->library('datatables');
        $this->datatables->select("branch_auto_id,branch_address,branch_postal_code,branch_city,branch_country,branch_mobile,branch_email,branch_status,company_auto_id");
        $this->datatables->from('tbl_branches');
        $this->datatables->where("company_auto_id={$this->_['company_auto_id']}");
        $this->datatables->edit_column('detail', '<h5>$1 $2</h5>','branch_city,branch_country');
        $this->datatables->edit_column('status', '<div class="material-switch pull-right"><input id="person_status_$1" onchange="change_branch_status($1,$2)" type="checkbox" $3 /><label for="person_status_$1" class="label-success"></label></div>', 'branch_auto_id,branch_status,checkbox_status(branch_status)');
        $this->datatables->edit_column('action', '<center><span><a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" onclick="edit_branch(\'$1\',\'$2\');"><i class="fa fa-pencil fa-1x color"></i></a> 
        	<a class="btn btn-default btn-sm" onclick="manage_tables(\'$1\',\'$2\');"><i class="fa fa-reorder fa-1x color"></i></a></span></center>', 'branch_auto_id, branch_city');
        echo $this->datatables->generate();

	}

	function save_branch(){
		$branch_auto_id = $this->input->post('branch_auto_id');
	    $this->form_validation->set_rules('branch_address','lang:common_address','trim|required');
	    $this->form_validation->set_rules('branch_city','lang:common_city','trim|required');
	    $this->form_validation->set_rules('branch_country','lang:common_country','trim|required');
	    $this->form_validation->set_rules('branch_mobile','lang:common_mobile','trim|required');
	    if($this->form_validation->run()==FALSE){
	        echo json_encode(array('status'=>0,'log_status'=>5,'title'=>$this->lang->line('branch_create'),'message'=> validation_errors()));
	    }else{
	  		echo json_encode($this->branch->save_branch()); 
	    }
	}

	function save_table(){
		$branch_auto_id = $this->input->post('branch_auto_id');
	    $this->form_validation->set_rules('table_name','Table Name','trim|required');
	    if($this->form_validation->run()==FALSE){
	        echo json_encode(array('status'=>0,'log_status'=>5,'title'=>$this->lang->line('branch_create'),'message'=> validation_errors()));
	    }else{
	  		echo json_encode($this->branch->save_table()); 
	    }
	}

	function fetch_branch_data(){
		echo json_encode($this->branch->fetch_branch_data());
	}

	function delete_branch_table(){
		echo json_encode($this->branch->delete_branch_table());
	}

	function change_branch_status(){
		echo json_encode($this->branch->change_branch_status());
	}

	function change_table_status(){
		echo json_encode($this->branch->change_table_status());
	}

	function fetch_tables_data(){
		echo json_encode($this->branch->fetch_tables_data());
	}
}