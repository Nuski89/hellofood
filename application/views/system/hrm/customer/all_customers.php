<section class="content-header">
    <nav class="navbar navbar-default navbar-sub animated bounce">
        <a class="navbar-brand" href="<?php echo current_url(); ?>"><i class="fa fa-users color" aria-hidden="true"></i></a>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#all_customers" data-toggle="tab"><i class="fa fa-server" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('customer_all_customers'); ?></a></li>
                <li><a href="#new_customer" data-toggle="tab" class="tab_title"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('customer_new_customers'); ?></a></li>
            </ul>
        </div>
    </nav>
    <div class="tab-content" style="padding-bottom: 1px;">
        <div class="tab-pane fade active in" id="all_customers">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                    <table id="fetch_customer_table" class="<?php echo datatable_class(); ?>">
                        <thead class="selected_table_row">
                            <tr>
                                <th style="width: 20px;">#</th>
                                <th><?php echo $this->lang->line('name'); ?></th>
                                <th style="width: 250px;"><?php echo $this->lang->line('address'); ?></th>
                                <th style="width: 180px;"><?php echo $this->lang->line('mobile'); ?></th>
                                <th style="width: 100px;"><?php echo $this->lang->line('balance'); ?></th>
                                <th style="width: 50px;"><?php echo $this->lang->line('status'); ?></th>
                                <th style="width: 140px; text-align: center;"><?php echo $this->lang->line('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="7" class="danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="new_customer">
            <?php echo $detail; ?>
        </div>
    </div>
</section>
<script type="text/javascript">
var person_auto_id;
var customer_table;
var customer_group_arr;
$(document).ready(function() {
    window.person_auto_id  = null;
    window.customer_table  = null;
    window.customer_group_arr = <?php echo json_encode($this->lang->line('customer_group_arr')); ?>;
    fetch_customer_table();
});

function fetch_customer_table(){
    customer_table = $('#fetch_customer_table').DataTable( {
        "autoWidth": false,
        "order": [[0,'desc'],[2,'desc']],
        "dom": '<"datatable-header"fl><"datatable-scroll-lg"tr><"datatable-footer"ip>',
        "language": {
            "search"        : '_INPUT_ ',
            "lengthMenu"    : '_MENU_ <button type="button" onclick="load_tab(1)" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('customer_new_customers'); ?> </button>',
            "paginate"      : { 'first': '<?php echo $this->lang->line('first'); ?>', 'last': '<?php echo $this->lang->line('last'); ?>', 'next': '&rarr;', 'previous': '&larr;' }
        },
        "lengthMenu"        : [[10,25,50,100,-1],[10,25,50,100,"All"]],
        "displayLength"     : 10,
        "processing"        : true,
        "serverSide"        : true,
        //"stateSave"         : true,
        "destroy"           : true,
        "pagingType"        : "full_numbers",
        "deferRender"       : true,
        "sAjaxSource": "<?php echo site_url('customer/fetch_customers'); ?>",
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
            {"data": "customer_auto_id"},
            {"data": "customer_name"},
            {"data": "customer_address"},
            {"data": "customer_mobile"},
            {"data": "customer_discount"},
            {"data": "status"},
            {"data": "action"},
        ],
        "columnDefs": [{"sortable":false,"searchable":false,"targets":[5,6]}],
        //,{"visible":false,"searchable":true,"targets": [1,2]}
        "fnServerData": function (sSource, aoData, fnCallback) {
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

    customer_table.on('click', 'tr', function () {
        $('.dataTable tr').removeClass('selected_table_row');
        $(this).toggleClass('selected_table_row');
    });
}

function change_customer_status(id,status){
    $.ajax({
        url:"<?php echo site_url('customer/change_customer_status'); ?>",
        type:"POST",
        dataType: 'json',
        data:{'person_auto_id':id,'type':'customer'},
        success:function(data){
            simple_alert(data['log_status'],data['title'],data['message']);
        }
    });
}

function load_tab(status=0){
    if (status) {
        if (!window.person_auto_id) {
            $('.tab_title').html('<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('customer_new_customers'); ?>');
            form_reset();
        }
    }else{
        $('.navbar-nav a[href="#all_customers"]').tab('show');
    }
}
</script>
