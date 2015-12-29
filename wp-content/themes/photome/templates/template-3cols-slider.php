<?php
	//Check if display slider
	$tg_blog_slider = kirki_get_option('tg_blog_slider');
	if(THEMEDEMO && isset($_GET['slider']))
	{
		$tg_blog_slider = 1;
	}
	
	if(!empty($tg_blog_slider) && !is_search() && !is_category() && !is_tag() && !is_archive())
	{
		$order = 'DESC';
		if(THEMEDEMO)
		{
			$order = 'ASC';
		}
	
		//Get post featured category
		$query_string = 'orderby=date&order='.$order.'&post_type=post&suppress_filters=0';
		
		//Check if filter slider posts by selected category
		$tg_blog_slider_cat = kirki_get_option('tg_blog_slider_cat');
		if(!empty($tg_blog_slider_cat))
		{
			$query_string.= '&cat='.$tg_blog_slider_cat;
		}
		
		//Check slider post items
		$tg_blog_slider_items = kirki_get_option('tg_blog_slider_items');
		if(!empty($tg_blog_slider_items) && is_numeric($tg_blog_slider_items))
		{
			$query_string.= '&posts_per_page='.$tg_blog_slider_items;
		}
		else
		{
			$query_string.= '&posts_per_page=5';
		}
		
		query_posts($query_string);
		
		wp_enqueue_script("flexslider-js", get_template_directory_uri()."/js/flexslider/jquery.flexslider-min.js", false, THEMEVERSION, true);
		wp_enqueue_script("script-gallery-flexslider", get_template_directory_uri()."/templates/script-slider-flexslider.php", false, THEMEVERSION, true);
?>
	<div id="post_featured_slider" class="slider_wrapper three_cols">
		<div class="flexslider" data-height="350">
			<ul class="slides">
	<?php
		//Display slide content
		$key = 0;
		if (have_posts()) : while (have_posts()) : the_post();
			$key++;
			$total = $wp_query->post_count;
		
			//Get post featured image
			$slide_ID = get_the_ID();
			$image_url = array();
						
			if(has_post_thumbnail($slide_ID, 'large'))
			{
			    $image_id = get_post_thumbnail_id($slide_ID);
			    $image_url = wp_get_attachment_image_src($image_id, 'original', true);
			}
			
			if(isset($image_url[0]) && !empty($image_url[0]))
			{
			if($key==1 OR $key%4==0)
			{
	?>
			<li>
	<?php
			}
	?>
				<a href="<?php echo get_permalink($slide_ID); ?>">
					<div class="slider_image three_cols" style="background-image:url('<?php echo esc_url($image_url[0]); ?>');">
						<div class="slide_post">
							<div class="slide_post_date post_detail"><?php echo date_i18n(THEMEDATEFORMAT, get_the_time('U')); ?></div>
							<h2><?php the_title(); ?></h2>
						</div>
					</div>
				</a>
	<?php
			if($key%3==0)
			{
	?>
			</li>
	<?php
			}
			
			}
			
		endwhile; endif;
	?>
			</ul>
		</div>
	</div>
<?php	
		wp_reset_query();
	} //End if display slider
?>