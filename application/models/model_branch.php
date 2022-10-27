<?php
class model_branch extends CI_Model{

    function fetch_branch_data(){
        $branch_auto_id = trim($this->input->post('branch_auto_id'));
        $this->db->select("*");
        $this->db->from("branches");
        $this->db->where("company_auto_id={$this->_['company_auto_id']}");
        $this->db->where('branch_auto_id', $branch_auto_id);
        return $this->db->get()->row_array();
    }

    function save_branch(){
        $branch_auto_id = trim($this->input->post('branch_auto_id'));
        $this->db->trans_begin();
        $type = $this->lang->line('common_created');

        // Branch Table
        $branch_data['branch_address']        = $this->input->post('branch_address');
        $branch_data['branch_postal_code']    = $this->input->post('branch_postal_code');
        $branch_data['branch_city']           = $this->input->post('branch_city');
        $branch_data['branch_country']        = $this->input->post('branch_country');
        $branch_data['branch_mobile']         = $this->input->post('branch_mobile');
        $branch_data['branch_email']          = $this->input->post('branch_email');
        $branch_data['branch_receipt_header'] = $this->input->post('branch_receipt_header');
        $branch_data['branch_receipt_footer'] = $this->input->post('branch_receipt_footer');
        $branch_data['branch_return_policy']  = $this->input->post('branch_return_policy');
        $branch_data['branch_bill_prefix']    = $this->input->post('branch_bill_prefix');
        $branch_data['branch_bill_date']      = $this->input->post('branch_bill_date');
        $branch_data['branch_facebook']       = $this->input->post('branch_facebook');
        $branch_data['branch_google_plus']    = $this->input->post('branch_google_plus');
        $branch_data['branch_instagram']      = $this->input->post('branch_instagram');
        $branch_data['branch_twitter']        = $this->input->post('branch_twitter');
        $branch_data['branch_timezone']       = $this->input->post('branch_timezone');
        $branch_data['branch_status']         = 2;
        $branch_data['company_auto_id']       = $this->_['company_auto_id'];

        if ($branch_auto_id) {
            $this->db->where('branch_auto_id', $branch_auto_id);
            $this->db->update('branches', $branch_data);
            $last_id = $branch_auto_id;
            $type=$this->lang->line('common_updated');
        }else{
            // Insert to Branch Table
            $this->db->insert('branches', $branch_data);
        }

        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = $this->logger->log_event(0,$this->lang->line('branch_module'),5,$branch_data['branch_city'].$type.$this->lang->line('common_failed'),$this->lang->line('branch_module'),$last_id);
        }else{
            $this->db->trans_commit();
            $log = $this->logger->log_event(1,$this->lang->line('branch_module'),2,$branch_data['branch_city'].$type.$this->lang->line('common_successfully'),$this->lang->line('branch_module'),$last_id);
        }
        return $log;
    }

    function save_table(){
        $table_auto_id =trim($this->input->post('table_auto_id'));
        $this->db->trans_begin();
        $type = $this->lang->line('common_created');
        $table_data['table_name']      = $this->input->post('table_name');
        $table_data['table_status']    = 2;
        $table_data['branch_auto_id']  = trim($this->input->post('branch_auto_id'));
        $table_data['company_auto_id'] = $this->_['company_auto_id'];

        if ($table_auto_id) {
            $this->db->where('table_auto_id', $table_auto_id);
            $this->db->update('tables', $table_data);
            $last_id = $branch_auto_id;
            $type=$this->lang->line('common_updated');
        }else{
            $this->db->insert('tables', $table_data);
        }

        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = $this->logger->log_event(0,$this->lang->line('branch_module'),5,$table_data['table_name'].$type.$this->lang->line('common_failed'),$this->lang->line('branch_module'),$last_id);
        }else{
            $this->db->trans_commit();
            $log = $this->logger->log_event(1,$this->lang->line('branch_module'),2,$table_data['table_name'].$type.$this->lang->line('common_successfully'),$this->lang->line('branch_module'),$last_id);
        }
        return $log;
    }

    function fetch_tables_data(){
        $branch_auto_id = trim($this->input->post('branch_auto_id'));
        $this->db->select("*");
        $this->db->from("tables");
        $this->db->where("company_auto_id={$this->_['company_auto_id']}");
        $this->db->where('branch_auto_id', $branch_auto_id);
        return $this->db->get()->result_array();
    }

    function delete_branch_table(){
        $this->db->trans_begin();
        $table_auto_id = trim($this->input->get_post('table_auto_id'));
        $this->db->where('table_auto_id', $table_auto_id);
        $this->db->delete('tables');
        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = $this->logger->log_event(0,$this->lang->line('purchase_invoice_module'),5,$this->lang->line('common_delete_failed'),$this->lang->line('purchase_invoice_module'),$transaction_auto_id);
        }else{
            $this->db->trans_commit();
            $log = $this->logger->log_event(1,$this->lang->line('purchase_invoice_module'),2,$this->lang->line('common_delete_successfully'),$this->lang->line('purchase_invoice_module'),$transaction_auto_id);
        }
        return $log;
    }

    function change_table_status(){
        $table_auto_id = trim($this->input->get_post('table_auto_id'));
        $this->db->select('table_name,table_status');
        $this->db->where('table_auto_id',$table_auto_id);
        $this->db->where('company_auto_id', $this->_['company_auto_id']);
        $this->db->from('tables');
        $data_arr = $this->db->get()->row_array();
        if ($data_arr['table_status']==2) {
            $data['table_status']            = 3;
            $log = $this->logger->log_event(1,$this->lang->line('table_status_deactivated'),4,$data_arr['table_name'].$this->lang->line('successfully'),$this->lang->line('product_module'),$table_auto_id);
        }else{
            $data['table_status']            = 2;
            $log = $this->logger->log_event(1,$this->lang->line('table_status_activated'),2,$data_arr['table_name'].$this->lang->line('successfully'),$this->lang->line('product_module'),$table_auto_id);
        }
        $this->db->where('table_auto_id', $table_auto_id);
        $this->db->update('tables', $data);
        return $log;
    }

    function change_branch_status(){
        $branch_auto_id = trim($this->input->get_post('branch_auto_id'));
        $this->db->select('branch_city,branch_status');
        $this->db->where('branch_auto_id',$branch_auto_id);
        $this->db->where('company_auto_id', $this->_['company_auto_id']);
        $this->db->from('branches');
        $data_arr = $this->db->get()->row_array();
        if ($data_arr['branch_status']==2) {
            $data['branch_status']            = 3;
            $log = $this->logger->log_event(1,$this->lang->line('branch_status_deactivated'),4,$data_arr['branch_city'].$this->lang->line('successfully'),$this->lang->line('product_module'),$branch_auto_id);
        }else{
            $data['branch_status']            = 2;
            $log = $this->logger->log_event(1,$this->lang->line('branch_status_activated'),2,$data_arr['branch_city'].$this->lang->line('successfully'),$this->lang->line('product_module'),$branch_auto_id);
        }
        $this->db->where('branch_auto_id', $branch_auto_id);
        $this->db->update('branches', $data);
        return $log;
    }

}
