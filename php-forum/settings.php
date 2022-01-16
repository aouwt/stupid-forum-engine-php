<?php require 'rc/head.php'; ?>
<?php
	require 'rc/db.php';
	if ($loggedin_id === -1) { exit ('Error: not logged in!'); }
?>

<form action="rc/settings.php" method="post">
	<fieldset>
		<legend>user options</legend>
		<label for="pronouns">my pronouns are:</label>
		<input type="text" name="pronouns" id="pronouns" value="<?php echo db_getpronouns ($loggedin_id); ?>" />
	</fieldset>
	<br />
	<fieldset>
		<legend>change password</legend>
		<label for="newpass">new password: </label>
		<input type="password" name="newpass" id="newpass" />
		<br />
		<label for="newpass_2">confirm new password: </label>
		<input type="password" name="newpass_2" id="newpass_2" />
		<br /><br />
		<label for="oldpass">old password: </label>
		<input type="password" name="oldpass" id="oldpass" />
	</fieldset>
	<br />
	<button type="submit">apply changes</button>
</form>
