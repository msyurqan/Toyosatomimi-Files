<?php
include 'includes/miko.functions.php';
include 'includes/miko.inc.php';
include 'includes/connect.php';

	$username = get_username();
	$pic = "miko.png"; //sementara
	
	if (!isset($username)) { //TODO : Fix dengan check_login
		header('location:login?redirect=myfiles');
	}
	
?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Berkas Saya - Mikofile.tk</title>

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
		  <li><a href="#!" onclick="showPage()">Thumbs</a></li>
		  <li><a href="#!" onclick="showPageList()">List</a></li>
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
		<li class="bold"><a href="#!" onclick="showPage()">Thumbs</a></li>
		<li class="bold"><a href="#!" onclick="showPageList()">List</a></li>
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
<div id="loader">
<center>
<br><br><br><br><br><br>
  <div class="preloader-wrapper big active">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
 </center>
  </div>
<!-- Thumbs Type (STILL BETA DOESN'T RESPONSIVE ON DESKTOP!) -->
<div style="display:none;" id="file_content" class="section no-pad-bot animate-bottom">
<div class="container">
	<?php
		$sql = mysql_query("SELECT * FROM miko_files WHERE ownerfile = '$username' ORDER BY datecreated DESC");
		if(mysql_num_rows($sql) > 0){
			$no = 1;
			while($data = mysql_fetch_assoc($sql)){
				$file_name = $data['filename'];
				$file_url = $data['downloadlink'];
				$link_file = $data['source'];
				$link_download = "download?d=$file_url";
				$explode = explode('.',$file_name);
				$extensi= $explode[count($explode)-1];
				$image_array = array('jpg','png');
				$path = "download/";
				$fullPath = $path.$link_file;
				echo '
				<div class="row">
					<div class="col s12 m4">
						<div class="card small hoverable">';
						if (in_array($extensi,$image_array)) {
							echo '<div class="card-image waves-effect waves-block waves-light">
									<img class="activator" height="300px" src="'.$fullPath.'">
								 </div>';
						} else {
							echo '<div class="card-image waves-effect waves-block waves-light">
									<img class="activator" height="300px" src="blank-file.png">
								 </div>';
						}
				echo '	<div class="card-content">
						<h5 class="light">
							'.$file_name.'
							<div class="right">'.$data['datecreated'].'</div>
						</h5>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">File Info<i class="material-icons right">Close</i></span>
							<p>File name : '.$file_name.'</p>
							<p>Date Upload : '.$data['datecreated'].'</p>
							<p>Size : '.formatBytes($data['size']).'</p>
							<hr>
							<button class="btn waves-effect waves-light red modal-trigger" href="#dlgDelete'.$no.'">Hapus Berkas</button>
							<a href="'.$link_download.'" class="btn waves-effect waves-effect waves-light blue right">Download</a>
						</div>
					</div>
					</div>
				</div>
				';
			}
		} else {
			echo 'Tidak ada file.';
		}
	?>
</div>
</div>
<!-- End of Thumbs -->

<!-- List Type Something same like 2.0 but have more like highlighted -->
<div style="display:none;" id="file_content_list" class="section no-pad-bot animate-bottom">
	<div class="container">
		<table class="table" width="100%" cellpadding="3" cellspacing="0" class="highlight responsive-table centered">
			<thead>
            	<tr>
                	<th width="30">No.</th>
                    <th>Date Upload</th>
                    <th>File Name</th>
                    <th>Size</th>
					<th>Action</th>
                </tr>
			</thead>
			<tbody>
                <?php
				$sql = mysql_query("SELECT * FROM miko_files WHERE ownerfile = '$username' ORDER BY datecreated DESC");
				if(mysql_num_rows($sql) > 0){
					$no = 1;
					while($data = mysql_fetch_assoc($sql)){
						$file_name = $data['filename'];
						$file_url = $data['downloadlink'];
						$link_file = $data['source'];
						$link_download = "?u=$file_url";
						echo '
						<tr>
							<td align="center">'.$no.'</td>
							<td align="center">'.$data['datecreated'].'</td>
							<td>'.$data['filename'].'</td>
							<td align="center">'.formatBytes($data['size']).'</td>
							<td align="center"><a name="download-button" id="download-button" class="btn waves-effect waves-light center" href="?u='.$link_download.'">Unduh Berkas</a>';
						echo '<a name="register-button" id="register-button" class="btn waves-effect waves-light red modal-trigger" href="#dlgDelete'.$no.'">Hapus Berkas</a>';
						echo '</td></tr>';
						echo '<div id="dlgDelete'.$no.'" class="modal">
			<div class="modal-content">
				<h4>Hapus File<b></h4>
				<p>
				Berkas <b>'.$data['filename'].'</b> akan dihapus <b>Permanen</b>, Apa kamu yakin?
				</p>
				<form method="post" enctype="multipart/form-data" action="">
					<input type="text" name="downloadlink" id="downloadlink" value="'.$file_url.'" style="display:none;"><br>
			</div>
			<div class="modal-footer">
            <input type="submit" class="modal-action modal-close waves-effect waves-red btn-flat " value="Hapus" />
            <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat ">Tidak</a>
			</form>
		</div>
		</div>
		';
		$no++;
		}
	}else{
		echo '
		<tr>
			<td align="center" colspan="4" align="center">No Uploaded File! <a href="upload.php">Upload File</a> Now!</td>
		</tr>
		';
		}
		?>
	</tbody>
	</div>
</div>
<!-- End of List Type -->
</div>
</div>
  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="fonts/icons/iconjar-map.js"></script>
  			<script> 
			
			var myVar;

			function myFunction() {
				myVar = setTimeout(showPage, 3000);
			}

			function showPage() {
				document.getElementById("loader").style.display = "none";
				document.getElementById("file_content").style.display = "block";
				document.getElementById("file_content_list").style.display = "none";
			}
			
			function showPageList() {
				document.getElementById("file_content").style.display = "none";
				document.getElementById("file_content_list").style.display = "block";
			}
			$(document).ready(function(){
				$(".infoproduct").hide();
			});
			</script>
</body>
