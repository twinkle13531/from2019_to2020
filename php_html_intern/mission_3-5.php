
<?php
$filename='mission_3-5.txt';
if(isset($_POST['send_hensyu'])){
      $pass=file($filename);
      $pass_keys=explode("<>",$pass[$_POST['hensyu']-1]);

      if($pass_keys[4]==$_POST['hensyu_password']){

       //編集選択
       if(!empty($_POST['hensyu']) and isset($_POST['send_hensyu'])){

         $texts_hensyu=file($filename);
         foreach((array)$texts_hensyu as $key_hensyu=>$val_hensyu){
           $text_hensyu=explode("<>",$val_hensyu);
           if($text_hensyu[0]==$_POST['hensyu']){
              $hensyu_element_name=$text_hensyu[1];
              $hensyu_element_come=$text_hensyu[2];
            }
          }
        }


      }else{
      echo "パスワードが違います。";
      }
    }
?>

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
      $filename='mission_3-5.txt';
      //削除機能
      if(isset($_POST['send_delete'])){
        $pass=@file($filename);
        $pass_keys=explode("<>",$pass[$_POST['delete']-1]);


        if($pass_keys[4]==$_POST['delete_password']){
      	 //削除
      	 if(!empty($_POST['delete']) and isset($_POST['send_delete'])){
        	 $texts_delete=file($filename);

        	 foreach($texts_delete as $key_delete=>$val_delete){
        		  $texts_delete_element=explode("<>",$val_delete);

        	     if($texts_delete_element[0]==$_POST['delete']){
        		      unset($texts_delete[$key_delete]);
        	     }

        	 }

        	 file_put_contents("mission_3-5.txt",$texts_delete);//上書き

        	 }

        }else if(ctype_digit($_POST['delete']) ){
          echo "パスワードが違います。";

        }else{
        	echo "数字を入力してください。";

      	}

      }
    
    if(!empty($_POST['number'])){
      $pass=@file($filename);
      $pass_keys=explode("<>",$pass[$_POST['number']-1]);

      if($pass_keys[4]==$_POST['pass_text']){
      	//編集実行
      		if($_POST['number']){
        		$texts_hensyu=@file($filename);
        		foreach((array)$texts_hensyu as $key_hensyu=>$val_hensyu){
        			$text_hensyu=explode("<>",$val_hensyu);
        		  if($text_hensyu[0]==$_POST['number']){
        			  array_splice($texts_hensyu,$key_hensyu,1,$_POST['number']."<>".$_POST['name']."<>".$_POST['comment']."<>".date("H/m/d G:i:s")."<>".$_POST['pass_text']."<>"."\n");//配列書き換え
        		  }
        		}
        	file_put_contents("mission_3-5.txt",$texts_hensyu);//上書き
      		}
      }else{
      echo "パスワードが違います。";
      }
    }

    //出力機能
    if(isset($_POST['send']) and empty($_POST['number'])){

      $fp=fopen($filename,'a');

      $texts_comment=file($filename);
      $keys_comment=end($texts_comment);

      $keys_comment_ele=explode("<>", $keys_comment);

      $number=(int)$keys_comment_ele[0]+1;


      $k=$number."<>".$_POST['name']."<>".$_POST['comment']."<>".date("H/m/d G:i:s")."<>".$_POST['pass_text']."<>";

      fwrite($fp,$k."\n");
      fclose($fp);


    }
    

      $filename='mission_3-5.txt';
      $texts_export=file($filename);
        foreach((array)$texts_export as $text_export){

          $keys_export=explode("<>",$text_export);
          $keys_export_num=count($keys_export);
          foreach($keys_export as $key_export=>$val_export){
            if($key_export!==$keys_export_num-2){
              echo $val_export." ";
            }
          }
          echo "<br>";
        }

    ?>
  </body>
</html>