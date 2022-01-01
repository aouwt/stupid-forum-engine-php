<?php
	if (! isset ($_DB_init)) {
		$DB = new SQLite3 ('/usr/share/cgi-data/forum/stuff.db');
		
		
		function db_getuserid ($uname) {
			global $DB;
			return $DB -> querySingle ("SELECT id FROM users WHERE uname = '$uname';");
		}
		
		
		function db_getusername ($id) {
			global $DB;
			return $DB -> querySingle ("SELECT uname FROM users WHERE id=$id;");
		}
		
		
		function db_adduser ($uname, $pass) {
			global $DB;
		
			$id = ($DB -> querySingle ("SELECT id FROM users ORDER BY id DESC;")) + 1;
			
			//require 'rc/auth.php';
			$pass_hash = password_hash ($pass, PASSWORD_ARGON2ID, ['memory_cost' => 4096, 'time_cost' => 14, 'threads' => 1]);
			
			$DB -> exec ("INSERT INTO users (id, uname, fname, pass) VALUES ($id, '$uname', '$uname', '$pass_hash');");
			
			return $id;
		}
		
		$_DB_init = true;
	}
?>
