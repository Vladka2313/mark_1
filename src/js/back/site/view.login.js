//
jQuery(function() {
	$('input.login').on('keyup', function() {
		if($(this).hasClass('error'))
			$(this).removeClass('error');
	});
	
	$('input.pass').on('keyup', function() {
		if($(this).hasClass('error'))
			$(this).removeClass('error');
	});
});
