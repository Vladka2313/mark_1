
jQuery(function() {
	jQuery.ajax({
		url: "\/index.php?r=site\/captcha&refresh=1",
		dataType: 'json',
		cache: false,
		success: function(data)
		{
			jQuery('#captcha').attr('src', data['url']);
			jQuery('body').data('captcha.hash', [data['hash1'], data['hash2']]);
		}
	});
});
