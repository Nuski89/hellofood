<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Model_login','login');
        $this->lang->load('all','english');
   	}

   	function index($message=null,$type=null,$head=null){
		if ($this->session->userdata('status')){
			redirect(site_url('dashboard'));
		}else{
			$data['alert']['message']	= $message;
			$data['alert']['head']		= $head;
			$data['alert']['type']		= $type;
			$data['extra'] 				= null;
			$data['title']          	= $this->lang->line('login_page');
	        $data['main_content']   	= 'login_page';
	        $this->load->view('include/template',$data);		
		}		
	}

	function session_status(){
		$status = ($this->session->userdata("status")) ? 1 : 0;
		echo json_encode(array('status'=>$status));
	}

	function session_expaide(){
	   $this->index($this->lang->line('login_session_is_expired'),'warning',$this->lang->line('login_leave_before_logout_system'));
	}

	function forget_password($message=null,$type=null,$head=null){
		$data['alert']['message']	= $message;
		$data['alert']['head']		= $head;
		$data['alert']['type']		= $type;
		$data['extra'] 				= null;
		$data['title']          	= $this->lang->line('login_forget_password');
	    $data['main_content']   	= 'forget_password_page';
	    $this->load->view('include/template',$data);
	}

	function reset_password($message='Security thread ! Your Password is not set yet.',$type='warning'){
		$mess['message']		= $message;
		$mess['type']			= $type;		
		$data['alert'] 			= $mess;
		$this->load->view('set_newpassword_view',$data);
	}	

	function login_submit(){
   		$this->form_validation->set_rules('username','lang:login_username','trim|valid_email|required');
   		$this->form_validation->set_rules('password','lang:login_password','trim|min_length[8]|max_length[15]|required');
		if($this->form_validation->run()==FALSE){	
			$this->index($result['message']=validation_errors(),$result['type']='error',$this->lang->line('login_make_sure_user_credentials'));
		}else{
			$login_data['userN'] 	= $this->input->post('username');
			$login_data['passW'] 	= md5($this->input->post('password'));
			$result              	= $this->login->authenticate_person($login_data);
			if ($result['status']==1) {
				if ($login_data['passW'] == md5('123456')){
					$this->reset_password();
				}else{					
					redirect(site_url('dashboard'));
				}
			}else{
				$this->index($result['message'],$result['type'],$result['head']);
			}
		}	
	}

	function forgot_password(){	
		$this->form_validation->set_rules('username','lang:login_username','trim|valid_email|required');
        if($this->form_validation->run()==FALSE){
        	$this->forget_password($message = validation_errors(), $type = 'error');
        }else {
        	$reset_data['email'] = $this->input->post('username');
        	$result = $this->login->resetpassword($reset_data);
        	if ($result['status'] == 1) {
        		$this->forget_password($result['message'],$result['type'],$result['head']);
        	}
        	else{
        		$this->forget_password($result['message'],$result['type'],$result['head']);
        	}
		}
	}

	function set_new_password(){	
        $this->form_validation->set_rules('Password1','lang:login_password 1','trim|required|min_length[8]|max_length[20]');
		$this->form_validation->set_rules('Password2','lang:login_password 2','trim|required|matches[Password1]'); 
        if($this->form_validation->run()==FALSE){
        	$this->reset_password($message=validation_errors(),$type='error');
        }elseif(!$this->login->set_newpassword()) {
			$this->reset_password($message='Security thread!! Your Security Question is not set yet. Try Again ! ',$type='error');
		}else{
			$msgtype = 'success';
			$msg     = $this->session->userdata('fullname').' Your New Password is Set Successfully.';
			$this->index($msg,$msgtype);
		}
	}

   	function logout(){
   		unset($_SESSION['status']);
		$this->session->sess_destroy();
		$this->index($result['message']= $this->lang->line('login_successfully_logout_form_system'),$result['type']='success');
	}
}