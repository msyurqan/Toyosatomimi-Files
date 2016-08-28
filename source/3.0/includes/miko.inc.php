<?php
	include_once 'miko.global.php';
	
	error_reporting(miko_error_log);
	
	if (miko_security==1) {
		include('includes/vaxza.gateway.php');
	}
?>