<?php require 'rc/head.php'; ?>
<?php
	if (isset ($_COOKIE ['sess'])) {
		if (valid_cookie ($_COOKIE ['sess'])) {
			$DB -> exec ("DELETE FROM tokens WHERE token = '" . $_COOKIE ['sess'] . "';");
		}
	}
	setcookie ("sess", "", time () - 3600);
?>
You have been logged out.
