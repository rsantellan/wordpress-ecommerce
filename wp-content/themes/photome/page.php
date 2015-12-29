<?php
/**
 * The main template file for display page.
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
?>

<?php
//Get page header display setting
$page_show_title = get_post_meta($current_page_id, 'page_show_title', true);

if(empty($page_show_title))
{
	//Get current page tagline
	$page_tagline = get_post_meta($current_page_id, 'page_tagline', true);

	$pp_page_bg = '';
	//Get page featured image
	if(has_post_thumbnail($current_page_id, 'full'))
    {
        $image_id = get_post_thumbnail_id($current_page_id); 
        $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
        
        if(isset($image_thumb[0]) && !empty($image_thumb[0]))
        {
        	$pp_page_bg = $image_thumb[0];
        }
    }
    
    //Check if add blur effect
	$tg_page_title_img_blur = kirki_get_option('tg_page_title_img_blur');
	
	global $global_pp_topbar;
?>
<div id="page_caption" class="<?php if(!empty($pp_page_bg)) { ?>hasbg parallax <?php } ?> <?php if(!empty($global_pp_topbar)) { ?>withtopbar<?php } ?> <?php if(!empty($screen_class)) { ?>split<?php } ?>">
	<?php if(!empty($pp_page_bg)) { ?>
		<div id="bg_regular" style="background-image:url(<?php echo esc_url($pp_page_bg); ?>);"></div>
	<?php } ?>
	<?php
	    if(!empty($tg_page_title_img_blur))
	    {
	?>
	<div id="bg_blurred" style="background-image:url(<?php echo get_template_directory_uri().'/modules/blurred.php?src='.esc_url($pp_page_bg); ?>);"></div>
	<?php
	    }
	?>
	
	<div class="page_title_wrapper">
		<div class="page_title_inner">
			<h1 <?php if(!empty($pp_page_bg) && !empty($global_pp_topbar)) { ?>class ="withtopbar"<?php } ?>><?php the_title(); ?></h1>
			<?php
		    	if(!empty($page_tagline))
		    	{
		    ?>
		    	<div class="page_tagline">
		    		<?php echo wp_kses_post($page_tagline); ?>
		    	</div>
		    <?php
		    	}
		    ?>
		</div>
	</div>
</div>
<?php
}
?>

<?php
	//Check if use page builder
	$ppb_form_data_order = '';
	$ppb_form_item_arr = array();
	$ppb_enable = get_post_meta($current_page_id, 'ppb_enable', true);
	
	global $global_pp_topbar;
?>
<?php
	if(!empty($ppb_enable))
	{
		//if dont have password set
		if(!post_password_required())
		{
		wp_enqueue_script("custom_onepage", get_template_directory_uri()."/js/custom_onepage.js", false, THEMEVERSION, true);
?>
<div class="ppb_wrapper <?php if(!empty($pp_page_bg)) { ?>hasbg<?php } ?> <?php if(!empty($pp_page_bg) && !empty($global_pp_topbar)) { ?>withtopbar<?php } ?>">
<?php
		tg_apply_builder($current_page_id);
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
    		<div class="sidebar_content full_width"><br/><br/>
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
<!-- Begin content -->
<div id="page_content_wrapper" class="<?php if(!empty($pp_page_bg)) { ?>hasbg<?php } ?> <?php if(!empty($pp_page_bg) && !empty($global_pp_topbar)) { ?>withtopbar<?php } ?>">
    <div class="inner">
    	<!-- Begin main content -->
    	<div class="inner_wrapper">
    		<div class="sidebar_content full_width">
    		<?php 
    			if ( have_posts() ) {
    		    while ( have_posts() ) : the_post(); ?>		
    	
    		    <?php the_content(); break;  ?>

    		<?php endwhile; 
    		}
    		?>
    		
    		<?php
			if (comments_open($post->ID)) 
			{
			?>
			<div class="fullwidth_comment_wrapper">
				<?php comments_template( '', true ); ?>
			</div>
			<?php
			}
			?>
    		</div>
    	</div>
    	<!-- End main content -->
    </div> 
</div>
<?php
}
?>
<?php get_footer(); ?>