<?php 
header("content-type: application/x-javascript"); 
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );
?>
jQuery(document).ready(function() {
	jQuery('#option_btn').click(
		function() {
			if(jQuery('#option_wrapper').css('right') != '0px')
			{	
	    		jQuery('#option_wrapper').animate({"right": "0px"}, { duration: 500 });
	 			jQuery(this).animate({"right": "250px"}, { duration: 500 });
	 		}
	 		else
	 		{
	 			var isOpenOption = jQuery.cookie("photome_demo");
				if(jQuery.type(isOpenOption) === "undefined")
	    		{
	    			jQuery.cookie("photome_demo", 1, { expires : 7, path: '/' });
	    		}
	 			jQuery('#option_wrapper').animate({"right": "-260px"}, { duration: 500 });
				jQuery('#option_btn').animate({"right": "-2px"}, { duration: 500 });
	 		}
		}
	);
	
	var isOpenOption = jQuery.cookie("photome_demo");
	if(jQuery.type(isOpenOption) === "undefined")
	{
	    jQuery('#option_btn').trigger('click');
	}
});