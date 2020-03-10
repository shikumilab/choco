(function ($) {

	var anchor = location.hash;
	if(anchor) {
		var cur_sec_id = anchor.replace('#','');
		$('#to-tabs li#tab-'+cur_sec_id).addClass('active');
		$('#to-items div#'+cur_sec_id).addClass('active');
		$('#to_action').attr('action', action_url+anchor);
	} else {
		$('#to-tabs li:first-child').addClass('active');
		$('#to-items div.to-item:first-child').addClass('active');
	}

	$('#to-tabs li').click(function() {

		var sec_id = $(this).attr('id').replace('tab-', '');

		$('#to-tabs li').removeClass('active');
		$('#to-items div').removeClass('active');

		$('#tab-'+sec_id).fadeIn('fast').addClass('active').css('display', '');
		$('#'+sec_id).fadeIn('fast').addClass('active').css('display', '');

		$('#to_action').attr('action', action_url+'#'+sec_id);
	});

	if($('table.form-table tr.radio.layout input').length > 0) {
		$('table.form-table tr.radio.layout input').change(function() {
			$(this).siblings('input').removeClass('on');
			$(this).addClass('on');
		});
	}

})(jQuery);