<div class="box box-color animated zoomIn">
    <div class="box-header with-border" id="box-header-with-border">
        <h3 class="box-title tab_title"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('product_new_product'); ?></h3>
        <div class="box-tools pull-right">
            <a class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></a>
            <a class="btn btn-box-tool" href="#all_products" data-toggle="tab" onclick="load_tab(0)"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="box-body">
        <?php echo form_open_multipart('', 'role="form" id="product_form"'); ?>
            <br><div class="row">
                <div class="col-sm-3" ><center>
                    <div class="fileinput-new thumbnail" style="margin-bottom: 4px; width: 200px; height: 100%;">
                        <img src="<?php echo base_url('images/no-image.png'); ?>" id="changeImg">
                        <input type="file" name="product_image" id="product_image" style="display: none;" onchange="loadImage(this)"/>
                    </div></center>
                    <input type="hidden" name="product_auto_id" id="product_auto_id">
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label for="product_type"><?php echo pop_over($this->lang->line('type'),'left','<b>Stock Tracking</b> : With reorder level <br/><b>None Stock Tracking</b> : Without reorder level <br/><b>Service</b> :  Free <br/><b>Combination</b> : More than one items',1); ?></label>
                            <?php echo form_dropdown('product_type_id',$this->lang->line('product_group_arr'),$this->lang->line('product_group_arr')[1],'id="product_type_id" class="form-control select2"'); ?>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="product_code"><?php echo pop_over($this->lang->line('code'),'top','Index number of your menu item.',1); ?></label>
                            <div class="input-group">
                                <input type="text" class="form-control number" id="product_code" name="product_code" placeholder="<?php echo $this->lang->line('code'); ?>" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" onclick="new_code()" type="button"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="product_category"><?php echo pop_over($this->lang->line('category'),'top','Your product category list. <br/>(Ex : Appetizers, Sandwiches, Deserts)',1); ?></label>
                            <input type="text" class="form-control" id="product_category" name="product_category" placeholder="<?php echo $this->lang->line('category'); ?>" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="product_name"><?php echo $this->lang->line('product_name').required_mark(); ?></label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="<?php echo $this->lang->line('product_name'); ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="product_cost"><?php echo $this->lang->line('product_cost').required_mark(); ?></label>
                            <div class="input-group">
                                <div class="input-group-addon"><?php echo $this->_['app']['company_currency_code']; ?></div>
                                <input type="text" value="350" class="form-control number" id="product_cost" name="product_cost" placeholder="0.00" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="product_price"><?php echo $this->lang->line('selling_price').required_mark(); ?></label>
                            <div class="input-group">
                                <div class="input-group-addon"><?php echo $this->_['app']['company_currency_code']; ?></div>
                                <input type="text" value="350" class="form-control number" id="product_price" name="product_price" placeholder="0.00" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="product_price"><?php echo $this->lang->line('selling_wholesale_price'); ?></label>
                            <div class="input-group">
                                <div class="input-group-addon"><?php echo $this->_['app']['company_currency_code']; ?></div>
                                <input type="text" value="350" class="form-control number" id="product_wholesale_price" name="product_wholesale_price" placeholder="0.00" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="product_discount"><?php echo $this->lang->line('discount'); ?></label>
                            <div class="input-group">
                                <input type="text" class="form-control number" name="product_discount" id="product_discount" placeholder="00"/>
                                <div class="input-group-addon">%</div>
                            </div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="product_reorder_level"><?php echo pop_over($this->lang->line('reorder_level'),'top','Enter a value that system will remind you when your product decrease to that level. <br/>(Ex : 10, 25, 50)',1); ?></label>
                            <input type="text" value="10" class="form-control number" id="product_reorder_level" name="product_reorder_level" placeholder="00">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="warranty_period"><?php echo $this->lang->line('warranty_period'); ?></label>
                            <div class="input-group">
                                <div class="input-group-addon"><?php echo $this->lang->line('day'); ?></div>
                                <input type="text" class="form-control number" name="warranty_period" id="warranty_period" placeholder="00"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="product_number"><?php echo $this->lang->line('isbn'); ?></label>
                            <input class="form-control" id="product_number" name="product_number" placeholder="<?php echo $this->lang->line('isbn'); ?>">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="fixed_price"><?php echo $this->lang->line('fixed_price');?></label>
                            <?php echo form_dropdown('fixed_price',array('1' =>'Yes','0' =>'No'),'1','id="fixed_price" class="form-control select2"'); ?>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="product_supplier_auto_id"><?php echo $this->lang->line('supplier');?></label>
                            <?php echo form_dropdown('product_supplier_auto_id',$extra,'','id="product_supplier_auto_id" class="form-control select2"'); ?>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="product_options"><?php echo $this->lang->line('product_options'); ?></label>
                            <input class="form-control" id="product_options" name="product_options" placeholder="<?php echo $this->lang->line('product_options'); ?>">
                        </div>
                        <div class="form-group col-sm-6">

                        </div>
                    </div>
                    <hr class="hr">
                    <div class="text-right m-t-xs">
                        <button class="btn btn-primary tab_title" data-loading-text="<?php echo $this->lang->line('loading_btn'); ?>" autocomplete="off" type="submit"><i class="fa fa-plus" aria-hidden="true"></i>  <?php echo $this->lang->line('product_new_product'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
var product_auto_id;
$(document).ready(function () {
    window.product_auto_id = null;
    form_wizard();
    number_validation();
    initialize_category_typeahead();
    $("[data-mask]").inputmask();
    $('.select2').select2({width: '100%'});
    $('#product_form').bootstrapValidator({
        live: 'enabled',
        message: 'This value is not valid.',
        excluded: [':disabled'],
        fields: {
            product_code     : {validators: {notEmpty: {message: 'Code is required.'}}},
            product_name     : {validators: {notEmpty: {message: 'Name is required.'}}},
            product_category : {validators: {notEmpty: {message: 'Category is required.'}}},
            product_cost     : {validators: {notEmpty: {message: 'Cost is required.'}}},
            product_price    : {validators: {notEmpty: {message: 'Price is required.'}}},
        },
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        var $btn = $(this).button();
        var bv = $form.data('bootstrapValidator');
        var data = new FormData($("#product_form")[0]);
        //data.push({'name': 'product_auto_id', 'value': window.product_auto_id});
        //data.push({'name': 'product_type', 'value': $('select#product_type_id option:selected').text()});
        $.ajax({
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            // type: 'post',
            dataType: 'json',
            // data: data,
            url: "<?php echo site_url('product/save_product'); ?>",
            beforeSend: function () {
                start_loading();
            },
            success: function (data) {
                stop_loading();
                simple_alert(data['log_status'],data['title'],data['message']);
                if (data['status']) {
                    load_tab(1);
                    product_table.draw();
                    socket_sender();
                }
            },
            error: function () {
                stop_loading();
                simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
            }
        });
    });
});

$('#changeImg').click(function () {
    $('#product_image').click();
});

function loadImage(obj) {
    if (obj.files && obj.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#changeImg').attr('src', e.target.result);
        };
        reader.readAsDataURL(obj.files[0]);
    }
}

function initialize_category_typeahead(){
    $('#product_category').autocomplete({
        serviceUrl: '<?php echo site_url("product/fetch_all_categories"); ?>',
        minChars: 0,autoFocus: false,delay: 10,
        onSelect: function (data_arr) {

        }
    });
}

function edit_product(product_auto_id,product_full_name){
    $('.tab_title').html('&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> &nbsp;Update '+product_full_name);
    $('[href="#new_product"]').tab('show');
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {'product_auto_id':product_auto_id,"product_full_name":product_full_name},
        url: "<?php echo site_url('product/fetch_product_data'); ?>",
        beforeSend: function () {
            $('#product_form .form-control').addClass('loading_gif');
        },
        success: function (data) {
            $('#product_form .form-control').removeClass('loading_gif');
            if (!jQuery.isEmptyObject(data)) {
                window.product_auto_id = data['product_auto_id'];
                $('#product_type_id').val(data['product_type_id']).change();
                $('#product_auto_id').val(data['product_auto_id']);
                $('#product_code').val(data['product_code']);
                $('#product_name').val(data['product_name']);
                $('#product_category').val(data['product_category']);
                $('#product_cost').val(data['product_cost']);
                $('#product_wholesale_price').val(data['product_wholesale_price']);
                $('#product_price').val(data['product_price']);
                $('#product_discount').val(data['product_discount']);
                $('#product_reorder_level').val(data['product_reorder_level']);
                $('#product_options').val(data['product_options']);
                $("#changeImg").attr("src","images/products/"+data['product_photo']);
                $("#product_img").attr("src","images/products/"+data['product_photo']);
                $('#product_supplier_auto_id').val(data['product_supplier_auto_id']).change();
                $('.wizard_control .btn-wizard').removeClass('disabled');
            }
        },
        error: function () {
            simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
        }
    });
}

function form_reset(){
    $('.navbar-nav a[href="#new_product"]').tab('show');
    $('#product_form').bootstrapValidator('resetForm', true);
    $('#product_form')[0].reset();
    $("#changeImg").attr("src","images/products/default.jpg");
    $("#product_img").attr("src","images/products/default.jpg");
    new_code();
    window.product_auto_id  = null;
}

function new_code(){
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: "<?php echo site_url('product/new_code'); ?>",
        beforeSend: function () {
            $('#product_form .form-control #product_code').addClass('loading_gif');
        },
        success: function (data) {
            $('#product_form .form-control #product_code').removeClass('loading_gif');
            if (!jQuery.isEmptyObject(data)) {
                $('#product_code').val(data);
                $('#product_form').bootstrapValidator('revalidateField', 'product_code');
            }
        },
        error: function () {
            simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
        }
    });
}
</script>
