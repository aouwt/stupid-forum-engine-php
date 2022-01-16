<?php
	if (! isset ($_DB_init)) {
		$DB = new SQLite3 ('/usr/share/cgi-data/forum/stuff.db');
		require 'md.php';
		
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
		
		function db_getpronouns ($id) {
			global $DB;
			
			$un = $DB -> querySingle ("SELECT prns FROM users WHERE id = $id;");
			return $un;
		}
		
		
		function db_getuserinfo ($id) {
			global $DB;
			
			$ui = $DB -> querySingle ("SELECT id, uname, prns FROM users WHERE id = $id;", true);
			return $ui;
		}
		
		function db_getposttitle ($id) {
			global $DB;
			
			return $DB -> querySingle ("SELECT title FROM posts WHERE id = $id ;");
		}
		
		
		function db_adduser ($uname, $pass) {
			global $DB;
			
			
			$pass_hash = passhash ($pass);
			
			$DB -> exec ("INSERT INTO users (uname, pass) VALUES ('$uname', '$pass_hash');");
			
			
			$id = ($DB -> querySingle ("SELECT id FROM users WHERE uname = '$uname';"));
			return $id;
		}
		
		function db_addpost ($uid, $body, $title, $parent = 'NULL') {
			global $DB;
			
			if ($title === '') {
				$title = db_getposttitle ($parent);
			} else {
				$title = md_fmt ($title);
			}
			
			$DB -> exec ("INSERT INTO posts (parent, author_id, date, title, body) VALUES ($parent, $uid, " . time () . ", '" . $title . "', '" . md_fmt ($body) . "');");
		}
		
		$_DB_init = true;
	}
?>
