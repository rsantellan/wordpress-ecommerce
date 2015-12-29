<?php
/**
 * Template Name: Portfolio Parallax
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

get_header();

global $page_content_class;
$page_content_class = 'wide';

//Include custom header feature
get_template_part("/templates/template-header");
?>

<!-- Begin content -->
<?php
	
?>
    
<div class="inner">

	<div class="inner_wrapper nopadding">
	
	<div id="page_main_content" class="sidebar_content full_width nopadding fixed_column">
	
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
	    	$small_image_url = array();
	        $image_url = '';
	        $portfolio_ID = get_the_ID();
	        		
	        if(has_post_thumbnail($portfolio_ID, 'original'))
	        {
	            $image_id = get_post_thumbnail_id($portfolio_ID);
	            $image_url = wp_get_attachment_image_src($image_id, 'original', true);
	        }
	        
	        $permalink_url = get_permalink($portfolio_ID);

	    if(!empty($image_url[0]))
		{
			$background_image = $image_url[0];
			$background_image_width = $image_url[1];
			$background_image_height = $image_url[2];
	?>
	<div class="one archive_parallax parallax" data-id="post-<?php echo esc_attr($key+1); ?>" data-image="<?php echo esc_attr($background_image); ?>" data-width="<?php echo esc_attr($background_image_width); ?>" data-height="<?php echo esc_attr($background_image_height); ?>">
		
		<?php
		    $portfolio_type = get_post_meta($portfolio_ID, 'portfolio_type', true);
		    $portfolio_video_id = get_post_meta($portfolio_ID, 'portfolio_video_id', true);
		    
		    switch($portfolio_type)
		    {
		    case 'External Link':
		    	$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
		?>
		<a target="_blank" href="<?php echo esc_url($portfolio_link_url); ?>">
		    <div class="gallery_archive_desc">
		    	<h4><?php the_title(); ?></h4>
		    	<div class="post_detail"><?php the_excerpt(); ?></div>
		    </div>
		</a>
		
		<?php
		    break;
		    //end external link
		    
		    case 'Portfolio Content':
            default:
        ?>
        <a href="<?php echo esc_url(get_permalink($portfolio_ID)); ?>">
            <div class="gallery_archive_desc">
		    	<h4><?php the_title(); ?></h4>
		    	<div class="post_detail"><?php the_excerpt(); ?></div>
		    </div>
		</a>
	    
	    <?php
		    break;
		    //portfolio content
            
            case 'Image':
		?>
		<a data-title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_url($image_url[0]); ?>" class="fancy-gallery">
		    <div class="gallery_archive_desc">
		    	<h4><?php the_title(); ?></h4>
		    	<div class="post_detail"><?php the_excerpt(); ?></div>
		    </div>
	    </a>
		
		<?php
		    break;
		    //end image
		    
		    case 'Youtube Video':
		?>
		
		<a title="<?php echo esc_attr(get_the_title()); ?>" href="#video_<?php echo esc_attr($portfolio_video_id); ?>" class="lightbox_youtube">
		    <div class="gallery_archive_desc">
		    	<h4><?php the_title(); ?></h4>
		    	<div class="post_detail"><?php the_excerpt(); ?></div>
		    </div>
		</a>
		    
		<div style="display:none;">
		    <div id="video_<?php echo esc_attr($portfolio_video_id); ?>" class="video-container">
		        
		        <iframe title="YouTube video player" width="900" height="488" src="http://www.youtube.com/embed/<?php echo esc_attr($portfolio_video_id); ?>?theme=dark&amp;rel=0&amp;wmode=transparent" allowfullscreen></iframe>
		        
		    </div>	
		</div>
		
		<?php
		    break;
		    //end youtube
		
		case 'Vimeo Video':
		?>
		<a title="<?php echo get_the_title(); ?>" href="#video_<?php echo esc_attr($portfolio_video_id); ?>" class="lightbox_vimeo">
		    <div class="gallery_archive_desc">
		    	<h4><?php the_title(); ?></h4>
		    	<div class="post_detail"><?php the_excerpt(); ?></div>
		    </div>
		</a>
		    
		<div style="display:none;">
		    <div id="video_<?php echo esc_attr($portfolio_video_id); ?>" class="video-container">
		    
		        <iframe src="http://player.vimeo.com/video/<?php echo esc_attr($portfolio_video_id); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="900" height="506"></iframe>
		        
		    </div>	
		</div>
		
		<?php
		    break;
		    //end vimeo
		    
		case 'Self-Hosted Video':
		
		    //Get video URL
		    $portfolio_mp4_url = get_post_meta($portfolio_ID, 'portfolio_mp4_url', true);
		    $preview_image = wp_get_attachment_image_src($image_id, 'large', true);
		?>
		<a title="<?php echo get_the_title(); ?>" href="#video_self_<?php echo esc_attr($key); ?>" class="lightbox_vimeo">
		    <div class="gallery_archive_desc">
		    	<h4><?php the_title(); ?></h4>
		    	<div class="post_detail"><?php the_excerpt(); ?></div>
		    </div>
		</a>
		    
		<div style="display:none;">
		    <div id="video_self_<?php echo esc_attr($key); ?>" class="video-container">
		    
		        <div id="self_hosted_vid_<?php echo esc_attr($key); ?>"></div>
		        <?php do_shortcode('[jwplayer id="self_hosted_vid_'.$key.'" file="'.$portfolio_mp4_url.'" image="'.$preview_image[0].'" width="900" height="488"]'); ?>
		        
		    </div>	
		</div>
		
		<?php
		    break;
		    //end self-hosted
		?>
		
		<?php
		    }
		    //end switch
		?>
		
	</div>
	<?php
		}
	
	    $key++;
	    endwhile; endif;	
	?>
	
	</div>

</div>
</div>
</div>
<?php get_footer(); ?>
<!-- End content -->