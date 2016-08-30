<?php
	include 'includes/miko.global.php';
	include 'includes/miko.inc.php';
	
	$linkdown = $_GET['d'];
	$try = $_GET['retry'];
	$pass_input = $_POST['x'];
	
	$try++;
	if ($try>5) { //If users try more than 5 times (Is that's robot?) you can add CAPTCHA HERE
		// Add Code Here!
	}
	
	$linkdata = mysql_query("SELECT * FROM miko_files WHERE downloadlink = '$linkdown'");
	$meta = mysql_fetch_assoc($linkdata);
	$password = $meta['password']; // Get Password file from database
	
	if (mysql_num_rows($linkdata) > 0) { // Check File is Avaliable / Deleted
		// Get All Info of file, you can add your costumize tables on here!
		$file_size = $meta['size'];
		$user_owner = $meta['ownerfile'];
		$file_name = $meta['filename'];
		$source_file = $meta['source'];
		$date_created = $meta['datecreated'];
		$hit = $meta['hit'];
		
		
		
	} else {
		// header('error?err=404');
	}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Mikofile.tk - Situs Pembagi File</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
	
      <a id="logo-container" href="/" class="brand-logo"><b><font color="orange">Miko</font>file.tk</b></a>
      <ul class="right hide-on-med-and-down">
		<?php if (isset($username)) {?><li><a href="upload">Upload</a></li><?php } ?>
		<li><a href="support">Dukungan</a></li>
		<li>
		  
			<?php if (isset($username)) {?><a href="#!" class="chip dropdown-button" data-activates="account-menu"><img src="<?php echo $pic;?>" alt="Contact Person"><?php echo $username;?></a> <?php } else {?><a href="login">Masuk</a><?php } ?>
			<ul id="account-menu" class="dropdown-content">
				<li><a href="myfiles">My Files</a></li>
				<li><a href="account">Account</a></li>
				<li class="divider"></li>
				<li><a href="logout">Logout</a></li>
			</ul>
		</li>
		<?php if (!isset($username)) {?><li><a href="register">Register</a></li><?php }?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
	  <?php if (isset($username)) {?>
	  	<li>
			<center>
			<div class="card">
			<div class="card-image">
              <img class="materialboxed" src="default-user.png">
            </div>
			</div>
			<h3 class="orange-text light center"><?php echo $username; ?></h3>
			</center>
		</li>
		<li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold"><a class="collapsible-header  waves-effect waves-orange">Akun</a>
              <div style="" class="collapsible-body">
                <ul>
                  <li><a href="myfiles">My Files</a></li>
                  <li><a href="account">Account</a></li>
                  <li><a href="logout">Logout</a></li>
                </ul>
              </div>
            </li>
		  </ul>
		</li>
	  <?php } else { ?>
		<li class="bold"><a href="login" class="waves-effect waves-orange">Masuk</a></li>
		<li class="bold"><a href="register" class="waves-effect waves-orange">Registrasi</a></li>
	  <?php } ?>
		<li class="bold"><a href="support" class="waves-effect waves-orange">Dukungan</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">Menu</i></a>
    </div>
  </nav>
 <div class="section">
	<div class="container">
	<?php
	if (!$pass_input) {
	if (!$password) {
		$pwdinput=false;
	} else {
		$pwdinput=true;
	}
	// do nothing :/
} 	else {
	if ($pass_input==$password) {
		$unlock=true;
		$pwdinput=false;
	} else {
		$pwdinput=true;
		echo 'Invalid Password!';
	}
}
	if (!$password) {
		$unlock="true";
		$pwdinput="false";
	}
	
	if ($pwdinput=="true") {
		echo '
		<h2 class="light center">Password Protected</h2>
		<p class="align-center"> File Protected by password, please insert password you get from uploaded user</p>
		<br>
		<form method="post" enctype="multipart/form-data" action="">
		<div class="input-field col s12">
          <input name="keydownload" name="x" id="x" type="text" class="validate">
          <label for="keydownload">Password</label>
        </div>
		</form>
		';
	}
	
	if ($unlock=="true") {
		echo '<h3 class="light">Your being downloaded file:</h3>
		<h4>Filename : '.$file_name.'</h4>
		Size : '.formatBytes($file_size).'
		<Br>
		Downloaded Time : 
		';
	}
	
	?>
	</div>
 </div>
 </body>
 </html>