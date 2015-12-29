<?php header("content-type: application/x-javascript"); ?>
<?php
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );

?>
jQuery(window).load(function(){ 
	jQuery('.slider_wrapper').flexslider({
	      animation: "slide",
	      animationLoop: true,
	      itemMargin: 0,
	      minItems: 1,
	      maxItems: 1,
	      controlNav: false,
	      smoothHeight: false,
	      slideshow: 0,
	      animationSpeed: 1000,
	      move: 1
	});
});