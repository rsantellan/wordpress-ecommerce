<?php
header("content-type: application/x-javascript"); 
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );
?>
<?php
if(isset($_GET['id']) && !empty($_GET['id']))
{
?>
jQuery(document).ready(function(){
	function rePortfolioLayout<?php echo esc_js($_GET['id']); ?>() {
	
		var jQuerycontainer = jQuery('#<?php echo esc_js($_GET['id']); ?>');
		var windowWidth = jQuerycontainer.width();
		
		if(jQuery('#pp_menu_layout').val() == 'leftmenu' && jQuery(window).width() > 768)
		{
			windowWidth = parseInt(windowWidth + 265);
		}
		
		var jQueryportfolioColumn = jQuerycontainer.data('columns');
		var columnValue;
		var masonryOpts;
		
		if(jQuery('#pp_menu_layout').val() == 'leftmenu')
		{
			var windowWidth = jQuerycontainer.width();
		}

		if(windowWidth > 959)
		{
			columnValue = parseInt(windowWidth / jQueryportfolioColumn);
		}
		else if(windowWidth < 959 && windowWidth > 480)
		{
			columnValue = parseInt(windowWidth / jQueryportfolioColumn);
		}
		else if(windowWidth <= 480)
		{
			columnValue = 480;
		}
		
	    masonryOpts = {
		  columnWidth: columnValue
		};

	    jQuerycontainer.isotope({
	      resizable: false,
	      itemSelector : '.element',
	      masonry: masonryOpts
	    } ).isotope();

	}

	var $window = jQuery(window);
	var jQuerycontainer = jQuery('#<?php echo esc_js($_GET['id']); ?>');
	
	jQuerycontainer.imagesLoaded( function(){
	    rePortfolioLayout<?php echo esc_js($_GET['id']); ?>();
	    $window.smartresize( rePortfolioLayout<?php echo esc_js($_GET['id']); ?> );
	    
	    jQuerycontainer.children('.element').children('.gallery_type').each(function(){
		    jQuery(this).addClass('fadeIn');
	    });
	    
	    jQuerycontainer.children('.element').children('.portfolio_type').each(function(){
		    jQuery(this).addClass('fadeIn');
	    });
	    
	    jQuerycontainer.children('.element').mouseenter(function(){
	    	//jQuerycontainer.children('.element').addClass('fade');
		    //jQuery(this).removeClass('fade');
		    jQuery(this).addClass('hover');
	    });
	    
	    jQuerycontainer.children('.element').mouseleave(function(){
		    //jQuerycontainer.children('.element').removeClass('fade');
		    jQuerycontainer.children('.element').removeClass('hover');
	    });
	    
	    jQuery(this).addClass('visible');
	});
});
<?php
}
?>