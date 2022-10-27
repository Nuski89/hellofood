<style>
/* Calculator Section */
.form-group{
    margin-top: 0px;
}
.panel{
    margin-bottom: 0px;
}

.panel-default {
    border-color: #F1F1F1;
}

.operations-btn{
    padding-right: 0px;
}

.calculator-sums table,.calculator-sums tr,.calculator-sums td,.calculator-sums th{
    border:1px solid #ddd!important;
    margin-bottom: 5px!important;
    margin-top: 5px;
}

.calculator-sums table input{
    background-color: #D7DDE4;
    padding: 6px 4px;
    padding: 6px 4px;
    border: 2px solid #D7DDE4;
    width: 100%;
}

.calculator-sums td{
    padding:5px;
}

.calculator-sums th{
    padding:5px;
    text-transform: uppercase;
}

.calculator-sums .title{
    font-weight: bold;
}

.calculator-sums .value{
    font-size: 15px;
}

.calculator-sums .value-total{
    font-size: 15px;
    font-weight: bold;
}

.calculator button{
    height: 60px;
}

.cart-table-price{
    padding-left: 3px;
    padding-right: 3px;
    margin-bottom: 1px;
}

.cart-table-price .panel{
    padding: 10px 0px;
}

.cart-table-price h3{
    font-size: 19px;
    margin-top: 0px;
    margin-bottom: 0px;
}

.cart-table-input{
    color: #3c8dbc!important;
    font-size: 19px;
    width: 100%;
    border: none;
    outline: none;
    padding: 0px;
    margin: 0px;
    text-align: center;
}

.caption {
    width: 100%;
    bottom: 0px;
    position: absolute;
    background: rgba(0, 0, 0, 0.7);
    height: 100%;
}

.offset-1 {
    padding-right: 0;
}

.offset-2 {
    padding-left: 0;
    padding-right: 0;
}

.offset-3 {
    padding-left: 0;
    padding-right: 5px;
}

.offset-4 {
    padding-left: 0;
    /*padding-right: 0;*/
}

.offset-btn-1{
    padding-right: 0px;
    padding-left: 3px;
    padding-bottom: 1px;
}

.offset-btn-2{
    padding-right: 0px;
    padding-left: 0px;
    padding-bottom: 1px;
}

.offset-btn-3{
    padding-right: 3px;
    padding-left: 0px;
    padding-bottom: 1px;
}

.input-offset-1{
    /*padding-left: 0;*/
    padding-right: 5px;
}

.input-offset-2 {
    padding-left: 0;
    /*padding-right: 0;*/
}

.calculator-tender-input{
    font-size: 28px;
    color: #868686;
    text-align: right;
    height: 40px;
}

.calculator-btn-area{
    margin-top: 5px;
}

.calculator-balance-input{
    font-size: 28px;
    color: #868686;
    text-align: right;
    height: 36px;
}

.calculator-btn-dot{
    font-weight: bold;
    font-size: 20px;
}
</style>

<section class="content-header">
    <nav class="navbar navbar-default navbar-sub animated bounce">
        <a class="navbar-brand waves-effect waves-block" href="<?php echo current_url(); ?>"><i class="fa fa-shopping-bag color" aria-hidden="true"></i></a>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active waves-effect waves-block"><a href="#all_sales" data-toggle="tab"><i class="fa fa-server" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('all_sales'); ?></a></li>
            </ul>
        </div>
    </nav>
    <div class="tab-content" style="padding-bottom: 1px;">
        <div class="tab-pane fade active in" id="all_sales">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                    <table id="fetch_sales_table" class="<?php echo datatable_class(); ?>">
                        <thead class="selected_table_row">
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th style="width: 50px;"><?php echo $this->lang->line('hold_type'); ?></th>
                                <th style="width: 120px;"><?php echo $this->lang->line('time'); ?></th>
                                <th><?php echo $this->lang->line('employee'); ?></th>
                                <th style="width: 150px;"><?php echo $this->lang->line('customer'); ?></th>
                                <th style="width: 150px;"><?php echo $this->lang->line('waiter'); ?></th>
                                <th style="width: 50px;"><?php echo $this->lang->line('discount'); ?></th>
                                <th style="width: 50px;"><?php echo $this->lang->line('tax'); ?></th>
                                <th style="width: 100px;"><?php echo $this->lang->line('sales_total'); ?></th>
                                <th style="width: 100px;"><?php echo $this->lang->line('sales_balance'); ?></th>
                                <th style="width: 50px;"><?php echo $this->lang->line('status'); ?></th>
                                <th style="width: 80px;"><?php echo $this->lang->line('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="12" class="danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="pos_print_modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $this->lang->line('close'); ?>"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $this->lang->line('receipt'); ?></h4>
      </div>
      <div class="modal-body" id="pos_print_body">
        <p><?php echo $this->lang->line('no_record_found'); ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close'); ?></button>
        <button type="button" class="btn btn-primary" onclick="print_ticket('pos')"><?php echo $this->lang->line('print'); ?></button>
      </div>
    </div>
  </div>
</div>
<div id="payment_modal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:90%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-credit-card" aria-hidden="true"></i> <?php echo $this->lang->line('payments'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="row calculator">
                    <div class="col-md-3" style="padding-right: 0px;">
                        <table id="salse_transaction" class="table"></table>
                        <table class="table void_table">
                            <thead>
                                <tr class="active"><td>Void transactions</td></tr>
                            </thead>
                            <tbody id="void_transactions">

                            </tbody>
                        </table>
                        <table class="table return_table">
                            <thead>
                                <tr class="active"><td>Return transactions</td></tr>
                            </thead>
                            <tbody id="return_transactions">

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-2" style="padding-right: 0px;">
                        <div class="operation-btns">
                            <a class="list-group-item waves-effect waves-block text-center" onclick="print_ticket('pos')">
                                <i class="fa fa-print fa-2x color"></i><br/><small>[F8]</small> <?php echo $this->lang->line('print'); ?>
                            </a>
                            <a class="list-group-item waves-effect waves-block text-center" onclick="print_ticket('kitchen')">
                                <i class="fa fa-cutlery fa-2x color"></i><br/><small>[F9]</small> <?php echo $this->lang->line('kitchen_print'); ?>
                            </a>
                            <a class="list-group-item waves-effect waves-block text-center" data-dismiss="modal">
                                <i class="fa fa-times fa-2x color"></i><br/><?php echo $this->lang->line('close'); ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7 calculator-sums">
                        <table class="table">
                            <tr>
                                <th width="30%"><label class="title"><?php echo $this->lang->line('sub_total'); ?></label></th>
                                <td width="70%"><label class="number_of_item value">0</label><label class="pull-right pro_sub_total value">0</label></td>
                            </tr>
                            <tr>
                                <th><label class="title"><?php echo $this->lang->line('item_discount'); ?></label></th>
                                <td><label class="pull-right pro_total_discount value">0</label></td>
                            </tr>
                            <tr>
                                <th><label class="title"><?php echo $this->lang->line('full_discount'); ?></label></th>
                                <td>
                                    <div class="col-md-8 no-padding"><input type="text" id="full_discount" onkeyup="cal_net_total()" value="0%" onfocus="this.select();"></div>
                                    <div class="col-md-4 no-padding"><label class="pull-right discount_text value">0</label></div>
                                </td>
                            </tr>
                            <tr>
                                <th><label class="title"><?php echo $this->lang->line('tax'); ?></label></th>
                                <td>
                                    <div class="col-md-8 no-padding"><input type="text" id="tax" onkeyup="cal_net_total()" value="0%" onfocus="this.select();"></div>
                                    <div class="col-md-4 no-padding"><label class="pull-right tax_text value">0</label></div>
                                </td>
                            </tr>
                            <tr>
                                <th><label class="title"><?php echo $this->lang->line('total'); ?></label></th>
                                <td><label class="pull-right net_total value-total">0</label></td>
                            </tr>
                        </table>

                        <div class="col-md-12 cart-table-price offset-2" style="margin-bottom: 5px;">
                            <div class="col-md-3 panel panel-default waves-effect waves-block">
                                <a onclick="edit_payment(1)">
                                <center><h3 class="color cash_total">0</h3></center>
                                <center><?php echo $this->lang->line('cash'); ?> <?php echo $this->lang->line('total'); ?> <span class="currency">[<?php echo $this->_['app']['company_currency_code']; ?>]</span></center>
                                </a>
                            </div>
                            <div class="col-md-3 panel panel-default waves-effect waves-block">
                                <a onclick="edit_payment(2)">
                                <center><h3 class="color chaque_total">0</h3></center>
                                <center><?php echo $this->lang->line('cheque'); ?> <?php echo $this->lang->line('total'); ?> <span class="currency">[<?php echo $this->_['app']['company_currency_code']; ?>]</span></center>
                                </a>
                            </div>
                            <div class="col-md-3 panel panel-default waves-effect waves-block">
                                <a onclick="edit_payment(3)">
                                <center><h3 class="color card_total">0</h3></center>
                                <center><?php echo $this->lang->line('credit_card'); ?> <?php echo $this->lang->line('total'); ?> <span class="currency">[<?php echo $this->_['app']['company_currency_code']; ?>]</span></center>
                                </a>
                            </div>
                            <div class="col-md-3 panel panel-default waves-effect waves-block">
                                <a onclick="edit_payment(4)">
                                <center><h3 class="color gift_card_total">0</h3></center>
                                <center><?php echo $this->lang->line('gift_card'); ?> <?php echo $this->lang->line('total'); ?> <span class="currency">[<?php echo $this->_['app']['company_currency_code']; ?>]</span></center>
                                </a>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="input-group">
                                    <span class="input-group-addon"><?php echo $this->lang->line('tender'); ?></span>
                                    <input type="text" class="form-control calculator-tender-input" value="" id="bill-tender" placeholder="0.00" onfocus="this.select();">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="pull-right calculator-balance-input calculator_balance">0</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row calculator-btn-area">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4 offset-1"><button class="btn btn-default btn-block waves-effect waves-block text-center cal-num-pad" data-number="1">1</button></div>
                                            <div class="col-md-4 offset-2"><button class="btn btn-default btn-block waves-effect waves-block text-center cal-num-pad" data-number="2">2</button></div>
                                            <div class="col-md-4 offset-3"><button class="btn btn-default btn-block waves-effect waves-block text-center cal-num-pad" data-number="3">3</button></div>
                                            <div class="col-md-4 offset-1"><button class="btn btn-default btn-block waves-effect waves-block text-center cal-num-pad" data-number="4">4</button></div>
                                            <div class="col-md-4 offset-2"><button class="btn btn-default btn-block waves-effect waves-block text-center cal-num-pad" data-number="5">5</button></div>
                                            <div class="col-md-4 offset-3"><button class="btn btn-default btn-block waves-effect waves-block text-center cal-num-pad" data-number="6">6</button></div>
                                            <div class="col-md-4 offset-1"><button class="btn btn-default btn-block waves-effect waves-block text-center cal-num-pad" data-number="7">7</button></div>
                                            <div class="col-md-4 offset-2"><button class="btn btn-default btn-block waves-effect waves-block text-center cal-num-pad" data-number="8">8</button></div>
                                            <div class="col-md-4 offset-3"><button class="btn btn-default btn-block waves-effect waves-block text-center cal-num-pad" data-number="9">9</button></div>
                                            <div class="col-md-4 offset-1"><button class="btn btn-default btn-block waves-effect waves-block text-center calculator-btn-dot cal-num-pad" data-number=".">.</button></div>
                                            <div class="col-md-4 offset-2"><button class="btn btn-default btn-block waves-effect waves-block text-center cal-num-pad" data-number="0">0</button></div>
                                            <div class="col-md-4 offset-3"><button class="btn btn-default btn-block waves-effect waves-block text-center cal-num-clear-backspace"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12 offset-2"><button class="btn btn-primary btn-block waves-effect waves-block text-center" onclick="add_payment(1)"><?php echo $this->lang->line('cash'); ?></button></div>
                                            <div class="col-md-12 offset-2"><button class="btn btn-primary btn-block waves-effect waves-block text-center" onclick="add_payment(2)"><?php echo $this->lang->line('cheque'); ?></button></div>
                                            <div class="col-md-12 offset-2"><button class="btn btn-primary btn-block waves-effect waves-block text-center" onclick="add_payment(3)"><?php echo $this->lang->line('credit_card'); ?></button></div>
                                            <div class="col-md-12 offset-2"><button class="btn btn-primary btn-block waves-effect waves-block text-center" onclick="add_payment(4)"><?php echo $this->lang->line('gift_card'); ?></button></div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12 offset-2"><button class="btn btn-primary btn-block waves-effect waves-block text-center cal-full-num-pad" data-number="10"><?php echo $this->_['app']['company_currency_code']; ?> 10</button></div>
                                            <div class="col-md-12 offset-2"><button class="btn btn-primary btn-block waves-effect waves-block text-center cal-full-num-pad" data-number="20"><?php echo $this->_['app']['company_currency_code']; ?> 20</button></div>
                                            <div class="col-md-12 offset-2"><button class="btn btn-primary btn-block waves-effect waves-block text-center cal-full-num-pad" data-number="50"><?php echo $this->_['app']['company_currency_code']; ?> 50</button></div>
                                            <div class="col-md-12 offset-2"><button class="btn btn-primary btn-block waves-effect waves-block text-center cal-num-clear">DEL</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row calculator-btn-area">
                                    <div class="col-md-12 offset-4"><button class="btn btn-primary btn-block waves-effect waves-block text-center cal-full-num-pad" data-number="100"><?php echo $this->_['app']['company_currency_code']; ?> 100</button></div>
                                    <div class="col-md-12 offset-4"><button class="btn btn-primary btn-block waves-effect waves-block text-center cal-full-num-pad" data-number="500"><?php echo $this->_['app']['company_currency_code']; ?> 500</button></div>
                                    <div class="col-md-12 offset-4"><button class="btn btn-primary btn-block waves-effect waves-block text-center cal-full-num-pad" data-number="1000"><?php echo $this->_['app']['company_currency_code']; ?> 1000</button></div>
                                    <div class="col-md-12 offset-4"><button class="btn btn-primary btn-block waves-effect waves-block text-center cal-full-num-pad" data-number="5000"><?php echo $this->_['app']['company_currency_code']; ?> 5000</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var sales_auto_id;
var sales_table;
var sub_total;
var total;
var net_total;
var item_discount;
var full_discount;
var tax;
var cash;
var chaque;
var card;
var gift_card;
var sales_tender;
$(document).ready(function() {
    window.sales_auto_id  = null;
    window.sales_table    = null;
    window.sub_total            = 0;
    window.total                = 0;
    window.net_total            = 0;
    window.item_discount        = 0;
    window.full_discount        = 0;
    window.tax                  = 0;
    window.cash                 = 0;
    window.chaque               = 0;
    window.card                 = 0;
    window.gift_card            = 0;
    window.sales_tender         = 0;
    fetch_sales_table();
});

function fetch_sales_table(){
    sales_table = $('#fetch_sales_table').DataTable( {
        "autoWidth": false,
        "order": [[0,'desc']],
        "dom": '<"datatable-header"fl><"datatable-scroll-lg"tr><"datatable-footer"ip>',
        "language": {
            "search"        : '_INPUT_ ',
            "lengthMenu"    : '_MENU_ ',
            "paginate"      : { 'first': '<?php echo $this->lang->line('first'); ?>', 'last': '<?php echo $this->lang->line('last'); ?>', 'next': '&rarr;', 'previous': '&larr;' }
        },
        "lengthMenu"        : [[10,25,50,100,-1],[10,25,50,100,"All"]],
        "displayLength"     : 10,
        "processing"        : true,
        "serverSide"        : true,
        "stateSave"         : true,
        "destroy"           : true,
        "pagingType"        : "full_numbers",
        "deferRender"       : true,
        "sAjaxSource": "<?php echo site_url('sales/fetch_sales'); ?>",
        drawCallback: function ( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
            var x     = 0;
            var count = settings.aiDisplay.length;
            var start_pagination   = settings._iDisplayStart;
            for (var i = start_pagination; (count + start_pagination) > i; i++) {
                $('td:eq(0)', settings.aoData[settings.aiDisplay[x]].nTr).html(i + 1);
                x++;
            }
        },
        "columns": [
            {"data": "sales_auto_id"},
            {"data": "hold_type"},
            {"data": "time"},
            {"data": "employee"},
            {"data": "customer"},
            {"data": "waiter"},
            {"data": "sales_discount"},
            {"data": "sales_tax"},
            {"data": "sales_total"},
            {"data": "sales_balance"},
            {"data": "status"},
            {"data": "action"},
        ],
        ///"columnDefs":[{"sortable":false,"searchable":false,"targets":[6,7,8]},{"visible":false,"searchable":true,"targets": [9,10]}],
        "fnServerData": function (sSource, aoData, fnCallback) {
            //aoData.push({ "name": "is_confirmed","value": $("#is_confirmed").val()});
            $.ajax({
                'dataType': 'json',
                'type': 'POST',
                'url': sSource,
                'data': aoData,
                'success': fnCallback
                });
            }
        });

    $('.dataTables_filter input[type=search]').attr('placeholder','<?php echo $this->lang->line('type_to_filter'); ?>');
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    sales_table.on('click', 'tr', function () {
        $('.dataTable tr').removeClass('selected_table_row');
        $(this).toggleClass('selected_table_row');
    });
}

// function load_tab(status=0){
//     if (status) {
//         if (!window.sales_auto_id) {
//             $('.tab_title').html('<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; <?php //echo $this->lang->line('sales_new_sales'); ?> ');
//             form_reset();
//         }
//     }else{
//         $('.navbar-nav a[href="#all_sales"]').tab('show');
//     }
// }

function add_payment(sales_auto_id){
    if (sales_auto_id) {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            data:{'sales_auto_id':sales_auto_id},
            url: "<?php echo site_url('pos/fetch_table_data'); ?>",
            beforeSend: function () {
                $('#product_overlay').show();
            },
            success: function (data) {
                $('#kitchen_print_body').html(data.kitchen_print);
                $('#pos_print_body').html(data.pos_print);
                $('.void_table,.return_table').hide();
                $('#salse_transaction,#void_transactions,#return_transactions').empty();
                if (jQuery.isEmptyObject(data['data'])) {
                    $('#salse_transaction,#void_transactions,#return_transactions').append('<div class="alert alert-danger text-center"><?php echo $this->lang->line('your_cart_empty'); ?></div>');
                }else {
                    $.each(data['data'], function (key, value) {
                        if (value['status']==6) {
                            $('.return_table').show();
                            $('#return_transactions').append('<tr><td>'+(key+1)+'. # '+value['id']+' ( '+parseFloat(value['amount']).formatMoney(2, '.', ',')+' - '+value['discount']+' ) * '+value['qty']+'<span class="pull-right">'+parseFloat(value['net_amount']).formatMoney(2, '.', ',') + '</span><br>'+value['name']+'</td></tr>');
                        }else if (value['status']==5) {
                            $('.void_table').show();
                            $('#void_transactions').append('<tr><td>'+(key+1)+'. # '+value['id']+' ( '+parseFloat(value['amount']).formatMoney(2, '.', ',')+' - '+value['discount']+' ) * '+value['qty']+'<span class="pull-right">'+parseFloat(value['net_amount']).formatMoney(2, '.', ',') + '</span><br>'+value['name']+'</td></tr>');
                        }else{
                            $('#salse_transaction').append('<tr><td>'+(key+1)+'. # '+value['id']+' ( '+parseFloat(value['amount']).formatMoney(2, '.', ',')+' - '+value['discount']+' ) * '+value['qty']+'<span class="pull-right">'+parseFloat(value['net_amount']).formatMoney(2, '.', ',') + '</span><br>'+value['name']+'</td><td><center><a onclick="delete_transaction('+value['transaction_auto_id']+','+value['sales_auto_id']+');"><i class="fa fa-trash-o fa-2x color"></i></a></center></td><td><center><a onclick="return_transaction('+value['transaction_auto_id']+','+value['sales_auto_id']+');"><i class="fa fa-repeat fa-2x color"></i></a></center></td></tr>');
                            window.total            += parseFloat(value['net_amount']);
                            window.sub_total        += parseFloat(value['sub_amount']);
                            window.item_discount    += parseFloat(value['total_discount']);
                            window.number_of_item   += parseFloat(value['qty']);
                        }
                    });
                }
                //cal_net_total();
                $('.number_of_item').html(window.number_of_item+' Item');
                $('.pro_total').html(to_currency(window.total));
                $('.pro_sub_total').html(to_currency(window.sub_total));
                $('.pro_total_discount').html(to_currency(window.item_discount));
                $('#product_overlay').hide();
            },
            error: function () {
                $('#product_overlay').hide();
                simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
            }
        });
    }else{
        $('.number_of_item').html(window.number_of_item+' Item');
        $('.pro_total').html(to_currency(window.total));
        $('.pro_sub_total').html(to_currency(window.sub_total));
        $('.pro_total_discount').html(to_currency(window.item_discount));
        $('.product_list_table_body').empty();
        $('.product_list_table_body').append('<tr class="danger"><td colspan="6" class="text-center"><?php echo $this->lang->line('your_cart_empty'); ?> <div style="background-image: url(images/add-to-cart-empty-thumb.jpg);background-repeat: repeat; height:300px;"></div></td></tr>');
        $('#product_overlay').hide();
    }
    $('#payment_modal').modal('show');
}

function sales_print(sales_auto_id){
    $.ajax({
        type: 'GET',
        dataType: 'json',
        data:{'sales_auto_id':sales_auto_id},
        url: "<?php echo site_url('pos/fetch_table_data'); ?>",
        beforeSend: function () {
            $('#product_overlay').show();
        },
        success: function (data) {
            $('#product_overlay').hide();
            $('#pos_print_body').html(data.pos_print);
            print_ticket('pos');
        },
        error: function () {
            $('#product_overlay').hide();
            simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
        }
    });
}

function return_transaction(id,sales_auto_id){
    if (id) {
        swal({
            title: 'Are you sure ?',
            text: "What would you like to do for this item?",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Return  it!',
            cancelButtonText: 'Cancel it!',
            confirmButtonClass: 'btn btn-warning',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function () {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                data :{'transaction_auto_id':id},
                url: "<?php echo site_url('pos/return_transaction'); ?>",
                beforeSend: function () {
                    $('#product_overlay').show();
                },
                success: function (data) {
                    $('#product_overlay').hide();
                    simple_alert(data['log_status'],data['title'],data['message']);
                    if (data['status']) {
                        add_payment(sales_auto_id);
                    }
                },
                error: function () {
                    simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
                }
            });
        }, function (dismiss) {
            if (dismiss === 'cancel') {

            }
        });
    }
}

// DELETE TRANSECTION FUNCTION
function delete_transaction(id,sales_auto_id){
    if (id) {
        swal({
            title: 'Are you sure ?',
            text: "What would you like to do for this item?",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Deleted  it!',
            cancelButtonText: 'Void it!',
            confirmButtonClass: 'btn btn-warning',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function () {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                data :{'transaction_auto_id':id},
                url: "<?php echo site_url('pos/delete_transaction'); ?>",
                beforeSend: function () {
                    $('#product_overlay').show();
                },
                success: function (data) {
                    $('#product_overlay').hide();
                    simple_alert(data['log_status'],data['title'],data['message']);
                    if (data['status']) {
                        add_payment(sales_auto_id);
                    }
                },
                error: function () {
                    simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
                }
            });
        }, function (dismiss) {
            if (dismiss === 'cancel') {
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    data :{'transaction_auto_id':id},
                    url: "<?php echo site_url('pos/void_transaction'); ?>",
                    beforeSend: function () {
                        $('#product_overlay').show();
                    },
                    success: function (data) {
                        $('#product_overlay').hide();
                        simple_alert(data['log_status'],data['title'],data['message']);
                        if (data['status']) {
                            add_payment(sales_auto_id);
                        }
                    },
                    error: function () {
                        simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
                    }
                });
            }
        });
    }
}

function print_ticket(div) {
    var contents = document.getElementById(div+"_print_body").innerHTML;
    var frame1 = document.createElement('iframe');
    frame1.name = "frame1";
    frame1.style.position = "absolute";
    frame1.style.top = "-1000000px";
    document.body.appendChild(frame1);
    var frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1.contentDocument.document : frame1.contentDocument;
    frameDoc.document.open();
    frameDoc.document.write('<html><head><title>'+div+'</title>');
    frameDoc.document.write('</head><body>');
    frameDoc.document.write(contents);
    frameDoc.document.write('</body></html>');
    frameDoc.document.close();
    setTimeout(function () {
        window.frames["frame1"].focus();
        window.frames["frame1"].print();
        document.body.removeChild(frame1);
    }, 500);
    return false;
}

// CALCULATE NEW TOTAL FUNCTION
function cal_net_total(){
    window.net_total            = parseFloat(window.total);
    window.full_discount        = 0;
    window.tax                  = 0;
    if (($('#full_discount').val().indexOf('%') == -1)) {
        window.full_discount    = parseFloat(isNaN(parseFloat($('#full_discount').val())) ? 0 : parseFloat($('#full_discount').val()));
    }else{
        window.full_discount    = percentage(window.net_total,parseFloat(isNaN(parseFloat($('#full_discount').val())) ? 0 : parseFloat($('#full_discount').val())));
    }
    $('.discount_text').html(to_currency(window.full_discount));
    window.net_total            -=window.full_discount;
    if (($('#tax').val().indexOf('%') == -1)) {
        window.tax    = parseFloat(isNaN(parseFloat($('#tax').val())) ? 0 : parseFloat($('#tax').val()));
    }else{
        window.tax    = percentage(window.net_total, parseFloat(isNaN(parseFloat($('#tax').val())) ? 0 : parseFloat($('#tax').val())));
    }
    $('.tax_text').html(to_currency(window.tax));
    window.net_total            -=window.tax;
    $('.net_total').html(to_currency(window.net_total));
    calculate_balance();
}
</script>
