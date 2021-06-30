<?php
require "DataBase.php";
$db = new DataBase();
if ($_POST['name'] != NULL && $_POST['id'] != NULL && $_POST['pass'] != NULL) {
    if ($db->dbConnect()) {
        if ($db->signUp("user", $_POST['name'], $_POST['id'], $_POST['pass'])) {
			header('Location: http://g079ff.php.xdomain.jp/login_page.php');
        } else{	header('Location: http://g079ff.php.xdomain.jp/Home.php');}
    } else echo "Error: Database connection";
} else{ 
/*
$unfull = 1;
$url = "http://g079ff.php.xdomain.jp/test_signup.html?unfull=".$unfull;
header("Location: ".$url);
*/
}
?>
