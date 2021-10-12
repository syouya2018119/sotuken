<?php
require_once("db_connect.php");
$gobackURL = "member_input.php";
session_start();

// 簡単なエラー処理
$errors = [];
if (!isset($_POST["name"])||($_POST["name"]==="")){
  $errors[] = "名前が空です。";
}
if (!isset($_POST["address"])||($_POST["address"]==="")){
    $errors[] = "名前が空です。";
}
if (!isset($_POST["login"])||($_POST["login"]==="")){
    $errors[] = "名前が空です。";
}
if (!isset($_POST["email"])||($_POST["email"]==="")){
    $errors[] = "名前が空です。";
}
if (!isset($_POST["password"])||($_POST["password"]==="")){
    $errors[] = "名前が空です。";
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
}

try{
$name = $_POST["name"];
$address = $_POST["address"];
$login = $_POST["login"];
$email = $_POST["email"];
$password = $_POST["password"];
//MySQLデータベースに接続する
$sql = "INSERT INTO customer (name, login, address, password, email) VALUES (:name, :login, :address, :password, :email)";
	$stm = $pdo->prepare($sql);
	$params = array(':name' => $name, ':login' => $login, ':address' => $address, ':password' => $password,':email' => $email );

	$stm->execute($params);
}catch (Exception $e) {
    echo '<span class="error">エラーがありました。</span><br>';
    echo $e->getMessage();
    exit();
  }
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>会員登録完了</title>
</head>
<body>
    <div>
 
</div>
    <div class="content">
        <h1>会員登録が完了しました。</h1>
        <p>下のボタンよりメインメニューに移動してください。</p>
        <br><br>
        <a href="index.php"><button class="btn">ログインページに移動する</button></a>
    </div>
</body>
</html>