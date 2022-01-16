<?php
	require '../rc/db.php';
	
	$json ['results'] = array ();
	
	$q = 'SELECT * FROM posts WHERE 1 = 1';
	
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
	
	$i = 0;
	while ($re = $r -> fetchArray (SQLITE3_ASSOC)) {
		$re ['author'] = db_getuserinfo ($re ['author_id']);
		unset ($re ['author_id']);
		$json ['results'] [$i ++] = $re;
	}
	
	header ('Content-Type: application/json');
	echo json_encode ($json);
?>
