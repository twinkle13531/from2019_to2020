<html>
	<body>
		<meta charset = "utf-8">
		<form method = "post" action = "mission_3-4.php">
			<input type = "text" name = "name" value = "名前">
			<input type = "text" name = "comment" value = "コメント">
			<input type = "submit" name = "btn1" value = "送信">
		</form>
		<form method = "post" action = "mission_3-4.php">
			<input type = "text" name = "delete_number" value = "削除対象番号">
			<input type = "submit" name = "btn2" value = "削除">
		</form>
		<form method = "post" action = "mission_3-4.php">
			<input type = "text" name = "edit_number" value = "編集対象番号">
			<input type = "submit" name = "btn3" value = "編集">
		</form>
	</body>
</html>

<?php
if (!empty($_POST["name"]) && !empty($_POST["comment"])){
	$name = $_POST["name"]; 
	$comment = $_POST["comment"];
	$postedAt = date('Y/m/d H:i:s');
	$dataFile ="mission_3-3.txt";

	if (file_exists($dataFile)) {
		$data_array = file($dataFile);//array
		$end_of_array = end($data_array);
		$count = intval(explode("<>", $end_of_array)[0]) + 1;
	} else {
		$count = 1;
		touch($dataFile);
	}

	$newData = $count."<>".$name."<>".$comment."<>".$postedAt. "\n";
	$dataFile ="mission_3-4.txt";
	$fp_a = fopen($dataFile,'a');  
    	fwrite($fp_a, $newData);  
    	fclose($fp_a);

    $data_array = file($dataFile);//array
	$cnt = count( $data_array );
	for( $i=0 ; $i<$cnt ; $i++ ){
		echo $data_array[$i]."<br>";
		}
	} elseif (!empty($_POST["delete_number"])) {
		$delete_number = $_POST["delete_number"];
		$dataFile ="mission_3-4.txt";
		$data_array = file($dataFile);//array
		$cnt = count( $data_array );
		for( $i=0 ; $i<$cnt ; $i++ ){
			if (explode("<>", $data_array[$i])[0] != $delete_number){
				$new_data_array = array();
				$new_data_array[] = $data_array[$i];
				}
			}
		$fp_w = fopen($dataFile, "a");
		foreach($new_data_array as $each_data){
			echo $each_data."<br>";
			fwrite($fp_w, $each_data."\n");
			}
			fclose($fp_w);
		} elseif (!empty($_POST["edit_number"])){
			$edit_number = $_POST["edit_number"];
			$dataFile ="mission_3-4.txt";
			$data_array = file($dataFile);//array
			$cnt = count( $data_array );
			for( $i=0 ; $i<$cnt ; $i++ ){
				if (explode("<>", $data_array[$i])[0] == $edit_number){
				$new_data_array = array();
				$new_data_array[] = $data_array[$i];
				}
			}
		}

 ?> 