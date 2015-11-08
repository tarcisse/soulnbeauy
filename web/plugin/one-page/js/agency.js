// JavaScript Document
$(window).scroll(function() {
	if($(window).scrollTop() > 100){
    // Get scroll position
     s = $(window).scrollTop(),
    // scroll value and opacity
	
    opacityVal = (300.0/s);
    // opacity value 100% to 0%
	$('.intro-header').css('opacity', opacityVal);
	}
});
