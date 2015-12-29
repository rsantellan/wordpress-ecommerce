<?php
/**
 * The main template file for display error page.
 *
 * @package WordPress
*/

session_start();

/**
*	Get current page id
**/
$current_page_id = '';

/**
*	Get Current page object
**/
$page = get_page($post->ID);

if(isset($page->ID))
{
    $current_page_id = $page->ID;
}

//Check if password protected
$gallery_password = get_post_meta($current_page_id, 'gallery_password', true);

if(!empty($gallery_password) && (!isset($_SESSION['gallery_page_'.$current_page_id]) OR empty($_SESSION['gallery_page_'.$current_page_id])))
{
	$notice_text = '';
	if(isset($_POST['gallery_password']))
	{
		//check gallery password
		$portfolio_password = get_post_meta($current_page_id, 'gallery_password', true);
		
		if($_POST['gallery_password'] != $portfolio_password)
		{
			$notice_text = __( 'Error Password is incorrect', THEMEDOMAIN );
		}
		else
		{	
			$_SESSION['gallery_page_'.$current_page_id] = $current_page_id;
			
			$permalink = get_permalink($current_page_id);
			header("Location: ".$permalink);
			exit;
		}
	}
	
	global $pp_homepage_style;
	$pp_homepage_style = 'password';
	
	get_header(); 
	?>
	
	<br class="clear"/>
	
	<?php
	if(has_post_thumbnail($current_page_id, 'original'))
	{
		$image_id = get_post_thumbnail_id($current_page_id); 
		$image_thumb = wp_get_attachment_image_src($image_id, 'original', true);
	?>
	<?php
	}
	?>
	<div class="password_overlay"></div>
	<div class="password_container" <?php if(isset($image_thumb[0]) && !empty($image_thumb[0])) { ?>style="background-image:url(<?php echo esc_url($image_thumb[0]); ?>);"<?php }?>>
		<div class="password_wrapper">
			<!-- Begin main content -->
		    <div class="vertical_center_wrapper transparentbg" style="text-align:center">
			    <div class="overlay_gallery_border">
				    <div class="overlay_gallery_content">
						
						<div class="lock_wrapper"><i class="fa fa-lock"></i></div>
				    	
				        <p><?php _e( 'To continue it please enter your password below', THEMEDOMAIN ); ?></p><br/>
				        	
				        <?php 
				            if(!empty($notice_text))
				            {
				        ?>
				            	<span class="error"><?php echo esc_html($notice_text); ?></span>
				        <?php
				            }
				        ?>
				        <form id="gallery_password_form" method="post" action="<?php echo curPageURL(); ?>">
				            <input id="gallery_password" name="gallery_password" type="password" placeholder="<?php echo esc_attr(__( 'Password', THEMEDOMAIN )); ?>"/><br/><br/>
				            <input type="submit" value="<?php echo __( 'Authenticate', THEMEDOMAIN ); ?>" class="login_gallery"/>
				        </form>
				    </div>
			    </div>
		    </div>
		</div>
	</div>
	<?php get_footer(); ?>
<?php

exit;
}
?>