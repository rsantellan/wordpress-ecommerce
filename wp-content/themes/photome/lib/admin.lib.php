<?php

/*
	Begin creating admin options
*/

$api_url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

$options = array (
 
//Begin admin header
array( 
		"name" => THEMENAME." Options",
		"type" => "title"
),
//End admin header


//Begin second tab "General"
array( 	"name" => "General",
		"type" => "section",
		"icon" => "gear.png",	
),
array( "type" => "open"),

array( "name" => "<h2>Contact Form Settings</h2>Your email address",
	"desc" => "Enter which email address will be sent from contact form",
	"id" => SHORTNAME."_contact_email",
	"type" => "text",
	"validation" => "email",
	"std" => ""

),
array( "name" => "Select and sort contents on your contact page. Use fields you want to show on your contact form",
	"sort_title" => "Contact Form Manager",
	"desc" => "",
	"id" => SHORTNAME."_contact_form",
	"type" => "sortable",
	"options" => array(
		0 => 'Empty field',
		1 => 'Name',
		2 => 'Email',
		3 => 'Message',
		4 => 'Address',
		5 => 'Phone',
		6 => 'Mobile',
		7 => 'Company Name',
		8 => 'Country',
	),
	"options_disable" => array(1, 2, 3),
	"std" => ''
),
array( "name" => "<h2>Google Map Setting</h2>Custom Google Map Style",
	"desc" => "Enter javascript style array of map. You can get sample one from <a href=\"https://snazzymaps.com\" target=\"_blank\">Snazzy Maps</a>",
	"id" => SHORTNAME."_googlemap_style",
	"type" => "textarea",
	"std" => ""
),

array( "name" => "<h2>Captcha Settings</h2>Enable Captcha",
	"desc" => "If you enable this option, contact page will display captcha image to prevent possible spam",
	"id" => SHORTNAME."_contact_enable_captcha",
	"type" => "iphone_checkboxes",
	"std" => 1,
),

array( "name" => "<h2>Custom Sidebar Settings</h2>Add a new sidebar",
	"desc" => "Enter sidebar name",
	"id" => SHORTNAME."_sidebar0",
	"type" => "text",
	"validation" => "text",
	"std" => "",
),

array( "type" => "close"),
//End second tab "General"


//Begin fifth tab "Social Profiles"
array( 	"name" => "Social-Profiles",
		"type" => "section",
		"icon" => "social.png",
),
array( "type" => "open"),
	
array( "name" => "<h2>Accounts Settings</h2>Facebook page URL",
	"desc" => "Enter full Facebook page URL",
	"id" => SHORTNAME."_facebook_url",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Twitter Username",
	"desc" => "Enter Twitter username",
	"id" => SHORTNAME."_twitter_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Google Plus URL",
	"desc" => "Enter Google Plus URL",
	"id" => SHORTNAME."_google_url",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Flickr Username",
	"desc" => "Enter Flickr username",
	"id" => SHORTNAME."_flickr_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Youtube Profile URL",
	"desc" => "Enter Youtube Profile URL",
	"id" => SHORTNAME."_youtube_url",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Vimeo Username",
	"desc" => "Enter Vimeo username",
	"id" => SHORTNAME."_vimeo_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Tumblr Username",
	"desc" => "Enter Tumblr username",
	"id" => SHORTNAME."_tumblr_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Dribbble Username",
	"desc" => "Enter Dribbble username",
	"id" => SHORTNAME."_dribbble_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Linkedin URL",
	"desc" => "Enter full Linkedin URL",
	"id" => SHORTNAME."_linkedin_url",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Pinterest Username",
	"desc" => "Enter Pinterest username",
	"id" => SHORTNAME."_pinterest_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Instagram Username",
	"desc" => "Enter Instagram username",
	"id" => SHORTNAME."_instagram_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Behance Username",
	"desc" => "Enter Behance username",
	"id" => SHORTNAME."_behance_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "500px Username",
	"desc" => "Enter 500px username",
	"id" => SHORTNAME."_500px_username",
	"type" => "text",
	"std" => ""
),
array( "name" => "<h2>Twitter API Settings</h2>Twitter Consumer Key <a href=\"https://themegoods.ticksy.com/article/3778\">See instructions</a>",
	"desc" => "Enter Twitter API Consumer Key",
	"id" => SHORTNAME."_twitter_consumer_key",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Twitter Consumer Secret",
	"desc" => "Enter Twitter API Consumer Secret",
	"id" => SHORTNAME."_twitter_consumer_secret",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Twitter Consumer Token",
	"desc" => "Enter Twitter API Consumer Token",
	"id" => SHORTNAME."_twitter_consumer_token",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Twitter Consumer Token Secret",
	"desc" => "Enter Twitter API Consumer Token Secret",
	"id" => SHORTNAME."_twitter_consumer_token_secret",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "<h2>Photo Stream</h2>Select photo stream photo source. It displays before footer area",
	"desc" => "",
	"id" => SHORTNAME."_photostream",
	"type" => "select",
	"options" => array(
		'' => 'Disable Photo Stream',
		'instagram' => 'Instagram',
		'flickr' => 'Flickr',
	),
	"std" => ''
),
array( "name" => "Instagram Access Token <a href=\"http://instagram.pixelunion.net/\" target=\"_blank\">Find it here</a>",
	"desc" => "Enter Instagram Access Token",
	"id" => SHORTNAME."_instagram_access_token",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),

array( "name" => "Flickr ID <a href=\"http://idgettr.com/\" target=\"_blank\">Find your Flickr ID here</a>",
	"desc" => "Enter Flickr ID",
	"id" => SHORTNAME."_flickr_id",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "type" => "close"),

//End fifth tab "Social Profiles"


//Begin second tab "Script"
array( "name" => "Script",
	"type" => "section",
	"icon" => "css.png",
),

array( "type" => "open"),

array( "name" => "<h2>CSS Settings</h2>Custom CSS for desktop",
	"desc" => "You can add your custom CSS here",
	"id" => SHORTNAME."_custom_css",
	"type" => "textarea",
	"std" => "",
	'validation' => 'text',
),

array( "name" => "Custom CSS for iPad Portrait View",
	"desc" => "You can add your custom CSS here",
	"id" => SHORTNAME."_custom_css_tablet_portrait",
	"type" => "textarea",
	"std" => "",
	'validation' => 'text',
),

array( "name" => "Custom CSS for iPhone Landscape View",
	"desc" => "You can add your custom CSS here",
	"id" => SHORTNAME."_custom_css_mobile_landscape",
	"type" => "textarea",
	"std" => "",
	'validation' => 'text',
),

array( "name" => "Custom CSS for iPhone Portrait View",
	"desc" => "You can add your custom CSS here",
	"id" => SHORTNAME."_custom_css_mobile_portrait",
	"type" => "textarea",
	"std" => "",
	'validation' => 'text',
),

array( "name" => "<h2>Child Theme Settings</h2>Enable Child Theme",
	"desc" => "Check this option if you want to use child theme and custom CSS in child theme style.css",
	"id" => SHORTNAME."_child_theme",
	"type" => "iphone_checkboxes",
	"std" => 1
),

array( "name" => "<h2>CSS and Javascript Optimisation Settings</h2>Combine and compress theme's CSS files",
	"desc" => "Combine and compress all CSS files to one. Help reduce page load time. <strong>NOTE: If you enable child theme CSS compression is not support</strong>",
	"id" => SHORTNAME."_advance_combine_css",
	"type" => "iphone_checkboxes",
	"std" => 1
),

array( "name" => "Combine and compress theme's javascript files",
	"desc" => "Combine and compress all javascript files to one. Help reduce page load time",
	"id" => SHORTNAME."_advance_combine_js",
	"type" => "iphone_checkboxes",
	"std" => 1
),

array( "name" => "<h2>Cache Settings</h2>Clear Cache",
	"desc" => "Try to clear cache when you enable javascript and CSS compression and theme went wrong",
	"id" => SHORTNAME."_advance_clear_cache",
	"type" => "html",
	"html" => '<a id="'.SHORTNAME.'_advance_clear_cache" href="'.$api_url.'" class="button">Click here to start clearing cache files</a>',
),
 
array( "type" => "close"),


//Begin second tab "Demo"
array( "name" => "Demo-Content",
	"type" => "section",
	"icon" => "database_add.png",
),

array( "type" => "open"),

array( "name" => "<h2>Import Demo Content</h2>",
	"desc" => "",
	"id" => SHORTNAME."_import_demo_content",
	"type" => "html",
	"html" => '<strong>*NOTE:</strong> If you import demo content. It will overwrite the existing data and settings. It\'s not included revolution slider and widgets settings so you have to configure that settings once it\'s done.<br/><br/>'.tg_check_system().'
	<ul id="import_demo_content" class="demo_list">
	    <li class="fullwidth" data-demo="1">
	    	<div class="item_content_wrapper">
	    		<div class="item_content">
	    			<div class="item_thumb"><img src="'.get_template_directory_uri().'/cache/demos/screen1.jpg" alt=""/></div>
	    			<div class="item_content">
				    	<strong>Theme Demo</strong><br/>
				    	<a href="http://themes.themegoods2.com/photome/demo/">(See Sample)</a><br/><br/>
				    	<strong>What\'s Included?</strong>: posts, pages and custom post type contents, images, videos and theme settings
				    </div>
			    </div>
		    </div>
	    </li>
	</ul>
	<input id="pp_import_content_button" name="pp_import_content_button" type="button" value="Import Selected" class="upload_btn button-primary"/>
	<input type="hidden" id="pp_import_demo_content" name="pp_import_demo_content" value=""/>
	<div class="import_message"><img src="'.get_template_directory_uri().'/functions/images/ajax-loader.gif" alt="" style="vertical-align: middle;"/><br/><br/>*Data is being imported please be patient, don\'t navigate away from this page</div>
	',
),

array( "name" => "<h2>Theme Customize</h2>",
	"desc" => "",
	"id" => SHORTNAME."_open_customize",
	"type" => "html",
	"html" => 'Or you can open theme customize and start customizing theme elements, colors, typography yourself by clicking below button or open Appearance > Customize<br/><br/><br/>
	<input id="pp_open_customize_button" name="pp_open_customize_button" type="button" value="Open Theme customize" class="button" onclick="window.location=\''.admin_url('customize.php').'\'"/>
	',
),
 
array( "type" => "close"),


//Begin second tab "Auto update"
/*array( "name" => "Auto-update",
	"type" => "section",
	"icon" => "arrow_refresh.png",
),

array( "type" => "open"),

array( "name" => "<h2>Envato API Settings</h2>Envato Username",
	"desc" => "Enter you Envato username",
	"id" => SHORTNAME."_envato_username",
	"type" => "text",
	"std" => ""
),
array( "name" => "Envato API Key",
	"desc" => "Enter account API key. You can get it from Your account > Settings > API Keys",
	"id" => SHORTNAME."_envato_api_key",
	"type" => "text",
	"std" => ""
)*/
 
);

//Check if has new update
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
		$options[] = array( 
			"name" => "Update Theme<br/>",
			"desc" => "",
			"id" => SHORTNAME."_theme_go_update",
			"type" => "html",
			"html" => '
			Click to update '.THEMENAME.' theme to the latest version. If you made changes on any them code, please backup your changes first otherwise they will be overwritten by the update.<br/><br/>
			<a id="'.SHORTNAME.'_theme_go_update_bth" href="'.$api_url.'" class="button button-primary">Click here to update theme</a>
			<div class="update_message"><img src="'.get_template_directory_uri().'/functions/images/ajax-loader.gif" alt="" style="vertical-align: middle;"/><br/><br/>*Theme is being updated please be patient, don\'t navigate away from this page</div>',
		);
	}
}

$options[] = array( "type" => "close");*/
?>