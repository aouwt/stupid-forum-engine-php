<?php
	if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
		require 'rc/user.php';
		
		if ($loggedin_id != -1) {
			if (isset ($_POST ['reply'])) {
				if ($_POST ['text'] === '') {
					goto end;
				}
				
				
			} else {
				if ($_POST ['title'] === '') {
					echo 'post title can\'t be empty!';
					goto end;
				}
			
			
				require 'rc/db.php';
				
				db_addpost ($loggedin_id, $_POST ['body'], $_POST ['title']);
				
				echo 'posted!';
			}
		}
	}
	
	end:
?>
