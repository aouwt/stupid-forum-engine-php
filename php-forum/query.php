<?php require 'rc/head.php'; ?>
<?php
	require 'rc/html.php';
	
	$q = 'SELECT id FROM posts WHERE 1 = 1';
	
	if (isset ($_GET ['uid'])) {
		$t = $_GET ['uid'];
		if (is_numeric ($t)) { $q .= " AND author_id = $t"; }
	}
	
	if (isset ($_GET ['id'])) {
		$t = $_GET ['id'];
		if (is_numeric ($t)) { $q .= " AND id = $t"; }
	}
	
	if (isset ($_GET ['q'])) {
		$t = conv (sanitize_str ($_GET ['q']));
		$q .= " AND (body LIKE '%$t%' OR title LIKE '%$t%')";
	}
		
	
	$r = $DB -> query ($q . " ORDER BY date DESC;");
	
	$pid = $r -> fetchArray (SQLITE3_NUM);
	if ($pid === false) {
		echo '<p style="text-align:center; font-style:oblique;">there is no content to display</p>';
		goto done;
	}
loop:
	echo html_renderpost ($pid [0]);
	echo '<hr />';

	$pid = $r -> fetchArray (SQLITE3_NUM);
	if ($pid === false) { goto done; }

	goto loop;
	
done:
	
?>
<?php require 'rc/foot.php'; ?>
