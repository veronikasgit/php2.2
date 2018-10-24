
<!DOCTYPE html>
<html>
<head>
	<title>Lesson</title>
</head>
<body>

<form action="" method="POST" enctype="multipart/form-data">
	
	<div>Тест</div>
	<div><input type="file" name="test"></div>

	<input type="submit">
</form>

<?php 
		
	if (!empty($_FILES) && array_key_exists('test', $_FILES)) {

		//$hash = md5($_FILES['test']['name'].time());
		//move_uploaded_file($_FILES['test']['tmp_name'], $hash.'.json');
		//$file = file_get_contents("$hash" .'.json');

		move_uploaded_file($_FILES['test']['tmp_name'], 'tests.json');
		header('Location: /list.php'); 
	}

?>
</body>
</html>