<section class="content-header">
    <nav class="navbar navbar-default navbar-sub animated bounce">
        <a class="navbar-brand" href="<?php echo current_url(); ?>"><i class="fa fa-university color" aria-hidden="true"></i></a>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#all_branches" data-toggle="tab"><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('branch_all_branches'); ?></a></li>
                <li><a href="#new_branch" data-toggle="tab" class="tab_title"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('branch_new_branch'); ?></a></li>
            </ul>
        </div>
    </nav>
    <div class="tab-content" style="padding-bottom: 1px;">
        <div class="tab-pane fade active in" id="all_branches">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                    <table id="fetch_branch_table" class="<?php echo datatable_class(); ?>">
                        <thead class="selected_table_row">
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th><?php echo $this->lang->line('branch_details'); ?></th>
                                <th style="width: 150px;"><?php echo $this->lang->line('common_mobile'); ?></th>
                                <th style="width: 200px;"><?php echo $this->lang->line('common_email'); ?></th>
                                <th style="width: 50px;"><?php echo $this->lang->line('common_status'); ?></th>
                                <th style="width: 100px;"><?php echo $this->lang->line('common_action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6" class="danger text-center"><?php echo $this->lang->line('common_no_record_found'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>      
        </div>
        <div class="tab-pane fade" id="new_branch">
            <?php echo $detail; ?>
        </div>
    </div>
</section>

<!-- Tabales Modal Begins -->
<div id="branch_table_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="branch_name">Product Name</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" id="table_form">
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="table_name" name="table_name" placeholder="Table Name">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" id="table_btn" class="btn btn-primary btn-block"><i class="fa fa-plus" aria-hidden="true"></i> New Table</button>
                                </div>
                            </div>
                        </form>
                        <table class="table table-condensed table-striped">
                            <thead class="selected_table_row">
                                <th style="width:10px;">#</th>
                                <th>Table Name</th>
                                <th style="width:20px;">Status</th>
                                <th style="width:80px;">#</th>
                            </thead>
                            <tbody id="branch_table"></tbody>
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
<!-- Tabales Modal Ends -->

<script type="text/javascript">
var table_auto_id;
var branch_auto_id;
var branch_name;
var branch_table;
$(document).ready(function() {
    window.branch_auto_id  = null;
    window.branch_name  = null;
    window.table_auto_id  = null;
    window.branch_table    = null;
    fetch_branch_table();
    $('#table_form').bootstrapValidator({
        live: 'enabled',
        message: 'This value is not valid.',
        excluded: [':disabled'],
        fields: {
            table_name     : {validators: {notEmpty: {message: 'Table name is required.'}}},
        },
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        var $btn = $(this).button();
        var bv = $form.data('bootstrapValidator');
        var data = $form.serializeArray();
        data.push({'name': 'table_auto_id', 'value': window.table_auto_id});
        data.push({'name': 'branch_auto_id', 'value': window.branch_auto_id});
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: data,
            url: "<?php echo site_url('branch/save_table'); ?>",
            beforeSend: function () {
                start_loading();
            },
            success: function (data) {
                stop_loading();
                simple_alert(data['log_status'],data['title'],data['message']);
                if (data['status']) {
                    $('#table_form').bootstrapValidator('resetForm', true);
                    $('#table_form')[0].reset();
                    $('#table_btn').html('<i class="fa fa-plus" aria-hidden="true"></i> New Table');           
                    manage_tables(window.branch_auto_id,window.branch_name);
                }
            },
            error: function () {
                stop_loading();
                simple_alert(6,'e','<?php echo $this->lang->line('common_error_occurred'); ?>');
            }
        });
    });
});

function fetch_branch_table(){
    branch_table = $('#fetch_branch_table').DataTable( {
        "autoWidth": false,
        "order": [[ 0, 'asc' ]],
        "dom": '<"datatable-header"fl><"datatable-scroll-lg"tr><"datatable-footer"ip>',
        "language": {
            "search"        : '_INPUT_ ',
            "lengthMenu"    : '_MENU_ <button type="button" onclick="load_tab(1)" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('branch_new_branch'); ?> </button>',
            "paginate"      : { 'first': '<?php echo $this->lang->line('common_first'); ?>', 'last': '<?php echo $this->lang->line('common_last'); ?>', 'next': '&rarr;', 'previous': '&larr;' }
        },
        "lengthMenu"        : [[10,25,50,100,-1],[10,25,50,100,"All"]],
        "displayLength"     : 10,
        "processing"        : true,
        "serverSide"        : true,
        "stateSave"         : true,
        "destroy"           : true,
        "pagingType"        : "full_numbers",
        "deferRender"       : true,
        "sAjaxSource": "<?php echo site_url('branch/fetch_branches'); ?>",
        drawCallback: function ( settings ) {    
            $('[data-toggle="tooltip"]').tooltip();       
            var x     = 0;
            var count = settings.aiDisplay.length;
            var start_pagination   = settings._iDisplayStart;
            for (var i = start_pagination; (count + start_pagination) > i; i++) {
                $('td:eq(0)', settings.aoData[settings.aiDisplay[x]].nTr).html(i + 1);
                if( parseInt(settings.aoData[x]._aData['branch_auto_id']) == branch_auto_id ){
                    var thisRow = settings.aoData[settings.aiDisplay[x]].nTr;
                    $(thisRow).addClass('selected_table_row');
                }
                x++;
            }
        },
        "columns": [
            {"data": "branch_auto_id"},
            {"data": "detail"},
            {"data": "branch_mobile"},
            {"data": "branch_email"},
            {"data": "status"},
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

    branch_table.on('click', 'tr', function () {
        $('.dataTable tr').removeClass('selected_table_row');
        $(this).toggleClass('selected_table_row');
    });
}

function manage_tables(id,branch){
    window.branch_auto_id = id;
    window.branch_name = branch;
    $.ajax({
        url:"<?php echo site_url('branch/fetch_tables_data'); ?>",
        type:"POST",
        dataType: 'json',
        data:{'branch_auto_id':id},
        success:function(data){
            var x=1;
            $("#branch_table_modal").modal();
            $("#branch_name").html(branch + " Branch");
            $('#branch_table').empty();
            $.each(data, function (key, value) {
                $('#branch_table').append(
                    '<tr><td>' + x + '</td><td>' + value['table_name'] + '</td><td><div class="material-switch pull-right"><input type="checkbox" '+(value['table_status']==2 ? 'checked' :'')+' onchange="change_table_status('+value['table_auto_id']+',2)" id="table_status_'+value['table_auto_id']+'"><label class="label-success" for="table_status_'+value['table_auto_id']+'"></label></div></td><td><button class="btn btn-default btn-sm" onclick="edit_table('+value['table_auto_id']+',\''+value['table_name']+'\')"><i class="fa fa-pencil color"></i></button>&nbsp;<button class="btn btn-default btn-sm" onclick="delete_branch_table('+value['table_auto_id']+')"><i class="fa fa-trash-o color"></i></button></td></tr>');
                x++;
            });
        }
    }); 
}

function edit_table(id,name){
    window.table_auto_id = id;
    $('#table_btn').html('<i class="fa fa-plus" aria-hidden="true"></i> Update Table');
    $('#table_name').val(name);
}

function delete_branch_table(id){
    $.ajax({
        url:"<?php echo site_url('branch/delete_branch_table'); ?>",
        type:"POST",
        dataType: 'json',
        data :{'table_auto_id':id},
        success:function(data){
            simple_alert(data['log_status'],data['title'],data['message']);
            manage_tables(window.branch_auto_id,window.branch_name);
        }
    }); 
}

function change_branch_status(id,status){
    $.ajax({
        url:"<?php echo site_url('branch/change_branch_status'); ?>",
        type:"POST",
        dataType: 'json',
        data:{'branch_auto_id':id,'type':'branch'},
        success:function(data){
            simple_alert(data['log_status'],data['title'],data['message']);
        }
    }); 
}

function change_table_status(id,status){
    $.ajax({
        url:"<?php echo site_url('branch/change_table_status'); ?>",
        type:"POST",
        dataType: 'json',
        data:{'table_auto_id':id,'type':'Table'},
        success:function(data){
            simple_alert(data['log_status'],data['title'],data['message']);
        }
    }); 
}

function load_tab(status=0){
    if (status) {
        if (!window.branch_auto_id) {
            $('.tab_title').html('<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('branch_new_branch'); ?> ');
            form_reset();
        }
    }else{
        $('.navbar-nav a[href="#all_branches"]').tab('show');
    }  
}
</script> 