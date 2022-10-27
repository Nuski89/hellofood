<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends MYT_Controller {

	function __construct(){
        parent::__construct();
   	}

	function index(){
        $data['title']        = $this->lang->line('common_profile');
        $data['extra']        = null;
        $data['main_content'] = 'system/profile';
        $this->load->view('system/include/layout',$data);
	}

}