<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>場所・日時の追加</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="index.html">ホーム</a>
    <a href="home.html">企業マイページ</a>
    <a href="goods_add.php">商品一覧・追加</a>
    <a href="date_time.php">場所・日時一覧・追加</a>
    <a href="request.php">要望一覧</a><br>
    <HR>

    <?php
    require_once("db_connect.php");

    //追加内容を受け取る
    $place = $_POST['place'];
    $date = $_POST['date'];

    //SQL文を作る
    $sql = "INSERT INTO area(date,place) VALUE(:date,:place)";
    // プリアドステートメントを作る
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':date', $date, PDO::PARAM_STR);
    $stm->bindValue(':place', $place, PDO::PARAM_STR);
    // SQL文を実行する
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    echo "場所 ",$place,"<br>";
    echo "日時 ",$date,"<br>"; 
    echo "場所・日時を追加しました";

    ?>

</body>
</html>