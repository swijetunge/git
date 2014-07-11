<!DOCTYPE html>
<html>
<head>
<title>Home</title>
</head>

<body>
<H1>Home</H1>
<center>
<img src="folderlist.png" alt="Folder List" width="100" hight="100"/> <br/>
<?php
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
</center>
</body>
</html>
