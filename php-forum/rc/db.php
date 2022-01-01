<?php
	if (! isset ($_DB_init)) {
		$DB = new SQLite3 ('/usr/share/cgi-data/forum/stuff.db');
		
		
		function db_getuserid ($uname) {
			global $DB;
			return $DB -> querySingle ("SELECT id FROM users WHERE uname = '$uname';");
		}
		
		
		function db_getusername ($id) {
			global $DB;
			$un = $DB -> querySingle ("SELECT uname FROM users WHERE id=$id;");
			if ($un === null) {
				return 'Unknown user';
			} else {
				return $un;
			}
		}
		
		
		function db_adduser ($uname, $pass) {
			global $DB;
		
			$id = ($DB -> querySingle ("SELECT id FROM users ORDER BY id DESC;")) + 1;
			
			//require 'rc/auth.php';
			$pass_hash = password_hash ($pass, PASSWORD_ARGON2ID, ['memory_cost' => 4096, 'time_cost' => 14, 'threads' => 1]);
			
			$DB -> exec ("INSERT INTO users (id, uname, pass) VALUES ($id, '$uname', '$pass_hash');");
			
			return $id;
		}
		
		function db_addpost ($uid, $body, $title) {
			global $DB;
			
			$pid = ($DB -> querySingle ("SELECT id FROM posts ORDER BY id DESC;")) + 1;
			
			$DB -> exec ("INSERT INTO posts (id, author_id, date, title, body) VALUES ($pid, $uid, " . time () . ", '" . sanitize_str ($title) . "', '" . sanitize_str ($body) . "');");
		}
		
		$_DB_init = true;
	}
?>
