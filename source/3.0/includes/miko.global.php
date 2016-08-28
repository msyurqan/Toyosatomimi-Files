<?php
	// Database Configuration
	define("miko_host", "localhost");     // The host you want to connect to.
	define("miko_username", "root");    // The database username. 
	define("miko_password", "");    // The database password. 
	define("miko_db", "miko");    // The database name.
	
	//Website Setup
	define("miko_error_log",0); // 0 = Error not show. 1 = Fatal error not show. 2 = All errors show.
	define("miko_security", 0) // Use Vaxza Gateway for security. (Don't use if your use CloudFlare or it will be conflict.)
?>