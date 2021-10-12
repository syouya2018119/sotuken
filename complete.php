
<?php

    $name = $_POST['name'];

    $printHtml = file_get_contents("./complete.html");
    $echoHtml = str_replace("****replace_onamae****", $name, $printHtml);

    echo $echoHtml;

    require 'db_connect.php';
?>

<?php  
	$name = $_POST['name'];
    $prefectures = $_POST['pref'];
    $address = $_POST['address'];
    $request = $_POST['request'];

    $place = sprintf ($prefectures . $address);


		$sql = "INSERT INTO request( place, name,request) VALUES (:place, :name,:request)";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(':place', $place, PDO::PARAM_INT);
		$stm->bindValue(':name', $name, PDO::PARAM_STR);
		$stm->bindValue(':request', $request, PDO::PARAM_STR);

		$stm->execute();

?>