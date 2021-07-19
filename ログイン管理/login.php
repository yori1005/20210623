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


if ($_POST['id'] != NULL && $_POST['pass'] != NULL) {

        $id = $_POST['id'];
		$pass = stripslashes(htmlspecialchars($_POST['pass']));
        $sql = "SELECT * FROM user WHERE id = '$id'";
		$stmt = $dbh->query($sql);
		foreach($stmt as $row){
			$dbid = $row['id'];
			$dbpassword = $row['pass'];
			$dbname = $row['name'];
		}
            if ($dbid == $id && password_verify($pass, $dbpassword)) {
				$_SESSION['id'] = $dbid;
				$_SESSION['pass'] = $dbpassword;
				$_SESSION['name'] = $dbname;
				header('Location: http://g079ff.php.xdomain.jp/mypage.php');
            }else{
				header('Location: http://g079ff.php.xdomain.jp/login_page.php');
			} 
        }else{
			header('Location: http://g079ff.php.xdomain.jp/login_page.php');
		}

?>