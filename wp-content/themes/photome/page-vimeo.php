<?php
/**
 * Template Name: Fullscreen Vimeo Video
 * The main template file for display viemo video fullscreen.
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

$page_ft_vimeo = get_post_meta($post->ID, 'page_ft_vimeo', true);

//important to apply dynamic header & footer style
global $pp_homepage_style;
$pp_homepage_style = 'fullscreen';

get_header();
?>

<div id="vimeo_bg">
	<iframe frameborder="0" src="http://player.vimeo.com/video/<?php echo $page_ft_vimeo; ?>?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1&amp;loop=1" webkitallowfullscreen="" allowfullscreen=""></iframe>
</div>

<?php
	get_footer();
?>