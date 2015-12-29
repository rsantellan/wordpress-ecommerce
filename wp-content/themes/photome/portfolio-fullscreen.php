<?php
/**
 * Template Name: Portfolio Fullscreen
 * The main template file for display portfolio page.
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
	    //Get all portfolio items for paging
		global $wp_query;
		
		if(is_front_page())
		{
		    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
		}
		else
		{
		    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}
		
		$query_string = 'paged='.$paged.'&orderby=menu_order&order=ASC&post_type=portfolios&numberposts=-1&suppress_filters=0&posts_per_page=-1';
	
		if(!empty($term))
		{
			$ob_term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$custom_tax = $wp_query->query_vars['taxonomy'];
		    $query_string .= '&posts_per_page=-1&'.$custom_tax.'='.$term;
		}
		query_posts($query_string);
	
	    $key = 0;
		if (have_posts()) : while (have_posts()) : the_post();
			$key++;
			$image_url = '';
			$portfolio_ID = get_the_ID();
					
			if(has_post_thumbnail($portfolio_ID, 'original'))
			{
			    $image_id = get_post_thumbnail_id($portfolio_ID);
			    $image_url = wp_get_attachment_image_src($image_id, 'original', true);
			}
			
			$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
			
			if(empty($portfolio_link_url))
			{
			    $permalink_url = get_permalink($portfolio_ID);
			}
			else
			{
			    $permalink_url = $portfolio_link_url;
			}
	        
		    if(!empty($image_url[0]))
		    {
		    	$portfolio_type = get_post_meta($portfolio_ID, 'portfolio_type', true);
				$portfolio_video_id = get_post_meta($portfolio_ID, 'portfolio_video_id', true);
				
				switch($portfolio_type)
			    {
				    case 'External Link':
				    	$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
				?>
				<div class="section gallery_archive">
			    	<div class="background_image" style="background-image: url('<?php echo esc_url($image_url[0]); ?>');">
				        <a href="<?php echo esc_url($portfolio_link_url); ?>">
				        	<div class="gallery_archive_desc">
				        		<h4><?php the_title(); ?></h4>
				        		<div class="post_detail"><?php the_excerpt(); ?></div>
				        	</div>
				        </a>
			    	</div>
			    </div>
				
			<?php
				    break;
				    //end external link
				    
				    case 'Portfolio Content':
				?>
				<div class="section gallery_archive">
			    	<div class="background_image" style="background-image: url('<?php echo esc_url($image_url[0]); ?>');">
				        <a href="<?php echo esc_url(get_permalink($portfolio_ID)); ?>">
				        	<div class="gallery_archive_desc">
				        		<h4><?php the_title(); ?></h4>
				        		<div class="post_detail"><?php the_excerpt(); ?></div>
				        	</div>
				        </a>
			    	</div>
			    </div>
				
			<?php
				    break;
				    //end portfolio content
				    
				    case 'Image':
				?>
				<div class="section gallery_archive">
			    	<div class="background_image" style="background-image: url('<?php echo esc_url($image_url[0]); ?>');">
				        <a data-title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_url($image_url[0]); ?>" class="fancy-gallery">
				        	<div class="gallery_archive_desc">
				        		<h4><?php the_title(); ?></h4>
				        		<div class="post_detail"><?php the_excerpt(); ?></div>
				        	</div>
				        </a>
			    	</div>
			    </div>
				
			<?php
				    break;
				    //end image
				    
				    case 'Youtube Video':
				?>
				<div class="section gallery_archive">
			    	<div class="background_image" style="background-image: url('<?php echo esc_url($image_url[0]); ?>');">
				        <a title="<?php echo esc_attr(get_the_title()); ?>" href="#video_<?php echo esc_attr($portfolio_video_id); ?>" class="lightbox_youtube">
				        	<div class="gallery_archive_desc">
				        		<h4><?php the_title(); ?></h4>
				        		<div class="post_detail"><?php the_excerpt(); ?></div>
				        	</div>
				        </a>
			    	</div>
			    	
			    	<div style="display:none;">
			    	    <div id="video_<?php echo esc_attr($portfolio_video_id); ?>" class="video-container">
			    	        
			    	        <iframe title="YouTube video player" width="900" height="488" src="http://www.youtube.com/embed/<?php echo esc_attr($portfolio_video_id); ?>?theme=dark&amp;rel=0&amp;wmode=transparent" allowfullscreen></iframe>
			    	        
			    	    </div>	
			    	</div>
			    </div>
				
			<?php
				    break;
				    //end youtube video
				    
				    case 'Vimeo Video':
				?>
				<div class="section gallery_archive">
			    	<div class="background_image" style="background-image: url('<?php echo esc_url($image_url[0]); ?>');">
				        <a title="<?php echo get_the_title(); ?>" href="#video_<?php echo esc_attr($portfolio_video_id); ?>" class="lightbox_vimeo">
				        	<div class="gallery_archive_desc">
				        		<h4><?php the_title(); ?></h4>
				        		<div class="post_detail"><?php the_excerpt(); ?></div>
				        	</div>
				        </a>
			    	</div>
			    	
			    	<div style="display:none;">
			    	    <div id="video_<?php echo esc_attr($portfolio_video_id); ?>" class="video-container">
			    	    
			    	        <iframe src="http://player.vimeo.com/video/<?php echo esc_attr($portfolio_video_id); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="900" height="506"></iframe>
			    	        
			    	    </div>	
			    	</div>
			    </div>
				
			<?php
				    break;
				    //end vimeo video
				    
				    case 'Self-Hosted Video':
				    
				    //Get video URL
					$portfolio_mp4_url = get_post_meta($portfolio_ID, 'portfolio_mp4_url', true);
					$preview_image = wp_get_attachment_image_src($image_id, 'large', true);
				?>
				<div class="section gallery_archive">
			    	<div class="background_image" style="background-image: url('<?php echo esc_url($image_url[0]); ?>');">
				        <a title="<?php echo get_the_title(); ?>" href="#video_self_<?php echo esc_attr($key); ?>" class="lightbox_vimeo">
				        	<div class="gallery_archive_desc">
				        		<h4><?php the_title(); ?></h4>
				        		<div class="post_detail"><?php the_excerpt(); ?></div>
				        	</div>
				        </a>
			    	</div>
			    	
			    	<div style="display:none;">
			    	    <div id="video_self_<?php echo esc_attr($key); ?>" class="video-container">
			    	    
			    	        <div id="self_hosted_vid_<?php echo esc_attr($key); ?>"></div>
			    	        <?php do_shortcode('[jwplayer id="self_hosted_vid_'.$key.'" file="'.$portfolio_mp4_url.'" image="'.$preview_image[0].'" width="900" height="488"]'); ?>
			    	        
			    	    </div>	
			    	</div>
			    </div>
				
			<?php
				    break;
				    //end vimeo video
			    }
		    }

	    $key++;
	    endwhile; endif;	
	?>
	
</div>
<?php get_footer(); ?>
<!-- End content -->