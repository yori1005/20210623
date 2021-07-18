<?php
session_start();

$_SESSION = array();
session_destroy();
header('Location: http://g079ff.php.xdomain.jp/Home.php');
?>