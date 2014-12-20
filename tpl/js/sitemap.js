jQuery(function($) {
	$('a[href="#ping"]').click(function() {
		var response_tags = new Array('error','message','result');
		var params = new Array();
		exec_xml('cache', 'procSitemapAdminPingSitemap', params, function(ret_obj,response_tags){
		var error = ret_obj['error'];
		var message = ret_obj['message'];
		alert(message);
		}, response_tags);
		return false;
	});
});