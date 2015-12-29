<?php

// A callback function to add a custom field to our "gallery categories" taxonomy
function gallerycat_taxonomy_custom_fields($tag) {

   // Check for existing taxonomy meta for the term you're editing
    $t_id = $tag->term_id; // Get the ID of the term you're editing
    $term_meta = get_option( "taxonomy_term_$t_id" ); // Do the check
?>

<tr class="form-field">
	<th scope="row" valign="top">
		<label for="gallerycat_template"><?php _e('Gallery Category Page Template', THEMEDOMAIN); ?></label>
	</th>
	<td>
		<select name="gallerycat_template" id="gallerycat_template">
			<?php
				//Get all gallery archive templates
				$tg_gallery_archive_templates = array(
					'gallery-archive-fullscreen' => 'Fullscreen',
					'gallery-archive-2-contained' => '2 Columns Contained', 
					'gallery-archive-3-contained' => '3 Columns Contained',
					'gallery-archive-4-contained' => '4 Columns Contained',
					'gallery-archive-2-wide' => '2 Columns Wide',
					'gallery-archive-3-wide' => '3 Columns Wide',
					'gallery-archive-4-wide' => '4 Columns Wide',
					'gallery-archive-parallax' => 'Parallax',
				);
				
				foreach($tg_gallery_archive_templates as $key => $tg_gallery_archive_template)
				{
			?>
			<option value="<?php echo esc_attr($key); ?>" <?php if($term_meta['gallerycat_template']==$key) { ?>selected<?php } ?>><?php echo esc_html($tg_gallery_archive_template); ?></option>
			<?php
				}
			?>
		</select>
		<br />
		<span class="description"><?php _e('Select page template for this gallery category', THEMEDOMAIN); ?></span>
	</td>
</tr>

<?php
}

// A callback function to save our extra taxonomy field(s)
function save_gallerycat_custom_fields( $term_id ) {
    if ( isset( $_POST['gallerycat_template'] ) ) {
        $t_id = $term_id;
        $term_meta = get_option( "taxonomy_term_$t_id" );

        if ( isset( $_POST['gallerycat_template'] ) ){
            $term_meta['gallerycat_template'] = $_POST['gallerycat_template'];
        }
        
        //save the option array
        update_option( "taxonomy_term_$t_id", $term_meta );
    }
}

// Add the fields to the "gallery categories" taxonomy, using our callback function
add_action( 'gallerycat_edit_form_fields', 'gallerycat_taxonomy_custom_fields', 10, 2 );

// Save the changes made on the "presenters" taxonomy, using our callback function
add_action( 'edited_gallerycat', 'save_gallerycat_custom_fields', 10, 2 );


// A callback function to add a custom field to our "gallery categories" taxonomy
function portfoliosets_taxonomy_custom_fields($tag) {

   // Check for existing taxonomy meta for the term you're editing
    $t_id = $tag->term_id; // Get the ID of the term you're editing
    $term_meta = get_option( "taxonomy_term_$t_id" ); // Do the check
?>

<tr class="form-field">
	<th scope="row" valign="top">
		<label for="portfoliosets_template"><?php _e('Portfolio Category Page Template', THEMEDOMAIN); ?></label>
	</th>
	<td>
		<select name="portfoliosets_template" id="portfoliosets_template">
			<?php
				//Get all gallery archive templates
				$tg_gallery_archive_templates = array(
					'portfolio-fullscreen' => 'Fullscreen',
					'portfolio-parallax' => 'Parallax',
					'portfolio-2-contained' => '2 Columns Contained',
					'portfolio-3-contained' => '3 Columns Contained',
					'portfolio-4-contained' => '4 Columns Contained',
					'portfolio-2-contained-classic' => '2 Columns Classic',
					'portfolio-3-contained-classic' => '3 Columns Classic',
					'portfolio-4-contained-classic' => '4 Columns Classic',
					'portfolio-2-wide' => '2 Columns Wide',
					'portfolio-3-wide' => '3 Columns Wide',
					'portfolio-4-wide' => '4 Columns Wide',
					'portfolio-5-wide' => '5 Columns Wide',
					'portfolio-2-wide-classic' => '2 Columns Wide Classic',
					'portfolio-3-wide-classic' => '3 Columns Wide Classic',
					'portfolio-4-wide-classic' => '4 Columns Wide Classic',
					'portfolio-3-wide-masonry' => 'Masonry',
					'portfolio-split-screen' => 'Split Screen',
					'portfolio-split-screen-wide' => 'Split Screen Wide',
					'portfolio-split-screen-masonry' => 'Split Screen Masonry',
				);
				
				foreach($tg_gallery_archive_templates as $key => $tg_gallery_archive_template)
				{
			?>
			<option value="<?php echo esc_attr($key); ?>" <?php if($term_meta['portfoliosets_template']==$key) { ?>selected<?php } ?>><?php echo esc_html($tg_gallery_archive_template); ?></option>
			<?php
				}
			?>
		</select>
		<br />
		<span class="description"><?php _e('Select page template for this gallery category', THEMEDOMAIN); ?></span>
	</td>
</tr>

<?php
}

// A callback function to save our extra taxonomy field(s)
function save_portfoliosets_custom_fields( $term_id ) {
    if ( isset( $_POST['portfoliosets_template'] ) ) {
        $t_id = $term_id;
        $term_meta = get_option( "taxonomy_term_$t_id" );

        if ( isset( $_POST['portfoliosets_template'] ) ){
            $term_meta['portfoliosets_template'] = $_POST['portfoliosets_template'];
        }
        
        //save the option array
        update_option( "taxonomy_term_$t_id", $term_meta );
    }
}

// Add the fields to the "portfolio categories" taxonomy, using our callback function
add_action( 'portfoliosets_edit_form_fields', 'portfoliosets_taxonomy_custom_fields', 10, 2 );

// Save the changes made on the "presenters" taxonomy, using our callback function
add_action( 'edited_portfoliosets', 'save_portfoliosets_custom_fields', 10, 2 );


function pp_tag_cloud_filter($args = array()) {
   $args['smallest'] = 13;
   $args['largest'] = 13;
   $args['unit'] = 'px';
   return $args;
}

add_filter('widget_tag_cloud_args', 'pp_tag_cloud_filter', 90);

//Control post excerpt length
function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 200 );

//Customise Widget Title Code
add_filter( 'dynamic_sidebar_params', 'tg_wrap_widget_titles', 1 );
function tg_wrap_widget_titles( array $params ) 
{
	$widget =& $params[0];
	$widget['before_title'] = '<h2 class="widgettitle"><span>';
	$widget['after_title'] = '</span></h2>';
	
	return $params;
}

/**
 * Change default fields, add placeholder and change type attributes.
 *
 * @param  array $fields
 * @return array
 */
add_filter( 'comment_form_default_fields', 'wpse_62742_comment_placeholders' );
 
function wpse_62742_comment_placeholders( $fields )
{
    $fields['author'] = str_replace('<input', '<input placeholder="'. __('Name', THEMEDOMAIN). '*"',$fields['author']);
    $fields['email'] = str_replace('<input id="email" name="email" type="text"', '<input type="email" placeholder="'.__('Email', THEMEDOMAIN).'*"  id="email" name="email"',$fields['email']);
    $fields['url'] = str_replace('<input id="url" name="url" type="text"', '<input placeholder="'.__('Website', THEMEDOMAIN).'" id="url" name="url" type="url"',$fields['url']);

    return $fields;
}

//Make widget support shortcode
add_filter('widget_text', 'do_shortcode');

//Add upload form to page
if (is_admin()) {
  $current_admin_page = substr(strrchr($_SERVER['PHP_SELF'], '/'), 1, -4);

  if ($current_admin_page == 'post' || $current_admin_page == 'post-new')
  {
 
    /** Need to force the form to have the correct enctype. */
    function add_post_enctype() {
      echo "<script type=\"text/javascript\">
        jQuery(document).ready(function(){
        jQuery('#post').attr('enctype','multipart/form-data');
        jQuery('#post').attr('encoding', 'multipart/form-data');
        });
        </script>";
    }
 
    add_action('admin_head', 'add_post_enctype');
  }
}

// remove version query string from scripts and stylesheets
function wcs_remove_script_styles_version( $src ){
    return remove_query_arg( 'ver', $src );
}
add_filter( 'script_loader_src', 'wcs_remove_script_styles_version' );
add_filter( 'style_loader_src', 'wcs_remove_script_styles_version' );
?>