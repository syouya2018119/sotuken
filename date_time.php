

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>場所・日時</title>
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
        <th>場所</th>
        <th>日時</th>
    <?php
    require_once("db_connect.php");
    try{
        //SQL文を作る
        $sql ="select place, date FROM area";
        $stm = $pdo->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row) {
    ?>
    <tr>
    <td><?= $row['place']?></td>
    <td><?= $row['date'] ?></td>
    </tr>
    <?php
        }
        ?>
    </table>

    <?php
    }catch(Exception $e) {
        echo  '<span class="error">エラーがありました。</span><br>';
        echo $e->getMessage();
    }
    ?>
    <HR>
    <h3>場所・日時の追加</h3>
    <form method="POST" action="date_time_check.php">

    <table border="1">
        <tr><td>
      <label for="pref">場所：都道府県</label>
        </td>
      <td>
      <select name="pref" id="pref">
        <option value="" selected>都道府県</option>
        <option value="北海道">北海道</option>
        <option value="青森県">青森県</option>
        <option value="岩手県">岩手県</option>
        <option value="宮城県">宮城県</option>
        <option value="秋田県">秋田県</option>
        <option value="山形県">山形県</option>
        <option value="福島県">福島県</option>
        <option value="茨城県">茨城県</option>
        <option value="栃木県">栃木県</option>
        <option value="群馬県">群馬県</option>
        <option value="埼玉県">埼玉県</option>
        <option value="千葉県">千葉県</option>
        <option value="東京都">東京都</option>
        <option value="神奈川県">神奈川県</option>
        <option value="新潟県">新潟県</option>
        <option value="富山県">富山県</option>
        <option value="石川県">石川県</option>
        <option value="福井県">福井県</option>
        <option value="山梨県">山梨県</option>
        <option value="長野県">長野県</option>
        <option value="岐阜県">岐阜県</option>
        <option value="静岡県">静岡県</option>
        <option value="愛知県">愛知県</option>
        <option value="三重県">三重県</option>
        <option value="滋賀県">滋賀県</option>
        <option value="京都府">京都府</option>
        <option value="大阪府">大阪府</option>
        <option value="兵庫県">兵庫県</option>
        <option value="奈良県">奈良県</option>
        <option value="和歌山県">和歌山県</option>
        <option value="鳥取県">鳥取県</option>
        <option value="島根県">島根県</option>
        <option value="岡山県">岡山県</option>
        <option value="広島県">広島県</option>
        <option value="山口県">山口県</option>
        <option value="徳島県">徳島県</option>
        <option value="香川県">香川県</option>
        <option value="愛媛県">愛媛県</option>
        <option value="高知県">高知県</option>
        <option value="福岡県">福岡県</option>
        <option value="佐賀県">佐賀県</option>
        <option value="長崎県">長崎県</option>
        <option value="熊本県">熊本県</option>
        <option value="大分県">大分県</option>
        <option value="宮崎県">宮崎県</option>
        <option value="鹿児島県">鹿児島県</option>
        <option value="沖縄県">沖縄県</option>
      </select>
    </td>
    </tr>
        <tr>
            <td>市町村</td>
            <td><input type="text" name ="place"></td>
        </tr>
        <tr>
            <td>年月日</td>
            <td><input type="date" name ="date"></td>
        </tr>
        <tr>
            <td>時間</td>
            <td><input type ="time" name ="time"></td>
        </tr>
        <td><td><input type="submit" value="追加"></td></tr>

    </table>
    </form>
</body>
</html>