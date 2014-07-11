<?php
/*
  RSS page, created : 02-14-2013
*/
?>
<!DOCTYPE html>
<html>
<head>
<title>RSS</title>
</head>
<body>
<center>

<object classid="clsid:02BF25D5-8C17-BC17-4B23-BC80-D3488ABDDC6B" width="400" height="300"> 
<param name="src" value="../videos/rss.mp4">
<param name="controller" value="ture">
<object type="vedio/qicktime" data="../videos/rss.mp4" width="400" height="300">
<param name="controller" value="ture">
<param name="autoplay" value="false">
alt: <a href="../videos/rss.mp4">RSS Tutorial Video</a>
</object>

</object>

</center>
</body>
</html>
<?php

$feed_url = 'http://www.php.net/feed.atom';
$feed = simplexml_load_file($feed_url);

$limit = 5;
$x = 1;

?>
<ul>
<?php
	foreach($feed ->entry as $item) {
		if($x <= $limit) {
			$title = $item->title;
			$url = $item->id;

			echo '<li><a href="', $url, '">', $title, '</a><li>';
		}
		$x++;
	}
?>
</ul>