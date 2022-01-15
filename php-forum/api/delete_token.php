<?php
	require '../rc/common.php';
	
	if (isset ($_COOKIE ['sess'])) {
		if (valid_cookie ($_COOKIE ['sess'])) {
			$DB -> exec ("DELETE FROM tokens WHERE token = '" . $_COOKIE ['sess'] . "';");
		}
		
	} elseif (isset ($_POST ['token'])) {
		if (valid_cookie ($_POST ['token'])) {
			$DB -> exec ("DELETE FROM tokens WHERE token = '" . $_POST ['token'] . "';");
		}
	}
	
	header ('Content-Type: text/plain');
?>
