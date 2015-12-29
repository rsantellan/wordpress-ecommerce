<?php
/**
 * The main template file for display single post portfolio.
 *
 * @package WordPress
*/

if(isset($post->ID))
{
    $current_page_id = $post->ID;
}

get_header(); 

//Include custom header feature
get_template_part("/templates/template-portfolio-header");
?>

<?php
	//Check if use page builder
	$ppb_form_data_order = '';
	$ppb_form_item_arr = array();
	$ppb_enable = get_post_meta($current_page_id, 'ppb_enable', true);
?>

<?php
	if(!empty($ppb_enable))
	{
		//if dont have password set
		if(!post_password_required())
		{
?>
<div class="ppb_wrapper <?php if(!empty($pp_page_bg)) { ?>hasbg<?php } ?> <?php if(!empty($pp_page_bg) && !empty($global_pp_topbar)) { ?>withtopbar<?php } ?>">
<?php
	tg_apply_builder($current_page_id, 'portfolios');
?>
</div>
<?php
		} //end if dont have password set
		else
		{
?>
<div id="page_content_wrapper" class="<?php if(!empty($pp_page_bg)) { ?>hasbg<?php } ?> <?php if(!empty($pp_page_bg) && !empty($global_pp_topbar)) { ?>withtopbar<?php } ?>">
    <div class="inner">
    	<!-- Begin main content -->
    	<div class="inner_wrapper">
    		<div class="sidebar_content full_width">
<?php
			the_content();
?>
    		<br/><br/></div>
    	</div>
    </div>
</div>
<?php
		}
	}
	else
	{
?>
    
    <div class="inner">

    	<!-- Begin main content -->
    	<div class="inner_wrapper">

	    	<div class="sidebar_content full_width">
	    	
	    		<?php
					if (have_posts())
					{ 
						while (have_posts()) : the_post();
		
						the_content();
		    		    
		    		    endwhile; 
		    		}
		    	?>
		    </div>
		    
    	</div>
    
    </div>
    <!-- End main content -->
   
</div> 
		    	
<?php
} // End if not using content builder
?>
		    
<?php
    $tg_portfolio_next_prev = kirki_get_option('tg_portfolio_next_prev');
    
    if(!empty($tg_portfolio_next_prev))
    {

    $args = array(
    	'before'           => '<p>' . __('Pages:', THEMEDOMAIN),
    	'after'            => '</p>',
    	'link_before'      => '',
    	'link_after'       => '',
    	'next_or_number'   => 'number',
    	'nextpagelink'     => __('Next page', THEMEDOMAIN),
    	'previouspagelink' => __('Previous page', THEMEDOMAIN),
    	'pagelink'         => '%',
    	'echo'             => 1
    );
    wp_link_pages($args);
?>
<?php
    	//Get Previous and Next Post
    	$prev_post = get_previous_post();
    	
    	//If previous post is empty then get last post
    	if(empty($prev_post))
    	{
        	$args = array(
    		    'numberposts' => 1,
    		    'order' => 'ASC',
    		    'orderby' => 'menu_order',
    		    'post_type' => array('portfolios'),
    		);
    		$prev_post = get_posts($args);
    		
        	$prev_post_bak = $prev_post[0];
        	unset($prev_post);
        	$prev_post = $prev_post_bak;
    	}
    	
    	$next_post = get_next_post();
    	
    	//If next post is empty then get first post
    	if(empty($next_post))
    	{
        	$args = array(
    		    'numberposts' => 1,
    		    'order' => 'DESC',
    		    'orderby' => 'menu_order',
    		    'post_type' => array('portfolios'),
    		);
    		$next_post = get_posts($args);
        	
        	$next_post_bak = $next_post[0];
        	unset($next_post);
        	$next_post = $next_post_bak;
    	}
?>
<div class="portfolio_post_wrapper">
<?php
   //Get Next Post
   if (!empty($next_post)): 
   $next_image_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'thumbnail', true);
   if(isset($next_image_thumb[0]))
   {
       $image_file_name = basename($next_image_thumb[0]);
   }
?>
   <div class="portfolio_post_next">
   		<a class="portfolio_next tooltip" title="<?php echo esc_attr($next_post->post_title); ?>" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
     		<i class="fa fa-angle-right"></i>
     	</a>
    </div>
<?php endif; ?>

<?php
   //Get Previous Post
   if (!empty($prev_post)): 
   	$prev_image_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($prev_post->ID), 'thumbnail', true);
   	if(isset($prev_image_thumb[0]))
   	{
   	    $image_file_name = basename($prev_image_thumb[0]);
   	}
?>
   	<div class="portfolio_post_previous">
   		<a class="portfolio_prev tooltip" title="<?php echo esc_attr($prev_post->post_title); ?>" href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>">
     		<i class="fa fa-angle-left"></i>
     	</a>
    </div>
<?php endif; ?>

</div>
<?php
    
} //End if display previous and next portfolios
?>


<?php get_footer(); ?>