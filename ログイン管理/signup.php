<?php
session_start();

$dsn = 'mysql:host=157.112.147.201;
        dbname=g079ff_2020';
$user =  'g079ff_ymgc';
$pass = 'kpEYZ8KU';
try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if ($_POST['name'] != NULL && $_POST['id'] != NULL && $_POST['pass'] != NULL) {
	$name = $_POST['name'];
	$id = $_POST['id'];
	$pass = stripslashes(htmlspecialchars($_POST['pass']));
	$pass = password_hash($pass, PASSWORD_DEFAULT);
	$sql = "SELECT * FROM user WHERE id = '$id'";
	$stmt = $dbh->query($sql);
	foreach($stmt as $row){
		$dbid = $row['id'];
		$dbpassword = $row['pass'];
		$dbname = $row['name'];
	}
	if($dbid == $id){
		header('Location: http://g079ff.php.xdomain.jp/Home.php');
	}
	else{
		$sql = "INSERT INTO user(name,id,pass) VALUES (:name,:id,:pass)";
		$stmt = $dbh->prepare($sql);
		$params = array(':name' => $name,':id' => $id,':pass' => $pass);
		$stmt->execute($params);
		header('Location: http://g079ff.php.xdomain.jp/login_page.php');
	}
}else{
	header('Location: http://g079ff.php.xdomain.jp/signup_page.php');
}

?>
