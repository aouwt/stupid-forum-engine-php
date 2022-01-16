<?php
	require '../rc/db.php';
	
	if (! is_numeric ($_GET ['id'])) { exit; }
	$pid = $_GET ['id'];
	
	$r = $DB -> querySingle ("SELECT * FROM posts WHERE id = $pid;", true);
	
	$json ['post'] = $r;
	$json ['replies'] = array ();
	
	$rep = $DB -> query ("SELECT * FROM posts WHERE parent = $pid");
	$i = 0;
	while ($re = $rep -> fetchArray (SQLITE3_ASSOC)) {
		$re ['author'] = db_getuserinfo ($re ['author_id']);
		unset ($re ['author_id']);
		$json ['replies'] [$i ++] = $re;
	}
	
	header ('Content-Type: application/json');
	echo json_encode ($json);
?>
