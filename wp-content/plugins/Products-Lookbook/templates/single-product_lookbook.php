<?php
 /*Template Name: New Template
 */
//get_header(); ?>
<?php
$_pf = new WC_Product_Factory();
?>
<div class="standard_wrapper">
    <div class="page_content_wrapper">
        <div class="inner">
            <div style="background-color: white;">
                <div style="padding-top:3%" class="one_half post_img">
                    <?php the_post_thumbnail( 'gallery_masonry' , array('style' => 'padding-top: 10%' , 'alt' => the_title('', '', false))); ?>
                </div>
                <div style="padding-top:20px" class="one_half last ">
                    <?php $productsIds = get_post_meta( get_the_ID(), 'products_associations', true );?>
                    <?php foreach($productsIds as $productId):
                        $_product = $_pf->get_product($productId);
                        if($_product->is_visible()):

                        $image = null;
                        if ( has_post_thumbnail($productId) ){
                          $image_title  = esc_attr( get_the_title( get_post_thumbnail_id($productId) ) );
                          $image_caption  = get_post( $productId )->post_excerpt;
                          $image_link   = wp_get_attachment_url( get_post_thumbnail_id($productId) );
                          $image        = get_the_post_thumbnail( $productId, array( 180, 180 ), array(
                              'title' => $image_title,
                              'alt' => $image_title
                              ) );
                        }
                        ?>
                        <div class="product-small one" style="padding-bottom: 20px; padding-top: 13%;">
                            <h3><?php echo $_product->get_title( );?></h3>
                        </div>
                        <div class="product-small one" style="padding-bottom: 20px; padding-top: 1%;">
                          <div class="product-image one_fourth" style="/*float: left; width: 19%*/ line-height: 30; vertical-align: middle;">
                            <?php echo $image; ?>
                          </div>
                          <div class="product-text one_half" style="/*float: left; width: 50%; text-align: center;*/ margin-right: 0% !important;">
                            <?php echo ($_product->get_post_data()->post_excerpt);?>
                            <hr/>
                            <span>
                            Precio: <strong><?php echo ($_product->get_price_html());?></strong>
                            </span>
                            <br/>
                            <a href="<?php echo ($_product->add_to_cart_url());?>" class="single_add_to_cart_button alt"><?php echo esc_html( $_product->single_add_to_cart_text() ); ?></a>
                          </div>
                          <div class="product-link one_fourth" style="/*float: right; width: 29%; vertical-align: middle; line-height: 250px;*/ margin-right: 0% !important;  line-height: 30; vertical-align: middle;">
                            <a href="<?php echo $_product->get_permalink( );?>" style="background-color: black; color: white; font-weight: bold; font-size: 10px; text-align: center; padding: 9px; text-decoration: none;"><?php echo strtoupper("Ver producto");?></a>
                          </div>
                        </div>
                        <div style="clear: both !important"></div>
                    <?php 
                        endif;
                    endforeach; ?>
                </div>
                <p><br class="clear"></p>
            </div>
        </div>
    </div>
</div>
</hr>
<div>
<!--
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="max-height: 600px; background-color: white; max-width: 80%; margin-left: 12%;">
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
          $image       	= get_the_post_thumbnail( $productId, array( 180, 180 ), array(
              'title'	=> $image_title,
              'alt'	=> $image_title
              ) );
        }
        ?>
        <div class="product-small" style="padding-bottom: 20px">
          <div class="product-image" style="float: left; width: 19%">
            <?php echo $image; ?>
          </div>
          <div class="product-text" style="float: left; width: 50%; text-align: center;">
            <h3><?php echo $_product->get_title( );?></h3>
            <hr/>
            <?php echo ($_product->get_post_data()->post_excerpt);?>
            <hr/>
            <span>
            <?php echo ($_product->get_price_html());?>
            </span>
            <br/>
            <a href="<?php echo ($_product->add_to_cart_url());?>" class="single_add_to_cart_button alt"><?php echo esc_html( $_product->single_add_to_cart_text() ); ?></a>
          </div>
          <div class="product-link" style="float: right; width: 29%; vertical-align: middle; line-height: 250px;">
            <a href="<?php echo $_product->get_permalink( );?>" style="background-color: black; color: white; font-weight: bold; font-size: 20px; text-align: center; padding: 9px; text-decoration: none;"><?php echo strtoupper("Ver producto");?></a>
          </div>
        </div>
        <div style="clear: both !important"></div>
    <?php 
        endif;
    endforeach; ?>
  </div>
</div>   
</div>
-->
<?php wp_reset_query(); ?>
