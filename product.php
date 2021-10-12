<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品一覧</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="index.html">ホーム</a>
    <HR>
    <h3>商品一覧</h3>
    <table>
        <th>ジャンル名</th>
    <?php
    require_once("db_connect.php");
    try{
        //SQL文を作る
        $sql ="SELECT * FROM product ";
        // プリアドステートメントを作る
        $stm = $pdo->prepare($sql);
        // SQL文を実行する
        $stm->execute();
        // 結果を取得（連想配列で受け取る）
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row) {
    ?>
        <tr>
            <td><?= $row['gener'] ?></td>
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

    </form>

</body>
</html>