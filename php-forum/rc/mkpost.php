<?php
	require 'common.php';
	
	if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
		require 'user.php';
		
		if ($loggedin_id != -1) {
			if (isset ($_POST ['reply'])) {
				if ($_POST ['body'] === '') {
					err ('can\'t post empty reply');
				}
				
				if (is_numeric ($_POST ['reply'])) {
					require 'db.php';
					
					db_addpost ($loggedin_id, $_POST ['body'], '', $_POST ['reply']);
					err ('reply posted');
				}
				
			} else {
				if ($_POST ['title'] === '') {
					err ('post title can\'t be empty');
				}
			
			
				require 'db.php';
				
				db_addpost ($loggedin_id, $_POST ['body'], $_POST ['title']);
				
				err ('post posted');
			}
		}
	}
?>
