<?php
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$word = $_POST['searchword'];

	$dsn = 'mysql:host=157.112.147.201;
			dbname=g079ff_2020';
	$user =  'g079ff_ymgc';
	$pass = 'kpEYZ8KU';
	$option = [PDO::ATTR_EMULATE_PREPARES=>false];
	try{
		$dbh = new PDO($dsn,$user,$pass);
	}catch(PDOException $e){
		echo 'データベースにアクセスできません' . $e->getMessage();
		exit;
	}

	$sql = "SELECT * FROM post WHERE name LIKE '%$word%' OR id LIKE '%$word%' OR post '%$word%'";
	$stmt = $dbh->query($sql);
    $i = 0;
    foreach($stmt as $row){
    $postnum[$i] = $row['num']; $postname[$i] = $row['name'];
    $postid[$i] = $row['id']; $post[$i] = $row['post'];
    $postdatetime[$i] = $row['datetime'];
    $i++;
    }

	header('Location: http://g079ff.php.xdomain.jp/search_page.php');

?>