<div class="box box-color animated zoomIn">
    <div class="box-header with-border" id="box-header-with-border">
        <h3 class="box-title tab_title"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('expense_new_expense'); ?></h3>
        <div class="box-tools pull-right">
            <a class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></a>
            <a class="btn btn-box-tool" href="#all_expenses" data-toggle="tab" onclick="load_tab(0)"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="box-body">
        <div class="tab-content">
            <div id="step1" class="tab-pane active">
                <?php echo form_open('', 'role="form" id="expense_form"'); ?>
                    <div class="row"><br>
                        <div class="col-md-12">
                            <div class="form-group col-sm-2">
                                <label for="expense_date"><?php echo $this->lang->line('date').required_mark(); ?></label>
                                <input class="form-control" name="expense_date" id="expense_date" data-inputmask="'alias': 'yyyy-mm-dd'" type="text" value="<?php echo $this->_['current_date']; ?>" data-mask>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="expense_reference"><?php echo pop_over($this->lang->line('reference'),'top','Your product category list. <br/>(Ex : Appetizers, Sandwiches, Deserts)',1); ?></label>
                                <input type="text" class="form-control" id="expense_reference" name="expense_reference" placeholder="<?php echo $this->lang->line('reference'); ?>" required>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="expense_category"><?php echo pop_over($this->lang->line('category'),'top','Your product category list. <br/>(Ex : Appetizers, Sandwiches, Deserts)',1); ?></label>
                                <input type="text" class="form-control" id="expense_category" name="expense_category" placeholder="<?php echo $this->lang->line('category'); ?>" required>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="expense_amount"><?php echo $this->lang->line('amount').required_mark(); ?></label>
                                <div class="input-group">
                                <div class="input-group-addon"><?php echo $this->_['app']['company_currency_code']; ?></div>
                                    <input type="text" class="form-control number" id="expense_amount" name="expense_amount" placeholder="0.00" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="expense_note"><?php echo $this->lang->line('note'); ?></label>
                                <input class="form-control" id="expense_note" name="expense_note" placeholder="<?php echo $this->lang->line('note'); ?>">
                            </div>
                        </div>
                    </div><hr>
                    <div class="text-right m-t-xs">
                        <button class="btn btn-primary tab_title" data-loading-text="<?php echo $this->lang->line('loading_btn'); ?>" autocomplete="off" type="submit"><i class="fa fa-plus" aria-hidden="true"></i>  <?php echo $this->lang->line('expense_new_expense'); ?></button>
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
var expense_auto_id;
$(document).ready(function () {
    window.expense_auto_id = null;
    form_wizard();
    number_validation();
    initialize_expense_category_typeahead();
    $("[data-mask]").inputmask();
    $('.select2').select2({width: '100%'});
    $('#expense_form').bootstrapValidator({
        live: 'enabled',
        message: 'This value is not valid.',
        excluded: [':disabled'],
        fields: {
            expense_date      : {validators: {notEmpty: {message: 'Date is required.'}}},
            expense_reference : {validators: {notEmpty: {message: 'Reference is required.'}}},
            expense_category  : {validators: {notEmpty: {message: 'Category is required.'}}},
            expense_store_id  : {validators: {notEmpty: {message: 'Store is required.'}}},
            expense_amount    : {validators: {notEmpty: {message: 'Amount is required.'}}},
        },
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        var $btn = $(this).button();
        var bv = $form.data('bootstrapValidator');
        var data = $form.serializeArray();
        data.push({'name': 'expense_auto_id', 'value': window.expense_auto_id});
        data.push({'name': 'expense_store', 'value': $('select#expense_store_id option:selected').text()});
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: data,
            url: "<?php echo site_url('expense/save_expense'); ?>",
            beforeSend: function () {
                start_loading();
            },
            success: function (data) {
                stop_loading();
                simple_alert(data['log_status'],data['title'],data['message']);
                if (data['status']) {
                    load_tab(1);
                    expense_table.draw();
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

function initialize_expense_category_typeahead(){
    $('#expense_category').autocomplete({
        serviceUrl: '<?php echo site_url("expense/fetch_all_expense_categories"); ?>',
        minChars: 0,autoFocus: false,delay: 10,
        onSelect: function (data_arr) {

        }
    });
}

function edit_expense(expense_auto_id,expense_full_name){
    $('.tab_title').html('<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> &nbsp;&nbsp;Update '+expense_full_name);
    $('[href="#new_expense"]').tab('show');
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {'expense_auto_id':expense_auto_id,"expense_full_name":expense_full_name},
        url: "<?php echo site_url('expense/fetch_expense_data'); ?>",
        beforeSend: function () {
            $('#expense_form .form-control').addClass('loading_gif');
        },
        success: function (data) {
            $('#expense_form .form-control').removeClass('loading_gif');
            if (!jQuery.isEmptyObject(data)) {
                window.expense_auto_id = data['expense_auto_id'];
                $('#expense_date').val(data['expense_date']);
                $('#expense_reference').val(data['expense_reference']);
                $('#expense_category').val(data['expense_category']);
                $('#expense_store_id').val(data['expense_type_id']).change();
                $('#expense_amount').val(data['expense_amount']);
                $('#expense_note').val(data['expense_note']);
                $('.wizard_control .btn-wizard').removeClass('disabled');
            }
        },
        error: function () {
            simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
        }
    });
}

function form_reset(){
    $('.navbar-nav a[href="#new_expense"]').tab('show');
    $('#expense_form').bootstrapValidator('resetForm', true);
    $('#expense_form')[0].reset();
    window.expense_auto_id  = null;
}
</script>
