<?php require 'rc/head.php'; ?>
<?php
	require 'rc/html.php';
	
	if (isset ($_GET ['id'])) {
		$t = $_GET ['id'];
		if (is_numeric ($t)) { $pid = $t; }
	}

	echo html_renderpost ($pid);
	echo '<hr />';
	
	$r = $DB -> query ("SELECT body, user, date FROM replies WHERE parent = $pid;");
	
loop:
	$re = $r -> fetchArray (SQLITE3_NUM);
	if ($re === false) { goto done; }
	
	echo
		'<div class="reply">' .
			'<p><a href="query.php?uid=' . $re [1] . '">' . db_getusername ($re [1]) . '</a> ' . fmt_date ($re [2]) . ': ' . $re [0] . '</p>';
		'<hr />'
	;
	goto loop;
	
done:

	if ($loggedin_id != -1) {
		echo
			'<form action="post.php" method=post>' .
				"<input type=hidden name=reply value=$pid />" .
				'<label for=reply>reply</label>' .
				'<textarea name=body id=reply></textarea>' .
				'<button type=submit>post</button>' .
			'</form>'
		;
	}
?>
<?php require 'rc/foot.php'; ?>
