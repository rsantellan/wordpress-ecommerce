<?php
/**
 * Template Name: Fullscreen Youtube Video
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

$page_ft_youtube = get_post_meta($post->ID, 'page_ft_youtube', true);

//important to apply dynamic header & footer style
global $pp_homepage_style;
$pp_homepage_style = 'fullscreen';

get_header();
?>

<div id="youtube_bg">
	<iframe src="//www.youtube.com/embed/<?php echo $page_ft_youtube; ?>?autoplay=1&hd=1&rel=0&showinfo=0&wmode=opaque" frameborder="0" allowfullscreen></iframe>
</div>

<?php
	get_footer();
?>