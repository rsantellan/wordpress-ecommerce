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

/*
add_action( 'show_user_profile', 'extra_profile_fields', 10 );
*/
add_action( 'edit_user_profile', 'extra_profile_fields', 10 );

/**
 * 
 * Register post type hook
 * 
 */
function create_product_lookbook() {
    $labels = array(
                'name' => 'Imagenes de Lookbook',
                'singular_name' => 'Imagen',
                'add_new' => 'Agregar nueva imagen',
                'add_new_item' => 'Agregar nueva imagen',
                'edit' => 'Edit',
                'edit_item' => 'Editar Image',
                'new_item' => 'Nueva Image',
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
      'menu_icon' => 'dashicons-images-alt2',//'menu-icon-galleries', // plugins_url( 'images/image.png', __FILE__ ),
      'has_archive' => true,
      'with_front' => true,
      'rewrite' => array('slug' => 'look-books'),
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
    'rewrite' => array('slug' => 'lookbook'), // pretty permalinks for your taxonomy?
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
    if(is_array($products_associations))
    {
      foreach($products_associations as $association){
        $values[$association] = $association;
      }
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

// Function for adding fields
function extra_profile_fields( $user ) { 

  ?>
<div class="hide_on_frontend">
 <h3><?php _e('Extra Profile Fields', 'frontendprofile'); ?></h3>
 <table class="form-table">
 <tr>
   <th><label for="gplus">Altura</label></th>
   <td>
      <?php echo esc_attr( get_user_meta( $user->ID, 'sizeheight', true) ); ?>
   </td>
 </tr>
 
 </table>
 </div>
<?php } // Function body ends



 wp_enqueue_script( 'my-ajax-handle', plugin_dir_url( __FILE__ ) . 'assets/js/ajax.js', array( 'jquery' ) );
 wp_localize_script( 'my-ajax-handle', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
 // THE AJAX ADD ACTIONS
 add_action( 'wp_ajax_update_user_extra_data', 'the_action_function' );
 //add_action( 'wp_ajax_nopriv_the_ajax_hook', 'the_action_function' ); // need this to serve non logged in users
 // THE FUNCTION
 function the_action_function(){
  $loggedUser = wp_get_current_user();
  $returnData = array();
  if(!$loggedUser)
  {
    $returnData['message'] = 'No estas logueado, vuelve a loguearte para editar tus datos';
  }
  else
  {
    $return = update_usermeta( $loggedUser->ID, 'sizeheight', $_POST['sizeheight'] );
    $returnData['message'] = 'Datos actualizados con exito.';
  }
  echo json_encode($returnData);
  die();
 }

 // ADD EG A FORM TO THE PAGE
 function user_extra_information_frontend(){
   $template_path = plugin_dir_path( __FILE__ ) . 'templates/_extradataform.php';
   ob_start();
   include_once($template_path);
   $form = ob_get_contents();
   ob_end_clean();
   return $form;
 }
 add_shortcode("extra_user_information_form", "user_extra_information_frontend");