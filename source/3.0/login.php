<?php
include 'includes/miko.functions.php';
include 'includes/miko.inc.php';

	if (isset($username)) { //TODO : Fix dengan check_login
		header('location:../');
	}
	if (isset($_GET['err'])) {
		$err = $_GET['err'];
		if ($err=="invalid") {
			echo '<script>alert("Invalid Password!")</script>';
		}
	}
?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Masuk ke Mikofile.tk</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="/" class="brand-logo"><b><font color="orange">Miko</font>file.tk</b></a>
      <ul class="right hide-on-med-and-down">
		<li><a href="support">Dukungan</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
		<li><a href="support">Dukungan</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><div class="material-icons">Menu</i></a>
    </div>
  </nav>
  <div class="container">
    <div class="section">
	<h5 class="header center">Masuk ke <b>Mikofile.tk</b></h5>
	<br><br>
	<?php if (isset($_GET['redirect'])) {
		$go = $_GET['redirect'];
		echo '<form method="post" action="includes/process_login.php?redirect='.$go.'">';
	} else {
		echo '<form method="post" action="includes/process_login.php">';
	}
	?>
      <div class="row">
        <div class="input-field col s12">
          <input name="i" id="i" type="text" class="validate">
          <label for="nama_pengguna">Nama Pengguna / Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="p" id="p" type="password" class="validate">
          <label for="kata_sandi">Kata Sandi</label>
        </div>
      </div>
	  <div class="row">
	  <button class="btn waves-effect waves-effect waves-light orange" type="submit" name="action">Masuk</button>
	  <a href="forgotpassword" class="btn waves-effect waves-effect waves-light red">Lupa kata sandi?</a>
	  
	  <button class="btn waves-effect waves-effect waves-light blue right">Masuk dengan Facebook</button>
	  <a href="register" class="btn waves-effect waves-effect waves-light green right">Registrasi</a>
	  </div>
	</form>
  </div>
  </div>
  
  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="fonts/icons/iconjar-map.js"></script>
</body>