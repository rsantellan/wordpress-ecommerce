<?php
/**
 * The main template file for display portfolio page.
 *
 * @package WordPress
 */

/**
*	Get Current page object
**/
$page = get_page($post->ID);
$current_page_id = '';

if(isset($page->ID))
{
    $current_page_id = $page->ID;
}

//Check if gallery template
global $page_gallery_id;
if(!empty($page_gallery_id))
{
	$current_page_id = $page_gallery_id;
}

//Check if password protected
get_template_part("/templates/template-password");

//Get gallery images
$all_photo_arr = get_post_meta($current_page_id, 'wpsimplegallery_gallery', true);

//Get global gallery sorting
$all_photo_arr = pp_resort_gallery_img($all_photo_arr);

global $pp_homepage_style;
$pp_homepage_style = 'horizontal';

get_header();

//wp_enqueue_script("jquery.mousewheel", get_template_directory_uri()."/js/jquery.mousewheel.min.js", false, THEMEVERSION, true);
wp_enqueue_script("horizontal_gallery", get_template_directory_uri()."/js/horizontal_gallery.js", false, THEMEVERSION, true);
?>

<!-- Begin content -->
<div id="page_content_wrapper" class="transparent horizontal">
	<div id="horizontal_gallery">
	<table id="horizontal_gallery_wrapper">
	<tbody><tr>
	<?php
	    foreach($all_photo_arr as $photo_id)
		{
		    $small_image_url = '';
		    $hyperlink_url = get_permalink($photo_id);
		    $thumb_image_url = '';
		    
		    if(!empty($photo_id))
		    {
		    	$image_url = wp_get_attachment_image_src($photo_id, 'original', true);
		    }
		    
		    //Get image meta data
		    $image_caption = get_post_field('post_excerpt', $photo_id);
		    $image_alt = get_post_meta($photo_id, '_wp_attachment_image_alt', true);
		    $tg_full_image_caption = kirki_get_option('tg_full_image_caption');
	?>
	<td>
	    <?php 
	    	if(isset($image_url[0]) && !empty($image_url[0]))
	    	{
	    ?>
	    	<a <?php if(!empty($tg_full_image_caption)) { ?>title="<?php if(!empty($image_caption)) { ?><?php echo esc_attr($image_caption); ?><?php } ?>"<?php } ?> class="fancy-gallery" href="<?php echo esc_url($image_url[0]); ?>">
	    	<div class="gallery_image_wrapper">
		    	<img src="<?php echo esc_url($image_url[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="horizontal_gallery_img"/>
	    	</div>
	    	</a>
	    <?php
	    	}		
	    ?>
	    <div class="wp-caption aligncenter">
		    <p class="wp-caption-text"><?php echo esc_html($image_caption); ?></p>
	    </div>
	</td>
	
	<?php
	    }
	?>
	</tr></tbody>
	</table>
	
	</div>
</div>

<?php
	get_footer();
?>