<form name="frmLogin" method="POST" action="<?php echo base_url(); ?>index/home">
    <div id="login-box">
        <h2>Login</h2>
        Welcome to Gampola Information System. Please login with your Username &amp; Password.
        <br />

        <br />
        <div id="login-box-name" style="margin-top:20px;">Username:</div><div id="login-box-field" style="margin-top:20px;"><input name="user_name" id="user_name" class="form-login" title="Username" value="<?php echo set_value('user_name')?>" size="30" maxlength="2048" /><?php echo form_error('user_name'); ?></div>
        <div id="login-box-name">Password:</div><div id="login-box-field"><input name="user_password" id="user_password" type="password" class="form-login" title="Password" value="" size="30" maxlength="2048" /><?php echo form_error('user_password'); ?></div>
        <br />
        <div class="login_error" style="margin: 10px 0 0 90px;">
            <?php echo $error_msg; ?>
        </div>
        <span class="login-box-options"><a href="#">Forgot password?</a></span>
        <br />
        <br />

        <input type="image" name="btnLogin" id="btnLogin" src="<?php echo base_url(); ?>images/login-btn.png" width="103" height="42" style="margin-left:90px; margin-top:5px;" />
    </div>
</form>