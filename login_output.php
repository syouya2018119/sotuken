<?php session_start(); 
	//userセッション変数を破棄
	unset($_SESSION['customer']);
	//MySQLデータベースに接続する
	require 'db_connect.php';
	//SQL文を作る（プレースホルダを使った式）
	$sql = "select * from customer where login = :login and password = :password";
	//プリペアードステートメントを作る
	$stm = $pdo->prepare($sql);
	//プリペアードステートメントに値をバインドする
	$stm->bindValue(':login',$_POST['login'],PDO::PARAM_STR);
	$stm->bindValue(':password',$_POST['password'],PDO::PARAM_STR);
	//SQL文を実行する
	$stm->execute();
	//結果の取得（連想配列で受け取る）
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);
	//userセッションの設定
	foreach ($result as $row) {
		$_SESSION['customer'] = [
			'id' => $row['id'], 
			'name' => $row['name'],
			'address' => $row['address'], 
			'login' => $row['login'],
			'password' => $row['password'], 
			'email' => $row['email']
		];
	}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ログイン画面</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
	//require ;
	if (isset($_SESSION['customer'])) {
		echo 'いらっしゃいませ、', $_SESSION['customer']['name'], 'さん。';
	} else {
		echo 'ログイン名またはパスワードが違います。';
	}
	?>
    <br><input type="button" onclick="location.href='./index.php'" value=" メインメニューへ ">
</body>

</html>