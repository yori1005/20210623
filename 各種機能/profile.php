<?php
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$changename = $_POST['changename'];
$changeid = $_POST['changeid'];
$changecomment = $_POST['changecomment'];
$changebirth = $_POST['changebirth'];


if ($_POST['changeid'] != NULL && $_POST['changename'] != NULL) {
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

	$sql ="UPDATE user SET name = :name,id = :id,comment = :comment,birth = :birth WHERE id ='$id'";
	$stmt = $dbh->prepare($sql);
	$params = array(':name' => $changename,':id' => $changeid,':comment' => $changecomment,':birth' => $changebirth);
	$stmt ->execute($params);

	$sql ="UPDATE post SET name = :name,id = :id WHERE id ='$id'";
	$stmt = $dbh->prepare($sql);
	$params = array(':name' => $changename,':id' => $changeid);
	$stmt ->execute($params);

	$_SESSION['id'] = $changeid;
	$_SESSION['name'] = $changename;

	header('Location: http://g079ff.php.xdomain.jp/profile_page.php');

}else{header('Location: http://g079ff.php.xdomain.jp/profile_page.php');
}
?>