<?php 
class Model_login extends CI_Model{

	function authenticate_person($person_data){
		$this->db->select('employee_auto_id,employee_login_email,employee_login_password,employee_login_status,employee_login_attempt,employee_img_path,is_admin,is_active,branch_auto_id,company_auto_id,employee_name');
		$this->db->where("employee_login_email",$person_data['userN']);
		$login_data = $this->db->get("hrm_employees")->row_array();
		if (!empty($login_data)) {
			if ($login_data['employee_login_password'] == $person_data['passW']) {
				if ($login_data['employee_login_status'] == 2 && $login_data['is_active'] == 2) {
					$this->load->driver('cache',array('adapter' => 'apc', 'backup' => 'file'));
					$session_data = array(
						'employee_auto_id'    	=> $login_data['employee_auto_id'],
						'employee_name'   		=> $login_data['employee_name'],
						'employee_email'		=> $login_data['employee_login_email'],
						'employee_img_path'		=> $login_data['employee_img_path'],
						'register_auto_id'		=> 0,
						'branch_auto_id'		=> $login_data['branch_auto_id'],
						'company_auto_id'		=> $login_data['company_auto_id'],
						'is_admin'				=> $login_data['is_admin'],
						'hold_type'				=> 0,
						'hold_auto_id'			=> 0,
						'sales_auto_id'			=> 0,
						'status'				=> 1
					);
					$this->session->set_userdata($session_data);
					$this->db->where("employee_auto_id", $login_data['employee_auto_id']);
					$this->db->update('hrm_employees', array('employee_login_attempt' => 0, 'employee_login_token' => null));
        			$this->db->select('*');
			        $this->db->from('config');
			        $this->db->join('branches', 'branches.company_auto_id = config.company_auto_id');
        			$this->db->where('config.company_auto_id', $login_data['company_auto_id']); 
        			$this->db->where('branch_auto_id', $login_data['branch_auto_id']); 
        			$data_arr = $this->db->get()->row_array();
        			$this->session->set_userdata('language', $data_arr['company_default_language']);
			        $this->cache->save("00000{$login_data['branch_auto_id']}_{$login_data['company_auto_id']}",$data_arr,30000);
					$data['status']	= 1;
			 		return $data;
				}else{
					if ($login_data['employee_login_status'] != 2) {
						$data['status']	= 0;
			 			$data['type']	= "error";
			 			$data['head']	= $this->lang->line('login_permanently_deactivated');
			 			$data['message']= $login_data['userN'].$this->lang->line('login_permanently_deactivated_message');
			 			return $data;
					}
					$data['status']	= 0;
			 		$data['type']	= "warning";
			 		$data['head']	= $this->lang->line('login_temporarily_deactivated');
			 		$data['message']= $login_data['userN'].$this->lang->line('login_temporarily_deactivated_message');
			 		return $data;
				}
			}else{
				if ($login_data['employee_login_attempt'] < 5) {
					$attempt_count = $login_data['employee_login_attempt'] + 1;
					$data = array('employee_login_attempt' => $attempt_count);
					$this->db->where("employee_auto_id", $login_data['employee_auto_id']);
					$this->db->update('hrm_employees', $data);
					$data['status']		= 0;
					$data['type']		= "error";
					$data['head']		= $this->lang->line('login_credentials');
					$data['message']	= $this->lang->line('login_invalid_username_and_password');
					return $data;
				}else{
					/// Reach Attempt Count Max and Deactivate Account
					$data = array('employee_login_status' => 3);
					$this->db->where("employee_auto_id", $login_data['employee_auto_id']);
					$this->db->update('hrm_employees', $data);
					$data['status']		= 0;
					$data['type']		= "error";
					$data['head']		= $this->lang->line('login_credentials');
					$data['message']	= $this->lang->line('login_too_many_failled_employee_login_attempts');
					return $data;
				}				
			}				
		}else{
			$data['status']		= 0;
			$data['type']		= "error";
			$data['head']		= $this->lang->line('login_credentials');
			$data['message']	= $this->lang->line('login_invalid_username_and_password');
			return $data;
		}
	}
	
}