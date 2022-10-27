<section class="content-header">
    <div class="tab-content" style="padding-bottom: 1px;">
        <div class="tab-pane fade active in" id="all_employees">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                    <table id="fetch_employee_table" class="<?php echo report_datatable_class(); ?>">
                        <thead class="selected_table_row">
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th style="width: 50px;">Name</th>
                                <th style="width: 50px;">Secondary Code</th>
                                <th style="width: 150px;">Mobile</th>
                                <th style="width: 150px;">Email</th>
                                <th style="width: 150px;">Group Name</th>
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
    window.employee_table   = null;
    window.employee_group_arr = <?php echo json_encode($this->lang->line('employee_group_arr')); ?>;
    fetch_employee_table();
});

function fetch_employee_table(){
    window.employee_table = $('#fetch_employee_table').DataTable({
        "autoWidth": false,
        "order": [[0,'asc'],[1,'desc']],
        "dom": '<"datatable-header"flB><"datatable-scroll-lg"tr><"datatable-footer"ip>',
        "buttons": [
            'colvis',
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        "language": {
            "search"        : '_INPUT_',
            "lengthMenu"    : '_MENU_',
            "paginate"      : { 'first': '<?php echo $this->lang->line('first'); ?>', 'last': '<?php echo $this->lang->line('last'); ?>', 'next': '&rarr;', 'previous': '&larr;' }
        },
        "lengthMenu"        : [[10,25,50,100,-1],[10,25,50,100,"All"]],
        "displayLength"     : 100,
        "processing"        : true,
        "serverSide"        : true,
        "stateSave"         : true,
        "destroy"           : true,
        "pagingType"        : "full_numbers",
        "deferRender"       : true,
        "colReorder"        : true,
        "sAjaxSource": "<?php echo site_url('employee/fetch_employees'); ?>",
        "aaSorting": [[1, 'desc']],
        "fnDrawCallback": function (settings) {
            $('[data-toggle="tooltip"]').tooltip();
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
            {"data": "employee_name"},
            {"data": "employee_secondary_code"},
            {"data": "employee_mobile"},
            {"data": "employee_login_email"},
            {"data": "group_name"},
        ],
        "columnDefs": [{"sortable":false,"searchable":false,"targets":[1,2,3,4,5]}],
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

    $('.buttons-colvis, .buttons-copy, .buttons-excel, .buttons-csv, .buttons-pdf').each(function() {
        $(this).removeClass('dt-button').addClass('btn btn-primary')
    });
}


</script>
