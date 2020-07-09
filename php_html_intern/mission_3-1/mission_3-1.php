<?php 
$dataFile ='mission_3-1.txt'; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $name = ($_POST['name']); 
    $comment = ($_POST['comment']); 
    $postedAt = date('Y/m/d H:i:s'); 
    $newData = (sizeof(file($dataFile)) + 1)."<>".$name."<>".$comment."<>".$postedAt. "\n"; 
    $fp = fopen($dataFile,'a');  
    	fwrite($fp, $newData);  
    	fclose($fp);  
 	}  
 ?> 


<html>
	<body>
		<meta charset = "utf-8">
		<form method = "post" action = "mission_3-1.php">
			<input type = "text" name = "name" value = "名前">
			<input type = "text" name = "comment" value = "コメント">
			<input type = "submit" name = "btn" value = "送信">
		</form>
	</body>
</html>
