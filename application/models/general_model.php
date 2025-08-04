<?php 
class General_model extends CI_Model{
	function fetch_config($branch_auto_id,$company_auto_id){
    	$data_arr = array();
        $this->load->driver('cache',array('adapter' => 'apc', 'backup' => 'file'));
        if (!$data_arr = $this->cache->get("00000{$branch_auto_id}_{$company_auto_id}")){
            $this->db->select('*');
        	$this->db->from('config');
        	$this->db->where('company_auto_id', $company_auto_id);
        	$data_arr = $this->db->get()->row_array();
			$this->cache->save("00000{$branch_auto_id}_{$company_auto_id}", $data_arr, 30000);
            echo "please discuss with nuski";
            exit();//please discuss with nuski
        }
        return $data_arr;
    }
}