<?php 
class Model_supplier extends CI_Model{

    function fetch_supplier_data(){
        $supplier_auto_id = trim($this->input->post('supplier_auto_id'));
        $this->db->select("*");
        $this->db->from("hrm_suppliers");
        $this->db->where("company_auto_id={$this->_['company_auto_id']}");
        $this->db->where('supplier_auto_id', $supplier_auto_id);
        return $this->db->get()->row_array();
    }

    function save_supplier(){
        $supplier_auto_id = trim($this->input->post('supplier_auto_id'));
        $this->db->trans_begin();
        $type = $this->lang->line('common_created');
        
        // Supplier Table
        $supplier_data['supplier_company_name']   = $this->input->post('supplier_company_name');
        $supplier_data['supplier_secondary_code'] = $this->input->post('supplier_secondary_code');
        $supplier_data['supplier_address']        = $this->input->post('supplier_address');
        $supplier_data['supplier_city']           = $this->input->post('supplier_city');
        $supplier_data['supplier_email']          = $this->input->post('supplier_email');
        $supplier_data['supplier_mobile']         = $this->input->post('supplier_mobile');
        $supplier_data['supplier_fax']            = $this->input->post('supplier_fax');
        $supplier_data['supplier_note']           = $this->input->post('supplier_note');
        $supplier_data['company_auto_id']         = $this->_['company_auto_id'];

        if ($supplier_auto_id) {
            $this->db->where('supplier_auto_id', $supplier_auto_id);
            $this->db->update('hrm_suppliers', $supplier_data);
            $last_id = $supplier_auto_id;
            $type=$this->lang->line('common_updated');
        }else{
            // Insert to Supplier Table
            $this->db->insert('hrm_suppliers', $supplier_data);
        }

        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = $this->logger->log_event(0,$this->lang->line('supplier_module'),5,$supplier_data['supplier_company_name'].$type.$this->lang->line('common_failed'),$this->lang->line('supplier_module'),$last_id);
        }else{
            $this->db->trans_commit();
            $log = $this->logger->log_event(1,$this->lang->line('supplier_module'),2,$supplier_data['supplier_company_name'].$type.$this->lang->line('common_successfully'),$this->lang->line('supplier_module'),$last_id);            
        }
        return $log;
    }

    function change_supplier_status(){
        $supplier_auto_id = trim($this->input->post('supplier_auto_id'));
        $this->db->select('supplier_company_name,is_active');
        $this->db->where('supplier_auto_id', $supplier_auto_id);
        $this->db->from('hrm_suppliers');
        $data_arr = $this->db->get()->row_array();
        if ($data_arr['is_active']==2) {
            $data['is_active']            = 3;
            $log = $this->logger->log_event(1,$this->lang->line('supplier_status_deactivated'),4,$data_arr['supplier_company_name'].$this->lang->line('common_deactivated_successfully'),$this->lang->line('supplier_module'),$supplier_auto_id);
        }else{
            $data['is_active']            = 2;
            $log = $this->logger->log_event(1,$this->lang->line('supplier_status_activated'),2,$data_arr['supplier_company_name'].$this->lang->line('common_activated_successfully'),$this->lang->line('supplier_module'),$supplier_auto_id);
        }
        $this->db->where('supplier_auto_id', $supplier_auto_id);
        $this->db->update('hrm_suppliers', $data);
        return $log;
    }
}