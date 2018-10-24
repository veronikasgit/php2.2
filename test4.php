<?php

//session_start();

$json = file_get_contents(__DIR__ . '/1.json');
$data = json_decode($json, true);
echo '<pre>';

print_r($_GET) ;
echo '</pre>';

//echo $item['question'] . '<br>';
	/*foreach ($item['variantsOfAnswers'] as $letter => $value) {
		echo $value. '<br>';
	};*/
$x = $_GET['id'];

//foreach ($data as $item) {
	//foreach ($item as $value) {
$variantsOfAnswers = $data[$x][$x]['variantsOfAnswers'];
//var_dump($variantsOfAnswers);
	//foreach ($variantsOfAnswers  as $letter => $value) {
	

$a = $variantsOfAnswers['a'];
$b = $variantsOfAnswers['b'];
$c = $variantsOfAnswers['c'];
$d = $variantsOfAnswers['d'];
	//for ($i = 0; $i < count($variantsOfAnswers); $i++){
		//echo "$a". '<br>';
		//echo "$b". '<br>';
		//echo "$c". '<br>';
		//echo "$d". '<br>';
//echo $variantsOfAnswers[$index]. '<br>';
$question = $data[$x][$x]['question'];

$rightAnswer = $data[$x][$x]['rightAnswer'];


session_start();

if (isset($_GET['q1'])) {
	
$_SESSION['variantsOfAnswers'] = $_GET['q1'];
	
}

echo 'Правильный ответ' . $rightAnswer . '<br>';
echo 'Ваш ответ' . $_SESSION['variantsOfAnswers'] . '<br>';

if ($_SESSION['variantsOfAnswers'] == $rightAnswer) {
		 	echo "Верно";
		 	exit; 
			} else {
			echo "НеВерно"; 
			exit;
			};
 
?>
 
<h4>Ответьте на вопрос</h4>
<form action="" method="GET" enctype="multipart/form-data">
   <label>Введите Ваше имя <input type="text" name="name" value=""></label>


	<fieldset>
        <legend><?php echo $question; ?></legend>
	    <label><input type="radio" name="q1" value="$a"><?php echo $a; ?></label>
	    <label><input type="radio" name="q1" value="$b"><?php echo $b; ?></label>
	    <label><input type="radio" name="q1" value="$c"><?php echo $c; ?></label>
	    <label><input type="radio" name="q1" value="$d"><?php echo $d; ?></label>
    </fieldset>
    <button type="submit" name="button">Проверить</button>
</form>