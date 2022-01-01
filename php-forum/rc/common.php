<?php
	function conv ($str) {
		return htmlspecialchars (stripslashes (trim ($str)));
	}
	
	function sanitize_username ($un) {
		return preg_match ('/[a-zA-z0-9_\-.]/', $un) == false;
	}
	
	function sanitize_cookie ($cookie) {
		return preg_match ('/[a-zA-Z0-9+\/\-_]/', $cookie) == false;
	}
	
	
?>
