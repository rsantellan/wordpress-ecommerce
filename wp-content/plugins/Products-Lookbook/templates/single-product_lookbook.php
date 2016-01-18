<?php
 /*Template Name: New Template
 */
//get_header(); ?>
<div id="primary">
	<div id="content" role="main">
	<?php
	$_pf = new WC_Product_Factory();
	?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background-color: white; height: 800px">
			<header class="entry-header">

				<!-- Display featured image in right-aligned floating div -->
				<div style="float: left; margin: 10px">
					<?php the_post_thumbnail( 'gallery_masonry' ); ?>
				</div>

				<!-- Display Title and Author Name -->
				<strong>Nombre: </strong><?php the_title(); ?><br />
                <?php
                  $productsIds = get_post_meta( get_the_ID(), 'products_associations', true );
                ?>
                <?php foreach($productsIds as $productId):
                    $_product = $_pf->get_product($productId);
                    if($_product->is_visible()):
                        
                    $image = null;
                    if ( has_post_thumbnail($productId) ){
                      $image_title 	= esc_attr( get_the_title( get_post_thumbnail_id($productId) ) );
                      $image_caption 	= get_post( $productId )->post_excerpt;
                      $image_link  	= wp_get_attachment_url( get_post_thumbnail_id($productId) );
                      $image       	= get_the_post_thumbnail( $productId, array( 150, 150 ), array(
                          'title'	=> $image_title,
                          'alt'	=> $image_title
                          ) );
                    }
                    ?>
                    <a href="<?php echo $_product->get_permalink( );?>">
                      <?php echo $image; ?>
                      <h3><?php echo $_product->get_title( );?></h3>
                    </a>
                    <span class="price"><span class="amount"><?php echo ($_product->get_price( ));?></span></span>
                <?php 
                    endif;
                endforeach; ?>
			</header>

			<!-- Display movie review contents -->
			<div class="entry-content"><?php the_content(); ?></div>
		</article>

	</div>
</div>
<?php wp_reset_query(); ?>
<?php //get_footer(); ?>
