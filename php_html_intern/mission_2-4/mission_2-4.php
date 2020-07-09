<?php
if (isset($_POST['test'])){
    $hensu = htmlspecialchars($_POST['test'], ENT_COMPAT, 'UTF-8');
	$fp = fopen("mission_2-4.txt", "a"); 
	if ($hensu !=  ""){
		if ($hensu != "コメント"){
	 		if ($hensu == "完成！"){
		fwrite($fp, "おめでとう！"."\n");
		fclose($fp);
		} else {fwrite($fp, $hensu."\n");
			fclose($fp);
				}
			}
		}
	$data = file("mission_2-4.txt");
	$cnt = count( $data );
	if ($cnt < 3){
		for( $i=0 ; $i<$cnt ; $i++ ){
			echo $data[$i]."<br>";
			}
		} else {
			for( $i=0 ; $i<3 ; $i++ ){
			echo $data[$i]."<br>";
				}
				}
	}
	//カンマ区切りから配列に変換するには「explode」関数を使います。
?>

<html>
	<body>
		<meta charset = "utf-8">
		<form method = "post" action = "mission_2-4.php">
			<input type = "text" name = "test" value = "コメント">
			<input type = "submit" name = "btn" value = "送信">
		</form>
	</body>
</html>