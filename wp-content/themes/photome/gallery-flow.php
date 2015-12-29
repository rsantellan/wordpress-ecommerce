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

//important to apply dynamic header and footer style
global $pp_homepage_style;
$pp_homepage_style = 'flow';

get_header(); 

//Run flow gallery data
wp_enqueue_script("jquery.ppflip", get_template_directory_uri()."/js/jquery.ppflip.js", false, THEMEVERSION, true);
wp_enqueue_script("jquery.touchwipe", get_template_directory_uri()."/js/jquery.touchwipe.1.1.1.js", false, THEMEVERSION, true);
wp_enqueue_script("script-flow-gallery", get_template_directory_uri()."/templates/script-flow-gallery.php?gallery_id=".$current_page_id, false, THEMEVERSION, true);
?>

</div>

<a id="imgflow-prevslide" class="load-item"></a>
<a id="imgflow-nextslide" class="load-item"></a>

<div id="imageFlow">
	<div class="text">
		<div class="title"></div>
		<div class="legend"></div>
	</div>
</div>

<?php
	$tg_flow_enable_reflection = kirki_get_option('tg_flow_enable_reflection');
?>
<input type="hidden" id="tg_flow_enable_reflection" name="tg_flow_enable_reflection" value="<?php echo esc_attr($tg_flow_enable_reflection); ?>"/>

<?php
	$tg_flow_enable_lightbox = kirki_get_option('tg_flow_enable_lightbox');
	
	if(!empty($tg_flow_enable_lightbox))
	{
?>
<div id="fancy_gallery" style="display:none">
<?php
$tg_full_image_caption = kirki_get_option('tg_full_image_caption');
$all_photo_arr = get_post_meta($current_page_id, 'wpsimplegallery_gallery', true);
	
//Get global gallery sorting
$all_photo_arr = pp_resort_gallery_img($all_photo_arr);

foreach($all_photo_arr as $key => $photo)
{
	$full_image_url = wp_get_attachment_image_src( $photo, 'original' );
	$image_caption = get_post_field('post_excerpt', $photo);
?>
<a id="fancy_gallery<?php echo esc_attr($key); ?>" href="<?php echo esc_url($full_image_url[0]); ?>" class="fancy-gallery" <?php if(!empty($tg_full_image_caption)) { ?> title="<?php echo esc_html($image_caption); ?>" <?php } ?>></a>
<?php
}
?>
</div>
<?php
	}
?>

<?php
	//important to apply dynamic footer style
	$pp_homepage_style = 'flow';
	
	get_footer();
?>