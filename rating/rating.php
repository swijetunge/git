<?php


require_once 'init.php';

if(isset($_GET['article'], $_GET['rating'])) {
	
	$article = (int) $_GET['article'];
	$rating = (int) $_GET['rating'];
	
	if(in_array($rating, array(1,2,3,4,5))){
		
		$exists = $db->query("SELECT id FROM rating_articles WHERE id ={$article}")->num_rows ? true : false;
		
		if($exists){
			$db->query("INSERT INTO rating_rating (article_id, rating) VALUES ({$article}, {$rating})");
		}
	}
	
	header('Location: article.php?id='.$article);
}
