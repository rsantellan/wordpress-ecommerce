<?php
get_header();
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
if ( $index_query->have_posts() ):
  while ( $index_query->have_posts() ):
    $index_query->the_post();
    echo '<a href="'.get_post_permalink().'">';
    the_post_thumbnail( array( 100, 100 ) );
    echo '</a>';
    echo the_title();
  endwhile;
              
  
endif;



wp_reset_postdata();
get_footer();

