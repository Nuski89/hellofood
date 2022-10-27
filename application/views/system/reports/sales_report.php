<section class="content-header">
    <div class="tab-content" style="padding-bottom: 1px;">
        <div class="tab-pane fade active in" id="all_sales">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                    <table id="fetch_sales_table" class="<?php echo report_datatable_class(); ?>">
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
    </div>
</section>
<div id="pos_print_modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Receipt</h4>
      </div>
      <div class="modal-body" id="pos_print_body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="print_ticket('pos')">Print</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
var sales_auto_id;
var sales_table;
$(document).ready(function() {
    window.sales_auto_id  = null;
    window.sales_table    = null;
    fetch_sales_table();
});

function fetch_sales_table(){
    sales_table = $('#fetch_sales_table').DataTable( {
        "autoWidth": false,
        "order": [[0,'desc']],
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
            "lengthMenu"    : '_MENU_ ',
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

    sales_table.on('click', 'tr', function () {
        $('.dataTable tr').removeClass('selected_table_row');
        $(this).toggleClass('selected_table_row');
    });

    $('.buttons-colvis, .buttons-copy, .buttons-excel, .buttons-csv, .buttons-pdf').each(function() {
        $(this).removeClass('dt-button').addClass('btn btn-primary')
    });
}
</script>
