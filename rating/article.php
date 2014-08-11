<?php 

	require_once 'init.php'; 

	$article = null;
	
	if(isset($_GET['id']) && $_GET['id']!=''){
		$id = $_GET['id'];
		
		$article = $db->query("SELECT * FROM rating_articles WHERE id = {$id}")->fetch_object();
	}
	
	
	$query = $db->query("SELECT AVG(rating_rating.rating) AS rating
						FROM rating_articles					
						LEFT JOIN rating_rating					
						ON rating_articles.id = rating_rating.article_id					
						AND rating_articles.id = {$id}				
						");
	
	$row = $query->fetch_object()
		
	// $articles = array(); 
// 	
	// while($row = $query->fetch_object()){
		// $articles[] = $row;
	// }
	
?>

<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="rating.css" />
		<script src="jquery-1.10.2.js"></script>
		<title>Article</title>
	</head>
	<body>
		<div><a href="index.php">Back</a></div>
		<hr />
		<?php if($article): ?>
			This is article "<?php echo $article->title; ?>".
			<div class="article-rating">Rating: <?php echo round($row->rating); ?>/5</div>
			<div class="article-rate">Rate this article:</div>
			<div id="rate" class="rating">
				<?php foreach(range(1, 5) as $rating): ?>
					<div id="star<?php echo $article->id,$rating; ?>" class="star">
						<a id="<?php echo $rating;  ?>" href="rating.php?article=<?php echo $article->id;?>&rating=<?php echo $rating;  ?>"><?php echo $rating;  ?></a>
					</div>
				<?php endforeach; ?>	
			</div>
		<?php endif; ?>
		<script>
			$(function(){
					
				$('.star').hover( function() {
					
					if( $(this).attr('id') == 'star<?php echo $id; ?>1' ) {
						$( this ).toggleClass('active');
					} else if( $(this).attr('id') == 'star<?php echo $id; ?>2' ) {
						$( '#star<?php echo $id; ?>1' ).toggleClass('active');
						$( this ).toggleClass('active');
					} else if( $(this).attr('id') == 'star<?php echo $id; ?>3' ) {
						$( '#star<?php echo $id; ?>1' ).toggleClass('active');
						$( '#star<?php echo $id; ?>2' ).toggleClass('active');
						$( this ).toggleClass('active');
					} else if( $(this).attr('id') == 'star<?php echo $id; ?>4' ) {
						$( '#star<?php echo $id; ?>1' ).toggleClass('active');
						$( '#star<?php echo $id; ?>2' ).toggleClass('active');
						$( '#star<?php echo $id; ?>3' ).toggleClass('active');
						$( this ).toggleClass('active');
					} else if( $(this).attr('id') == 'star<?php echo $id; ?>5' ) {
						$( '#star<?php echo $id; ?>1' ).toggleClass('active');
						$( '#star<?php echo $id; ?>2' ).toggleClass('active');
						$( '#star<?php echo $id; ?>3' ).toggleClass('active');
						$( '#star<?php echo $id; ?>4' ).toggleClass('active');
						$( this ).toggleClass('active');
					}
					
				});
				
			});
		</script>
	
	</body>
</html>