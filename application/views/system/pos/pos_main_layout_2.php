<link media="all" href="plugins/theme/css/pos_layout_2.css?1.01" rev="stylesheet" rel="stylesheet">
<section class="content-header">
    <div class="row">
        <div class="col-md-10 operations-btn">
            <div class="box">
                <div class="row">
                    <div class="col-md-12 operation-selection">
                        <div class="col-md-2 offset-btn-1">
                            <button class="btn btn-primary btn-block text-center" onclick="set_hold('0~2')"><?php echo $this->lang->line('new'); ?> </br><?php echo $this->lang->line('holds')[2]; ?></button>
                        </div>
                        <div class="col-md-2 offset-btn-2">
                            <button class="btn btn-primary btn-block text-center" onclick="set_hold('0~3')"><?php echo $this->lang->line('new'); ?> </br><?php echo $this->lang->line('holds')[3]; ?></button>
                        </div>
                        <div class="col-md-2 offset-btn-2">
                            <button class="btn btn-primary btn-block text-center" onclick="set_hold('0~4')"><?php echo $this->lang->line('new'); ?> </br><?php echo $this->lang->line('holds')[4]; ?></button>
                        </div>
                        <div class="col-md-2 offset-btn-2">
                            <button class="btn btn-primary btn-block text-center" onclick="set_hold('0~5')"><?php echo $this->lang->line('new'); ?> </br><?php echo $this->lang->line('holds')[5]; ?></button>
                        </div>
                        <div class="col-md-2 offset-btn-2">
                            <button class="btn btn-primary btn-block text-center" onclick="set_hold('0~6')"><?php echo $this->lang->line('new'); ?> </br><?php echo $this->lang->line('holds')[6]; ?></button>
                        </div>
                        <div class="col-md-2 offset-btn-3">
                            <div class="btn-group btn-flex">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <?php echo $this->lang->line('new'); ?> </br><?php echo $this->lang->line('holds')[1]; ?> &nbsp;&nbsp;<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown_table"  role="menu">

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 operation-filter-one">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary color" onclick="clear_waiter()" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </span>
                            <input id="waiter_auto_id" type="text" class="form-control" placeholder="[Alt+1] <?php echo $this->lang->line('waiter'); ?> / <?php echo $this->lang->line('delivery_boy'); ?>">
                        </div>
                    </div>
                    <div class="col-md-3 operation-filter-two">
                        <div class="input-group">
                            <input id="customer_auto_id" type="text" class="form-control" placeholder="[Alt+2] <?php echo $this->lang->line('customer'); ?>">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary color" onclick="clear_customer()" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 cart-table-info">
                        <div class="col-md-4" id="pos_type">&nbsp;</div>
                        <div class="col-md-4" id="pos_user">&nbsp;</div>
                        <div class="col-md-4"><i class="fa fa-shopping-basket" aria-hidden="true"></i> <label class="number_of_item value">0 <?php echo $this->lang->line('item'); ?></label></div>
                    </div>

                    <div class="col-md-6 operation-filter-three">
                        <div class="form-group has-feedback">
                            <span class="fa fa-sort-numeric-asc form-control-feedback color"></span>
                            <input id="code" type="text" class="form-control" name="code" placeholder="[F2] <?php echo $this->lang->line('quick_code'); ?> (012*5*2%)">
                        </div>
                    </div>
                    <div class="col-md-6 operation-filter-four">
                        <div class="form-group has-feedback">
                            <span class="fa fa-search form-control-feedback color"></span>
                            <input id="all_search" type="text" class="form-control" name="all_search" placeholder="[F3] <?php echo $this->lang->line('search'); ?>">
                        </div>
                    </div>
                    <div class="col-md-12 cart-table">
                        <table class="<?php echo pos_datatable_class(); ?> product_list_table_data" style="margin-top: 2px;">
                            <thead class="selected_table_row">
                                <tr>
                                    <th><?php echo $this->lang->line('products'); ?></th>
                                    <th style="width: 60px;"><center><?php echo $this->lang->line('price'); ?></center></th>
                                    <th style="width: 50px;"><center><?php echo $this->lang->line('disc'); ?></center></th>
                                    <th style="width: 50px;"><center><?php echo $this->lang->line('qty'); ?></center></th>
                                    <th style="width: 90px;"><center><?php echo $this->lang->line('total'); ?> <span class="currency">[<?php echo $this->_['app']['company_currency_code']; ?>]</span></center></th>
                                    <th style="width: 20px;"><a data-target="#product_list_modal" data-toggle="modal"><center><i class="fa fa-arrows-alt" aria-hidden="true"></i></center></a></th>
                                </tr>
                            </thead>
                            <tbody class="product_list_table_body">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="overlay" id="product_overlay">
                    <i class="fa fa-refresh fa-spin color"></i>
                </div>
            </div>
        </div>

        <div class="col-md-2 category-list">
            <div class="col-md-12 cart-table-price">
                <div class="col-md-12 panel panel-default">
                    <center><h3 class="color pro_sub_total">0.00</h3></center>
                    <center><?php echo $this->lang->line('sub_total'); ?> <span class="currency">[<?php echo $this->_['app']['company_currency_code']; ?>]</span></center>
                </div>
                <div class="col-md-12 panel panel-default">
                    <center><h3 class="color pro_total_discount">0.00</h3></center>
                    <center><?php echo $this->lang->line('discount'); ?> <span class="currency">[<?php echo $this->_['app']['company_currency_code']; ?>]</span></center>
                </div>
                <div class="col-md-12 panel panel-default">
                    <center><h3 class="color pro_total">0.00</h3></center>
                    <center><?php echo $this->lang->line('total'); ?> <span class="currency">[<?php echo $this->_['app']['company_currency_code']; ?>]</span></center>
                </div>
            </div>

            <div class="pos-tab-container">
                <div class="col-md-12 pos-tab-menu">
                    <div class="operation-btns">
                        <a class="list-group-item waves-effect waves-block text-center" data-toggle="modal" data-target="#payment_modal">
                            <i class="fa fa-credit-card fa-2x color"></i><br/><small>[F4]</small> <?php echo $this->lang->line('pay'); ?>
                        </a>
                        <a class="list-group-item waves-effect waves-block text-center" onclick="quick_pay(2,1)">
                            <i class="fa fa-money fa-2x color"></i><br/><small>[F5]</small> <?php echo $this->lang->line('quick_pay'); ?>
                        </a>
                        <a class="list-group-item waves-effect waves-block text-center" id="btn-cancel-void">
                            <i class="fa fa-trash-o fa-2x color"></i><br/><small>[F10]</small> <?php echo $this->lang->line('cancel'); ?>
                        </a>
                        <a class="list-group-item waves-effect waves-block text-center">
                            <i class="fa fa-list-alt fa-2x color"></i><br/><?php echo $this->lang->line('order_list'); ?>
                        </a>
                        <a class="list-group-item waves-effect waves-block text-center" data-toggle="modal" data-target="#bill_recall_modal">
                            <i class="fa fa-list-ol fa-2x color"></i><br/><small>[F12]</small> <?php echo $this->lang->line('bill_recall'); ?>
                        </a>
                        <a class="list-group-item waves-effect waves-block text-center" onclick="close_register_modal()">
                            <i class="fa fa-sign-out fa-2x color"></i><br/><?php echo $this->lang->line('close_register'); ?>
                        </a>
                        <a class="list-group-item waves-effect waves-block text-center" data-toggle="modal" data-target="#pro_modal">
                            <i class="fa fa-th fa-2x color"></i><br/>Product List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="product_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <form class="form-horizontal" id="product_form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-plus" aria-hidden="true"></i>  <?php echo $this->lang->line('product_new_product'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="item_name" class="col-sm-4 control-label"><?php echo pop_over($this->lang->line('type'),'bottom','<b>Stock Tracking</b> : With reorder level <br/><b>None Stock Tracking</b> : Without reorder level <br/><b>Service</b> :  Free <br/><b>Combination</b> : More than one items',1); ?></label>
                    <div class="col-sm-6">
                        <?php echo form_dropdown('product_type_id',$this->lang->line('product_group_arr'),$this->lang->line('product_group_arr')[1],'id="product_type_id" class="form-control select2"'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="item_name" class="col-sm-4 control-label"><?php echo pop_over($this->lang->line('code'),'top','Index number of your menu item.',1); ?></label>
                    <div class="col-sm-6">
                    <div class="input-group">
                        <input type="text" class="form-control number" id="product_code" name="product_code" placeholder="<?php echo $this->lang->line('code'); ?>" value="<?php echo $product_code; ?>" required>
                        <span class="input-group-btn">
                            <button class="btn btn-default" onclick="new_code()" type="button"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                        </span>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="item_name" class="col-sm-4 control-label"><?php echo pop_over($this->lang->line('category'),'top','Your product category list. <br/>(Ex : Appetizers, Sandwiches, Deserts)',1); ?></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="product_category" name="product_category" placeholder="<?php echo $this->lang->line('category'); ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="item_name" class="col-sm-4 control-label"><?php echo $this->lang->line('product_name').required_mark(); ?></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="<?php echo $this->lang->line('product_name'); ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="item_name" class="col-sm-4 control-label"><?php echo $this->lang->line('product_cost').required_mark(); ?></label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="input-group-addon"><?php echo $this->_['app']['company_currency_code']; ?></div>
                            <input type="text" class="form-control number" id="product_cost" name="product_cost" placeholder="0.00" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="item_name" class="col-sm-4 control-label"><?php echo $this->lang->line('selling_price').required_mark(); ?></label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="input-group-addon"><?php echo $this->_['app']['company_currency_code']; ?></div>
                            <input type="text" class="form-control number" id="product_price" name="product_price" placeholder="0.00" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="item_name" class="col-sm-4 control-label"><?php echo pop_over($this->lang->line('reorder_level'),'top','Enter a value that system will remind you when your product decrease to that level. <br/>(Ex : 10, 25, 50)',1); ?></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control number" id="product_reorder_level" name="product_reorder_level" placeholder="00">
                    </div>
                </div>
                <div class="form-group">
                    <label for="item_name" class="col-sm-4 control-label"><?php echo pop_over($this->lang->line('product_options'),'top','Product options separated by commas <br/>(Ex: More Cheese, Extra Spicy, etc...)',1); ?></label>
                    <div class="col-sm-6">
                        <input class="form-control" id="product_options" name="product_options" placeholder="<?php echo $this->lang->line('product_options'); ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close'); ?></button>
                <button class="btn btn-primary tab_title" data-loading-text="<?php echo $this->lang->line('loading_btn'); ?>" autocomplete="off" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo $this->lang->line('product_new_product'); ?></button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- Add New Product Modal Ends -->
<!-- Payment Modal Begins -->
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
                            <tbody id="void_transactions"></tbody>
                        </table>
                        <table class="table return_table">
                            <thead>
                                <tr class="active"><td>Return transactions</td></tr>
                            </thead>
                            <tbody id="return_transactions"></tbody>
                        </table>
                    </div>
                    <div class="col-md-2" style="padding-right: 0px;">
                        <div class="operation-btns">
                            <a class="list-group-item waves-effect waves-block text-center" onclick="quick_pay(2,1)">
                                <i class="fa fa-money fa-2x color"></i><br/><small>[F5]</small> <?php echo $this->lang->line('quick_pay'); ?>
                            </a>
                            <a class="list-group-item waves-effect waves-block text-center" onclick="print_ticket('table')">
                                <i class="fa fa-retweet fa-2x color"></i><br/><small>[F6]</small> Table print
                            </a>
                            <a class="list-group-item waves-effect waves-block text-center" onclick="quick_pay(3,1)">
                                <i class="fa fa-print fa-2x color"></i><br/><small>[F7]</small> <?php echo $this->lang->line('pay_print'); ?>
                            </a>
                        </div>

                        <div class="operation-btns">
                            <a class="list-group-item waves-effect waves-block text-center" onclick="print_ticket('pos')">
                                <i class="fa fa-print fa-2x color"></i><br/><small>[F8]</small> <?php echo $this->lang->line('print'); ?>
                            </a>
                            <a class="list-group-item waves-effect waves-block text-center" onclick="print_ticket('kitchen')">
                                <i class="fa fa-cutlery fa-2x color"></i><br/><small>[F9]</small> <?php echo $this->lang->line('kitchen_print'); ?>
                            </a>
                        </div>

                        <div class="operation-btns">
                            <a class="list-group-item waves-effect waves-block text-center">
                                <i class="fa fa-trash-o fa-2x color"></i><br/><small>[F10]</small> <?php echo $this->lang->line('cancel'); ?>
                            </a>
                            <a class="list-group-item waves-effect waves-block text-center" >
                                <i class="fa fa-ban fa-2x color"></i><br/><small>[F11]</small> <?php echo $this->lang->line('void'); ?>
                            </a>
                            <a class="list-group-item waves-effect waves-block text-center" data-dismiss="modal">
                                <i class="fa fa-times fa-2x color"></i><br/><?php echo $this->lang->line('close'); ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7 calculator-sums">
                        <table>
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
<div id="bill_recall_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-list-ol color"></i> <?php echo $this->lang->line('bill_recall'); ?></h4>
            </div>
            <div class="modal-body no-padding">
                <div class="col-md-12">
                    <table class="table table-bordered table-condensed">
                        <thead class="selected_table_row">
                            <tr>
                                <td><?php echo $this->lang->line('first_td'); ?></td>
                                <td><?php echo $this->lang->line('title'); ?></td>
                                <td><?php echo $this->lang->line('bill_no'); ?></td>
                                <td><?php echo $this->lang->line('employee'); ?></td>
                                <td><?php echo $this->lang->line('check_in_time'); ?></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="bill_body"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 operation-selection">
                    </br>
                    <div class="col-md-2 offset-btn-1">
                        <button class="btn btn-primary btn-block text-center" onclick="set_hold('0~2')"><?php echo $this->lang->line('new'); ?> </br><?php echo $this->lang->line('holds')[2]; ?></button>
                    </div>
                    <div class="col-md-2 offset-btn-2">
                        <button class="btn btn-primary btn-block text-center" onclick="set_hold('0~3')"><?php echo $this->lang->line('new'); ?> </br><?php echo $this->lang->line('holds')[3]; ?></button>
                    </div>
                    <div class="col-md-2 offset-btn-2">
                        <button class="btn btn-primary btn-block text-center" onclick="set_hold('0~4')"><?php echo $this->lang->line('new'); ?> </br><?php echo $this->lang->line('holds')[4]; ?></button>
                    </div>
                    <div class="col-md-2 offset-btn-2">
                        <button class="btn btn-primary btn-block text-center" onclick="set_hold('0~5')"><?php echo $this->lang->line('new'); ?> </br><?php echo $this->lang->line('holds')[5]; ?></button>
                    </div>
                    <div class="col-md-2 offset-btn-3">
                        <button class="btn btn-primary btn-block text-center" onclick="set_hold('0~6')"><?php echo $this->lang->line('new'); ?> </br><?php echo $this->lang->line('holds')[6]; ?></button>
                    </div>
                    <div class="col-md-2 offset-btn-2">
                        <div class="btn-group btn-flex">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <?php echo $this->lang->line('new'); ?> </br><?php echo $this->lang->line('holds')[1]; ?> &nbsp;&nbsp;<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown_table"  role="menu">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="kitchen_print_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-hand-right color" aria-hidden="true"></span>  <?php echo $this->lang->line('receipt'); ?></h4>
            </div>
            <div class="modal-body" id="kitchen_print_body">
                <p><?php echo $this->lang->line('no_record_found'); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close'); ?></button>
                <button type="button" class="btn btn-primary" onclick="print_ticket('kitchen')"><?php echo $this->lang->line('print'); ?></button>
            </div>
        </div>
    </div>
</div>
<div id="table_print_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-hand-right color" aria-hidden="true"></span>  <?php echo $this->lang->line('receipt'); ?></h4>
            </div>
            <div class="modal-body" id="table_print_body">
                <p><?php echo $this->lang->line('no_record_found'); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close'); ?></button>
                <button type="button" class="btn btn-primary" onclick="print_ticket('table')"><?php echo $this->lang->line('print'); ?></button>
            </div>
        </div>
    </div>
</div>
<div id="pos_print_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $this->lang->line('close'); ?>"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-hand-right color" aria-hidden="true"></span>  <?php echo $this->lang->line('receipt'); ?></h4>
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
<div id="product_list_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document" style="width:70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $this->lang->line('close'); ?>"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-shopping-basket color" aria-hidden="true"></i> <?php echo $this->lang->line('products_list'); ?></h4>
            </div>
            <div class="modal-body no-padding">
                <table class="<?php echo pos_datatable_class(); ?> product_list_table_data" style="margin-top: 2px;">
                    <thead class="selected_table_row">
                        <tr>
                            <th><?php echo $this->lang->line('products'); ?></th>
                            <th style="width: 100px;"><center><?php echo $this->lang->line('price'); ?></center></th>
                            <th style="width: 80px;"><center><?php echo $this->lang->line('disc'); ?></center></th>
                            <th style="width: 80px;"><center><?php echo $this->lang->line('qty'); ?></center></th>
                            <th style="width: 100px;"><center><?php echo $this->lang->line('total'); ?> <span class="currency">[<?php echo $this->_['app']['company_currency_code']; ?>]</span></center></th>
                            <th style="width: 20px;"><center><?php echo $this->lang->line('first_td'); ?></center></th>
                        </tr>
                    </thead>
                    <tbody class="modal_product_list_table_body">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close'); ?></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="shortcut_help_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $this->lang->line('close'); ?>"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-info-circle color" aria-hidden="true"></i> <?php echo $this->lang->line('short_cut_keys'); ?></h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><b><?php echo $this->lang->line('description'); ?></b></th>
                            <th><b><?php echo $this->lang->line('keys'); ?></b></th>
                        </tr>
                    </thead>
                    <tbody style="text-transform:uppercase;">
                        <tr><td><?php echo $this->lang->line('waiter_selection'); ?></td><td>Alt+1</td></tr>
                        <tr><td><?php echo $this->lang->line('customer_selection'); ?></td><td>Alt+2</td></tr>
                        <tr><td><?php echo $this->lang->line('help'); ?></td><td>F1</td></tr>
                        <tr><td><?php echo $this->lang->line('stock_selection'); ?></td><td>F2</td></tr>
                        <tr><td><?php echo $this->lang->line('stock_search'); ?></td><td>F3</td></tr>
                        <tr><td><?php echo $this->lang->line('pay'); ?></td><td>F4</td></tr>
                        <tr><td><?php echo $this->lang->line('quick_pay'); ?></td><td>F5</td></tr>
                        <tr><td><?php echo $this->lang->line('pay_new'); ?></td><td>F6</td></tr>
                        <tr><td><?php echo $this->lang->line('pay_print'); ?></td><td>F7</td></tr>
                        <tr><td><?php echo $this->lang->line('print'); ?></td><td>F8</td></tr>
                        <tr><td><?php echo $this->lang->line('kitchen_print'); ?></td><td>F9</td></tr>
                        <tr><td><?php echo $this->lang->line('cancel'); ?></td><td>F10</td></tr>
                        <tr><td><?php echo $this->lang->line('void'); ?></td><td>F11</td></tr>
                        <tr><td><?php echo $this->lang->line('bill_recall'); ?></td><td>F12</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close'); ?></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade category-list" id="pro_modal" tabindex="-1" role="dialog" aria-labelledby="pro_modalLabel">
    <div class="modal-dialog" role="document" style="width:95%;">
        <div class="modal-content">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li><a data-toggle="tab" href="#tab_3"><?php echo $this->lang->line('pins'); ?></a></li>
                    <li><a data-toggle="tab" href="#tab_2"><?php echo $this->lang->line('category'); ?></a></li>
                    <li class="active"><a data-toggle="tab" href="#tab_1"><?php echo $this->lang->line('all'); ?></a></li>
                    <li class="pull-left header"><i class="fa fa-th"></i> <?php echo $this->lang->line('products'); ?></li>
                </ul>
                <div class="tab-content">
                    <div id="tab_1" class="tab-pane all_recode active">
                        <div class="col-md-8 all-search">
                            <input placeholder="<?php echo $this->lang->line('search_me'); ?>" id="input_all" type="text" class="form-control"/>
                        </div>
                        <div class="all-products">
                            <div class="col-md-4 all-pagination">
                                <ul class="pagination pagination-sm">
                                    <li class="firstPage"><span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span></li>
                                    <li class="previousPage"><span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span></li>
                                    <li class="pageNumbers"></li>
                                    <li class="nextPage"><span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span></li>
                                    <li class="lastPage"><span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></li>
                                </ul>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            <div class="row items">
                                <div class="col-md-12">
                                    <?php
                                    if (!empty($extra['products'])) {
                                        echo "<div class='col-md-1'><a data-toggle='modal' data-target='#product_modal'><div class='col-md-12 thumbnail text-center'><img  class='img-responsive' src='images/default-white.jpg'><div class='product-caption'></br><h4 class='fa fa-shopping-bag fa-2x color'></h4><p class='opration-pos-new-prodcut'>".$this->lang->line('new_product')."</p></div></div></a></div>";
                                        foreach ($extra['products'] as $key => $value) {
                                            if ($value['product_photo'] == "default.jpg") {
                                                echo "<div class='col-md-1'><a onclick='add_to_cart({$key})'><div class='col-md-12 thumbnail text-center'><img  class='img-responsive' src='images/products/{$value['product_photo']}'><div class='caption'><p class='opration-pos-number'>{$key}</p><p class='opration-pos-price'>{$value['product_price']}</p><p class='opration-pos-name'>{$value['product_name']}</p></div></div></a></div>";
                                            }else{
                                                echo "<div class='col-md-1'><a onclick='add_to_cart({$key})'><div class='col-md-12 thumbnail text-center'><img  class='img-responsive' src='images/products/t_{$value['product_photo']}'><div class='caption'><p class='opration-pos-number'>{$key}</p><p class='opration-pos-price'>{$value['product_price']}</p><p class='opration-pos-name'>{$value['product_name']}</p></div></div></a></div>";
                                            }
                                        }
                                    }else{
                                        echo "<div><br><br><br><br><center><i class='fa fa-frown-o fa-5x color'></i><h2>".$this->lang->line('product_list_empty')."</h2></center></div><div class='col-md-1'><a data-toggle='modal' data-target='#product_modal'><div class='col-md-12 thumbnail text-center'><img  class='img-responsive' src='images/default-white.jpg'><div class='product-caption'></br><h4 class='fa fa-shopping-bag fa-2x color'></h4><p class='opration-pos-new-prodcut'>".$this->lang->line('new_product')."</p></div></div></a></div>";
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div id="tab_2" class="tab-pane">
                        <div class="category">
                            <div class="col-md-8 all-search">
                                <input placeholder="Search Me" id="input_all" type="text" class="form-control"/>
                            </div>
                            <div class="all-category">
                                <div class="col-md-4 all-pagination">
                                    <ul class="pagination pagination-sm">
                                        <li class="firstPage"><span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span></li>
                                        <li class="previousPage"><span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span></li>
                                        <li class="pageNumbers"></li>
                                        <li class="nextPage"><span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span></li>
                                        <li class="lastPage"><span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="pro_tab_all">
                                                <?php
                                                if (!empty($extra['category'])) {
                                                    foreach ($extra['category'] as $key => $value) {
                                                        $cat = str_replace(' ','_',$value['product_category']);
                                                        echo "<div class='col-md-1' data-toggle='tab' tabindex='-1' href='#pro_tab_{$cat}'><div class='col-md-12 thumbnail text-center'><img  class='img-responsive' src='images/default.jpg'><div class='caption'><p class='opration-pos-name'><br>{$value['product_category']}</p></div></div></div>";
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <?php
                                            if (!empty($extra['category'])) {
                                                foreach ($extra['category'] as $key => $value) {
                                                    $cat = str_replace(' ','_',$value['product_category']);
                                                    echo "<div class='tab-pane fade in' id='pro_tab_{$cat}'>";
                                                    echo "<div class='col-md-1' data-toggle='tab' tabindex='-1' href='#pro_tab_all'><div class='col-md-12 thumbnail text-center'><img  class='img-responsive' src='images/default-white.jpg'><div class='product-caption'></br><h4 class='fa fa fa-angle-double-up fa-2x color'></h4><p class='opration-pos-new-prodcut'>".$this->lang->line('all_category')."</p></div></div></div>";
                                                    if (!empty($extra['products'])) {
                                                        foreach ($extra['products'] as $k => $v) {
                                                            if ($value['product_category']==$v['product_category']) {
                                                                if ($v['product_photo'] == "default.jpg") {
                                                                    echo "<div class='col-md-1'><a onclick='add_to_cart({$k})'><div class='col-md-12 thumbnail text-center'><img  class='img-responsive' src='images/products/{$v['product_photo']}'><div class='caption'><p class='opration-pos-number'>{$k}</p><p class='opration-pos-price'>{$v['product_price']}</p><p class='opration-pos-name'>{$v['product_name']}</p></div></div></a></div>";
                                                                }else{
                                                                    echo "<div class='col-md-1'><a onclick='add_to_cart({$k})'><div class='col-md-12 thumbnail text-center'><img  class='img-responsive' src='images/products/t_{$v['product_photo']}'><div class='caption'><p class='opration-pos-number'>{$k}</p><p class='opration-pos-price'>{$v['product_price']}</p><p class='opration-pos-name'>{$v['product_name']}</p></div></div></a></div>";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    echo "</div>";
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div id="tab_3" class="tab-pane">
                        <div class="pins">
                            <div class="col-md-8 all-search">
                                <input placeholder="Search Me" id="input_all" type="text" class="form-control"/>
                            </div>
                            <div class="all-products">
                                <div class="col-md-4 all-pagination">
                                    <ul class="pagination pagination-sm">
                                        <li class="firstPage"><span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span></li>
                                        <li class="previousPage"><span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span></li>
                                        <li class="pageNumbers"></li>
                                        <li class="nextPage"><span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span></li>
                                        <li class="lastPage"><span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></li>
                                    </ul>
                                </div>
                                <div class="row items">
                                    <div class="col-md-12">
                                    <?php
                                    if (!empty($extra['products_pin'])) {
                                        foreach ($extra['products_pin'] as $key => $value) {
                                            if ($value['product_photo'] == "default.jpg") {
                                                echo "<div class='col-md-1'><a onclick='add_to_cart({$key})'><div class='col-md-12 thumbnail text-center'><img  class='img-responsive' src='images/products/{$value['product_photo']}'><div class='caption'><p class='opration-pos-number'>{$key}</p><p class='opration-pos-price'>{$value['product_price']}</p><p class='opration-pos-name'>{$value['product_name']}</p></div></div></a></div>";
                                            }else{
                                                echo "<div class='col-md-1'><a onclick='add_to_cart({$key})'><div class='col-md-12 thumbnail text-center'><img  class='img-responsive' src='images/products/t_{$value['product_photo']}'><div class='caption'><p class='opration-pos-number'>{$key}</p><p class='opration-pos-price'>{$value['product_price']}</p><p class='opration-pos-name'>{$value['product_name']}</p></div></div></a></div>";
                                            }
                                        }
                                    }else{
                                        echo "<div><br><br><br><br><center><i class='fa fa-frown-o fa-5x color'></i><h2>".$this->lang->line('product_list_empty')."</h2></center></div>";
                                    } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
// ASSING VARIABLES AND TRIGGER FUNTIONS TO BEGIN THE SYSTEM
var sales_auto_id;
var hold_type;
var hold_auto_id;
var waiter_auto_id;
var register_id;
var product_arr;
var transaction_auto_id;
var number_of_persons;
var number_of_item;
var customer_auto_id;
var hold_select;
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
    $("div.pos-tab-menu>div.list-group>a").click(function(e){
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.pos-tab>div.pos-tab-content").removeClass("active");
        $("div.pos-tab>div.pos-tab-content").eq(index).addClass("active");
    });
    $(".product_list_table_data").on('click', 'tr', function () {
        $('.dataTable tr').removeClass('selected_table_row');
        $(this).toggleClass('selected_table_row');
    });
    $(".all-products").paginga({
        itemsPerPage: 72,
        maxPageNumbers: 3
    });

    $('#pos_type').html('<i class="fa fa-clock-o" aria-hidden="true"></i>  <?php echo $this->lang->line('not_selected'); ?>');
    $('#pos_user').html('<i class="fa fa-user" aria-hidden="true"></i> <?php echo $this->lang->line('no_user'); ?>');

    window.sales_auto_id        = <?php echo json_encode($this->session->userdata('sales_auto_id')); ?>;
    window.hold_type            = <?php echo json_encode($this->session->userdata('hold_type')); ?>;
    window.hold_types           = <?php echo json_encode($this->lang->line('holds')); ?>;
    window.hold_auto_id         = <?php echo json_encode($this->session->userdata('hold_auto_id')); ?>;
    window.register_id          = <?php echo json_encode($register_id); ?>;
    window.product_arr          = <?php echo json_encode($extra['products']); ?>;
    window.transaction_auto_id  = 0;
    window.number_of_persons    = 0;
    window.number_of_item       = 0;
    window.waiter_auto_id       = 0;
    window.waiter               = 0;
    window.customer_auto_id     = 0;
    window.customer             = 0;
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
    if(window.register_id==0 || window.register_id==null){
        fetch_register_data();
    }else{
        fetch_holds_data();
    }
    fetch_table_data();
    initialize_typeahead();
    new_code();
    $(".con_tot").keyup(function() {
        var amount  = parseFloat(isNaN(parseFloat($(this).data("amount"))) ? 0 : parseFloat($(this).data("amount")));
        var current = parseFloat(isNaN(parseFloat(this.value)) ? 0 : parseFloat(this.value));
        type        = $(this).data("type");
        $('#diff_'+type).html(to_currency((amount-current)));
    });

    $('#register_form').bootstrapValidator({
        live: 'enabled',
        message: 'This value is not valid.',
        excluded: [':disabled'],
        fields: {
            opening_blance : {validators: {notEmpty: {message: '<?php echo $this->lang->line('opening_balance_required'); ?>'}}},
        },
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        var $btn = $(this).button();
        var bv = $form.data('bootstrapValidator');
        var data = $form.serializeArray();
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: data,
            url: "<?php echo site_url('pos/set_register'); ?>",
            beforeSend: function () {
                start_loading();
            },
            success: function (data) {
                stop_loading();
                simple_alert(data['log_status'],data['title'],data['message']);
                if (data['status']) {
                    window.register_id = data['last_inserted_id'];
                    $('#register_modal').modal('hide');
                    fetch_holds_data();
                }
            },
            error: function () {
                stop_loading();
                simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
            }
        });
    });
    $('#register_close_form').bootstrapValidator({
        live: 'enabled',
        message: 'This value is not valid.',
        excluded: [':disabled'],
        fields: {
            counted_cash   : {validators: {notEmpty: {message: '<?php echo $this->lang->line('counted_cash_required'); ?>'}}},
            counted_cheque : {validators: {notEmpty: {message: '<?php echo $this->lang->line('counted_cheque_required'); ?>'}}},
            counted_credit_card : {validators: {notEmpty: {message: '<?php echo $this->lang->line('counted_credit_card_required'); ?>'}}},
            counted_gift_card : {validators: {notEmpty: {message: '<?php echo $this->lang->line('counted_gift_card_required'); ?>'}}},
        },
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        var $btn = $(this).button();
        var bv = $form.data('bootstrapValidator');
        var data = $form.serializeArray();
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: data,
            url: "<?php echo site_url('pos/close_register'); ?>",
            beforeSend: function () {
                start_loading();
            },
            success: function (data) {
                stop_loading();
                simple_alert(data['log_status'],data['title'],data['message']);
                if (data['status']) {
                    window.register_id = 0;
                    $('#register_close_modal').modal('hide');
                    swal({
                        title: 'Are you sure you want to logout ?',
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Logout',
                        cancelButtonText: 'Cancel',
                        confirmButtonClass: 'btn btn-warning',
                        cancelButtonClass: 'btn btn-danger',
                        buttonsStyling: false
                    }).then(function () {
                        window.location.href="<?php echo site_url('login/logout'); ?>";
                    }, function (dismiss) {
                        if (dismiss === 'cancel') {
                            fetch_register_data();
                        }
                    });
                }
            },
            error: function () {
                stop_loading();
                simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
            }
        });
    });
    $('#product_form').bootstrapValidator({
        live: 'enabled',
        message: 'This value is not valid.',
        excluded: [':disabled'],
        fields: {
            product_code     : {validators: {notEmpty: {message: '<?php echo $this->lang->line('product_code'); ?>'}}},
            product_name     : {validators: {notEmpty: {message: '<?php echo $this->lang->line('product_name'); ?>'}}},
            product_category : {validators: {notEmpty: {message: '<?php echo $this->lang->line('product_category'); ?>'}}},
            product_cost     : {validators: {notEmpty: {message: '<?php echo $this->lang->line('product_cost'); ?>'}}},
            product_price    : {validators: {notEmpty: {message: '<?php echo $this->lang->line('product_price'); ?>'}}},
        },
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        var $btn = $(this).button();
        var bv = $form.data('bootstrapValidator');
        var data = $form.serializeArray();
        data.push({'name': 'product_auto_id', 'value': window.product_auto_id});
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: data,
            url: "<?php echo site_url('product/save_product'); ?>",
            beforeSend: function () {
                // start_loading();
            },
            success: function (data) {
                // stop_loading();
                simple_alert(data['log_status'],data['title'],data['message']);
                if (data['status']) {
                    window.location.reload();
                }
            },
            error: function () {
                stop_loading();
                simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
            }
        });
    });
});

// ADD PAYMENTS FUNCTION
function add_payment(type){
    var tender = parseFloat(isNaN(parseFloat($('#bill-tender').val())) ? 0 : parseFloat($('#bill-tender').val()));
    if (type==2) {
        window.chaque           += tender;
        $('.chaque_total').html(to_currency(window.chaque));
    }else if(type==3){
        window.card             += tender;
        $('.card_total').html(to_currency(window.card));
    }else if(type==4){
        window.gift_card        += tender;
        $('.gift_card_total').html(to_currency(window.gift_card));
    }else{
        window.cash             += tender;
        $('.cash_total').html(to_currency(window.cash));
    }
    $('#bill-tender').val('');
    window.sales_tender += tender;
    calculate_balance();
}

// EDIT PAYMENTS FUNCTION
function edit_payment(type){
    if (type==2) {
        $('#bill-tender').val(window.chaque);
        window.sales_tender -= window.chaque;
        window.chaque          = 0;
        $('.chaque_total').html(to_currency(window.chaque));
    }else if(type==3){
        window.sales_tender -= window.card;
        $('#bill-tender').val(window.card);
        window.card            = 0;
        $('.card_total').html(to_currency(window.card));
    }else if(type==4){
        window.sales_tender -= window.gift_card;
        $('#bill-tender').val(window.gift_card);
        window.gift_card       = 0;
        $('.gift_card_total').html(to_currency(window.gift_card));
    }else{
        window.sales_tender -= window.cash;
        $('#bill-tender').val(window.cash);
        window.cash            = 0;
        $('.cash_total').html(to_currency(window.cash));
    }
    calculate_balance();
}

// GET PRODUCT CODE FUNCTION
function new_code(){
    $.ajax({
        type: 'GET',
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

// FETCH HOLD DATAS TO POS FUNCTION
function fetch_holds_data(){
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: "<?php echo site_url('pos/fetch_holds_data'); ?>",
        beforeSend: function () {
            $('#product_overlay').show();
        },
        success: function (data) {
            $('#product_overlay').hide();
            $('#bill_body').empty();
            if (!jQuery.isEmptyObject(data['holds'])) {
               var status = 1;
               var x =1;
                $.each(data['holds'], function (val, text) {
                    $('#bill_body').append('<tr><td>'+x+' </td><td>'+window.hold_types[text['hold_type']]+' '+(text['hold_type']==1 ?'Table ' :'')+text['hold_auto_id']+'</td><td>'+text['sales_auto_id']+'</td><td>'+text['employee']+'</td><td>'+text['check_in_time']+'</td><td><a onclick="set_hold(\''+text['hold_auto_id']+'~'+text['hold_type']+'\')" class="btn btn-primary pull-right"><i class="fa fa-refresh" aria-hidden="true"></i></a></td></tr>');
                    if (window.hold_auto_id==text['hold_auto_id'] && window.hold_type==text['hold_type']) {
                        status = 0;
                        window.sales_auto_id = text['sales_auto_id'];
                        window.customer_auto_id = text['customer_auto_id'];
                        window.customer = text['customer'];
                        window.waiter_auto_id = text['waiter_auto_id'];
                        window.waiter = text['waiter'];
                        $('#waiter_auto_id').val(text['waiter']);
                        $('#customer_auto_id').val(text['customer']);
                        $('#pos_type').html('<i class="fa fa-clock-o" aria-hidden="true"></i> '+(text['hold_type']!=1 ? window.hold_types[text['hold_type']] : '')+' '+(text['hold_type']==1 ?'Table ' :'')+text['hold_auto_id']+' '+text['check_in_time']);
                        $('#pos_user').html('<i class="fa fa-user" aria-hidden="true"></i> '+text['employee']);
                    }
                    x++;
                });
                if (status) {
                    $('#bill_recall_modal').modal('show');
                }
            }else{
                $('#bill_body').append('<tr class="danger"><td colspan="5"><?php echo $this->lang->line('no_record_found'); ?>.<td></tr>');
                $('#bill_recall_modal').modal('show');
            }
            if (!jQuery.isEmptyObject(data['tables'])) {
                $('.dropdown_table').empty();
                $.each(data['tables'], function (val, text) {
                    $('.dropdown_table').append('<li><a onclick="set_hold(\''+text['table_auto_id']+'~1\')">'+text['table_name']+' '+(text['sales_auto_id'] ? ' In '+text['check_in_time'] : ' Free' )+'</a></li>');
                });
            }
        },
        error: function () {
            simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
        }
    });
}

// CLOSE THE REGISTER FUNCTION
function close_register_modal(){
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: "<?php echo site_url('pos/fetch_register_total'); ?>",
        beforeSend: function () {
            start_loading();
        },
        success: function (data) {
            stop_loading();
            if (!jQuery.isEmptyObject(data['register']['register_auto_id'])) {
                window.register_id = data['register']['register_auto_id'];
                //fetch_holds_data();
                net_total = parseFloat(data['register']['opening_blance']);
                net_total += parseFloat(data['amount']['payment_by_cash']);
                net_total += parseFloat(data['amount']['payment_by_card']);
                net_total += parseFloat(data['amount']['payment_by_gift_card']);
                net_total += parseFloat(data['amount']['payment_by_cheque']);
                $('#opened_by').html(data['register']['opened_by']);
                $('#opene_cih').html(data['register']['o_b']);
                $('#opene_time').html(data['register']['date']);
                var opening_blance  = parseFloat(isNaN(parseFloat(data['register']['opening_blance'])) ? 0 : parseFloat(data['register']['opening_blance']));
                var payment_by_cash = parseFloat(isNaN(parseFloat(data['amount']['payment_by_cash'])) ? 0 : parseFloat(data['amount']['payment_by_cash']));
                $('#expected_cash').html(to_currency((parseFloat(opening_blance)+parseFloat(payment_by_cash))));
                $('#expected_credit_card').html(to_currency(parseFloat(data['amount']['payment_by_card'])));
                $('#expected_gift_card').html(to_currency(parseFloat(data['amount']['payment_by_gift_card'])));
                $('#expected_cheque').html(to_currency(parseFloat(data['amount']['payment_by_cheque'])));
                $('#expected_total').html(to_currency(parseFloat(net_total)));
                $('#counted_cash').attr("data-amount",(parseFloat(data['register']['opening_blance'])+parseFloat(data['amount']['payment_by_cash'])));
                $('#expected_credit_card').attr("data-amount",parseFloat(data['amount']['payment_by_card']));
                $('#expected_gift_card').attr("data-amount",parseFloat(data['amount']['payment_by_gift_card']));
                $('#expected_cheque').attr("data-amount",parseFloat(data['amount']['payment_by_cheque']));
                $('#register_close_modal').modal('show');
                setTimeout(function(){ $('#register_close_form #counted_cash').focus(); }, 1000);
            }else{
                $('#register_modal').modal('show');
                setTimeout(function(){ $('#register_form #opening_blance').focus(); }, 1000);
            }
        },
        error: function () {
            stop_loading();
            simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
        }
    });
}

function clear_waiter(){
    window.waiter_auto_id    = 0;
    window.waiter            = '';
    $('#waiter_auto_id').val('');
    $('#waiter_auto_id').focus();
    set_waiter(window.waiter_auto_id,window.waiter);
}

function clear_customer(){
    window.customer_auto_id  = 0;
    window.customer          = '';
    $('#customer_auto_id').val('');
    $('#customer_auto_id').focus();
    set_customer(window.customer_auto_id,window.customer);
}

// PUT THE OPENED FUNCTION TO FUNCTION
function set_hold(id){
    $('#bill_recall_modal').modal('hide');
    if (id) {
        var val = id.split("~");
        $.ajax({
            type: 'GET',
            dataType: 'json',
            data:{'hold_type':val[1],'hold_auto_id':val[0]},
            url: "<?php echo site_url('pos/set_hold'); ?>",
            beforeSend: function () {
                start_loading();
            },
            success: function (data) {
                stop_loading();
                window.sales_auto_id     = data['sales_auto_id'];
                window.hold_type         = data['hold_type'];
                window.hold_auto_id      = data['hold_auto_id'];
                window.number_of_persons = data['number_of_persons'];
                window.customer_auto_id  = data['customer_auto_id'];
                window.customer          = data['customer'];
                window.waiter_auto_id    = data['waiter_auto_id'];
                window.waiter            = data['waiter'];
                $('#customer_auto_id').val(data['customer']);
                $('#waiter_auto_id').val(data['waiter']);
                $('#pos_type').html('<i class="fa fa-clock-o" aria-hidden="true"></i> '+(window.hold_type!=1 ? window.hold_types[window.hold_type] : '')+' '+(data['hold_type']==1 ?'Table ' :'')+data['hold_auto_id']+' '+data['check_in_time']);
                $('#pos_user').html('<i class="fa fa-user" aria-hidden="true"></i> '+data['employee']);
                fetch_table_data();
                fetch_holds_data();
                clear_payment();
            },
            error: function () {
                stop_loading();
                simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
            }
        });
    }
}

// PRINT TICKETS FUNCTION
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
    }, 200);
    return false;
}

// UPDATE CART ITEMS FUNCTION
function set_product_row(transaction_auto_id,is_status){
    if (transaction_auto_id) {
        if (is_status) {
            var amount              = $('.product_list_table_body #amount_'+transaction_auto_id).val();
            var discount_percentage = $('.product_list_table_body #discount_'+transaction_auto_id).val();
            var qty                 = $('.product_list_table_body #qty_'+transaction_auto_id).val();
        }else{
            var amount              = $('.modal_product_list_table_body #amount_'+transaction_auto_id).val();
            var discount_percentage = $('.modal_product_list_table_body #discount_'+transaction_auto_id).val();
            var qty                 = $('.modal_product_list_table_body #qty_'+transaction_auto_id).val();
        }

        $.ajax({
            type: 'post',
            dataType: 'json',
            data:{'transaction_auto_id':transaction_auto_id,'qty':qty,'discount_percentage':discount_percentage,'amount':amount},
            url: "<?php echo site_url('pos/set_product_row'); ?>",
            success: function (data) {
                $('.amount_'+transaction_auto_id).val(parseFloat(amount));
                $('.discount_'+transaction_auto_id).val(parseFloat(discount_percentage));
                $('.qty_'+transaction_auto_id).val(parseFloat(qty));
                $('.net_amount_'+transaction_auto_id).html(to_currency(parseFloat(data),0));
                fetch_pos_table_data();
            },
            error: function () {
                simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
            }
        });
    }else{
        simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
    }
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
    window.net_total            +=window.tax;
    $('.net_total').html(to_currency(window.net_total));
    calculate_balance();
}

// FUNCTION TO CALCULATE A PERCENTAGE FROM A NUMBER
function percentage(total, n) {
   var percentage;
   percentage = ((parseFloat(total) * (parseFloat(n ? n : 0)*0.01)));
   return percentage;
}

$('.all_recode #input_all').keyup(function(){
   var valThis = $(this).val().toLowerCase();
    if(valThis == ""){
        $('.all_recode > div .col-md-1').show();
    } else {
        $('.all_recode > div .col-md-1').each(function(){
            var text = $(this).text().toLowerCase();
            (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
        });
    };
});

$('.category #input_all').keyup(function(){
   var valThis = $(this).val().toLowerCase();
    if(valThis == ""){
        $('.category > div .col-md-1').show();
    } else {
        $('.category > div .col-md-1').each(function(){
            var text = $(this).text().toLowerCase();
            (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
        });
   };
});

$('.pins #input_all').keyup(function(){
   var valThis = $(this).val().toLowerCase();
    if(valThis == ""){
        $('.pins > div .col-md-1').show();
    } else {
        $('.pins > div .col-md-1').each(function(){
            var text = $(this).text().toLowerCase();
            (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
        });
   };
});

// $('.addons #input_all').keyup(function(){
//    var valThis = $(this).val().toLowerCase();
//     if(valThis == ""){
//         $('.addons > div .col-md-2').show();
//     } else {
//         $('.addons > div .col-md-2').each(function(){
//             var text = $(this).text().toLowerCase();
//             (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
//         });
//    };
// });

$('#code').on('blur', function() {
    var id =this.value;
    if (id) {
        var val = id.split("*");
        var id = parseFloat(val[0]);
        var qty = 1;
        if (val[1]) {
            var qty = parseFloat(val[1]);
        }
        var discount_percentage = 0;
        if (val[2]) {
            var discount_percentage = parseFloat(val[2]);
        }
        add_to_cart(id,qty,discount_percentage);
    }
});

// ADD PRODUCTS TO THE CART FUNCTION
function add_to_cart(id,qty=1,discount_percentage=0){
    if (window.hold_auto_id!='0' || window.sales_auto_id!='0' || window.hold_type!='0'){
        if (discount_percentage) {
            var discount_percentage = discount_percentage;
        }else{
            var discount_percentage = window.product_arr[id]['product_discount'];
        }
        var amount = (window.hold_type ==6 ? window.product_arr[id]['wholesale_price'] : window.product_arr[id]['amount']);
        $.ajax({
            type: 'post',
            dataType: 'json',
            data:{'id':id,'name':window.product_arr[id]['product_name'],'qty':qty,'discount_percentage':discount_percentage,'amount':amount,'category':window.product_arr[id]['product_category'],'cost':window.product_arr[id]['product_cost'],'transaction_type':1,'transaction_auto_id':window.transaction_auto_id,'type_id':window.product_arr[id]['product_type_id'],'number_of_persons':window.number_of_persons,'customer_auto_id':window.customer_auto_id,'customer':window.customer,'waiter_auto_id':window.waiter_auto_id,'waiter':window.waiter,'hold_type':window.hold_type,'hold_auto_id':window.hold_auto_id,'sales_auto_id':window.sales_auto_id},
            url: "<?php echo site_url('pos/add_to_cart'); ?>",
            beforeSend: function () {
                // start_loading();
            },
            success: function (data) {
                // stop_loading();
                simple_alert(data['log_status'],data['title'],data['message']);
                if (data['status']) {
                    $('#code').val('');
                    $('#all_search').val('');
                    fetch_table_data();
                }
            },
            error: function () {
                stop_loading();
                simple_alert(6,'<?php echo $this->lang->line('add_product'); ?>','<?php echo $this->lang->line('select_salse_type'); ?>');
            }
        });
    }else{
        simple_alert(6,'<?php echo $this->lang->line('add_product'); ?>','<?php echo $this->lang->line('select_salse_type');?>');
    }
}

// DELETE TRANSECTION FUNCTION
function delete_transaction(id){
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
                        fetch_table_data();
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
                            fetch_table_data();
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

// GET REGISTER DETAILS FUNCTION
function fetch_register_data(){
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: "<?php echo site_url('pos/fetch_register_data'); ?>",
        beforeSend: function () {
            start_loading();
        },
        success: function (data) {
            stop_loading();
            if (!jQuery.isEmptyObject(data['register']['register_auto_id'])) {
                window.register_id = data['register']['register_auto_id'];
                close_register_modal();
            }else{
                $('#register_modal').modal('show');
                setTimeout(function(){ $('#register_form #opening_blance').focus(); }, 1000);
            }
        },
        error: function () {
            stop_loading();
            simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
        }
    });
}

function initialize_typeahead(){
    $('#waiter_auto_id').autocomplete({
        serviceUrl: '<?php echo site_url("pos/fetch_all_waiters"); ?>',
        minChars: 0,autoFocus: false,delay: 10,
        onSelect: function (data_arr) {
            $('#waiter_auto_id').val(data_arr.employee_name);
            window.waiter_auto_id = data_arr.employee_auto_id;
            window.waiter = data_arr.employee_name;
            set_waiter(data_arr.employee_auto_id,data_arr.employee_name);
        }
    });

    $('#customer_auto_id').autocomplete({
        serviceUrl: '<?php echo site_url("pos/fetch_all_customer"); ?>',
        minChars: 0,autoFocus: false,delay: 10,
        onSelect: function (data_arr) {
            $('#customer_auto_id').val(data_arr.customer_name);
            window.customer_auto_id = data_arr.customer_auto_id;
            window.customer = data_arr.customer_name;
            set_customer(data_arr.customer_auto_id,data_arr.customer_name);
        }
    });

    $('#product_category').autocomplete({
        serviceUrl: '<?php echo site_url("product/fetch_all_categories"); ?>',
        minChars: 0,autoFocus: false,delay: 10,
        onSelect: function (data_arr) { }
    });
}

// SET WAITER / DELIVERY BOY FUNCTION
function set_waiter(waiter_auto_id,waiter){
    $.ajax({
        type: 'GET',
        dataType: 'json',
        data:{'sales_auto_id':window.sales_auto_id,'waiter_auto_id':waiter_auto_id,'waiter':waiter},
        url: "<?php echo site_url('pos/set_waiter'); ?>",
        beforeSend: function () {
            $('#product_overlay').show();
        },
        success: function (data) {
            $('#product_overlay').hide();
            simple_alert(data['log_status'],data['title'],data['message']);
        },
        error: function () {
            $('#product_overlay').hide();
            simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
        }
    });
}

// SET CUSTOMER FUNCTION
function set_customer(customer_auto_id,customer){
    $.ajax({
        type: 'GET',
        dataType: 'json',
        data:{'sales_auto_id':window.sales_auto_id,'customer_auto_id':customer_auto_id,'customer':customer},
        url: "<?php echo site_url('pos/set_customer'); ?>",
        beforeSend: function () {
            $('#product_overlay').show();
        },
        success: function (data) {
            $('#product_overlay').hide();
            simple_alert(data['log_status'],data['title'],data['message']);
        },
        error: function () {
            $('#product_overlay').hide();
            simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
        }
    });
}

// FETCH ALL CART DETAILS FUNCTION
function fetch_table_data(){
    window.total            = 0;
    window.sub_total        = 0;
    window.item_discount    = 0;
    window.number_of_item   = 0;
    if (window.sales_auto_id) {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            data:{'sales_auto_id':window.sales_auto_id},
            url: "<?php echo site_url('pos/fetch_table_data'); ?>",
            beforeSend: function () {
                $('#product_overlay').show();
            },
            success: function (data) {
                $('#table_print_body').html(data.table_print);
                $('#kitchen_print_body').html(data.kitchen_print);
                $('#pos_print_body').html(data.pos_print);
                $('.void_table,.return_table').hide();
                $('.product_list_table_body,.modal_product_list_table_body,#salse_transaction').empty();
                if (jQuery.isEmptyObject(data['data'])) {
                    $('#salse_transaction').append('<div class="alert alert-danger text-center"><?php echo $this->lang->line('your_cart_empty'); ?></div>');
                    $('.product_list_table_body').append('<tr class="danger"><td colspan="6" class="text-center"><?php echo $this->lang->line('your_cart_empty'); ?> <div style="background-image: url(images/add-to-cart-empty-thumb.jpg);background-repeat: repeat; height:300px;"></div></td></tr>');
                }else {
                    $.each(data['data'], function (key, value) {
                        //var total = (value['amount']*value['qty']);
                        if (value['status']==6) {
                            $('.return_table').show();
                            $('#return_transactions').append('<tr><td>'+(key+1)+'. # '+value['id']+' ( '+parseFloat(value['amount']).formatMoney(2, '.', ',')+' - '+value['discount']+' ) * '+value['qty']+'<span class="pull-right">'+parseFloat(value['net_amount']).formatMoney(2, '.', ',') + '</span><br>'+value['name']+'</td></tr>');
                        }else if (value['status']==5) {
                            $('.void_table').show();
                            $('#void_transactions').append('<tr><td>'+(key+1)+'. # '+value['id']+' ( '+parseFloat(value['amount']).formatMoney(2, '.', ',')+' - '+value['discount']+' ) * '+value['qty']+'<span class="pull-right">'+parseFloat(value['net_amount']).formatMoney(2, '.', ',') + '</span><br>'+value['name']+'</td></tr>');
                        }else{
                            $('#salse_transaction').append('<tr><td>'+(key+1)+'. # '+value['id']+' ( '+parseFloat(value['amount']).formatMoney(2, '.', ',')+' - '+value['discount']+' ) * '+value['qty']+'<span class="pull-right">'+parseFloat(value['net_amount']).formatMoney(2, '.', ',') + '</span><br>'+value['name']+'</td><td><center><a onclick="delete_transaction('+value['transaction_auto_id']+','+value['sales_auto_id']+');"><i class="fa fa-trash-o fa-2x color"></i></a></center></td></tr>');
                            $('.product_list_table_body').append('<tr><td>'+(key+1)+'. '+value['name']+'</td><td><input type="text" class="form-control number chang amount_'+value['transaction_auto_id']+'" value="'+value['amount']+'" id="amount_'+value['transaction_auto_id']+'" onchange="set_product_row('+value['transaction_auto_id']+',1)" onfocus="this.select();"></td><td><input type="text" class="form-control number chang discount_'+value['transaction_auto_id']+'" value="'+value['discount_percentage']+'" id="discount_'+value['transaction_auto_id']+'" onchange="set_product_row('+value['transaction_auto_id']+',1)" onfocus="this.select();"></td><td><input type="text" class="form-control number chang qty_'+value['transaction_auto_id']+'" value="'+value['qty']+'" id="qty_'+value['transaction_auto_id']+'" onchange="set_product_row('+value['transaction_auto_id']+',1)" onfocus="this.select();"></td><td class="text-right net_amount_'+value['transaction_auto_id']+'"" id="net_amount_'+value['transaction_auto_id']+'">' + parseFloat(value['net_amount']).formatMoney(2, '.', ',') + '</td><td><center><button class="btn btn-default btn-sm" onclick="delete_transaction('+value['transaction_auto_id']+');"><i class="fa fa-trash-o fa-1x color"></i></button></center></td></tr>');
                            $('.modal_product_list_table_body').append('<tr><td>'+(key+1)+'. '+value['name']+'</td><td><input type="text" class="form-control number chang amount_'+value['transaction_auto_id']+'" value="'+value['amount']+'" id="amount_'+value['transaction_auto_id']+'" onchange="set_product_row('+value['transaction_auto_id']+',0)" onfocus="this.select();"></td><td><input type="text" class="form-control number chang discount_'+value['transaction_auto_id']+'" value="'+value['discount_percentage']+'" id="discount_'+value['transaction_auto_id']+'" onchange="set_product_row('+value['transaction_auto_id']+',0)" onfocus="this.select();"></td><td><input type="text" class="form-control number chang qty_'+value['transaction_auto_id']+'" value="'+value['qty']+'" id="qty_'+value['transaction_auto_id']+'" onchange="set_product_row('+value['transaction_auto_id']+',0)" onfocus="this.select();"></td><td class="text-right net_amount_'+value['transaction_auto_id']+'"" id="net_amount_'+value['transaction_auto_id']+'">' + parseFloat(value['net_amount']).formatMoney(2, '.', ',') + '</td><td><center><button class="btn btn-default btn-sm" onclick="delete_transaction('+value['transaction_auto_id']+');"><i class="fa fa-trash-o fa-1x color"></i></button></center></td></tr>');
                            window.total            += parseFloat(value['net_amount']);
                            window.sub_total        += parseFloat(value['sub_amount']);
                            window.item_discount    += parseFloat(value['total_discount']);
                            window.number_of_item   += parseFloat(value['qty']);
                        }
                    });
                }
                cal_net_total();
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
        // $('.product_list_table_body').append('<tr class="danger"><td colspan="6" class="text-center"><img class="img-responsive" src="images/add-to-cart-empty.jpg"></td></tr>');
        $('.product_list_table_body').append('<tr class="danger"><td colspan="6" class="text-center"><?php echo $this->lang->line('your_cart_empty'); ?> <div style="background-image: url(images/add-to-cart-empty-thumb.jpg);background-repeat: repeat; height:300px;"></div></td></tr>');
        $('#product_overlay').hide();
    }
}

// FETCH ALL CART DETAILS FUNCTION
function fetch_pos_table_data(){
    window.total            = 0;
    window.sub_total        = 0;
    window.item_discount    = 0;
    window.number_of_item   = 0;
    if (window.sales_auto_id) {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            data:{'sales_auto_id':window.sales_auto_id},
            url: "<?php echo site_url('pos/fetch_table_data'); ?>",
            beforeSend: function () {
                //$('#product_overlay').show();
            },
            success: function (data) {
                $('#table_print_body').html(data.table_print);
                $('#kitchen_print_body').html(data.kitchen_print);
                $('#pos_print_body').html(data.pos_print);
                if (jQuery.isEmptyObject(data['data'])) {
                    //$('.product_list_table_body').append('<tr class="danger"><td colspan="6" class="text-center"><img class="img-responsive" src="images/add-to-cart-empty.jpg"></td></tr>');
                    $('.product_list_table_body').append('<tr class="danger"><td colspan="6" class="text-center"><?php echo $this->lang->line('your_cart_empty'); ?> <div style="background-image: url(images/add-to-cart-empty-thumb.jpg);background-repeat: repeat; height:300px;"></div></td></tr>');
                }else {
                    $.each(data['data'], function (key, value) {
                        var total = (value['amount']*value['qty']);
                        window.total            += parseFloat(value['net_amount']);
                        window.sub_total        += parseFloat(value['sub_amount']);
                        window.item_discount    += parseFloat(value['total_discount']);
                        window.number_of_item   += parseFloat(value['qty']);
                    });
                }
                cal_net_total();
                $('.number_of_item').html(window.number_of_item+' Item');
                $('.pro_total').html(to_currency(window.total));
                $('.pro_sub_total').html(to_currency(window.sub_total));
                $('.pro_total_discount').html(to_currency(window.item_discount));
                //$('#product_overlay').hide();
            },
            error: function () {
                //$('#product_overlay').hide();
                simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
            }
        });
    }else{
        $('.number_of_item').html(window.number_of_item+' Item');
        $('.pro_total').html(to_currency(window.total));
        $('.pro_sub_total').html(to_currency(window.sub_total));
        $('.pro_total_discount').html(to_currency(window.item_discount));
        $('.product_list_table_body').empty();
        //$('.product_list_table_body').append('<tr class="danger"><td colspan="6" class="text-center"><img class="img-responsive" src="images/add-to-cart-empty.jpg"></td></tr>');
        $('.product_list_table_body').append('<tr class="danger"><td colspan="6" class="text-center"><?php echo $this->lang->line('your_cart_empty'); ?> <div style="background-image: url(images/add-to-cart-empty-thumb.jpg);background-repeat: repeat; height:300px;"></div></td></tr>');
        $('#product_overlay').hide();
    }
}

// QUICK PRODUCTS SEARCH FUNCTION
$('#all_search').autocomplete({
    lookup: <?php echo json_encode($extra['search_arr']); ?>,
    onSelect: function (suggestion) {
        add_to_cart(suggestion.data);
    }
});

// QUICK PAYMENT
function quick_pay(type,is_print) {
    var tender  = parseFloat(isNaN(parseFloat($('#bill-tender').val())) ? 0 : parseFloat($('#bill-tender').val()));
    window.sales_tender += tender;
    window.cash += tender;
    $('#bill-tender').val('');
    if (type==2) {
        if (window.cash=!0) {
           window.cash = window.total;
        }
    }
    if (window.total) {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data:{'pay_type':type,'sales_auto_id':window.sales_auto_id,'sub_total':window.sub_total,'item_discount':window.item_discount,'total':window.total,'full_discount':window.full_discount,'tax':window.tax,'cash':window.cash,'chaque':window.chaque,'card':window.card,'gift_card':window.gift_card,'sales_tender':window.sales_tender},
            url: "<?php echo site_url('pos/quick_pay'); ?>",
            beforeSend: function () {
                $('#product_overlay').show();
            },
            success: function (data) {
                $('#product_overlay').hide();
                simple_alert(data['log_status'],data['title'],data['message']);
                if (data['status']) {
                    if (is_print) {
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            data:{'sales_auto_id':window.sales_auto_id},
                            url: "<?php echo site_url('pos/fetch_table_data'); ?>",
                            beforeSend: function () {
                                $('#product_overlay').show();
                            },
                            success: function (data) {
                                $('#pos_print_body').html(data.pos_print);
                                $('#product_overlay').hide();
                                print_ticket('pos');
                            },
                            error: function () {
                                $('#product_overlay').hide();
                                simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
                            }
                        });
                    }
                    $('#payment_modal').modal('hide');
                    window.sales_auto_id     = 0;
                    window.hold_type         = 0;
                    window.hold_auto_id      = 0;
                    window.number_of_persons = 0;
                    window.customer_auto_id  = 0;
                    window.customer          = 0;
                    window.waiter_auto_id    = 0;
                    window.waiter            = 0;
                    $('#customer_auto_id').val('');
                    $('#waiter_auto_id').val('');
                    $('#pos_type').html('<i class="fa fa-clock-o" aria-hidden="true"></i> ');
                    $('#pos_user').html('<i class="fa fa-user" aria-hidden="true"></i> ');
                    fetch_holds_data();
                    fetch_table_data();
                }
                clear_payment();
            },
            error: function () {
                $('#product_overlay').hide();
                simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
            }
        });
    }else{
       simple_alert(4,'e','<?php echo $this->lang->line('your_cart_empty'); ?>');
    }
}

// CLEAR PAYMENT FUNCTION
function clear_payment(){
    window.full_discount        = 0;
    window.tax                  = 0;
    window.cash                 = 0;
    window.chaque               = 0;
    window.card                 = 0;
    window.gift_card            = 0;
    window.sales_tender         = 0;
    $('.chaque_total').html(to_currency(window.chaque));
    $('.card_total').html(to_currency(window.card));
    $('.gift_card_total').html(to_currency(window.gift_card));
    $('.cash_total').html(to_currency(window.cash));
    calculate_balance();
}

// TRIGGER FROM TENDER AMOUNT FUNCTION
$( "#bill-tender" ).keyup(function() {
  calculate_balance();
});

// PAYMENT CALCULATOR
$(document).ready(function() {
    var focused = "#bill-tender";
    // $("#bill-tax").focus(function(){
    //     focused = $(this);
    // });
    // $("#bill-discount").focus(function(){
    //     focused = $(this);
    // });
    $("#bill-tender").focus(function(){
        focused = $(this);
    });

    $(".cal-num-pad").click(function () {
        var number = $(this).data('number');
        $(focused).val(function() {
            return this.value + number;
        });
        calculate_balance();
    });

    $(".cal-full-num-pad").click(function () {
        var number   = parseFloat($(this).data('number'));
        var existval = isNaN(parseFloat($('#bill-tender').val())) ? 0 : parseFloat($('#bill-tender').val());
        var total    = number + existval;
        $(focused).val(function() {
            return total;
        });
        calculate_balance();
    });

    $(".cal-num-clear-backspace").click(function () {
        var number = $(this).data('number');
        $(focused).val(function() {
            return $("#bill-tender").val().slice(0,-1);
        });
        calculate_balance();
    });

    $(".cal-num-clear").click(function () {
        var number = "";
        $(focused).val(function() {
            return number;
        });
        calculate_balance();
    });
});

// CALCULATE FUNCTION
function calculate_balance(){
    var total = 0;
    total += isNaN(parseFloat($('#bill-tender').val())) ? 0 : parseFloat($('#bill-tender').val());
    total += window.chaque;
    total += window.card
    total += window.gift_card
    total += window.cash
    $('.calculator_balance').html(to_currency((window.net_total-total)));
}

// SLIDE FROM BOTTOM TO TOP
$(document).ready(function() {
    $(function() {
        $(".thumbnailproduct").click(toggleTopContent);
    });

    function toggleTopContent() {
        var topContent = $("#topcontent");
        var bottomContent = $("#content-header");

        if(!topContent.is(":hidden")) {
            topContent.slideUp("slow");
        } else {
            $("#topcontent").slideDown("slow");
            //$("#Container").slideUp("slow");
        }
    }
});

// CANCEL AND VOID FUNCTION
document.querySelector('#btn-cancel-void').onclick = function(){
    swal({
        // title: 'Are you sure ?',
        text: "What would you like to do for this bill ?",
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
            data :{'sales_auto_id':window.sales_auto_id},
            url: "<?php echo site_url('pos/delete_all_transaction'); ?>",
            beforeSend: function () {
                $('#product_overlay').show();
            },
            success: function (data) {
                window.sales_auto_id = 0;
                $('#product_overlay').hide();
                simple_alert(data['log_status'],data['title'],data['message']);
                if (data['status']) {
                    fetch_holds_data();
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
                data :{'sales_auto_id':window.sales_auto_id},
                url: "<?php echo site_url('pos/void_all_transaction'); ?>",
                beforeSend: function () {
                    $('#product_overlay').show();
                },
                success: function (data) {
                     window.sales_auto_id = 0;
                    $('#product_overlay').hide();
                    simple_alert(data['log_status'],data['title'],data['message']);
                    if (data['status']) {
                        fetch_holds_data();
                    }
                },
                error: function () {
                    simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
                }
            });
        }
    })
};

// ENTER KEY FUNCTION
$(document).on('keypress', '#code', function (e) {
    if(e.which == 13){
        $(this).blur();
    }
});

// SHORTCUT FUNCTIONS
$(document).ready(function(){
    shortcut.add("F1",function() {
        $('#shortcut_help_modal').modal('show');
    });

    shortcut.add("Alt+1",function() {
        $('#waiter_auto_id').focus();
    });

    shortcut.add("Alt+2",function() {
        $('#customer_auto_id').focus();
    });

    shortcut.add("F2",function() {
        $('#code').focus();
    });

    shortcut.add("F3",function() {
        $('#all_search').focus();
    });

    shortcut.add("F4",function() {
        $('#payment_modal').modal('show');
    });

    shortcut.add("F5",function() {
        quick_pay(2,1);
    });

    shortcut.add("F6",function() {
        //quick_pay(3,0);
        print_ticket('table');
    });

    shortcut.add("F7",function() {
        quick_pay(3,1);
    });

    shortcut.add("F8",function() {
        print_ticket('pos');
    });

    shortcut.add("F9",function() {
        print_ticket('kitchen');
    });

    shortcut.add("F10",function() {

    });

    shortcut.add("F11",function() {

    });

    shortcut.add("F12",function() {
        $('#bill_recall_modal').modal('show');
    });
});
</script>
