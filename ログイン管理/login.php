<?php
session_start();
require "DataBase.php";
$db = new DataBase();
if ($_POST['id'] != NULL && $_POST['pass'] != NULL) {
    if ($db->dbConnect()) {
        if ($db->logIn("user", $_POST['id'], $_POST['pass'])) {
           	header('Location: http://g079ff.php.xdomain.jp/mypage.php');
			exit;
        } else{header('Location: http://g079ff.php.xdomain.jp/login_page.php');}
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
