<?php require 'rc/head.php'; ?>
<?php
	if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
		$uname = $_POST ['username'];
		if (! valid_username ($uname)) {
			echo 'Invalid username';
			goto invalid_username;
		}
		
		require 'rc/db.php'; // init db
		
		if ($DB -> querySingle ("SELECT pass FROM users WHERE uname = '$uname';") != null) {
			echo 'Invalid username';
			goto invalid_username;
		}
		
		$id = db_adduser ($uname, $_POST ['password']);
		
		
		require 'rc/auth.php';
		
		
		auth_authuser ($id);
		echo 'Log-in successful. You are now logged in.';
	}
	invalid_username:;
?>

<form method="post" action="<?php echo htmlspecialchars ($_SERVER ['PHP_SELF']); ?>">
	<label for="uname">Username:</label>
	<input type="text" name="username" id="uname">
	<label for="pass">Password:</label>
	<input type="password" name="password" id="pass">
	<button type="submit">Sign up</button>
</form>

<a href="/php-forum/login.php">Existing account</a>
<?php require 'rc/foot.php'; ?>
