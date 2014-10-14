<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />

<!-- Website Design By: www.happyworm.com -->
<title>Demo : jPlayer as a video player</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="demo/skin/blue.monday/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="demo/js/jquery.jplayer.min.js"></script>

<!--
	Note that the insertion of jQuery and jPlayer above is optional.
	The Popcorn jPlayer Player Plugin will load jQuery and jPlayer during instancing if not present in the page.
	Having jQuery and jPlayer present in the page avoids asynchronous player instancing.
-->

<script type="text/javascript" src="demo/js/popcorn.ie8.js"></script>
<script type="text/javascript" src="demo/js/popcorn.js"></script>
<script type="text/javascript" src="demo/js/popcorn.player.js"></script>
<script type="text/javascript" src="demo/js/popcorn.jplayer.js"></script>
<script type="text/javascript" src="demo/js/popcorn.subtitle.js"></script>
<script type="text/javascript">
//<![CDATA[

$(document).ready(function(){

	var p = Popcorn.jplayer('#jquery_jplayer_1', {
		media: {
			title: "Big Buck Bunny Trailer",
			m4v: "http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer.m4v",
			ogv: "http://www.jplayer.org/video/ogv/Big_Buck_Bunny_Trailer.ogv",
			webmv: "http://www.jplayer.org/video/webm/Big_Buck_Bunny_Trailer.webm",
			poster: "http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
		},
		options: {
			swfPath: "js",
			supplied: "webmv, ogv, m4v",
			size: {
				width: "640px",
				height: "360px",
				cssClass: "jp-video-360p"
			},
			smoothPlayBar: true,
			keyEnabled: true
		}
	})
	.subtitle({
		start: 2,
		end: 6,
		text: "This text is the Popcorn Subtitle Plugin"
	})
	.subtitle({
		start: 6,
		end: 10,
		text: "Working with the Popcorn jPlayer Player Plugin"
	})
	.subtitle({
		start: 10,
		end: 15,
		text: "Enabling jPlayer to function with the features of Popcorn"
	})
	.subtitle({
		start: 16,
		end: 32,
		text: "Have fun playing with it!"
	});

});
//]]>
</script>
</head>
<body>
		<div id="jp_container_1" class="jp-video jp-video-360p">
			<div class="jp-type-single">
				<div id="jquery_jplayer_1" class="jp-jplayer"></div>
				<div class="jp-gui">
					<div class="jp-video-play">
						<a href="javascript:;" class="jp-video-play-icon" tabindex="1">play</a>
					</div>
					<div class="jp-interface">
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
						<div class="jp-current-time"></div>
						<div class="jp-duration"></div>
						<div class="jp-controls-holder">
							<ul class="jp-controls">
								<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
								<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
								<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
								<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
								<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
								<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
							</ul>
							<div class="jp-volume-bar">
								<div class="jp-volume-bar-value"></div>
							</div>
							<ul class="jp-toggles">
								<li><a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a></li>
								<li><a href="javascript:;" class="jp-restore-screen" tabindex="1" title="restore screen">restore screen</a></li>
								<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
								<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
							</ul>
						</div>
						<div class="jp-details">
							<ul>
								<li><span class="jp-title"></span></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="jp-no-solution">
					<span>Update Required</span>
					To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
				</div>
			</div>
		</div>
</body>

</html>
