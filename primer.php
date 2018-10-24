
<!DOCTYPE html>
<html>
<head>
	<title>Lesson</title>
</head>
<body>

<form action="" method="POST" enctype="multipart/form-data">
	<div>Имя</div>
	<div><input type="text" name="name"></div>

	<div>Фамилия</div>
	<div><input type="text" name="surname"></div>

	<div>Возраст</div>
	<div><input type="text" name="age"></div>

	<div>Аватар</div>
	<div><input type="file" name="avatar"></div>

	<input type="submit">
</form>


<?php 
if (!empty($_POST)) {
	if (array_key_exists('age', $_POST)) {
		$options  = [
			'options' => [
				'min_range' => 18,
			'max_range' => 150
			]			
		];

	$validate = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, $options);

	if ($validate === false) {
		echo "Данные не верны";
	} else {
		echo 'Возраст: '.$validate;	}
	}

	if (array_key_exists('name', $_POST)) {
		echo htmlspecialchars($_POST['name']);
	}
}

if (!empty($_FILES) && array_key_exists('avatar', $_FILES)) {
	$hash = md5($_FILES['avatar']['name'].time());
	move_uploaded_file($_FILES['avatar']['tmp_name'], $hash.'.jpg');

	echo '<img src = "'.$hash.'.jpg"/>';
}
?>
</body>
</html>