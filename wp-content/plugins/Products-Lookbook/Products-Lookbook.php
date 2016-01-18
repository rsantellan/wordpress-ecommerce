<?php
/*
Plugin Name: Products Lookbook
Plugin URI: http://rodrigosantellan.com
Description: Plugin that creates a custom lookbook asociated with woocommerce products
Version: 1.0
Author: Rodrigo Santellan
Author URI: http://rodrigosantellan.com
License: GPLv2
*/

add_action( 'init', 'create_product_lookbook' );

add_action( 'admin_init', 'my_admin' );

add_action( 'init', 'my_taxonomies_product_lookbook', 0 );

add_action( 'save_post', 'add_product_associations_fields', 10, 2 );

add_filter( 'template_include', 'include_template_function', 1 );

/**
 * 
 * Register post type hook
 * 
 */
function create_product_lookbook() {
    $labels = array(
                'name' => 'Lookbooks',
                'singular_name' => 'Item Lookbook',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Product Lookbook',
                'edit' => 'Edit',
                'edit_item' => 'Edit Product Lookbook',
                'new_item' => 'New Product Lookbook',
                'view' => 'View',
                'view_item' => 'View Product Lookbook',
                'search_items' => 'Search Product Lookbook',
                'not_found' => 'No Product Lookbook found',
                'not_found_in_trash' => 'No Product Lookbook found in Trash',
                'parent' => 'Parent Product Lookbook'
            );
    $args = array(
      'labels'        => $labels,
      'public' => true,
      'menu_position' => 15,
      'supports' => array( 'title', 'thumbnail', 'page-attributes'),
      'taxonomies' => array( '' ),
      'menu_icon' => 'menu-icon-galleries', // plugins_url( 'images/image.png', __FILE__ ),
      'has_archive' => true,
      'with_front' => true,
      //'rewrite' => array('slug' => 'plookbook'),
    );
    register_post_type( 'product_lookbook', $args );
}

/**
 * 
 * Register admin box
 */
function my_admin() {
	add_meta_box( 'product_lookbook_meta_box',
		'Productos asociados',
		'display_product_lookbook_meta_box',
		'product_lookbook', 'normal', 'high'
	);
}

/**
 * 
 * Register taxonomies.
 */
function my_taxonomies_product_lookbook() {
  $labels = array(
    'name'              => "Lookbooks",
    'singular_name'     => "Lookbook",
    'search_items'      => "Buscar lookbook",
    'all_items'         => "Mostrar todos",
    'parent_item'       => "Padre",
    'parent_item_colon' => "Padre: ",
    'edit_item'         => "Editar lookbook", 
    'update_item'       => "Actualizar lookbook",
    'add_new_item'      => "Agregar lookbook",
    'new_item_name'     => "Nombre",
    'menu_name'         => "Lookbooks",
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => false,
    'show_admin_column' => true,  
    'query_var' => true, // enable taxonomy-specific querying  
    'rewrite' => true // pretty permalinks for your taxonomy?
  );
  register_taxonomy( 'lookbook_category', 'product_lookbook', $args );
}

function add_product_associations_fields( $product_lookbook_id, $product_lookbook ) {
	// Check post type for movie reviews
	if ( $product_lookbook->post_type == 'product_lookbook' ) {
        if(isset($_POST['products_associations']) && is_array($_POST['products_associations']))
        {
          update_post_meta($product_lookbook_id, 'products_associations', array_map( 'strip_tags', $_POST['products_associations'] ) );
        }
        
	}
}

function display_product_lookbook_meta_box( $product_lookbook ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $products_associations =  get_post_meta( $product_lookbook->ID, 'products_associations', true );
    $values = array();
    foreach($products_associations as $association){
      $values[$association] = $association;
      
    }
    $args     = array( 'post_type' => 'product' );
    $products = get_posts( $args );
    ?>
    <table>
        <tr>
            <td style="width: 100%">Productos</td>
            <td>
              <select name="products_associations[]" multiple>
              <?php foreach($products as $product):?>
                <option value="<?php echo $product->ID;?>" <?php echo (isset($values[$product->ID])? 'selected="selected"' : '');?>><?php echo $product->post_title;?></option>
              <?php endforeach;?>
              </select>  
            </td>
        </tr>
        
    </table>
    <?php
}

function include_template_function( $template_path ) {
    $isTaxonomy = substr_count($template_path, 'taxonomy.php');
    if ( get_post_type() == 'product_lookbook' ) {
        
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-product_lookbook.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . 'templates/single-product_lookbook.php';
            }
            
        }else{
          if($isTaxonomy == 0)
          {
            if ( $theme_file = locate_template( array ( 'archive-product_lookbook.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . 'templates/archive-product_lookbook.php';
            }  
          }
          else
          {
            if ( $theme_file = locate_template( array ( 'taxonomy.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . 'templates/taxonomy.php';
            }
            $template_path = plugin_dir_path( __FILE__ ) . 'templates/taxonomy.php';
          }
          
        }
    }
    return $template_path;
}
