<?php
	require 'common.php';
	require 'user.php';
	
	if ($loggedin_id === -1) { exit; }
	if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
		require 'db.php';
		
		if ($_POST ['newpass'] !== '') {
			if ($_POST ['newpass'] !== $_POST ['newpass_2']) {
				err ('mismatching new passwords');
			}
			
			$pass_hash = $DB -> querySingle ("SELECT pass FROM users WHERE id = $loggedin_id;");
		
		
			if (password_verify (conv ($_POST ['oldpass']), $pass_hash)) {
				$newpass = passhash ($_POST ['newpass']);
				$DB -> exec ("UPDATE users SET pass = '$newpass' WHERE id = $loggedin_id;");
				
			} else {
				err ('invaid old password');
			}
		}
		
		$prns = md_fmt ($_POST ['pronouns']);
		$DB -> exec ("UPDATE users SET prns = '$prns' WHERE id = $loggedin_id;");
	}
	
	err ();
?>
