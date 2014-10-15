$(document).ready(function () {

	$('.username-check').on('click', function() {
		var target = $('.username-target'),
			feedback = $('.username-feedback');
		
		function changeFeedbackText(text) {
			feedback.text(text);
		}
		
		if(target.val() !='') {
			$.ajax({
				url: 'username.php',
				type: 'get',
				data: {	username: target.val() },
				dataType: 'json',
				success: function(data){
							if(data.available !== undefined) {
									if(data.available === true) {
										changeFeedbackText('That username is available.');
									} else {
										changeFeedbackText('Sorry, that username is not available.');
									}
							} else {
									changeFeedbackText('Could not check at this time.');
							}
						},
				error: function(){
							changeFeedbackText('Could not check at this time.');
						}
			});
		} else {
			changeFeedbackText('Please enter your username.');
		}
		
	});
	
});