<?php

var_dump($_GET); 

$file = file_get_contents(__DIR__ . '/tests.json');
$json = json_decode($file, true);
echo '<pre>';
print_r($json);

$id = $_GET['id'];
?>

<!DOCTYPE>
<html lang="ru">
    <head>
    	<title>Домашнее задание к лекции 2.2</title>
    	<meta charset="utf-8">
        
    </head>
    <body>
    	 
	   		<h2><?php echo $json[$id]['question']; ?></h2>

	    	<ol>    		
	    		<?php foreach($json[$id]['variantsOfAnswers'] as $variant): ?>
		            <li><a href = "#" ><?php echo $variant; ?></a></li>
		        <?php endforeach; ?> 
	    	</ol>

<form action="" method="GET">
   <label>Введите Ваше имя <input type="text" name="name" value=""></label>

	<fieldset>
        <legend><?php echo $json[$id]['question']; ?></legend>
        <?php foreach($json[$id]['variantsOfAnswers'] as $key => $variant): ?>
            <label><input type="radio" name="q1" value="<?php echo $key; ?>"><?php echo $variant; ?></label>
        <?php endforeach; ?> 
	    
    </fieldset>
    <button type="submit" name="button">Проверить</button>
</form>

	</body>
</html>



?>