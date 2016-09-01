<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "toyosatomimi";
$db = mysql_connect($hostname,$username,$password) or die('Failed to connect database!');
mysql_select_db($dbname);
?>