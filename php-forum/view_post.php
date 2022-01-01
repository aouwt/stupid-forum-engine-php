<?php require 'rc/html.php'; ?>

<?php
	if (is_numeric ($_GET ['id'])) {
		echo html_renderpost ($_GET ['id']);
	}
?>
