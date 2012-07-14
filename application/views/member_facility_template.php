<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class=" canvas canvastext geolocation rgba hsla multiplebgs borderimage borderradius boxshadow opacity no-cssanimations csscolumns cssgradients no-cssreflections csstransforms no-csstransforms3d no-csstransitions  video audio localstorage sessionstorage webworkers applicationcache fontface" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title></title>
<link href="<?=base_url();?>css/netron_forms.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url();?>css/style.css">
<script language="javascript" src="<?=base_url();?>js/jquery.js"></script>
</head>
<body>
<script>
			var el = document.getElementsByTagName("body")[0];
			el.className = "";
		</script>
<div class="wrapper">
  <div class="nav" id="topNav"> <a href="#" class="logo"> </a>
    <ul>
     
    </ul>
  </div>
  <div  class="content">
    <div class="forms_header">
      <h1><?= $product_header; ?></h1>
    </div>
    <div class="panels_sets_holder">
      <div id="contents" class="right_panel_load">
        <div class="fotm_content">
        <?= $contents ?>
        </div>
        <div class="clear"></div>

        <!-- right panel load -->

      </div>
      <script language="javascript">

$(document).ready(function () {

   

     $('#accordion ul').hide();
 $('#accordion ul:first').show();
 $('#accordion li a').click(
 function() {
 var checkElement = $(this).next();
 if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
 return false;
 }
 if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
 $('#accordion ul:visible').slideUp('normal');
 checkElement.slideDown('normal');
 return false;
 }
 }
 );

});

</script>
      <ul id="accordion">
        <li class="headers"> <a href="#" class="meain_header" rel="popular">My Details</a>
          <ul  class="ov">
            <li><a href="<?=base_url();?>index.php/member/change_payment">Update Payment Details</a></li>
           
          </ul>
        </li>
          <li class="headers"> <a href="#" class="meain_header" rel="category">ADSL2</a>
          <ul class="ov">
            <li><a href="<?=base_url();?>index.php/members/adsl2/service_details">Service Details</a></li>
             <li><a href="<?=base_url();?>index.php/members/adsl2/order_status">Order Status</a></li>
              <li><a href="<?=base_url();?>index.php/members/adsl2/new_order">New Order</a></li>
             
          </ul>
        </li>
          <li class="headers"> <a href="#" class="meain_header" rel="category">Ethernet</a>
          <ul class="ov">
            <li><a href="<?=base_url();?>index.php/members/ethernet/service_details">Service Details</a></li>
             <li><a href="<?=base_url();?>index.php/members/ethernet/order_status">Order Status</a></li>

          </ul>
        </li>
        <li class="headers"> <a href="#" class="meain_header" rel="category">SMS</a>
          <ul class="ov">
            <li><a href="<?=base_url();?>index.php/members/sms/send_sms">Send SMS</a></li>
             <li><a href="<?=base_url();?>index.php/members/sms/import_address_book">Import Address Book</a></li>
             <li><a href="<?=base_url();?>index.php/members/sms/address_book">Address Book</a></li>
          </ul>
        </li>
        
          <li class="headers"> <a href="<?=base_url();?>index.php/member/logout" class="meain_header" rel="comment">Log out</a>
          
        </li>
      </ul>
        <!--<ul id="accordion">
        <li class="headers"> <a rel="popular" class="meain_header" href="#">Popular Post</a>

            <ul class="ov">
            <li><a href="#">Popular Post 1</a></li>
            <li><a href="#">Popular Post 2</a></li>
            <li><a class="last" href="#">Popular Post 3</a></li>
          </ul>
        </li>
        <li class="headers"> <a rel="category" class="meain_header" href="#">Category</a>

          <ul class="ov">
            <li><a href="#">Category 1</a></li>
            <li><a href="#">Category 2</a></li>
            <li><a class="last" href="#">Category 3</a></li>
          </ul>
        </li>
        <li class="headers"> <a rel="comment" class="meain_header" href="#">Recent Comment</a>

          <ul class="ov">
            <li><a href="#">Comment 1</a></li>
            <li><a href="#">Comment 2</a></li>
            <li><a class="last" href="#">Comment 3</a></li>
          </ul>
        </li>
      </ul> -->
      <div class="clear"></div>

      <!-- panels sets holder end -->
    </div>

    <!-- content end -->
  </div>
  <!-- wrapper end -->
</div>
<div class="footer"> © 2011 copyright of NETRON.com.au. All rights reserved. </div>
</body>
</html>