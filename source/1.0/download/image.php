<?php
session_start();
require_once("../page/connection.php");
include('../page/includes/file_function.php');
$linkdown = $_GET['pic'];
$linkdata = mysql_query("SELECT * FROM files WHERE downloadlink = '$linkdown'");
$meta = mysql_fetch_assoc($linkdata);
if (mysql_num_rows($linkdata) > 0) {
$file_size = $meta['size'];
$user_owner = $meta['userowner'];
$file_name = $meta['filename'];
$date_created = $meta['datecreated'];
$link_file = "../page/download/$file_name";
} else {
	header('location:error_404.html');
}
echo '
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Toyosatomimi Files - '.$file_name.'</title>
  <link href="../page/css/bitnami.css" media="all" rel="Stylesheet" type="text/css" /> 
  <link href="../page/css/all.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<center>
		<img src="'.$link_file.'" /><br><br>
		<a href="index.php?link='.$linkdown.'"><input type="submit" class="button secondary" value="< Back to Download Page"/></a>
		<a href="'.$link_file.'"><input type="submit" class="button" value="Download"/></a>
		<a href="'.$link_file.'"><input type="submit" class="button success" value="Go to Artist"/></a>
	</center>
</body>
</html>
';
?>
