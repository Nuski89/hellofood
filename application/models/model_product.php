<?php
class Model_product extends CI_Model{

    function fetch_product_data(){
        $product_auto_id = trim($this->input->get_post('product_auto_id'));
        $this->db->select("*");
        $this->db->from("products");
        $this->db->where("company_auto_id={$this->_['company_auto_id']}");
        $this->db->where('product_auto_id', $product_auto_id);
        return $this->db->get()->row_array();
    }

    function all_products(){
        $data = array();
        $this->db->select("*");
        $this->db->from("products");
        $this->db->order_by("product_auto_id", "asc");
        $this->db->where("company_auto_id",$this->_['company_auto_id']);
        $products_arr = $this->db->get()->result_array();
        return $products_arr;
    }

    function save_product(){
        $product_auto_id = trim($this->input->get_post('product_auto_id'));
        $this->db->trans_begin();
        $type = $this->lang->line('common_created');
        $product_data = $this->input->post(NULL, TRUE);
        $product_data['product_photo']   = 'default.jpg';
        $product_data['product_status']  = 2;
        $product_data['company_auto_id'] = $this->_['company_auto_id'];

        if ($product_auto_id) {
            $this->db->where('product_auto_id', $product_auto_id);
            $this->db->update('products', $product_data);
            $last_id = $product_auto_id;
            $type=$this->lang->line('common_updated');
        }else{
            $this->db->insert('products', $product_data);
            $last_id = $this->db->insert_id();
        }

        $config['overwrite']        = TRUE;
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_width']        = '1000';
        $config['max_height']       = '1000';
        $config['upload_path']      = './images/products';
        $config['file_name']        = $last_id;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('product_image')) {
            $data = array(
                'upload_data' => $this->upload->data()
            );
            $this->resize($data['upload_data']['full_path'], 't_'.$data['upload_data']['file_name']);
            $this->crop($data['upload_data']['full_path'], 'c_'.$data['upload_data']['file_name']);
            $this->db->where('product_auto_id', $last_id);
            $this->db->update('products', array('product_photo'=>$data['upload_data']['file_name']));
        }

        $this->db->trans_complete();
        if($this->db->trans_status()===0){
            $this->db->trans_rollback();
            $log = $this->logger->log_event(0,$this->lang->line('product_module'),5,$product_data['product_name'].$type.$this->lang->line('failed'),$this->lang->line('product_module'),$last_id);
        }else{
            $this->db->trans_commit();
            $log = $this->logger->log_event(1,$this->lang->line('product_module'),2,$product_data['product_name'].$type.$this->lang->line('successfully'),$this->lang->line('product_module'),$last_id);
        }
        return $log;
    }

    function resize($path, $file)
    {
        $config['image_library']    = 'gd2';
        $config['source_image']     = $path;
        $config['overwrite']        = TRUE;
        //$config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = FALSE;
        // $config['maintain_thum']    = TRUE;
        $config['quality']          = "100%";
        $config['width']            = 220;
        $config['height']           = 220;
        $config['new_image']        = './images/products/'.$file;

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }


    function crop($path, $file){
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['new_image'] = './images/products/'.$file;
        $config['quality'] = "100%";
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 220;
        $config['height'] = 220;
        $config['x_axis'] = '0';
        $config['y_axis'] = '0';

        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        $this->image_lib->crop();
    }

    function change_product_status(){
        $product_auto_id = trim($this->input->get_post('product_auto_id'));
        $this->db->select('product_name,product_status');
        $this->db->where('product_auto_id',$product_auto_id);
        $this->db->where('company_auto_id', $this->_['company_auto_id']);
        $this->db->from('products');
        $data_arr = $this->db->get()->row_array();
        if ($data_arr['product_status']==2) {
            $data['product_status']            = 3;
            $log = $this->logger->log_event(1,$this->lang->line('product_status_deactivated'),4,$data_arr['product_name'].$this->lang->line('successfully'),$this->lang->line('product_module'),$product_auto_id);
        }else{
            $data['product_status']            = 2;
            $log = $this->logger->log_event(1,$this->lang->line('product_status_activated'),2,$data_arr['product_name'].$this->lang->line('successfully'),$this->lang->line('product_module'),$product_auto_id);
        }
        $this->db->where('product_auto_id', $product_auto_id);
        $this->db->update('products', $data);
        return $log;
    }

    function change_pin_status(){
        $product_auto_id = trim($this->input->get_post('product_auto_id'));
        $this->db->select('product_name,product_pin');
        $this->db->where('product_auto_id',$product_auto_id);
        $this->db->where('company_auto_id', $this->_['company_auto_id']);
        $this->db->from('products');
        $data_arr = $this->db->get()->row_array();
        if ($data_arr['product_pin']==2) {
            $data['product_pin']            = 3;
            $log = $this->logger->log_event(1,$this->lang->line('product_status_unpined'),4,$data_arr['product_name'].$this->lang->line('successfully'),$this->lang->line('product_module'),$product_auto_id);
        }else{
            $data['product_pin']            = 2;
            $log = $this->logger->log_event(1,$this->lang->line('product_status_pined'),2,$data_arr['product_name'].$this->lang->line('successfully'),$this->lang->line('product_module'),$product_auto_id);
        }
        $this->db->where('product_auto_id', $product_auto_id);
        $this->db->update('products', $data);
        return $log;
    }

    function fetch_all_categories(){
        $data_arr=array();
        $data_arr['query'] ='test';
        $data_arr['suggestions'] =[];
        $company_auto_id = $this->_['company_auto_id'];
        $search_string = $_GET['query']."%";
        $data = $this->db->query('SELECT product_category FROM tbl_products WHERE (product_category LIKE "'.$search_string.'") AND company_auto_id = "'.$company_auto_id.'" GROUP BY product_category')->result_array();
        if(!empty($data)){
            foreach($data as $val){
                $data_arr['suggestions'][] = array('value'=>$val["product_category"]);
            }
        }
        return $data_arr;
    }

    function fetch_all_product(){
        $this->db->select("*");
        $this->db->from("products");
        $this->db->where("company_auto_id={$this->_['company_auto_id']}");
        return $this->db->get()->result_array();
    }

    function new_code(){
        $this->db->select("product_code");
        $this->db->from("products");
        $this->db->order_by("product_code", "desc");
        $this->db->where("company_auto_id={$this->_['company_auto_id']}");
        $num = $this->db->get()->row('product_code');
        return ($num+1);
    }

    function do_excel_import(){
        set_time_limit(0);
        $this->db->trans_start();
        $msg = 'do_excel_import';
        $failCodes = array();
        if ($_FILES['file_path']['error']!=UPLOAD_ERR_OK){
            $msg = $this->lang->line('items_excel_import_failed');
            return array('success'=>0,'message'=>$msg);

        }else{
            if (($handle = fopen($_FILES['file_path']['tmp_name'], "r")) !== FALSE){
                //Skip first row
                fgetcsv($handle);
                while (($data = fgetcsv($handle)) !== FALSE){
                    $product_data['product_auto_id'] = null;
                    $type_id=0;
                    for ($i=0; $i < count($this->lang->line("product_group_arr")); $i++) {
                        if ($this->lang->line("product_group_arr")[$i]==$data[1]) {
                            $type_id = $i;
                        }
                    }
                    $product_data = array(
                        'product_auto_id'=>$data[0],
                        'product_type_id'=>$type_id,
                        'product_code'=>$data[2],
                        'product_name'=>$data[3],
                        'product_category'=>$data[4],
                        'product_cost'=>$data[5],
                        'product_price'=>$data[6],
                        'product_wholesale_price'=>$data[7],
                        'product_reorder_level'=>$data[8],
                        'product_options'=>$data[9],
                        // 'product_photo'=> 'default.jpg',
                        'product_status'=> ($data[10]=='active' ? 2 : 3),
                        'company_auto_id'=> $this->_['company_auto_id'],
                    );

                    /// Check requested PRODUCT ID available or not
                    $file_product_auto_id = trim($product_data['product_auto_id']);
                    $this->db->select('product_auto_id');
                    $this->db->where('product_auto_id',$file_product_auto_id);
                    $this->db->where('company_auto_id', $this->_['company_auto_id']);
                    $this->db->from('products');
                    $data_arr = $this->db->get()->row_array();

                    if ($product_data['product_auto_id']) {
                        if ($data_arr['product_auto_id']) {
                            $this->db->where('product_auto_id', $product_data['product_auto_id']);
                            $this->db->update('products', $product_data);
                        }else{
                            $this->db->insert('products', $product_data);
                        }
                    }else{
                        $this->db->insert('products', $product_data);
                    }

                }
            }else{
                return array('success'=>0,'message'=>$this->lang->line('common_upload_file_not_supported_format'));
            }
        }
        $this->db->trans_complete();
        return array('success'=>1,'message'=>$this->lang->line('items_import_successful'));
    }

    function get_items_barcode_data($item_ids){
        $item_ids = explode('~', $item_ids);
        foreach ($item_ids as $product_auto_id){
            $this->db->select("product_name,product_price");
            $this->db->from("products");
            $this->db->where("company_auto_id={$this->_['company_auto_id']}");
            $this->db->where('product_auto_id', $product_auto_id);
            $item_info = $this->db->get()->row_array();
            $result[] = array('name' =>to_currency($item_info['product_price'],$this->_['app']['company_currency_symbol'],$this->_['app']['company_currency_decimal']).' '.$item_info['product_name'],'id'=>str_pad($product_auto_id, 10, '0', STR_PAD_LEFT));
        }
        return $result;
    }
}
