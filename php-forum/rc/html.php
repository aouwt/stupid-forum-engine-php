<?php
	if (! isset ($_html_init)) {
		require 'db.php';
		
		function html_renderusername ($id) {
			global $DB;
			$q = $DB -> querySingle ("SELECT uname, prns FROM users WHERE id = $id;", true);
			
			return '<a href="query.php?uid=' . $id . '" title="' . $q ['prns'] . '">' . $q ['uname'] . '</a>';
		}
		
		function html_renderpost ($postid) {
			global $DB;
			
			$q = $DB -> querySingle ("SELECT * FROM posts WHERE id = $postid;", true);

			$parent = $q ['parent'];
			$title = $q ['title'];
			$author_id = $q ['author_id'];
			$date = fmt_date ($q ['date']);
			$body = $q ['body'];

			if ($parent !== null) {
				$rep = "<i>replying to <a href=\"view_post.php?id=$parent\">" . db_getposttitle ($parent) . '</a></i>';
			} else {
				$rep = '';
			}
			
			return
				$rep .
				"<h1><a href=\"view_post.php?id=$postid\">$title</a></h1> " .
				'<i>by ' . html_renderusername ($author_id) . "</i> ($date)<br /> " .
				"<p>$body</p>"
			;
		}
	
		$_html_init = true;
	}
?>
