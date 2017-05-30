/* GET WINDOW SIZE */
var windowsize = $(window).width();

$(window).resize(function() {
	var windowsize = $(window).width();
});


$(document).ready(function(){

	// Start balloon movement
	if (windowsize > 1200){
		function loopBalloon() {
			$.when(
				$("#balloon1").animate({marginTop: "-190px"}, 50000),
				$("#balloon1").animate({marginTop: "300px"}, 0)
			).done(function() {
				loopBalloon();
			});
			
			$.when(
					$("#balloon2").animate({marginTop: "-190px"}, 30000),
					$("#balloon2").animate({marginTop: "500px"}, 0)
				).done(function() {
					loopBalloon();
			});
			
			$.when(
					$("#balloon3").animate({marginTop: "-190px"}, 15000),
					$("#balloon3").animate({marginTop: "900px"}, 0)
				).done(function() {
					loopBalloon();
			});
		}
		if ($(".balloon").length){
			loopBalloon();
		}
	}

});
