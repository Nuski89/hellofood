<?php 
class Model_expense extends CI_Model{

    function fetch_expense_data(){
        $expense_auto_id = trim($this->input->post('expense_auto_id'));
        $this->db->select("*");
        $this->db->from("expences");
        $this->db->where("company_auto_id={$this->_['company_auto_id']}");
        $this->db->where('expense_auto_id', $expense_auto_id);
        return $this->db->get()->row_array();
    }

    function save_expense(){
        $expense_auto_id = trim($this->input->post('expense_auto_id'));
        $this->db->trans_begin();
        $type = $this->lang->line('common_created');
        $expense_data['expense_date']          = $this->input->post('expense_date');
        $expense_data['expense_reference']     = $this->input->post('expense_reference');
        $expense_data['expense_category']      = $this->input->post('expense_category');
        $expense_data['expense_amount']        = $this->input->post('expense_amount');
        $expense_data['expense_note']          = $this->input->post('expense_note');
        $expense_data['branch_auto_id']        = $this->_['branch_auto_id'];
        $expense_data['company_auto_id']       = $this->_['company_auto_id'];

        if ($expense_auto_id) {
            $this->db->where('expense_auto_id', $expense_auto_id);
            $this->db->update('expences', $expense_data);
            $last_id = $expense_auto_id;
            $type=$this->lang->line('common_updated'); 
        }else{
            $this->db->insert('expences', $expense_data);   
        }

        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = $this->logger->log_event(0,$this->lang->line('expense_module'),5,$expense_data['expense_name'].$type.$this->lang->line('failed'),$this->lang->line('expense_module'),$last_id);
        }else{
            $this->db->trans_commit();
            $log = $this->logger->log_event(1,$this->lang->line('expense_module'),2,$expense_data['expense_name'].$type.$this->lang->line('successfully'),$this->lang->line('expense_module'),$last_id);            
        }
        return $log;
    }

    function fetch_all_expense_categories(){
        $data_arr=array();
        $data_arr['query'] ='test';
        $data_arr['suggestions'] =[];
        $company_auto_id = $this->_['company_auto_id'];
        $search_string = $_GET['query']."%";
        $data = $this->db->query('SELECT expense_category FROM tbl_expences WHERE (expense_category LIKE "'.$search_string.'") AND company_auto_id = "'.$company_auto_id.'" GROUP BY expense_category')->result_array();
        if(!empty($data)){
            foreach($data as $val){
                $data_arr['suggestions'][] = array('value'=>$val["expense_category"]);
            }
        }
        return $data_arr;
    }

    function delete_expense(){
        $this->db->trans_begin();
        $expense_auto_id = trim($this->input->get_post('expense_auto_id'));
        $this->db->where('expense_auto_id', $expense_auto_id);
        $this->db->delete('expences');
        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = $this->logger->log_event(0,$this->lang->line('expense_module'),5,$this->lang->line('common_delete_failed'),$this->lang->line('expense_module'),$expense_auto_id);
        }else{
            $this->db->trans_commit();
            $log = $this->logger->log_event(1,$this->lang->line('expense_module'),2,$this->lang->line('common_delete_successfully'),$this->lang->line('expense_module'),$expense_auto_id);
        }
        return $log;
    }
}