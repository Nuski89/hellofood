<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Loger extends MYT_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Model_loger','loger');
   	}

    function index(){
        $data['title']          = 'System Log';
        $data['extra']          = $this->loger->system_log();
        $data['main_content']   = 'system/log/loger';
        $this->load->view('system/include/layout',$data);
    }
}