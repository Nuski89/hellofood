<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('calcutateAge')) {
    function calcutateAge($dob){
        $dob = date("Y-m-d",strtotime($dob));
        $dobObject = new DateTime($dob);
        $nowObject = new DateTime();
        $diff = $dobObject->diff($nowObject);
        return $diff->y;
    }
}

if (!function_exists('contact_details')) {
    function contact_details($email=null,$landphone=nulgl,$mobile_number=null,$fax=null){
        $contact_details = '';
        if ($email) {
            $contact_details .= "<i class='fa fa-envelope-o color'></i> &nbsp; {$email}";
        }
        if ($landphone) {
            $contact_details .= "&nbsp;&nbsp;<i class='fa fa-phone color'></i> &nbsp; {$landphone}";
        }
        if ($mobile_number) {
            $contact_details .= "&nbsp;&nbsp;<i class='fa fa-mobile color'></i> &nbsp; {$mobile_number}";
        }
        if ($fax) {
            $contact_details .= "&nbsp;&nbsp;<i class='fa fa-fax color'></i> &nbsp; {$fax}";
        }
        return $contact_details;
    }
}

if (!function_exists('document_status')) {
    function document_status($document_auto_id,$auto_id,$is_status){
        $CI =& get_instance();
        $status = '<center>';
        if ($is_status==2) {
            $status .= "<a class='text-success' onclick='document_detail_modal(\"$document_auto_id\",\"$auto_id\");' data-toggle='tooltip' data-placement='bottom' title='{$CI->lang->line('approved_document')}'><i class='fa fa-plus-square-o fa-2x' aria-hidden='true'></i></a>";
        }elseif ($is_status==3) {
            $status .= "<a class='text-info' onclick='document_detail_modal(\"$document_auto_id\",\"$auto_id\");' data-toggle='tooltip' data-placement='bottom' title='{$CI->lang->line('drafted_document')}'><i class='fa fa-plus-square-o fa-2x' aria-hidden='true'></i></a>";
        }elseif ($is_status==4) {
            $status .= "<a class='text-primary' onclick='document_detail_modal(\"$document_auto_id\",\"$auto_id\");' data-toggle='tooltip' data-placement='bottom' title='{$CI->lang->line('conformed_document')}'><i class='fa fa-plus-square-o fa-2x' aria-hidden='true'></i></a>";
        }
        elseif ($is_status==5) {
            $status .= "<a class='text-warning' onclick='document_detail_modal(\"$document_auto_id\",\"$auto_id\");' data-toggle='tooltip' data-placement='bottom' title='{$CI->lang->line('referred_back_document')}'><i class='fa fa-plus-square-o fa-2x' aria-hidden='true'></i></a>";
        }elseif ($is_status==6) {
            $status .= "<a class='text-danger' onclick='document_detail_modal(\"$document_auto_id\",\"$auto_id\");' data-toggle='tooltip' data-placement='bottom' title='{$CI->lang->line('closed_document')}'><i class='fa fa-plus-square-o fa-2x' aria-hidden='true'></i></a>";
        }
        $status .= '</center>';
        return $status;
    }
}

if (!function_exists('party_name')) {
    function party_name($system_code,$party_name,$secondary_code,$group_name){
        return "{$system_code} - {$party_name} ( {$secondary_code} ) {$group_name}";
    }
}

if (!function_exists('address')) {
    function address($address,$city){
        return "{$address} {$city}";
    }
}

if (!function_exists('checkbox_status')){
    function checkbox_status($status){
        return ($status == 2 ? "checked" : " ");        
    }   
}


if (!function_exists('sales_status')){
    function sales_status($status){
        return ($status == 2 ?'<span class="label label-warning">Pending</span>':'<span class="label label-success">Paid</span>');
    }   
}

if (!function_exists('required_mark')) {
    function required_mark(){
        return '&nbsp;<span title="required field" style="color:red; font-weight: 600; font-size: 13px;">* </span>';
    }
}

if (!function_exists('datatable_class')) {
    function datatable_class(){
        return 'table table-striped table-condensed';
    }
}

if (!function_exists('report_datatable_class')) {
    function report_datatable_class(){
        return 'table table-striped table-bordered table-condensed';
    }
}

if (!function_exists('pos_datatable_class')) {
    function pos_datatable_class(){
        return 'table table-condensed';
    }
}

if (!function_exists('pop_over')) {
    function pop_over($title,$placement='right',$content='',$status=0){
        return ($status ? $title.'&nbsp;<span title="required field" style="color:red; font-weight: 600; font-size: 13px;">*</span>&nbsp;'."<a data-toggle='popover' data-html='true' data-placement='{$placement}' title='{$title}' data-content='{$content}'><i class='fa fa-question-circle' aria-hidden='true'></i></a>&nbsp;&nbsp;" : ' ');
    }
}

if (!function_exists('datatable_status')){
    function datatable_status($status){
        return ($status == 2 ? "checked" : " ");
    }
}

if (!function_exists('datatable_action')){
    function datatable_action($document_auto_id,$auto_id,$is_status,$system_code){
        $CI =& get_instance();
        $code               = strtolower($CI->lang->line('document')['code'][$document_auto_id]);
        $is_delete          = 1;
        $attachment_icon    = '<i class="fa fa-paperclip fa-1x color"></i>';
        $edit_icon          = '<i class="fa fa-pencil fa-1x color"></i>';
        $delete_icon        = '<i class="fa fa-trash-o fa-1x text-danger" aria-hidden="true"></i>';
        $preview_icon       = '<i class="fa fa-eye fa-1x color" aria-hidden="true"></i>';
        $status = '<span class="pull-right">';
        if ($document_auto_id==46) {
            $status .= "<span><a class='btn btn-default btn-sm' data-toggle='tooltip' data-placement='left' title='{$CI->lang->line('attachments')}' onclick='attachment_modal(\"$document_auto_id\",\"$auto_id\",\"$is_delete\");'>{$attachment_icon}</a> ";
            $status .= "<a class='btn btn-default btn-sm' data-toggle='tooltip' data-placement='bottom' title='{$CI->lang->line('preview')}' onclick='preview_{$code}(\"$auto_id\",\"$auto_id\");'>{$preview_icon}</a></span>";
            if ($is_status==3) {
                $status .= "<br><span><a style='margin-top: 4px;' class='btn btn-default btn-sm' data-toggle='tooltip' data-placement='left' title='{$CI->lang->line('edit')}' onclick='edit_{$code}(\"$auto_id\",\"$system_code\");'>{$edit_icon}</a> ";
                $status .= "<a style='margin-top: 4px;' class='btn btn-default btn-sm' data-toggle='tooltip' data-placement='bottom' title='{$CI->lang->line('delete')}' onclick='delete_{$code}(\"$auto_id\",\"$system_code\");'>{$delete_icon}</a></span>";
            }
        }
        $status .= '</span>';
        return $status;
    }
}