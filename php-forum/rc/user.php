<?php
	if (! isset ($_user_init)) {
	
	
		$loggedin_id = -1;
		
		if (isset ($_COOKIE ['sess'])) {
			require 'db.php';
			if (valid_cookie ($_COOKIE ['sess'])) {
				$loggedin_id = $DB -> querySingle ("SELECT user FROM tokens WHERE token = '" . $_COOKIE ['sess'] . "';");
			}
			if ($loggedin_id === null) { $loggedin_id = -1; }
		}
		
		
		
		$_user_init = true;
	}
?>
