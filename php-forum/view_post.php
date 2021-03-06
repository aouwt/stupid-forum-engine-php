<?php require 'rc/head.php'; ?>
<?php
	require 'rc/html.php';
	
	if (isset ($_GET ['id'])) {
		$t = $_GET ['id'];
		if (is_numeric ($t)) { $pid = $t; } else { exit; }
	}

	echo html_renderpost ($pid);
	echo '<hr />';
	
	
	$r = $DB -> query ("SELECT body, author_id, date FROM posts WHERE parent = $pid;");
	
loop:
	$re = $r -> fetchArray (SQLITE3_NUM);
	if ($re === false) { goto done; }
	
	echo
		'<div class="reply">' .
			'<p id="name">' . html_renderusername ($re [1]) . ', ' . fmt_date ($re [2]) . ':</p> <p id="content">' . $re [0] . '</p>' .
		'</div>'
	;
	goto loop;
	
done:

	if ($loggedin_id !== -1) {
		echo
			'<form action="rc/mkpost.php" method=post> ' .
				"<input type=hidden name=reply value=$pid /> " .
				'<label for=reply>reply:</label><br />' .
				'<textarea name=body id=reply></textarea> ' .
				'<button type=submit>post</button> ' .
			'</form>'
		;
	}
?>
<?php require 'rc/foot.php'; ?>
