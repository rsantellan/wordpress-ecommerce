<?php 
header("content-type: application/x-javascript"); 
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );

$pp_gallery_cat = '';
	
if(isset($_GET['gallery_id']))
{
    $pp_gallery_cat = $_GET['gallery_id'];
}

$tg_slideshow_timer = kirki_get_option('tg_slideshow_timer'); 

if(empty($tg_slideshow_timer))
{
    $tg_slideshow_timer = 5;
}

$all_photo_arr = get_post_meta($pp_gallery_cat, 'wpsimplegallery_gallery', true);

//Get global gallery sorting
$all_photo_arr = pp_resort_gallery_img($all_photo_arr);

$count_photo = count($all_photo_arr);

//Get timer setting				
$tg_kenburns_timer = kirki_get_option('tg_kenburns_timer');

if(empty($tg_kenburns_timer))
{
	$tg_kenburns_timer = 5000;
}
else
{
	$tg_kenburns_timer = $tg_kenburns_timer*1000;
}

//Get zoom level
$tg_kenburns_zoom = kirki_get_option('tg_kenburns_zoom');
if(empty($tg_kenburns_zoom))
{
	$tg_kenburns_zoom = 1.1;
}
else
{
	$tg_kenburns_zoom = 1+($tg_kenburns_zoom/10);
}

//Get transition speed
$tg_kenburns_trans = kirki_get_option('tg_kenburns_trans');
if(empty($tg_kenburns_trans))
{
	$tg_kenburns_trans = 1000;
}

$pp_kenburns_frames_rate = 100;
?>					  
jQuery(document).ready(function(){ 
	var $canvas = jQuery('#kenburns');

    $canvas.attr('width', jQuery(window).width());
    $canvas.attr('height', jQuery(window).height());

    var kb = $canvas.kenburned({
        images : [
        <?php
	    	$key = 0;
	        foreach($all_photo_arr as $photo_id)
	        {
	            $image_url = wp_get_attachment_image_src($photo_id, 'original', true);
	    
	    ?>
	    		'<?php echo esc_url($image_url[0]); ?>'
	    <?php
	    		if($count_photo > ($key+1))
	    		{
	    			echo ',';
	    		}
	    		$key++;
	    	}
	    ?>
        ],
        frames_per_second: <?php echo $pp_kenburns_frames_rate; ?>,
	    display_time: <?php echo $tg_kenburns_timer; ?>,
	    zoom: <?php echo $tg_kenburns_zoom; ?>,
	    fade_time: <?php echo $tg_kenburns_trans; ?>,
    });
    
    jQuery(window).resize(function() {
		jQuery('#kenburns').remove();
		jQuery('#kenburns_overlay').remove();
		
		jQuery('body').append('<canvas id="kenburns"></canvas>');
		jQuery('body').append('<div id="kenburns_overlay"></div>');
	
	  	var $canvas = jQuery('#kenburns');

	    $canvas.attr('width', jQuery(window).width());
	    $canvas.attr('height', jQuery(window).height());
	
	    var kb = $canvas.kenburned({
	        images : [
	        <?php
		    	$key = 0;
		        foreach($all_photo_arr as $photo_id)
		        {
		            $image_url = wp_get_attachment_image_src($photo_id, 'original', true);
		    
		    ?>
		    		'<?php echo esc_url($image_url[0]); ?>'
		    <?php
		    		if($count_photo > ($key+1))
		    		{
		    			echo ',';
		    		}
		    		$key++;
		    	}
		    ?>
	        ],
	        frames_per_second: <?php echo $pp_kenburns_frames_rate; ?>,
		    display_time: <?php echo $tg_kenburns_timer; ?>,
		    zoom: <?php echo $tg_kenburns_zoom; ?>,
		    fade_time: <?php echo $tg_kenburns_trans; ?>,
	    });
	});
    
    jQuery('#kb-prevslide ').click(function(ev) {
        ev.preventDefault();
        kb.prevSlide();
    });

    jQuery('#kb-nextslide').click(function(ev) {
        ev.preventDefault();
        kb.nextSlide();
    });
		
});