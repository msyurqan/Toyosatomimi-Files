<?php
include_once 'miko.global.php';
include_once 'miko.functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['i'], $_POST['p'])) {
    $input = $_POST['i'];
    $password = $_POST['p']; // The hashed password.
	$redirect = $_GET['redirect'];
    if (login($input, $password) == true) {
        // Login success 
		if (isset($redirect)) {
			header('Location: ../'.$redirect.'');
		} else {
			header('Location: ../');
		}
    } else {
        // Login failed 
        header('Location: ../login.php?err=invalid');
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}
?>