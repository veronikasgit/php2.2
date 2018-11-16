<?php
//$number_of_test = $_GET['id'];
$file = file_get_contents(__DIR__ . '/tests.json');
$json = json_decode($file, true);
$id = $_GET['id'];
if (isset($_POST['button'])) {
	
	if ($_POST['q' . $id] === $json[$id]['rightAnswer']) {
		if (!empty($_POST['name'])) {
			echo $_POST['name'] . ", вы ответили верно!"; 	
		} else {
			echo "Верно!"; 	
		}
		
	} else {
		if (!empty($_POST['name'])) {
			echo  $_POST['name'] . ", Вы ответили неверно! Правильный ответ - {$json[$id]['rightAnswer']}";
		} else {
			echo "Неверно! Правильный ответ - {$json[$id]['rightAnswer']}"; 	
		}
				
	}
	exit;
}
	
?>

<!DOCTYPE>
<html lang="ru">
    <head>
    	<title>Домашнее задание к лекции 2.2</title>
    	<meta charset="utf-8">
        
    </head>
    <body>
    	 
<form action="" method="POST">
   <label>Введите Ваше имя <input type="text" name="name" value=""></label>

	<fieldset>
        <legend><?php echo $json[$id]['question']; ?></legend>
        <?php foreach($json[$id]['variantsOfAnswers'] as $key => $variant): ?>
            <label><input type="radio" name="<?php echo "q" . $id; ?>" value="<?php echo $key; ?>"><?php echo $variant; ?></label>
        <?php endforeach; ?> 
	    
    </fieldset>
    <button type="submit" name="button">Проверить</button>
</form>

	</body>
</html>

