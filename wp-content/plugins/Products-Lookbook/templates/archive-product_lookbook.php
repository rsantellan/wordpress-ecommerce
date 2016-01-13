<?php
 /*Template Name: New Template
 */
get_header(); ?>
<div id="primary">
	<div id="content" role="main">
	<?php
    //$rental_features = get_taxonomy( 'product_lookbook_category' );
    $args = array (
    'taxonomy' => 'lookbook_category', //your custom post type
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => 0 //shows empty categories
    );
    $categories = get_categories( $args );
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
      if ( $index_query->have_posts() ) {
          echo '<ul>';
          while ( $index_query->have_posts() ) {
              $index_query->the_post();
              ?>
              <div style="float: right; margin: 10px">
                <a href="<?php echo get_term_link( $category->slug, 'lookbook_category' ); ?>">
					<?php the_post_thumbnail( array( 100, 100 ) ); ?>
                </a>  
              </div>
              <?php
              echo '<li>' . $category->name . '</li>';
          }
          echo '</ul>';
      } else {
          // no posts found
      }
      /* Restore original Post Data */
      wp_reset_postdata();
      
    endforeach;
	?>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>