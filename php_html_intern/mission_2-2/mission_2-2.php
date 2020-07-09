<?php
 if (isset($_POST['test'])){
    $hensu = htmlspecialchars($_POST['test'], ENT_COMPAT, 'UTF-8');
	$fp = fopen("mission_2-2.txt", "w"); 
	 if ($hensu !=  ""){
	 	if ($hensu == "完成！"){
		fwrite($fp, "おめでとう！");
		fclose($fp);
		} else {fwrite($fp, $hensu);
			fclose($fp);
		}
		}
		}
?>

<html>
	<body>
		<meta charset = "utf-8">
		<form method = "post" action = "mission_2-2.php">
			<input type = "text" name = "test" value = "コメント">
			<input type = "submit" name = "btn" value = "送信">
		</form>
	</body>
</html>