<?php
/**
 * The main template file for display gallery fullscreen.
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

//Run gallery script data
wp_enqueue_style("supersized", get_template_directory_uri()."/css/supersized.css", false, THEMEVERSION, "all");
wp_enqueue_style("supersized.shutter", get_template_directory_uri()."/css/supersized.shutter.css", false, THEMEVERSION, "all");

wp_enqueue_script("supersized", get_template_directory_uri()."/js/supersized.3.2.7.min.js", false, THEMEVERSION, true);
wp_enqueue_script("supersized.shutter", get_template_directory_uri()."/js/supersized.shutter.min.js", false, THEMEVERSION, true);
wp_enqueue_script("jquery.touchwipe", get_template_directory_uri()."/js/jquery.touchwipe.1.1.1.js", false, THEMEVERSION, true);
wp_enqueue_script("script-supersized-gallery", get_template_directory_uri()."/templates/script-supersized-gallery.php?gallery_id=".$current_page_id."&amp;cover=1", false, THEMEVERSION, true);
?>
<?php
	$tg_full_arrow = kirki_get_option('tg_full_arrow');
	
	if(!empty($tg_full_arrow))
	{
?>
<div id="thumb-tray" class="load-item">
    <a id="prevslide" class="load-item"></a>
    <a id="nextslide" class="load-item"></a>
</div>
<?php
	}
	else
	{
?>
<a id="nextslide" class="load-item"></a>
<?php
	}
?>

<div id="controls-wrapper" class="load-item">
	<div id="controls">
	    <?php
	        $tg_full_image_caption = kirki_get_option('tg_full_image_caption');
	        if(!empty($tg_full_image_caption))
	        {
	    ?>
	        <!--Slide captions displayed here--> 
	        <div id="slidecaption"></div>
	    <?php
	        }
	    ?>
	</div>
</div>

<?php
	get_footer();
?>