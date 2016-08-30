<?php
include 'includes/miko.functions.php';
include 'includes/miko.inc.php';
include 'includes/connect.php';

	$username = get_username();
	$pic = "miko.png"; //sementara
	
	if (!isset($username)) { //TODO : Fix dengan check_login
		header('location:login?redirect=upload');
	}
	
?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Upload Berkas - Mikofile.tk</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body onload="myFunction()">

  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
	
      <a id="logo-container" href="/" class="brand-logo"><b><font color="orange">Miko</font>file.tk</b></a>
      <ul class="right hide-on-med-and-down">
		  <li class="bold"><a href="upload">Upload</a></li>
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
			<img class="materialboxed" width="256" height="256" src="default-user.png"/>
			<h3 class="orange-text light center"><?php echo $username; ?></h3>
			</center>
		</li>
		<li class="bold"><a href="upload">Upload</a></li>
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
	<h2 class="header light">Upload Berkas</h2>
	<p>Berkas harus berukuran maksimal <b><?php echo ''.formatBytes(miko_upload_size_limit).''; ?></b>, Jika anda ingin mengupload berkas dengan format yang didukung penuh. Untuk mengetahui format-format tersebut. <a href="support?#upload_support">Pelajari Selengkapnya</a><p>
	<form method="post" enctype="multipart/form-data" action="includes/upload.inc.php">
    <div class="file-field input-field">
      <div class="btn">
        <span>Pilih Berkas...</span>
        <input type="file" name="data_upload">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
	    <div class="input-field col s12">
          <input name="keydownload" id="keydownload" type="text" class="validate">
          <label for="keydownload">Password</label>
        </div>
		<font color="grey">(*) Fill password blank for empty password</font>
	<button class="btn waves-effect waves-effect waves-light orange right" type="submit" name="upload-button" id="upload-button">Upload</button>
	</div>
	</div>
  </div>
  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="fonts/icons/iconjar-map.js"></script>
</body>