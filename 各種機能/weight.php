<?php
session_start();
$id = $_SESSION['id'];
$weight = $_POST['weight'];
$weight = (float)$weight;
$wdate = date('Y-m-d 00:00:00');
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
$sql = "SELECT * FROM weight WHERE id = '$id'";
$stmt = $dbh->query($sql);
$i = 0;
foreach($stmt as $row){
	$dbweight = $row['weight']; $dbdate[$i] = $row['wdate'];
    $i++;
}

$flag = 0;

for($k=0;$k<$i;$k++){
    if($dbdate[$k] == $wdate){
        $flag = 1;
        $redate = $dbdate[$k];
    }
}

if($flag == 1){
    $sql = "UPDATE weight SET weight = :weight WHERE wdate = '$redate'";
    $stmt = $dbh->prepare($sql);
	$params = array(':weight' => $weight);
	$stmt ->execute($params);
}
else{
    $sql = "INSERT INTO weight(id,weight,wdate) VALUES (:id,:weight,:wdate)";
    $stmt = $dbh->prepare($sql);
    $params = array(':id' => $id,':weight' => $weight,'wdate' => $wdate);
    $stmt->execute($params);
}
header('Location: http://g079ff.php.xdomain.jp/mypage.php');
?>