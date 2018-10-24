<?php

$json = file_get_contents(__DIR__ . '/1.json');
$data = json_decode($json, true);
//echo('<pre>');
//print_r($data);

echo '<ol>';
foreach ($data as $key => $item) {
  foreach ($item as $value) {
    echo '<li><a href="test4.php?id='. $key.'">'.$value['question'].'</a></li>'.'<br>';
  };
};
echo '</ol>';
?>



