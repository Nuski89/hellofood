<style type="text/css">
body {
    background: url(<?php echo base_url('images/login/hello_food_bg_'.rand(1,3).'.jpg')?>) no-repeat center center fixed;
    -webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
.pixel-overlay {
    position:absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAGUlEQVQYV2NkQAOMOAXu3rzboKyu3IChAgBbOgQFreYUpgAAAABJRU5ErkJggg==); /* or any other overlay image/color */
}
</style>
<div class="blog-image">
    <div class="pixel-overlay"></div>
    <div class="login-box animated zoomIn">
		<div class="login-box-body">
			<div class="text-center m-b-md">
				<img src="<?php echo base_url('images/logo/hello-food-logo.png')?>" alt="logo"  style='max-width: 200px; margin: 0 auto'>
			</div><br>
			<?php echo form_open('login/login_submit',' id="login_form" role="form"'); ?>
				<div class="form-group has-feedback">
					<input type="email" class="form-control" name="username" placeholder="Username"  required/>
					<span class="fa fa-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="password" id="password" maxlength="15" minlength="5" placeholder="Password" required>
					<span class="fa fa-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<a href="<?php echo site_url('login/forget_password'); ?>">Forgot My Password</a>
					</div>
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp;&nbsp;Login</button>
					</div>
				</div>
			</form>
		</div>
		<?php
		if(isset($alert['message']) && $alert['type'] == 'error'){
			echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><h4><i class='fa fa-times' aria-hidden='true'></i> {$this->lang->line('error')} </h4>{$alert['message']}</div>";
		}
		elseif (isset($alert['message']) && $alert['type'] == 'warning'){
			echo "<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'>&times;</button><h4><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> {$this->lang->line('warning')} </h4>{$alert['message']}</div>";
		}
		elseif (isset($alert['message']) && $alert['type'] == 'success'){
			echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><h4><i class='fa fa-check' aria-hidden='true'></i> {$this->lang->line('success')} </h4>{$alert['message']}</div>";
		}
		elseif (isset($alert['message']) && $alert['type'] == 'info'){
			echo "<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><h4><i class='fa fa-info' aria-hidden='true'></i> {$this->lang->line('info')} </h4>{$alert['message']}</div>";
		}
		?>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#login_form').bootstrapValidator({
			live            : 'enabled',
			message         : 'This value is not valid.',
			excluded        : [':disabled'],
			fields          : {
				username    : {validators : {notEmpty:{message:'<?php echo $this->lang->line('login_username_is_required'); ?>'}}},
				password    : {validators : {notEmpty:{message:'<?php echo $this->lang->line('login_password_is_required'); ?>'}}}
			},
		}).on('success.form.bv', function(e) { });
        $(".alert").fadeIn().delay(3000).fadeOut( "slow" );
	});

    $(function () {
        var isShiftPressed = false;
        var isCapsOn = null;
        $("#password").bind("keydown", function (e) {
            var keyCode = e.keyCode ? e.keyCode : e.which;
            if (keyCode == 16) {
                isShiftPressed = true;
            }
        });
        $("#password").bind("keyup", function (e) {
            var keyCode = e.keyCode ? e.keyCode : e.which;
            if (keyCode == 16) {
                isShiftPressed = false;
            }
            if (keyCode == 20) {
                if (isCapsOn == true) {
                    isCapsOn = false;
                    $("#error").html('<span class=""></span>');
                    $("#error").html('<span class="fa fa-lock form-control-feedback"></span>');
                } else if (isCapsOn == false) {
                    isCapsOn = true;
                    $("#error").html('<span class=""></span>');
                    $("#error").html('<span class="fa fa-arrow-up form-control-feedback"></span>');
                }
            }
        });
        $("#password").bind("keypress", function (e) {
            var keyCode = e.keyCode ? e.keyCode : e.which;
            if (keyCode >= 65 && keyCode <= 90 && !isShiftPressed) {
                isCapsOn = true;
                $("#error").html('<span class=""></span>');
                $("#error").html('<span class="fa fa-arrow-up form-control-feedback"></span>');
            } else {
            	$("#error").html('<span class=""></span>');
                $("#error").html('<span class=" fa fa-lock form-control-feedback"></span>');
            }
        });
    });
</script>
