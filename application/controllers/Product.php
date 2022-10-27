<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends MYT_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('Model_product','product');
   	}

	function index(){
		$this->load->library('Form_drop');
		$data['title']   		= $this->lang->line('product_module');
        $data['extra'] 			= $this->form_drop->supplier_drop();
        $data['detail']  		= $this->load->view('system/products/add_new_product',$data,true);
        $data['main_content'] 	= 'system/products/all_products';
        $this->load->view('system/include/layout',$data);
	}

	function fetch_products(){
  		$this->load->library('datatables');
        $this->datatables->select("product_auto_id,product_code,product_name,product_category,product_cost,product_price,product_wholesale_price,product_photo,product_discount,product_options,product_status,product_pin");
        $this->datatables->from('products');
        $this->datatables->where("company_auto_id={$this->_['company_auto_id']}");
        $this->datatables->add_column('product_discount','<span class="pull-right">$1%</span>','product_discount');
        $this->datatables->add_column('product_cost','<span class="pull-right">$1</span>','to_local_currency(product_cost)');
        $this->datatables->add_column('product_price','<span class="pull-right">$1</span>','to_local_currency(product_price)');
        $this->datatables->add_column('product_wholesale_price','<span class="pull-right">$1</span>','to_local_currency(product_wholesale_price)');
        $this->datatables->edit_column('product_code', '<span class="label label-info">$1</span>','product_code');
        $this->datatables->edit_column('img','<img src="images/user_icon/$1" style="height:65px !important;" class="img-responsive img-thumbnail" id="img">', 'employee_img_path');
        $this->datatables->edit_column('pin', '<div class="material-switch pull-right"><input id="pin_status_$1" onchange="change_pin_status($1,$2)" type="checkbox" $3 /><label for="pin_status_$1" class="label-success"></label></div>', 'product_auto_id,product_pin,checkbox_status(product_pin)');
        $this->datatables->edit_column('status', '<div class="material-switch pull-right"><input id="product_status_$1" onchange="change_product_status($1,$2)" type="checkbox" $3 /><label for="product_status_$1" class="label-success"></label></div>', 'product_auto_id,product_status,checkbox_status(product_status)');
        $this->datatables->edit_column('action', '<span class="pull-right"> 
        	<a class="btn btn-default btn-sm" data-placement="top" title="Barcode" target="_blank" href="index.php/product/generate_barcodes/$1"><i class="fa fa-barcode fa-1x color"></i></a>
        	<a class="btn btn-default btn-sm" onclick="product_preview(\'$1\');"><i class="fa fa-eye fa-1x color"></i></a>
        	<a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" onclick="edit_product(\'$1\',\'$2\');"><i class="fa fa-pencil fa-1x color"></i></a>
        	</span>', 'product_auto_id, product_name');
        echo $this->datatables->generate();
	}

	function save_product(){
		$product_auto_id = $this->input->post('product_auto_id');
	    $this->form_validation->set_rules('product_code','lang:common_code','trim|required');
	    $this->form_validation->set_rules('product_name','lang:product_name','trim|required');
	    $this->form_validation->set_rules('product_category','lang:product_category','trim|required');
	    $this->form_validation->set_rules('product_cost','lang:common_cost','trim|required');
	    $this->form_validation->set_rules('product_price','lang:common_price','trim|required');
	    if($this->form_validation->run()==FALSE){
	        echo json_encode(array('status'=>0,'log_status'=>5,'title'=>$this->lang->line('product_create'),'message'=> validation_errors()));
	    }else{
		  	echo json_encode($this->product->save_product());
	    }
	}

	function fetch_product_data(){
		echo json_encode($this->product->fetch_product_data());
	}

	function change_product_status(){
		echo json_encode($this->product->change_product_status());
	}

	function change_pin_status(){
		echo json_encode($this->product->change_pin_status());
	}

	function change_login_status(){
		echo json_encode($this->product->change_login_status());
	}

	function fetch_all_categories(){
		echo json_encode($this->product->fetch_all_categories());
	}

	function new_code(){
		echo json_encode($this->product->new_code());
	}

	function excel(){
		$header_row = $this->_excel_get_header_row();
		$content = array_to_csv(array($header_row));
		force_download('product_import.csv', $content,'text/csv');
	}

	function excel_export() {
		$data = $this->product->fetch_all_product();
		$header_row[] = $this->lang->line('product_auto_id');		
		$header_row[] = $this->_excel_get_header_row();
		$rows[] = $header_row;
		foreach ($data as $r) 
		{
			$row = array();
			$row[] = $r['product_auto_id'];
			$row[] = $this->lang->line("product_group_arr")[$r['product_type_id']];
			$row[] = $r['product_code'];
			$row[] = $r['product_name'];
			$row[] = $r['product_category'];
			$row[] = $r['product_cost'];
			$row[] = $r['product_price'];
			$row[] = $r['product_wholesale_price'];
			//$row[] = $r['product_photo'];
			//$row[] = $r['product_color'];
			//$row[] = $r['product_supplier_auto_id'];
			$row[] = $r['product_reorder_level'];
			$row[] = $r['product_options'];
			$row[] = ($r['product_status']==2 ? 'active' : 'deactive');
			//$row[] = $r['company_auto_id'];	
			$rows[] = $row;
		}

		$content = array_to_csv($rows);
		force_download('product_import.csv', $content,'text/csv');
		exit;
	}

	function _excel_get_header_row(){
		$header_row = array();
		$header_row[] = $this->lang->line('product_type_id');
		$header_row[] = $this->lang->line('product_code');
		$header_row[] = $this->lang->line('product_name');
		$header_row[] = $this->lang->line('product_category');
		$header_row[] = $this->lang->line('product_cost');
		$header_row[] = $this->lang->line('selling_price');
		$header_row[] = $this->lang->line('selling_wholesale_price');
		//$header_row[] = $this->lang->line('product_tax');
		//$header_row[] = $this->lang->line('product_photo');
		//$header_row[] = $this->lang->line('product_color');
		//$header_row[] = $this->lang->line('product_supplier_auto_id');
		$header_row[] = $this->lang->line('product_reorder_level');
		$header_row[] = $this->lang->line('product_options');
		$header_row[] = $this->lang->line('product_status');
		//$header_row[] = $this->lang->line('company_auto_id');
		return $header_row;
	}

	function do_excel_import(){
		echo json_encode($this->product->do_excel_import());
	}

	function generate_barcodes($item_ids){
		$data['items'] = $this->product->get_items_barcode_data($item_ids);
		$data['scale'] = 2;
		$this->load->view("system/products/barcode_sheet", $data);
	}

	function generate_barcode_labels($item_ids){
		$data['items'] = $this->product->get_items_barcode_data($item_ids);
		$data['scale'] = 1;
		$this->load->view("system/products/barcode_labels", $data);
	}
}