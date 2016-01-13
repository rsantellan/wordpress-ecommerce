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

//Check if gallery template
global $page_gallery_id;
if(!empty($page_gallery_id))
{
	$current_page_id = $page_gallery_id;
}

//Check if password protected
get_template_part("/templates/template-password");

$all_photo_arr = array();
//Get gallery images
//$all_photo_arr = get_post_meta($current_page_id, 'wpsimplegallery_gallery', true);

//Get global gallery sorting
//$all_photo_arr = pp_resort_gallery_img($all_photo_arr);
get_header();
$args = array (
    'taxonomy' => 'lookbook_category', //your custom post type
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => 0 //shows empty categories
    );
$categories = get_categories( $args );

?>

<?php
	global $page_content_class;
	$page_content_class = 'wide';

    //Include custom header feature
	//get_template_part("/templates/template-header");
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
            'posts_per_page' => '1', 
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
          if ( $index_query->have_posts() ):
            $index_query->the_post();
            ?>
            <a <?php if(!empty($tg_full_image_caption)) { ?>title="<?php if(!empty($image_caption)) { ?><?php echo esc_attr($image_caption); ?><?php } ?>"<?php } ?> class="fancy-gallery" href="<?php echo esc_url($image_url[0]); ?>">
              <?php the_post_thumbnail( 'gallery_grid' ); ?>
            </a>
              <div style="float: right; margin: 10px">
                    <a href="<?php echo get_term_link( $category->slug, 'lookbook_category' ); ?>">
                    <?php the_post_thumbnail( array( 100, 100 ) ); ?>
                </a>  
              </div>
            <?php
            $key++;
          endif;
        endforeach;
      /* Restore original Post Data */
      wp_reset_postdata();    
        
        foreach($list as $categoryId => $data):
          $postData = $data['data'];
          var_dump($postData->ID);
          //$image_url = get_the_post_thumbnail($postData->ID, 'original', true);
          
          //$small_image_url = get_the_post_thumbnail($postData->ID, 'gallery_grid', true);
          //$image_caption = get_post_field('post_excerpt', $postData->ID);
          //$image_alt = get_post_meta($postData->ID, '_wp_attachment_image_alt', true);
          
        ?>
      <div class="element grid classic2_cols">
	
		<div class="one_half gallery2 static filterable gallery_type animated<?php echo esc_attr($key+1); ?>" data-id="post-<?php echo esc_attr($key+1); ?>">
		
			<a <?php if(!empty($tg_full_image_caption)) { ?>title="<?php if(!empty($image_caption)) { ?><?php echo esc_attr($image_caption); ?><?php } ?>"<?php } ?> class="fancy-gallery" href="<?php echo esc_url($image_url[0]); ?>">
        <img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
    </a>
		
		</div>
		
      </div>      
        <?php
        $key++;
        endforeach;
	?>
		
	</div>
	
	</div>

</div>
</div>
</div>
<?php get_footer(); ?>
<!-- End content -->
