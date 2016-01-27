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
            <div style="background: rgba(255, 255, 255, 0.9);">
                <div style="padding-top:3%" class="one_half post_img">
                    <?php the_post_thumbnail( 'blog' , array('style' => 'padding-top: 10%' , 'alt' => the_title('', '', false))); ?>
                </div>
                <div style="padding-top:20px" class="one_half last ">
                    <?php $productsIds = get_post_meta( get_the_ID(), 'products_associations', true );?>
                    <?php 
                        $first = true;
                        foreach($productsIds as $productId):
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
                        <div class="product-small one" style="<?php if($first): ?>padding-top: 13%;<?php endif;?>">
                            <h5><?php echo $_product->get_title( );?></h5>
                        </div>
                        <div class="product-small one" style="padding-bottom: 20px; padding-top: 1%;">
                          <div class="product-image one_third" style="/*float: left; width: 19% line-height: 30; vertical-align: middle;*/">
                            <?php echo $image; ?>
                          </div>
                          <div class="product-text two_third" style="/*float: left; width: 50%; text-align: center;*/ margin-right: 0% !important;">
                            <?php echo ($_product->get_post_data()->post_excerpt);?>
                            <hr/>
                            <span>
                            Precio: <strong><?php echo ($_product->get_price_html());?></strong>
                            </span>
                            <br/>
                            <a href="?add-to-cart=<?php  echo $productId;?><?php //echo ($_product->add_to_cart_url()); echo $productId;?>" class="single_add_to_cart_button alt"><?php echo esc_html( $_product->single_add_to_cart_text() ); ?></a>
                            <br/>
                            <br/>
                            <a href="<?php echo $_product->get_permalink( );?>" style="background-color: black; color: white; font-weight: bold; font-size: 10px; text-align: center; padding: 9px; text-decoration: none;" class="floatright"><?php echo strtoupper("Ver producto");?></a>
                          </div>
                        </div>
                        <div style="clear: both !important"></div>
                    <?php 
                        endif;
                        $first = false;
                    endforeach; ?>
                </div>
                <p><br class="clear"></p>
            </div>
        </div>
    </div>
</div>
</hr>
<div>
<?php wp_reset_query(); ?>
