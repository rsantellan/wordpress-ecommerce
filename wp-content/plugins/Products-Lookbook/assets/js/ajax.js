function submit_me(form){
	console.log(jQuery(form).serialize());
	jQuery.post(the_ajax_script.ajaxurl, jQuery(form).serialize()
	,
	function(response_from_the_action_function){
		jQuery("#response_area").html(response_from_the_action_function);
	}
	);
	return false;
}