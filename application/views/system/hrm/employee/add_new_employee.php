<div class="box box-color animated zoomIn">
    <div class="box-header with-border" id="box-header-with-border">
        <h3 class="box-title tab_title"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('employee_new_employees'); ?></h3>
        <div class="box-tools pull-right">
            <a class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></a>
            <a class="btn btn-box-tool" href="#all_employees" data-toggle="tab" onclick="load_tab(0)"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="box-body">
        <div class="tab-content">
            <div id="step1" class="tab-pane active">
                <?php echo form_open('', 'role="form" id="employee_form"'); ?>
                    <div class="row"><br>
                        <div class="col-md-12">
                            <div class="form-group col-sm-3">
                                <label for="group_auto_id"><?php echo $this->lang->line('employee_employee_group'); ?></label>
                                <?php echo form_dropdown('group_auto_id',$this->lang->line('employee_group_arr'),$this->lang->line('employee_group_arr')[1],'id="group_auto_id" class="form-control"'); ?>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="employee_name"><?php echo $this->lang->line('full_name'); ?></label>
                                <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="<?php echo $this->lang->line('full_name'); ?>" required>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="employee_secondary_code"><?php echo $this->lang->line('secondary_code'); ?></label>
                                <input type="text" class="form-control" id="employee_secondary_code" name="employee_secondary_code" placeholder="<?php echo $this->lang->line('secondary_code'); ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-sm-6">
                                <label for="employee_address"><?php echo $this->lang->line('address'); ?></label>
                                <input type="text" class="form-control" id="employee_address" name="employee_address" placeholder="<?php echo $this->lang->line('address'); ?>" required>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="employee_city"><?php echo $this->lang->line('city'); ?></label>
                                <input type="text" class="form-control" id="employee_city" name="employee_city" placeholder="<?php echo $this->lang->line('city'); ?>" required>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="employee_mobile"><?php echo $this->lang->line('mobile'); ?></label>
                                <div class="input-group"><span class="input-group-addon"><i class="fa fa-mobile"></i></span><input type="text" class="form-control" name="employee_mobile" id="employee_mobile" placeholder="<?php echo $this->lang->line('mobile'); ?>" required/></div>
                            </div>
                        </div>
                    </div><hr class="hr">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-sm-3">
                                <label for="employee_email"><?php echo $this->lang->line('email'); ?></label>
                                <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span><input type="email" class="form-control" id="employee_email" name="employee_email" placeholder="<?php echo $this->lang->line('email'); ?>" required></div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="login_password"><?php echo $this->lang->line('password'); ?></label>
                                <input type="password" class="form-control" name="login_password" id="login_password" placeholder="<?php echo $this->lang->line('password'); ?>" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="login_password2"><?php echo $this->lang->line('conform'); ?></label>
                                <input type="password" class="form-control" name="login_password2" id="login_password2" placeholder="<?php echo $this->lang->line('conform'); ?>" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="login_attempt"><?php echo $this->lang->line('login_attempt'); ?></label>
                                <input type="text" class="form-control" name="login_attempt" id="login_attempt" value="0">
                            </div>
                        </div>
                    </div><hr>
                    <div class="text-right m-t-xs">
                        <button class="btn btn-primary tab_title" data-loading-text="<?php echo $this->lang->line('loading_btn'); ?>" autocomplete="off" type="submit"><i class="fa fa-plus" aria-hidden="true"></i>  <?php echo $this->lang->line('employee_new_employees'); ?></button>
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
var employee_auto_id;
$(document).ready(function () {
    window.employee_auto_id = null;
    form_wizard();
    $("[data-mask]").inputmask();
    $('.select2').select2({width: '100%'});
    $('#employee_form').bootstrapValidator({
        live: 'enabled',
        message: 'This value is not valid.',
        excluded: [':disabled'],
        fields: {
            employee_name : {validators: {notEmpty: {message: 'Full Name is required.'}}},
            employee_email     : {validators: {notEmpty: {message: 'Email is required.'}}},
            login_username     : {validators: {notEmpty: {message: 'Username is required.'}}},
            employee_mobile    : {validators: {notEmpty: {message: 'Phone is required.'}}},
            employee_address   : {validators: {notEmpty: {message: 'Address is required.'}}},
            employee_city      : {validators: {notEmpty: {message: 'City is required.'}}},
        },
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        var $btn = $(this).button();
        var bv = $form.data('bootstrapValidator');
        var data = $form.serializeArray();
        data.push({'name': 'employee_auto_id', 'value': window.employee_auto_id});
        data.push({'name': 'group_name', 'value': $('select#group_auto_id option:selected').text()});
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: data,
            url: "<?php echo site_url('employee/save_employee'); ?>",
            beforeSend: function () {
                start_loading();
            },
            success: function (data) {
                stop_loading();
                simple_alert(data['log_status'],data['title'],data['message']);
                if (data['status']) {
                    load_tab(1);
                    employee_table.draw();
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

function edit_employee(employee_auto_id,employee_name){
    $('.tab_title').html('&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> &nbsp;Update '+employee_name);
    $('[href="#new_employee"]').tab('show');
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {'employee_auto_id':employee_auto_id,"employee_name":employee_name},
        url: "<?php echo site_url('employee/fetch_employee_data'); ?>",
        beforeSend: function () {
            $('#employee_form .form-control').addClass('loading_gif');
        },
        success: function (data) {
            $('#employee_form .form-control').removeClass('loading_gif');
            if (!jQuery.isEmptyObject(data)) {
                window.employee_auto_id = data['employee_auto_id'];
                $('#employee_name').val(data['employee_name']);
                $('#employee_mobile').val(data['employee_mobile']);
                $('#employee_address').val(data['employee_address']);
                $('#employee_city').val(data['employee_city']);
                $('#group_auto_id').val(data['group_auto_id']).change();
                $('#employee_secondary_code').val(data['employee_secondary_code']);
                $('#employee_email').val(data['employee_login_email']);
                $('#login_attempt').val(data['employee_login_attempt']);
                $('.wizard_control .btn-wizard').removeClass('disabled');
            }
        },
        error: function () {
            simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
        }
    });
}

function form_reset(){
    $('.navbar-nav a[href="#new_employee"]').tab('show');
    $('#employee_form').bootstrapValidator('resetForm', true);
    $('#employee_form')[0].reset();
    window.employee_auto_id  = null;
}
</script>
