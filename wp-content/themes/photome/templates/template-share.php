<?php
	$pin_thumb = array('');
    if(has_post_thumbnail(get_the_ID(), 'photography-blog'))
	{
	    $image_id = get_post_thumbnail_id(get_the_ID());
	    $pin_thumb = wp_get_attachment_image_src($image_id, 'photography-blog', true);
	}
    
    global $share_display_inline;
?>
<div id="social_share_wrapper" <?php if($share_display_inline) { ?>class="inline"<?php } ?>>
	<ul>
		<li><a class="tooltip" title="<?php _e( 'Share On Facebook', THEMEDOMAIN ); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>"><i class="fa fa-facebook marginright"></i></a></li>
		<li><a class="tooltip" title="<?php _e( 'Share On Twitter', THEMEDOMAIN ); ?>" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo get_permalink(); ?>&url=<?php echo get_permalink(); ?>"><i class="fa fa-twitter marginright"></i></a></li>
		<li><a class="tooltip" title="<?php _e( 'Share On Pinterest', THEMEDOMAIN ); ?>" target="_blank" href="http://www.pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo $pin_thumb[0]; ?>"><i class="fa fa-pinterest marginright"></i></a></li>
		<li><a class="tooltip" title="<?php _e( 'Share On Google+', THEMEDOMAIN ); ?>" target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>"><i class="fa fa-google-plus marginright"></i></a></li>
	</ul>
</div>