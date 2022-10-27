<?php 
class Model_customer extends CI_Model{

    function fetch_customer_data(){
        $customer_auto_id = trim($this->input->post('customer_auto_id'));
        $this->db->select("*");
        $this->db->from("hrm_customers");
        $this->db->where("company_auto_id={$this->_['company_auto_id']}");
        $this->db->where('customer_auto_id', $customer_auto_id);
        return $this->db->get()->row_array();
    }

    function save_customer(){
        $customer_auto_id = trim($this->input->post('customer_auto_id'));
        $this->db->trans_begin();
        $type = $this->lang->line('common_created');
        
        // Customer Table
        $customer_data['customer_name']           = $this->input->post('customer_name');
        $customer_data['customer_secondary_code'] = $this->input->post('customer_secondary_code');
        $customer_data['customer_address']        = $this->input->post('customer_address');
        $customer_data['customer_city']           = $this->input->post('customer_city');
        $customer_data['customer_email']          = $this->input->post('customer_email');
        $customer_data['customer_mobile']         = $this->input->post('customer_mobile');
        $customer_data['customer_discount']       = $this->input->post('customer_discount');
        $customer_data['customer_note']           = $this->input->post('customer_note');
        $customer_data['company_auto_id']         = $this->_['company_auto_id'];

        if ($customer_auto_id) {
            $this->db->where('customer_auto_id', $customer_auto_id);
            $this->db->update('hrm_customers', $customer_data);
            $last_id = $customer_auto_id;
            $type=$this->lang->line('common_updated'); 
        }else{
            // Insert to Customer Table
            $this->db->insert('hrm_customers', $customer_data);
        }

        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = $this->logger->log_event(0,$this->lang->line('customer_module'),5,$customer_data['customer_name'].$type.$this->lang->line('common_failed'),$this->lang->line('customer_module'),$last_id);
        }else{
            $this->db->trans_commit();
            $log = $this->logger->log_event(1,$this->lang->line('customer_module'),2,$customer_data['customer_name'].$type.$this->lang->line('common_successfully'),$this->lang->line('customer_module'),$last_id);            
        }
        return $log;
    }

    function change_customer_status(){
        $customer_auto_id = trim($this->input->post('customer_auto_id'));
        $this->db->select('customer_name,is_active');
        $this->db->where('customer_auto_id', $customer_auto_id);
        $this->db->from('hrm_customers');
        $data_arr = $this->db->get()->row_array();
        if ($data_arr['is_active']==2) {
            $data['is_active']            = 3;
            $log = $this->logger->log_event(1,$this->lang->line('customer_status_deactivated'),4,$data_arr['customer_name'].$this->lang->line('common_deactivated_successfully'),$this->lang->line('customer_module'),$customer_auto_id);
        }else{
            $data['is_active']            = 2;
            $log = $this->logger->log_event(1,$this->lang->line('customer_status_activated'),2,$data_arr['customer_name'].$this->lang->line('common_activated_successfully'),$this->lang->line('customer_module'),$customer_auto_id);
        }
        $this->db->where('customer_auto_id', $customer_auto_id);
        $this->db->update('hrm_customers', $data);
        return $log;
    }
}