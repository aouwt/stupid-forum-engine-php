<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="main.css">
		<title>Kitforum</title>
	</head>
	<body>
		<div class="top_bar">
			<form action="query.php" method="get">
				Search: <input type="text" name="q">
				<button type="submit">go</button>
			</form>
			<?php
				require 'rc/common.php';
				require 'rc/user.php';
				
				if ($loggedin_id === -1) {
					echo '<a href="login.php">Log in</a>';
				} else {
					echo "<a href=\"query.php?uid=$loggedin_id\">" . db_getusername ($loggedin_id) . '</a><a style="margin-left: 10%;" href="post.php">Create a post</a>';
				}
			?>
		</div>
		
		<hr />
		<br />
		

