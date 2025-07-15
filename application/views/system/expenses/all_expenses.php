<section class="content-header">
    <nav class="navbar navbar-default navbar-sub animated bounce">
        <a class="navbar-brand" href="<?php echo current_url(); ?>"><i class="fa fa-arrow-circle-o-down color" aria-hidden="true"></i></a>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#all_expenses" data-toggle="tab"><i class="fa fa-server" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('expense_all_expenses'); ?></a></li>
                <li><a href="#new_expense" data-toggle="tab" class="tab_title"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('expense_new_expense'); ?></a></li>
            </ul>
        </div>
    </nav>
    <div class="tab-content" style="padding-bottom: 1px;">
        <div class="tab-pane fade active in" id="all_expenses">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                    <table id="fetch_expense_table" class="<?php echo datatable_class(); ?>">
                        <thead class="selected_table_row">
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th style="width: 150px;"><?php echo $this->lang->line('date'); ?></th>
                                <th style="width: 150px;"><?php echo $this->lang->line('reference'); ?></th>
                                <th style="width: 200px;"><?php echo $this->lang->line('category'); ?></th>
                                <th><?php echo $this->lang->line('note'); ?></th>
                                <th style="width: 100px;"><?php echo $this->lang->line('amount'); ?></th>
                                <th style="width: 100px;"><?php echo $this->lang->line('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6" class="danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="new_expense">
            <?php echo $detail; ?>
        </div>
    </div>
</section>
<div id="expenses_print_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-hand-right color" aria-hidden="true"></span>  <?php echo $this->lang->line('receipt'); ?></h4>
            </div>
            <div class="modal-body" id="expenses_print_body">
                <p><?php echo $this->lang->line('no_record_found'); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close'); ?></button>
                <button type="button" class="btn btn-primary" onclick="print_ticket('expenses')"><?php echo $this->lang->line('print'); ?></button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var expense_auto_id;
var expense_table;
$(document).ready(function() {
    window.expense_auto_id  = null;
    window.expense_table    = null;
    fetch_expense_table();
});

function fetch_expense_table(){
    expense_table = $('#fetch_expense_table').DataTable( {
        "autoWidth": false,
        "order": [[ 0, 'asc' ]],
        "dom": '<"datatable-header"fl><"datatable-scroll-lg"tr><"datatable-footer"ip>',
        "language": {
            "search"        : '_INPUT_ ',
            "lengthMenu"    : '_MENU_ <button type="button" onclick="load_tab(1)" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('expense_new_expense'); ?> </button>',
            "paginate"      : { 'first': '<?php echo $this->lang->line('first'); ?>', 'last': '<?php echo $this->lang->line('last'); ?>', 'next': '&rarr;', 'previous': '&larr;' }
        },
        "lengthMenu"        : [[10,25,50,100,-1],[10,25,50,100,"All"]],
        "displayLength"     : 10,
        "processing"        : true,
        "serverSide"        : true,
        "stateSave"         : true,
        "destroy"           : true,
        // "scrollY"           : 500,
        // "scrollX"           : true,
        "pagingType"        : "full_numbers",
        "deferRender"       : true,
        "sAjaxSource": "<?php echo site_url('expense/fetch_expenses'); ?>",
        drawCallback: function ( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
            var x     = 0;
            var count = settings.aiDisplay.length;
            var start_pagination   = settings._iDisplayStart;
            for (var i = start_pagination; (count + start_pagination) > i; i++) {
                $('td:eq(0)', settings.aoData[settings.aiDisplay[x]].nTr).html(i + 1);
                if( parseInt(settings.aoData[x]._aData['expense_auto_id']) == expense_auto_id ){
                    var thisRow = settings.aoData[settings.aiDisplay[x]].nTr;
                    $(thisRow).addClass('selected_table_row');
                }
                x++;
            }
        },
        "columns": [
            {"data": "expense_auto_id"},
            {"data": "expense_date"},
            {"data": "expense_reference"},
            {"data": "expense_category"},
            {"data": "expense_note"},
            {"data": "expense_amount"},
            {"data": "action"},
        ],
        //"columnDefs": [{"sortable":false,"searchable":false,"targets":[0,1,2,3,4,5]},{"visible":false,"searchable":true,"targets": [6,7,8,9,10,11,12,13]}],
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

    expense_table.on('click', 'tr', function () {
        $('.dataTable tr').removeClass('selected_table_row');
        $(this).toggleClass('selected_table_row');
    });
}

function delete_expense(id){
    $.ajax({
        url:"<?php echo site_url('expense/delete_expense'); ?>",
        type:"POST",
        dataType: 'json',
        data :{'expense_auto_id':id},
        success:function(data){
            simple_alert(data['log_status'],data['title'],data['message']);
            fetch_expense_table();
        }
    }); 
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
    }, 200);
    return false;
}

function print_expense(expense_auto_id){
    $.ajax({
        type:"POST",
        dataType: 'json',
        data:{'expense_auto_id':expense_auto_id},
        url: "<?php echo site_url('expense/fetch_expense_print'); ?>",
        beforeSend: function () {
            $('#product_overlay').show();
        },
        success: function (data) {
            $('#expenses_print_body').html(data.expense_print);                
            $('#product_overlay').hide();
            $('#expenses_print_modal').modal('show');
        },
        error: function () {
            $('#product_overlay').hide();
            simple_alert(6,'e','<?php echo $this->lang->line('error_occurred'); ?>');
        }
    });
}

function change_expense_status(id,status){
    $.ajax({
        url:"<?php echo site_url('expense/change_expense_status'); ?>",
        type:"POST",
        dataType: 'json',
        data:{'expense_auto_id':id,'type':'expense'},
        success:function(data){
            simple_alert(data['log_status'],data['title'],data['message']);
        }
    });
}

function load_tab(status=0){
    if (status) {
        if (!window.expense_auto_id) {
            $('.tab_title').html('<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('expense_new_expense'); ?> ');
            form_reset();
        }
    }else{
        $('.navbar-nav a[href="#all_expenses"]').tab('show');
    }
}
</script>
