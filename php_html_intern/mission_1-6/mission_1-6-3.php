<?php
$ankiword =""; //新しい変数を用意。ここに繋げていく
$Shiritori = array("しりとり","りんご","ごりら","らっぱ","ぱんだ");
foreach ($Shiritori as $word) {
	$ankiword = $ankiword . $word;
	echo $ankiword . "<br>";
	}
?>