<?php require 'rc/head.php'; ?>
<form method="post" action="rc/newuser.php">
	<label for="uname">Username:</label>
	<input type="text" name="username" id="uname">
	<label for="pass">Password:</label>
	<input type="password" name="password" id="pass">
	<button type="submit">Sign up</button>
</form>

<a href="login.php">Existing account</a>
<?php require 'rc/foot.php'; ?>
