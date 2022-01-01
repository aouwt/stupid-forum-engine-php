<?php
	if (! isset ($_user_init)) {
	
	
		$loggedin_id = -1;
		
		if (isset ($_COOKIE ['sess'])) {
			require 'rc/db.php';
			if (! sanitize_cookie ($_COOKIE ['sess'])) {
				$loggedin_id = $DB -> querySingle ("SELECT user FROM tokens WHERE token = '" . $_COOKIE ['sess'] . "';");
			}
		}
		
		
		
		$_user_init = true;
	}
?>
