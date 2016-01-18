<?php
 /*Template Name: New Template
 */
//get_header(); ?>
<div>
<?php
$_pf = new WC_Product_Factory();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="min-height: 705px;  background-color: white;">
  <div class="left-side" style="float: left; width: 50%;">
    <?php the_post_thumbnail( 'gallery_masonry' , array('alt' => the_title('', '', false))); ?>
  </div>
  <div class="right-side" style="float: left; width: 48%; background-color: white;">
    <?php $productsIds = get_post_meta( get_the_ID(), 'products_associations', true );?>
    <?php foreach($productsIds as $productId):
        $_product = $_pf->get_product($productId);
        if($_product->is_visible()):

        $image = null;
        if ( has_post_thumbnail($productId) ){
          $image_title 	= esc_attr( get_the_title( get_post_thumbnail_id($productId) ) );
          $image_caption 	= get_post( $productId )->post_excerpt;
          $image_link  	= wp_get_attachment_url( get_post_thumbnail_id($productId) );
          $image       	= get_the_post_thumbnail( $productId, array( 100, 100 ), array(
              'title'	=> $image_title,
              'alt'	=> $image_title
              ) );
        }
        ?>
        <div class="product-small" >
          <div class="product-image" style="float: left; width: 19%">
            <?php echo $image; ?>
          </div>
          <div class="product-text" style="float: left; width: 50%">
            <h3><?php echo $_product->get_title( );?></h3>
            <hr/>
            <?php echo ($_product->get_post_data()->post_excerpt);?>
            <hr/>
            <span>
            <?php echo ($_product->get_price( ));?>
            </span>
          </div>
          <div class="product-link" style="float: right; width: 29%; vertical-align: middle; line-height: 250px;">
            <a href="<?php echo $_product->get_permalink( );?>" style="background-color: black; color: white; font-weight: bold; font-size: 20px; text-align: center; padding: 9px; text-decoration: none;">Ver producto</a>
          </div>
        </div>
        <div style="clear: both !important"></div>
    <?php 
        endif;
    endforeach; ?>
  </div>
</div>   
</div>
<?php wp_reset_query(); ?>
