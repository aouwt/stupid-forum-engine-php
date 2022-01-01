<?php
	if (! isset ($_auth_init)) {
		require 'rc/db.php';
		
		
		function auth_gentoken () {
			return str_replace (array ('+', '/', '='), array ('-', '_', ''), base64_encode (random_bytes (24)));
		}
		
		
		function auth_authuser ($id) {
			global $DB;
			
			
			if (isset ($_COOKIE ['sess'])) {
				if (! sanitize_cookie ($_COOKIE ['sess']) {
					$DB -> exec ("DELETE FROM tokens WHERE token = '" . $_COOKIE ['sess'] . "';");
				}
			}

			$tok = auth_gentoken ();
			$expiry = time () + (60*60*24*30);
			
			setcookie ('sess', $tok, $expiry);
			$DB -> exec ("INSERT INTO tokens (user, token, expiry) VALUES ($id, '$tok', $expiry);");
		}
		
		$_auth_init = true;
	}
