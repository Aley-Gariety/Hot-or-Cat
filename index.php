<?php

	$filter =  $_GET["filter"];
	include('connection.php');
	function showPhoto($table,$dataname) {
		$query = mysql_query("SELECT imagelink FROM $table ORDER BY RAND() LIMIT 1");
		$imgSRC = mysql_fetch_array($query);
		$theURI = $imgSRC[imagelink];

		echo $dataname.$theURI.'"';

		$winsCount = mysql_query("SELECT win FROM $table WHERE imagelink = '$theURI'");
		$theWinsArray = mysql_fetch_array($winsCount);
		$theWins = $theWinsArray[win];
		$loseCount = mysql_query("SELECT lose FROM $table WHERE imagelink = '$theURI'");
		$theLosesArray = mysql_fetch_array($loseCount);
		$theLoses = $theLosesArray[lose];
		$views = $theWins + $theLoses;

		if ($theWins != '' && $theLoses != '') {
			$score = $theWins;
		} else if ($theWins == '' && $theLoses == '') {
			$score = '0';
		} else if ($theLoses == '') {
			$score = $theWins;
		} else if ($theWins == '0') {
			$score = '0';
		};

		echo 'data-winsloses="'.$score.'"';
	}

?>
<html>
<head>
	<title>Hot or Cat? — Finally, we will know which one the internet loves more.</title>
	<meta charset="utf-8">
	<meta name=“Description” content='Finally, we will know exactly what the internet loves more. Boobs, or cats. Were we let in for our looks? No. Will we be judged on them? Meow.'>
	<meta name=“Description” content='Finally, we will know exactly what the internet loves more. Boobs, or cats. Were we let in for our looks? No. Will we be judged on them? Meow.'>

	<link href="style.css" rel="stylesheet" type="text/css">

	<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
	<script src="script.js"></script>

	<!--[if lt IE 9]>
	<script src="dist/html5shiv.js"></script>
	<![endif]-->
</head>
<body>
	<nav><?php include ('nav.php') ?></nav>
	<header>
	<h1>Hot or Cat</h1>
	<h2>Were we let in for our looks? No. Will we be judged on them? Meow.</h2>
<a href="https://twitter.com/share" class="twitter-share-button" data-text="Hot or cat? Were we let in for our looks? No. Will we be judged on them? Meow." data-size="large" data-related="JacksonGariety" data-hashtags="HotorCat">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</header>
	<h1></h1>
	<section>
		<div data-src="" class="left-pic" id="<?php if ($filter) { echo $filter; } else { echo 'prettygirls'; } ?>">
			<img title="hot, possibly naked women" alt="hot, possibly naked women" <?php
				if ($filter) {
					showPhoto($filter,'src="');
				} else {
					showPhoto('prettygirls','src="');
				} ?> title="left" id="left" />
		</div>
		or
		<div data-src="" class="right-pic" id="kittens">
			<img title="cats and kittens" alt="cats and kittens" <?php showPhoto('kittens','src="') ?> title="cat" id="right" />
		</div>
	</section>
	<footer>
<script type="text/javascript">
(function() {
    var prefix = document.location.protocol == 'https:' ? 'https://' : 'http://'
    var dump = '<link rel="stylesheet" type="text/css" href="' + prefix + 'bugshark.com/bugshark.css"/>'
    var scripts = ['static/js/vendor/underscore', 'static/js/vendor/jquery-1.8.2.min', 'static/js/vendor/mustache', 'static/js/vendor/backbone', 'static/js/vendor/jquery.Jcrop.min', 'static/js/vendor/html2canvas.min', 'static/js/vendor/jquery.plugin.html2canvas', 'bugshark']
    for (var j = 0; j < scripts.length; j++) {
        dump += '<script type="text/javascript" src="' + prefix + 'bugshark.com/' + scripts[j] + '.js"></scri' + 'pt>'
    }
    dump += '<script type="text/javascript">BugShark.track_id = "d8a3bb7"</scri' + 'pt>'
    document.write(dump)
})()
</script>


	<script type="text/javascript">
	  var GoSquared = {};
	  GoSquared.acct = "GSN-214651-A";
	  (function(w){
	    function gs(){
	      w._gstc_lt = +new Date;
	      var d = document, g = d.createElement("script");
	      g.type = "text/javascript";
	      g.src = "//d1l6p2sc9645hc.cloudfront.net/tracker.js";
	      var s = d.getElementsByTagName("script")[0];
	      s.parentNode.insertBefore(g, s);
	    }
	    w.addEventListener ?
	      w.addEventListener("load", gs, false) :
	      w.attachEvent("onload", gs);
	  })(window);
	</script>
		<?php
		if ($_GET['ad'] != 'no' && $filter != 'nsfw') { ?>
		<script type="text/javascript"><!--
google_ad_client = "ca-pub-8390905652299104";
/* bottom of post */
google_ad_slot = "4897385032";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
		<?php }
	?>
	</footer>
</body>
</html>