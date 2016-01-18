<?php
/**
 * Template Name: Gallery Archive Fullscreen
 * The main template file for display gallery page.
 *
 * @package WordPress
*/

/**
*	Get Current page object
**/
$ob_page = get_page($post->ID);
$current_page_id = '';

if(isset($ob_page->ID))
{
    $current_page_id = $ob_page->ID;
}

//important to apply dynamic header & footer style
global $pp_homepage_style;
$pp_homepage_style = 'fullscreen';

get_header();

wp_enqueue_style("jquery.fullPage", get_template_directory_uri()."/css/jquery.fullPage.css", false, THEMEVERSION, "all");
wp_enqueue_script("jquery.fullPage.min", get_template_directory_uri()."/js/jquery.fullPage.min.js", false, THEMEVERSION, true);
wp_enqueue_script("custom_fullpage", get_template_directory_uri()."/js/custom_fullpage.js", false, THEMEVERSION, true);
?>

<?php
	global $hide_title;
	$hide_title = 1;
	
	global $page_content_class;
	$page_content_class = 'wide';

    //Include custom header feature
	get_template_part("/templates/template-header");
?>

<!-- Begin content -->   
<div id="fullpage">
	
	<?php
	    //Get galleries
	    global $wp_query;
	    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	    $pp_portfolio_items_page = -1;
	    
	    $query_string = 'paged='.$paged.'&orderby=menu_order&order=ASC&post_type=galleries&posts_per_page=-1&suppress_filters=0';
	    
	    if(!empty($term))
	    {
	        $query_string .= '&gallerycat='.$term;
	    }
	    
	    if(THEMEDEMO)
	    {
		    $query_string .= '&gallerycat='.DEMOGALLERYID;
	    }

	    query_posts($query_string);
	
	    $key = 0;
	    if (have_posts()) : while (have_posts()) : the_post();
	    	$small_image_url = array();
	        $image_url = '';
	        $gallery_ID = get_the_ID();
	        		
	        if(has_post_thumbnail($gallery_ID, 'original'))
	        {
	            $image_id = get_post_thumbnail_id($gallery_ID);
	            $small_image_url = wp_get_attachment_image_src($image_id, 'original', true);
	        }
	        
	        $permalink_url = get_permalink($gallery_ID);
	        
		    if(!empty($small_image_url[0]))
		    {
		?>	
		    <div class="section gallery_archive">
		    	<div class="background_image" style="background-image: url('<?php echo esc_url($small_image_url[0]); ?>');">
			        <a href="<?php echo esc_url($permalink_url); ?>">
			        	<div class="gallery_archive_desc">
			        		<h4><?php the_title(); ?></h4>
			        		<div class="post_detail"><?php the_excerpt(); ?></div>
			        	</div>
			        </a>
		    	</div>
		    </div>
		<?php
		    }

	    $key++;
	    endwhile; endif;	
	?>
	
</div>
<?php get_footer(); ?>
<!-- End content -->