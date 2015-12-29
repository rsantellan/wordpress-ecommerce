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

if(isset($_GET['caption']))
{
	$caption = $_GET['caption'];
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
	      smoothHeight: true,
	      slideshowSpeed: <?php echo intval($timer*1000); ?>,
	      move: 1
	});
});