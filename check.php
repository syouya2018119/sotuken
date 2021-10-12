<?php
$gobackURL = "member_input.php";

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

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>確認画面</title>
</head>
<body>
    <div class="content">
        <form action="member_output.php" method="POST">
            <input type="hidden" name="check" value="checked">
            <h1>入力情報の確認</h1>
            <p>ご入力情報に変更が必要な場合、下のボタンを押し、変更を行ってください。</p>
            <p>登録情報はあとから変更することもできます。</p>
            <?php
            $name = $_POST["name"];
            $address = $_POST["address"];
            $login = $_POST["login"];
            $email = $_POST["email"];
            ?>
            <hr>
 
            <div class="control">
                <p>氏名</p>
            <?php
            $name = $_POST["name"];
            echo $name;
            ?>
            </div>

            <div class="control">
                <p>住所</p>
            <?php
            $address = $_POST["address"];
            echo $address;
            ?>
            </div>

            <div class="control">
                <p>ログインID</p>
            <?php
            $login = $_POST["login"];
            echo $login;
            ?>
            </div>
 
            <div class="control">
                <p>メールアドレス</p>
            <?php
            $email = $_POST["email"];
            echo $email;
            ?>
            </div>
            
            <br>
            <input type="button" onclick="location.href='./member_input.php'" value=" 変更する ">
            <input type="button" onclick="location.href='./member_output.php'" value=" 登録する ">
            <div class="clear"></div>
        </form>
    </div>
</body>
</html>