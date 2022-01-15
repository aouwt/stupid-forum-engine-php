<?php require 'rc/head.php'; ?>
<?php
	require 'rc/db.php';
	if ($loggedin_id === -1) { exit ('Error: not logged in!'); }
?>

<form action="rc/settings.php" method="post">
	<fieldset>
		<legend>User options</legend>
		<label for="pronouns">my pronouns are:</label>
		<input type="text" name="pronouns" id="pronouns" value="<?php echo db_getpronouns ($loggedin_id); ?>" />
		<br />
		
		<!--<label for="username">Change username:</label>
		<input type="text" id="username" name="username" value="<?php echo db_getusername ($loggedin_id); ?>" />-->
	</fieldset>
	<hr />
	<fieldset>
		<legend>Change password</legend>
		<label for="newpass">new password</label>
		<input type="password" name="newpass" id="newpass" />
		<br />
		<label for="oldpass">old password</label>
		<input type="password" name="oldpass" id="oldpass" />
	</fieldset>
</form>
