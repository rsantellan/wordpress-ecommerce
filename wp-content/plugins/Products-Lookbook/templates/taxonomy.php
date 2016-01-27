<?php

$category = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$argsPosts = array(
    'post_type' => 'product_lookbook', 
    'posts_per_page' => '-1', 
    'order' => 'DESC', 
    'tax_query' => array(
        array(
            'taxonomy' => 'lookbook_category',
            'field'    => 'term_id',
            'terms'    => $category->term_id,
        ),
    ),
  );
$index_query = new WP_Query($argsPosts);

//Check if password protected
get_template_part("/templates/template-password");

//Get gallery images
//$all_photo_arr = get_post_meta($current_page_id, 'wpsimplegallery_gallery', true);

//Get global gallery sorting
//$all_photo_arr = pp_resort_gallery_img($all_photo_arr);

get_header();
?>

<?php
    //Include custom header feature
	get_template_part("/templates/template-header");
?>

<!-- Begin content -->
<?php
	
?>
    
<div class="inner">

	<div class="inner_wrapper nopadding">
	
	<div id="page_main_content" class="sidebar_content full_width nopadding fixed_column">
	
	<div id="portfolio_filter_wrapper" class="gallery two_cols portfolio-content section content clearfix" data-columns="2">
	
	<?php
		$tg_full_image_caption = kirki_get_option('tg_full_image_caption');
		$counter = rand(0, 2);
        if ( $index_query->have_posts() ):
          while ( $index_query->have_posts() ):
            $index_query->the_post();
            switch($counter)
            {
                case 0:
                    $image_class = 'gallery_masonry';
                break;
                case 1:
                    $image_class = 'gallery_masonry';
                break;
                case 2:
                    $image_class = 'gallery_masonry';
                break;
                default:
                    $image_class = 'gallery_masonry';
                break;	        			        			        		
            }
?>
	<div class="element grid classic2_cols">
	
		<div class="one_half gallery2 static filterable gallery_type animated<?php echo esc_attr($key+1); ?>" data-id="post-<?php echo esc_attr($key+1); ?>">
		
			<?php 
			    if(has_post_thumbnail())
			    {
			?>		
			    <a title="<?php echo the_title()?>" class="ajax_iframe <?php echo $image_class;?>" href="<?php echo get_post_permalink(); ?>">
			        <?php the_post_thumbnail( $image_class );?>
			    </a>
			<?php
			    }		
			?>
		
		</div>
		
	</div>
<?php
/*
            echo '<a href="'.get_post_permalink().'">';
            the_post_thumbnail( array( 100, 100 ) );
            echo '</a>';
            echo the_title();
*/

          endwhile;
        endif;

    ?>
		
	</div>
	
	</div>

</div>
</div>
<br class="clear"/>
</div>
<?php get_footer(); ?>
<!-- End content -->