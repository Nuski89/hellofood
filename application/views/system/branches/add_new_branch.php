<div class="box box-color animated zoomIn">
    <div class="box-header with-border" id="box-header-with-border">
        <h3 class="box-title tab_title"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('branch_new_branch'); ?></h3>
        <div class="box-tools pull-right">
            <a class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></a>
            <a class="btn btn-box-tool" href="#all_branches" data-toggle="tab" onclick="load_tab(0)"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="box-body">
        <div class="tab-content">
            <div id="step1" class="tab-pane active">
                <?php echo form_open('', 'role="form" id="branch_form"'); ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label for="branch_address"><?php echo $this->lang->line('address'); ?></label>
                                <input type="text" class="form-control" id="branch_address" value="" name="branch_address" placeholder="<?php echo $this->lang->line('address'); ?>" required>
                            </div>
                            <div class="form-group col-sm-1">
                                <label for="branch_postal_code"><?php echo $this->lang->line('postal_code'); ?></label>
                                <input type="text" class="form-control" id="branch_postal_code" value="" name="branch_postal_code" placeholder="<?php echo $this->lang->line('postal_code'); ?>">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="branch_city"><?php echo $this->lang->line('city'); ?></label>
                                <input type="text" class="form-control" id="branch_city" value="" name="branch_city" placeholder="<?php echo $this->lang->line('city'); ?>" required>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="branch_country"><?php echo $this->lang->line('country'); ?></label>
                                <input type="text" class="form-control" id="branch_country" value="" name="branch_country" placeholder="<?php echo $this->lang->line('country'); ?>" required>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="branch_mobile"><?php echo $this->lang->line('mobile'); ?></label>
                                <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></div>
                                    <input type="text" class="form-control" id="branch_mobile" value="" name="branch_mobile" placeholder="<?php echo $this->lang->line('mobile'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="branch_email"><?php echo $this->lang->line('email'); ?></label>
                                <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
                                    <input type="text" class="form-control" id="branch_email" value="" name="branch_email" placeholder="<?php echo $this->lang->line('email'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="branch_receipt_header"><?php echo $this->lang->line('receipt_header'); ?></label>
                                <textarea class="form-control" id="branch_receipt_header" name="branch_receipt_header" rows="2" placeholder="<?php echo $this->lang->line('receipt_header'); ?>"></textarea>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="branch_receipt_footer"><?php echo $this->lang->line('receipt_footer'); ?></label>
                                <textarea class="form-control" id="branch_receipt_footer" name="branch_receipt_footer" rows="2" placeholder="<?php echo $this->lang->line('receipt_footer'); ?>"></textarea>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="branch_return_policy"><?php echo $this->lang->line('return_policy'); ?></label>
                                <textarea class="form-control" id="branch_return_policy" name="branch_return_policy" rows="2" placeholder="<?php echo $this->lang->line('return_policy'); ?>"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="branch_facebook">Bill Prefix</label>
                                <input type="text" class="form-control" id="branch_bill_prefix" value="BL" name="branch_bill_prefix" placeholder="Bill Prefix">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="branch_facebook">Bill Date (YYYY-MM-DD)</label>
                                <input type="text" class="form-control" id="branch_bill_date" value="" name="branch_bill_date" placeholder="Bill Date">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="branch_facebook"><?php echo $this->lang->line('facebook'); ?></label>
                                <input type="text" class="form-control" id="branch_facebook" value="" name="branch_facebook" placeholder="<?php echo $this->lang->line('facebook'); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="branch_google_plus"><?php echo $this->lang->line('google_plus'); ?></label>
                                <input type="text" class="form-control" id="branch_google_plus" value="" name="branch_google_plus" placeholder="<?php echo $this->lang->line('google_plus'); ?>">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="branch_instagram"><?php echo $this->lang->line('instagram'); ?></label>
                                <input type="text" class="form-control" id="branch_instagram" value="" name="branch_instagram" placeholder="<?php echo $this->lang->line('instagram'); ?>">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="branch_twitter"><?php echo $this->lang->line('twitter'); ?></label>
                                <input type="text" class="form-control" id="branch_twitter" value="" name="branch_twitter" placeholder="<?php echo $this->lang->line('twitter'); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="branch_timezone"><?php echo $this->lang->line('timezone'); ?></label>
                                <?php echo form_dropdown('branch_timezone',$timezone_arr,$extra['branch_timezone'],'class="form-control select2" id="branch_timezone" required'); ?>
                            </div>
                        </div>
                    </div><hr>
                    <div class="text-right m-t-xs">
                        <button class="btn btn-primary tab_title" data-loading-text="<?php echo $this->lang->line('loading_btn'); ?>" autocomplete="off" type="submit"><i class="fa fa-plus" aria-hidden="true"></i>  <?php echo $this->lang->line('branch_new_branch'); ?></button>
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
var branch_auto_id;
$(document).ready(function () {
    window.branch_auto_id = null;
    form_wizard();
    $("[data-mask]").inputmask();
    $('.select2').select2({width: '100%'});
    $('#branch_form').bootstrapValidator({
        live: 'enabled',
        message: 'This value is not valid.',
        excluded: [':disabled'],
        fields: {
            branch_address : {validators: {notEmpty: {message: 'Address is required.'}}},
            branch_city    : {validators: {notEmpty: {message: 'City is required.'}}},
            branch_country : {validators: {notEmpty: {message: 'Country is required.'}}},
            branch_mobile  : {validators: {notEmpty: {message: 'Mobile is required.'}}},
        },
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        var $btn = $(this).button();
        var bv = $form.data('bootstrapValidator');
        var data = $form.serializeArray();
        data.push({'name': 'branch_auto_id', 'value': window.branch_auto_id});
        // data.push({'name': 'group_name', 'value': $('select#group_auto_id option:selected').text()});
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: data,
            url: "<?php echo site_url('branch/save_branch'); ?>",
            beforeSend: function () {
                start_loading();
            },
            success: function (data) {
                stop_loading();
                simple_alert(data['log_status'],data['title'],data['message']);
                if (data['status']) {
                    load_tab(1);
                    branch_table.draw();
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

function edit_branch(branch_auto_id,branch_full_name){
    $('.tab_title').html('<span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> &nbsp;&nbsp;Update '+branch_full_name);
    $('[href="#new_branch"]').tab('show');
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {'branch_auto_id':branch_auto_id,"branch_full_name":branch_full_name},
        url: "<?php echo site_url('branch/fetch_branch_data'); ?>",
        beforeSend: function () {
            $('#branch_form .form-control').addClass('loading_gif');
        },
        success: function (data) {
            $('#branch_form .form-control').removeClass('loading_gif');
            if (!jQuery.isEmptyObject(data)) {
                window.branch_auto_id = data['branch_auto_id'];
                $('#branch_address').val(data['branch_address']);
                $('#branch_postal_code').val(data['branch_postal_code']);
                $('#branch_city').val(data['branch_city']);
                $('#branch_country').val(data['branch_country']);
                $('#branch_mobile').val(data['branch_mobile']);
                $('#branch_email').val(data['branch_email']);
                $('#branch_receipt_header').val(data['branch_receipt_header']);
                $('#branch_receipt_footer').val(data['branch_receipt_footer']);
                $('#branch_return_policy').val(data['branch_return_policy']);
                $('#branch_bill_prefix').val(data['branch_bill_prefix']);
                $('#branch_bill_date').val(data['branch_bill_date']);
                $('#branch_facebook').val(data['branch_facebook']);
                $('#branch_google_plus').val(data['branch_google_plus']);
                $('#branch_instagram').val(data['branch_instagram']);
                $('#branch_twitter').val(data['branch_twitter']);
                $('#branch_timezone').val(data['branch_timezone']).change();
                $('.wizard_control .btn-wizard').removeClass('disabled');
            }
        },
        error: function () {
            simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
        }
    });
}

function form_reset(){
    $('.navbar-nav a[href="#new_branch"]').tab('show');
    $('#branch_form').bootstrapValidator('resetForm', true);
    $('#branch_form')[0].reset();
    window.branch_auto_id  = null;
}
</script>
