<?php
	include_once 'miko.functions.php';
	include_once 'connect.php';
	$err = false;
	
	if (isset($_POST['u'], $_POST['e'], $_POST['p'])) {
		$username = filter_input(INPUT_POST, 'u', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'e', FILTER_SANITIZE_EMAIL);
		$password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
		
		// Check Email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$err = true; // Invalid Email
		}
		
		// Check Password
		if (strlen($password) < 6) {
			$err = true; // Password must be length 6 or more
		}
		
		//Check Exist Username
		$IsAvaliable = mysql_query("SELECT * FROM miko_user WHERE username = '$u'");
		if(mysql_num_rows($IsAvaliable) <> 0) {
			$err = true; // Username aleardy exist
		}
		
		//Check Exist Email
		$IsAvaliable = mysql_query("SELECT * FROM miko_user WHERE email = '$e'");
		if(mysql_num_rows($IsAvaliable) <> 0) {
			$err = true; // Email aleardy registered
		}
		
		//BEGIN
		if ($err==false) {
			// Your can use other hash to make activate code, but randomize is best choice i guess...
			$md5_hash = md5(rand(0,999));
			$sc_activate = substr($md5_hash, 20, 30);
			
			$query = mysql_query("INSERT INTO miko_user(username,password,email,urlprofile,activate,avatar_source,status,bio) VALUES ('$username','$password','$email','$username','$sc_activate','default-user.png','1','Hi I am new user!')");
			if ($query) {
				header('Location:../login?redirect=success');
			} else {
				header("Location:../error.php?err=invalid-request");
			}
		}
	}
?>