<?php
	require '../rc/user.php';
	
	if ($loggedin_id === -1) { exit; }
	
	if (isset ($_POST ['reply'])) {
		if ($_POST ['body'] === '') { exit; }
		if (! is_numeric ($_POST ['reply'])) { exit; }
		
		db_addpost ($loggedin_id, $_POST ['body'], '', $_POST ['reply']);
	} else {
		if ($_POST ['title'] === '') { exit; }
		
		db_addpost ($loggedin_id, $_POST ['body'], $_POST ['title']);
	}
	
	header ('Content-Type: text/plain');
?>
