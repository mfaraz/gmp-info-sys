<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard Admin Panel</title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/layout.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/jquery-ui-1.8.21.custom.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="<?php echo base_url(); ?>js/admin/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/admin/hideshow.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/admin/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/admin/jquery.equalHeight.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/admin_script.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/jquery-ui-1.8.21.custom.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function()
    	{
      	  $(".tablesorter").tablesorter();
   	 }
	);
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
                    <h1 class="site_title"><a href="<?php echo base_url(); ?>admin/home">Website Admin</a></h1>
                        <h2 class="section_title">Dashboard</h2><div class="btn_view_site">logged ip: <?php echo $_SERVER['REMOTE_ADDR']; ?></div>
		</hgroup>
	</header> <!-- end of header bar -->

	<section id="secondary_bar">
		<div class="user">
			<p>Welcome <?php echo $this->session->userdata('admin_username'); ?> (<a href="logout" id="logout">logout</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><?php echo $breadcrumb; ?> </article>
		</div>
	</section><!-- end of secondary bar -->

	<aside id="sidebar" class="column">
		<h3>Language Manager</h3>
		<ul class="toggle">
			<li class="icn_photo"><a href="<?php echo base_url(); ?>secu/language/index">Languages</a></li>
		</ul>   <li class="icn_photo"><a href="<?php echo base_url(); ?>secu/language/add">Add Languages</a></li>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_jump_back"><a href="<?php echo base_url(); ?>secu/admin/logout">Logout</a></li>
		</ul>

		<footer>
			<hr />
                        <p><strong>Copyright &copy; 2012 Explorer Srilanka. Powered by e-designers.</strong></p>
			
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
