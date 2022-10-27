<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends MYT_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('Model_employee','employee');
   	}

	function index(){
		$data['title']   		= $this->lang->line('employee_module');
        $data['emp_groups_arr'] = $this->lang->line('employee_group');
        $data['extra'] 			= null;
        $data['detail']  		= $this->load->view('system/hrm/employee/add_new_employee',$data,true);
        $data['main_content'] 	= 'system/hrm/employee/all_employees';
        $this->load->view('system/include/layout',$data);
	}

	function fetch_employees(){
  		$this->load->library('datatables');
        $this->datatables->select("employee_auto_id,group_auto_id,group_name,employee_secondary_code,employee_name,employee_mobile,employee_login_email,employee_address,employee_city,employee_note,employee_img_path,employee_login_status,is_active");
        $this->datatables->from('tbl_hrm_employees');
        $this->datatables->where("company_auto_id={$this->_['company_auto_id']}");
        $this->datatables->edit_column('detail', '<h5>$1 <small>( $2 ) &nbsp;&nbsp;</small><br>$3 <br>Address : <small> $4</small> <br>Note : <small> $5</small></h5>','employee_name,employee_secondary_code,contact_details(employee_login_email,employee_mobile),address(employee_address,employee_city),employee_note');
        $this->datatables->edit_column('img','<img src="images/user_icon/$1" style="height:65px !important;" class="img-responsive img-thumbnail" id="img">', 'employee_img_path');
        $this->datatables->edit_column('login_status', '<div class="material-switch pull-right"><input id="login_status_$1" onchange="change_login_status($1,$2)" type="checkbox" $3/><label for="login_status_$1" class="label-success"></label></div>', 'employee_auto_id,employee_login_status,checkbox_status(employee_login_status)');
        $this->datatables->edit_column('status', '<div class="material-switch pull-right"><input id="person_status_$1" onchange="change_employee_status($1,$2)" type="checkbox" $3 /><label for="person_status_$1" class="label-success"></label></div>', 'employee_auto_id,is_active,checkbox_status(is_active)');
        $this->datatables->edit_column('action', '<center><span><a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="Attachments" onclick="attachment_modal(\'$1\',\'$2\',\'EMP\');"><i class="fa fa-paperclip fa-1x color"></i></a> <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="Profile" onclick="fetch_menu_rights(\'$1\',\'$2\');"><i class="fa fa-bars fa-1x color"></i></a> <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit" onclick="edit_employee(\'$1\',\'$2\');"><i class="fa fa-pencil fa-1x color"></i></a></span></center>', 'employee_auto_id, employee_name');
        echo $this->datatables->generate('json', 'ISO-8859-1');
	}

	function save_employee(){
		$employee_auto_id = $this->input->post('employee_auto_id');
		if ($employee_auto_id) {
			$this->form_validation->set_rules('employee_email','lang:employee_email','trim|required');
		}else{
			$this->form_validation->set_rules('employee_email','lang:employee_email','trim|required|is_unique[hrm_employees.employee_login_email]');
		}
	    $this->form_validation->set_rules('employee_mobile','lang:employee_mobile','trim|required');
	    $this->form_validation->set_rules('employee_address','lang:employee_address','trim|required');
	    $this->form_validation->set_rules('employee_city','lang:employee_city','trim|required');
	    $this->form_validation->set_rules('group_auto_id','lang:employee_employee_group','trim|required');
	    $this->form_validation->set_rules('group_name','lang:employee_employee_group','trim|required');
	    $this->form_validation->set_rules('login_password', 'lang:employee_password', 'trim');
		$this->form_validation->set_rules('login_password2', 'lang:employee_password', 'trim|matches[login_password]');
	    if($this->form_validation->run()==FALSE){
	        echo json_encode(array('status'=>0,'log_status'=>5,'title'=>$this->lang->line('employee_create'),'message'=> validation_errors()));
	    }else{
	  		echo json_encode($this->employee->save_employee()); 
	    }
	}

	function fetch_employee_data(){
		echo json_encode($this->employee->fetch_employee_data());
	}

	function change_employee_status(){
		echo json_encode($this->employee->change_employee_status());
	}

	function change_login_status(){
		echo json_encode($this->employee->change_login_status());
	}

	function profile(){
		$data['title']   		= $this->lang->line('employee_module');
        $data['extra'] 			= null;
        $data['detail']  		= $this->load->view('system/hrm/employee/person_profile',$data,true);
        $data['main_content'] 	= 'system/hrm/employee/profile';
        $this->load->view('system/include/layout',$data);
	}
}