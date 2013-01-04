<?php
	include('connection.php');
	function showVotes(){
		$query =  mysql_query("SELECT SUM(win) AS total FROM (SELECT win FROM kittens UNION)");
		echo mysql_error();
	}
?>
<html>
	<body>

	<div class="hidden">Women: <?php showVotes('women'); ?></div>
	<div class="hidden">Cats: <?php showVotes('cats'); ?></div>
	</body>
</html>