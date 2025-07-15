<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pos extends MYT_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('Model_pos','pos');
   	}

	function index(){
		$data['title']   		= $this->lang->line('terminal').' - 1';
        $data['register_id']    = $this->session->userdata('register_auto_id');
        $data['extra'] 			= $this->pos->get_all_products();
        //$data['detail']  		= $this->load->view('system/expenses/add_new_expense',$data,true);
        $data['main_content'] 	= 'system/pos/pos_main_layout_1';
        $this->load->view('system/include/layout',$data);
	}

    function layout_2(){
        $data['title']          = $this->lang->line('terminal').' - 2';
        $data['register_id']    = $this->session->userdata('register_auto_id');
        $data['extra']          = $this->pos->get_all_products();
        //$data['detail']         = $this->load->view('system/expenses/add_new_expense',$data,true);
        $data['main_content']   = 'system/pos/pos_main_layout_2';
        $this->load->view('system/include/layout',$data);
    }

    function fetch_table_data(){
        $print_data = $this->pos->fetch_table_data();
        $data['company']       = $this->_['app'];
        $data['data']          = $print_data['data'];
        $data['sales']         = $print_data['sales'];
        $data['table_print']   = $this->load->view('system/pos/table_print', $data,true);
        $data['kitchen_print'] = $this->load->view('system/pos/kitchen_print', $data,true);
        $data['pos_print']     = $this->load->view('system/pos/pos_print', $data,true);
        echo json_encode($data);
    }

    function set_register(){
        $this->form_validation->set_rules('opening_blance','lang:opening_blance_required','trim'); 
        if($this->form_validation->run()==FALSE){
            echo json_encode(array('status'=>0,'log_status'=>5,'title'=>$this->lang->line('payment_voucher_create'),'message'=>validation_errors()));
        }else{
            echo json_encode($this->pos->set_register());
        }
    }

    function close_register(){
        $this->form_validation->set_rules('counted_cash','lang:counted_cash_required','trim|required'); 
        $this->form_validation->set_rules('counted_cheque','lang:counted_cheque_required','trim|required'); 
        $this->form_validation->set_rules('counted_credit_card','lang:counted_credit_card_required','trim|required'); 
        $this->form_validation->set_rules('counted_gift_card','lang:counted_gift_card_required','trim|required'); 
        if($this->form_validation->run()==FALSE){
            echo json_encode(array('status'=>0,'log_status'=>5,'title'=>$this->lang->line('close_register'),'message'=>validation_errors()));
        }else{
            echo json_encode($this->pos->close_register());
            
        }
    }

    function set_waiter(){
        echo json_encode($this->pos->set_waiter());
    }

    function set_customer(){
        echo json_encode($this->pos->set_customer());
    }

    function fetch_all_waiters(){
        echo json_encode($this->pos->fetch_all_waiters());
    }

    function fetch_all_customer(){
        echo json_encode($this->pos->fetch_all_customer());
    }

    function set_product_row(){
        echo json_encode($this->pos->set_product_row());
    }

    function fetch_register_data(){
        echo json_encode($this->pos->fetch_register_data());
    }

    function fetch_holds_data(){
        echo json_encode($this->pos->fetch_holds_data());
    }

    function set_hold(){
        echo json_encode($this->pos->set_hold());
    }

    function add_to_cart(){
        echo json_encode($this->pos->add_to_cart());
    }

    function delete_transaction(){
        echo json_encode($this->pos->delete_transaction());
    }

    function delete_all_transaction(){
        echo json_encode($this->pos->delete_all_transaction());
    }

    function void_transaction(){
        echo json_encode($this->pos->void_transaction());
    }

    function void_all_transaction(){
        echo json_encode($this->pos->void_all_transaction());
    }

    function return_transaction(){
        echo json_encode($this->pos->return_transaction());
    }

    function quick_pay(){
        echo json_encode($this->pos->quick_pay());
    }

    function fetch_register_total(){
        echo json_encode($this->pos->fetch_register_total());
    }
}