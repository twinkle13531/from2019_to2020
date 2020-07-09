<?php
$hensu = "helllo world";
$filename = "mission_1-2.txt";
$fp = fopen($filename, "a");
fwrite($fp, $hensu);
fclose($fp);
?>