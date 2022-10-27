<section class="content-header">
    <nav class="navbar navbar-default navbar-sub animated bounce">
        <a class="navbar-brand waves-effect waves-block" href="<?php echo current_url(); ?>"><i class="fa fa-shopping-bag color" aria-hidden="true"></i></a>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active waves-effect waves-block"><a href="#all_products" data-toggle="tab"><i class="fa fa-server" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('product_all_products'); ?></a></li>
                <li class="waves-effect waves-block"><a href="#new_product" data-toggle="tab" class="tab_title"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('product_new_product'); ?></a></li>
            </ul>
        </div>
    </nav>
    <div class="tab-content" style="padding-bottom: 1px;">
        <div class="tab-pane fade active in" id="all_products">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                    <table id="fetch_product_table" class="<?php echo datatable_class(); ?>">
                        <thead class="selected_table_row">
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th style="width: 10px;"><?php echo $this->lang->line('code'); ?></th>
                                <th><?php echo $this->lang->line('product_name'); ?></th>
                                <th style="width: 10px;"><?php echo $this->lang->line('discount'); ?></th>
                                <th style="width: 20px;"><?php echo $this->lang->line('product_cost'); ?></th>
                                <th style="width: 20px;"><?php echo $this->lang->line('selling_price'); ?></th>
                                <th style="width: 20px;"><?php echo $this->lang->line('selling_wholesale_price'); ?></th>
                                <th style="width: 30px;"><?php echo $this->lang->line('pin'); ?></th>
                                <th style="width: 30px;"><?php echo $this->lang->line('status'); ?></th>
                                <th style="width: 120px;"><?php echo $this->lang->line('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="10" class="danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="new_product">
            <?php echo $detail; ?>
        </div>
    </div>
</section>
<div class="modal fade" id="excel_modal" role="dialog" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4><span class="fa fa-file-excel-o color" aria-hidden="true"></span> <?php echo $this->lang->line('excel'); ?></h4>
        </div>
        <div class="modal-body">
            <div class="excel-file-area">
                <div class="col-md-6">
                    <a class="btn btn-primary btn-block" href="<?php echo site_url('product/excel'); ?>"><i class="fa fa-file-excel-o fa-3x" aria-hidden="true"></i><br><br>NEW PRODUCT FILE</a>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-primary btn-block" href="<?php echo site_url('product/excel_export'); ?>"><i class="fa fa-file-excel-o fa-3x" aria-hidden="true"></i><br><br>WITH PRODUCTS FILE</a>
                </div>
            </div>
            <br>
            <div class="excel-file-area">
                <div class="col-md-12">
                    <?php echo form_open_multipart('product/do_excel_import/',array('id'=>'item_form','class'=>'form-horizontal')); ?>
                        <div class="control-group">
                            <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName">Choose File</div>
                                    <div class="file-select-name" id="noFile">No file chosen...</div>
                                    <?php echo form_upload(array(
                                    'name'=>'file_path',
                                    'id'=>'file_path',
                                    'value'=>'')
                                    );?>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <?php
                                echo form_submit(array(
                                'name'=>'submitf',
                                'id'=>'submitf',
                                'value'=>$this->lang->line('upload'),
                                'class'=>'btn btn-primary btn-block')
                                );
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close'); ?></button>
        </div>
    </div>
  </div>
</div>
<div id="barcodeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="fa fa-barcode color" aria-hidden="true"></span> Barcode Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="preview_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="fa fa-file-text-o color" aria-hidden="true"></span> View Product</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <img src="" id="product_img" class="img-responsive">
                    </div>
                    <div class="col-md-7 product_content" style="vertical-align: top;">
                        <h3 id="prod_name" class="color">Product Name</h3>
                        <table>
                            <tr>
                                <td style="width:40%;">Code</td>
                                <td style="width:3%;">:</td>
                                <td><span id="prod_code"></span></td>
                            </tr>
                            <tr>
                                <td>Type </td>
                                <td>:</td>
                                <td><span id="prod_type"></span></td>
                            </tr>
                            <tr>
                                <td>Category </td>
                                <td>:</td>
                                <td><span id="prod_category"></span></td>
                            </tr>
                            <tr>
                                <td>Cost </td>
                                <td>:</td>
                                <td>LKR <span id="prod_cost"></span></td>
                            </tr>
                            <tr>
                                <td>Retail price </td>
                                <td>:</td>
                                <td>LKR <span id="prod_price"></span></td>
                            </tr>
                            <tr>
                                <td>Wholesale price </td>
                                <td>:</td>
                                <td>LKR <span id="prod_wholesale_price"></span></td>
                            </tr>
                            <tr>
                                <td>Discount </td>
                                <td>:</td>
                                <td><span id="prod_discount"></span>%</td>
                            </tr>
                            <tr>
                                <td>Reorder Level </td>
                                <td>:</td>
                                <td><span id="prod_relevel"></span></td>
                            </tr>
                            <tr>
                                <td>Supplier </td>
                                <td>:</td>
                                <td><span id="prod_supplier"></span></td>
                            </tr>
                            <tr>
                                <td>Options </td>
                                <td>:</td>
                                <td><span id="prod_options"></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Preview Modal Ends -->
<script type="text/javascript">
$('#file_path').bind('change', function () {
    var filename = $("#file_path").val();
    if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $("#noFile").text("No file chosen...");
    }
    else {
        $(".file-upload").addClass('active');
        $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
    }
});

var product_auto_id;
var product_table;
var product_group;
$(document).ready(function() {
    window.product_auto_id = null;
    window.product_table   = null;
    window.product_group   = <?php echo json_encode($this->lang->line('product_group_arr')); ?>;
    fetch_product_table();
});

function product_preview(id){
    $.ajax({
        url:"<?php echo site_url('product/fetch_product_data'); ?>",
        type:"POST",
        dataType: 'json',
        data:{'product_auto_id':id,'type':'product'},
        success:function(data){
            $("#preview_modal").modal();
            $("#prod_name").html(data['product_name']);
            $("#prod_type").html(window.product_group[data['product_type_id']]);
            $("#prod_code").html(data['product_code']);
            $("#prod_category").html(data['product_category']);
            $("#prod_cost").html(data['product_cost']);
            $("#prod_price").html(data['product_price']);
            $("#prod_wholesale_price").html(data['product_wholesale_price']);
            $("#prod_discount").html(data['product_discount']);
            $("#prod_relevel").html(data['product_reorder_level']);
            $("#prod_supplier").html(data['product_supplier_auto_id']);
            $("#prod_options").html(data['product_options']);
            $("#product_img").attr("src","images/products/"+data['product_photo']);
        }
    });
}

function excel_modal() {
    $("#excel_modal").modal();
}

function fetch_product_table(){
    product_table = $('#fetch_product_table').DataTable( {
        "autoWidth": false,
        "order": [[0,'asc'],[1,'asc']],
        "dom": '<"datatable-header"fl><"datatable-scroll-lg"tr><"datatable-footer"ip>',
        "language": {
            "search"        : '_INPUT_ ',
            "lengthMenu"    : '_MENU_ <button type="button" onclick="excel_modal()" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('excel'); ?> </button> <button type="button" onclick="load_tab(1)" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('product_new_product'); ?> </button>',
            "paginate"      : { 'first': '<?php echo $this->lang->line('first'); ?>', 'last': '<?php echo $this->lang->line('last'); ?>', 'next': '&rarr;', 'previous': '&larr;' }
        },
        "lengthMenu"        : [[10,25,50,100,-1],[10,25,50,100,"All"]],
        "displayLength"     : 25,
        "processing"        : true,
        "serverSide"        : true,
        "stateSave"         : true,
        "destroy"           : true,
        // "scrollY"           : 500,
        // "scrollX"           : true,
        "pagingType"        : "full_numbers",
        "deferRender"       : true,
        "sAjaxSource": "<?php echo site_url('product/fetch_products'); ?>",
        drawCallback: function ( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            api.column(0, {page:'current'} ).data().each( function ( group_id, i ) {
                if ( last !== group_id ) {
                    $(rows).eq( i ).before(
                        '<tr class="warning"><td colspan="10" class="text-semibold"><span class="fa fa-file-text-o color" aria-hidden="true"></span> &nbsp;&nbsp;'+group_id+'</td></tr>'
                    );
                    last = group_id;
                }
            });
            var x     = 0;
            var count = settings.aiDisplay.length;
            var start_pagination   = settings._iDisplayStart;
            for (var i = start_pagination; (count + start_pagination) > i; i++) {
                $('td:eq(0)', settings.aoData[settings.aiDisplay[x]].nTr).html(i + 1);
                if( parseInt(settings.aoData[x]._aData['product_auto_id']) == product_auto_id ){
                    var thisRow = settings.aoData[settings.aiDisplay[x]].nTr;
                    $(thisRow).addClass('selected_table_row');
                }
                x++;
            }
        },
        "columns": [
            {"data": "product_category"},
            {"data": "product_code"},
            {"data": "product_name"},
            {"data": "product_discount"},
            {"data": "product_cost"},
            {"data": "product_price"},
            {"data": "product_wholesale_price"},
            {"data": "pin"},
            {"data": "status"},
            {"data": "action"},
            {"data": "product_auto_id"},
            {"data": "product_category"},
        ],
        "columnDefs":[{"sortable":false,"searchable":false,"targets":[7,8,9]},{"visible":false,"searchable":true,"targets": [10,11]}],
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

    product_table.on('click', 'tr', function () {
        $('.dataTable tr').removeClass('selected_table_row');
        $(this).toggleClass('selected_table_row');
    });
}

function change_product_status(id,status){
    $.ajax({
        url:"<?php echo site_url('product/change_product_status'); ?>",
        type:"POST",
        dataType: 'json',
        data:{'product_auto_id':id,'type':'product'},
        success:function(data){
            simple_alert(data['log_status'],data['title'],data['message']);
        }
    });
}

function change_pin_status(id,status){
    $.ajax({
        url:"<?php echo site_url('product/change_pin_status'); ?>",
        type:"POST",
        dataType: 'json',
        data:{'product_auto_id':id,'type':'product'},
        success:function(data){
            simple_alert(data['log_status'],data['title'],data['message']);
        }
    });
}

function load_tab(status=0){
    if (status) {
        if (!window.product_auto_id) {
            $('.tab_title').html('<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('product_new_product'); ?> ');
            form_reset();
        }
    }else{
        $('.navbar-nav a[href="#all_products"]').tab('show');
    }
}

//validation and submit handling
$(document).ready(function()
{
    var submitting = false;

    $('#item_form').validate({
        submitHandler:function(form)
        {
            if (submitting) return;
            submitting = true;
            $("#form").mask(<?php echo json_encode($this->lang->line('wait')); ?>);
            $(form).ajaxSubmit({
            success:function(response)
            {
                $("#form").unmask();
                if(!response.success)
                {
                    gritter(<?php echo json_encode($this->lang->line('error')); ?>,response.message,'gritter-item-error',false,false);
                }
                else
                {
                    gritter(<?php echo json_encode($this->lang->line('success')); ?>,response.message,'gritter-item-success',false,false);
                }
                submitting = false;
            },
            dataType:'json',
            resetForm: true
        });

        },
        errorLabelContainer: "#error_message_box",
        wrapper: "li",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        },
        rules:
        {
            file_path:"required"
        },
        messages:
        {
            file_path:<?php echo json_encode($this->lang->line('items_full_path_to_excel_file_required')); ?>
        }
    });
});
</script>
