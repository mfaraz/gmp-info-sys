<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Slick jQuery Slidehow: Demo</title>
<style type="text/css">
<!--
/**
 * Slideshow style rules.
 */
#slideshow {
	width:250px;
	height:263px;
	position:relative;
	margin: 0px;
}
#slideshow #slidesContainer {
	width:200px;
	height:263px;
	overflow:auto; /* allow scrollbar */
	position:relative;
	margin-top: 0;
	margin-right: 0px;
	margin-bottom: 0;
	margin-left: 15px;
}
#slideshow #slidesContainer .slide {
	margin-right: 5px;
	height: 263px;
}
a {
	color: #000;
	font-weight:bold;
	text-decoration:none;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 11px;
	line-height: 16px;
}
a:hover {
  text-decoration:underline;
}
body {
	background-color: #e8e8e8;
	margin: 0px;
	font-family: Tahoma, Geneva, sans-serif;
	color: #000;
	font-size: 11px;
}

/**
 * Slideshow controls style rules.
 */
.control {
	display:block;
	width:70px;
	height:263px;
	text-indent:-10000px;
	position:absolute;
	cursor: pointer;
}
#leftControl {
	top:0;
	left:0;
	background-color: transparent;
	background-image: url(img/control_left.jpg);
	background-repeat: no-repeat;
	background-position: 0px 50px;
}
#rightControl {
	top:0;
	right:0;
	background-color: transparent;
	background-image: url(img/control_right.jpg);
	background-repeat: no-repeat;
	background-position: 0px 50px;
}
.slide img {
	height: 105px;
	width: 160px;
	clear: both;
	margin-bottom: 10px;
}
-->
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  var currentPosition = 0;
  var slideWidth = 560;
  var slides = $('.slide');
  var numberOfSlides = slides.length;

  // Remove scrollbar in JS
  $('#slidesContainer').css('overflow', 'hidden');

  // Wrap all .slides with #slideInner div
  slides
    .wrapAll('<div id="slideInner"></div>')
    // Float left to display horizontally, readjust .slides width
	.css({
      'float' : 'left',
      'width' : slideWidth
    });

  // Set #slideInner width equal to total width of all slides
  $('#slideInner').css('width', slideWidth * numberOfSlides);

  // Insert controls in the DOM
  $('#slideshow')
    .prepend('<span class="control" id="leftControl">Clicking moves left</span>')
    .append('<span class="control" id="rightControl">Clicking moves right</span>');

  // Hide left arrow control on first load
  manageControls(currentPosition);

  // Create event listeners for .controls clicks
  $('.control')
    .bind('click', function(){
    // Determine new position
	currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;

	// Hide / show controls
    manageControls(currentPosition);
    // Move slideInner using margin-left
    $('#slideInner').animate({
      'marginLeft' : slideWidth*(-currentPosition)
    });
  });

  // manageControls: Hides and Shows controls depending on currentPosition
  function manageControls(position){
    // Hide left arrow if position is first slide
	if(position==0){ $('#leftControl').hide() } else{ $('#leftControl').show() }
	// Hide right arrow if position is last slide
    if(position==numberOfSlides-1){ $('#rightControl').hide() } else{ $('#rightControl').show() }
  }
});
</script>
</head>
<body>
<div id="pageContainer"><!-- Slideshow HTML -->
  <div id="slideshow">
    <div id="slidesContainer">
      <div class="slide">
        <p><a href="http://sixrevisions.com/tutorials/web-development-tutorials/using-xampp-for-local-wordpress-theme-development/"></a><img src="img/img_slide_01.jpg" alt="An image that says Install X A M P P for wordpress." width="215" height="145" /><br />
          <a href="#">AMAN Experience</a><br />
7 Nights for $1915 pp</p>
      </div>
      <div class="slide">
        <p><a href="http://sixrevisions.com/tutorials/web-development-tutorials/using-xampp-for-local-wordpress-theme-development/"></a><img src="img/img_slide_02.jpg" alt="An image that says Install X A M P P for wordpress." width="175" height="142" /><br />
          <a href="#">AMAN Experience</a><br />
7 Nights for $1915 pp</p>
      </div>
      <div class="slide">
        <p><a href="http://sixrevisions.com/tutorials/web-development-tutorials/using-xampp-for-local-wordpress-theme-development/"></a><img src="img/img_slide_03.jpg" alt="An image that says Install X A M P P for wordpress." width="175" height="142" /><br />
          <a href="#">AMAN Experience</a><br />
7 Nights for $1915 pp</p>
      </div>
      <div class="slide">
        <p><a href="http://sixrevisions.com/tutorials/web-development-tutorials/using-xampp-for-local-wordpress-theme-development/"></a><img src="img/img_slide_04.jpg" alt="An image that says Install X A M P P for wordpress." width="175" height="142" /><br />
          <a href="#">AMAN Experience</a><br />
7 Nights for $1915 pp</p>
      </div>
    </div>
  </div>
  <!-- Slideshow HTML -->
  <div id="footer"></div>
</div>
</body>
</html>
