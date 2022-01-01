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
		
		
		$_DB_init = true;
	}
?>
