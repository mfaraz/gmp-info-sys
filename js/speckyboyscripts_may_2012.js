$(function () {
	$('#sub-nav-left li img').hover(function() {
		$(this).fadeTo("fast", 0.8);
	}, function() {
		$(this).fadeTo("fast", 1);
	});
});

// organic tabs

(function($) {

    $.organicTabs = function(el, options) {

        var base = this;
        base.$el = $(el);
        base.$nav = base.$el.find(".nav");

        base.init = function() {

            base.options = $.extend({},$.organicTabs.defaultOptions, options);

            // Accessible hiding fix
            $(".hide").css({
                "position": "relative",
                "top": 0,
                "left": 0,
                "display": "none"
            });

            base.$nav.delegate("li > a", "click", function() {

                // Figure out current list via CSS class
                var curList = base.$el.find("a.current").attr("href").substring(1),

                // List moving to
                    $newList = $(this),

                // Figure out ID of new list
                    listID = $newList.attr("href").substring(1),

                // Set outer wrapper height to (static) height of current inner list
                    $allListWrap = base.$el.find(".list-wrap"),
                    curListHeight = $allListWrap.height();
                $allListWrap.height(curListHeight);

                if ((listID != curList) && ( base.$el.find(":animated").length == 0)) {

                    // Fade out current list
                    base.$el.find("#"+curList).fadeOut(base.options.speed, function() {

                        // Fade in new list on callback
                        base.$el.find("#"+listID).fadeIn(base.options.speed);

                        // Adjust outer wrapper to fit new list snuggly
                        var newHeight = base.$el.find("#"+listID).height();
                        $allListWrap.animate({
                            height: newHeight
                        });

                        // Remove highlighting - Add to just-clicked tab
                        base.$el.find(".nav li a").removeClass("current");
                        $newList.addClass("current");

                    });

                }

                // Don't behave like a regular link
                // Stop propegation and bubbling
                return false;
            });

        };
        base.init();
    };

    $.organicTabs.defaultOptions = {
        "speed": 300
    };

    $.fn.organicTabs = function(options) {
        return this.each(function() {
            (new $.organicTabs(this, options));
        });
    };

})(jQuery);



function add_pins(pinStyle){
      if(typeof pinStyle === 'undefined'){
          pinStyle = 'all';
      }
      var thistitle = document.title;
      var thisurl =  window.location;
      switch(pinStyle){
          case 'all':
             jQuery('[class*=" wp-image-"],.pin-it').each(function(){
                thisimageurl = jQuery(this).attr('src');
                attach_pin_to_image(jQuery(this), thisurl, thisimageurl,thistitle );

             });
              break;
          case 'class':
              jQuery('img.pin-it').each(function(){
                thisimageurl = jQuery(this).attr('src');
                attach_pin_to_image(jQuery(this), thisurl, thisimageurl,thistitle );
             });
              break;

      }
  }

function attach_pin_to_image(obj, pageurl, imageurl, thetitle ){
                if(typeof thetitle === 'undefined'){
                    thistitle = '';
                }else{
                    thistitle = "&amp;description=" + encodeURIComponent(thetitle);
                }
                pin = "<a href='http://pinterest.com/pin/create/button/?url=" + encodeURIComponent(pageurl) + "&media=" + encodeURIComponent(imageurl) + thistitle + "' target='_blank' class='pin-it-image-button' ><span>Pin It</span></a>";
                var check_float = jQuery(obj).css('float');
                floated = ' no-float';
                if(check_float == 'left' || check_float == 'right'){
                    floated = 'align' + check_float;

                }

                check_parent = jQuery(obj).parent('a').length;

                if(check_parent == true){
                    obj = jQuery(obj).parent('a');
                }

                jQuery(obj).wrap("<span class='make-relative " + floated  + "' />");
                jQuery(obj).after( pin );


}

// TABS
$(function() {$("#category_tabs").organicTabs({"speed": 200});$("#subscribe_tabs").organicTabs({"speed": 200});$("#archives_tabs").organicTabs({"speed": 200});});

$(document).ready(function(){ 
	// tabs
	$("#mid-nav ul.child").removeClass("child");
	
	$("#mid-nav li").has("ul").hover(function(){
		$(this).addClass("current").children("ul").show();
	}, function() {
		$(this).removeClass("current").children("ul").hide();
	});
        // pint it
        if($('img.pin-it').length){
            add_pins('class');
        }

        // category function for drop down menu
        $(".cat-drop ul.child").removeClass("child");
	$(".cat-drop li").has("ul").hover(function(){
		$(this).addClass("current").children("ul").fadeIn();
	}, function() {
		$(this).removeClass("current").children("ul").hide();
	});
});


