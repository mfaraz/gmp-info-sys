<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/base/jquery-ui.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/login.css" type="text/css" media="screen" title="default" />

<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/admin/jquery-1.5.2.min.js"></script>
<script language="javascritp" type="text/javascript" src="<?php echo base_url(); ?>js/admin/jquery.pngFix.pack.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});

function setVal(ele)
{
    if(ele.value)
    {
        ele.value = "";
    }
}
</script>
<!--<script language="javascript" type="text/javascript" src="<?php //echo base_url(); ?>js/admin/script.js"></script>-->
</head>
<body id="login-bg">
 <!-- start logo -->
	<div id="logo-login">
            <img src="<?php echo base_url(); ?>images/logo.jpg" />
        </div>

	<!-- end logo -->
<!-- Start: login-holder -->
<div id="login-holder">

	<?php echo $contents; ?>
 <!--  end loginbox -->
</div>

<!-- start footer -->
<div id="login_footer">
	<!--  start footer-left -->

</div>
<!-- End: login-holder -->
</body>
</html>