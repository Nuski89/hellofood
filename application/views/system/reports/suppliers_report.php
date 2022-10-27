<section class="content-header">
    <div class="tab-content" style="padding-bottom: 1px;">
        <div class="tab-pane fade active in" id="all_suppliers">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                    <table id="fetch_supplier_table" class="<?php echo report_datatable_class(); ?>">
                        <thead class="selected_table_row">
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th style="width: 150px;"><?php echo $this->lang->line('supplier_details'); ?></th>
                                <th style="width: 150px;"><?php echo $this->lang->line('mobile'); ?></th>
                                <th style="width: 150px;"><?php echo $this->lang->line('email'); ?></th>
                                <th style="width: 150px;"><?php echo $this->lang->line('fax'); ?></th>
                                <th style="width: 150px;"><?php echo $this->lang->line('balance'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8" class="danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="new_supplier">
            <?php echo $detail; ?>
        </div>
    </div>
</section>
<script type="text/javascript">
var supplier_auto_id;
var supplier_table;
var supplier_group_arr;
$(document).ready(function() {
    window.supplier_auto_id  = null;
    window.supplier_table  = null;
    window.supplier_group_arr = <?php echo json_encode($this->lang->line('supplier_group_arr')); ?>;
    fetch_supplier_table();
});

function fetch_supplier_table(){
    supplier_table = $('#fetch_supplier_table').DataTable( {
        "autoWidth": false,
        "order": [[0,'desc'],[1,'desc']],
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
        "sAjaxSource": "<?php echo site_url('supplier/fetch_suppliers'); ?>",
        drawCallback: function ( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
            var x     = 0;
            var count = settings.aiDisplay.length;
            var start_pagination   = settings._iDisplayStart;
            for (var i = start_pagination; (count + start_pagination) > i; i++) {
                $('td:eq(0)', settings.aoData[settings.aiDisplay[x]].nTr).html(i + 1);
                if( parseInt(settings.aoData[x]._aData['supplier_auto_id']) == supplier_auto_id ){
                    var thisRow = settings.aoData[settings.aiDisplay[x]].nTr;
                    $(thisRow).addClass('selected_table_row');
                }
                x++;
            }
        },
        "columns": [
            {"data": "supplier_auto_id"},
            {"data": "supplier_company_name"},
            {"data": "supplier_mobile"},
            {"data": "supplier_email"},
            {"data": "supplier_fax"},
            {"data": "supplier_fax"},
        ],
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

    supplier_table.on('click', 'tr', function () {
        $('.dataTable tr').removeClass('selected_table_row');
        $(this).toggleClass('selected_table_row');
    });

    $('.buttons-colvis, .buttons-copy, .buttons-excel, .buttons-csv, .buttons-pdf').each(function() {
        $(this).removeClass('dt-button').addClass('btn btn-primary')
    });
}
</script>
