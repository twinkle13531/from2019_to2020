<?php
 if (isset($_POST['test'])){
    $hensu = htmlspecialchars($_POST['test'], ENT_COMPAT, 'UTF-8');
	$fp = fopen("mission_2-3.txt", "a"); 
	 if ($hensu !=  ""){
	 	if($hensu != "コメント"){
	 		if ($hensu == "完成！"){
		fwrite($fp, "おめでとう！"."\n");
		fclose($fp);
		} else {fwrite($fp, $hensu."\n");
			fclose($fp);
				}
			}
		}
	}
?>

<html>
	<body>
		<meta charset = "utf-8">
		<form method = "post" action = "mission_2-3.php">
			<input type = "text" name = "test" value = "コメント">
			<input type = "submit" name = "btn" value = "送信">
		</form>
	</body>
</html>