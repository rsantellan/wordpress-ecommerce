<?php

/**
 * Create a jQuery slider control.
 * TODO: Migrate to an HTML5 range control. Range control are hard to style 'cause they don't display the value
 */
class Kirki_Controls_Slider_Control extends Kirki_Control {

	public $type = 'slider';

	public function enqueue() {
		wp_enqueue_script( 'jquery-ui' );
		wp_enqueue_script( 'jquery-ui-slider' );
	}

	public function render_content() { ?>
		<label>

			<?php $this->title(); ?>

			<input type="text" class="kirki-slider" id="input_<?php echo esc_attr($this->id); ?>" disabled value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?>/>

		</label>

		<div id="slider_<?php echo esc_attr($this->id); ?>" class="ss-slider"></div>
		<script>
		jQuery(document).ready(function($) {
			$( '[id="slider_<?php echo esc_js($this->id); ?>"]' ).slider({
					value : <?php echo esc_js($this->value()); ?>,
					min   : <?php echo esc_js($this->choices['min']); ?>,
					max   : <?php echo esc_js($this->choices['max']); ?>,
					step  : <?php echo esc_js($this->choices['step']); ?>,
					slide : function( event, ui ) { $( '[id="input_<?php echo esc_js($this->id); ?>"]' ).val(ui.value).keyup(); }
			});
			$( '[id="input_<?php echo esc_js($this->id); ?>"]' ).val( $( '[id="slider_<?php echo esc_js($this->id); ?>"]' ).slider( "value" ) );
		});
		</script>
		<?php

	}
}
