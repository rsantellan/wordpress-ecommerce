<?php
$loggedUser = wp_get_current_user();
?>
<form action="" method="POST" onsubmit="return submit_me(this);">
	<input type="hidden" value="update_user_extra_data" name="action" />
<label for="sizeheight">Altura</label>
<input type="text" class="required_field" name="sizeheight" id="sizeheight" value="<?php echo esc_attr( get_the_author_meta( 'sizeheight', $loggedUser->ID ) ); ?>">
<div style="clear:both !important;"></div>

<input type="submit" value="Guardar" />
</form>
<!--
    <form action="/wp-admin/admin-ajax.php" method="post" class="contact_form_wrapper" id="contact_form_14537295582040127114">
    	<input type="hidden" value="pp_contact_mailer" name="action" id="action">
    	<label for="your_name">Name *</label>
		<input type="text" placeholder="Name *" class="required_field" name="your_name" id="your_name">
		<div style="clear:both !important;"></div>
    				<label for="email">Email *</label>
    				<input type="text" placeholder="Email *" class="required_field email" name="email" id="email">
    				<label for="message">Message *</label>
    				<textarea placeholder="Message *" style="width:96%;" class="required_field" cols="10" rows="7" name="message" id="message"></textarea>
    				<br><br><div class="contact_submit_wrapper">
    	<input type="submit" value="Send" class="solidbg" name="contact_submit_btn14537295582040127114" id="contact_submit_btn14537295582040127114">
    </div>
</form>
-->