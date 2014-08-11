<?php 

	require_once 'init.php'; 
	
	$query = $db->query("SELECT rating_articles.id, rating_articles.title, AVG(rating_rating.rating) AS rating
						FROM rating_articles					
						LEFT JOIN rating_rating					
						ON rating_articles.id = rating_rating.article_id					
						GROUP BY rating_articles.id				
						");
				
	$articles = array(); 
	
	while($row = $query->fetch_object()){
		$articles[] = $row;
	}
	// print_r($articles);
?>

<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="rating.css" />
		<script src="jquery-1.10.2.js"></script>
		<title>Article Portfolio</title>
	</head>
	<body>
		<?php foreach($articles as $article): ?>
			<div class="article">
				<h3><a href="article.php?id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a></h3>
				<div>Rating: <?php echo round($article->rating); ?>/5</div>
				
				<div id="rate" class="rating">
					<?php $rated=round($article->rating); ?>
					<div id="star<?php echo $article->id; ?>1" class="star <?php if($rated>0) echo 'stared'; $rated--; ?>"><a id="1">1</a></div>
					<div id="star<?php echo $article->id; ?>2" class="star <?php if($rated>0) echo 'stared'; $rated--; ?>"><a id="2">2</a></div>
					<div id="star<?php echo $article->id; ?>3" class="star <?php if($rated>0) echo 'stared'; $rated--; ?>"><a id="3">3</a></div>
					<div id="star<?php echo $article->id; ?>4" class="star <?php if($rated>0) echo 'stared'; $rated--; ?>"><a id="4">4</a></div>
					<div id="star<?php echo $article->id; ?>5" class="star <?php if($rated>0) echo 'stared'; $rated--; ?>"><a id="5">5</a></div>
				</div>
			</div>
		<?php endforeach; ?>
	</body>
</html>