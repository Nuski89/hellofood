<?php $this->load->view('system/include/header', $title); 
$this->load->view('system/include/navigation');
$this->load->view($main_content,$extra);
$this->load->view('system/include/footer'); 