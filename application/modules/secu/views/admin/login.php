<form name="frmLogin" method="POST" action="<?php echo base_url(); ?>secu/admin/admin_area">    
    <div id="login_box">
        <div id="login_title_bar"><img src="<?php echo base_url(); ?>images/admin/login_titlebar.jpg" /></div>
        <div class="alert">
        	<?php echo $error_msg; ?>
        </div>
        <div id="login_form_element">            
            <div id="log_ele1"><input name="user_name" type="text" id="user_name" value="<?php echo set_value('user_name')?>" class="login_txtbx" /><?php echo form_error('user_name'); ?></div>
            <div id="log_ele2"><input name="user_password" type="password" id="user_password" class="login_txtbx" /><?php echo form_error('user_password'); ?></div>
            <div id="login_btn"><input type="submit" name="btnLogin" id="btnLogin" value="LOGIN" class="submit_btn" /></div>
        </div>
    </div>
</form>