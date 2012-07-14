<div class="clear"></div>
	
	<div id="loader_area"></div>
	<!--  start loginbox ................................................................................. -->

	<div id="loginbox">
            <div class="alert"><?php echo $error_msg; ?></div>
			<form name="admin_login" method="POST" action="<?php echo base_url(); ?>admin/admin_area">

		<!--  start login-inner -->
			<input type="text" id="user_name" name="user_name" value="" class="login_txtbox" style="margin: 50px 0 0 70px;" />
			<div style="margin: 45px 0 0 70px;">
			<input type="password" id="user_password" name="user_password" value="" class="login_txtbox" />
			</div>

			<input type="image" name="Login" id="signin_btn" src="<?php echo base_url(); ?>images/admin/login_btn_bg.png" value="Sign In" />
                        <!--<input name="Login" value="Login" type="submit" class="login_btn">-->
			</form>
	 	</div>