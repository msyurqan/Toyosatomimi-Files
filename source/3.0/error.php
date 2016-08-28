<?php
include 'includes/miko.functions.php';
include 'includes/miko.inc.php';

	$username = get_username();
	$pic = "miko.png"; //sementara

	$err = $_GET['err'];
	if (isset($err)) {
		switch ($err) {			
			case "invalid-request";
				$title = "Invalid Request";
				$content = "The correct request were not sent to our server, Please retry again.";
				break;
			case "closed-temporary";
				$title = "Closed Temporary";
				$content = "We are sorry. Server is down for an unexpected time. Please come back soon...";
				break;
			case "404";
				$title = "File not found";
				$content = "File you looking for is not found on our server, It might be deleted or changed.";
				break;
		}
	} else {
		$title = "Unexpected Error";
		$content = "Error occured when your trying something, if you sure this error our server. Please contact administrator.";
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
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header orange-text light"><?php echo $title; ?></h1>
      <div class="row">
        <h5 class="header col s12"><?php echo $content; ?></h5>
      </div>
      <br><br>
    </div>
  </div>
  <br><br><br><br><br><br><br><br><br>
   <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text"><b>Mikofile.tk</b></h5>
          <p class="grey-text text-lighten-4"></p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      &copy; 2016 Dani Pragustia
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>