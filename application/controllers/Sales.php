<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Sales extends MYT_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('Model_sales','sales');
   	}

	function index(){
		$data['title']   		= $this->lang->line('sales_module');
        $data['extra'] 			= null;
        $data['main_content'] 	= 'system/sales/all_sales';
        $this->load->view('system/include/layout',$data);
	}

	function fetch_sales(){
  		$this->load->library('datatables');
        $this->datatables->select("sales_auto_id,employee,waiter,customer,hold_type,check_in_time,check_out_time,(sales_item_discount+sales_discount) as sales_discount,sales_tax,sales_status,sales_total,sales_balance");
        $this->datatables->from('sales');
        $this->datatables->where("company_auto_id={$this->_['company_auto_id']}");
        $this->datatables->add_column('time','<span>$1 - $2</span>','check_in_time,check_out_time');
        $this->datatables->add_column('sales_balance','<span class="pull-right">$1</span>','to_local_currency(sales_balance)');
        $this->datatables->add_column('sales_total','<span class="pull-right">$1</span>','to_local_currency(sales_total)');
        $this->datatables->add_column('sales_tax','<span class="pull-right">$1</span>','to_local_currency(sales_tax)');
        $this->datatables->add_column('sales_discount','<span class="pull-right">$1</span>','to_local_currency(sales_discount)');
        $this->datatables->edit_column('hold_type', '$1','check_hold_type(hold_type)');
        $this->datatables->edit_column('status', '$1','sales_status(sales_status)');
        $this->datatables->edit_column('action', '<span class="pull-right"> 
        	<a class="btn btn-default btn-sm" onclick="add_payment(\'$1\');"><i class="fa fa-plus fa-1x color"></i></a>
        	<a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Print" onclick="sales_print(\'$1\',\'$2\');"><i class="fa fa-print fa-1x color"></i></a>
        	</span>', 'sales_auto_id, sales_auto_id');
        $this->datatables->edit_column('sales_auto_id', '<span class="label label-info">$1</span>','sales_auto_id');
        echo $this->datatables->generate();
	}
}