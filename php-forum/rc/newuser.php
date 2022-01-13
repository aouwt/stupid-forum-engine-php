<?php
	if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
		$uname = strtolower ($_POST ['username']);
		if (! valid_username ($uname)) {
			echo 'invalid username';
			goto invalid_username;
		}
		
		require 'db.php'; // init db
		
		if ($DB -> querySingle ("SELECT pass FROM users WHERE uname = '$uname';") != null) {
			echo 'Invalid username';
			goto invalid_username;
		}
		
		$id = db_adduser ($uname, $_POST ['password']);
		
		
		require 'auth.php';
		
		auth_authuser ($id);
		echo 'Log-in successful. You are now logged in.';
	}
?>
