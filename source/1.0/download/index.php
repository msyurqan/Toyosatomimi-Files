<?php session_start();
require_once("../page/connection.php");
include('../page/includes/file_function.php');
include('download.php');
$linkdown = $_GET['link'];
$linkdata = mysql_query("SELECT * FROM files WHERE downloadlink = '$linkdown'");
$meta = mysql_fetch_assoc($linkdata);
if (mysql_num_rows($linkdata) > 0) {
$file_size = $meta['size'];
$user_owner = $meta['userowner'];
$file_name = $meta['filename'];
$date_created = $meta['datecreated'];
$link_file = "../page/download/$file_name";
$image_ext	= array('jpg','jpeg','png','gif');
$audio_ext = array('mp3','wav');
// 1.1 Revision
$document_ext = array('pdf','docx','doc','xls','xlsx');
$text_ext = array('txt','md','log','text');	
// --------------------------------
$explode	= explode('.',$file_name);
$extensi	= $explode[count($explode)-1];
} else {
	header('location:error_404.html');
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Toyosatomimi Files - Free Sharing Hosting</title>
  <link href="../page/css/bitnami.css" media="all" rel="Stylesheet" type="text/css" /> 
  <link href="../page/css/all.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
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
          <li class=""><a href="../page/login">Login</a></li>
          <li class=""><a href="../page/register">Sign Up</a></li>
          <li class=""><a target="_blank" href="../page/status.php">Server Status</a></li>
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
          <li class=""><a href="../status.php">Server Status</a></li>
          <li class=""><a href="../page/account">My Account</a></li>
		  <li class=""><a target="../logout" href="/logout/">Logout</a></li>
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
      <h1>Download File</h1>
    </div>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <dl class="accordion">
	<center>
	<?php
		
		echo "Filename : $file_name <br>";
		echo 'Size : '.formatBytes($file_size).' <br>';
		echo "Date Created : $date_created <br>";
		echo "Sumbitted by $user_owner";
	
	echo "<br><br>";
		if(!in_array($extensi,$image_ext)){
			if(!in_array($extensi,$audio_ext)) {
				// Do Nothing :/
			} else {
				echo '<a href="'.$link_file.'"><input type="submit" class="button" value="Play"/></a>';
			}
		} else {
			echo '<a href="image.php?pic='.$linkdown.'"><input type="submit" class="button" value="View Image"/></a>';
		}
		

	echo '<a href="'.$link_file.'"><input name="btnDownload" type="submit" class="success button" value="Download Now"/></a>';
	?>
	</center>
    </form>
  </div>
</div>
</body>
</html>
