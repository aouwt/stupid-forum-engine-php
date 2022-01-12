<?php require 'rc/head.php'; ?>
<?php
	if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
		require 'rc/user.php';
		
		if ($loggedin_id != -1) {
			if (isset ($_POST ['reply'])) {
				if ($_POST ['text'] === '') {
					goto end;
				}
				
				
			} else {
				if ($_POST ['title'] === '') {
					echo 'Post title can\'t be empty!';
					goto end;
				}
			
			
				require 'rc/db.php';
				
				db_addpost ($loggedin_id, $_POST ['body'], $_POST ['title']);
				
				echo 'posted!';
			}
		}
	}
	
	end:
?>

<form action="<?php echo htmlspecialchars ($_SERVER ['PHP_SELF']); ?>" method="post">
	<label for="title">title:</label>
	<input type="text" name="title" id="title">
	<br />
	<label for="body">text:</label>
	<textarea name="body" id="body"></textarea>
	<br />
	<button type="submit">post</button>
</form>
<?php require 'rc/foot.php'; ?>
