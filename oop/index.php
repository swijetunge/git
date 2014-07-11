<?php
/*
  Home page, created : 12-12-2012
*/
?>
<!DOCTYPE html>
<html>
<head>
<title>jream.com - Tutorials</title>
<style type="text/css">
body {
 font-family: Verdana;
 font-size: 12px;
}

a {
 color: #000;
 margin-right: 10px;
}

#menu {
	font-size: 10px;
	border-bottom: 1px solid #000;
	margin-left: auto;
	margin-right: auto;
	width: 650px;
	padding: 5px;
}

#header, #content {
	margin-left: auto;
	margin-right: auto;
	width: 650px;
	padding: 5px;
}
</style>
</head>
<body>
<center>
<strong>
  <br/><br/>
  <a href="http://jream.com" ><img src="logo.jpg" border="0"/></a>
  <br/><br/>
 </strong>

<samp>
<i>
Forum:<small> <a href="http://jream.com/forum/" target="_blank"> jream.com/forum </a></small><br/>
Blog:<small> <a href="http://jream.com/blog" target="_blank"> jream.com/blog </a></small><br/>
Youtube:<small> <a href="http://www.youtube.com/jreamdesign" target="_blank">youtube.com/jreamdesign </a></small>
</i>
</samp>

<div id="content">
<br/>
<img src="../folderlist.png" alt="Folder List" width="100" hight="100"/>
<?PHP
$dirlist = getFileList(".");
//echo "<pre>",print_r($dirlist),"</pre>";
echo '<pre>';
foreach($dirlist as $dir){
  if($dir['type']=="dir"){
    $names=  $dir['name'];

  echo   "<a href='$names' target='_blank'>$names</a><br/>";

  }
}
echo '</pre>';

function getFileList($dir)
  {
    // array to hold return value
    $retval = array();

    // add trailing slash if missing
    if(substr($dir, -1) != "/") $dir .= "/";

    // open pointer to directory and read list of files
    $d = @dir($dir) or die("getFileList: Failed opening directory $dir for reading");
    while(false !== ($entry = $d->read())) {
      // skip hidden files
      if($entry[0] == ".") continue;
      if(is_dir("$dir$entry")) {
        $retval[] = array(
          "name" => "$dir$entry/",
          "type" => filetype("$dir$entry"),
          "size" => 0,
          "lastmod" => filemtime("$dir$entry")
        );
      } elseif(is_readable("$dir$entry")) {
        $retval[] = array(
          "name" => "$dir$entry",
          "type" => mime_content_type("$dir$entry"),
          "size" => filesize("$dir$entry"),
          "lastmod" => filemtime("$dir$entry")
        );
      }
    }
    $d->close();

    return $retval;
  }
?>
</div>
</center>    
</body>
</html>