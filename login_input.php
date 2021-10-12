<?php 
require("./db_connect.php");
session_start();
 
if (!empty($_POST)) {
    /* 入力情報の不備を検知 */
    if ($_POST['login'] === "") {
        $error['login'] = "blank";
    }
    if ($_POST['password'] === "") {
        $error['password'] = "blank";
    }
    
 
    /* エラーがなければ次のページへ */
    if (!isset($error)) {
        $_SESSION['customer'] = $_POST;   // フォームの内容をセッションで保存
        header('Location: login_output.php');   // login_output.phpへ移動
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ログイン</title>
</head>
<body>
    <div class="content">
        <form action="login_output.php" method="POST">
            <h1>ログイン</h1>
            <br>
 
            <div class="control">
                <label for="login">ログインID</label>
                <input id="login" type="text" name="login">
                <?php if (!empty($error["login"]) && $error['login'] === 'blank'): ?>
                    <p class="error">＊ログインIDを入力してください</p>
                    
                    <?php endif ?>
            </div>
 
            <div class="control">
                <label for="password">パスワード</label>
                <input id="password" type="password" name="password">
                <?php if (!empty($error["password"]) && $error['password'] === 'blank'): ?>
                    <p class="error">＊パスワードを入力してください</p>
                <?php endif ?>
            </div>
 
            <div class="control">
                <button type="submit" class="btn">確認する</button>
            </div>
        </form>
    </div>
</body>
</html>