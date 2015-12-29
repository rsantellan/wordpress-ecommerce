<?php
/*
Plugin Name: Photo Me Theme Custom Post Type
Plugin URI: http://themes.themegoods2.com/photome
Description: Plugin that will create custom post types for Photo Me theme.
Version: 1.5.5
Author: ThemeGoods
Author URI: http://themeforest.net/user/ThemeGoods
License: GPLv2
*/

//Setup translation string via PO file

define( 'PLUGINDOMAIN', 'photome-custom-post' );

add_action('plugins_loaded', 'tg_load_textdomain');
function tg_load_textdomain() 
{
	load_plugin_textdomain( PLUGINDOMAIN, FALSE, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

function post_type_galleries() {
	$labels = array(
    	'name' => _x('Galleries', 'post type general name', PLUGINDOMAIN),
    	'singular_name' => _x('Gallery', 'post type singular name', PLUGINDOMAIN),
    	'add_new' => _x('Add New Gallery', 'book', PLUGINDOMAIN),
    	'add_new_item' => __('Add New Gallery', PLUGINDOMAIN),
    	'edit_item' => __('Edit Gallery', PLUGINDOMAIN),
    	'new_item' => __('New Gallery', PLUGINDOMAIN),
    	'view_item' => __('View Gallery', PLUGINDOMAIN),
    	'search_items' => __('Search Gallery', PLUGINDOMAIN),
    	'not_found' =>  __('No Gallery found', PLUGINDOMAIN),
    	'not_found_in_trash' => __('No Gallery found in Trash', PLUGINDOMAIN), 
    	'parent_item_colon' => ''
	);		
	$args = array(
    	'labels' => $labels,
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true, 
    	'query_var' => true,
    	'rewrite' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => null,
    	'supports' => array('title', 'thumbnail', 'excerpt'),
    	'menu_icon' => ''
	); 		

	register_post_type( 'galleries', $args );
	
  	$labels = array(			  
  	  'name' => _x( 'Gallery Categories', 'taxonomy general name', PLUGINDOMAIN ),
  	  'singular_name' => _x( 'Gallery Category', 'taxonomy singular name', PLUGINDOMAIN ),
  	  'search_items' =>  __( 'Search Gallery Categories', PLUGINDOMAIN ),
  	  'all_items' => __( 'All Gallery Categories', PLUGINDOMAIN ),
  	  'parent_item' => __( 'Parent Gallery Category', PLUGINDOMAIN ),
  	  'parent_item_colon' => __( 'Parent Gallery Category:', PLUGINDOMAIN ),
  	  'edit_item' => __( 'Edit Gallery Category', PLUGINDOMAIN ), 
  	  'update_item' => __( 'Update Gallery Category', PLUGINDOMAIN ),
  	  'add_new_item' => __( 'Add New Gallery Category', PLUGINDOMAIN ),
  	  'new_item_name' => __( 'New Gallery Category Name', PLUGINDOMAIN ),
  	); 							  	  
  	
  	register_taxonomy(
		'gallerycat',
		'galleries',
		array(
			'public'=>true,
			'hierarchical' => true,
			'labels'=> $labels,
			'query_var' => 'gallerycat',
			'show_ui' => true,
			'rewrite' => array( 'slug' => 'gallerycat', 'with_front' => false ),
		)
	);	
} 
								  
add_action('init', 'post_type_galleries');


function post_type_portfolios() {
	$labels = array(
    	'name' => _x('Portfolios', 'post type general name', PLUGINDOMAIN),
    	'singular_name' => _x('Portfolio', 'post type singular name', PLUGINDOMAIN),
    	'add_new' => _x('Add New Portfolio', 'book', PLUGINDOMAIN),
    	'add_new_item' => __('Add New Portfolio', PLUGINDOMAIN),
    	'edit_item' => __('Edit Portfolio', PLUGINDOMAIN),
    	'new_item' => __('New Portfolio', PLUGINDOMAIN),
    	'view_item' => __('View Portfolio', PLUGINDOMAIN),
    	'search_items' => __('Search Portfolios', PLUGINDOMAIN),
    	'not_found' =>  __('No Portfolio found', PLUGINDOMAIN),
    	'not_found_in_trash' => __('No Portfolio found in Trash', PLUGINDOMAIN), 
    	'parent_item_colon' => ''
	);		
	$args = array(
    	'labels' => $labels,
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true, 
    	'query_var' => true,
    	'rewrite' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => null,
    	'supports' => array('title','editor', 'thumbnail', 'excerpt'),
    	'menu_icon' => ''
	); 		

	register_post_type( 'portfolios', $args );
	
  	$labels = array(			  
  	  'name' => _x( 'Portfolio Categories', 'taxonomy general name', PLUGINDOMAIN ),
  	  'singular_name' => _x( 'Portfolio Category', 'taxonomy singular name', PLUGINDOMAIN ),
  	  'search_items' =>  __( 'Search Portfolio Categories', PLUGINDOMAIN ),
  	  'all_items' => __( 'All Portfolio Categories', PLUGINDOMAIN ),
  	  'parent_item' => __( 'Parent Portfolio Category', PLUGINDOMAIN ),
  	  'parent_item_colon' => __( 'Parent Portfolio Category:', PLUGINDOMAIN ),
  	  'edit_item' => __( 'Edit Portfolio Category', PLUGINDOMAIN ), 
  	  'update_item' => __( 'Update Portfolio Category', PLUGINDOMAIN ),
  	  'add_new_item' => __( 'Add New Portfolio Category', PLUGINDOMAIN ),
  	  'new_item_name' => __( 'New Portfolio Category Name', PLUGINDOMAIN ),
  	); 							  
  	
  	register_taxonomy(
		'portfoliosets',
		'portfolios',
		array(
			'public'=>true,
			'hierarchical' => true,
			'labels'=> $labels,
			'query_var' => 'portfoliosets',
			'show_ui' => true,
			'rewrite' => array( 'slug' => 'portfoliosets', 'with_front' => false ),
		)
	);		  
} 
								  
add_action('init', 'post_type_portfolios');


function post_type_testimonials() {
	$labels = array(
    	'name' => _x('Testimonials', 'post type general name', PLUGINDOMAIN),
    	'singular_name' => _x('Testimonial', 'post type singular name', PLUGINDOMAIN),
    	'add_new' => _x('Add New Testimonial', 'book', PLUGINDOMAIN),
    	'add_new_item' => __('Add New Testimonial', PLUGINDOMAIN),
    	'edit_item' => __('Edit Testimonial', PLUGINDOMAIN),
    	'new_item' => __('New Testimonial', PLUGINDOMAIN),
    	'view_item' => __('View Testimonial', PLUGINDOMAIN),
    	'search_items' => __('Search Testimonial', PLUGINDOMAIN),
    	'not_found' =>  __('No Testimonial found', PLUGINDOMAIN),
    	'not_found_in_trash' => __('No Testimonial found in Trash', PLUGINDOMAIN), 
    	'parent_item_colon' => ''
	);		
	$args = array(
    	'labels' => $labels,
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true, 
    	'query_var' => true,
    	'rewrite' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => null,
    	'supports' => array('title', 'editor', 'thumbnail'),
    	'menu_icon' => ''
	); 		

	register_post_type( 'testimonials', $args );
	
	$labels = array(			  
  	  'name' => _x( 'Testimonial Categories', 'taxonomy general name', PLUGINDOMAIN ),
  	  'singular_name' => _x( 'Testimonial Category', 'taxonomy singular name', PLUGINDOMAIN ),
  	  'search_items' =>  __( 'Search Testimonial Categories', PLUGINDOMAIN ),
  	  'all_items' => __( 'All Testimonial Categories', PLUGINDOMAIN ),
  	  'parent_item' => __( 'Parent Testimonial Category', PLUGINDOMAIN ),
  	  'parent_item_colon' => __( 'Parent Testimonial Category:', PLUGINDOMAIN ),
  	  'edit_item' => __( 'Edit Testimonial Category', PLUGINDOMAIN ), 
  	  'update_item' => __( 'Update Testimonial Category', PLUGINDOMAIN ),
  	  'add_new_item' => __( 'Add New Testimonial Category', PLUGINDOMAIN ),
  	  'new_item_name' => __( 'New Testimonial Category Name', PLUGINDOMAIN ),
  	); 							  
  	
  	register_taxonomy(
		'testimonialcats',
		'testimonials',
		array(
			'public'=>true,
			'hierarchical' => true,
			'labels'=> $labels,
			'query_var' => 'testimonialcats',
			'show_ui' => true,
			'rewrite' => array( 'slug' => 'testimonialcats', 'with_front' => false ),
		)
	);		  
} 
								  
add_action('init', 'post_type_testimonials');


function post_type_clients() {
	$labels = array(
    	'name' => _x('Clients', 'post type general name', PLUGINDOMAIN),
    	'singular_name' => _x('Client', 'post type singular name', PLUGINDOMAIN),
    	'add_new' => _x('Add Client', 'book', PLUGINDOMAIN),
    	'add_new_item' => __('Add New Client', PLUGINDOMAIN),
    	'edit_item' => __('Edit Client', PLUGINDOMAIN),
    	'new_item' => __('New Client', PLUGINDOMAIN),
    	'view_item' => __('View Client', PLUGINDOMAIN),
    	'search_items' => __('Search Client', PLUGINDOMAIN),
    	'not_found' =>  __('No Client found', PLUGINDOMAIN),
    	'not_found_in_trash' => __('No Client found in Trash', PLUGINDOMAIN), 
    	'parent_item_colon' => ''
	);		
	$args = array(
    	'labels' => $labels,
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true, 
    	'query_var' => true,
    	'rewrite' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => null,
    	'supports' => array('title', 'editor', 'thumbnail'),
    	'menu_icon' => ''
	); 		

	register_post_type( 'clients', $args );
	
	$labels = array(			  
  	  'name' => _x( 'Client Categories', 'taxonomy general name', PLUGINDOMAIN ),
  	  'singular_name' => _x( 'Client Category', 'taxonomy singular name', PLUGINDOMAIN ),
  	  'search_items' =>  __( 'Search Client Categories', PLUGINDOMAIN ),
  	  'all_items' => __( 'All Client Categories', PLUGINDOMAIN ),
  	  'parent_item' => __( 'Parent Client Category', PLUGINDOMAIN ),
  	  'parent_item_colon' => __( 'Parent Client Category:', PLUGINDOMAIN ),
  	  'edit_item' => __( 'Edit Client Category', PLUGINDOMAIN ), 
  	  'update_item' => __( 'Update Client Category', PLUGINDOMAIN ),
  	  'add_new_item' => __( 'Add New Client Category', PLUGINDOMAIN ),
  	  'new_item_name' => __( 'New Client Category Name', PLUGINDOMAIN ),
  	); 							  
  	
  	register_taxonomy(
		'clientcats',
		'clients',
		array(
			'public'=>true,
			'hierarchical' => true,
			'labels'=> $labels,
			'query_var' => 'clientcats',
			'show_ui' => true,
			'rewrite' => array( 'slug' => 'clientcats', 'with_front' => false ),
		)
	);
}
add_action('init', 'post_type_clients');


function post_type_team() {
	$labels = array(
    	'name' => _x('Team Members', 'post type general name', PLUGINDOMAIN),
    	'singular_name' => _x('Team Member', 'post type singular name', PLUGINDOMAIN),
    	'add_new' => _x('Add New Team Member', 'book', PLUGINDOMAIN),
    	'add_new_item' => __('Add New Team Member', PLUGINDOMAIN),
    	'edit_item' => __('Edit Team Member', PLUGINDOMAIN),
    	'new_item' => __('New Team Member', PLUGINDOMAIN),
    	'view_item' => __('View Team Member', PLUGINDOMAIN),
    	'search_items' => __('Search Team Members', PLUGINDOMAIN),
    	'not_found' =>  __('No Team Member found', PLUGINDOMAIN),
    	'not_found_in_trash' => __('No Team Member found in Trash', PLUGINDOMAIN), 
    	'parent_item_colon' => ''
	);		
	$args = array(
    	'labels' => $labels,
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true, 
    	'query_var' => true,
    	'rewrite' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => null,
    	'supports' => array('title','editor', 'thumbnail'),
    	'menu_icon' => ''
	); 		

	register_post_type( 'team', $args );
	
	$labels = array(			  
  	  'name' => _x( 'Team Categories', 'taxonomy general name', PLUGINDOMAIN ),
  	  'singular_name' => _x( 'Team Category', 'taxonomy singular name', PLUGINDOMAIN ),
  	  'search_items' =>  __( 'Team Service Categories', PLUGINDOMAIN ),
  	  'all_items' => __( 'All Team Categories', PLUGINDOMAIN ),
  	  'parent_item' => __( 'Parent Team Category', PLUGINDOMAIN ),
  	  'parent_item_colon' => __( 'Parent Team Category:', PLUGINDOMAIN ),
  	  'edit_item' => __( 'Edit Team Category', PLUGINDOMAIN ), 
  	  'update_item' => __( 'Update Team Category', PLUGINDOMAIN ),
  	  'add_new_item' => __( 'Add New Team Category', PLUGINDOMAIN ),
  	  'new_item_name' => __( 'New Team Category Name', PLUGINDOMAIN ),
  	); 							  
  	
  	register_taxonomy(
		'teamcats',
		'team',
		array(
			'public'=>true,
			'hierarchical' => true,
			'labels'=> $labels,
			'query_var' => 'teamcats',
			'show_ui' => true,
			'rewrite' => array( 'slug' => 'teamcats', 'with_front' => false ),
		)
	);
}
add_action('init', 'post_type_team');


function post_type_pricing() {
	$labels = array(
    	'name' => _x('Pricing', 'post type general name', PLUGINDOMAIN),
    	'singular_name' => _x('Pricing', 'post type singular name', PLUGINDOMAIN),
    	'add_new' => _x('Add New Pricing', 'book', PLUGINDOMAIN),
    	'add_new_item' => __('Add New Pricing', PLUGINDOMAIN),
    	'edit_item' => __('Edit Pricing', PLUGINDOMAIN),
    	'new_item' => __('New Pricing', PLUGINDOMAIN),
    	'view_item' => __('View Pricing', PLUGINDOMAIN),
    	'search_items' => __('Search Pricings', PLUGINDOMAIN),
    	'not_found' =>  __('No Pricing found', PLUGINDOMAIN),
    	'not_found_in_trash' => __('No Pricing found in Trash', PLUGINDOMAIN), 
    	'parent_item_colon' => ''
	);		
	$args = array(
    	'labels' => $labels,
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true, 
    	'query_var' => true,
    	'rewrite' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => null,
    	'supports' => array('title'),
    	'menu_icon' => ''
	); 		

	register_post_type( 'pricing', $args );
	
	$labels = array(			  
  	  'name' => _x( 'Pricing Categories', 'taxonomy general name', PLUGINDOMAIN ),
  	  'singular_name' => _x( 'Pricing Category', 'taxonomy singular name', PLUGINDOMAIN ),
  	  'search_items' =>  __( 'Pricing Service Categories', PLUGINDOMAIN ),
  	  'all_items' => __( 'All Pricing Categories', PLUGINDOMAIN ),
  	  'parent_item' => __( 'Parent Pricing Category', PLUGINDOMAIN ),
  	  'parent_item_colon' => __( 'Parent Pricing Category:', PLUGINDOMAIN ),
  	  'edit_item' => __( 'Edit Pricing Category', PLUGINDOMAIN ), 
  	  'update_item' => __( 'Update Pricing Category', PLUGINDOMAIN ),
  	  'add_new_item' => __( 'Add New Pricing Category', PLUGINDOMAIN ),
  	  'new_item_name' => __( 'New Pricing Category Name', PLUGINDOMAIN ),
  	); 							  
  	
  	register_taxonomy(
		'pricingcats',
		'pricing',
		array(
			'public'=>true,
			'hierarchical' => true,
			'labels'=> $labels,
			'query_var' => 'pricingcats',
			'show_ui' => true,
			'rewrite' => array( 'slug' => 'pricingcats', 'with_front' => false ),
		)
	);
}
add_action('init', 'post_type_pricing');


add_filter( 'manage_posts_columns', 'rt_add_gravatar_col');
function rt_add_gravatar_col($cols) {
	$cols['thumbnail'] = __('Thumbnail', PLUGINDOMAIN);
	return $cols;
}

add_action( 'manage_posts_custom_column', 'rt_get_author_gravatar');
function rt_get_author_gravatar($column_name ) {
	if ( $column_name  == 'thumbnail'  ) {
		echo get_the_post_thumbnail(get_the_ID(), array(100, 100));
	}
}

/*
	Get gallery list
*/
$args = array(
    'numberposts' => -1,
    'post_type' => array('galleries'),
);

$galleries_arr = get_posts($args);
$galleries_select = array();
$galleries_select['(Display Post Featured Image)'] = '';
$galleries_select['(Hide Post Featured Image)'] = -1;

foreach($galleries_arr as $gallery)
{
	$galleries_select[$gallery->post_title] = $gallery->ID;
}

/*
	Get post layouts
*/
$post_layout_select = array();
$post_layout_select = array(
	'With Right Sidebar' => 'With Right Sidebar',
	'With Left Sidebar' => 'With Left Sidebar',
	'Fullwidth' => 'Fullwidth',
	'Split Screen' => 'Split Screen',
);

//Get all sidebars
$theme_sidebar = array(
	'' => '',
	'Page Sidebar' => 'Page Sidebar', 
	'Contact Sidebar' => 'Contact Sidebar', 
	'Blog Sidebar' => 'Blog Sidebar',
);

$dynamic_sidebar = get_option('pp_sidebar');

if(!empty($dynamic_sidebar))
{
	foreach($dynamic_sidebar as $sidebar)
	{
		$theme_sidebar[$sidebar] = $sidebar;
	}
}

/*
	Begin creating custom fields
*/

$postmetas = 
	array (
		'post' => array(
			array("section" => "Content Type", "id" => "post_layout", "type" => "select", "title" => "Post Layout", "description" => "You can select layout of this single post page.", "items" => $post_layout_select),
			array(
    		"section" => "Featured Content Type", "id" => "post_ft_type", "type" => "select", "title" => "Featured Content Type", "description" => "Select featured content type for this post. Different content type will be displayed on single post page", 
				"items" => array(
					"Image" => "Image",
					"Gallery" => "Gallery",
					"Vimeo Video" => "Vimeo Video",
					"Youtube Video" => "Youtube Video",
				)),
			
			array("section" => "Gallery", "id" => "post_ft_gallery", "type" => "select", "title" => "Gallery (Optional)", "description" => "Please select a gallery<br/><br/><strong>NOTE: enter if you select \"Gallery\" as Featured Content Type</strong>", "items" => $galleries_select),
				
			array("section" => "Vimeo Video ID", "id" => "post_ft_vimeo", "type" => "text", "title" => "Vimeo Video ID (Optional)", "description" => "Please enter Vimeo Video ID for example 73317780"),
			
			array("section" => "Youtube Video ID", "id" => "post_ft_youtube", "type" => "text", "title" => "Youtube Video ID (Optional)", "description" => "Please enter Youtube Video ID for example 6AIdXisPqHc"),
		),
		
		'galleries' => array(
			array("section" => "Gallery Template", "id" => "gallery_template", "type" => "select", "title" => "Gallery Template", "description" => "Select gallery template for this gallery", 
				"items" => array(
					"Gallery Fullscreen Cover" => "Gallery Fullscreen Cover",
					"Gallery Kenburns" => "Gallery Kenburns",
					"Gallery Horizontal" => "Gallery Horizontal",
					"Gallery Flow" => "Gallery Flow",
					"Gallery Split Screen" => "Gallery Split Screen",
					"Gallery Split Screen Wide" => "Gallery Split Screen Wide",
					"Gallery 2 Columns Contained" => "Gallery 2 Columns Contained",
					"Gallery 3 Columns Contained" => "Gallery 3 Columns Contained",
					"Gallery 4 Columns Contained" => "Gallery 4 Columns Contained",
					"Gallery Masonry 2 Columns Contained" => "Gallery Masonry 2 Columns Contained",
					"Gallery Masonry 3 Columns Contained" => "Gallery Masonry 3 Columns Contained",
					"Gallery Masonry 4 Columns Contained" => "Gallery Masonry 4 Columns Contained",
					"Gallery 2 Columns Wide" => "Gallery 2 Columns Wide",
					"Gallery 3 Columns Wide" => "Gallery 3 Columns Wide",
					"Gallery 4 Columns Wide" => "Gallery 4 Columns Wide",
					"Gallery 5 Columns Wide" => "Gallery 5 Columns Wide",
					"Gallery Masonry 2 Columns Wide" => "Gallery Masonry 2 Columns Wide",
					"Gallery Masonry 3 Columns Wide" => "Gallery Masonry 3 Columns Wide",
					"Gallery Masonry 4 Columns Wide" => "Gallery Masonry 4 Columns Wide",
					"Gallery Masonry 5 Columns Wide" => "Gallery Masonry 5 Columns Wide",
				)),
			
			array("section" => "Password Protect", "id" => "gallery_password", "title" => "Password (Optional)", "description" => "Enter your password for this gallery"),
		),
		
		'portfolios' => array(
			array("section" => "Content Type", "id" => "portfolio_type", "type" => "select", "title" => "Content Type", "description" => "Select content type for this project:", 
				"items" => array(
					"Portfolio Content" => "Portfolio Content",
					"Image" => "Image",
					"Vimeo Video" => "Vimeo Video",
					"Youtube Video" => "Youtube Video", 
					"Self-Hosted Video" => "Self-Hosted Video",
					"External Link" => "External Link",
				)),
				
			array("section" => "Content Type", "id" => "portfolio_hide_image", "type" => "checkbox", "title" => "Do not display Featured Image as Header", "description" => "Check this option if you want to hide featured image on single portfolio page"),
			
			array("section" => "Content Type", "id" => "portfolio_video_id", "title" => "Youtube or Vimeo Video ID (Only if you selected Youtube Video or Vimeo Video)", "description" => "Enter your video ID here:"),
			
			array("section" => "Content Type", "id" => "portfolio_mp4_url", "title" => "Video URL (Only if you selected Self-Hosted)", "description" => "Enter your video URL (.mp4 file format):"),
			
			array("section" => "Content Type", "id" => "portfolio_link_url", "title" => "Link URL", "description" => "Project item will link to this URL"),
		),
		
		'clients' => array(
			array("section" => "Client Option", "id" => "client_website_url", "type" => "text", "title" => "Client Website URL", "description" => "Enter client website URL here ex. http://google.com"),
		),
		
		'team' => array(
			array("section" => "Team Option", "id" => "team_position", "type" => "text", "title" => "Position and Role", "description" => "Enter team member position and role ex. Marketing Manager"),
			array("section" => "Facebook URL", "id" => "member_facebook", "type" => "text", "title" => "Facebook URL", "description" => "Enter team member Facebook URL"),
		    array("section" => "Twitter URL", "id" => "member_twitter", "type" => "text", "title" => "Twitter URL", "description" => "Enter team member Twitter URL"),
		    array("section" => "Google+ URL", "id" => "member_google", "type" => "text", "title" => "Google+ URL", "description" => "Enter team member Google+ URL"),
		    array("section" => "Linkedin URL", "id" => "member_linkedin", "type" => "text", "title" => "Linkedin URL", "description" => "Enter team member Linkedin URL"),
		),
		
		'pricing' => array(
			array("section" => "Pricing Option", "id" => "pricing_featured", "type" => "checkbox", "title" => "Make this pricing featured", "description" => "Check this option if you want to display this pricing as featured one."),
			array("section" => "Pricing Option", "id" => "pricing_plan_currency", "type" => "text", "title" => "Currency", "description" => "Enter currency", "sample" => "$"),
			array("section" => "Pricing Option", "id" => "pricing_plan_price", "type" => "text", "title" => "Exact Price", "description" => "Enter exact price", "sample" => "10"),
			array("section" => "Pricing Option", "id" => "pricing_plan_time", "type" => "text", "title" => "Time", "description" => "Enter price per time (optional)", "sample" => 'month'),
			array("section" => "Pricing Option", "id" => "pricing_plan_features", "type" => "textarea", "title" => "Plan Features", "description" => "Enter pricing plan features.", "sample" => "Unlimited Pages\nUnlimited Storage\nMobile Website\n24/7 Customer Support"),
			array("section" => "Pricing Option", "id" => "pricing_button_text", "type" => "text", "title" => "Button Text", "description" => "Enter pricing button text", "sample" => "Purchase Now"),
		    array("section" => "Pricing Option", "id" => "pricing_button_url", "type" => "text", "title" => "Button URL", "description" => "Enter pricing button  URL", "sample" => "http://themeforest.net"),
		),
		
		'testimonials' => array(
			array("section" => "Testimonial Option", "id" => "testimonial_name", "type" => "text", "title" => "Customer Name", "description" => "Enter customer name"),
			array("section" => "Testimonial Option", "id" => "testimonial_position", "type" => "text", "title" => "Customer Position", "description" => "Enter customer position in company"),
			array("section" => "Testimonial Option", "id" => "testimonial_company_name", "type" => "text", "title" => "Company Name", "description" => "Enter customer company name"),
			array("section" => "Testimonial Option", "id" => "testimonial_company_website", "type" => "text", "title" => "Company Website URL", "description" => "Enter customer company website URL"),
		),
);

function create_meta_box() {

	global $postmetas;
	
	if(!isset($_GET['post_type']) OR empty($_GET['post_type']))
	{
		if(isset($_GET['post']) && !empty($_GET['post']))
		{
			$post_obj = get_post($_GET['post']);
			$_GET['post_type'] = $post_obj->post_type;
		}
		else
		{
			$_GET['post_type'] = 'post';
		}
	}
	
	if ( function_exists('add_meta_box') && isset($postmetas) && count($postmetas) > 0 ) {  
		foreach($postmetas as $key => $postmeta)
		{
			if($_GET['post_type']==$key && !empty($postmeta))
			{
				if($key != 'pricing')
				{
					add_meta_box( 'metabox', ucfirst($key).' Options', 'new_meta_box', $key, 'side', 'high' );
				}
				else
				{
					add_meta_box( 'metabox', ucfirst($key).' Options', 'new_meta_box', $key, 'normal', 'high' );
				}
			}
		}
	}

}  

function new_meta_box() {
	global $post, $postmetas;
	
	if(!isset($_GET['post_type']) OR empty($_GET['post_type']))
	{
		if(isset($_GET['post']) && !empty($_GET['post']))
		{
			$post_obj = get_post($_GET['post']);
			$_GET['post_type'] = $post_obj->post_type;
		}
		else
		{
			$_GET['post_type'] = 'post';
		}
	}

	echo '<input type="hidden" name="pp_meta_form" id="pp_meta_form" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
	$meta_section = '';

	foreach ( $postmetas as $key => $postmeta ) {
	
		if($_GET['post_type'] == $key)
		{
		
			foreach ( $postmeta as $postmeta_key => $each_meta ) {
		
				$meta_id = $each_meta['id'];
				$meta_title = $each_meta['title'];
				$meta_description = $each_meta['description'];
				
				if(isset($postmeta['section']))
				{
					$meta_section = $postmeta['section'];
				}
				
				$meta_type = '';
				if(isset($each_meta['type']))
				{
					$meta_type = $each_meta['type'];
				}
				
				echo '<div id="post_option_'.strtolower($each_meta['id']).'">';
				echo "<br/><strong>".$meta_title."</strong><hr class='pp_widget_hr'/>";
				echo "<div class='pp_widget_description'>$meta_description</div>";
				
				if ($meta_type == 'checkbox') {
					$checked = get_post_meta($post->ID, $meta_id, true) == '1' ? "checked" : "";
					echo "<br style='clear:both'><input type='checkbox' name='$meta_id' id='$meta_id' class='iphone_checkboxes' value='1' $checked /><br style='clear:both'><br/><br/>";
				}
				else if ($meta_type == 'select') {
					echo "<p><select name='$meta_id' id='$meta_id'>";
					
					if(!empty($each_meta['items']))
					{
						foreach ($each_meta['items'] as $key => $item)
						{
							echo '<option value="'.$item.'"';
							
							if($item == get_post_meta($post->ID, $meta_id, true))
							{
								echo ' selected ';
							}
							
							echo '>'.$key.'</option>';
						}
					}
					
					echo "</select></p>";
				}
				else if ($meta_type == 'file') { 
				    echo "<p><input type='text' name='$meta_id' id='$meta_id' class='' value='".get_post_meta($post->ID, $meta_id, true)."' style='width:89%' /><input id='".$meta_id."_button' name='".$meta_id."_button' type='button' value='Upload' class='metabox_upload_btn button' readonly='readonly' rel='".$meta_id."' style='margin:7px 0 0 5px' /></p>";
				}
				else if ($meta_type == 'textarea') {
					if(isset($postmeta[$postmeta_key]['sample']))
					{
						echo "<p><textarea name='$meta_id' id='$meta_id' class=' hint' style='width:100%' rows='7' title='".$postmeta[$postmeta_key]['sample']."'>".get_post_meta($post->ID, $meta_id, true)."</textarea></p>";
					}
					else
					{
						echo "<p><textarea name='$meta_id' id='$meta_id' class='' style='width:100%' rows='7'>".get_post_meta($post->ID, $meta_id, true)."</textarea></p>";
					}
				}			
				else {
					if(isset($postmeta[$postmeta_key]['sample']))
					{
						echo "<p><input type='text' name='$meta_id' id='$meta_id' class='' title='".$postmeta[$postmeta_key]['sample']."' value='".get_post_meta($post->ID, $meta_id, true)."' style='width:99%' /></p>";
					}
					else
					{
						echo "<p><input type='text' name='$meta_id' id='$meta_id' class='' value='".get_post_meta($post->ID, $meta_id, true)."' style='width:99%' /></p>";
					}
				}
				
				echo '</div>';
			}
		}
	}
	
	echo '<br/>';

}

function save_postdata( $post_id ) {

	global $postmetas;

	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times

	if ( isset($_POST['pp_meta_form']) && !wp_verify_nonce( $_POST['pp_meta_form'], plugin_basename(__FILE__) )) {
		return $post_id;
	}

	// verify if this is an auto save routine. If it is our form has not been submitted, so we dont want to do anything

	if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
        return;

	// Check permissions

	if ( isset($_POST['post_type']) && 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;
		} else {
		if ( !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
	}

	// OK, we're authenticated

	if ( $parent_id = wp_is_post_revision($post_id) )
	{
		$post_id = $parent_id;
	}
	
	if (isset($_POST['pp_meta_form'])) 
	{
		//If import page content builder
		if(is_admin() && isset($_POST['ppb_import_current']) && !empty($_POST['ppb_import_current']))
		{
			//If upload import builder file
			if(isset($_FILES['ppb_import_current_file']['name']) && !empty($_FILES['ppb_import_current_file']['name']))
			{
				//Check if zip file
				$import_filename = $_FILES['ppb_import_current_file']['name'];
				$import_type = $_FILES['ppb_import_current_file']['type'];
				$is_zip = FALSE;
				$new_filename = basename($import_filename, '_.zip');
				
				$accepted_types = array('application/zip', 
	                                'application/x-zip-compressed', 
	                                'multipart/x-zip', 
	                                'application/s-compressed');
	 
			    foreach($accepted_types as $mime_type) {
			        if($mime_type == $import_type) {
			            $is_zip = TRUE;
			            break;
			        } 
			    }
			}
			//If import demo pages
			else if(isset($_POST['ppb_import_demo_file']) && !empty($_POST['ppb_import_demo_file']))
			{
				$is_zip = FALSE;
			}
			
			if($is_zip)
			{
				WP_Filesystem();
				$upload_dir = wp_upload_dir();
				$cache_dir = '';
				
				if(isset($upload_dir['basedir']))
				{
					$cache_dir = $upload_dir['basedir'].'/meteors';
				}
				
				move_uploaded_file($_FILES["ppb_import_current_file"]["tmp_name"], $cache_dir.'/'.$import_filename);
				//$unzipfile = unzip_file( $cache_dir.'/'.$import_filename, $cache_dir);
				
				$zip = new ZipArchive();
				$x = $zip->open($cache_dir.'/'.$import_filename);
				
				for($i = 0; $i < $zip->numFiles; $i++) {
			        $new_filename = $zip->getNameIndex($i);
			        break;
			    }  
				
				if ($x === true) {
					$zip->extractTo($cache_dir); 
					$zip->close();
				}

				$import_options_json = file_get_contents($cache_dir.'/'.$new_filename);
				unlink($cache_dir.'/'.$import_filename);
				unlink($cache_dir.'/'.$new_filename);
			}
			else
			{
				if(isset($_POST['ppb_import_demo_file']) && !empty($_POST['ppb_import_demo_file']))
				{
					$import_options_json = file_get_contents(get_template_directory().'/cache/demos/pages/'.$_POST['ppb_import_demo_file']);
				}
				else
				{
					//If .json file then import
					$import_options_json = file_get_contents($_FILES["ppb_import_current_file"]["tmp_name"]);
				}
			}
			
			$import_options_arr = json_decode($import_options_json, true);
			
			if(isset($import_options_arr['ppb_form_data_order'][0]) && !empty($import_options_arr['ppb_form_data_order'][0]))
			{
				page_update_custom_meta($post_id, $import_options_arr['ppb_form_data_order'][0], 'ppb_form_data_order');
			}
			
			$ppb_item_arr = explode(',', $import_options_arr['ppb_form_data_order'][0]);
			
			if(is_array($ppb_item_arr) && !empty($ppb_item_arr))
			{
				foreach($ppb_item_arr as $key => $ppb_item_arr)
				{
					if(isset($import_options_arr[$ppb_item_arr.'_data'][0]) && !empty($import_options_arr[$ppb_item_arr.'_data'][0]))
					{
						page_update_custom_meta($post_id, $import_options_arr[$ppb_item_arr.'_data'][0], $ppb_item_arr.'_data');
					}
					
					if(isset($import_options_arr[$ppb_item_arr.'_size'][0]) && !empty($import_options_arr[$ppb_item_arr.'_size'][0]))
					{
						page_update_custom_meta($post_id, 'one', $ppb_item_arr.'_size');
					}
				}
			}
			
			header("Location: ".$_SERVER['HTTP_REFERER']);
			exit;
		}
	
		//If export page content builder
		if(is_admin() && isset($_POST['ppb_export_current']) && !empty($_POST['ppb_export_current']))
		{
			$page_title = get_the_title($post_id);
		
			$json_file_name = THEMENAME.'Page'.$page_title.'_Export_'.date('m-d-Y_hia');
	
			header('Content-disposition: attachment; filename='.$json_file_name.'.json');
			header('Content-type: application/json');
			
			//Get current content builder data
			$ppb_form_data_order = get_post_meta($post_id, 'ppb_form_data_order');
			$export_options_arr = array();
			
			if(!empty($ppb_form_data_order))
			{
				$export_options_arr['ppb_form_data_order'] = $ppb_form_data_order;

				//Get each builder module data
				$ppb_form_item_arr = explode(',', $ppb_form_data_order[0]);
			
				foreach($ppb_form_item_arr as $key => $ppb_form_item)
				{
					$ppb_form_item_data = get_post_meta($post_id, $ppb_form_item.'_data');
					$export_options_arr[$ppb_form_item.'_data'] = $ppb_form_item_data;
					
					$ppb_form_item_size = get_post_meta($post_id, $ppb_form_item.'_size');
					$export_options_arr[$ppb_form_item.'_size'] = $ppb_form_item_size;
				}
			}
		
			echo json_encode($export_options_arr);
			
			exit;
		}
	
		foreach ( $postmetas as $postmeta ) {
			foreach ( $postmeta as $each_meta ) {
		
				if (isset($_POST[$each_meta['id']]) && $_POST[$each_meta['id']]) {
					update_custom_meta($post_id, $_POST[$each_meta['id']], $each_meta['id']);
				}
				
				if (isset($_POST[$each_meta['id']]) && $_POST[$each_meta['id']] == "") {
					delete_post_meta($post_id, $each_meta['id']);
				}
				
				if (!isset($_POST[$each_meta['id']])) {
					delete_post_meta($post_id, $each_meta['id']);
				}
			
			}
		}
	
		// Saving Page Builder Data
		if(isset($_POST['ppb_enable']) && !empty($_POST['ppb_enable']))
		{
		    update_custom_meta($post_id, $_POST['ppb_enable'], 'ppb_enable');
		}
		else
		{
		    delete_post_meta($post_id, 'ppb_enable');
		}
		
		if(isset($_POST['ppb_form_data_order']) && !empty($_POST['ppb_form_data_order']))
		{
		    update_custom_meta($post_id, $_POST['ppb_form_data_order'], 'ppb_form_data_order');
		    
		    $ppb_item_arr = explode(',', $_POST['ppb_form_data_order']);
		    if(is_array($ppb_item_arr) && !empty($ppb_item_arr))
		    {
		    	foreach($ppb_item_arr as $key => $ppb_item_arr)
		    	{
		    		if(isset($_POST[$ppb_item_arr.'_data']) && !empty($_POST[$ppb_item_arr.'_data']))
		    		{
		    			update_custom_meta($post_id, $_POST[$ppb_item_arr.'_data'], $ppb_item_arr.'_data');
		    		}
		    		
		    		if(isset($_POST[$ppb_item_arr.'_size']) && !empty($_POST[$ppb_item_arr.'_size']))
		    		{
		    			update_custom_meta($post_id, $_POST[$ppb_item_arr.'_size'], $ppb_item_arr.'_size');
		    		}
		    	}
		    }
		}
		//If content builder is empty
		else
		{
		    update_custom_meta($post_id, '', 'ppb_form_data_order');
		}
	}
}

function update_custom_meta($postID, $newvalue, $field_name) {

	if (isset($_POST['pp_meta_form'])) 
	{
		if (!get_post_meta($postID, $field_name)) {
			add_post_meta($postID, $field_name, $newvalue);
		} else {
			update_post_meta($postID, $field_name, $newvalue);
		}
	}

}

//init

add_action('admin_menu', 'create_meta_box'); 
add_action('save_post', 'save_postdata'); 

/*
	End creating custom fields
*/

//Include gallery admin interface
include_once (plugin_dir_path( __FILE__ ) . "/gallery/tg-gallery.php");

//Include Theme Shortcode
include_once (plugin_dir_path( __FILE__ ) . "tg-shortcode.php");

//Include Content Builder Shortcode
include_once (plugin_dir_path( __FILE__ ) . "tg-contentbuilder.php");
?>