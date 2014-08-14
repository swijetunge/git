<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link rel="stylesheet" href="pages/css/default.css" />
    <script src="pages/js/jquery-2.1.1.js" type="text/javascript"></script>
    <script src="pages/js/main.js" type="text/javascript"></script>
</head>
<body>
<?php require_once "getRSS.feed.php"; ?>
<div id="wrap">
 
    <div id="mainContent">
 		<div class="rssincl-head">
        	<p class="rssincl-title">Uploads by phpacademy</p>
        </div>
        <div class="rssincl-content">
	            <?php getFeed("http://gdata.youtube.com/feeds/base/users/phpacademy/uploads?alt=rss&orderby=updated&client=ytapi-youtube-rss-redirect&v=2"); ?>
	     </div><!--end rssincl-content -->
 
    </div><!--end main content -->
 
</div><!--end wrap-->
</body>
</html>