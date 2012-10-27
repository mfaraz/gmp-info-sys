<?php
if(!isset($this->session->userdata->admin_id))
{
    redirect(base_url() . 'secu/admin');
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Dashboard Admin Panel</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/jquery-ui.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/colorbox.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="http://code.jquery.com/jquery-1.7.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/admin/hideshow.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/admin/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/admin/jquery.equalHeight.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/admin_script.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/jquery-ui-1.8.21.custom.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/jquery.ui.tabs.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/jquery.colorbox.js"></script>
	<script type="text/javascript">
        $(function() {
            $("#tabs").tabs();
        });

	$(document).ready(function()
    {
        $(".tablesorter").tablesorter();
        $(".inline").colorbox({inline:true, width:"50%"});
    });
            
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
                    <h1 class="site_title"><a href="<?php echo base_url(); ?>secu/admin/home">Website Admin</a></h1>
                        <h2 class="section_title">Dashboard</h2><div class="btn_view_site">logged ip: <?php echo $_SERVER['REMOTE_ADDR']; ?></div>
		</hgroup>
	</header> <!-- end of header bar -->

	<section id="secondary_bar">
		<div class="user">
			<p>Welcome <?php echo $this->session->userdata('admin_username'); ?> (<a href="<?php echo base_url(); ?>secu/admin/logout" id="logout">logout</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><?php //echo $breadcrumb; ?> </article>
		</div>
	</section><!-- end of secondary bar -->

	<aside id="sidebar" class="column">
		<h3>General Details</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="<?php echo base_url(); ?>secu/zone/addzone">Add Zone (කලාප)</a></li>
			<li class="icn_new_article"><a href="<?php echo base_url(); ?>secu/branch/addbranch">Add Branch (ශාඛා)</a></li>
            <li class="icn_new_article"><a href="<?php echo base_url(); ?>secu/organization/addreligiousorg">Add Religious Organizations(විහාරස්ථ නාම ලේඛණය)</a></li>
            <li class="icn_new_article"><a href="<?php echo base_url(); ?>secu/organization/addmember">Add Organization Members</a></li>
		</ul>
                
		<footer>
			<hr />
                        <p><strong>Copyright &copy; 2012.</strong></p>
			
		</footer>
	</aside><!-- end of sidebar -->

	<section id="main" class="column">

		<!--<h4 class="alert_info">&nbsp;</h4>-->

		<article class="module width_full">
			<?php echo $contents; ?>
                </article>
		
		<div class="spacer"></div>
	</section>


</body>

</html>
