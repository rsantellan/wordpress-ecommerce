<?php
/**
 * The main template file for display error page.
 *
 * @package WordPress
*/


get_header(); 
?>

<!-- Begin content -->
<div id="page_content_wrapper">

    <div class="inner">
    
    	<!-- Begin main content -->
    	<div class="inner_wrapper">
    	
    		<div class="error_box">
				<p class="error_type">404</p>
			</div>
			<p class="error_text"><?php _e( 'Not Found!', THEMEDOMAIN ); ?></p>
    	
	    	<div class="search_form_wrapper">
	    		<div class="content">
	    	    	<?php _e( "We're sorry, the page you have looked for does not exist in our content!", THEMEDOMAIN ); ?><br/>
	    	    	<?php _e( "Perhaps you would like to go to our homepage or try searching below.", THEMEDOMAIN ); ?>
	    		</div>
	    	    
	    	    <form class="searchform" role="search" method="get" action="<?php echo home_url(); ?>">
			    	<input style="width:100%" type="text" class="field searchform-s" name="s" value="<?php the_search_query(); ?>" placeholder="<?php _e( 'Type to search and hit enter...', THEMEDOMAIN ); ?>">
			    </form>
    		</div>
	    	
	    	<br/><hr/><br/><br/>
	    	
	    	<h5><?php _e( 'Or try to browse our latest posts instead?', THEMEDOMAIN ); ?></h5><br/><br/>
	    		
	    		<div id="blog_grid_wrapper" class="sidebar_content full_width">
	    		<?php
				
				$query_string ="items=6&post_type=post&paged=$paged";
				query_posts($query_string);
				$key = 0;
				
				if (have_posts()) : while (have_posts()) : the_post();
					
					$animate_layer = $key+7;
					$image_thumb = '';
												
					if(has_post_thumbnail(get_the_ID(), 'large'))
					{
					    $image_id = get_post_thumbnail_id(get_the_ID());
					    $image_thumb = wp_get_attachment_image_src($image_id, 'large', true);
					}
				?>
				
				<!-- Begin each blog post -->
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<div class="post_wrapper grid_layout">
					
						<?php
						    //Get post featured content
						    $post_ft_type = get_post_meta(get_the_ID(), 'post_ft_type', true);
						    
						    switch($post_ft_type)
						    {
						    	case 'Image':
						    	default:
						        	if(!empty($image_thumb))
						        	{
						        		$small_image_url = wp_get_attachment_image_src($image_id, 'gallery_next_prev', true);
						?>
						
						    	    <div class="post_img small static">
						    	    	<a href="<?php the_permalink(); ?>">
						    	    		<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="" class="" style="width:<?php echo esc_attr($small_image_url[1]); ?>px;height:<?php echo esc_attr($small_image_url[2]); ?>px;"/>
						                </a>
						    	    </div>
						
						<?php
						    		}
						    	break;
						    	
						    	case 'Vimeo Video':
						    		$post_ft_vimeo = get_post_meta(get_the_ID(), 'post_ft_vimeo', true);
						?>
						    		<?php echo do_shortcode('[tg_vimeo video_id="'.$post_ft_vimeo.'" width="670" height="377"]'); ?>
						    		<br/>
						<?php
						    	break;
						    	
						    	case 'Youtube Video':
						    		$post_ft_youtube = get_post_meta(get_the_ID(), 'post_ft_youtube', true);
						?>
						    		<?php echo do_shortcode('[tg_youtube video_id="'.$post_ft_youtube.'" width="670" height="377"]'); ?>
						    		<br/>
						<?php
						    	break;
						    	
						    	case 'Gallery':
						    		$post_ft_gallery = get_post_meta(get_the_ID(), 'post_ft_gallery', true);
						?>
						    		<?php echo do_shortcode('[tg_gallery_slider gallery_id="'.$post_ft_gallery.'" size="gallery_2" width="670" height="270"]'); ?>
						<?php
						    	break;
						    	
						    } //End switch
						?>
					    
					    <div class="blog_grid_content">
							<?php
						    	//Check post format
						    	$post_format = get_post_format(get_the_ID());
								
								switch($post_format)
								{
									case 'quote':
							?>		
									<div class="post_header quote">
										<div class="post_quote_title grid">
											<a href="<?php the_permalink(); ?>"><?php the_content(); ?></a>
											<div class="post_detail">
										    	<?php echo get_the_time(THEMEDATEFORMAT); ?>
										    	<?php
										    		//Get Post's Categories
										    		$post_categories = wp_get_post_categories($post->ID);
										    		if(!empty($post_categories))
										    		{
										    	?>
										    		<?php echo _e( 'In', THEMEDOMAIN ); ?>
										    	<?php
										    	    	foreach($post_categories as $c)
										    	    	{
										    	    		$cat = get_category( $c );
										    	?>
										    	    	<a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a>
										    	<?php
										    	    	}
										    	    }
										    	?>
										    </div>
										</div>
									</div>
							<?php
									break;
									
									case 'link':
							?>		
									<div class="post_header quote">
										<div class="post_quote_title grid">
											<?php the_content(); ?>
											<div class="post_detail">
										    	<?php echo get_the_time(THEMEDATEFORMAT); ?>
										    	<?php
										    		//Get Post's Categories
										    		$post_categories = wp_get_post_categories($post->ID);
										    		if(!empty($post_categories))
										    		{
										    	?>
										    		<?php echo _e( 'In', THEMEDOMAIN ); ?>
										    	<?php
										    	    	foreach($post_categories as $c)
										    	    	{
										    	    		$cat = get_category( $c );
										    	?>
										    	    	<a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a>
										    	<?php
										    	    	}
										    	    }
										    	?>
										    </div>
										</div>
									</div>
							<?php
									break;
									
									default:
						    ?>
							    <div class="post_header grid">
							    	<h6><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
							    	<div class="post_detail">
									    <?php echo get_the_time(THEMEDATEFORMAT); ?>
									    <?php
									    	//Get Post's Categories
									    	$post_categories = wp_get_post_categories($post->ID);
									    	if(!empty($post_categories))
									    	{
									    ?>
									    	<?php echo _e( 'In', THEMEDOMAIN ); ?>
									    <?php
									        	foreach($post_categories as $c)
									        	{
									        		$cat = get_category( $c );
									    ?>
									        	<a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a>
									    <?php
									        	}
									        }
									    ?>
									</div>
							    </div>
							    
							    <?php
							    	echo pp_substr(get_excerpt_by_id($post->ID), 110);
							    ?>
						    <?php
						    		break;
						    	}
						    ?>
					    </div>
					    
					</div>
				
				</div>
				<!-- End each blog post -->
				
				<?php $key++; ?>
				<?php endwhile; endif; ?>
	    		</div>
    		</div>
    		
    		<div class="sidebar_wrapper">
    		
	    	    <div class="sidebar_top"></div>
	    	
	    	    <div class="sidebar">
	    	    
	    	    	<div class="content">
	    	    
	    	    		<ul class="sidebar_widget">
	    	    		<?php dynamic_sidebar('404 Not Found Sidebar'); ?>
	    	    		</ul>
	    	    	
	    	    	</div>
	    	
	    	    </div>
	    	    <br class="clear"/>
	    	
	    	    <div class="sidebar_bottom"></div>
	    	</div>
    	</div>
    	
</div>
<br class="clear"/>
<?php get_footer(); ?>