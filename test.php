<?php 
$filelist = glob('tests/*.json');

echo '<a href="list.php">Перейти к списку тестов</a>' . '<br>';
echo '<a href = "admin.php">Загрузить новый тест</a>' . '<br>';
echo '<Hr>';
if (isset($_GET['key'])) {
	$id = $_GET['key'];

foreach ($filelist as  $key => $filename) {
	if ($key == $id) {	
		$file = file_get_contents($filename);
		$json = json_decode($file, true);
	}

}
} else {
	echo "Вы не выбрали тест. Вернуться к " . '<a href="list.php">списку тестов</a>';
	exit;
}


$i = 0;
if (isset($_POST['button'])) {

	// if (isset($_SESSION['login']) && ($_SESSION['login'] !== "guest")) {
	// 	echo '<br>' . $_SESSION['login'] . "!" . '<br>' . '<hr>'; 
	// } 

	$mark = 0;
	foreach($json as $number => $questions) {
	
		if (empty($_POST['q' . $number])) {
			
			echo $questions['question'] . " - Вы не ответили на данный вопрос" . '<br>';

		} elseif ($_POST['q' . $number] === $questions['rightAnswer']) {

			echo $questions['question'] . " - Вы ответили верно!" . '<br>'; 	
			
			$mark++;

		} else {

				echo  $questions['question'] . " - Вы ответили неверно! Правильный ответ - {$questions['rightAnswer']}" . '<br>';					
		}

	}
	
echo '<br>' . "Правильных ответов - $mark" . '<br>';

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
		   <!-- <label>Введите Ваше имя <input type="text" name="name" value=""></label> -->

			<fieldset>

				<?php foreach($json as $number => $questions): ?>

			        <legend><?php echo $questions['question']; ?></legend>

				        <?php foreach($questions['variantsOfAnswers'] as $key => $variant): ?>
				            <label><input type="radio" name="<?php echo "q" . $number; ?>" value="<?php echo $key; ?>"><?php echo $variant; ?></label>
				        <?php endforeach; ?> 

				 <?php endforeach; ?>         
			    
		    </fieldset>
		    <button type="submit" name="button">Проверить</button>
		</form>

		<!-- <p><a href = "admin.php">Загрузить новый тест</a></p>
		
		<p><a href = "list.php">Перейти к списку тестов</a></p>
 -->
</body>
</html>



