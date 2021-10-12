<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>個人サイト向けシンプル無料ホームページテンプレート tp_simple7</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="ここにサイト説明を入れます">
<meta name="keywords" content="キーワード１,キーワード２,キーワード３,キーワード４,キーワード５">
<link rel="stylesheet" href="css/style.css">
<script src="js/openclose.js"></script>
<script src="js/fixmenu_pagetop.js"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

<div id="container">

<header>
<h1 id="logo"><a href="index.html"><img src="images/BBBlogo.png" alt="BBB"></a></h1>
<!--スライドショー-->
<aside id="mainimg">
<img src="images/yasai1.jpg" alt="" class="slide0">
<img src="images/yasai1.jpg" alt="" class="slide1">
<img src="images/sakana1.jpg" alt="" class="slide2">
<img src="images/niku1.jpg" alt="" class="slide3">
</aside>
</header>

<div id="contents">

<div id="main">

<section id="new">
<h2>このサイトについて</h2>
<p>　移動販売車を運営している各個人に対して、田舎・過疎化した村・
	足の悪い人々が近くの公園、広場でも買い物ができるように移動販売車が
	その場に来る日時・品種を知らせるサイトです。
</p>
</section>


<html lang="ja">
  <head>
    <meta charset="utf-8">
    <div id="view_today" align="center"></div>

<script type="text/javascript">
document.getElementById("view_today").innerHTML = getToday();

function getToday() {
	var now = new Date();
	var year = now.getFullYear();
	var mon = now.getMonth()+1; //１を足すこと
	var day = now.getDate();
	var you = now.getDay(); //曜日(0～6=日～土)

	//曜日の選択肢
	var youbi = new Array("日","月","火","水","木","金","土");
	//出力用
	var s = year + "年" + mon + "月" + day + "日 (" + youbi[you] + ")";
	return s;
}
</script>
</head>

  <html lang="ja">
    <head>
      <meta charset="utf-8">
      <div align="center"><span id="view_today"></span></div>
  
  <script type="text/javascript">
  document.getElementById("view_today").innerHTML = getToday();
  
  function getToday() {
    var now = new Date();
    var year = now.getFullYear();
    var mon = now.getMonth()+1; //１を足すこと
    var day = now.getDate();
    var you = now.getDay(); //曜日(0～6=日～土)
  
    //曜日の選択肢
    var youbi = new Array("日","月","火","水","木","金","土");
    //出力用
    var s = year + "年" + mon + "月" + day + "日 (" + youbi[you] + ")";
    return s;
  }
  </script>
  </head>

<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>デジタル時計 04</title>
    <script>
      function updateClock() {
        var now = new Date();
        var hour = now.getHours();
        var minute = now.getMinutes();
        var second = now.getSeconds();
        if ( hour < 10 ) hour = "0" + hour;
        if ( minute < 10 ) minute = "0" + minute;
        if ( second < 10 ) second = "0" + second;
        document.getElementById('myClock').innerHTML = hour+":"+minute+":"+second;
      }
      function start() {
        setInterval("updateClock();", 1000);
        updateClock();
      }
    </script>
  </head>
  <body onload="start();">
    <div id="myClock" align="center"
        style="font:bold 40pt Times New Roman; color:#008888;">
    </div>
    <HR>
      <h3>場所・日時</h3>
      <form action="index.php" method="post">
		場所検索
		<input type="text" name="keyword">
		<input type="submit" value="検索">
	</form>
  <table border="1">
          <th>場所</th>
          <th>日時</th>
      <?php
      require_once("db_connect.php");
      try{
        if (isset($_POST['keyword'])) {
          //SQL文を作る（プレースホルダを使った式）
          $sql = "select * from area where place like :keyword";
          //プリペアードステートメントを作る
          $stm = $pdo->prepare($sql);
          //プリペアードステートメントに値をバインドする
          $stm->bindValue(':keyword', '%' . $_POST['keyword'] . '%', PDO::PARAM_STR);
          //SQL文を実行する
          $stm->execute();
          //結果の取得（連想配列で受け取る）
          $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        }else {
          //SQL文を作る
          $sql ="SELECT * FROM area";
          // プリアドステートメントを作る
          $stm = $pdo->prepare($sql);
          // SQL文を実行する
          $stm->execute();
          // 結果を取得（連想配列で受け取る）
          $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        }
          foreach($result as $row) {
      ?>
          <tr>
              <td><?= $row['place'] ?></td>
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
      }?>
      <HR>
  
      </form>
  </body>




</div>
<!--/#main-->

<div id="sub">

<!--PC用（801px以上端末）メニュー-->
<nav id="menubar">
<h2>コンテンツ</h2>
<ul>
<li><a href="index.html">ホーム</a></li>
<li><a href="member_input.php">会員登録</a></li>
<li><a href="login_input.php">ログイン</a></li>
<li><a href="request.html">要望(お問い合わせ)</a></li>
<li><a href="product.php">商品在庫</a></li>
</ul>
</nav>



</div>
<!--/#sub-->

</div>
<!--/#contents-->

</div>
<!--/#container-->

<footer>
<small>Copyright&copy; <a href="index.html">BBB</a> All Rights Reserved.</small>
<span class="pr"><a href="http://template-party.com/" target="_blank">《Web Design:Template-Party》</a></span>
</footer>

<!--小さな端末用（800px以下端末）メニュー-->
<nav id="menubar-s">
<ul>
<li><a href="index.html">ホーム</a></li>
<li><a href="member_input.php">会員登録</a></li>
<li><a href="login_input.php">ログイン</a></li>
<li><a href="request.html">要望(お問い合わせ)</a></li>
<li><a href="product.php">商品在庫</a></li>
</ul>
</nav>

<!--ページの上部に戻る「↑」ボタン-->
<p class="nav-fix-pos-pagetop"><a href="#">↑</a></p>

<!--メニュー開閉ボタン-->
<div id="menubar_hdr" class="close"></div>
<!--メニューの開閉処理条件設定　800px以下-->
<script>
if (OCwindowWidth() <= 800) {
	open_close("menubar_hdr", "menubar-s");
}
</script>

</body>
</html>
