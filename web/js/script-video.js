
//sticky navigation
$(document).ready(function () {
    $(".header").sticky({
        topSpacing: 0
    });
	
});

//AGENCY slider 
$(function() {
    $('.banner').unslider({
		speed: 500,               //  The speed to animate each slide (in milliseconds)
		delay: 3000,              //  The delay between slide animations (in milliseconds)
		complete: function() {},  //  A function that gets called after every slide animation
		keys: true,               //  Enable keyboard (left, right) arrow shortcuts
		dots: true,               //  Display dot navigation
		fluid: false              //  Support responsive design. May break non-responsive designs	
	});
});

//background opacity when scrolling
$(window).scroll(function() {
	if($(window).scrollTop() > 200){
    // Get scroll position
    var s = $(window).scrollTop(),
    // scroll value and opacity
    opacityVal = (350.0/s);
    // opacity value 100% to 0%
    $('#big-video-vid').css('opacity', opacityVal);
	}
});

//toggle menu
var i=false;
$('.menu-btn').on('click',function(){
	//i=true;
    $('.navigation').collapse({
toggle: false
});
	
})
$('body').on('click',function(){
	//if(i==true){
    $('.navigation').collapse('hide');
	//}
})


//Page scrolling
$(document).ready(function () {
    $('.navigation').onePageNav({
        filter: ':not(.external)',
        scrollThreshold: 0.25,
        scrollOffset: 90
    });

});


// Video responsive
$("body").fitVids();

// script prettyphoto
$(document).ready(function () {
    $("a[data-rel^='prettyPhoto']").prettyPhoto({
        social_tools: false,
        deeplinking: false
    });
});


$(window).load(function () {
    $('.bwWrapper').BlackAndWhite({
        hoverEffect: true, // default true
        // set the path to BnWWorker.js for a superfast implementation
        webworkerPath: false,
        // for the images with a fluid width and height 
        responsive: true,
        // to invert the hover effect
        invertHoverEffect: false,
        // this option works only on the modern browsers ( on IE lower than 9 it remains always 1)
        intensity: 1,
        speed: { //this property could also be just speed: value for both fadeIn and fadeOut
            fadeIn: 200, // 200ms for fadeIn animations
            fadeOut: 800 // 800ms for fadeOut animations
        },
        onImageReady: function (img) {
            // this callback gets executed anytime an image is converted
        }
    });
});


//portfolio ajax setting
$(document).ready(function () {
    $('.more,.cat-icon').click(function () {

        var toLoad = $(this).attr('data-link') + ' .worksajax > *';
        $('.worksajax').slideUp('slow', loadContent);

        function loadContent() {
            $('.worksajax').load(toLoad, '', showNewContent)
        }

        function showNewContent() {
            $.getScript("web/js/portfolio.js");
            $('.worksajax').slideDown('slow');

        }

        return false;


    });

});



//portfolio scrolling
$(function () {
    $('.more,.more,.cat-icon').bind('click', function (event) {
        var $anchor = $('#workslist');

        $('html, body').stop().animate({
            scrollTop: $($anchor).offset().top - 89
        }, 1000, 'linear');
        event.preventDefault();
    });
});


//portfolio setting
$('#about-carousel').carousel({
    interval: 6000
});


//team ajax setting
$(document).ready(function () {
    $('.team-ajax,.team-icon').click(function () {

        var toLoad = $(this).attr('data-link') + ' .worksajax > *';
        $('.teamajax').slideUp('slow', loadContent);

        function loadContent() {
            $('.teamajax').load(toLoad, '', showNewContent)
        }

        function showNewContent() {
            $.getScript("web/js/team.js");
            $('.teamajax').slideDown('slow');

        }

        return false;


    });

});


//team scrolling
$(function () {
    $('.team-ajax,.team-icon').bind('click', function (event) {
        var $anchor = $('#teamlist');

        $('html, body').stop().animate({
            scrollTop: $($anchor).offset().top - 89
        }, 1000, 'linear');
        event.preventDefault();
    });
});



//google map
$(window).bind("load", function () {
    demo.add(function () {

        $('#map_canvas').gmap({
            'center': '-6.94010,107.62575',
            'zoom': 15,
            scrollwheel: false,
            'disableDefaultUI': false,
            'styles': [{
                stylers: [{
                    lightness: 7
                }, {
                    saturation: -100
                }]
            }],
            'callback': function () {
                var self = this;
                self.addMarker({
                    'position': this.get('map').getCenter(),
					icon: 'web/images/office-building.png',
                }).click(function () {
                    self.openInfoWindow({
                        'content': 'Visit Us <br> Address: 11231 Buah Batu Bandung <br> Phone: 1233-2324-2324 <br>Email: company-email@email.com'
                    }, this);
                });
            }
        });
    }).load();
});

//testimonial carousel setting
$(".testimonial").list_ticker({
    speed: 5000,
    effect: 'fade'
});

//twitter
jQuery(function ($) {
    $(".tweetfeed").tweet({
        username: "envato",
        modpath: 'twitter/',
        page: 1,
        count: 10,
        template: "{text}{time}",
        loading_text: "loading ..."
    })
});

//ticker twitter setting
$(document).ready(function () {
    $(this).find(".tweet_list").list_ticker({
        speed: 10000,
        effect: 'fade'
    })
});

//video background setting  
var BV = new $.BigVideo();
BV.init();
if (Modernizr.touch) {
    BV.show('web/images/slider1.jpg');
} else {
    BV.show('web/videos/brittany.mp4',{ambient:true});
}