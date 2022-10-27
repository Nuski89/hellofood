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
                <img src="<?php echo base_url('images/logo/logo.png')?>" alt="logo"  style='max-width: 200px; margin: 0 auto'>
            </div><br>
            <?php echo form_open('login/forgot_password',' id="login_form" role="form" autocomplete="off"'); ?>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="username" placeholder="Email Address" autofocus required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-7"> <a href="<?php echo site_url('login'); ?>">Back to Login</a> </div>
                    <div class="col-xs-5">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-share" aria-hidden="true"></i> &nbsp;&nbsp;Reset</button>
                    </div>
                </div>
            </form>
        </div>
        <?php
        if(isset($alert['message']) && $alert['type'] == 'error'){
            echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><h5>{$this->lang->line('common_error')} </h5>{$alert['message']}</div>";
        }
        elseif (isset($alert['message']) && $alert['type'] == 'warning'){
            echo "<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'>&times;</button><h5>{$this->lang->line('common_warning')} </h5>{$alert['message']}</div>";
        }
        elseif (isset($alert['message']) && $alert['type'] == 'success'){
            echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><h5>{$this->lang->line('common_success')} </h5>{$alert['message']}</div>";
        }
        elseif (isset($alert['message']) && $alert['type'] == 'info'){
            echo "<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><h5>{$this->lang->line('common_info')} </h5>{$alert['message']}</div>";
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
            username    : {validators : {notEmpty:{message:'Username is required.'}}},
            password    : {validators : {notEmpty:{message:'Password is required.'}}}
        },
    }).on('success.form.bv', function(e) { });
});
</script>