<?php

ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting (E_ALL & ~E_NOTICE );

include( 'connection.php');

$winnerLink = $_GET['winnerReddit'];
$loserLink = $_GET['losingReddit'];
$win = 'http://'.$_GET['win'];
$lose = 'http://'.$_GET['lose'];

mysql_query("UPDATE $winnerLink SET win = win + 1 WHERE imagelink = '$win'");
mysql_query("UPDATE $loserLink SET lose = lose + 1 WHERE imagelink = '$lose'");

?>