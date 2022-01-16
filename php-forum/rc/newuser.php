<?php
	require 'common.php';
	
	if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
		
		if ($_POST ['password'] !== $_POST ['password_2') {
			err ('passwords do not match');
		}
		
		$uname = strtolower ($_POST ['username']);
		if (! valid_username ($uname)) {
			err ('invalid username');
		}
		
		require 'db.php'; // init db
		
		if (($DB -> querySingle ("SELECT pass FROM users WHERE uname = '$uname';")) !== null) {
			err ('invalid username');
		}
		
		$id = db_adduser ($uname, $_POST ['password']);
		
		
		require 'auth.php';
		
		auth_authuser ($id);
		err ('log-in successful; you are now logged in.');
	}
?>
