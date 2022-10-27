<?php echo page_heading('System Logger','Log Detailes'); 
echo page_header('System Logger'); ?>
<div class="no-print">
  <button data-original-title="Print This Document" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="right" onclick="window.print();" title="Print This Document"><span aria-hidden="true" class="glyphicon glyphicon-print color"></span></button>
</div>
<hr class="hr">
<table id="fetch_log_table" class="table table-striped table-condensed">
  <thead>
    <tr>
      <th style="min-width: 5%">#</th>
      <th style="min-width: 95%">Log Details</th>
    </tr>
  </thead>
</table>
<?php echo page_footer('footer','footer',false); ?>
<script type="text/javascript">
$(document).ready(function() {
    fetch_log_table();
});

function fetch_log_table(){
    var Otable = $('#fetch_log_table').DataTable({
        "bProcessing": true,
        "bServerSide": true,
        "bDestroy": true,
        "StateSave": true,
        "sAjaxSource": "<?php echo site_url('Dashboard/fetch_system_log'); ?>",
        "aaSorting": [[1, 'desc']],
        "fnInitComplete": function () {

        },
        "fnDrawCallback": function (oSettings) {
                for (var i = 0, iLen = oSettings.aiDisplay.length; i < iLen; i++) {
                    $('td:eq(0)', oSettings.aoData[oSettings.aiDisplay[i]].nTr).html(i + 1);
                }
        
        },
        "aoColumns": [
            {"mData": "user_id"},
            {"mData": "detail"},
        ],
        //"columnDefs": [{"targets": [2], "orderable": false}],
        "fnServerData": function (sSource, aoData, fnCallback) {
            aoData.push({ "name": "gender","value": $("#gender option:selected").val()});
            aoData.push({ "name": "civil_status","value": $("#civil_status option:selected").val()});
            aoData.push({ "name": "branch_code","value": $("#branch_code option:selected").val()});
            $.ajax({
                'dataType': 'json',
                'type': 'POST',
                'url': sSource,
                'data': aoData,
                'success': fnCallback
                });
            }
        });
} 

function close_page(){
    swal({
        title: "Are you sure ?",
        //text: "Your will not be able to recover this data !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Close Page"
    },
    function () {
        fetchPage('Dashboard/system_dashboard','','','Dashboard');
    });
}
</script> 