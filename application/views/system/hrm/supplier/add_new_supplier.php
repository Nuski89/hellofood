<div class="box box-color animated zoomIn">
    <div class="box-header with-border" id="box-header-with-border">
        <h3 class="box-title tab_title"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('supplier_new_suppliers'); ?></h3>
        <div class="box-tools pull-right">
            <a class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></a>
            <a class="btn btn-box-tool" href="#all_suppliers" data-toggle="tab" onclick="load_tab(0)"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="box-body">
        <div class="tab-content">
            <div id="step1" class="tab-pane active">
                <?php echo form_open('', 'role="form" id="supplier_form"'); ?>
                    <div class="row"><br>
                        <div class="col-md-12">
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('company_name'); ?></label>
                                <input type="text" class="form-control" id="supplier_company_name" placeholder="<?php echo $this->lang->line('company_name'); ?>" name="supplier_company_name" required>
                            </div>
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('secondary_code'); ?></label>
                                <input type="text" class="form-control" id="supplier_secondary_code" name="supplier_secondary_code" placeholder="<?php echo $this->lang->line('secondary_code'); ?>">
                            </div>
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('address'); ?></label>
                                <input type="text" class="form-control" id="supplier_address" name="supplier_address" placeholder="<?php echo $this->lang->line('address'); ?>">
                            </div>
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('city'); ?></label>
                                <input type="text" class="form-control" id="supplier_city" name="supplier_city" placeholder="<?php echo $this->lang->line('city'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('email'); ?></label>
                                <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span><input type="text" class="form-control"  name="supplier_email" id="supplier_email" placeholder="<?php echo $this->lang->line('email'); ?>"/></div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('mobile'); ?></label>
                                <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span><input type="text" class="form-control"  name="supplier_mobile" id="supplier_mobile" placeholder="<?php echo $this->lang->line('mobile'); ?>" required/></div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('fax'); ?></label>
                                <div class="input-group"><span class="input-group-addon"><i class="fa fa-fax"></i></span><input type="text" class="form-control"  name="supplier_fax" id="supplier_fax" placeholder="<?php echo $this->lang->line('fax'); ?>"/></div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label><?php echo $this->lang->line('note'); ?></label>
                                <textarea class="form-control" id="supplier_note" name="supplier_note" placeholder="<?php echo $this->lang->line('note'); ?>"></textarea>
                            </div>
                        </div>
                    </div><hr>
                    <div class="text-right m-t-xs">
                        <button class="btn btn-primary tab_title" data-loading-text="<?php echo $this->lang->line('loading_btn'); ?>" autocomplete="off" type="submit"><i class="fa fa-plus" aria-hidden="true"></i>  <?php echo $this->lang->line('supplier_new_suppliers'); ?></button>
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
var supplier_auto_id;
$(document).ready(function () {
    window.supplier_auto_id = null;
    form_wizard();
    $('.select2').select2({width: '100%'});
    $('#supplier_form').bootstrapValidator({
            live: 'enabled',
            message: 'This value is not valid.',
            excluded: [':disabled'],
            fields: {
                supplier_company_name : {validators: {notEmpty: {message: 'Company Name is required.'}}},
                supplier_mobile       : {validators: {notEmpty: {message: 'Phone is required.'}}},
            },
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        var data = $form.serializeArray();
        data.push({'name': 'supplier_auto_id', 'value': window.supplier_auto_id});
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: data,
            url: "<?php echo site_url('supplier/save_supplier'); ?>",
            beforeSend: function () {
                start_loading();
            },
            success: function (data) {
                stop_loading();
                simple_alert(data['log_status'],data['title'],data['message']);
                if (data['status']) {
                    load_tab(1);
                    supplier_table.draw();
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

function edit_supplier(supplier_auto_id,person_full_name){
    $('.tab_title').html('&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> &nbsp;Update '+person_full_name);
    $('[href="#new_supplier"]').tab('show');
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {'supplier_auto_id':supplier_auto_id,"person_full_name":person_full_name},
        url: "<?php echo site_url('supplier/fetch_supplier_data'); ?>",
        beforeSend: function () {
            $('#supplier_form .form-control').addClass('loading_gif');
        },
        success: function (data) {
            $('#supplier_form .form-control').removeClass('loading_gif');
            if (!jQuery.isEmptyObject(data)) {
                window.supplier_auto_id = data['supplier_auto_id'];
                $('#supplier_company_name').val(data['supplier_company_name']);
                $('#supplier_secondary_code').val(data['supplier_secondary_code']);
                $('#supplier_address').val(data['supplier_address']);
                $('#supplier_city').val(data['supplier_city']);
                $('#supplier_email').val(data['supplier_email']);
                $('#supplier_mobile').val(data['supplier_mobile']);
                $('#supplier_fax').val(data['supplier_fax']);
                $('#supplier_note').text(data['supplier_note']);
                $('.wizard_control .btn-wizard').removeClass('disabled');
            }
        },
        error: function () {
            simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
        }
    });
}

function form_reset(){
    $('.navbar-nav a[href="#new_supplier"]').tab('show');
    $('#supplier_form').bootstrapValidator('resetForm', true);
    $('#supplier_form')[0].reset();
    window.supplier_auto_id  = null;
}
</script>
