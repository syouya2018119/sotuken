<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品の追加</title>
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

    <?php
    require_once("db_connect.php");
    //商品の追加内容を受け取る
    $genre = $_POST['genre'];
    $product_name = $_POST['product_name'];
    //SQL文を作る
    $sql = "INSERT INTO product(product_name,genre_id) VALUE(:product_name,:genre_id);";
    // プリアドステートメントを作る
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':product_name', $product_name, PDO::PARAM_STR);
    $stm->bindValue(':genre_id', $genre, PDO::PARAM_STR);
    // SQL文を実行する
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    echo "商品を追加しました";

    ?>

</body>
</html>