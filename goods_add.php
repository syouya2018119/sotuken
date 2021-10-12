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
    <table border="1">
    <caption>商品一覧</caption>
        <th>ジャンルid</th>
        <th>ジャンル名</th>
        <th>商品id</th>
        <th>商品名</th>
    <?php
    require_once("db_connect.php");
    try{
        //SQL文を作る
        $sql = "select * from product";
        //プリペアードステートメントを作る
        $stm = $pdo->prepare($sql);
        //SQL文を実行する
        $stm->execute();
        //結果の取得（連想配列で受け取る）
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row) {
            $id = $row['id'];
    ?>
        <tr>
            <td><?= $id?></td>
            <td><?= $row['product_name'] ?></td>
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
    <?php
        //SQL文を作る
        $sql = "select * from genre";
        //プリペアードステートメントを作る
        $stm = $pdo->prepare($sql);
        //SQL文を実行する
        $stm->execute();
        //結果の取得（連想配列で受け取る）
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h3>商品の追加</h3>
    <form method="POST" action="goods_add_check.php">
        
    <table border="1">
        <tr>
        <td>ジャンル</td>
        <td><select name ="genre">
            <option value="" selected>選択してください</option>
            <?php while($result['id']){ 
            echo "<option value=",$result['id'],"selected",$result['id'],">","</option>" ;
            }
            ?>
        </selected></td>
        </tr>
         <tr>
            <td>商品名</td>
            <td><input type="text" name ="product_name"></td>
        </tr>

        <tr><td><input type="submit" value="追加"></td></tr>

    </table>
    </form>

</body>
</html>