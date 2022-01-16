<?php
	function valid_ref ($url) {
		return sanitize_str ($url) === $url;
	}
	
	function err ($msg = '') {
		if (isset ($_COOKIE ['refer'])) {
			if (valid_ref ($_COOKIE ['refer'])) {
				if ($msg === '') {
					exit ('<meta http-equiv="refresh" content="0; URL=' . $_COOKIE ['refer'] . '" />');
				} else {
					exit (
						"<p>$msg</p>" .
						'<meta http-equiv="refresh" content="1; URL=' . $_COOKIE ['refer'] . '" />'
					);
				}
			}
		}
		exit ("<p>$msg</p>");
	}
	
	function conv ($str) {
		return htmlspecialchars (stripslashes (trim ($str)));
	}
	
	function valid_username ($un) {
		return preg_match ('/[^a-zA-z0-9_\-\.]/', $un) === 0;
	}
	
	function valid_cookie ($cookie) {
		return preg_match ('/[^a-zA-Z0-9+\/\-_]/', $cookie) === 0;
	}
	
	function sanitize_str ($str) {
		return str_replace (array ('\'', "\n\n", "\r", "\n"), array ('\'\'', '<br />', '', ' '), $str);
	}
	
	function fmt_date ($date) {
		$diff = time () - $date;
		
		if ($diff < 60) {
			return "$diff seconds ago";
		} elseif ($diff < (60*60)) {
			return ceil ($diff/60) . " minutes ago";
		} elseif ($diff < (60*60*24)) {
			return ceil ($diff/(60*60)) . " hours ago";
		} elseif ($diff < (60*60*24*7)) {
			return ceil ($diff/(60*60*24)). " days ago";
		} else {
			return gmdate ('Y-m-d H:i:s', $date);
		}
	}
	
	function passhash ($pass) { return password_hash ($pass, PASSWORD_ARGON2ID, ['memory_cost' => 8096, 'time_cost' => 14, 'threads' => 1]); }
	
function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
?>
