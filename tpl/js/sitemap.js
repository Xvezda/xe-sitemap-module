jQuery(function($) {
	$('a[href="#ping"]').click(function() {
		var response_tags = new Array('error','message','result');
		var params = new Array();
		exec_xml('sitemap', 'procSitemapAdminPingSitemap', params, function(ret_obj,response_tags){
		var error = ret_obj['error'];
		var message = ret_obj['message'];
		alert(message);
		}, response_tags);
		return false;
	});
	$('#xml_sitemap_page').on('change', function() {
		var page = $(this).val();
		var dl_url = $('#dl').attr('href').setQuery('page', page);
		$('#dl').attr('href', dl_url);
	});
	   
	/*
	$('input[name=use_sitemap]').on('change', function() {
		var val = $(this).val();
									
		if(val == 'N') {
			$(this).parents('section').find('input:not([name="use_sitemap"]), select, a, textarea, button:not([type="submit"])').attr('disabled', 'disabled');
		} else if (val == 'Y') {
			$(this).parents('section').find('input:not([name="use_sitemap"]), select, a, textarea, button:not([type="submit"])').removeAttr('disabled');
		}
	});
	// clone
	$('input[name=use_search_index]').on('change', function() {
		var val = $(this).val();
									   
		if(val == 'N') {
			$(this).parents('section').find('input:not([name="use_search_index"]), select, a, textarea, button:not([type="submit"])').attr('disabled', 'disabled');
		} else if (val == 'Y') {
			$(this).parents('section').find('input:not([name="use_search_index"]), select, a, textarea, button:not([type="submit"])').removeAttr('disabled');
		}
	});
	( $('input[name=use_sitemap]').val() == 'N' ) ? $('input[name=use_sitemap]').trigger('change') : null;
	( $('input[name=use_search_index]').val() == 'N' ) ? $('input[name=use_search_index]').trigger('change') : null;
	
	// disabled
	$('input, select, a, button, textarea').on('click', function() {
		var check = ($(this).attr('disabled') == 'disabled') ? true : false;
												
		if(check) {
			return false;
		}
	});
	*/
});