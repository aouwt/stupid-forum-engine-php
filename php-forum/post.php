<?php require 'rc/head.php'; ?>
<form action="rc/mkpost.php" method="post">
	<label for="title">title:</label>
	<input type="text" name="title" id="title">
	<br />
	<label for="body">text:</label>
	<textarea name="body" id="body"></textarea>
	<br />
	<button type="submit">post</button>
</form>
<?php require 'rc/foot.php'; ?>
