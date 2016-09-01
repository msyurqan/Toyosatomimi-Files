<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Toyosatomimi Files - Free Sharing Hosting</title>
  <link href="../page/css/bitnami.css" media="all" rel="Stylesheet" type="text/css" /> 
  <link href="../page/css/all.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php session_start();
if(!isset($_SESSION['username'])) {
  echo '<div class="contain-to-grid">
    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
          <h1><a href="#">Toyosatomimi Files</a></h1>
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
          <li class=""><a href="../">Home</a></li>
          <li class=""><a href="/page/login">Login</a></li>
          <li class=""><a href="/page/register">Sign Up</a></li>
          <li class="active"><a target="_blank" #">Server Status</a></li>
        </ul>
      </section>
    </nav>
  </div>';
  } else {
	$usr = $_SESSION['username'];
	echo '<div class="contain-to-grid">
    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
          <h1><a href="/page/account">Welcome, '.$usr.' </a></h1>
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
          <li class=""><a href="../">Home</a></li>
          <li class=""><a href="../upload.php">Upload</a></li>
          <li class="active"><a href="/page/status.php">Server Status</a></li>
          <li class=""><a href="/page/account">My Account</a></li>
		  <li class=""><a target="/logout.php" href="/logout/">Logout</a></li>
        </ul>
      </section>
    </nav>
  </div>';
  }
  ?>
    <div id="wrapper">
      <div class="hero">
  <div class="row">
    <div class="large-12 columns">
      <h1>Status Server</h1>
    </div>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <dl class="accordion">
		<h2>Server Status</h2>
		<p>Server 1 : Fine</p>
		<p>Server 2 : Fine</p>
		<p>Server 3 : Fine</p>
		<p>Server 4 : Fine</p>
		<p>Server 5 : Fine</p>
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