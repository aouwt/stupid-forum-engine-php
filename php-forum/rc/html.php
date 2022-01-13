<?php
	require 'db.php';
	
	function html_renderpost ($postid) {
		global $DB;
		
		$q = $DB -> querySingle ("SELECT title, author_id, date, body FROM posts WHERE id = $postid;", true);
		
		$title = $q ['title'];
		$author_id = $q ['author_id'];
		$author = db_getusername ($author_id);
		$date = fmt_date ($q ['date']);
		$body = $q ['body'];
		
		
		return "<h1><a href=\"view_post.php?id=$postid\">$title</a></h1> <i>by <a href=\"query.php?uid=$author_id\">$author</a></i> ($date)<br /><p>$body</p>";
	}
?>
