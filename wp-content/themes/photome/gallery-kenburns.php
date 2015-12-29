<?php
/**
 * The main template file.
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

//important to apply dynamic header & footer style
global $pp_homepage_style;
$pp_homepage_style = 'fullscreen';

get_header(); 

wp_enqueue_script("kenburns", get_template_directory_uri()."/js/kenburns.js", false, THEMEVERSION, true);
wp_enqueue_script("script-kenburns-gallery", get_template_directory_uri()."/templates/script-kenburns-gallery.php?gallery_id=".$current_page_id, false, THEMEVERSION, true);
?>
<div id="kenburns_overlay"></div>
<canvas id="kenburns">
    <p><?php _e( 'Your browser doesn\'t support canvas!', THEMEDOMAIN ); ?></p>
</canvas>

<?php
	get_footer();
?>