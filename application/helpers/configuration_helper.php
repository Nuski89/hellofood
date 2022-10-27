<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_css_files')) {
    function get_css_files(){
        return array(
            array('path' =>'plugins/bootstrap/css/bootstrap.min.css', 'media' => 'all'),
            array('path' =>'plugins/icon/font-awesome-4.7.0/css/font-awesome.min.css', 'media' => 'all'),
            array('path' =>'plugins/theme/css/AdminLTE.min.css', 'media' => 'all'),
            array('path' =>'plugins/theme/css/skins/_all-skins.min.css', 'media' => 'all'),
            array('path' =>'plugins/pace/pace.css', 'media' => 'all'),
            array('path' =>'plugins/theme/css/animate.min.css', 'media' => 'all'),
            array('path' =>'plugins/select2/select2.min.css', 'media' => 'all'),
            array('path' =>'plugins/select2/bootstrap-multiselect.css', 'media' => 'all'),
            array('path' =>'plugins/datatables/datatables.min.css', 'media' => 'all'),
            array('path' =>'plugins/theme/css/waves.min.css', 'media' => 'all'),
            array('path' =>'plugins/theme/css/custom.css', 'media' => 'all'),
            array('path' =>'plugins/sweetalert2/sweetalert2.min.css', 'media' => 'all'),
            array('path' =>'plugins/bootstrap_validation/css/bootstrapValidator.min.css', 'media' => 'all'),
            array('path' =>'plugins/Holdon/HoldOn.min.css', 'media' => 'all'),
            array('path' =>'plugins/toastr/toastr.min.css', 'media' => 'all'),
            array('path' =>'plugins/datatables/buttons.dataTables.min.css', 'media' => 'all')

        );
    }
}

if (!function_exists('get_js_files')) {
    function get_js_files(){
        if(!defined("ENVIRONMENT") or ENVIRONMENT == 'development'){
            return array(
                array('path' =>'plugins/jQuery/jquery-2.2.3.min.js'),
                array('path' =>'plugins/bootstrap/js/bootstrap.min.js'),
                array('path' =>'plugins/fastclick/fastclick.min.js'),
                array('path' =>'plugins/bootstrap_validation/js/bootstrapValidator.min.js'),
                array('path' =>'plugins/pace/pace.min.js'),
                array('path' =>'plugins/theme/js/app.js'),
                array('path' =>'plugins/select2/select2.full.min.js'),
                array('path' =>'plugins/select2/bootstrap-multiselect.js'),
                array('path' =>'plugins/datatables/datatables.min.js'),
                array('path' =>'plugins/jQuery/jquery.autocomplete.min.js'),
                array('path' =>'plugins/theme/js/waves.min.js'),
                array('path' =>'plugins/jQuery/jquery.validate.js'),
                array('path' =>'plugins/sweetalert2/sweetalert2.min.js'),
                array('path' =>'plugins/pagination/paginga.jquery.js'),
                array('path' =>'plugins/shortcut/shortcut.js'),
                array('path' =>'plugins/Holdon/HoldOn.min.js'),
                array('path' =>'plugins/toastr/toastr.min.js'),
                array('path' =>'plugins/input-mask/jquery.inputmask.js'),
                array('path' =>'plugins/input-mask/jquery.inputmask.date.extensions.js'),
                array('path' =>'plugins/jQuery/jquery.autocomplete.min.js'),
                array('path' =>'plugins/slimScroll/jquery.slimscroll.min.js'),
                array('path' =>'plugins/datatables/jquery.dataTables.min.js'),
                array('path' =>'plugins/datatables/dataTables.buttons.min.js'),
                array('path' =>'plugins/datatables/jszip.min.js'),
                array('path' =>'plugins/datatables/pdfmake.min.js'),
                array('path' =>'plugins/datatables/vfs_fonts.js'),
                array('path' =>'plugins/datatables/buttons.html5.min.js'),
                array('path' =>'plugins/datatables/buttons.colVis.min.js'),
                array('path' =>'plugins/datatables/dataTables.colReorder.js'),

                // array('path' =>'js/jquery.loadmask.min.js'),
                // array('path' =>'plugins/node_modules/socket.io/node_modules/socket.io-client/socket.io.js'),
            );
        }

        return array(
            array('path' =>'js/all.js'),
        );
    }
}

if (!function_exists('html_value')) {
    function html_value($str){
    	$str = stripslashes($str);
        return htmlspecialchars($str);
    }
}

if (!function_exists('table_class')) {
    function table_class(){
        return 'table table-striped table-condensed';
    }
}

if (!function_exists('fetch_supplier_data')) {
    function fetch_supplier_data($supplier_auto_id){
    	$CI =& get_instance();
        $CI->db->select("supplier_system_code,group_name,supplier_company_name,supplier_email,supplier_fax,supplier_address,supplier_secondary_code,supplier_phone,supplier_city,supplier_country_name,supplier_currency_auto_id");
        $CI->db->from('hrm_suppliers');
        $CI->db->where('supplier_auto_id', $supplier_auto_id);
        $CI->db->where('company_auto_id', $CI->_['company_auto_id']);
        return $CI->db->get()->row_array();
    }
}

if (!function_exists('fetch_item_data')) {
    function fetch_item_data($item_auto_id){
        $CI =& get_instance();
        $CI->db->select("*");
        $CI->db->from('com_items');
        $CI->db->where('item_auto_id', $item_auto_id);
        $CI->db->where('company_auto_id', $CI->_['company_auto_id']);
        return $CI->db->get()->row_array();
    }
}

if (!function_exists('character_limiter')) {
    function character_limiter($str, $n = 500, $end_char = '&#8230;'){
        if (strlen($str) < $n){
            return $str;
        }
        return substr($str,0, $n).$end_char;
    }
}

if (!function_exists('currency_conversion')) {
    function currency_conversion($trans_currency_auto_id, $againce_currency_auto_id, $amount = 0){
        /*********************************************************************************************
         * Always transaction is going with transaction currency [ Transaction Currency => OMR ]
         * If we want to know the reporting amount [ Reporting Currency => USD ]
         * So the currency_conversion functions 1st parameter will be the USD [what we looking for ]
         * And the 2nd parameter will be the OMR [what we already got]
         *
         * Ex :
         *    Transaction currency  =>  OMR     => $trCurrency  OR  $trans_currency_auto_id
         *    Transaction Amount    =>  1000/-  => $trAmount    OR  $amount
         *    Reporting Currency    =>  USD     => $reCurrency  OR  $againce_currency_auto_id
         *
         *    $conversionData  = currency_conversion($trCurrency, $reCurrency, $trAmount);
         *    $conversionRate  = $conversionData['conversion'];
         *    $decimalPlace    = $conversionData['DecimalPlaces'];
         *    $reportingAmount = round( ($trAmount / $conversionRate) , $decimalPlace );
         **********************************************************************************************/
        $data = array();
        $CI =& get_instance();
        if ($trans_currency_auto_id == $againce_currency_auto_id) {
            $CI->db->select('currency_auto_id,currency_code,currency_symbol,decimal_places,currency_name');
            $CI->db->from('com_currencies');
            $CI->db->where('currency_auto_id', $trans_currency_auto_id);
            $CI->db->where('company_auto_id', $CI->_['company_auto_id']);
            $data_arr = $CI->db->get()->row_array();
            $data['currency_auto_id']   = $data_arr['currency_auto_id'];
            $data['conversion']         = 1;
            $data['currency_code']      = $data_arr['currency_code'];
            $data['currency_symbol']    = $data_arr['currency_symbol'];
            $data['currency_name']      = $data_arr['currency_name'];
            $data['decimal_places']     = $data_arr['decimal_places'];
            $data['converted_amount']   = ($amount * 1);
        } else {
            $CI->db->select('com_currencies.currency_auto_id,conversion_rate,currency_code,currency_name,currency_symbol ,decimal_places');
            $CI->db->from('com_currency_conversions');
            $CI->db->where('com_currency_conversions.master_currency_auto_id', $trans_currency_auto_id);
            $CI->db->where('com_currency_conversions.sub_currency_auto_id', $againce_currency_auto_id);
            $CI->db->where('com_currency_conversions.company_auto_id', $CI->_['company_auto_id']);
            $CI->db->join('com_currencies', 'com_currencies.currency_auto_id = com_currency_conversions.sub_currency_auto_id');
            $data_arr = $CI->db->get()->row_array();
            $data['currency_auto_id']   = $data_arr['currency_auto_id'];
            $data['conversion']         = $data_arr['conversion_rate'];
            $data['currency_code']      = $data_arr['currency_code'];
            $data['currency_symbol']    = $data_arr['currency_symbol'];
            $data['currency_name']      = $data_arr['currency_name'];
            $data['decimal_places']     = $data_arr['decimal_places'];
            $data['converted_amount']   = ($amount * $data_arr['conversion_rate']);
        }
        return $data;
    }
}

if (!function_exists('to_currency')) {
    function to_currency($number,$symbol='',$decimals=2){
        $CI =& get_instance();
        $thousands_separator = $CI->_['app']['currency_separator'] ? $CI->_['app']['currency_separator'] : ',';
        $side = $CI->_['app']['currency_side'] ? $CI->_['app']['currency_side'] : 0;
        if(empty($number)){
            $number = 0;
        }
        if($number >= 0){
            if($side){
                return number_format($number, $decimals, '.', $thousands_separator).' '.$symbol;
            }else{
                return $symbol.' '.number_format($number, $decimals, '.', $thousands_separator);
            }
        }else{
            if($side){
                return '-'.$symbol.number_format(abs($number), $decimals, '.', $thousands_separator);
            }else{
                return '-'.number_format(abs($number), $decimals, '.', $thousands_separator).$symbol;
            }
        }
    }
}

// the conversion function company local currency
if (!function_exists('to_local_currency')) {
    function to_local_currency($number){
        $CI =& get_instance();
        $currency_symbol = $CI->_['app']['company_currency_symbol'] ? $CI->_['app']['company_currency_symbol'] : '';
        $thousands_separator = $CI->_['app']['company_currency_separator'] ? $CI->_['app']['company_currency_separator'] : '';
        $decimals = $CI->_['app']['company_currency_decimal'] ? $CI->_['app']['company_currency_decimal'] : 2;
        // the conversion function needs a non null var, so if the number is null set it to 0
        if(empty($number)){
            $number = 0;
        }
        if($number >= 0){
            return $currency_symbol.' '.number_format($number, $decimals, '.', $thousands_separator);
        }else{
            return "<span style='color:red;'>".$currency_symbol.' ('.number_format($number, $decimals, '.', $thousands_separator).')</span>';
        }
    }
}

if (!function_exists('to_currency_only')) {
    function to_currency_only($number){
        $CI =& get_instance();
        $thousands_separator = $CI->_['app']['company_currency_separator'] ? $CI->_['app']['company_currency_separator'] : '';
        $decimals = $CI->_['app']['company_currency_decimal'] ? $CI->_['app']['company_currency_decimal'] : 2;
        if(empty($number)){
            $number = 0;
        }
        if($number >= 0){
            return number_format($number, $decimals, '.', $thousands_separator);
        }else{
            return number_format($number, $decimals, '.', $thousands_separator);
        }
    }
}

if (!function_exists('to_total_currency')) {
    function to_total_currency($amount,$qty){
        $CI =& get_instance();
        $thousands_separator = $CI->_['app']['company_currency_separator'] ? $CI->_['app']['company_currency_separator'] : '';
        $decimals = $CI->_['app']['company_currency_decimal'] ? $CI->_['app']['company_currency_decimal'] : 2;
        $number = ($amount*$qty);
        if(empty($number)){
            $number = 0;
        }
        if($number >= 0){
            return number_format($number, $decimals, '.', $thousands_separator);
        }else{
            return number_format($number, $decimals, '.', $thousands_separator);
        }
    }
}

if (!function_exists('check_hold_type')) {
    function check_hold_type($id){
        $CI =& get_instance();
        return $CI->lang->line("holds")[$id];
    }
}

if (!function_exists('to_qty_uom')) {
    function to_qty_uom($number,$uom){
        if(empty($number)){
            return $number;
        }
        return ($uom =='Each' ? $number.' '.$uom : $uom.' '.$number);
    }
}

if (!function_exists('arr_to_csv_line')) {
    function arr_to_csv_line($arr) {
        $line = array();
        foreach ($arr as $v) {
            $line[] = is_array($v) ? arr_to_csv_line($v) : '"' . str_replace('"', '""', $v) . '"';
        }
        return implode(",", $line);
    }
}

if (!function_exists('array_to_csv')) {
    function array_to_csv($arr) {
        $lines = array();
        foreach ($arr as $v) {
            $lines[] = arr_to_csv_line($v);
        }
        return implode("\n", $lines);
    }
}

if (!function_exists('print_date_format')) {
    function print_date_format($date){
        return date("jS F Y", strtotime($date));
    }
}

if (!function_exists('timezone_arr')) {
    function timezone_arr(){
        $timezone_arr['Pacific/Midway']='(UTC-11:00) Midway Island';
        $timezone_arr['Pacific/Samoa']='(UTC-11:00) Samoa';
        $timezone_arr['Pacific/Honolulu']='(UTC-10:00) Hawaii';
        $timezone_arr['US/Alaska']='(UTC-09:00) Alaska';
        $timezone_arr['America/Los_Angeles']='(UTC-08:00) Pacific Time (US &amp; Canada)';
        $timezone_arr['America/Tijuana']='(UTC-08:00) Tijuana';
        $timezone_arr['US/Arizona']='(UTC-07:00) Arizona';
        $timezone_arr['America/Chihuahua']='(UTC-07:00) Chihuahua';
        $timezone_arr['America/Chihuahua']='(UTC-07:00) La Paz';
        $timezone_arr['America/Mazatlan']='(UTC-07:00) Mazatlan';
        $timezone_arr['US/Mountain']='(UTC-07:00) Mountain Time (US &amp; Canada)';
        $timezone_arr['America/Managua']='(UTC-06:00) Central America';
        $timezone_arr['US/Central']='(UTC-06:00) Central Time (US &amp; Canada)';
        $timezone_arr['America/Mexico_City']='(UTC-06:00) Guadalajara';
        $timezone_arr['America/Mexico_City']='(UTC-06:00) Mexico City';
        $timezone_arr['America/Monterrey']='(UTC-06:00) Monterrey';
        $timezone_arr['Canada/Saskatchewan']='(UTC-06:00) Saskatchewan';
        $timezone_arr['America/Bogota']='(UTC-05:00) Bogota';
        $timezone_arr['US/Eastern']='(UTC-05:00) Eastern Time (US &amp; Canada)';
        $timezone_arr['US/East-Indiana']='(UTC-05:00) Indiana (East)';
        $timezone_arr['America/Lima']='(UTC-05:00) Lima';
        $timezone_arr['America/Bogota']='(UTC-05:00) Quito';
        $timezone_arr['Canada/Atlantic']='(UTC-04:00) Atlantic Time (Canada)';
        $timezone_arr['America/Caracas']='(UTC-04:30) Caracas';
        $timezone_arr['America/La_Paz']='(UTC-04:00) La Paz';
        $timezone_arr['America/Santiago']='(UTC-04:00) Santiago';
        $timezone_arr['Canada/Newfoundland']='(UTC-03:30) Newfoundland';
        $timezone_arr['America/Sao_Paulo']='(UTC-03:00) Brasilia';
        $timezone_arr['America/Argentina/Buenos_Aires']='(UTC-03:00) Buenos Aires';
        $timezone_arr['America/Argentina/Buenos_Aires']='(UTC-03:00) Georgetown';
        $timezone_arr['America/Godthab']='(UTC-03:00) Greenland';
        $timezone_arr['America/Noronha']='(UTC-02:00) Mid-Atlantic';
        $timezone_arr['Atlantic/Azores']='(UTC-01:00) Azores';
        $timezone_arr['Atlantic/Cape_Verde']='(UTC-01:00) Cape Verde Is.';
        $timezone_arr['Africa/Casablanca']='(UTC+00:00) Casablanca';
        $timezone_arr['Europe/London']='(UTC+00:00) Edinburgh';
        $timezone_arr['Etc/Greenwich']='(UTC+00:00) Greenwich Mean Time : Dublin';
        $timezone_arr['Europe/Lisbon']='(UTC+00:00) Lisbon';
        $timezone_arr['Europe/London']='(UTC+00:00) London';
        $timezone_arr['Africa/Monrovia']='(UTC+00:00) Monrovia';
        $timezone_arr['UTC']='(UTC+00:00) UTC';
        $timezone_arr['Europe/Amsterdam']='(UTC+01:00) Amsterdam';
        $timezone_arr['Europe/Belgrade']='(UTC+01:00) Belgrade';
        $timezone_arr['Europe/Berlin']='(UTC+01:00) Berlin';
        $timezone_arr['Europe/Berlin']='(UTC+01:00) Bern';
        $timezone_arr['Europe/Bratislava']='(UTC+01:00) Bratislava';
        $timezone_arr['Europe/Brussels']='(UTC+01:00) Brussels';
        $timezone_arr['Europe/Budapest']='(UTC+01:00) Budapest';
        $timezone_arr['Europe/Copenhagen']='(UTC+01:00) Copenhagen';
        $timezone_arr['Europe/Ljubljana']='(UTC+01:00) Ljubljana';
        $timezone_arr['Europe/Madrid']='(UTC+01:00) Madrid';
        $timezone_arr['Europe/Paris']='(UTC+01:00) Paris';
        $timezone_arr['Europe/Prague']='(UTC+01:00) Prague';
        $timezone_arr['Europe/Rome']='(UTC+01:00) Rome';
        $timezone_arr['Europe/Sarajevo']='(UTC+01:00) Sarajevo';
        $timezone_arr['Europe/Skopje']='(UTC+01:00) Skopje';
        $timezone_arr['Europe/Stockholm']='(UTC+01:00) Stockholm';
        $timezone_arr['Europe/Vienna']='(UTC+01:00) Vienna';
        $timezone_arr['Europe/Warsaw']='(UTC+01:00) Warsaw';
        $timezone_arr['Africa/Lagos']='(UTC+01:00) West Central Africa';
        $timezone_arr['Europe/Zagreb']='(UTC+01:00) Zagreb';
        $timezone_arr['Europe/Athens']='(UTC+02:00) Athens';
        $timezone_arr['Europe/Bucharest']='(UTC+02:00) Bucharest';
        $timezone_arr['Africa/Cairo']='(UTC+02:00) Cairo';
        $timezone_arr['Africa/Harare']='(UTC+02:00) Harare';
        $timezone_arr['Europe/Helsinki']='(UTC+02:00) Helsinki';
        $timezone_arr['Europe/Istanbul']='(UTC+02:00) Istanbul';
        $timezone_arr['Asia/Jerusalem']='(UTC+02:00) Jerusalem';
        $timezone_arr['Europe/Helsinki']='(UTC+02:00) Kyiv';
        $timezone_arr['Africa/Johannesburg']='(UTC+02:00) Pretoria';
        $timezone_arr['Europe/Riga']='(UTC+02:00) Riga';
        $timezone_arr['Europe/Sofia']='(UTC+02:00) Sofia';
        $timezone_arr['Europe/Tallinn']='(UTC+02:00) Tallinn';
        $timezone_arr['Europe/Vilnius']='(UTC+02:00) Vilnius';
        $timezone_arr['Asia/Baghdad']='(UTC+03:00) Baghdad';
        $timezone_arr['Asia/Kuwait']='(UTC+03:00) Kuwait';
        $timezone_arr['Europe/Minsk']='(UTC+03:00) Minsk';
        $timezone_arr['Africa/Nairobi']='(UTC+03:00) Nairobi';
        $timezone_arr['Asia/Riyadh']='(UTC+03:00) Riyadh';
        $timezone_arr['Europe/Volgograd']='(UTC+03:00) Volgograd';
        $timezone_arr['Asia/Tehran']='(UTC+03:30) Tehran';
        $timezone_arr['Asia/Muscat']='(UTC+04:00) Abu Dhabi';
        $timezone_arr['Asia/Baku']='(UTC+04:00) Baku';
        $timezone_arr['Europe/Moscow']='(UTC+04:00) Moscow';
        $timezone_arr['Asia/Muscat']='(UTC+04:00) Muscat';
        $timezone_arr['Europe/Moscow']='(UTC+04:00) St. Petersburg';
        $timezone_arr['Asia/Tbilisi']='(UTC+04:00) Tbilisi';
        $timezone_arr['Asia/Yerevan']='(UTC+04:00) Yerevan';
        $timezone_arr['Asia/Kabul']='(UTC+04:30) Kabul';
        $timezone_arr['Asia/Karachi']='(UTC+05:00) Islamabad';
        $timezone_arr['Asia/Karachi']='(UTC+05:00) Karachi';
        $timezone_arr['Asia/Tashkent']='(UTC+05:00) Tashkent';
        $timezone_arr['Asia/Calcutta']='(UTC+05:30) Chennai';
        $timezone_arr['Asia/Kolkata']='(UTC+05:30) Kolkata';
        $timezone_arr['Asia/Calcutta']='(UTC+05:30) Mumbai';
        $timezone_arr['Asia/Calcutta']='(UTC+05:30) New Delhi';
        $timezone_arr['Asia/Colombo']='(UTC+05:30) Sri Jayawardenepura';
        $timezone_arr['Asia/Katmandu']='(UTC+05:45) Kathmandu';
        $timezone_arr['Asia/Almaty']='(UTC+06:00) Almaty';
        $timezone_arr['Asia/Dhaka']='(UTC+06:00) Astana';
        $timezone_arr['Asia/Dhaka']='(UTC+06:00) Dhaka';
        $timezone_arr['Asia/Yekaterinburg']='(UTC+06:00) Ekaterinburg';
        $timezone_arr['Asia/Rangoon']='(UTC+06:30) Rangoon';
        $timezone_arr['Asia/Bangkok']='(UTC+07:00) Bangkok';
        $timezone_arr['Asia/Bangkok']='(UTC+07:00) Hanoi';
        $timezone_arr['Asia/Jakarta']='(UTC+07:00) Jakarta';
        $timezone_arr['Asia/Novosibirsk']='(UTC+07:00) Novosibirsk';
        $timezone_arr['Asia/Hong_Kong']='(UTC+08:00) Beijing';
        $timezone_arr['Asia/Chongqing']='(UTC+08:00) Chongqing';
        $timezone_arr['Asia/Hong_Kong']='(UTC+08:00) Hong Kong';
        $timezone_arr['Asia/Krasnoyarsk']='(UTC+08:00) Krasnoyarsk';
        $timezone_arr['Asia/Kuala_Lumpur']='(UTC+08:00) Kuala Lumpur';
        $timezone_arr['Australia/Perth']='(UTC+08:00) Perth';
        $timezone_arr['Asia/Singapore']='(UTC+08:00) Singapore';
        $timezone_arr['Asia/Taipei']='(UTC+08:00) Taipei';
        $timezone_arr['Asia/Ulan_Bator']='(UTC+08:00) Ulaan Bataar';
        $timezone_arr['Asia/Urumqi']='(UTC+08:00) Urumqi';
        $timezone_arr['Asia/Irkutsk']='(UTC+09:00) Irkutsk';
        $timezone_arr['Asia/Tokyo']='(UTC+09:00) Osaka';
        $timezone_arr['Asia/Tokyo']='(UTC+09:00) Sapporo';
        $timezone_arr['Asia/Seoul']='(UTC+09:00) Seoul';
        $timezone_arr['Asia/Tokyo']='(UTC+09:00) Tokyo';
        $timezone_arr['Australia/Adelaide']='(UTC+09:30) Adelaide';
        $timezone_arr['Australia/Darwin']='(UTC+09:30) Darwin';
        $timezone_arr['Australia/Brisbane']='(UTC+10:00) Brisbane';
        $timezone_arr['Australia/Canberra']='(UTC+10:00) Canberra';
        $timezone_arr['Pacific/Guam']='(UTC+10:00) Guam';
        $timezone_arr['Australia/Hobart']='(UTC+10:00) Hobart';
        $timezone_arr['Australia/Melbourne']='(UTC+10:00) Melbourne';
        $timezone_arr['Pacific/Port_Moresby']='(UTC+10:00) Port Moresby';
        $timezone_arr['Australia/Sydney']='(UTC+10:00) Sydney';
        $timezone_arr['Asia/Yakutsk']='(UTC+10:00) Yakutsk';
        $timezone_arr['Asia/Vladivostok']='(UTC+11:00) Vladivostok';
        $timezone_arr['Pacific/Auckland']='(UTC+12:00) Auckland';
        $timezone_arr['Pacific/Fiji']='(UTC+12:00) Fiji';
        $timezone_arr['Pacific/Kwajalein']='(UTC+12:00) International Date Line West';
        $timezone_arr['Asia/Kamchatka']='(UTC+12:00) Kamchatka';
        $timezone_arr['Asia/Magadan']='(UTC+12:00) Magadan';
        $timezone_arr['Pacific/Fiji']='(UTC+12:00) Marshall Is.';
        $timezone_arr['Asia/Magadan']='(UTC+12:00) New Caledonia';
        $timezone_arr['Asia/Magadan']='(UTC+12:00) Solomon Is.';
        $timezone_arr['Pacific/Auckland']='(UTC+12:00) Wellington';
        $timezone_arr['Pacific/Tongatapu']='(UTC+13:00) Nuku\'alofa';
        return $timezone_arr;
    }
}
