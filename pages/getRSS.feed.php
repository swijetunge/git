<?php
 
function getFeed($feed_url) {
     
    $content = file_get_contents($feed_url);
    $x = new SimpleXmlElement($content);
    
	// echo "<pre>";
	// print_r($x);
	// echo "</pre>"; 
	 
    echo '<table>';
    
	$i=0;
	 
    foreach($x->channel->item as $entry) {
    	
		$parseUrl = parse_url($entry->link );
		$videoID = str_replace("v=","v/",$parseUrl['query']);
				
		if ( $i % 2 == 0 ){ echo '<tr>'; }
		
        echo '<td>
        		<div class="rssincl-entry">
    				<object width="320.00" height="265.00">
     					<param name="movie" value="https://www.youtube.com/'.$videoID.'">
	      				<param name="allowFullScreen" value="true">
	      				<param name="allowscriptaccess" value="always">
    					<embed src="https://www.youtube.com/'.$videoID.'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="320.00" height="265.00">
    				</object>
    				<h3><a href=' . $entry->link . ' title=' . $entry->title . '>' . $entry->title . '</h3>
					<p>' . $entry->pubDate . ' </p>
        		</div>
        	</td>';
		
		if ( $i % 2 != 0 ){ echo '</tr>'; }
		$i++;
    }
    echo '</table>';
}

?>