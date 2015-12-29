<?php
/**
 * The main template file for display fullscreen self-hosted video
 *
 * @package WordPress
 */

wp_enqueue_script("jwplayer", get_template_directory_uri()."/js/jwplayer.js", false, THEMEVERSION, true);
wp_enqueue_script("self-hosted-video", get_template_directory_uri()."/templates/script-self-hosted-video.php?portfolio_id=".esc_url($post->ID), false, THEMEVERSION, true);

//important to apply dynamic header & footer style
global $pp_homepage_style;
$pp_homepage_style = 'fullscreen_video';

get_header();
?>

<div id="youtube_bg">
	<div id="fullscreen_self_hosted_vid"></div>
</div>

<?php
	get_footer();
?>