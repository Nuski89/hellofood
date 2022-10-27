<section class="content-header">
    <div class="tab-content" style="padding-bottom: 1px;">
        <div class="tab-pane fade active in" id="all_products">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                    <table id="fetch_product_table" class="<?php echo report_datatable_class(); ?>">
                        <thead class="selected_table_row">
                            <tr>
                                <th style="width: 10px;"><?php echo $this->lang->line('code'); ?></th>
                                <th style="width: 150px;"><?php echo $this->lang->line('category'); ?></th>
                                <th><?php echo $this->lang->line('product_name'); ?></th>
                                <th style="width: 10px;"><?php echo $this->lang->line('discount'); ?></th>
                                <th style="width: 100px;"><?php echo $this->lang->line('product_cost'); ?></th>
                                <th style="width: 100px;"><?php echo $this->lang->line('selling_wholesale_price'); ?></th>
                                <th style="width: 100px;"><?php echo $this->lang->line('selling_price'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="9" class="danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
var product_auto_id;
var product_table;
$(document).ready(function() {
    window.product_auto_id = null;
    window.product_table   = null;
    fetch_product_table();
});

function fetch_product_table(){
    product_table = $('#fetch_product_table').DataTable( {
        "autoWidth": false,
        "order": [[0,'asc']],
        "dom": '<"datatable-header"flB><"datatable-scroll-lg"tr><"datatable-footer"ip>',
        "lengthMenu"        : [[10,25,50,100,-1],[10,25,50,100,"All"]],
        "displayLength"     : 100,
        "processing"        : true,
        "serverSide"        : true,
        "stateSave"         : true,
        "destroy"           : true,
        "pagingType"        : "full_numbers",
        "deferRender"       : true,
        "colReorder"        : true,
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
        "sAjaxSource": "<?php echo site_url('product/fetch_products'); ?>",
        drawCallback: function ( settings ) {
            $('[data-toggle="tooltip"]').tooltip();
        },
        "columns": [
            {"data": "product_code"},
            {"data": "product_category"},
            {"data": "product_name"},
            {"data": "product_discount"},
            {"data": "product_cost"},
            {"data": "product_wholesale_price"},
            {"data": "product_price"},
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

    product_table.on('click', 'tr', function () {
        //$('.dataTable tr').removeClass('selected_table_row');
        $(this).toggleClass('selected_table_row');
    });

    $('.buttons-colvis, .buttons-copy, .buttons-excel, .buttons-csv, .buttons-pdf').each(function() {
        $(this).removeClass('dt-button').addClass('btn btn-primary')
    });
}
</script>
