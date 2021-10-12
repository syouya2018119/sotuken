<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>アカウント作成</title>
</head>
<body>
    <div class="content">
        <form action="member_output.php" method="POST">
            <h1>アカウント作成</h1>
            <p>当サービスをご利用するために、次のフォームに必要事項をご記入ください。</p>
            <br>
 
            <div>
                <label for="name">氏名</label>
                <input type="text" name="name" placeholder="氏名">
            </div>

            <div>
                <label for="address">住所</label>
                <input type="text" name="address">
            </div>

            <div>
                <label for="login">ログインID</label>
                <input type="text" name="login" placeholder="半角英数字">
            </div>
 
            <div>
                <label for="email">メールアドレス</label>
                <input type="email" name="email">
            </div>
 
            <div>
                <label for="password">パスワード</label>
                <input type="password" name="password">
            </div>
 
            <div>
            <input type="submit" value=" 登録する ">
            </div>
        </form>
    </div>
</body>
</html>