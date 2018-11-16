<?php
$file = file_get_contents(__DIR__ . '/tests.json');
$json = json_decode($file, true);
?>

<!DOCTYPE>
<html lang="ru">
    <head>
    	<title>Домашнее задание к лекции 2.2</title>
    	<meta charset="utf-8">
    </head>
    <body>
    	<ol>
			<?php for($i = 0; $i < count($json); $i++): ?>

	            <li><a href = "test.php?id=<?php echo $i; ?>" ><?php echo $json[$i]['question']; ?></a></li>
	        <?php endfor; ?> 
         	
        </ol>


	</body>
</html>

