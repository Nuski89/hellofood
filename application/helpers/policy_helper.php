<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('policy_water_mark_status')) {
    function policy_water_mark_status()
    {
        $CI =& get_instance();
        $CI->db->SELECT("srp_erp_companypolicymaster.companypolicymasterID");
        $CI->db->FROM('srp_erp_companypolicymaster');
        $CI->db->join('srp_erp_companypolicy', 'srp_erp_companypolicy.companypolicymasterID = srp_erp_companypolicymaster.companypolicymasterID');
        $CI->db->where('srp_erp_companypolicymaster.companypolicymasterID', 1);
        $CI->db->where('is_active', 1);
        $CI->db->where('isYN', 1);
        $CI->db->where('companyID', $CI->common_data['company_data']['company_id']);
        $data = $CI->db->get()->row_array();
        if (!empty($data)) {
            return 1;
        }
        return 0;
    }
}

if (!function_exists('db_date_format')) {
    function db_date_format($date){
        return date_format($date,'Y-m-d H:i:s'); 
    }
}

if (!function_exists('convert_date_format')) { 
    function convert_date_format($date, $format, $defaultFormat = 'Y-m-d'){
        if (!is_null($date)) {
            switch ($format) {
                case "mm-dd-yyyy":
                    return date($defaultFormat, strtotime($date));
                    break;
                case "dd-mm-yyyy":
                    return date($defaultFormat, strtotime($date));
                    break;
                case "yyyy-mm-dd":
                    return date($defaultFormat, strtotime($date));
                    break;
                case "mm/dd/yyyy":
                    $date = str_replace('/', '-', $date);
                    return date($defaultFormat, strtotime($date));
                    break;
                case "dd/mm/yyyy":
                    $date = str_replace('/', '-', $date);
                    return date($defaultFormat, strtotime($date));
                    break;
                case "yyyy/mm/dd":
                    $date = str_replace('/', '-', $date);
                    return date($defaultFormat, strtotime($date));
                    break;
                default:
                    return date($defaultFormat, strtotime($date));
                    break;
            }
        } else {
            return '';
        }
    }
}