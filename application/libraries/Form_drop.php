<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Form_drop{

    function supplier_drop($status = 0){
        $ci =& get_instance();
        $ci->db->SELECT("supplier_auto_id,supplier_mobile,supplier_secondary_code,supplier_company_name");
        $ci->db->where('company_auto_id', $ci->_['company_auto_id']); 
        $ci->db->where('is_active', 2); 
        $ci->db->FROM('hrm_suppliers');
        $data = $ci->db->get()->result_array();
        if ($status) {
             return $data;
        }
        $data_arr = array('' => 'Select supplier');
        if (isset($data)) {
            foreach ($data as $row) {
                $data_arr[trim($row['supplier_auto_id'])] =trim($row['supplier_mobile']).' | '.trim($row['supplier_secondary_code']).' | '.trim($row['supplier_company_name']);
            }
        }
        return $data_arr;
    }
}