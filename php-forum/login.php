<?php require 'rc/head.php'; ?>
<form method="post" action="rc/login.php">
	<label for="uname">Username:</label>
	<input type="text" name="username" id="uname">
	<label for="pass">Password:</label>
	<input type="password" name="password" id="pass">
	<button type="submit">Log in</button>
</form>

<a href="/php-forum/newacc.php">New account</a>

<?php require 'rc/foot.php'; ?>
