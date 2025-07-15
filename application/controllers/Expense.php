<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Expense extends MYT_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('Model_expense','expense');
   	}

	function index(){
		$data['title']   		= $this->lang->line('expense_module');
        // $data['emp_groups_arr'] = $this->lang->line('employee_group');
        $data['extra'] 			= null;
        $data['detail']  		= $this->load->view('system/expenses/add_new_expense',$data,true);
        $data['main_content'] 	= 'system/expenses/all_expenses';
        $this->load->view('system/include/layout',$data);
	}

	function fetch_expenses(){
  		$this->load->library('datatables');
        $this->datatables->select("expense_auto_id,expense_date,expense_reference,expense_category,branch_auto_id,expense_amount,expense_note,expense_attachment,expense_created_by");
        $this->datatables->from('tbl_expences');
        $this->datatables->where("branch_auto_id={$this->_['branch_auto_id']}");
        $this->datatables->where("company_auto_id={$this->_['company_auto_id']}");
        $this->datatables->add_column('expense_date','$1','print_date_format(expense_date)');
        $this->datatables->add_column('expense_amount','<span class="pull-right">$1</span>','to_local_currency(expense_amount)');
        $this->datatables->edit_column('action', '<center><span> 
        	<a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" onclick="delete_expense(\'$1\')"><i class="fa fa-times fa-1x color"></i></a>
        	<a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" onclick="edit_expense(\'$1\',\'$2\');"><i class="fa fa-pencil fa-1x color"></i></a>
			<a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" onclick="print_expense(\'$1\',\'$2\');"><i class="fa fa-print fa-1x color"></i></a>
        	</span></center>', 'expense_auto_id', 'expense_reference');
        echo $this->datatables->generate();

	}

	function save_expense(){
		$expense_auto_id = $this->input->post('expense_auto_id');
	    $this->form_validation->set_rules('expense_date','lang:common_date','trim|required');
	    $this->form_validation->set_rules('expense_reference','lang:common_reference','trim|required');
	    $this->form_validation->set_rules('expense_category','lang:common_category','trim|required');
	    $this->form_validation->set_rules('expense_amount','lang:common_amount','trim|required');
	    if($this->form_validation->run()==FALSE){
	        echo json_encode(array('status'=>0,'log_status'=>5,'title'=>$this->lang->line('expense_create'),'message'=> validation_errors()));
	    }else{
	  		echo json_encode($this->expense->save_expense()); 
	    }
	}

	function fetch_expense_print(){
        $print_data = $this->expense->fetch_expense_data();
        $data['company']       = $this->_['app'];
        $data['data']          = $print_data;
        $data['expense_print'] = $this->load->view('system/expenses/expense_print', $data,true);
        echo json_encode($data);
    }

	function fetch_expense_data(){
		echo json_encode($this->expense->fetch_expense_data());
	}

	function change_expense_status(){
		echo json_encode($this->expense->change_expense_status());
	}

	function fetch_all_expense_categories(){
		echo json_encode($this->expense->fetch_all_expense_categories());
	}

	function delete_expense(){
		echo json_encode($this->expense->delete_expense());
	}
}