<?php
	include_once 'miko.global.php';
	
	$db = mysql_connect(miko_host,miko_username,miko_password) or die('Failed to connect database!');
	mysql_select_db(miko_db);
?>