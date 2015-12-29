jQuery('.gallery_img_slides').cycle({
    fx:  'fade',
    delay: 1000,
    speed:   800,
    timeout: 800,
}).cycle("pause");
	
// Pause & play on hover
jQuery('.gallery_type.archive').hover(function(){
    jQuery(this).find('.gallery_img_slides').addClass('active').cycle('resume');
}, function(){
    jQuery(this).find('.gallery_img_slides').cycle('pause');
});