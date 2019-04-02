<!DOCTYPE >
<html lang="en">
<meta charset="UTF-8" />
<title>Easy AJAX</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<head>
	
</head>
<body>
	<br /><br />
	<div class="container" style="width:600px;">
		<h2 align="center">Autocomplete Textbox using Bootstrap Typeahead with Ajax PHP</h2>
		<br /><br />
		<label>Search Country</label>
		<input type="text" name="country" id="country" class="form-control input-lg" autocomplete="off" placeholder="Type Country Name" />
	</div>
	<script>
	$(document).ready(function(){
	 
	 $('#country').typeahead({
	  source: function(query, result) {
		   $.ajax({
			url:"/ajax/fetch.php",
			method:"POST",
			data:{query:query},
			dataType:"json",
			success:function(data) {
				result($.map(data, function(item){
				return item;
			 }));
			}
		   })
		}
	 });
	 
	 $('#country').on('change', function() {
		 console.log($( this ).val());
	 });
	 
	});
</script>

</body>	
</html>