<section class="content-header">
    <nav class="navbar navbar-default navbar-sub animated bounce">
        <a class="navbar-brand" href="<?php echo current_url(); ?>"><i class="fa fa-users color" aria-hidden="true"></i></a>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#all_employees" data-toggle="tab"><i class="fa fa-server" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('employee_all_employees'); ?></a></li>
                <li><a href="#new_employee" data-toggle="tab" class="tab_title"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('employee_new_employees'); ?></a></li>
            </ul>
        </div>
    </nav>
    <div class="tab-content" style="padding-bottom: 1px;">
        <div class="tab-pane fade active in" id="all_employees">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                    <table id="fetch_employee_table" class="<?php echo datatable_class(); ?>">
                        <thead class="selected_table_row">
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th style="width: 100px;">&nbsp;</th>
                                <th><?php echo $this->lang->line('employee_details'); ?></th>
                                <th style="width: 50px;"><?php echo $this->lang->line('employee_login'); ?></th>
                                <th style="width: 50px;"><?php echo $this->lang->line('employee_status'); ?></th>
                                <th style="width: 150px; text-align: center;"><?php echo $this->lang->line('action'); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="new_employee">
            <?php echo $detail; ?>
        </div>
    </div>
</section>
<script type="text/javascript">
var employee_auto_id;
var employee_table;
var employee_group_arr;
$(document).ready(function() {
    window.employee_auto_id  = null;
    window.employee_table  = null;
    window.employee_group_arr = <?php echo json_encode($this->lang->line('employee_group_arr')); ?>;
    fetch_employee_table();
});

function fetch_employee_table(){
    window.employee_table = $('#fetch_employee_table').DataTable({
        "autoWidth": false,
        "order": [[0,'asc'],[8,'desc']],
        "dom": '<"datatable-header"fl><"datatable-scroll-lg"tr><"datatable-footer"ip>',
        "language": {
            "search"        : '_INPUT_ ',
            "lengthMenu"    : '_MENU_ <button type="button" onclick="load_tab(1)" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('employee_new_employees'); ?> </button>',
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
        "sAjaxSource": "<?php echo site_url('employee/fetch_employees'); ?>",
        "aaSorting": [[1, 'desc']],
        "fnDrawCallback": function (settings) {
            $('[data-toggle="tooltip"]').tooltip();
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            api.column(0, {page:'current'} ).data().each( function ( group_id, i ) {
                if ( last !== group_id ) {
                    $(rows).eq( i ).before(
                        '<tr class="warning"><td colspan="6" class="text-semibold"><span class="fa fa-file-text-o color" aria-hidden="true"></span> &nbsp;&nbsp;'+window.employee_group_arr[group_id]+'</td></tr>'
                    );
                    last = group_id;
                }
            });
            var x     = 0;
            var count = settings.aiDisplay.length;
            var start_pagination   = settings._iDisplayStart;
            for (var i = start_pagination; (count + start_pagination) > i; i++) {
                $('td:eq(0)', settings.aoData[settings.aiDisplay[x]].nTr).html(i + 1);
                if( parseInt(settings.aoData[x]._aData['employee_auto_id']) == employee_auto_id ){
                    var thisRow = settings.aoData[settings.aiDisplay[x]].nTr;
                    $(thisRow).addClass('selected_table_row');
                }
                x++;
            }
        },
        "columns": [
            {"data": "group_auto_id"},
            {"data": "img"},
            {"data": "detail"},
            {"data": "login_status"},
            {"data": "status"},
            {"data": "action"},
            {"data": "employee_name"},
            {"data": "employee_secondary_code"},
            {"data": "employee_mobile"},
            {"data": "employee_login_email"},
            {"data": "employee_auto_id"},
            {"data": "group_name"},
        ],
        "columnDefs": [{"sortable":false,"searchable":false,"targets":[1,2,3,4,5]},{"visible":false,"searchable":true,"targets": [6,7,8,9,10,11]}],
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

    window.employee_table.on('click', 'tr', function () {
        $('.dataTable tr').removeClass('selected_table_row');
        $(this).toggleClass('selected_table_row');
    });
}

function change_login_status(id,status){
    $.ajax({
        url:"<?php echo site_url('employee/change_login_status'); ?>",
        type:"POST",
        dataType: 'json',
        data:{'employee_auto_id':id,'type':'Employee'},
        success:function(data){
            simple_alert(data['log_status'],data['title'],data['message']);
        }
    });
}

function change_employee_status(id,status){
    $.ajax({
        url:"<?php echo site_url('employee/change_employee_status'); ?>",
        type:"POST",
        dataType: 'json',
        data:{'employee_auto_id':id,'type':'Employee'},
        success:function(data){
            simple_alert(data['log_status'],data['title'],data['message']);
        }
    });
}

function load_tab(status=0){
    if (status) {
        if (!window.employee_auto_id) {
            $('.tab_title').html('<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('employee_new_employees'); ?> ');
            form_reset();
        }else{
            simple_alert(4,'<?php echo $this->lang->line('warning'); ?>','<?php echo $this->lang->line('document_already_open'); ?>');
        }
    }else{
        $('.navbar-nav a[href="#all_employees"]').tab('show');
    }
}
</script>
