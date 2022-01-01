<?php
	function conv ($str) {
		return htmlspecialchars (stripslashes (trim ($str)));
	}
	
	function valid_username ($un) {
		return preg_match ('/[^a-zA-z0-9_\-\.]/', $un) == false;
	}
	
	function valid_cookie ($cookie) {
		return preg_match ('/[^a-zA-Z0-9+\/\-_]/', $cookie) == false;
	}
	
	
?>
