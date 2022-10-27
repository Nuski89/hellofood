</div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <?php echo "Time " . $this->benchmark->elapsed_time(); ?> </b><?php echo " Memory " . $this->benchmark->memory_usage(); ?>
        </div>
        <strong>Copyright &copy; 2015-<?php echo date("Y"); ?> <a href="http://www.designerpex.com/" target="_blank" class="color">  Designer Pex  </a>.</strong> All rights reserved.
    </footer>
  <aside class="control-sidebar control-sidebar-dark">
	<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
	  <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
	</ul>
	<div class="tab-content">
	  <div class="tab-pane" id="control-sidebar-home-tab">
		<h3 class="control-sidebar-heading">Recent Activity</h3>
		<ul class="control-sidebar-menu">

		</ul>

		<h3 class="control-sidebar-heading">Tasks Progress</h3>
		<ul class="control-sidebar-menu">

		</ul>
	  </div>
	</div>
  </aside>
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<div class="modal fade" id="register_modal" role="dialog" aria-labelledby="mySmallModalLabel" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-credit-card" aria-hidden="true"></i> &nbsp;<?php echo $this->lang->line('register'); ?></h4>
      </div>
      <form id="register_form">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="control-label"><?php echo $this->lang->line('opening_balance').required_mark(); ?></label>
            <div class="input-group">
                <div class="input-group-addon"><?php echo $this->_['app']['company_currency_code']; ?></div>
                <input type="text" class="form-control number" id="opening_blance" name="opening_blance" placeholder="<?php echo $this->lang->line('opening_balance'); ?>">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save'); ?></button>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="register_close_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-bars" aria-hidden="true"></i> &nbsp;<?php echo $this->lang->line('register'); ?></h4>
      </div>
      <form id="register_close_form">
      <div class="modal-body">
            <div class="row">
                <div class="col-md-3"><blockquote><footer>Opened by</footer><p id="opened_by"># </p></blockquote></div>
                <div class="col-md-3"><blockquote><footer>Cash in Hand</footer><p id="opene_cih">#</p></blockquote></div>
                <div class="col-md-4"><blockquote><footer>Opening time</footer><p id="opene_time">#</p></blockquote></div>
                <div class="col-md-2"><img alt="register" src="<?php echo base_url('images/register.svg'); ?>"></div>
            </div>
            <h4><i class="fa fa-bars" aria-hidden="true"></i> &nbsp;Payments Summary</h4>
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th width="25%">Payement Type</th>
                        <th width="25%">Expected [<?php echo $this->_['app']['company_currency_code']; ?>]</th>
                        <th width="25%">Counted [<?php echo $this->_['app']['company_currency_code']; ?>]</th>
                        <th width="25%">Differences [<?php echo $this->_['app']['company_currency_code']; ?>]</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cash</td>
                        <td><span id="expected_cash">0.00</span></td>
                        <td><div class="form-group"><input type="text" id="counted_cash" name="counted_cash" data-type="cash" class="con_tot number" placeholder ="0.00"></div></td>
                        <td><span id="diff_cash">0.00</span></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->lang->line('credit_card'); ?></td>
                        <td><span id="expected_credit_card">0.00</span></td>
                        <td><div class="form-group"><input type="text" id="counted_credit_card" data-type="credit_card" name="counted_credit_card" class="con_tot number" placeholder="0.00"></div></td>
                        <td><span id="diff_credit_card">0.00</span></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->lang->line('gift_card'); ?></td>
                        <td><span id="expected_gift_card">0.00</span></td>
                        <td><div class="form-group"><input type="text" id="counted_gift_card" data-type="gift_card" name="counted_gift_card" class="con_tot number" placeholder="0.00"></div></td>
                        <td><span id="diff_gift_card">0.00</span></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->lang->line('gift_card'); ?></td>
                        <td><span id="expected_cheque">0.00</span></td>
                        <td><div class="form-group"><input type="text" id="counted_cheque" data-type="cheque" name="counted_cheque" class="con_tot number" placeholder="0.00"></div></td>
                        <td><span id="diff_cheque">0.00</span></td>
                    </tr>
                    <tr class="warning">
                    <td>Total</td>
                    <td><span id="expected_total">0.00</span></td>
                    <td><span id="counted_total">0.00</span></td>
                    <td><span id="diff_total">0.00</span></td>
                    </tr>
                </tbody>
            </table><br>
            <div class="form-group">
                <h4><i class="fa fa-bars" aria-hidden="true"></i> &nbsp;Note</h4>
                <textarea rows="2" class="form-control" name="note" id="note"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save'); ?></button>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="common_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="modal_title">Modal title</h4>
		</div>
		<div class="modal-body" id="modal_body">

		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
  </div>
</div>
<div class="modal fade" id="attachment_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="attachment_title">Modal title</h4>
		</div>
		<div class="modal-body">
			<?php echo form_open_multipart('', 'id="attachment_uplode_form" class="form-inline"'); ?>
                <div class="form-group">
                    <input type="text" class="form-control" id="attachment_description" name="attachment_description" placeholder="Description...">
                    <input type="hidden" class="form-control" id="document_auto_id" name="document_auto_id">
                    <input type="hidden" class="form-control" id="attachment_maste_id" name="attachment_maste_id">
                </div>
                <div class="form-group">
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput" style="margin-top: 8px;">
                        <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file color fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                        <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></span><span class="fileinput-exists"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></span><input type="file" name="document_file" id="document_file"></span>
                        <a class="input-group-addon btn btn-default fileinput-exists" id="remove_id" data-dismiss="fileinput"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                    </div>
                </div>
                <button type="button" class="btn btn-default" onclick="document_uplode()"><span class="glyphicon glyphicon-floppy-open color" aria-hidden="true"></span></button>
            </form>
			<table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Expiry date</th>
                        <th>Description</th>
                        <th class="text-center" style="width: 50px;">Type</th>
                        <th class="text-center" style="width: 50px;">Action</th>
                    </tr>
                </thead>
                <tbody id="attachment_body" class="no-padding">
                    <tr class="danger">
                        <td colspan="5" class="text-center">No Attachment Found</td>
                    </tr>
                </tbody>
            </table>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
  </div>
</div>

<script type="text/javascript" src="plugins/theme/js/demo.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
  	number_validation();
    window.register_id      = 0;
  	window.flag_status 		= 1;
	window.alert_status 	= 1;
	window.message_status 	= 1;
	window.language_status 	= 1;
	window.socket_status 	= '<?php echo json_encode(SOCKET_STATUS); ?>';
	$('[data-toggle="popover"]').popover();
	$('[data-toggle="tooltip"]').tooltip();

});

function alert_options() {
    return {
		"closeButton": true,
		"debug": true,
		"newestOnTop": true,
		"progressBar": true,
		"positionClass": "toast-bottom-right animated-panel bounceIn",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
}

function start_loading(){
	HoldOn.open({
	  theme: "sk-cube-grid",//If not given or inexistent theme throws default theme , sk-bounce
	  message: "<br><div style='font-size: 13px;'> Loading, Please wait </div><br><center><img src='<?php echo base_url('images/logo/logo.png'); ?>'/></center>",
	  content: 'test', // If theme is set to "custom", this property is available
	  textColor: "white" // Change the font color of the message
	});
}

// Socket Sender
function socket_sender(type = 'flag',response = 'Hello',user = '1'){
	// type = 1:Message | 2:Alert | 3:Flag
	// Response = Message to display
	// User = 0 General | Any User ID
	if (window.socket_status==1) {
		var socket = io.connect( 'http://'+window.location.hostname+':3000' );
		if (type == 'message') {
			socket.emit('new_message', {
				new_count_message: '1'
			});
		}
		if (type == 'alert') {
			socket.emit('new_alert', {
				new_count_message: '1'
			});
		}
		if (type == 'flag') {
			socket.emit('new_flag', {
				new_count_message: '1'
			});
		}
	}
}

function attachment_modal(document_auto_id, attachment_maste_id,is_delete=0) {
    if (document_auto_id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url("Attachment/fetch_attachments"); ?>',
            dataType: 'json',
            data: {'document_auto_id': document_auto_id, 'attachment_maste_id': attachment_maste_id},
            beforeSend: function () {
                start_loading();
            },
            success: function (data) {
            	stop_loading();
            	$('#document_auto_id').val(document_auto_id);
            	$('#attachment_maste_id').val(attachment_maste_id);
                $('#attachment_title').html('<span aria-hidden="true" class="glyphicon glyphicon-hand-right color"></span> &nbsp;' + data['name'] + "");
                $('#attachment_body').empty();
                if (!jQuery.isEmptyObject(data['attachments'])) {
                	//alert('asas');
                    for (var i = 0; i < data['attachments'].length; i++) {
                        type = '<i class="color fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>';
                        if (data['attachments'][i]['attachment_file_type'] == '.xlsx') {
                            type = '<i class="color fa fa-file-excel-o fa-2x" aria-hidden="true"></i>';
                        } else if (data['attachments'][i]['attachment_file_type'] == '.xls') {
                            type = '<i class="color fa fa-file-excel-o fa-2x" aria-hidden="true"></i>';
                        } else if (data['attachments'][i]['attachment_file_type'] == '.xlsxm') {
                            type = '<i class="color fa fa-file-excel-o fa-2x" aria-hidden="true"></i>';
                        } else if (data['attachments'][i]['attachment_file_type'] == '.doc') {
                            type = '<i class="color fa fa-file-word-o fa-2x" aria-hidden="true"></i>';
                        } else if (data['attachments'][i]['attachment_file_type'] == '.docx') {
                            type = '<i class="color fa fa-file-word-o fa-2x" aria-hidden="true"></i>';
                        } else if (data['attachments'][i]['attachment_file_type'] == '.ppt') {
                            type = '<i class="color fa fa-file-powerpoint-o fa-2x" aria-hidden="true"></i>';
                        } else if (data['attachments'][i]['attachment_file_type'] == '.pptx') {
                            type = '<i class="color fa fa-file-powerpoint-o fa-2x" aria-hidden="true"></i>';
                        } else if (data['attachments'][i]['attachment_file_type'] == '.jpg') {
                            type = '<i class="color fa fa-file-image-o fa-2x" aria-hidden="true"></i>';
                        } else if (data['attachments'][i]['attachment_file_type'] == '.jpeg') {
                            type = '<i class="color fa fa-file-image-o fa-2x" aria-hidden="true"></i>';
                        } else if (data['attachments'][i]['attachment_file_type'] == '.gif') {
                            type = '<i class="color fa fa-file-image-o fa-2x" aria-hidden="true"></i>';
                        } else if (data['attachments'][i]['attachment_file_type'] == '.png') {
                            type = '<i class="color fa fa-file-image-o fa-2x" aria-hidden="true"></i>';
                        } else if (data['attachments'][i]['attachment_file_type'] == '.txt') {
                            type = '<i class="color fa fa-file-text-o fa-2x" aria-hidden="true"></i>';
                        }

                        $('#attachment_body').append('<tr><td>' + (i + 1) + '</td><td>' + data['attachments'][i]['attachment_name'] + '</td><td>' + data['attachments'][i]['attachment_description'] + '</td><td class="text-center">' + type + '</td><td class="text-center"><a target="_blank" href="<?php echo base_url("attachments"); ?>/' + data['attachments'][i]['attachment_name'] + '" ><i class="fa fa-download fa-2x" aria-hidden="true"></i></a></td></tr>');
                    }
                } else {
                    $('#attachment_body').append('<tr class="danger"><td colspan="5" class="text-center">No Attachment Found</td></tr>');
                }
                $("#attachment_modal").modal({backdrop: "static", keyboard: true});
            },
            error: function (xhr, ajaxOptions, thrownError) {
                simple_alert(6,'<?php echo $this->lang->line('common_error'); ?>','<?php echo $this->lang->line('error_occurred'); ?>');
            }
        });
    }
}

function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}

function document_detail_modal(document_auto_id, attachment_maste_id) {
    if (document_auto_id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url("Attachment/fetch_attachments"); ?>',
            dataType: 'json',
            data: {'document_auto_id': document_auto_id, 'attachment_maste_id': attachment_maste_id},
            beforeSend: function () {
                start_loading();
            },
            success: function (data) {
            	stop_loading();
                    $('#modal_title').html('<span aria-hidden="true" class="glyphicon glyphicon-hand-right color"></span> &nbsp;' + data['name'] + "");

                $("#common_modal").modal({backdrop: "static", keyboard: true});
            },
            error: function (xhr, ajaxOptions, thrownError) {
                simple_alert(6,'<?php echo $this->lang->line('common_error'); ?>','<?php echo $this->lang->line('error_occurred'); ?>');
            }
        });
    }
}

function document_uplode() {
        var formData = new FormData($("#attachment_uplode_form")[0]);
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: "<?php echo site_url('Attachment/do_upload'); ?>",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                start_loading();
            },
            success: function (data) {
                stop_loading();
                simple_alert(1,data['type'], data['message']);
                if (data['status']) {
                    attachment_modal($('#document_auto_id').val(), $('#attachment_maste_id').val());
                    // $('#remove_id').click();
                    // $('#attachment_description').val('');
                }
            },
            error: function (data) {
                stop_loading();
                simple_alert(6,'<?php echo $this->lang->line('common_error'); ?>','<?php echo $this->lang->line('error_occurred'); ?>');
            }
        });
        return false;
}

function to_currency(number,is_symbol=1,decimals=0){
    window.company_arr      = <?php echo json_encode($this->_['app']); ?>;
    decimals=parseFloat(window.company_arr['company_currency_decimal']);
    if(number==0){
        return number;
    }else if(number<0) {
        return "<span style='color:red;'>"+(is_symbol==1 ? window.company_arr['company_currency_symbol'] : '')+"("+parseFloat(number).formatMoney(decimals, '.', ',')+')</span>';
    }else{
        return (is_symbol==1 ? window.company_arr['company_currency_symbol'] : '')+' '+parseFloat(number).formatMoney(decimals, '.', ',');
    }
}
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#preloader').fadeOut('slow',function(){
            $(this).remove();
        });
    });
</script>

</body>
</html>
