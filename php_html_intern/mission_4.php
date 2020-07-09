<?php
	//4-2以降でも毎回接続は必要。
	//$dsnの式の中にスペースを入れないこと！

	$dsn = 'mysql:dbname=tb210437db;host=localhost';
	$user = 'tb-210437';
	$password = 'h9jKn94DfG';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	
	$sql = "CREATE TABLE IF NOT EXISTS tbtest"
	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32),"
	. "comment TEXT"
	.");";
	$stmt = $pdo->query($sql);
	
	$sql ='SHOW TABLES';
	$result = $pdo -> query($sql);
	foreach ($result as $row){
		echo $row[0];
		echo '<br>';
	}
	echo "<hr>";
	
	$sql ='SHOW CREATE TABLE tbtest';
	$result = $pdo -> query($sql);
	foreach ($result as $row){
		echo $row[1];
	}
	echo "<hr>";

	$sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
	$sql -> bindParam(':name', $name, PDO::PARAM_STR);
	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
	$name = '瀬戸弘司';
	$comment = 'ぷーん'; //好きな名前、好きな言葉は自分で決めること
	$sql -> execute();
	
	$sql = 'SELECT * FROM tbtest';
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
		echo $row['id'].',';
		echo $row['name'].',';
		echo $row['comment'].'<br>';
	echo "<hr>";
	}

	$id = 1; //変更する投稿番号
	$name = "瀬戸浮雲";
	$comment = "ぷーん亭"; //変更したい名前、変更したいコメントは自分で決めること
	$sql = 'update tbtest set name=:name,comment=:comment where id=:id';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();

	$id = 2;
	$sql = 'delete from tbtest where id=:id';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();

	$sql = 'SELECT * FROM tbtest';
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
		echo $row['id'].',';
		echo $row['name'].',';
		echo $row['comment'].'<br>';
	echo "<hr>";
	}
	/*
	IF NOT EXISTSを入れないと２回目以降にこのプログラムを呼び出した際に、
	SQLSTATE[42S01]: Base table or view already exists: 1050 Table 'tbtest' already exists
	という警告が発生します。これは、既に存在するテーブルを作成しようとした際に発生するエラーです。*/
	
	/*
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)とは、データベース操作で発生したエラーを
	警告として表示してくれる設定をするための要素です。
	デフォルトでは、PDOのデータベース操作で発生したエラーは何も表示されません。
	その場合、不具合の原因を見つけるのに時間がかかってしまうので、このオプションはつけておきましょう。*/

	/*【サーバアクセスの「ユーザー名」と「パスワード」】
	佐藤史歩様
	SFTP接続の[ユーザー名]：
	tb-210437
	SFTP接続の[パスワード]：
	h9jKn94DfG*/
?>