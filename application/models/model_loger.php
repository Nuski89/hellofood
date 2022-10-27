<?php 
class Model_loger extends CI_Model{
	
    function system_log(){
        $data['system_log'] = array();
        $data['error_log'] = array();
        $data['exception_log'] = array();
        $file = FCPATH . 'application/logs/'.date('Y').'_system_log.txt';
        if (file_exists($file)) {
            $log = file_get_contents($file, FILE_USE_INCLUDE_PATH, null); 
            $lines = explode("-|-", $log);
            for ($i=0; $i < (count($lines)-1); $i++) { 
                $line = explode("|", $lines[$i]);
                //if ($line[12]==$this->_['company_auto_id']) {
                    $data_arr = array();
                    $data_arr['event'] = $line[0];
                    $data_arr['document_code'] = $line[1];
                    $data_arr['status'] = $line[2];
                    $data_arr['log_status'] = $line[3];
                    $data_arr['description'] = $line[4];
                    $data_arr['sql'] = $line[5];
                    $data_arr['date_time'] = $line[6];
                    $data_arr['person_auto_id'] = $line[7];
                    $data_arr['full_name'] = $line[8];
                    $data_arr['ip_address'] = $line[9];
                    $data_arr['useragent'] = $line[10];
                    $data_arr['pc_name'] = $line[11];
                    array_push($data['system_log'], $data_arr);
                //}   
            }
        }
        $file = FCPATH . 'application/logs/'.date('Y').'_error_log.txt';
        if (file_exists($file)) {
            $log = file_get_contents($file, FILE_USE_INCLUDE_PATH, null); 
            $lines = explode("-|-", $log);
            for ($i=0; $i < (count($lines)-1); $i++) { 
                $line = explode("|", $lines[$i]);
                //if ($line[12]==$this->_['company_auto_id']) {
                    $data_arr = array();
                    $data_arr['error_no'] = $line[0];
                    $data_arr['error_type'] = $line[1];
                    $data_arr['error_description'] = $line[2];
                    $data_arr['error_file'] = $line[3];
                    $data_arr['error_line_no'] = $line[4];
                    $data_arr['user_agent'] = $line[5];
                    $data_arr['ip_address'] = $line[6];
                    $data_arr['username'] = $line[7];
                    $data_arr['pc_name'] = $line[8];
                    $data_arr['date_time'] = $line[9];
                    array_push($data['error_log'], $data_arr);
                //}   
            }
        }
        $file = FCPATH . 'application/logs/'.date('Y').'_exception_log.txt';
        if (file_exists($file)) {
            $log = file_get_contents($file, FILE_USE_INCLUDE_PATH, null); 
            $lines = explode("-|-", $log);
            for ($i=0; $i < (count($lines)-1); $i++) { 
                $line = explode("|", $lines[$i]);
                //if ($line[12]==$this->_['company_auto_id']) {
                    $data_arr = array();
                    $data_arr['error_no'] = $line[0];
                    $data_arr['error_type'] = $line[1];
                    $data_arr['error_description'] = $line[2];
                    $data_arr['error_file'] = $line[3];
                    $data_arr['error_line_no'] = $line[4];
                    $data_arr['user_agent'] = $line[5];
                    $data_arr['ip_address'] = $line[6];
                    $data_arr['username'] = $line[7];
                    $data_arr['pc_name'] = $line[8];
                    $data_arr['date_time'] = $line[9];
                    array_push($data['exception_log'], $data_arr);
                //}   
            }
        }
        return $data;
    }
    
}