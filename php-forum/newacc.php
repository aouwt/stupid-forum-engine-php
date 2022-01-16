<?php
	$noredir = true;
?>
<?php require 'rc/head.php'; ?>
<form method="post" action="rc/newuser.php">
	<label for="uname">Username:</label>
	<input type="text" name="username" id="uname" />
	<label for="pass">Password:</label>
	<input type="password" name="password" id="pass" />
	<label for="pass_2">Confirm password:</label>
	<input type="password" name="password_2" id="pass_2" />
	<button type="submit">Sign up</button>
</form>

<a href="login.php">Existing account</a>
<?php require 'rc/foot.php'; ?>
