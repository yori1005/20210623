<?php
session_start();
if(isset($_SESSION['id'])){
   	header('Location: http://g079ff.php.xdomain.jp/mypage.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Signin Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <style>

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">

    <main class="form-signin">
        <form action="signup.php" method="post">
            <img class="mb-4" src="http://g079ff.php.xdomain.jp/icon/rogo.png" alt="" width="150" height="100">
            <h1 class="h3 mb-3 fw-normal">新規登録画面</h1>
            <label for="inputName" class="visually-hidden">名前</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="名前" required autofocus>
            <label for="inputEmail" class="visually-hidden">ユーザーID</label>
            <input type="text" id="id" name="id" class="form-control" placeholder="ユーザーID" required autofocus>
            <label for="inputPassword" class="visually-hidden">パスワード</label>
            <input type="password" id="pass" name="pass" class="form-control" placeholder="パスワード" required>
            <button class="w-100 btn btn-lg btn-primary" type="submit">ログイン</button>
        </form>
    </main>



</body>
</html>
