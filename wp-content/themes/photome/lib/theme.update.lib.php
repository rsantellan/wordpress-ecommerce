<?php
/*include_once(get_template_directory() . '/modules/envato-wordpress-toolkit-library/class-envato-wordpress-theme-upgrader.php');

$pp_envato_username = get_option('pp_envato_username');
$pp_envato_api_key = get_option('pp_envato_api_key');
$upgrader = array();

if(!empty($pp_envato_username) && !empty($pp_envato_api_key))
{
	$upgrader = new Envato_WordPress_Theme_Upgrader( $pp_envato_username, $pp_envato_api_key );
	$upgrader_obj = $upgrader->check_for_theme_update();
	
	if($upgrader_obj->updated_themes_count > 0)
	{
		add_action('admin_notices', 'pp_admin_notice');

		function pp_admin_notice() {
			global $current_user ;
		        $user_id = $current_user->ID;

			if ( ! get_user_meta($user_id, 'pp_ignore_notice') ) {
		        echo '<div class="updated"><p>'; 
		        printf(__(' There is update available for '.THEMENAME.' theme. Go to "Theme Setting > Auto update" tab to update the theme. | <a href="%1$s">Hide</a>'), '?pp_ignore_notice=0');
		        echo "</p></div>";
			}
		}
		
		add_action('admin_init', 'pp_nag_ignore');
		
		function pp_nag_ignore() {
			global $current_user;
		        $user_id = $current_user->ID;

		        if ( isset($_GET['pp_ignore_notice']) && '0' == $_GET['pp_ignore_notice'] ) {
		             add_user_meta($user_id, 'pp_ignore_notice', 'true', true);
			}
		}
	}
}*/
?>