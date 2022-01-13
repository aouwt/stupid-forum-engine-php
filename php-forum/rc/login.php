<?php
	if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
		$uname = $_POST ['username'];
		if (! valid_username ($uname)) {
			echo 'Invalid username';
			goto invalid_username;
		}
		
		require 'rc/db.php'; // init db
		
		$pass_hash = $DB -> querySingle ("SELECT pass FROM users WHERE uname = '$uname';"); //check pass hash
		
		if (password_verify (conv ($_POST ['password']), $pass_hash)) {
			
			require 'rc/auth.php';
			
			auth_authuser (db_getuserid ($uname));
			echo 'Log-in successful. You are now logged in.';
			
		} else {
			echo 'Invalid password!';
		}
	}
?>
