<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Gampola Area Information System</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="description" content="_your description goes here_" />
<meta name="keywords" content="_your,keywords,goes,here_" />
<meta name="author" content="PM Office" />
<style type="text/css">@import url(<?php echo base_url(); ?>css/system_2.css);</style>

<!-- Listbox Styling  -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/listbox-style.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/customSelect.txt"></script>
<script type="text/javascript">
	$(function(){
	$('select.styled').customSelect();
	});
</script>

<!-- Left Navi Menu Styling  -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/left-navi-menu_2.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/sliding_effect.js"></script>
</head>

<body>
<!-- Main Contaier -->
<div id="container">
	<div id="sitetitle">
		<div class="logo"></div>
		<h1><a href="#">ICSA</a></h1>
		<h2>Information System of Gampola Area </h2>
	</div>

	<!-- Top Menu Start -->
	<div id="profileinfo">

	 <!-- Managing Links start -->
	 <div class="managing">
		<ul>
			<li><a href="#">User Management</a></li>
			<li><a href="#">History</a></li>
			<li><a href="#">Profile info</a></li>
			<li><a href="#" style="background:#993300 url(images/log-out-1.gif) 90% 11px no-repeat; padding:15px 32px 15px 10px;">Logout</a></li>
		</ul>
	 </div>
	 <!-- Managing Links start -->

    <div class="sideBox">
        <span class="log-image"><a href="#"><img src="images/be-logimage.jpg" alt=""/></a></span>
		<h1 style="margin-top:16px;">Welcome Name..</h1>
		<p class="log-txt">You logged as a Superadmin</p>
    </div>
	</div><!-- Top Menu End -->

	<!-- Search area Start -->
	<div id="search">
		 <form action="" method="post" name="cat">
			 <div class="form-sect-1">
				<select style="width:120px; position: absolute; opacity: 0; font-size: 12px; height: 24px;" class="styled">
					<option selected="selected">ආගම (Religion)</option>
					<option>two</option>
					<option>something</option>
					<option>4</option>
					<option>5</option>
				</select>

				<select style="width:150px; position: absolute; opacity: 0; font-size: 12px; height: 24px;" class="styled">
					<option selected="selected">වර්ගය (Nationality)</option>
					<option>two</option>
					<option>something</option>
					<option>4</option>
					<option>5</option>
				</select>

				<select style="width:150px; position: absolute; opacity: 0; font-size: 12px; height: 24px;" class="styled">
					<option selected="selected">ස්ත්‍රී / පුරුෂ (Gender)</option>
					<option>two</option>
					<option>something</option>
					<option>4</option>
					<option>5</option>
				</select>

				<select style="width:110px; position: absolute; opacity: 0; font-size: 12px; height: 24px;" class="styled">
					<option selected="selected">වයස (Age)</option>
					<option>two</option>
					<option>something</option>
					<option>4</option>
					<option>5</option>
				</select>

				<input name="search" type="button" value="" title="Search" class="s-btn1" />
			 </div>
		 </form>
           
		 <form action="" method="post" name="cat">
			 <div class="form-sect-2">
                                <a href="<?php echo base_url(); ?>index/lang/en">EN</a> | <a href="<?php echo base_url(); ?>index/lang/de">DE</a>
			 	<input name="" type="text" title="Search" class="textbox-styling" style="width:170px; font-size: 12px;" />

			 	<input name="search" type="button" value="" title="Search" class="s-btn2" />
			 </div>
		 </form>

	</div><!-- Search area End -->

	<!-- Mid Content Start -->
	<div id="content">
		<!-- Left Section Start -->
		<div id="left">
			<div id="navigation-block">
				<ul id="sliding-navigation">
					<li class="sliding-element"><h3>ප්‍රධාන පටුන</h3></li>
					<li class="sliding-element"><a href="#">ජනවාර්ගික තොරතුරු</a></li>
					<li class="sliding-element"><a href="#">පරිපාලන සිතියම</a></li>
					<li class="sliding-element"><a href="#">ආගම් පිලිබඳ තොරතුරු</a></li>
					<li class="sliding-element"><a href="#">විහාරස්ථාන නාමලේඛනය</a></li>
					<li class="sliding-element"><a href="#">හින්දු දේවාල</a></li>
					<li class="sliding-element"><a href="#">ක්‍රිස්තියානි පල්ලි</a></li>
					<li class="sliding-element"><a href="#">මුස්ලිම් පල්ලි</a></li>
				</ul>
		  		<img src="images/left-navi-bg.png" id="hide" />
			</div>

		<!-- Gampola Map area Start -->
		<h2>Gampola Electorate</h2>
		<iframe width="240" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" class="gampolamap" src="https://maps.google.com/maps?hl=en&amp;q=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;ie=UTF8&amp;geocode=FTJTbQAdm4DNBA&amp;split=0&amp;sll=37.0625,-95.677068&amp;sspn=23.875,57.630033&amp;hq=&amp;hnear=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;t=m&amp;source=embed&amp;ll=7.164682,80.576563&amp;spn=0.136427,0.261612&amp;z=13&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?hl=en&amp;q=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;ie=UTF8&amp;geocode=FTJTbQAdm4DNBA&amp;split=0&amp;sll=37.0625,-95.677068&amp;sspn=23.875,57.630033&amp;hq=&amp;hnear=Gampola,+Kandy,+Central+Province,+Sri+Lanka&amp;t=m&amp;source=embed&amp;ll=7.164682,80.576563&amp;spn=0.136427,0.261612&amp;z=13" style=" float:left; color:#333333;text-align:left; margin:0 0 0 0;">View Larger Map</a></small>

		<p class="intro">Gampola is a town located near Kandy in the Central Province of Sri Lanka. Gampola was made the capital city of the island by King Buwanekabahu IV, who ruled for four years in the mid fourteenth century. The last king of Gampola was King Buwanekabahu V. He ruled the island for 29 years. A separate city was built in Kotte during this time by a noble known as Alagakkonara. The longest sleeping Buddha statue in South Asia is located in Gampola, the Saliyalapura Temple.</p>
        <!-- Gampola Map area End-->

		</div><!-- Left Section End -->

		<!-- Mid Section Start -->
		<div id="mid-cont">
			<div class="entry">
				<h2><a href="#"><?php echo $this->translate->translator("%Gampola", "home"); ?>: Population Info</a></h2>
				<h3 style="font-size:22px; margin-bottom:0; margin-left:1px; color:#0066CC; font-weight:bold; clear:both;">Uda Palatha</h3>
				<a href="#"><img class="entryphoto" src="images/gampola-map.jpg" width="140" alt="" /></a>
				<h3 style="text-decoration:underline;"><?php echo $this->translate->translator("%Standards and accessibility compliancy", "home"); ?></h3>
				<p><?php echo $this->translate->translator("%Despite the classic influences and the animated visuals, the coding is very simple and modern. No Flash or scripts have been used, only valid XHTML 1.1 and CSS2. Because of that, the design works in most browsers, even in text-based browsers. The design also complies to Section 508 and a WCAG 1.0 Double-A rating.", "home"); ?></p>
				<h3 style="font-size:22px; margin-bottom:0; margin-left:1px; color:#0066CC; font-weight:bold; clear:both;">Doluwa</h3>
				<a href="#"><img class="entryphoto" src="images/gampola-map.jpg" width="140" alt="" /></a>
				<h3 style="text-decoration:underline;">Standards and accessibility compliancy</h3>
				<p>Despite the classic influences and the animated visuals, the coding is very simple and modern. No Flash or scripts have been used, only valid XHTML 1.1 and CSS2. Because of that, the design works in most browsers, even in text-based browsers. The design also complies to Section 508 and a WCAG 1.0 Double-A rating.</p>

				<p class="meta"><span class="date">Last Modified: 28 Nov 2012 </span> Print | Edit</p>
			</div>

			<div class="entry">
				<div id="entry">
					<h2><a href="#">Location Details:</a></h2>
					<img class="entryphoto" src="images/sl-map.jpg" width="140" alt="" />
					<ul class="list-block1">
						<li><b>City:</b> Gampola</li>
						<li><b>District:</b> Kandy</li>
						<li><b>Province:</b> Central</li>
						<li><b>Country:</b> Sri Lanka</li>
						<li><b>Location Type:</b> Hill Country</li>
						<li><b>Distance from Airport:</b> 140 Km (4.30 hour drive)</li>
						<li><b>Distance from Colombo:</b> 122 Km (4.00 hour drive)</li>
					</ul>
					<p class="meta"><span class="date">Last Modified: 28 Nov 2012 </span> Print | Edit</p>
				</div>
			</div>
			<p class="pagenav"><a href="#">Older entries</a> | Newer entries</p>
		</div><!-- Mid Section End -->

		<!-- Footer Start -->
		<div id="footer">
		<h2 class="hide">Site info</h2>
		<span>close to attraction</span><br />
			  &copy; 2005 Your Name | Design by <a href="#">Andreas Viklund</a> | Valid: <a href="#">XHTML 1.1</a> / <a href="#">CSS</a> / AA / 508 /
			  Courtesy  <a href="#" target="_blank">Open Web Design</a><a href="#" target="_blank"><img src="spacer.gif" width="5" height="5" border="0"/></a>Thanks to <a href="#" target="_blank">Florida Vacation Homes</a>
		</div><!-- Footer End -->
	</div>
</div>
</body>
</html>