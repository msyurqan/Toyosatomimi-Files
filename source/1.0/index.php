<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Toyosatomimi Files - Free Sharing Hosting</title>
  <link href="page/css/bitnami.css" media="all" rel="Stylesheet" type="text/css" /> 
  <link href="page/css/all.css" rel="stylesheet" type="text/css" />
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
          <li class="active"><a href="#">Home</a></li>
          <li class=""><a href="/page/login">Login</a></li>
          <li class=""><a href="/page/register">Sign Up</a></li>
          <li class=""><a target="_blank" href="/page/status.php">Server Status</a></li>
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
          <li class="active"><a href="#">Home</a></li>
          <li class=""><a href="upload.php">Upload</a></li>
          <li class=""><a href="/page/status.php">Server Status</a></li>
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
      <h1>Toyosatomimi Files - Free Hosting File</h1>
    </div>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <dl class="accordion">
    <p><h2>Welcome to Toyosatomimi Files CMS</h2></p>
	  <p>The open-source file hosting Content Management System (CMS) has created to make file-hosting <i>easy way</i> with <i>HTML 5 Support</i> using Bitnami <i>CSS Stylesheet</i> has basic power to <i>Upload,Download,Delete,and Management user</i> Control Panel.</p>
	<dt>Installing Toyosatomimi File Hosting</dt>
	<dd>
	<p>Download <a href="http://vaxza-old.blogspot.co.id/p/toyosatomimi-file-cms.html">toyosatomimi_1.0.0.zip</a> file from my blog or clone it from <a href="http://github.com">Github</a> Reposity and Unzip it on your web root/server. Using installer from my blog is the easiest way to configuration your CMS. After unzip complete, <b>Open install.php</b> on your server and set database configuration on <b>setup.php</b> with your database configuration.</p>
	<p>File is zipped / on reposity something like below:
	</dd>
	<p><code>+ toyosatomimi
	-+ page
	 -- upload.html
	 -- index.html
	 -- connect.php
	 -- upload.php
	 --+ css
	  ---- all.css
	  ---- all-rtl.css
	  ---- asciidoctor.css
	  ---- bitnami.css
	  ---- normalize.css
	 --+ login
	  ---- index.html
	 --+ register
	  ---- index.html
	 </code>
	 <dt>Manual Installing</dt>
	 <dd>
	 <p>If you got occured error and you can't resolved it. You can use <i>Manually</i> Method with using <i>Browser</i> navigate this URL:</p>
	 <p><i>Please ensure your edit <b>setup.php</b> configuration before using manually method</i>
	 </dd>
	 <p><code>http://[Your_Host]/install.php?action=install
	 </code>
	 <dt><h3>FAQ</h3></dt>
	 <dt>It's legal to use <i>Commercial-use</i>?</dt>
	 <p>Its can <i>freely</i> using for <i>Commercial-use</i>, However. Your must make credit on every single component(s) your using on this <i>code</i>.</p> 
	 <dt>Can i modified this code for my bla...bla....</dt>
	 <p>Same like first answer, but only sub-component like (css,upload) has <i>Common Creative License 2.0</i> was you don't need <i>GNU License</i> on your program.</p>
	 <dt>Can I Contribute to this CMS</dt>
	 <p>I am very pleased for someone want join this little project, you can join this on <a href="http://github.com">Github</a> and help me to make the next revision or version of this project.</p><br>
	 <dt><h3>Page & Support</h3></dt>
	 <p>Website : <a href="http://vaxza-old.blogspot.co.id">http://vaxza-old.blogspot.co.id</a>
	 <p>Facebook : <a href="http://facebook.com/toyosatomimi-app">http://facebook.com/toyosatomimi-app</a>
	 <p>EdModo : <a href="http://edmodo.com/user/LoLiProgrammer">http://edmodo.com/user/LoLiProgrammer</a>
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