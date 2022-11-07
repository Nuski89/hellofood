<?php 
class Model_dashboard extends CI_Model{

	function fetch_product_details(){
        $company_auto_id    = $this->_['company_auto_id'];
        $branch_auto_id     = $this->_['branch_auto_id'];
        $products           = $this->db->dbprefix('products');
        return $this->db->query("SELECT count(*) AS total,sum(CASE WHEN product_status = 3 THEN 1 ELSE 0 END) AS deactive,sum(CASE WHEN product_status =  2 THEN 1 ELSE 0 END) AS active FROM {$products} where branch_auto_id={$branch_auto_id} and company_auto_id={$company_auto_id}")->row_array(); 
    }

    function fetch_sale_details(){
        $date               = date('Y-m-d');
        $company_auto_id    = $this->_['company_auto_id'];
        $branch_auto_id     = $this->_['branch_auto_id'];
        $transactions       = $this->db->dbprefix('transactions');
        return $this->db->query("SELECT sum(net_amount) AS total,sum( CASE WHEN status = 3 THEN net_amount ELSE 0 END ) AS pending,sum( CASE WHEN status = 4 THEN net_amount ELSE 0 END ) AS sales,sum( CASE WHEN status = 5 THEN net_amount ELSE 0 END ) AS void,sum( CASE WHEN status = 6 THEN net_amount ELSE 0 END ) AS return_ FROM {$transactions} where branch_auto_id={$branch_auto_id} and company_auto_id={$company_auto_id} AND YEAR ( transaction_date ) = YEAR (CURRENT_DATE()) AND MONTH ( transaction_date ) = MONTH (CURRENT_DATE()) AND transaction_type = 1 AND transaction_date = '{$date}' ")->row_array();
    }

    function fetch_employee_details(){
        $company_auto_id    = $this->_['company_auto_id'];
        $branch_auto_id     = $this->_['branch_auto_id'];
        $employee           = $this->db->dbprefix('hrm_employees');
        return $this->db->query("SELECT count(*) AS total,sum(CASE WHEN is_active = 3 THEN 1 ELSE 0 END) AS deactive,sum(CASE WHEN is_active =  2 THEN 1 ELSE 0 END) AS active FROM {$employee} where branch_auto_id={$branch_auto_id} and company_auto_id={$company_auto_id}")->row_array(); 
    }

    function fetch_bar_details(){
        $company_auto_id    = $this->_['company_auto_id'];
        $branch_auto_id     = $this->_['branch_auto_id'];
        $transactions       = $this->db->dbprefix('transactions');
        $data_arr = $this->db->query("SELECT sum(net_amount) AS total,sum( CASE WHEN status = 4 THEN net_amount ELSE 0 END ) AS sales,sum( CASE WHEN status = 4 THEN qty ELSE 0 END ) AS sales_item,sum( CASE WHEN status = 5 THEN net_amount ELSE 0 END ) AS void,sum( CASE WHEN status = 5 THEN qty ELSE 0 END ) AS void_item,sum( CASE WHEN status = 6 THEN net_amount ELSE 0 END ) AS return_,sum( CASE WHEN status = 6 THEN qty ELSE 0 END ) AS return_item,sum(total_tax) AS tax,sum(total_discount) AS discount, DATE_FORMAT(transaction_date, '%m') AS month FROM tbl_transactions where branch_auto_id={$branch_auto_id} and company_auto_id={$company_auto_id} and transaction_type=1 GROUP BY DATE_FORMAT(transaction_date, '%m-%Y')")->result_array();
        $data = array();
        $data['month'] = array();
        $data['net_amount'] = array();
        $data['sales'] = array();
        $data['void'] = array();
        $data['return'] = array();
        $data['tax'] = array();
        $data['discount'] = array();
        $data['total_revenue'] = 0;
        $data['net_profit'] = 0;
        $data['total_item'] = 0;
        $data['total_sales'] = 0;
        $data['total_void'] = 0;
        $data['total_return'] = 0;
        $data['total_tax'] = 0;
        $data['total_discount'] = 0;

        for ($i=1; $i < 13; $i++) { 
            $status = 1;
            array_push($data['month'], $this->lang->line('months')[$i]);
            foreach ($data_arr as $key => $value) {
                if ($i == $value['month']) {
                    array_push($data['net_amount'], floatval($value['total']));
                    array_push($data['sales'], floatval($value['sales']));
                    array_push($data['void'], floatval($value['void']));
                    array_push($data['return'], floatval($value['return_']));
                    array_push($data['tax'], floatval($value['tax']));
                    array_push($data['discount'], floatval($value['discount']));
                    $data['total_revenue'] += floatval($value['total']);
                    $data['net_profit'] += 0;
                    $data['total_item'] += floatval($value['sales_item']);
                    $data['total_sales'] += floatval($value['sales']);
                    $data['total_void'] += floatval($value['void']);
                    $data['total_return'] += floatval($value['return_']);
                    $data['total_tax'] += floatval($value['tax']);
                    $data['total_discount'] += floatval($value['discount']);
                    $status = 0;
                }
            }
            if ($status) {
                array_push($data['net_amount'], 0);
                array_push($data['sales'], 0);
                array_push($data['void'], 0);
                array_push($data['return'], 0);
                array_push($data['tax'], 0);
                array_push($data['discount'], 0);
            }
        }
        return $data;
    }
}