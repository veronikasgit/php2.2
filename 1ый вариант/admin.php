<?php
if(isset($_POST['button'])) {
	if (!empty($_FILES) && array_key_exists('test', $_FILES)) {
        header('Location: list.php');
	   move_uploaded_file($_FILES['test']['tmp_name'], 'tests.json');
	    echo "Файл загружен"; 
	    exit;
	} else {
	    echo "Файл не загружен";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lesson</title>
</head>
<body>

<form action="" method="POST" enctype="multipart/form-data">
	
	<div>Тест</div>
	<div><input type="file" name="test"></div>

	<input type="submit" name="button">
</form>


</body>
</html>