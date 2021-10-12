<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>場所・日時の確認</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php

    $gobackURL = "date_time.php";

    //追加内容を受け取る
    $pref = $_POST['pref'];
    $place = $_POST['place'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $errors=[];
    //空白かどうか
    if(!isSet($_POST["pref"])||$_POST["pref"]===""){
        $errors[] = "都道府県名が空です。";
    }
    if(!isSet($_POST["place"])||$_POST["place"]===""){
        $errors[] = "場所名が空です。";
    }
    if(!isSet($_POST["date"])||$_POST["date"]===""){
        $errors[] = "日付が空です。";
    }
    if(!isSet($_POST["time"])||$_POST["time"]===""){
        $errors[] = "時間が空です。";
    } else{
        $error ="";
    }

    //エラーがあったとき
    if (count($errors)>0){
        echo '<ol class="error">';
        foreach ($errors as $value) {
        echo "<li>", $value , "</li>";
        }
        echo "</ol>";
        echo "<hr>";
        echo "<a href=", $gobackURL, ">戻る</a>";
        exit();
  }else{
      //場所日時をつなげて表示
    $pplace = sprintf("%s%s",$pref,$place);
    $date_time =sprintf("%s %s",$date, $time);

    echo "場所 ",$pplace,"<br>";
    echo "日時 ",$date_time,"<br>"; 
    ?>
    <p>よろしければ送信を押してください</p>

    <form method="POST" action="date_time.php">
    <ul>
            <li><input type="submit" value="戻る"></li>
        </ul>
    </form>
    <form method="POST" action="date_time_output.php">
        <input type="hidden" name="place" value="<?php echo $pplace; ?>" >
        <input type="hidden" name="date" value="<?php echo $date_time; ?>" >
        <ul>
            <li><input type="submit" value="送信"></li>
        </ul>
    </form>
    <?php } ?>
</body>
</html>