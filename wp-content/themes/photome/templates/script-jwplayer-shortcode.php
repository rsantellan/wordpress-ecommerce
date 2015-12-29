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
	jwplayer("<?php echo esc_js($_GET['id']); ?>").setup({
	    flashplayer: "<?php echo get_template_directory_uri(); ?>/js/player.swf",
	    file: "<?php echo esc_js($_GET['file']); ?>",
	    image: "<?php echo esc_js($_GET['image']); ?>",
	    width: <?php echo esc_js($_GET['width']); ?>,
	    height: <?php echo esc_js($_GET['height']); ?>,
	});
});

<?php
}
?>