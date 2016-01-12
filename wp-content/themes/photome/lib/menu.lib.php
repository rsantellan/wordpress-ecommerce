<?php
/*
 *  Setup main navigation menu
 */
add_action( 'init', 'register_my_menu' );
function register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu', THEMEDOMAIN ) );
	register_nav_menu( 'top-menu', __( 'Top Bar Menu', THEMEDOMAIN ) );
	register_nav_menu( 'side-menu', __( 'Side (Mobile) Menu', THEMEDOMAIN ) );
	register_nav_menu( 'footer-menu', __( 'Footer Menu', THEMEDOMAIN ) );
}

class tg_walker extends Walker_Nav_Menu {

	private $counter = 0;
	function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
        
		if($this->counter == 3)
		{
			$tg_retina_logo = kirki_get_option('tg_retina_logo');
			if(!empty($tg_retina_logo))
    	    {
				$output .= '<li class="menu-item menu-item-type-custom menu-item-object-custom" id="menu-item-image" style="display: none !important"> ';
				$output .= '<a href="'.home_url ().'" style="padding-top: 13px; padding-bottom: 13px;">';
				$output .= '<img src="'.esc_url($tg_retina_logo).'" alt="'.esc_attr(get_bloginfo('name')).'" width="154"/>';
				$output .= '</a></li>';	
    	    }
			
		}
        $id_field = $this->db_fields['id'];
        //var_dump($this->counter);
        if (!empty($children_elements[$element->$id_field])) { 
            $element->classes[] = 'arrow'; //enter any classname you like here!
        }
        
        Walker_Nav_Menu::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
        $this->counter++;
    }
}

class tg_description_walker extends Walker_Nav_Menu
{
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	    parent::start_el($output, $item, $depth, $args);
	    
	    if(!empty($item->description))
	    {
	    	$output .= sprintf('<i>%s</i>', esc_html($item->description));
	    }
	}
}
?>