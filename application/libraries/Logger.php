<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Logger{

    private $CI;
    private $log_path;

    public $levels = array(
        E_ERROR             => 'Error',
        E_WARNING           => 'Warning',
        E_PARSE             => 'Parsing Error',
        E_NOTICE            => 'Notice',
        E_CORE_ERROR        => 'Core Error',
        E_CORE_WARNING      => 'Core Warning',
        E_COMPILE_ERROR     => 'Compile Error',
        E_COMPILE_WARNING   => 'Compile Warning',
        E_USER_ERROR        => 'User Error',
        E_USER_WARNING      => 'User Warning',
        E_USER_NOTICE       => 'User Notice',
        E_STRICT            => 'Runtime Notice',
        E_RECOVERABLE_ERROR => 'Catchable error',
        E_DEPRECATED        => 'Runtime Notice',
        E_USER_DEPRECATED   => 'User Warning'
    );

    public function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->database();
        $this->CI->load->library('session');
        $this->CI->load->library('user_agent');
        set_error_handler(array($this, 'error_handler'));
        set_exception_handler(array($this, 'exception_handler'));// Load database driver
        $this->log_path = APPPATH.'logs/'.date('Y');
    }

    /**
     * PHP Error Handler
     *
     * @param   int
     * @param   string
     * @param   string
     * @param   int
     * @return  void
     */
    public function error_handler($severity, $message, $filepath, $line)
    {
        $data = array(
            'error_no'              => $severity,
            'error_type'            => isset($this->levels[$severity]) ? $this->levels[$severity] : $severity,
            'error_description'     => $message,
            'error_file'            => $filepath,
            'error_line_no'         => $line,
            'user_agent'            => $this->CI->input->user_agent(),
            'ip_address'            => $this->CI->input->ip_address(),
            'username'              => $this->CI->session->userdata('fullname'),
            'pc_name'               => gethostbyaddr($_SERVER['REMOTE_ADDR']),
            'date_time'             => date('Y-m-d h:i:s A').' -|-'
        );

        // Write the contents to the file, 
        // using the FILE_APPEND flag to append the content to the end of the file
        // and the LOCK_EX flag to prevent anyone else writing to the file at the same time
        $file = $this->log_path.'_error_log.txt';
        file_put_contents($file, implode("|",$data), FILE_APPEND | LOCK_EX);
    }

    /**
     * PHP Error Handler
     *
     * @param  object
     * @return void
     */
    public function exception_handler($exception){
        $data = array(
            'error_no'              => $exception->getCode(),
            'error_type'            => isset($this->levels[$exception->getCode()]) ? $this->levels[$exception->getCode()] : $exception->getCode(),
            'error_description'     => $exception->getMessage(),
            'error_file'            => $exception->getFile(),
            'error_line_no'         => $exception->getLine(),
            'user_agent'            => $this->CI->input->user_agent(),
            'ip_address'            => $this->CI->input->ip_address(),
            'username'              => $this->CI->session->userdata('fullname'),
            'pc_name'               => gethostbyaddr($_SERVER['REMOTE_ADDR']),
            'date_time'             => date('Y-m-d h:i:s A').' -|-'
        );

        $file = $this->log_path.'_exception_log.txt';
        file_put_contents($file, implode("|",$data), FILE_APPEND | LOCK_EX);
    }

    public function log_event($status=1,$event=null,$log_status=7,$desc=null,$document=null,$last_inserted_id=0,$sql=0){   
        $data = array(
            'event'             => $event,
            'document_code'     => $document,
            'status'            => $status,
            'log_status'        => $log_status,
            'description'       => $desc,
            'sql'               => ($sql ==0 ? $this->CI->db->last_query() : $sql),
            'date_time'         => date('Y-m-d h:i:s A'),
            'person_auto_id'    => $this->CI->session->userdata('person_auto_id'),
            'full_name'         => $this->CI->session->userdata('person_fullname'),
            'ip_address'        => $this->CI->input->ip_address(),
            'useragent'         => $this->CI->agent->browser() . " on " . $this->CI->agent->platform(),
            'pc_name'           => gethostbyaddr($_SERVER['REMOTE_ADDR']),
            'company_auto_id'   => $this->CI->session->userdata('company_auto_id').' -|-'
        );

        $file = $this->log_path.'_system_log.txt';
        file_put_contents($file, implode("|",$data), FILE_APPEND | LOCK_EX);
        return array('status' =>$status,'last_inserted_id' =>$last_inserted_id,'log_status' =>$log_status,'title'=> $event,'message'=> $desc); 
    }
}