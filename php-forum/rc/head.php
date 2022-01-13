<?php setcookie ('refer', $_SERVER ['REQUEST_URI']); ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="main.css">
		<title>kitforum</title>
	</head>
	<body>
		<div class="top_bar">
			<nav>
				<p class="kitforum"><a href="query.php">kitforum</a></p>
				<p>
					<form action="query.php" method="get">
						search: <input type="text" name="q">
						<button type="submit">go</button>
					</form>
				</p>
				<?php
					require 'common.php';
					require 'user.php';
					
					if ($loggedin_id == -1) {
						echo '<p>you are not logged in, you should <a href="login.php">do that</a></p>';
					} else {
						echo
							"<p>you're logged in as <a href=\"query.php?uid=$loggedin_id\">" . db_getusername ($loggedin_id) . '</a>, you can <a href="logout.php">log out</a> if you\'d like</p>' .
							'<p><a href="post.php">post a post</a> via post</p>'
						;
					}
				?>
			</nav>
		</div>
		
		<hr />
		<br />
		

