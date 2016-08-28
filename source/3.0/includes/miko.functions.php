<?php
include_once 'miko.global.php';
 
function sec_session_start() {
    $session_name = 'miko';   // Set a custom session name
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id(true);    // regenerated the session, delete the old one. 
}

function login($input,$password) {
include('connect.php');
	sec_session_start();
	$try1query = mysql_query("SELECT * FROM miko_user WHERE username = '$input'");
	$try1 = mysql_num_rows($try1query);
	if($try1 = 0) {
		$try2query = mysql_query("SELECT * FROM miko_user WHERE email = '$input'");
		$try2 = mysql_num_rows($try2query);
		if ($try2 = 0) {
			return false;
		} else {
			$data = mysql_fetch_assoc($try2query);
			if($password <> $data['password']) {
				return false;
			} else {
				$user_browser = $_SERVER['HTTP_USER_AGENT'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['ub'] = $user_browser;
				return true;
			}
		}
	} else {
		$data = mysql_fetch_assoc($try1query);
		if($password <> $data['password']) {
			return false;
		} else {
			$user_browser = $_SERVER['HTTP_USER_AGENT'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['ub'] = $user_browser;
			return true;
		}
	}
}

function get_username() {
	sec_session_start();
	return $_SESSION['username'];
}

function check_login() {
include('connect.php');
	sec_session_start();
	if (isset($_SESSION['username'], $_SESSION['ub'])) { // check udah login
		$username = $_SESSION['username'];
        $ub = $_SESSION['ub'];
		
		$user_browser = $_SERVER['HTTP_USER_AGENT'];
		
		$query = mysql_query("SELECT * FROM miko_user WHERE email = '$username'");
		if (mysql_num_rows($query)==0) {
			return false; //Username dah koid
		} else {
			if ($user_browser==$ub) {
				return true; //iki benar-benar user yang login
			} else {
				return false; //fuck hekel go away bitch!
			}
		}
	} else {
		return false; //user belom login
	}
}

function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

?>