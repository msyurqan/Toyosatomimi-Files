<?php
	session_start();
		if (isset($_SESSION['username'])) {
			if ($_SESSION['username'] = 'admin') {
				$admin_usr = $_SESSION['username'];
			} else {
				location('../index.php');
			}
		}
		require_once("../page/connection.php");
		if(isset($_POST['btnEmpty'])){
			echo 'Empty button pressed!';
		}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../page/css/bitnami.css" media="all" rel="Stylesheet" type="text/css" /> 
<link href="../page/css/all.css" rel="stylesheet" type="text/css" />

<body>
  <div class="contain-to-grid">
    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="toggle-topbar menu-icon">
          <a href="#">
            <span>Menu</span>
          </a>
        </li>
      </ul>

      <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="left">
          <li class="dashboard.php"><a href="dashboard.php">Home</a></li>
          <li class="active"><a href="account.php">Account Manager</a></li>
          <li class="setup.php"><a href="Setup.php">Setup Server</a></li>
          <li class="../logout"><a href="../logout">Logout</a></li>
        </ul>
      </section>
    </nav>
  </div>
    <div id="wrapper">
<div class="row">
  <div class="large-12 column">
  <br>
  <a href=""><input type="submit" class="button" value="Refresh"/></a>
  <input type="submit" name="btnEmpty" class="alert button" value="Empty"/>
  <table class="table" width="100%" cellpadding="3" cellspacing="0">
            	<tr>
                	<th width="30">No.</th>
                    <th width="80">Username</th>
                    <th align="left" width="70">Password</th>
					<th align="left">Email</th>
					<th width="120">Action</th>
                </tr>
                <?php
				$sql = mysql_query("SELECT * FROM user ORDER BY username DESC");
				if(mysql_num_rows($sql) > 0){
					$no = 1;
					while($data = mysql_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td	>'.$data['username'].'</td>
							<td>'.$data['password'].'</td>
							<td >'.$data['email'].'</td>
							<td align="center"><a target="_blank" href=""><input type="submit" class="button" value="Change Password"/></a><a href=""><input type="submit" name="btndelete" class="alert button" value="Delete Account"/></a></td>
							
						</tr>
						';
						$no++;
					}
				}else{
					echo '
					<tr bgcolor="#fff">
						<td align="center" colspan="4" align="center">Tidak ada data!</td>
					</tr>
					';
				}
				?>
  </div>
  </div>
</div>
</body>
</html>
