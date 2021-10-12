<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品の追加確認</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h3>商品追加の確認</h3>
    <?php
    //商品の追加内容を受け取る
    $genre = $_POST['genre'];

    $gobackURL = "goods_add.php";

    // 簡単なエラー処理
    $errors = [];
    if (!isset($_POST["genre"])||($_POST["genre"]==="")){
    $errors[] = "商品名が空です。";
    }
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


    echo "ジャンル名 ",$genre,"<br>";
    $product_name = $_POST['product_name'];
    echo "商品名 ",$product_name;
    ?>
    <p>よろしければ追加を押してください</p>
    <form method="POST" action="goods_add_output.php">
        <input  type="hidden" name="genre" value="<?php echo $genre; ?>" >
        <input  type="hidden" name="product_name" value="<?php echo $product_name; ?>" >
        <ul>
            <li><input type="submit" value="追加"></li>
            
</body>

</html>