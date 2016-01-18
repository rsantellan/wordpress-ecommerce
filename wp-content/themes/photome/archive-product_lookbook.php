<?php
/**
 * The main template file for display gallery page.
 *
 * @package WordPress
*/

/**
*	Get Current page object
**/
$page = get_page($post->ID);
$current_page_id = '';

if(isset($page->ID))
{
    $current_page_id = $page->ID;
}

get_header();

//Check if disable slideshow hover effect
$tg_gallery_hover_slide = kirki_get_option( "tg_gallery_hover_slide" );

if(!empty($tg_gallery_hover_slide))
{
	wp_enqueue_script("jquery.cycle2.min", get_template_directory_uri()."/js/jquery.cycle2.min.js", false, THEMEVERSION, true);
	wp_enqueue_script("custom_cycle", get_template_directory_uri()."/js/custom_cycle.js", false, THEMEVERSION, true);
}
//Include custom header feature
get_template_part("/templates/template-header");

$all_photo_arr = array();
$args = array (
    'taxonomy' => 'lookbook_category', //your custom post type
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => 0 //shows empty categories
    );
$categories = get_categories( $args );
$list = array();
?>

<!-- Begin content -->
<?php
	
?>
    
<div class="inner">
  COPIAR: wp-content/themes/photome/gallery-archive-2-contained.php
wp-content/themes/photome/archive-product_lookbook.php
	<div class="inner_wrapper nopadding">
	
	<div id="page_main_content" class="sidebar_content full_width nopadding fixed_column">
	
	<div id="portfolio_filter_wrapper" class="gallery two_cols portfolio-content section content clearfix wide" data-columns="2">
	
	<?php
		$tg_full_image_caption = kirki_get_option('tg_full_image_caption');
        $key = 0;
        foreach($categories as $category):
            $argsPosts = array(
            'post_type' => 'product_lookbook', 
            'posts_per_page' => '5', 
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
        $isFirst = true;
          if ( $index_query->have_posts() ):
?>
        <div class="element grid classic2_cols">
	
		<div class="one_half gallery2 static filterable gallery_type archive animated<?php echo esc_attr($key+1); ?>" data-id="post-<?php echo esc_attr($key+1); ?>">
<?php
        $startPostId = null;
            while ( $index_query->have_posts() ):
            $index_query->the_post();
            ?>
			<?php if(has_post_thumbnail() && $isFirst): 
                $startPostId = get_the_ID();
			?>	
			    <a href="<?php echo get_term_link( $category->slug, 'lookbook_category' ); ?>">
			    	<div class="gallery_archive_desc">
			    		<h4><?php echo $category->name; ?></h4>
			    		<div class="post_detail"><?php echo $category->description; ?></div>
			    	</div>
                    <ul class="gallery_img_slides">
                <?php endif;?>
                <?php if(!$isFirst): ?>
                        <li>
                            <?php the_post_thumbnail( 'gallery_grid' , array('class' => 'static')); ?>
                        </li>
				<?php else: ?>
                    <?php //the_post_thumbnail( 'gallery_grid' , array('class' => '')); ?>
                <?php endif;?>
                <?php $isFirst = false; ?>
             <?php endwhile;?>   
             <?php if(!$isFirst): ?>
                    </ul>
                    <?php 
                    echo get_the_post_thumbnail($startPostId, 'gallery_grid');
                    ?>
			    </a>
             <?php endif;?>   
		</div>
		
	</div>            
              </div>
            <?php
            
          endif;
          $key++;
        endforeach;
      /* Restore original Post Data */
      wp_reset_postdata();    
    ?>
		
	</div>
	
	</div>

</div>
</div>
</div>
<?php get_footer(); ?>
<!-- End content -->
