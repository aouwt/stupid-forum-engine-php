<?php require 'rc/head.php'; ?>
<?php
	if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
		$uname = $_POST ['username'];
		if (! valid_username ($uname)) {
			echo 'Invalid username';
			goto invalid_username;
		}
		
		require 'rc/db.php'; // init db
		
		$pass_hash = $DB -> querySingle ("SELECT pass FROM users WHERE uname = '$uname';"); //check pass hash
		
		if (password_verify (conv ($_POST ['password']), $pass_hash)) {
			
			require 'rc/auth.php';
			
			auth_authuser (db_getuserid ($uname));
			echo 'Log-in successful. You are now logged in.';
			
		} else {
			echo 'Invalid password!';
		}
	}
	invalid_username:;
?>

<form method="post" action="<?php echo htmlspecialchars ($_SERVER ['PHP_SELF']); ?>">
	<label for="uname">Username:</label>
	<input type="text" name="username" id="uname">
	<label for="pass">Password:</label>
	<input type="password" name="password" id="pass">
	<button type="submit">Log in</button>
</form>

<a href="/php-forum/newacc.php">New account</a>

<?php require 'rc/foot.php'; ?>
