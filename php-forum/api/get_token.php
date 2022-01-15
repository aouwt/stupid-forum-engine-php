<?php
	require '../rc/common.php';
	
	$uid = $_POST ['uid'];
	
	if (! isnumeric ($uid)) { exit; }
	
	require 'db.php';
	
	$pass_hash = $DB -> querySingle ("SELECT pass FROM users WHERE id = $uid;");
	if (! password_verify (conv ($_POST ['pass']), $pass_hash)) { exit; }
	
	require 'auth.php';
	
	auth_authuser ($uid);
	header ('Content-Type: text/plain');
	echo $_COOKIE ['sess'];
?>
