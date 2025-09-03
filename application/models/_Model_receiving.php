<?php 
class Model_receiving extends CI_Model{

    function get_all_products(){
        $data = array();
        $this->db->select("product_category");
        $this->db->from("products");
        $this->db->order_by("product_category","asc"); 
        $this->db->group_by("product_category");
        $this->db->where("product_status",2);
        //$this->db->where("product_type_id",1);
        $this->db->where("company_auto_id",$this->_['company_auto_id']);
        $data['category'] = $this->db->get()->result_array();

        $this->db->select("*");
        $this->db->from("products");
        // $this->db->where("product_type_id",1);
        $this->db->where("product_status",2);
        $this->db->order_by("product_code","asc"); 
        $this->db->where("company_auto_id",$this->_['company_auto_id']);
        $products_arr = $this->db->get()->result_array();
        foreach ($products_arr as $key => $value) {
            $product_price = number_format($value['product_cost'],2);
            $data['products'][$value['product_code']]['product_auto_id'] = $value['product_auto_id'];
            $data['products'][$value['product_code']]['product_type_id'] = $value['product_type_id'];
            $data['products'][$value['product_code']]['product_name'] = $value['product_name'];
            $data['products'][$value['product_code']]['product_category'] = $value['product_category'];
            $data['products'][$value['product_code']]['product_discount'] = $value['product_discount'];
            $data['products'][$value['product_code']]['product_price'] = $product_price;
            $data['products'][$value['product_code']]['wholesale_price'] = $value['product_wholesale_price'];
            $data['products'][$value['product_code']]['amount'] = $value['product_price'];
            $data['products'][$value['product_code']]['product_cost'] = $value['product_cost'];
            $data['products'][$value['product_code']]['product_photo'] = $value['product_photo'];
            $data['products'][$value['product_code']]['product_options'] = $value['product_options'];
            $data['products'][$value['product_code']]['product_pin'] = $value['product_pin'];
            $data['products'][$value['product_code']]['product_sales_count'] = $value['product_sales_count'];
            if ($value['product_pin']==2) {
                $data['products_pin'][$value['product_code']]['product_auto_id'] = $value['product_auto_id'];
                $data['products_pin'][$value['product_code']]['product_type_id'] = $value['product_type_id'];
                $data['products_pin'][$value['product_code']]['product_name'] = $value['product_name'];
                $data['products_pin'][$value['product_code']]['product_category'] = $value['product_category'];
                $data['products_pin'][$value['product_code']]['product_discount'] = $value['product_discount'];
                $data['products_pin'][$value['product_code']]['product_price'] = $product_price;
                $data['products_pin'][$value['product_code']]['wholesale_price'] = $value['product_wholesale_price'];
                $data['products_pin'][$value['product_code']]['amount'] = $value['product_price'];
                $data['products_pin'][$value['product_code']]['product_cost'] = $value['product_cost'];
                $data['products_pin'][$value['product_code']]['product_photo'] = $value['product_photo'];
                $data['products_pin'][$value['product_code']]['product_options'] = $value['product_options'];
                $data['products_pin'][$value['product_code']]['product_pin'] = $value['product_pin'];
                $data['products_pin'][$value['product_code']]['product_sales_count'] = $value['product_sales_count'];
            }
            
            $data['search_arr'][$key]['data'] = $value['product_code'];
            $data['search_arr'][$key]['value']= '['.$value['product_code'].'] '.$value['product_name'].' | '.$product_price.' | '.$value['product_category'];
        }
        return $data;
    }

    function fetch_register_data(){
        $data = array();
        $this->db->select("*");
        $this->db->from("registers");
        $this->db->where("register_status",2);
        $this->db->where("employee_auto_id",$this->_['employee_auto_id']);
        $this->db->where("branch_auto_id",$this->_['branch_auto_id']);
        $this->db->where("company_auto_id",$this->_['company_auto_id']);
        $data['register'] = $this->db->get()->row_array();
        $session_data = array('register_auto_id'=> $data['register']['register_auto_id']);
        $this->session->set_userdata($session_data);
        $data['register']['o_b'] = to_currency($data['register']['opening_blance'],$this->_['app']['company_currency_symbol'],$this->_['app']['company_currency_decimal']);
        $data['register']['date'] = print_date_format($data['register']['register_date']).' '.date("H:s", strtotime($data['register']['register_date']));
        return $data;
    }

    // function set_register(){
    //     $register_auto_id = trim($this->input->get_post('register_auto_id'));
    //     $this->db->trans_begin();
    //     $type = $this->lang->line('created');
    //     $register_data = $this->input->post(NULL, TRUE);
    //     $register_data['register_date']    = date('Y-m-d h:i:s');
    //     $register_data['register_status']  = 2;
    //     $register_data['employee_auto_id'] = $this->_['employee_auto_id'];
    //     $register_data['branch_auto_id']   = $this->_['branch_auto_id'];
    //     $register_data['company_auto_id']  = $this->_['company_auto_id'];

    //     if ($register_auto_id) {
    //         $this->db->where('register_auto_id', $register_auto_id);
    //         $this->db->update('registers', $register_data);
    //         $last_id = $register_auto_id;
    //         $type=$this->lang->line('updated'); 
    //     }else{
    //         $register_data['opened_by']         = $this->_['employee_name'];
    //         $this->db->insert('registers', $register_data); 
    //         $last_id = $this->db->insert_id();
    //         $session_data = array('register_auto_id'=> $last_id);
    //         $this->session->set_userdata($session_data);  
    //     }

    //     $this->db->trans_complete();
    //     if($this->db->trans_status()===0){
    //         $this->db->trans_rollback();
    //         $log = $this->logger->log_event(0,$this->lang->line('product_module'),5,$register_data['product_name'].$type.$this->lang->line('failed'),$this->lang->line('product_module'),$last_id);
    //     }else{
    //         $this->db->trans_commit();
    //         $log = $this->logger->log_event(1,$this->lang->line('product_module'),2,$register_data['product_name'].$type.$this->lang->line('successfully'),$this->lang->line('product_module'),$last_id);            
    //     }
    //     return $log;
    // }

    function set_product_row(){
        $transaction_auto_id = trim($this->input->get_post('transaction_auto_id'));
        $this->db->trans_begin();
        $type =$this->lang->line('updated');
        $transaction_data = $this->input->post(NULL, TRUE);
        $transaction_data['discount'] = round( ($transaction_data['amount'] / 100) * $transaction_data['discount_percentage'], 2);
        $transaction_data['sub_amount'] = ($transaction_data['amount']*$transaction_data['qty']);
        $transaction_data['total_discount'] = ($transaction_data['discount']*$transaction_data['qty']);
        $transaction_data['net_amount'] = ($transaction_data['sub_amount']-$transaction_data['total_discount']);
        $this->db->where('transaction_auto_id', $transaction_auto_id);
        $this->db->update('transactions', $transaction_data);
        $last_id = $transaction_auto_id;
        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = $this->logger->log_event(0,$this->lang->line('product_module'),5,$type.$this->lang->line('failed'),$this->lang->line('product_module'),$last_id);
        }else{
            $this->db->trans_commit();
            $log = $this->logger->log_event(1,$this->lang->line('product_module'),2,$type.$this->lang->line('successfully'),$this->lang->line('product_module'),$last_id);            
        }
        return $transaction_data['net_amount'];
    }

    function add_to_cart(){
        $transaction_auto_id = trim($this->input->get_post('transaction_auto_id'));
        $this->db->trans_begin();
        $type = $this->lang->line('created');
        $transaction_data = $this->input->post(NULL, TRUE);
        $transaction_data['discount'] = round( ($transaction_data['amount'] / 100) * $transaction_data['discount_percentage'], 2);
        $transaction_data['sub_amount'] = ($transaction_data['amount']*$transaction_data['qty']);
        $transaction_data['total_discount'] = ($transaction_data['discount']*$transaction_data['qty']);
        $transaction_data['net_amount'] = ($transaction_data['sub_amount']-$transaction_data['total_discount']);
        $transaction_data['transaction_date'] = date('Y-m-d');
        $transaction_data['register_auto_id'] = $this->session->userdata('register_auto_id');
        $transaction_data['employee_auto_id'] = $this->_['employee_auto_id'];
        $transaction_data['employee']         = $this->_['employee_name'];
        $transaction_data['branch_auto_id']   = $this->_['branch_auto_id'];
        $transaction_data['company_auto_id']  = $this->_['company_auto_id'];

        if ($transaction_auto_id) {
            $this->db->where('transaction_auto_id', $transaction_auto_id);
            $this->db->update('transactions', $transaction_data);
            $last_id = $transaction_auto_id;
            $type=$this->lang->line('updated'); 
        }else{
            $this->db->select("transaction_auto_id,qty,amount,discount");
            $this->db->from("transactions");
            $this->db->where('transaction_type',2);
            $this->db->where('id',$transaction_data['id']);
            $this->db->where('sales_auto_id', $transaction_data['sales_auto_id']);
            $this->db->where("register_auto_id",$transaction_data['register_auto_id']);
            $this->db->where("branch_auto_id",$transaction_data['branch_auto_id']);
            $this->db->where("company_auto_id",$transaction_data['company_auto_id']);
            $transaction_arr = $this->db->get()->row_array();
            if (empty($transaction_arr)) {
                $this->db->insert('transactions', $transaction_data); 
                $last_id = $this->db->insert_id(); 
            }else{
                $data_arr['qty'] = ($transaction_data['qty']+$transaction_arr['qty']);
                $data_arr['sub_amount'] = ($transaction_arr['amount']*$data_arr['qty']);
                $data_arr['total_discount'] = ($transaction_arr['discount']*$data_arr['qty']);
                $data_arr['net_amount'] = ($data_arr['sub_amount']-$data_arr['total_discount']);

                $this->db->where('transaction_auto_id', $transaction_arr['transaction_auto_id']);
                $this->db->update('transactions',$data_arr);
                $last_id = $transaction_arr['transaction_auto_id'];
                $type=$this->lang->line('updated');  
            }
        }

        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = $this->logger->log_event(0,$this->lang->line('product_module'),5,$transaction_data['name'].$type.$this->lang->line('failed'),$this->lang->line('product_module'),$last_id);
        }else{
            $this->db->trans_commit();
            $log = $this->logger->log_event(1,$this->lang->line('product_module'),2,$transaction_data['name'].$type.$this->lang->line('successfully'),$this->lang->line('product_module'),$last_id);            
        }
        return $log;
    }

    function fetch_holds_data(){
        $data = array();
        $register_id    = $this->session->userdata('register_auto_id');
        $this->db->select("hold_auto_id,hold_type,register_auto_id,employee,customer,customer_auto_id,waiter_auto_id,waiter, employee,receiving_auto_id ,check_in_time");
        $this->db->from("receiving");
        $this->db->where("receiving_status",2);
        $this->db->where("register_auto_id",$register_id);
        $this->db->where("branch_auto_id",$this->_['branch_auto_id']);
        $this->db->where("company_auto_id",$this->_['company_auto_id']);
        $data['holds'] = $this->db->get()->result_array();
        return $data;
    }

    function set_hold(){
        $data           = array();
        $auto_id        = trim($this->input->get_post('hold_auto_id'));
        $hold_type      = trim($this->input->get_post('hold_type'));
        $register_id    = $this->session->userdata('register_auto_id');
        $hold_auto_id   = 0;

        $this->db->select("*");
        $this->db->order_by("hold_auto_id", "desc"); 
        $this->db->from("receiving");
        $this->db->where("receiving_status",2);
        $this->db->where("hold_type",$hold_type);
        if ($auto_id) {
            $this->db->where("hold_auto_id",$auto_id);
        }
        $this->db->where("register_auto_id",$register_id);
        $this->db->where("branch_auto_id",$this->_['branch_auto_id']);
        $this->db->where("company_auto_id",$this->_['company_auto_id']);
        $data = $this->db->get()->row_array();
        
        $hold_auto_id = $data['hold_auto_id'];
        if ($auto_id==0) {
            unset($data['receiving_auto_id']);
            $data['hold_auto_id']       = ($hold_auto_id+1);
            $data['hold_type']          = $hold_type;
            $data['check_in_time']      = date('h:i:s');
            $data['register_auto_id']   = $register_id;
            $data['receiving_date']     = $this->_['current_date'];
            $data['customer_auto_id']   = '';
            $data['customer']           = '';
            $data['waiter_auto_id']     = '';
            $data['waiter']             = '';
            $data['receiving_status']   = 2;
            $data['employee_auto_id']   = $this->_['employee_auto_id'];
            $data['employee']           = $this->_['employee_name'];
            $data['branch_auto_id']     = $this->_['branch_auto_id'];
            $data['company_auto_id']    = $this->_['company_auto_id'];
            $this->db->insert('receiving', $data); 
            $data['receiving_auto_id']= $this->db->insert_id();
        }elseif(empty($data)) {
            $data['hold_auto_id']       = $auto_id;
            $data['hold_type']          = $hold_type;
            $data['check_in_time']      = date('h:i:s');
            $data['register_auto_id']   = $register_id;
            $data['receiving_date']     = $this->_['current_date'];
            $data['customer_auto_id']   = '';
            $data['customer']           = '';
            $data['waiter_auto_id']     = '';
            $data['waiter']             = '';
            $data['receiving_status']   = 2;
            $data['employee_auto_id']   = $this->_['employee_auto_id'];
            $data['employee']           = $this->_['employee_name'];
            $data['branch_auto_id']     = $this->_['branch_auto_id'];
            $data['company_auto_id']    = $this->_['company_auto_id'];
            $this->db->insert('receiving', $data); 
            $data['receiving_auto_id']= $this->db->insert_id();
        }
        $data['receiving_auto_id']= $data['receiving_auto_id'];
        
        $session_data = array('receiving_auto_id'=> $data['receiving_auto_id'],'hold_auto_id'=> $data['hold_auto_id'],'hold_type'=>$data['hold_type']);
        $this->session->set_userdata($session_data);
        return $data;
    }

    // function delete_all_transaction(){
    //     $this->db->trans_begin();
    //     $sales_auto_id = trim($this->input->get_post('sales_auto_id'));
    //     $this->db->where('sales_auto_id', $sales_auto_id);
    //     $this->db->delete('sales');
    //     $this->db->where('sales_auto_id', $sales_auto_id);
    //     $this->db->delete('transactions');
    //     $this->db->trans_complete();
    //     if($this->db->trans_status()===0){
    //         $this->db->trans_rollback();
    //         $log = $this->logger->log_event(0,$this->lang->line('purchase_invoice_module'),5,$this->lang->line('delete_failed'),$this->lang->line('purchase_invoice_module'),$sales_auto_id);
    //     }else{
    //         $this->db->trans_commit();
    //         $log = $this->logger->log_event(1,$this->lang->line('purchase_invoice_module'),2,$this->lang->line('delete_successfully'),$this->lang->line('purchase_invoice_module'),$sales_auto_id);            
    //     }
    //     return $log;
    // }

    function delete_transaction(){
        $this->db->trans_begin();
        $transaction_auto_id = trim($this->input->get_post('transaction_auto_id'));
        $tables = array('transactions');
        $this->db->where('transaction_auto_id', $transaction_auto_id);
        $this->db->delete($tables);
        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = $this->logger->log_event(0,$this->lang->line('products'),5,$this->lang->line('delete_failed'),$this->lang->line('products'),$transaction_auto_id);
        }else{
            $this->db->trans_commit();
            $log = $this->logger->log_event(1,$this->lang->line('products'),2,$this->lang->line('delete_successfully'),$this->lang->line('products'),$transaction_auto_id);            
        }
        return $log;
    }

    // function void_transaction(){
    //     $this->db->trans_begin();
    //     $transaction_auto_id = trim($this->input->get_post('transaction_auto_id'));
    //     $this->db->where('transaction_auto_id', $transaction_auto_id);
    //     $this->db->update('transactions',array('status' =>5));
    //     $this->db->trans_complete();
    //     if($this->db->trans_status()===0){
    //         $this->db->trans_rollback();
    //         $log = $this->logger->log_event(0,$this->lang->line('purchase_invoice_module'),5,$this->lang->line('delete_failed'),$this->lang->line('purchase_invoice_module'),$transaction_auto_id);
    //     }else{
    //         $this->db->trans_commit();
    //         $log = $this->logger->log_event(1,$this->lang->line('purchase_invoice_module'),2,$this->lang->line('delete_successfully'),$this->lang->line('purchase_invoice_module'),$transaction_auto_id);            
    //     }
    //     return $log;
    // }

    // function return_transaction(){
    //     $this->db->trans_begin();
    //     $transaction_auto_id = trim($this->input->get_post('transaction_auto_id'));
    //     $this->db->where('transaction_auto_id', $transaction_auto_id);
    //     $this->db->update('transactions',array('status' =>6));
    //     $this->db->trans_complete();
    //     if($this->db->trans_status()===0){
    //         $this->db->trans_rollback();
    //         $log = $this->logger->log_event(0,$this->lang->line('purchase_invoice_module'),5,$this->lang->line('delete_failed'),$this->lang->line('purchase_invoice_module'),$transaction_auto_id);
    //     }else{
    //         $this->db->trans_commit();
    //         $log = $this->logger->log_event(1,$this->lang->line('purchase_invoice_module'),2,$this->lang->line('delete_successfully'),$this->lang->line('purchase_invoice_module'),$transaction_auto_id);            
    //     }
    //     return $log;
    // }

    // function void_all_transaction(){
    //     $this->db->trans_begin();
    //     $sales_auto_id = trim($this->input->get_post('sales_auto_id'));
    //     $this->db->where('sales_auto_id', $sales_auto_id);
    //     $this->db->update('transactions',array('status' =>5));

    //     $this->db->where('sales_auto_id', $sales_auto_id);
    //     $this->db->delete('sales');
    //     $this->db->trans_complete();
    //     if($this->db->trans_status()===0){
    //         $this->db->trans_rollback();
    //         $log = $this->logger->log_event(0,$this->lang->line('purchase_invoice_module'),5,$this->lang->line('delete_failed'),$this->lang->line('purchase_invoice_module'),$hold_auto_id);
    //     }else{
    //         $this->db->trans_commit();
    //         $log = $this->logger->log_event(1,$this->lang->line('purchase_invoice_module'),2,$this->lang->line('delete_successfully'),$this->lang->line('purchase_invoice_module'),$hold_auto_id);            
    //     }
    //     return $log;
    // }

    function fetch_table_data(){
        $receiving_auto_id = trim($this->input->get_post('receiving_auto_id'));
        $this->db->select("*");
        $this->db->from("receiving");
        $this->db->where('receiving_auto_id', $receiving_auto_id);
        //$this->db->where("register_auto_id",$this->session->userdata('register_auto_id'));
        $this->db->where("branch_auto_id",$this->_['branch_auto_id']);
        $this->db->where("company_auto_id",$this->_['company_auto_id']);
        $data['receiving'] = $this->db->get()->row_array();
        $this->db->select("*");
        $this->db->from("transactions");
        $this->db->order_by("transaction_auto_id", "asc"); 
        $this->db->where('sales_auto_id', $receiving_auto_id);
        $this->db->where("transaction_type",2);
        $this->db->where("branch_auto_id",$this->_['branch_auto_id']);
        $this->db->where("company_auto_id",$this->_['company_auto_id']);
        $data['data'] = $this->db->get()->result_array();
        return $data;
    }

    // // function fetch_print_data(){
    // //     $receiving_auto_id = trim($this->input->get_post('sales_auto_id'));
    // //     $this->db->select("*");
    // //     $this->db->from("sales");
    // //     $this->db->where('sales_auto_id', $sales_auto_id);
    // //     //$this->db->where("register_auto_id",$this->session->userdata('register_auto_id'));
    // //     $this->db->where("branch_auto_id",$this->_['branch_auto_id']);
    // //     $this->db->where("company_auto_id",$this->_['company_auto_id']);
    // //     $data['sales'] = $this->db->get()->row_array();
    // //     $this->db->select("*");
    // //     $this->db->from("transactions");
    // //     $this->db->order_by("transaction_auto_id", "asc"); 
    // //     $this->db->where('sales_auto_id', $sales_auto_id);
    // //     //$this->db->where("register_auto_id",$this->session->userdata('register_auto_id'));
    // //     $this->db->where("branch_auto_id",$this->_['branch_auto_id']);
    // //     $this->db->where("company_auto_id",$this->_['company_auto_id']);
    // //     $data['data'] = $this->db->get()->result_array();
    // //     return $data;
    // // }

    function quick_pay(){
        $this->db->trans_begin();
        $receiving_auto_id  = trim($this->input->post('receiving_auto_id'));
        $sub_total      = trim($this->input->post('sub_total'));
        $item_discount  = trim($this->input->post('item_discount'));
        $discount       = trim($this->input->post('full_discount'));
        $pay_type       = trim($this->input->post('pay_type'));
        $tax            = trim($this->input->post('tax'));
        $card           = trim($this->input->post('card'));
        $cash           = trim($this->input->post('cash'));
        $chaque         = trim($this->input->post('chaque'));
        $gift_card      = trim($this->input->post('gift_card'));
        $receiving_tender   = trim($this->input->post('receiving_tender'));
        $total          = trim($this->input->post('total'));
        $cheque_no        = trim($this->input->post('payment_cheque_no'));
        $cheque_bank      = trim($this->input->post('payment_cheque_bank'));
        $card_type        = trim($this->input->post('payment_card_type'));
        $card_last_digits = trim($this->input->post('payment_card_no'));
        $gitcard_code     = trim($this->input->post('payment_giftcard_code'));
        $gitcard_expire   = trim($this->input->post('payment_giftcard_expire'));

        $receiving_arr['pay_type']                  = $pay_type;
        $receiving_arr['receiving_sub_total']       = $sub_total;
        $receiving_arr['receiving_tax']             = $tax;
        $receiving_arr['receiving_item_discount']   = $item_discount;
        $receiving_arr['receiving_discount']        = $discount;
        $receiving_arr['receiving_total']           = $total;
        $receiving_arr['payment_by_card']           = $card;
        $receiving_arr['payment_by_cash']           = $cash;
        $receiving_arr['payment_by_cheque']         = $chaque;
        $receiving_arr['payment_by_gift_card']      = $gift_card;
        $receiving_arr['receiving_tender']          = $receiving_tender;
        $receiving_arr['receiving_status']          = 3;
        $receiving_arr['receiving_date']            = date('Y-m-d');
        $receiving_arr['check_out_time']        = date('h:i:s');
        $receiving_arr['receiving_change']          = ($receiving_arr['receiving_sub_total']-$receiving_arr['receiving_tender']);
        if ($receiving_arr['receiving_change'] > 0) {
            $receiving_arr['receiving_balance']     = ($receiving_arr['receiving_total']-($receiving_arr['payment_by_card']+$receiving_arr['payment_by_cash']+$receiving_arr['payment_by_cheque']+$receiving_arr['payment_by_gift_card']));
            $receiving_arr['receiving_change']      = 0;
        }else{
            $receiving_arr['receiving_balance']     = 0;
        }
        $receiving_arr['payment_by_cash']      += $receiving_arr['receiving_change'];
        
        $this->db->where('receiving_auto_id', $receiving_auto_id);
        $this->db->update('receiving',$receiving_arr);

        $this->db->where('sales_auto_id', $receiving_auto_id);
        $this->db->where('status', 3);
        $this->db->update('transactions',array('status' =>4));
        $this->db->delete('payments', array('payment_type' => 1,'payment_auto_id' => $sales_auto_id));
        $receiving_arr = array();
        if ($cash != 0) {
            $arr['payment_type']         = 2;
            $arr['payment_method']       = 1;
            $arr['payment_auto_id']      = $receiving_auto_id;
            $arr['payment_amount']       = $cash;
            $arr['payment_cheque_bank']  = '';
            $arr['payment_cheque_no']    = '';
            array_push($receiving_arr, $arr);
        }
        
        if ($chaque != 0) {
            $arr['payment_type']         = 2;
            $arr['payment_method']       = 2;
            $arr['payment_auto_id']      = $receiving_auto_id;
            $arr['payment_amount']       = $chaque;
            $arr['payment_cheque_bank']  = $cheque_bank;
            $arr['payment_cheque_no']    = $cheque_no;
            array_push($receiving_arr, $arr);
        }
        
        if ($card != 0) {
            $arr['payment_type']         = 2;
            $arr['payment_method']       = 3;
            $arr['payment_auto_id']      = $receiving_auto_id;
            $arr['payment_amount']       = $card;
            $arr['payment_cheque_bank']  = $card_type;
            $arr['payment_cheque_no']    = $card_last_digits;
            array_push($receiving_arr, $arr);
        }
        
        if ($gift_card != 0) {
            $arr['payment_type']         = 2;
            $arr['payment_method']       = 4;
            $arr['payment_auto_id']      = $receiving_auto_id;
            $arr['payment_amount']       = $gift_card;
            $arr['payment_cheque_bank']  = $gitcard_code;
            $arr['payment_cheque_no']    = $gitcard_expire;
            array_push($receiving_arr, $arr);
        }
        if (!empty($receiving_arr)) {
            $this->db->insert_batch('payments', $receiving_arr); 
        }

        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = $this->logger->log_event(0,$this->lang->line('purchase_invoice_module'),5,$this->lang->line('delete_failed'),$this->lang->line('purchase_invoice_module'),$receiving_auto_id);
        }else{
            $this->db->trans_commit();
            $log = $this->logger->log_event(1,$this->lang->line('purchase_invoice_module'),2,$this->lang->line('delete_successfully'),$this->lang->line('purchase_invoice_module'),$receiving_auto_id);            
        }
        return $log;
    }

    function fetch_all_supplier(){
        $data_arr=array();
        $data_arr['query'] ='test';
        $data_arr['suggestions'] =[];
        $company_auto_id = $this->_['company_auto_id'];
        $search_string = $_GET['query']."%";
        $data = $this->db->query('SELECT supplier_auto_id,supplier_company_name,supplier_secondary_code,supplier_mobile FROM tbl_hrm_suppliers WHERE (supplier_company_name LIKE "'.$search_string.'" OR supplier_secondary_code LIKE "'.$search_string.'" OR supplier_mobile LIKE "'.$search_string.'") AND company_auto_id = "'.$company_auto_id.'" and is_active = "2"')->result_array();
        if(!empty($data)){
            foreach($data as $val){
                $data_arr['suggestions'][] = array('value'=>$val["supplier_secondary_code"].' | '.$val["supplier_company_name"].' | '.$val["supplier_mobile"],'supplier_secondary_code'=>$val["supplier_secondary_code"],'supplier_company_name'=>$val["supplier_company_name"],'supplier_mobile'=>$val["supplier_mobile"],'supplier_auto_id'=>$val["supplier_auto_id"]);
            }
        }
        return $data_arr;
    }

    // function fetch_all_waiters(){
    //     $data_arr=array();
    //     $data_arr['query'] ='test';
    //     $data_arr['suggestions'] =[];
    //     $company_auto_id = $this->_['company_auto_id'];
    //     $search_string = $_GET['query']."%";
    //     $data = $this->db->query('SELECT employee_auto_id,employee_name,employee_secondary_code,employee_mobile FROM tbl_hrm_employees WHERE (employee_name LIKE "'.$search_string.'" OR employee_secondary_code LIKE "'.$search_string.'" OR employee_mobile LIKE "'.$search_string.'") AND company_auto_id = "'.$company_auto_id.'" and is_active = "2" and group_auto_id IN (3,5)')->result_array();
    //     if(!empty($data)){
    //         foreach($data as $val){
    //             $data_arr['suggestions'][] = array('value'=>$val["employee_secondary_code"].' | '.$val["employee_name"].' | '.$val["employee_mobile"],'employee_secondary_code'=>$val["employee_secondary_code"],'employee_name'=>$val["employee_name"],'employee_mobile'=>$val["employee_mobile"],'employee_auto_id'=>$val["employee_auto_id"]);
    //         }
    //     }
    //     return $data_arr;
    // }

    // function set_waiter(){
    //     $sales_auto_id = trim($this->input->get_post('sales_auto_id'));
    //     $data_arr['waiter_auto_id'] = trim($this->input->get_post('waiter_auto_id'));
    //     $data_arr['waiter'] = trim($this->input->get_post('waiter'));
    //     $this->db->where('sales_auto_id', $sales_auto_id);
    //     $this->db->update('sales',$data_arr);

    //     $this->db->where('sales_auto_id',$sales_auto_id);
    //     $this->db->update('transactions', $data_arr);

    //     $this->db->trans_complete();
    //     if($this->db->trans_status()===0){
    //         $this->db->trans_rollback();
    //         $log = $this->logger->log_event(0,$this->lang->line('purchase_invoice_module'),5,$this->lang->line('delete_failed'),$this->lang->line('purchase_invoice_module'),0);
    //     }else{
    //         $this->db->trans_commit();
    //         $log = $this->logger->log_event(1,$this->lang->line('purchase_invoice_module'),2,$this->lang->line('delete_successfully'),$this->lang->line('purchase_invoice_module'),0);            
    //     }
    //     return $log;
    // }

    function set_supplier(){
        $sales_auto_id = trim($this->input->get_post('sales_auto_id'));
        $data_arr['customer_auto_id'] = trim($this->input->get_post('customer_auto_id'));
        $data_arr['customer'] = trim($this->input->get_post('customer'));
        $this->db->where('sales_auto_id', $sales_auto_id);
        $this->db->update('sales',$data_arr);

        $this->db->where('sales_auto_id',$sales_auto_id);
        $this->db->update('transactions', $data_arr);

        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = $this->logger->log_event(0,$this->lang->line('purchase_invoice_module'),5,$this->lang->line('delete_failed'),$this->lang->line('purchase_invoice_module'),0);
        }else{
            $this->db->trans_commit();
            $log = $this->logger->log_event(1,$this->lang->line('purchase_invoice_module'),2,$this->lang->line('delete_successfully'),$this->lang->line('purchase_invoice_module'),0);            
        }
        return $log;
    }

    function fetch_register_total(){
        $data = array();
        $this->db->select("*");
        $this->db->from("registers");
        $this->db->where("register_status",2);
        $this->db->where("employee_auto_id",$this->_['employee_auto_id']);
        $this->db->where("branch_auto_id",$this->_['branch_auto_id']);
        $this->db->where("company_auto_id",$this->_['company_auto_id']);
        $data['register'] = $this->db->get()->row_array();
        $data['register']['o_b'] = to_currency($data['register']['opening_blance'],$this->_['app']['company_currency_symbol'],$this->_['app']['company_currency_decimal']);
        $data['register']['date'] = print_date_format($data['register']['register_date']).' '.date("H:s", strtotime($data['register']['register_date']));
        $session_data = array('register_auto_id'=> $data['register']['register_auto_id']);
        $this->session->set_userdata($session_data);
        
        $this->db->select_sum('payment_by_cash');
        $this->db->select_sum('payment_by_cheque');
        $this->db->select_sum('payment_by_card');
        $this->db->select_sum('payment_by_gift_card');
        $this->db->where("register_auto_id",$data['register']['register_auto_id']);
        $data['amount'] = $this->db->get('sales')->row_array();
        return $data;
    }

    // function close_register(){
    //     $register_auto_id    = $this->session->userdata('register_auto_id');
    //     $this->db->select_sum('payment_by_cash');
    //     $this->db->select_sum('payment_by_cheque');
    //     $this->db->select_sum('payment_by_card');
    //     $this->db->select_sum('payment_by_gift_card');
    //     $this->db->where("register_auto_id",$register_auto_id);
    //     $amount_arr = $this->db->get('sales')->row_array();
    //     $this->db->trans_begin();
    //     $type = $this->lang->line('created');
    //     $register_data = $this->input->post(NULL, TRUE);
    //     $register_data['closed_date']       = date('Y-m-d h:i:s');
    //     $register_data['register_status']   = 3;
    //     $register_data['closed_by']         = $this->_['employee_name'];
    //     $register_data['cash_total']        = $amount_arr['payment_by_cash'];
    //     $register_data['credit_card_total'] = $amount_arr['payment_by_card'];
    //     $register_data['cheque_total']      = $amount_arr['payment_by_cheque'];

    //     if ($register_auto_id) {
    //         $this->db->where('register_auto_id', $register_auto_id);
    //         $this->db->update('registers', $register_data);
    //         $last_id = $register_auto_id;
    //         $type=$this->lang->line('updated'); 
    //     }else{
    //         $register_data['opened_by']         = $this->_['employee_name'];
    //         $this->db->insert('registers', $register_data); 
    //         $last_id = $this->db->insert_id();
    //         $session_data = array('register_auto_id'=> $last_id);
    //         $this->session->set_userdata($session_data);  
    //     }

    //     $this->db->trans_complete();
    //     if($this->db->trans_status()===0){
    //         $this->db->trans_rollback();
    //         $log = $this->logger->log_event(0,$this->lang->line('product_module'),5,$register_data['product_name'].$type.$this->lang->line('failed'),$this->lang->line('product_module'),$last_id);
    //     }else{
    //         $this->db->trans_commit();
    //         $log = $this->logger->log_event(1,$this->lang->line('product_module'),2,$register_data['product_name'].$type.$this->lang->line('successfully'),$this->lang->line('product_module'),$last_id);            
    //     }
    //     return $log;
    // }
}