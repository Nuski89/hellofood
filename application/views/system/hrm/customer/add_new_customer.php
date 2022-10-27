<div class="box box-color animated zoomIn">
    <div class="box-header with-border" id="box-header-with-border">
        <h3 class="box-title tab_title"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('customer_new_customers'); ?></h3>
        <div class="box-tools pull-right">
            <a class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></a>
            <a class="btn btn-box-tool" href="#all_customers" data-toggle="tab" onclick="load_tab(0)"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="box-body">
        <div class="tab-content">
            <div id="step1" class="tab-pane active">
                <?php echo form_open('', 'role="form" id="customer_form"'); ?>
                    <div class="row"><br>
                        <div class="col-md-12">
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('full_name'); ?></label>
                                <input type="text" class="form-control" id="customer_name" placeholder="<?php echo $this->lang->line('full_name'); ?>" name="customer_name" required>
                            </div>
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('secondary_code'); ?></label>
                                <input type="text" class="form-control" id="customer_secondary_code" name="customer_secondary_code" placeholder="<?php echo $this->lang->line('secondary_code'); ?>">
                            </div>
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('address'); ?></label>
                                <input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="<?php echo $this->lang->line('address'); ?>">
                            </div>
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('city'); ?></label>
                                <input type="text" class="form-control" id="customer_city" name="customer_city" placeholder="<?php echo $this->lang->line('city'); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('email'); ?></label>
                                <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span><input type="text" class="form-control"  name="customer_email" id="customer_email" placeholder="<?php echo $this->lang->line('email'); ?>"/></div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('mobile'); ?></label>
                                <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span><input type="text" class="form-control"  name="customer_mobile" id="customer_mobile" placeholder="<?php echo $this->lang->line('mobile'); ?>" required/></div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('discount'); ?></label>
                                <div class="input-group">
                                    <input type="text" class="form-control number" name="customer_discount" id="customer_discount" placeholder="<?php echo $this->lang->line('discount'); ?>"/>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('note'); ?></label>
                                <textarea class="form-control" id="customer_note" name="customer_note" placeholder="<?php echo $this->lang->line('note'); ?>"></textarea>
                            </div>
                        </div>
                    </div><hr>
                    <div class="text-right">
                        <button class="btn btn-primary tab_title" data-loading-text="<?php echo $this->lang->line('loading_btn'); ?>" autocomplete="off" type="submit"><i class="fa fa-plus" aria-hidden="true"></i>  <?php echo $this->lang->line('customer_new_customers'); ?></button>
                    </div>
                </form>
            </div>
            <div id="step2" class="tab-pane">
            </div>
            <div id="step3" class="tab-pane">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var customer_auto_id;
$(document).ready(function () {
    window.customer_auto_id = null;
    form_wizard();
    $('.select2').select2({width: '100%'});
    $('#customer_form').bootstrapValidator({
            live: 'enabled',
            message: 'This value is not valid.',
            excluded: [':disabled'],
            fields: {
                customer_name   : {validators: {notEmpty: {message: 'Cutomer Name is required.'}}},
                customer_city   : {validators: {notEmpty: {message: 'City is required.'}}},
                customer_mobile : {validators: {notEmpty: {message: 'Phone is required.'}}},
            },
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        var data = $form.serializeArray();
        data.push({'name': 'customer_auto_id', 'value': window.customer_auto_id});
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: data,
            url: "<?php echo site_url('customer/save_customer'); ?>",
            beforeSend: function () {
                start_loading();
            },
            success: function (data) {
                stop_loading();
                simple_alert(data['log_status'],data['title'],data['message']);
                if (data['status']) {
                    load_tab(1);
                    customer_table.draw();
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

function edit_customer(customer_auto_id,person_full_name){
    $('.tab_title').html('&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> &nbsp;Update '+person_full_name);
    $('[href="#new_customer"]').tab('show');
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {'customer_auto_id':customer_auto_id,"person_full_name":person_full_name},
        url: "<?php echo site_url('customer/fetch_customer_data'); ?>",
        beforeSend: function () {
            $('#customer_form .form-control').addClass('loading_gif');
        },
        success: function (data) {
            $('#customer_form .form-control').removeClass('loading_gif');
            if (!jQuery.isEmptyObject(data)) {
                window.customer_auto_id = data['customer_auto_id'];
                $('#customer_name').val(data['customer_name']);
                $('#customer_secondary_code').val(data['customer_secondary_code']);
                $('#customer_address').val(data['customer_address']);
                $('#customer_city').val(data['customer_city']);
                $('#customer_email').val(data['customer_email']);
                $('#customer_mobile').val(data['customer_mobile']);
                $('#customer_discount').val(data['customer_discount']);
                $('#customer_note').val(data['customer_note']);
                $('.wizard_control .btn-wizard').removeClass('disabled');
            }
        },
        error: function () {
            simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
        }
    });
}

function form_reset(){
    $('.navbar-nav a[href="#new_customer"]').tab('show');
    $("#country_auto_id").val('').trigger('change');
    $('#customer_form').bootstrapValidator('resetForm', true);
    $('#customer_form')[0].reset();
    window.customer_auto_id  = null;
}
</script>
