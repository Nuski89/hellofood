<?php
class model_company extends CI_Model{

	function fetch_company_data(){
        $this->db->select('*');
        $this->db->where('company_auto_id',1);
        $this->db->from('config');
        return $this->db->get()->row_array();
    }

    function save_company(){
        $this->db->trans_begin();
        $type = ' Created ';
        $data['config']['company_name'] = $this->input->post('company_name');
        $data['config']['company_logo'] = $this->input->post('company_logo');
        $data['config']['company_currency_code'] = $this->input->post('company_currency_code');
        $data['config']['company_currency_decimal'] = $this->input->post('company_currency_decimal');
        $data['config']['company_currency_symbol'] = $this->input->post('company_currency_symbol');
        // $data['config']['company_enable_languages'] = $this->input->post('company_enable_languages');
        // $data['config']['company_print_date_format'] = $this->input->post('company_print_date_format');
        // $data['config']['company_file_max_size'] = $this->input->post('company_file_max_size');
        // $data['config']['company_notify_auto_hide'] = $this->input->post('company_notify_auto_hide');
        // $data['config']['company_notify_horizontal_position'] = $this->input->post('company_notify_horizontal_position');
        // $data['config']['company_notify_vertical_position'] = $this->input->post('company_notify_vertical_position');
        // $data['config']['company_rows_per_table'] = $this->input->post('company_rows_per_table');
        // $data['config']['company_theme'] = $this->input->post('company_theme');
        // $data['config']['company_sidebar_theme'] = $this->input->post('company_sidebar_theme');
        // $data['config']['company_currency_separator'] = $this->input->post('company_currency_separator');
        // $data['config']['company_currency_side'] = $this->input->post('company_currency_side');
        // $data['config']['company_on_screen_keyboard'] = $this->input->post('company_on_screen_keyboard');
        $this->db->where('company_auto_id', 1);
        $this->db->update('config',$data['config']);
        $last_id = $company_auto_id;
        $type = ' Updated ';

        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = array('status'=>0,'log_status'=>5,'title'=>$this->lang->line('title'),'message'=> $data['config']['company_name'].' '.$type.'failed');
        }else{
            $this->db->trans_commit();
            $log = array('status'=>1,'log_status'=>2,'title'=>$this->lang->line('title'),'message'=> $data['config']['company_name'].' '.$type.'successfully');
        }
        return $log;
    }
}
