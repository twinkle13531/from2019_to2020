<html>
  <head> 
    <meta charaset="UTF-8">   
      <form action="mission_3-5.php" method="post">
      <p><input type="text" name="name"  value="<?php
                                                  if(!empty($hensyu_element_name)){
                                                    echo $hensyu_element_name;
                                                  }

                                                  ?>"
                                                  placeholder="名前"></p>



      <p><input type="text" name="comment" value="<?php
                                                  if(!empty($hensyu_element_come)){
                                                    echo $hensyu_element_come;
                                                  }

                                                  ?>"
                                                  placeholder="コメント" size="100"></p>


      <input type="hidden" name="number" value="<?php
                                                  if(!empty($_POST['hensyu'])){
                                                    echo $_POST['hensyu'];
                                                  }
                                                  
                                                  ?>"
                                                  >
      <p><input type="text" name="pass_text" placeholder="パスワード"></p>
      <input type="submit" name="send">
    </form>

    <form action="mission_3-5.php" method="post">
      <p>
      <p><input type="text" name="delete" placeholder="削除対象番号"></p>
      <p><input type="text" name="delete_password" placeholder="パスワード"></p>
      <input type="submit" name="send_delete" value="削除">

      </p>
    </form>

    <form action="mission_3-5.php" method="post">
      <p>
      <p><input type="text" name="hensyu" placeholder="編集対象番号"></p>
      <p><input type="text" name="hensyu_password" placeholder="パスワード"></p>
      <input type="submit" name="send_hensyu" value="編集">

      </p>

    </form>

    </head>
    
    <body>
    
<?php
//データベースへの接続
$dsn = 'mysql:dbname=tb210437db;host=localhost';//DBの名前、DBの場所
$user = 'tb-210437';
$password = 'h9jKn94DfG';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
//mysqli_connect( '接続ホスト名', '接続ユーザー名', '接続パスワード名', '接続データベース名' );
//PHPでデータベースを操作する場合は、まずPDOオブジェクトを生成します。この時はコンストラクタでデータベース情報を設定しておきます。 後は、そのPDOオブジェクトのメソッドでデータベースを操作するだけです。
//PDOにDBを操作する命令が入っている

//データベース内にテーブルを作成
$sql = "CREATE TABLE IF NOT EXISTS tbtest"
." ("
. "id INT AUTO_INCREMENT PRIMARY KEY,"
. "name char(32),"
. "comment TEXT"
.");";

?>

<?php
//入力
// bottonが押されたかどうか
if(isset($_POST['send'])){
    // name, commentの入力チェック
  if(!empty($_POST['name']) and !empty($_POST['comment'])) {
    //作成したテーブルに、insertを行ってデータを入力する。
    $sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
    $sql -> bindParam(':name', $name, PDO::PARAM_STR);
    $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
    $name = $_POST['name'];
    $comment = $_POST['comment']; 
    $sql -> execute();

    // データを登録
    $stmt = $pdo->query($sql);
        
  }
}
?>

<?php
//削除
if(isset($_POST['send_delete'])) {
  if(!empty($_POST['number'])) {
    //入力したデータをdeleteによって削除する。削除できているかはselectで確認する
    $id = $_POST['number'];
    $sql = 'delete from tbtest where id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }
}

?>

<?php
if(isset($_POST['send_hensyu'])){
    // name, commentの入力チェック
  if(!empty($_POST['hensyu'])) {
    //入力したデータをupdateによって編集する。編集できているかはselectで確認する
    //prepareはSQL文の準備をするメソッドで、実行するにはexcuteメソッドを使います。
    $id = $_POST['hensyu']; //変更する投稿番号
    $name = $hensyu_element_name;
    $comment = $hensyu_element_come; //変更したい名前、変更したいコメントは自分で決めること
    $sql = 'update tbtest set name=:name,comment=:comment where id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }
}
/*
//入力したデータをselectによって表示する
//sql変数に代入する処理で、tbtestテーブルに入っているデータを全て取得しています。
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
*/

?>
    
  </body>
</html>