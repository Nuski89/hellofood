<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MYT_Controller extends CI_Controller {
	var $_ = array();
    function __construct() {
        parent::__construct();
        $CI =& get_instance();
        $this->_['status']   = FALSE;
        //$this->output->enable_profiler(True);
        if (!$CI->session->has_userdata('status')) {
            redirect(site_url('login/session_expaide')); 
        }else{
            $this->_['status']             = TRUE;
            $this->_['company_auto_id']    = $CI->session->userdata("company_auto_id");
            $this->_['branch_auto_id']     = $CI->session->userdata("branch_auto_id");
            $this->_['group_name']         = $CI->session->userdata("group_name");
            $this->_['app']                = $CI->general->fetch_config($this->_['branch_auto_id'],$this->_['company_auto_id']);
            $this->_['employee_auto_id']   = $CI->session->userdata("employee_auto_id");
            $this->_['employee_name']      = ucwords($CI->session->userdata("employee_name"));
            $this->_['employee_email']     = $CI->session->userdata("employee_email");
            $this->_['employee_img_path']  = $CI->session->userdata("employee_img_path");
            $this->_['is_admin']           = $CI->session->userdata("is_admin");
            $this->_['current_pc']         = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $this->_['current_date']       = date('Y-m-d');
            $this->_['current_date_time']  = date('Y-m-d h:i:s');
            $this->_['language']           = ($CI->session->userdata("language") ? $CI->session->userdata("language") : $this->_['app']['branch_language']);
            $this->lang->load('all', $this->_['language']);
            $this->_['location_auto_id']   = '';
            date_default_timezone_set($this->_['app']['branch_timezone']);
        }
	}
}