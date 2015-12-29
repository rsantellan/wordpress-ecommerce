<?php header("content-type: application/x-javascript"); ?>
<?php
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );

$autoplay = 'true';
$timer = 5;
$caption = 1;

if(isset($_GET['autoplay']) && empty($_GET['autoplay']))
{
	$autoplay = 'false';
}

if(isset($_GET['timer']))
{
	$timer = $_GET['timer'];
}
?>
jQuery(window).load(function(){ 
	jQuery('.slider_wrapper').flexslider({
	      animation: "fade",
	      animationLoop: true,
	      itemMargin: 0,
	      minItems: 1,
	      maxItems: 1,
	      slideshow: <?php echo esc_js($autoplay); ?>,
	      controlNav: false,
	      smoothHeight: false,
	      slideshowSpeed: <?php echo intval($timer*1000); ?>,
	      move: 1
	});
	
	jQuery('.slider_wrapper.portfolio .slides li').each( function() {
	    var height = jQuery(this).height();
	    var imageHeight = jQuery(this).find('img').height();
	
	    var offset = (height - imageHeight) / 2;
	
	    jQuery(this).find('img').css('margin-top', offset + 'px');
	
	});
});