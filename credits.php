<html>
	<body>
	</body>
</html>
<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script>
	$.getJSON('http://api.imgur.com/2/credits.json',function(data){
		console.log(data)
		$('body').html(data.credits.remaining)
	})
</script>