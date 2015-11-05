// JavaScript Document
$(window).scroll(function() {
    // スクロールの位置取得 
    // Get scroll position
    var s = $(window).scrollTop(),
    // スクロールの値と透明度
    // scroll value and opacity
    opacityVal = (200.0/s);
    // blurの画像の透明度を0%から100％
    // opacity value 0% to 100%
    $('.intro-header').css('opacity', opacityVal);
});