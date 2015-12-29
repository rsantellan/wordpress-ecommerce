<?php
/**
 * Template Name: Portfolio Masonry
 * The main template file for display portfolio page.
 *
 * @package WordPress
*/

/**
*	Get Current page object
**/
if(!is_null($post))
{
	$page_obj = get_page($post->ID);
}

$current_page_id = '';

/**
*	Get current page id
**/

if(!is_null($post) && isset($page_obj->ID))
{
    $current_page_id = $page_obj->ID;
}

get_header();

global $page_content_class;
$page_content_class = 'wide';

//Include custom header feature
get_template_part("/templates/template-header");
?>

<!-- Begin content -->
<?php
	//Get number of portfolios per page
	$tg_portfolio_items = kirki_get_option('tg_portfolio_items');
	
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
	
	$query_string = 'paged='.$paged.'&orderby=menu_order&order=ASC&post_type=portfolios&numberposts=-1&suppress_filters=0&posts_per_page='.$tg_portfolio_items;

	if(!empty($term))
	{
		$ob_term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		$custom_tax = $wp_query->query_vars['taxonomy'];
	    $query_string .= '&posts_per_page=-1&'.$custom_tax.'='.$term;
	}
	query_posts($query_string);

	//Include project filterable options
	get_template_part("/templates/template-portfolio-filterable");
?>
    
<div class="inner">

	<div class="inner_wrapper nopadding">
	
	<?php
	    if(!empty($post->post_content) && empty($term))
	    {
	?>
	    <div class="standard_wrapper"><?php echo tg_apply_content($post->post_content); ?></div><br class="clear"/><br/>
	<?php
	    }
	    elseif(!empty($term) && !empty($ob_term->description))
	    { 
	?>
	    <div class="standard_wrapper"><?php echo esc_html($ob_term->description); ?></div><br class="clear"/><br/>
	<?php
	    }
	?>
	
	<div id="page_main_content" class="sidebar_content full_width nopadding fixed_column">
	
	<div id="portfolio_filter_wrapper" class="gallery three_cols portfolio-content section content clearfix wide" data-columns="3">
	
	<?php
		$key = 0;
		if (have_posts()) : while (have_posts()) : the_post();
			$key++;
			$image_url = '';
			$portfolio_ID = get_the_ID();
					
			if(has_post_thumbnail($portfolio_ID, 'large'))
			{
			    $image_id = get_post_thumbnail_id($portfolio_ID);
			    $image_url = wp_get_attachment_image_src($image_id, 'large', true);
			    
			    $small_image_url = wp_get_attachment_image_src($image_id, 'gallery_masonry', true);
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
			
			//Get portfolio category
			$portfolio_item_set = '';
			$portfolio_item_sets = wp_get_object_terms($portfolio_ID, 'portfoliosets');
			
			if(is_array($portfolio_item_sets))
			{
			    foreach($portfolio_item_sets as $set)
			    {
			    	$portfolio_item_set.= $set->slug.' ';
			    }
			}
	?>
	<div class="element grid classic3_cols <?php echo esc_attr($portfolio_item_set); ?>" data-type="<?php echo esc_attr($portfolio_item_set); ?>">
	
		<div class="one_third gallery3 static filterable gallery_type animated<?php echo esc_attr($key+1); ?> portfolio_type" data-id="post-<?php echo esc_attr($key+1); ?>">
			<?php 
				if(!empty($image_url[0]))
				{
			?>		
				<?php
						$portfolio_type = get_post_meta($portfolio_ID, 'portfolio_type', true);
						$portfolio_video_id = get_post_meta($portfolio_ID, 'portfolio_video_id', true);
						
						switch($portfolio_type)
						{
						case 'External Link':
							$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
					?>
					<a target="_blank" href="<?php echo esc_url($portfolio_link_url); ?>">
						<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"/>
						<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
        					<div class="table">
        						<div class="cell">
						            <h5><?php echo get_the_title(); ?></h5>
						            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
        						</div>
        					</div>
				        </div>
		            </a>
					
					<?php
						break;
						//end external link
						
						case 'Portfolio Content':
        				default:
        			?>
        			<a href="<?php echo esc_url(get_permalink($portfolio_ID)); ?>">
        				<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
        				<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
        					<div class="table">
        						<div class="cell">
						            <h5><?php echo get_the_title(); ?></h5>
						            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
        						</div>
        					</div>
				        </div>
		            </a>
	                
	                <?php
						break;
						//portfolio content
        				
        				case 'Image':
					?>
					<a data-title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_url($image_url[0]); ?>" class="fancy-gallery">
						<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
						<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
        					<div class="table">
        						<div class="cell">
						            <h5><?php echo get_the_title(); ?></h5>
						            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
        						</div>
        					</div>
				        </div>
	                </a>
					
					<?php
						break;
						//end image
						
						case 'Youtube Video':
					?>
					
					<a title="<?php echo esc_attr(get_the_title()); ?>" href="#video_<?php echo esc_attr($portfolio_video_id); ?>" class="lightbox_youtube">
						<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
						<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
        					<div class="table">
        						<div class="cell">
						            <h5><?php echo get_the_title(); ?></h5>
						            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
        						</div>
        					</div>
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
						<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
						<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
        					<div class="table">
        						<div class="cell">
						            <h5><?php echo get_the_title(); ?></h5>
						            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
        						</div>
        					</div>
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
						<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
						<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
        					<div class="table">
        						<div class="cell">
						            <h5><?php echo get_the_title(); ?></h5>
						            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
        						</div>
        					</div>
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
			<?php
				}		
			?>
		</div>
	</div>
	<?php
		endwhile; endif;
	?>
		
	</div>
	
	<?php
	    if($wp_query->max_num_pages > 1)
	    {
	    	if (function_exists("wpapi_pagination")) 
	    	{
	?>
			<br class="clear"/>
	<?php
	    	    wpapi_pagination($wp_query->max_num_pages);
	    	}
	    	else
	    	{
	    	?>
	    	    <div class="pagination"><p><?php posts_nav_link(' '); ?></p></div>
	    	<?php
	    	}
	    ?>
	    <div class="pagination_detail">
	     	<?php
	     		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	     	?>
	     	<?php _e( 'Page', THEMEDOMAIN ); ?> <?php echo esc_html($paged); ?> <?php _e( 'of', THEMEDOMAIN ); ?> <?php echo esc_html($wp_query->max_num_pages); ?>
	     </div>
	     <br class="clear"/><br/>
	     <?php
	     }
	?>
	</div>

</div>
</div>
</div>
<?php get_footer(); ?>
<!-- End content -->