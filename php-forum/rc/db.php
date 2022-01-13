<?php
	if (! isset ($_DB_init)) {
		$DB = new SQLite3 ('/usr/share/cgi-data/forum/stuff.db');
		
		
		function db_getuserid ($uname) {
			global $DB;
			return $DB -> querySingle ("SELECT id FROM users WHERE uname = '$uname';");
		}
		
		
		function db_getusername ($id) {
			global $DB;
			$un = $DB -> querySingle ("SELECT uname FROM users WHERE id = $id;");
			if ($un === null) {
				return 'Unknown user';
			} else {
				return $un;
			}
		}
		
		
		function db_adduser ($uname, $pass) {
			global $DB;
			
			
			$pass_hash = password_hash ($pass, PASSWORD_ARGON2ID, ['memory_cost' => 4096, 'time_cost' => 14, 'threads' => 1]);
			
			$DB -> exec ("INSERT INTO users (uname, pass) VALUES ('$uname', '$pass_hash');");
			
			
			$id = ($DB -> querySingle ("SELECT id FROM users WHERE uname = '$uname';"));
			return $id;
		}
		
		function db_addpost ($uid, $body, $title, $parent = 'NULL') {
			global $DB;
			
			$DB -> exec ("INSERT INTO posts (parent, author_id, date, title, body) VALUES ($parent, $uid, " . time () . ", '" . sanitize_str ($title) . "', '" . sanitize_str ($body) . "');");
		}
		
		$_DB_init = true;
	}
?>
