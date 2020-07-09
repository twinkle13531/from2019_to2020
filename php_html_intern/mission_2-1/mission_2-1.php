<?php
  if (isset($_POST['test']) && $_POST['test'] != '') {
    $x = htmlspecialchars($_POST['test']);
    echo "<p>$x を受け付けました</p>";
  }
?>s

<html>
<body>
	<meta charset = "utf-8">
	<form method = "post" action = "mission_2-1.php">
		<input type = "text" name = "test" value = "コメント">
		<input type = "submit" name = "btn" value = "送信">
	</form>
</body>
</html>