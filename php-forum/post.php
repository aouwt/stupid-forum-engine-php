<?php require 'rc/head.php'; ?>
<?php
	if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
		require 'rc/user.php';
		
		if ($loggedin_id != -1) {
			require 'rc/db.php';
			
			db_addpost ($loggedin_id, $_POST ['body'], $_POST ['title']);
			
			echo 'Post posted!';
		}
	}
?>

<form action="<?php echo htmlspecialchars ($_SERVER ['PHP_SELF']); ?>" method="post">
	<label for="title">Post title:</label>
	<input type="text" name="title" id="title">
	<br />
	<label for="body">Content:</label>
	<textarea name="body" id="body"></textarea>
	<br />
	<button type="submit">Submit</button>
</form>
<?php require 'rc/foot.php'; ?>
