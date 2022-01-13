<?php
	require 'common.php';
	
	if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
		require 'user.php';
		
		if ($loggedin_id != -1) {
			if (isset ($_POST ['reply'])) {
				if ($_POST ['text'] === '') {
					err ('can\'t post empty reply');
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
