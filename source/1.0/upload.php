<?php session_start();
if(!isset($_SESSION['username'])) {
header('location:/page/login/'); }
else { $usr = $_SESSION['username']; }
require_once("/page/connection.php");
include('page/upload_file.php');
$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>My Files</title>
  <link href="page/css/bitnami.css" media="all" rel="Stylesheet" type="text/css" /> 
  <link href="page/css/all.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="contain-to-grid">
    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
          <h1><a href="/page/account"><?php echo "Welcome, $usr"; ?></a></h1>
        </li>
        <li class="toggle-topbar menu-icon">
          <a href="#">
            <span>Menu</span>
          </a>
        </li>
      </ul>

      <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
          <li class=""><a href="index.php">Home</a></li>
          <li class="active"><a href="#">Upload</a></li>
          <li class=""><a href="/page/status.php">Server Status</a></li>
          <li class=""><a href="/page/account">My Account</a></li>
		  <li class=""><a href="/logout/">Logout</a></li>
        </ul>
      </section>
    </nav>
  </div>
    <div id="wrapper">
      <div class="hero">
  <div class="row">
    <div class="large-12 columns">
      <h1>Toyosatomimi Files - Free Hosting File</h1>
    </div>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <dl class="accordion">
	<h2>Upload File<h2>
	<form method="post" enctype="multipart/form-data" action="">
		<input type="file" name="data_upload" /><br>
		<input type="submit" name="btnUpload" class="success button" value="Upload"/>
	</form>
  </div>
</div>
    <footer>
      <div class="row">
        <div class="large-12 columns">
          <div class="row">
            <div class="large-8 columns">
	  <ul class="inline-list">
                <li><a href="https://www.toyosatomimi-soft.wordpress.com">Blog</a></li>
              </ul>
            </div>
            <div class="large-4 columns">
              <p class="text-right">Copyright © 2016, Vaxza (Dani Pragustia)</p>
            </div>
          </div>
		  </footer>
</body>
</html>