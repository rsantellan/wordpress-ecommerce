// implement JSON.stringify serialization
JSON.stringify = JSON.stringify || function (obj) {
    var t = typeof (obj);
    if (t != "object" || obj === null) {
        // simple data type
        if (t == "string") obj = '"'+obj+'"';
        return String(obj);
    }
    else {
        // recurse array or object
        var n, v, json = [], arr = (obj && obj.constructor == Array);
        for (n in obj) {
            v = obj[n]; t = typeof(v);
            if (t == "string") v = '"'+v+'"';
            else if (t == "object" && v !== null) v = JSON.stringify(v);
            json.push((arr ? "" : '"' + n + '":') + String(v));
        }
        return (arr ? "[" : "{") + String(json) + (arr ? "]" : "}");
    }
};

function removeSortRecord(thisParentLi, targetObj)
{
	jQuery('li#'+thisParentLi+'_sort').remove();
	var order = jQuery('#'+targetObj).sortable('toArray');
    jQuery('#'+targetObj+'_data').val(order);
}

function ppbBuildItem()
{
	jQuery("#content_builder_sort li a.ppb_remove").on( 'click', function(){
	    jQuery(this).parent('li').remove();
	});
	
	jQuery("#content_builder_sort li a.ppb_plus").on( 'click', function(){
	    var currentSize = jQuery(this).parent('div').parent('li').attr('data-current-size');

	    var prev1Li = jQuery(this).parent('div').parent('li').prev();
	    var prev2Li = prev1Li.prev();
	    var prev3Li = prev2Li.prev();
	    
	    if(currentSize == 'one_fourth' || currentSize == 'one_fourth last')
	    {
	    	if(prev1Li.attr('data-current-size')=='one_third' && prev2Li.attr('data-current-size')=='one_third')
	    	{
	    		jQuery(this).parent('div').parent('li').addClass('one_third');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'one_third last');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'one_third last');	

	    	}
	    	else if(prev1Li.attr('data-current-size')=='two_third')
	    	{
	    		jQuery(this).parent('div').parent('li').addClass('one_third');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'one_third last');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'one_third last');	

	    	}
	    	else
	    	{
		    	jQuery(this).parent('div').parent('li').addClass('one_third');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'one_third');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'one_third');	
	    	}
	    	
	    	jQuery(this).parent('div').parent('li').removeClass('one_fourth');
	    }
	    else if(currentSize == 'one_third' || currentSize == 'one_third last')
	    {	
	    	if(prev1Li.attr('data-current-size')=='one_half')
	    	{
	    		jQuery(this).parent('div').parent('li').addClass('one_half');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'one_half last');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'one_half last');	

	    	}
	    	else
	    	{
		    	jQuery(this).parent('div').parent('li').addClass('one_half');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'one_half');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'one_half');	
	    	}
	    	
	    	jQuery(this).parent('div').parent('li').removeClass('one_third');
	    }
	    else if(currentSize == 'one_half' || currentSize == 'one_half last')
	    {
	    	if(prev1Li.attr('data-current-size')=='one_third')
	    	{
	    		jQuery(this).parent('div').parent('li').addClass('two_third');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'two_third last');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'two_third last');	
	    	}
	    	else
	    	{
		    	jQuery(this).parent('div').parent('li').addClass('two_third');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'two_third');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'two_third');	
	    	}

	    	jQuery(this).parent('div').parent('li').removeClass('one_half');
	    }
	    else if(currentSize == 'two_third' || currentSize == 'two_third last')
	    {
	    	jQuery(this).parent('div').parent('li').addClass('one');
	    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'one');
	    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'one');
	    	jQuery(this).parent('div').parent('li').removeClass('two_third');
	    }
	    else if(currentSize == 'one')
	    {
	    	return false;
	    }
	    else
	    {
	    	return false;
	    }
	});
	
	jQuery("#content_builder_sort li a.ppb_minus").on( 'click', function(){
	    var currentSize = jQuery(this).parent('div').parent('li').attr('data-current-size');
	    var prev1Li = jQuery(this).parent('div').parent('li').prev();
	    var prev2Li = prev1Li.prev();
	    var prev3Li = prev2Li.prev();
	    
	    if(currentSize == 'one_fourth' || currentSize == 'one_fourth last')
	    {
	    	return false;
	    }
	    else if(currentSize == 'one_third' || currentSize == 'one_third last')
	    {
	    	if(prev1Li.attr('data-current-size')=='one_fourth' && prev2Li.attr('data-current-size')=='one_fourth' && prev3Li.attr('data-current-size')=='one_fourth')
	    	{
	    		jQuery(this).parent('div').parent('li').addClass('one_fourth');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'one_fourth last');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'one_fourth last');
	    	}
	    	else
	    	{
		    	jQuery(this).parent('div').parent('li').addClass('one_fourth');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'one_fourth');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'one_fourth');
	    	}
	    	
	    	jQuery(this).parent('div').parent('li').removeClass('one_third');
	    }
	    else if(currentSize == 'one_half' || currentSize == 'one_half last')
	    {
	    	if(prev1Li.attr('data-current-size')=='one_third' && prev2Li.attr('data-current-size')=='one_third')
	    	{
	    		jQuery(this).parent('div').parent('li').addClass('one_third');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'one_third last');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'one_third last');	

	    	}
	    	else if(prev1Li.attr('data-current-size')=='two_third')
	    	{
	    		jQuery(this).parent('div').parent('li').addClass('one_third');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'one_third last');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'one_third last');	

	    	}
	    	else
	    	{
		    	jQuery(this).parent('div').parent('li').addClass('one_third');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'one_third');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'one_third');	
	    	}
	    	
	    	jQuery(this).parent('div').parent('li').removeClass('one_half');
	    }
	    else if(currentSize == 'two_third' || currentSize == 'two_third last')
	    {
	    	if(prev1Li.attr('data-current-size')=='one_half')
	    	{
	    		jQuery(this).parent('div').parent('li').addClass('one_half');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'one_half last');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'one_half last');	

	    	}
	    	else
	    	{
		    	jQuery(this).parent('div').parent('li').addClass('one_half');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'one_half');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'one_half');	
	    	}
	    	
	    	jQuery(this).parent('div').parent('li').removeClass('two_third');
	    }
	    else if(currentSize == 'one')
	    {
	    	if(prev1Li.attr('data-current-size')=='one_third')
	    	{
	    		jQuery(this).parent('div').parent('li').addClass('two_third');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'two_third last');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'two_third last');	
	    	}
	    	else
	    	{
		    	jQuery(this).parent('div').parent('li').addClass('two_third');
		    	jQuery(this).parent('div').parent('li').attr('data-current-size', 'two_third');
		    	jQuery(this).parent('div').parent('li').find('.ppb_setting_columns').attr('value', 'two_third');	
	    	}
	    	
	    	jQuery(this).parent('div').parent('li').removeClass('one');
	    }
	    else
	    {
	    	return false;
	    }
	});
	
	jQuery(".pp_fancybox").fancybox({
	    maxWidth	: 700,
	    maxHeight	: 900,
	    autoSize	: false,
	    closeClick	: false,
	    openEffect	: 'none',
	    closeEffect	: 'none',
	    helpers : {
	    	overlay : {
	            css : {
	                'background-color' : 'rgba(0, 0, 0, 0.7)'
	            }
	        }
	    },
	    onCancel: function(current, previous) {
	    	jQuery("textarea.ppb_input").each(function(){
				tinymce.EditorManager.execCommand( 'mceRemoveEditor', false, jQuery(this).attr('id') );	
			});
	    
	    	jQuery('#ppb_inline_current').attr('value', '');
	    }
	});
	
	jQuery("#content_builder_sort li a.ppb_edit").on( 'click', function(e){
		e.preventDefault();
		jQuery('#ppb_inline_current').attr('value', jQuery(this).attr('data-rel'));
		
		jQuery.fancybox.showLoading();
		var actionURL = jQuery(this).attr('href');
		
		jQuery.ajax({
	      type: "GET",
	      cache: false,
	      url: actionURL,
	      data: '',
	      success: function (data) {
	        jQuery.fancybox(data, {
	          fitToView: false,
	          width: 700,
	          minHeight: '100%',
	          autoSize: false,
	          autoResize: true,
	          autoHeight: true,
	          closeClick: false,
	          openEffect: 'none',
	          closeEffect: 'none',
	          padding: 0,
			  beforeClose: function(current, previous) {
			    jQuery("textarea.ppb_input").each(function(){
				    tinymce.EditorManager.execCommand( 'mceRemoveEditor', false, jQuery(this).attr('id') );	
				});
			    
			    jQuery('#ppb_inline_current').attr('value', '');
			  }
	        }); 
	      } 
	    });
	    
	    return false;
	});
}

jQuery(document).ready(function(){

    jQuery('#current_sidebar li a.sidebar_del').on( 'click', function(){
    	if(confirm('Are you sure you want to delete this sidebar? (this can not be undone)'))
    	{
    		sTarget = jQuery(this).attr('href');
    		sSidebar = jQuery(this).attr('rel');
    		objTarget = jQuery(this).parent('li');
    		
    		jQuery.ajax({
        		type: 'POST',
        		url: sTarget,
        		data: 'sidebar_id='+sSidebar,
        		success: function(msg){ 
        			objTarget.fadeOut();
        			setTimeout(function() {
                      location.reload();
                    }, 1000);
        		}
        	});
    	}
    	
    	return false;
    });
    
    jQuery('#current_ggfont li a.ggfont_del').on( 'click', function(){
	    if(confirm('Are you sure you want to delete this font? (this can not be undone)'))
	    {
	    	sTarget = jQuery(this).attr('href');
	    	sGGFont = jQuery(this).attr('rel');
	    	objTarget = jQuery(this).parent('li');
	    	
	    	jQuery.ajax({
  	    		type: 'POST',
  	    		url: sTarget,
  	    		data: 'ggfont='+sGGFont,
  	    		success: function(msg){ 
  	    			objTarget.fadeOut();
  	    		}
	    	});
	    }
	    
	    return false;
	});
    
    jQuery('a.image_del').on( 'click', function(){
    	if(confirm('Are you sure you want to delete this image? (this can not be undone)'))
    	{
    		sTarget = jQuery(this).attr('href');
    		sFieldId = jQuery(this).attr('rel');
    		objTarget = jQuery('#'+sFieldId+'_wrapper');
    		
    		jQuery.ajax({
        		type: 'POST',
        		url: sTarget,
        		data: 'field_id='+sFieldId,
        		success: function(msg){ 
        			objTarget.fadeOut();
        			jQuery('#'+sFieldId).val('');
        		}
        	});
    	}
    	
    	return false;
    });
    
    jQuery('#pp_export_current_button').on( 'click', function(){
    	jQuery('#pp_export_current').val(1);
    });
    
    jQuery('#ppb_export_current_button').on( 'click', function(){
    	jQuery('#ppb_export_current').val(1);
    });
    
    jQuery('#ppb_import_current_button').on( 'click', function(){
    	jQuery('#ppb_import_current').val(1);
    });
    
    jQuery('#pp_advance_clear_cache').on( 'click', function(){
    	if(confirm('Are you sure you want to clear all cache'))
    	{
    		sTarget = jQuery(this).attr('href');
    		
    		jQuery.ajax({
        		type: 'POST',
        		url: sTarget,
        		data: 'method=clear_cache',
        		success: function(msg){ 
        			jQuery('#pp_advance_clear_cache').html('Cache files were successfully cleared.');
        			jQuery('#pp_advance_clear_cache').attr("disabled", "disabled");
        		}
        	});
    	}
    	
    	return false;
    });
    
    jQuery('#pp_panel a').on( 'click', function(){
    	jQuery('#pp_panel a').removeClass('nav-tab-active');
    	jQuery(this).addClass('nav-tab-active');
    	
    	jQuery('.rm_section').css('display', 'none');
    	jQuery(jQuery(this).attr('href')).fadeIn();
    	jQuery('#current_tab').val(jQuery(this).attr('href'));
    	
    	return false;
    });
    
    jQuery('.color_picker').each(function()
	{	
	    var inputID = jQuery(this).attr('id');
	    
	    jQuery(this).ColorPicker({
	    	color: jQuery(this).val(),
	    	onShow: function (colpkr) {
	    		jQuery(colpkr).fadeIn(200);
	    		return false;
	    	},
	    	onHide: function (colpkr) {
	    		jQuery(colpkr).fadeOut(200);
	    		return false;
	    	},
	    	onChange: function (hsb, hex, rgb, el) {
	    		jQuery('#'+inputID).val('#' + hex);
	    		jQuery('#'+inputID+'_bg').css('backgroundColor', '#' + hex);
	    	}
	    });	
	    
	    jQuery(this).css('float', 'left');
	});
    
    jQuery('.iphone_checkboxes').iCheck({
		    checkboxClass: 'icheckbox_flat-green',
		    radioClass: 'iradio_flat-green'
		  });
		
	jQuery('.rm_section').css('display', 'none');
    
    if(self.document.location.hash != '')
	{
	    jQuery('html, body').animate({scrollTop:0}, 'fast');
	    jQuery('.nav-tab').removeClass('nav-tab-active');
	    jQuery('a'+self.document.location.hash+'_a').addClass('nav-tab-active');
	    jQuery('div'+self.document.location.hash).css('display', 'block');
	    jQuery('#current_tab').val(self.document.location.hash);
	}
	else
	{
	    jQuery('div#pp_panel_general').css('display', 'block');
	}
    
    jQuery( ".pp_sortable" ).sortable({
	    placeholder: "ui-state-highlight",
	    create: function(event, ui) { 
	    	myCheckRel = jQuery(this).attr('rel');
	    
	    	var order = jQuery(this).sortable('toArray');
        	jQuery('#'+myCheckRel).val(order);
	    },
	    update: function(event, ui) {
	    	myCheckRel = jQuery(this).attr('rel');
	    
	    	var order = jQuery(this).sortable('toArray');
        	jQuery('#'+myCheckRel).val(order);
	    }
	});
	jQuery( ".pp_sortable" ).disableSelection();
	
	jQuery(".pp_checkbox input").change(function(){
	    myCheckId = jQuery(this).val();
	    myCheckRel = jQuery(this).attr('rel');
	    myCheckTitle = jQuery(this).attr('alt');
	    
	    if (jQuery(this).is(':checked')) { 
	    	jQuery('#'+myCheckRel).append('<li id="'+myCheckId+'_sort" class="ui-state-default">'+myCheckTitle+'</li>');
	    } 
	    else
	    {
	    	jQuery('#'+myCheckId+'_sort').remove();
	    }

	    var order = jQuery('#'+myCheckRel).sortable('toArray');

        jQuery('#'+myCheckRel+'_data').val(order);
	});
	
	jQuery(".pp_sortable_button").on( 'click', function(){
	    var targetSelect = jQuery('#'+jQuery(this).attr('data-rel'));
	    
	    myCheckId = targetSelect.find("option:selected").val();
	    myCheckRel = targetSelect.find("option:selected").attr('data-rel');
	    myCheckTitle = targetSelect.find("option:selected").attr('title');

	    if (jQuery('#'+myCheckRel).children('li#'+myCheckId+'_sort').length == 0)
	    {
	    	jQuery('#'+myCheckRel).append('<li id="'+myCheckId+'_sort" class="ui-state-default"><div class="title">'+myCheckTitle+'</div><a data-rel="'+myCheckRel+'" href="javascript:removeSortRecord(\''+myCheckId+'\', \''+myCheckRel+'\');" class="remove">x</a><br style="clear:both"/></li>');
	    	//jQuery('#'+myCheckId+'_sort').remove();
	    	
	    	var order = jQuery('#'+myCheckRel).sortable('toArray');
        	jQuery('#'+myCheckRel+'_data').val(order);
        }
        else
        {
        	alert('You have already added "'+myCheckTitle+'"');
        }
	});
	
	jQuery(".pp_sortable li a.remove").on( 'click', function(){
	    jQuery(this).parent('li').remove();
	    var order = jQuery('#'+jQuery(this).attr('data-rel')).sortable('toArray');
        jQuery('#'+jQuery(this).attr('data-rel')+'_data').val(order);
	});
    
    jQuery(".pp_font").change(function(){
    	var valueElement = jQuery(this).data('value');
    	var sampleElement = jQuery(this).data('sample');
    	jQuery("#"+valueElement).attr('value', jQuery(this).children("option:selected").attr('data-family'));
    
    	var ppGGFont = 'http://fonts.googleapis.com/css?family='+jQuery(this).val();
    	jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+valueElement+'" href="'+ppGGFont+'" type="text/css" media="all">');
    	
    	if(jQuery(this).children("option:selected").attr('data-family') != '')
    	{
    		jQuery('#'+sampleElement).css('font-family', '"'+jQuery(this).children("option:selected").attr('data-family')+'"');
    	}
    });
    
    jQuery(".pp_font").each(function(){
    	jQuery(this).trigger('change');
    });
    
    jQuery('#ppb_tab').tabs();
        
    var formfield = '';
	
	jQuery('.metabox_upload_btn').on( 'click', function() {
	    jQuery('.fancybox-overlay').css('visibility', 'hidden');
	    jQuery('.fancybox-wrap').css('visibility', 'hidden');
     	formfield = jQuery(this).attr('rel');
	    
	    var send_attachment_bkp = wp.media.editor.send.attachment;
	    wp.media.editor.send.attachment = function(props, attachment) {
	     	jQuery('#'+formfield).attr('value', attachment.url);
	
	        wp.media.editor.send.attachment = send_attachment_bkp;
	        jQuery('.fancybox-overlay').css('visibility', 'visible');
	     	jQuery('.fancybox-wrap').css('visibility', 'visible');
	    }
	
	    wp.media.editor.open();
     	return false;
    });
    
    jQuery("input.upload_text").on( 'click', function() { jQuery(this).select(); } );
	
	ppbBuildItem();
	
	jQuery("#ppb_sortable_add_button").on( 'click', function(){
	    var targetSelect = jQuery('#ppb_options');
	    var targetTitle = jQuery('#ppb_options_title');
	    var targetType = jQuery('#ppb_module_'+targetSelect.val()).data('type');
	    
	    randomId = jQuery.now();
	    myCheckId = targetSelect.val();
	    myCheckTitle = targetTitle.val();
	    postType = jQuery('#ppb_post_type').val();
	    
	    if(typeof targetType === 'undefined'){
			targetType = 'module'; 
		};
	    
	    //If select content builder module
	    if(myCheckId != '' && targetType == 'module')
	    {
	    	var builderItemData = {};
	    	builderItemData.id = randomId;
	    	builderItemData.shortcode = myCheckId;
	    	builderItemData.ppb_text_title = myCheckTitle;
	    	builderItemData.ppb_text_content = '';
	    	builderItemData.ppb_header_content = '';
	    	var builderItemDataJSON = JSON.stringify(builderItemData);
	
	    	builderItem = '<li id="'+randomId+'" class="ui-state-default one '+myCheckId+'" data-current-size="one">';
	    	builderItem+= '<div class="size"><a href="javascript:;" class="ppb_plus button">+</a>';
	    	builderItem+= '<a href="javascript:;" class="ppb_minus button">-</a></div>';
	    	builderItem+= '<div class="title">'+myCheckTitle+'</div>';
	    	builderItem+= '<a href="javascript:;" class="ppb_remove">x</a>';
	    	
	    	var editURL = tgAjax.ajaxurl+'?action=pp_ppb&ppb_post_type='+postType+'&shortcode='+myCheckId+'&rel='+randomId+'&width=800&height=900';
	    	
	    	builderItem+= '<a data-rel="'+randomId+'" href="'+editURL+'" class="thickbox ppb_edit"></a>';
	    	builderItem+= '<input type="hidden" class="ppb_setting_columns" value="one_fourth"/>';
	    	builderItem+= '</li>';
	
	    	jQuery('#content_builder_sort').append(builderItem);
	    	jQuery('#content_builder_sort').removeClass('empty');
	    	ppbBuildItem();
	    	jQuery('#'+randomId).data('ppb_setting', builderItemDataJSON);
	    	
	    	var prev1Li = jQuery('#'+randomId).prev();
	        var prev2Li = prev1Li.prev();
	        var prev3Li = prev2Li.prev();
	        
	        if(prev1Li.attr('data-current-size')=='one_third' && prev2Li.attr('data-current-size')=='one_third')
	    	{
	        	jQuery('#'+randomId).attr('data-current-size', 'one_third last');
	        	jQuery('#'+randomId).find('.ppb_setting_columns').attr('value', 'one_third last');	
	
	    	}
	    	
	    	if(myCheckId!='ppb_divider' && myCheckId!='ppb_empty_line')
	    	{
	    		jQuery('#'+randomId).find('.ppb_edit').trigger('click');
	    	}
	    }
	    else if(myCheckId != '' && targetType == 'demo_page')
	    {
	    	if(confirm('Are you sure you want to import this demo page. All current content builder data for this page will be overwrite? (this can not be undone)'))
			{
			    jQuery('#ppb_import_current').val(1);
			    
			    var demoPageFile = jQuery('#ppb_module_'+targetSelect.val()).data('file');
			    
			    jQuery('#ppb_import_demo_file').val(demoPageFile);
			    jQuery('#ppb_import_current_button').trigger('click');
			}
	    }
	    
	    return false;
	});
	
	jQuery('#publish').on( 'click', function(){
		jQuery(window).unbind('beforeunload');
		
		//Check all elements size again
		jQuery("#content_builder_sort > li").each(function(){
		    var currentSize = jQuery(this).attr('data-current-size');
	
		    var prev1Li = jQuery(this).prev();
		    var prev2Li = prev1Li.prev();
		    var prev3Li = prev2Li.prev();
		    
		    if(currentSize == 'one_fourth' && prev1Li.attr('data-current-size')=='one_fourth' && prev2Li.attr('data-current-size')=='one_fourth' && prev3Li.attr('data-current-size')=='one_fourth')
		    {
			    jQuery(this).attr('data-current-size', 'one_fourth last');
			    jQuery(this).find('.ppb_setting_columns').attr('value', 'one_fourth last');
	
		    }
		    else if(currentSize == 'one_third')
		    {	
		    	if(prev1Li.attr('data-current-size')=='one_third' && prev2Li.attr('data-current-size')=='one_third' )
		    	{
		    		jQuery(this).attr('data-current-size', 'one_third last');
					jQuery(this).find('.ppb_setting_columns').attr('value', 'one_third last');
	
		    	}
		    	else if(prev1Li.attr('data-current-size')=='two_third')
		    	{
			    	jQuery(this).attr('data-current-size', 'one_third last');
					jQuery(this).find('.ppb_setting_columns').attr('value', 'one_third last');	
		    	}
		    }
		    else if(currentSize == 'one_half' && prev1Li.attr('data-current-size')=='one_half')
		    {
		    	jQuery(this).attr('data-current-size', 'one_half last');
			    jQuery(this).find('.ppb_setting_columns').attr('value', 'one_half last');
		    }
		    else if(currentSize == 'two_third' && prev1Li.attr('data-current-size')=='one_third')
		    {
		    	jQuery(this).attr('data-current-size', 'two_third last');
			    jQuery(this).find('.ppb_setting_columns').attr('value', 'two_third last');
		    }
		});
	
	    jQuery("#content_builder_sort > li").each(function(){
	    	jQuery(this).append('<textarea style="display:none" id="'+jQuery(this).attr('id')+'_data" name="'+jQuery(this).attr('id')+'_data">'+jQuery(this).data('ppb_setting')+'</textarea>');
	    	jQuery(this).append('<input style="display:none" type="text" id="'+jQuery(this).attr('id')+'_size" name="'+jQuery(this).attr('id')+'_size" value="'+jQuery(this).attr('data-current-size')+'"/>');
	    });
	    
	    var itemOrder = jQuery("#content_builder_sort").sortable('toArray');
	    jQuery('#ppb_form_data_order').attr('value', itemOrder);
	})
	
	jQuery( ".ppb_sortable" ).sortable({
	    start: function(event, ui) {
	        
	    },
	    stop: function(event, ui) {
	        
	    }
	});
	
	jQuery( ".ppb_sortable" ).disableSelection();
	
	jQuery(window).scroll(function(){
	    if(jQuery(this).scrollTop() >= 100){
	    	jQuery('.header_wrap').addClass('fixed');
	    }
	    else if(jQuery(this).scrollTop() < 100)
	    {
	        jQuery('.header_wrap').removeClass('fixed');
	    }
	});
	
	jQuery('input[title!=""]').hint();
	jQuery('textarea[title!=""]').hint();
	
	jQuery('#ppb_enable').on('ifToggled', function(event){
	    jQuery(this).on('ifChecked', function(event){
	      	jQuery('#postdivrich').hide();
	      	jQuery('#preview-action').hide();
	      	
	      	jQuery('#page_template').val('default');
	      	jQuery('#page_template').attr('disabled','disabled');
	    });
	    
	    jQuery(this).on('ifUnchecked', function(event){
	      	jQuery('#postdivrich').show();
	      	jQuery('#preview-action').show();
	      	jQuery('#page_template').removeAttr('disabled','disabled');
	    });
	});
	
	jQuery('#pp_import_default_button').on( 'click', function(){
	    jQuery('#pp_import_default').val(1);
	});
	
	jQuery('#import_demo li').on( 'click', function(){
	    jQuery('#import_demo li').removeClass('selected');
	    jQuery(this).addClass('selected');
	    
	    var selectedDemo = jQuery(this).data('demo');
	    jQuery('#pp_import_demo').val(selectedDemo);
	});
	
	jQuery('#import_demo_content li').on( 'click', function(){
	    jQuery('#import_demo_content li').removeClass('selected');
	    jQuery(this).addClass('selected');
	    
	    var selectedDemo = jQuery(this).data('demo');
	    jQuery('#pp_import_demo_content').val(selectedDemo);
	});
	
	jQuery('#pp_import_content_button').on( 'click', function(){
		if(jQuery('#pp_import_demo_content').val()=='')
		{
			alert('Please select demo content you want to import');
			return false;
		}
	
	    import_true = confirm('Are you sure to import demo content? it will overwrite the existing data');
        if(import_true == false) return;

        jQuery('.import_message').show();
        jQuery(this).hide();
       
        var data = {
            'action': 'pp_import_demo_content',
            'demo': jQuery('#pp_import_demo_content').val()
        };

        jQuery.post(ajaxurl, data, function(response) {
            jQuery('.import_message').html('<div class="import_message_success">All done. Have fun!</div>');
        });
	});
	
	jQuery('#ppb_module_wrapper li').on( 'click', function(){
		jQuery('#ppb_module_wrapper li').removeClass('selected');
		jQuery(this).addClass('selected');
		
		var moduleSelectedId = jQuery(this).data('module');
		var moduleSelectedTitle = jQuery(this).data('title');
		
		jQuery('#ppb_options').val(moduleSelectedId);
		jQuery('#ppb_options_title').val(moduleSelectedTitle);
	});
	
	jQuery('#pp_theme_go_update_bth').on( 'click', function(){
		update_true = confirm('Are you sure to update the theme?');
        if(update_true == false) return;

        jQuery('.update_message').show();
        jQuery(this).hide();
       
        var data = {
            'action': 'pp_update_theme'
        };

        jQuery.post(ajaxurl, data, function(response) {
            jQuery('.update_message').html('<div class="update_message_success">'+ response +'</div>');
        });
	});
	
	//Custom functions for handle project options box
	var portfolioType = jQuery('#portfolio_type').val();
	switch(portfolioType) 
	{
	    case 'Vimeo Video':
	        jQuery('#post_option_portfolio_video_id').show();
	        jQuery('#post_option_portfolio_mp4_url').hide();
	        jQuery('#post_option_portfolio_link_url').hide();
	    break;
	    
	    case 'Youtube Video':
	        jQuery('#post_option_portfolio_video_id').show();
	        jQuery('#post_option_portfolio_mp4_url').hide();
	        jQuery('#post_option_portfolio_link_url').hide();
	    break;
	    
	    case 'Self-Hosted Video':
	        jQuery('#post_option_portfolio_mp4_url').show();
	        jQuery('#post_option_portfolio_video_id').hide();
	        jQuery('#post_option_portfolio_link_url').hide();
	    break;
	    
	    case 'External Link':
	    	jQuery('#post_option_portfolio_link_url').show();
	        jQuery('#post_option_portfolio_mp4_url').hide();
	        jQuery('#post_option_portfolio_video_id').hide();
	    break;
	    
	    case 'Portfolio Content':
	    	jQuery('#post_option_portfolio_link_url').hide();
	        jQuery('#post_option_portfolio_mp4_url').hide();
	        jQuery('#post_option_portfolio_video_id').hide();
	    break;
	}
	
	jQuery('#portfolio_type').on( 'change', function(){
		var portfolioType = jQuery(this).val();
		switch(portfolioType) 
		{
		    case 'Vimeo Video':
		        jQuery('#post_option_portfolio_video_id').show();
		        jQuery('#post_option_portfolio_mp4_url').hide();
		        jQuery('#post_option_portfolio_link_url').hide();
		    break;
		    
		    case 'Youtube Video':
		        jQuery('#post_option_portfolio_video_id').show();
		        jQuery('#post_option_portfolio_mp4_url').hide();
		        jQuery('#post_option_portfolio_link_url').hide();
		    break;
		    
		    case 'Self-Hosted Video':
		        jQuery('#post_option_portfolio_mp4_url').show();
		        jQuery('#post_option_portfolio_video_id').hide();
		        jQuery('#post_option_portfolio_link_url').hide();
		    break;
		    
		    case 'External Link':
		    	jQuery('#post_option_portfolio_link_url').show();
		        jQuery('#post_option_portfolio_mp4_url').hide();
		        jQuery('#post_option_portfolio_video_id').hide();
		    break;
		    
		    case 'Portfolio Content':
		    	jQuery('#post_option_portfolio_link_url').hide();
		        jQuery('#post_option_portfolio_mp4_url').hide();
		        jQuery('#post_option_portfolio_video_id').hide();
		    break;
		}
	});
	
	
	//Custom functions for handle post options box
	var postType = jQuery('#post_ft_type').val();
	switch(postType) 
	{
	    case 'Vimeo Video':
	        jQuery('#post_option_post_ft_vimeo').show();
	        jQuery('#post_option_post_ft_gallery').hide();
	        jQuery('#post_option_post_ft_youtube').hide();
	    break;
	    
	    case 'Youtube Video':
	        jQuery('#post_option_post_ft_youtube').show();
	        jQuery('#post_option_post_ft_vimeo').hide();
	        jQuery('#post_option_post_ft_gallery').hide();
	    break;
	    
	    case 'Gallery':
	        jQuery('#post_option_post_ft_gallery').show();
	        jQuery('#post_option_post_ft_vimeo').hide();
	        jQuery('#post_option_post_ft_youtube').hide();
	    break;
	    
	    case 'Image':
	    	jQuery('#post_option_post_ft_gallery').hide();
	        jQuery('#post_option_post_ft_vimeo').hide();
	        jQuery('#post_option_post_ft_youtube').hide();
	    break;
	}
	
	jQuery('#post_ft_type').on( 'change', function(){
		var postType = jQuery(this).val();
		switch(postType) 
		{
		    case 'Vimeo Video':
	        jQuery('#post_option_post_ft_vimeo').show();
	        jQuery('#post_option_post_ft_gallery').hide();
	        jQuery('#post_option_post_ft_youtube').hide();
	    break;
	    
	    case 'Youtube Video':
	        jQuery('#post_option_post_ft_youtube').show();
	        jQuery('#post_option_post_ft_vimeo').hide();
	        jQuery('#post_option_post_ft_gallery').hide();
	    break;
	    
	    case 'Gallery':
	        jQuery('#post_option_post_ft_gallery').show();
	        jQuery('#post_option_post_ft_vimeo').hide();
	        jQuery('#post_option_post_ft_youtube').hide();
	    break;
	    
	    case 'Image':
	    	jQuery('#post_option_post_ft_gallery').hide();
	        jQuery('#post_option_post_ft_vimeo').hide();
	        jQuery('#post_option_post_ft_youtube').hide();
	    break;
		}
	});
	
	var pageTemplate = jQuery('#page_template').val();
	switch(pageTemplate) 
	{
	    case 'gallery.php':
	        jQuery('#page_option_page_gallery_id').show();
			jQuery('#page_option_page_ft_vimeo').hide();
			jQuery('#page_option_page_ft_youtube').hide();
	    break;
	    
	    case 'page-vimeo.php':
	        jQuery('#page_option_page_gallery_id').hide();
			jQuery('#page_option_page_ft_vimeo').show();
			jQuery('#page_option_page_ft_youtube').hide();
	    break;
	    
	    case 'page-youtube.php':
	        jQuery('#page_option_page_gallery_id').hide();
			jQuery('#page_option_page_ft_vimeo').hide();
			jQuery('#page_option_page_ft_youtube').show();
	    break;
	}
	
	jQuery("#page_template").change(function(){
		var pageTemplate = jQuery(this).val();
		
		if(pageTemplate == 'gallery.php')
		{
			jQuery('#page_option_page_gallery_id').show();
			jQuery('#page_option_page_ft_vimeo').hide();
			jQuery('#page_option_page_ft_youtube').hide();
			jQuery('#page_gallery_id').focus();
		}
		else if(pageTemplate == 'page-vimeo.php')
		{
			jQuery('#page_option_page_gallery_id').hide();
			jQuery('#page_option_page_ft_vimeo').show();
			jQuery('#page_option_page_ft_youtube').hide();
			jQuery('#page_ft_vimeo').focus();
		}
		else if(pageTemplate == 'page-youtube.php')
		{
			jQuery('#page_option_page_gallery_id').hide();
			jQuery('#page_option_page_ft_vimeo').hide();
			jQuery('#page_option_page_ft_youtube').show();
			jQuery('#page_ft_youtube').focus();
		}
	});
});