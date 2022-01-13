<?php
	require 'common.php';
	
	if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
		$uname = $_POST ['username'];
		if (! valid_username ($uname)) {
			err ('invalid username or password');
		}
		
		require 'db.php'; // init db
		
		$pass_hash = $DB -> querySingle ("SELECT pass FROM users WHERE uname = '$uname';"); //check pass hash
		
		if (password_verify (conv ($_POST ['password']), $pass_hash)) {
			
			require 'auth.php';
			
			auth_authuser (db_getuserid ($uname));
			err ('log-in successful; you are now logged in.');
			
		} else {
			err ('invalid username or password');
		}
	}
?>
