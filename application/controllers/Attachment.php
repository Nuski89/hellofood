<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Attachment extends MYT_Controller {

	function fetch_attachments(){
		$document_auto_id = $this->input->post('document_auto_id');
        $this->db->where('attachment_maste_id', $this->input->post('attachment_maste_id'));
        $this->db->where('document_auto_id', $document_auto_id);
        $this->db->where('company_auto_id', $this->_['company_auto_id']);
        $data['attachments'] = $this->db->get('sys_attachments')->result_array();
        $data['name'] = $this->lang->line('common_attachment').$this->lang->line('document')['name'][$document_auto_id];
        echo json_encode($data);
    }

    function do_upload($description = true){
        //$this->load->model('upload_modal');
        if ($description) {
            $this->form_validation->set_rules('attachment_description', 'Attachment Description', 'trim|required');
            $this->form_validation->set_rules('document_auto_id', 'document SystemCode', 'trim|required');
            $this->form_validation->set_rules('attachment_maste_id', 'document_name', 'trim|required');
        }
        //$this->form_validation->set_rules('document_file', 'File', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status'=>0,'log_status'=>5,'title'=>$this->lang->line('common_attachment_uplode'),'message'=> validation_errors()));
        } else {
            $this->db->trans_start();
            $this->db->select('company_auto_id');
            $this->db->where('attachment_maste_id', trim($this->input->post('attachment_maste_id')));
            $num = $this->db->get('sys_attachments')->result_array();
            $file_name = $this->input->post('attachment_maste_id') . '_' . $this->input->post('document_auto_id') . '_' . (count($num) + 1);
            $config['upload_path'] 	 = realpath(APPPATH . '../attachments');
            $config['allowed_types'] = 'gif|jpg|jpeg|png|doc|docx|ppt|pptx|ppsx|pdf|xls|xlsx|xlsxm|rtf|msg|txt|7zip|zip|rar';
            $config['max_size'] 	 = '5120'; // 5 MB
            $config['file_name'] 	 = $file_name;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload("document_file")) {
                echo json_encode(array('status'=>0,'type'=>'w','message'=>'Upload failed '.$this->upload->display_errors()));
            } else {
                $upload_data = $this->upload->data();
                $data['attachment_maste_id'] 	= $this->input->post('attachment_maste_id');
                $data['document_auto_id'] 		= $this->input->post('document_auto_id');
                $data['attachment_description'] = $this->input->post('attachment_description');
                $data['attachment_name'] 		= $file_name . $upload_data["file_ext"];
                $data['attachment_file_type'] 	= $upload_data["file_ext"];
                $data['attachment_file_size'] 	= $upload_data["file_size"];
                $data['company_auto_id'] 		= $this->_['company_auto_id'];
                $this->db->insert('sys_attachments', $data);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    echo json_encode(array('status'=>0,'type'=>'e','message'=>'Upload failed '.$this->db->_error_message()));
                } else {
                    $this->db->trans_commit();
                    echo json_encode(array('status'=>1,'type'=>'s','message'=>'Successfully ' . $file_name . ' uploaded.'));
                }
            }
        }
    }

    function delete_attachment(){
        $this->db->delete('sys_attachments', array('attachment_auto_id' => trim($this->input->post('attachment_auto_id'))));
        echo json_encode(true);
    }
}