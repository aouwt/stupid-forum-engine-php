<?php require 'rc/head.php'; ?>
<?php
	require 'rc/html.php';
	
	$q = 'SELECT id FROM posts WHERE parent IS NULL';
	
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
	
loop:
	$pid = $r -> fetchArray (SQLITE3_NUM);
	if ($pid === false) { goto done; }
	
	echo html_renderpost ($pid [0]);
	echo '<hr />';
	goto loop;
	
done:
	
?>
<?php require 'rc/foot.php'; ?>
