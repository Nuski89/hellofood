<?php 
class Model_employee extends CI_Model{

    function fetch_employee_data(){
        $employee_auto_id = trim($this->input->post('employee_auto_id'));
        $this->db->select("*");
        $this->db->from("hrm_employees");
        $this->db->where("company_auto_id={$this->_['company_auto_id']}");
        $this->db->where('employee_auto_id', $employee_auto_id);
        return $this->db->get()->row_array();
    }

    function save_employee(){
        $employee_auto_id = trim($this->input->post('employee_auto_id'));
        $this->db->trans_begin();
        $type = $this->lang->line('common_created');
        
        // Employee Table
        $employee_data['group_auto_id']           = $this->input->post('group_auto_id');
        $employee_data['group_name']              = $this->input->post('group_name');
        $employee_data['employee_name']           = $this->input->post('employee_name');
        $employee_data['employee_secondary_code'] = $this->input->post('employee_secondary_code');
        $employee_data['employee_address']        = $this->input->post('employee_address');
        $employee_data['employee_city']           = $this->input->post('employee_city');
        $employee_data['employee_mobile']         = $this->input->post('employee_mobile');
        $employee_data['employee_login_email']    = $this->input->post('employee_email');
        if ($this->input->post('login_password') AND $this->input->post('login_password2')) {
            $employee_data['employee_login_password'] = md5($this->input->post('login_password'));
        }
        $employee_data['employee_login_attempt']  = $this->input->post('login_attempt');
        $employee_data['employee_img_path']       = '1.jpg';
        $employee_data['is_active']               = 2;
        $employee_data['company_auto_id']         = $this->_['company_auto_id'];

        if ($employee_auto_id) {
            $this->db->where('employee_auto_id', $employee_auto_id);
            $this->db->update('hrm_employees', $employee_data);
            $last_id = $employee_auto_id;
            $type=$this->lang->line('common_updated'); 
        }else{
            // Insert to Employee Table
            $this->db->insert('hrm_employees', $employee_data);   
        }

        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = $this->logger->log_event(0,$this->lang->line('employee_module'),5,$employee_data['employee_name'].$type.$this->lang->line('common_failed'),$this->lang->line('employee_module'),$last_id);
        }else{
            $this->db->trans_commit();
            $log = $this->logger->log_event(1,$this->lang->line('employee_module'),2,$employee_data['employee_name'].$type.$this->lang->line('common_successfully'),$this->lang->line('employee_module'),$last_id);            
        }
        return $log;
    }

    function change_login_status(){
        $employee_auto_id = trim($this->input->post('employee_auto_id'));
        $this->db->select('employee_name,employee_login_status');
        $this->db->where('employee_auto_id',$employee_auto_id);
        $this->db->where('company_auto_id', $this->_['company_auto_id']);
        $this->db->from('hrm_employees');
        $data_arr = $this->db->get()->row_array();
        if ($data_arr['employee_login_status']==2) {
            $data['employee_login_status']            = 3;
            $log = $this->logger->log_event(1,$this->lang->line('common_login_status_deactivated'),4,$data_arr['employee_name'].$this->lang->line('common_deactivated_successfully'),$this->lang->line('common_login'),$employee_auto_id);
        }else{
            $data['employee_login_status']            = 2;
            $log = $this->logger->log_event(1,$this->lang->line('common_login_status_activated'),2,$data_arr['employee_name'].$this->lang->line('common_activated_successfully'),$this->lang->line('common_login'),$employee_auto_id);
        }
        $this->db->where('employee_auto_id', $employee_auto_id);
        $this->db->update('hrm_employees', $data);
        return $log;
    }

    function change_employee_status(){
        $employee_auto_id = trim($this->input->post('employee_auto_id'));
        $this->db->select('employee_name,is_active');
        $this->db->where('employee_auto_id', $employee_auto_id);
        $this->db->where('company_auto_id', $this->_['company_auto_id']);
        $this->db->from('hrm_employees');
        $data_arr = $this->db->get()->row_array();
        if ($data_arr['is_active']==2) {
            $data['is_active']            = 3;
            $log = $this->logger->log_event(1,$this->lang->line('common_person_status_deactivated'),4,$data_arr['employee_name'].$this->lang->line('common_deactivated_successfully'),$this->lang->line('common_person'),$employee_auto_id);
        }else{
            $data['is_active']            = 2;
            $log = $this->logger->log_event(1,$this->lang->line('common_person_status_activated'),2,$data_arr['employee_name'].$this->lang->line('common_activated_successfully'),$this->lang->line('common_person'),$employee_auto_id);
        }
        $this->db->where('employee_auto_id', $employee_auto_id);
        $this->db->update('hrm_employees', $data);
        return $log;
    }
}