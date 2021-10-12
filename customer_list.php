<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品一覧・追加</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="index.html">ホーム</a>
    <a href="home.html">企業マイページ</a>
    <a href="goods_add.php">商品一覧・追加</a>
    <a href="date_time.php">場所・日時一覧・追加</a>
    <a href="request.php">要望一覧</a>
    <a href="customer_list.php">顧客一覧</a><br>
    <HR>
    <h3>商品一覧</h3>
    <table border="1">
        <th>id</th>
        <th>ログイン名</th>
        <th>名前</th>
        <th>住所</th>
        <th>email</th>
    <?php
    require_once("db_connect.php");
    try{
        //SQL文を作る
        $sql = "select id,name,address,login,email from customer";
        //プリペアードステートメントを作る
        $stm = $pdo->prepare($sql);
        //SQL文を実行する
        $stm->execute();
        //結果の取得（連想配列で受け取る）
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row) {
    ?>
        <tr>
            <td><?= $row['id']?></td>
            <td><?= $row['login'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['email'] ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <?php
    }catch(Exception $e) {
        echo  '<span class="error">エラーがありました。</span><br>';
        echo $e->getMessage();
    }?>
    <HR>
</body>
</html>