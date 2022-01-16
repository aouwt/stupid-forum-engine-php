<?php if (! isset ($noredir)) { setcookie ('refer', $_SERVER ['REQUEST_URI']); } ?>
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
					require 'html.php';
					
					if ($loggedin_id == -1) {
						echo '<p><a href="login.php">log in</a></p>';
					} else {
						echo
							'<p>logged in as ' . html_renderusername ($loggedin_id) . '</p>' .
							'<p><a href="logout.php">log out</a></p>' .
							'<p><a href="post.php">post</a></p>' .
							'<p><a href="settings.php">options</a></p>'
						;
					}
				?>
			</nav>
		</div>
		
		<hr />
		<br />
		

