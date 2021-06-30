<?php
session_start();
if(isset($_SESSION['id'])){
    header('Location: http://g079ff.php.xdomain.jp/mypage.php');
}
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>HealthSupport ホーム画面</title>
    <style>
		body{
			margin: 0 auto;
			width: 60%;
		}
        .title {
            border: solid 5px #ffd800;
            text-align: center;
            font-size: 40px;
        }

        .text {
            text-align: center;
            font-size: 20px;
        }

        section {
            max-width: 300px;
            margin: 0 auto;
        }

        a.btn_03 {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 50px;
            position: relative;
            background: #228bc8;
            border: 1px solid #228bc8;
            border-radius: 30px;
            box-sizing: border-box;
            padding: 0 45px 0 25px;
            color: #fff;
            font-size: 16px;
            letter-spacing: 0.1em;
            line-height: 1.3;
            text-align: left;
            text-decoration: none;
            transition-duration: 0.3s;
        }

        a.btn_03:before {
            content: '';
            width: 8px;
            height: 8px;
            border: 0;
            border-top: 2px solid #fff;
            border-right: 2px solid #fff;
            transform: rotate(45deg);
            position: absolute;
            top: 50%;
            right: 25px;
            margin-top: -6px;
        }

        a.btn_03:hover {
            background: #fff;
            color: #228bc8;
        }

        a.btn_03:hover:before {
            border-top: 2px solid #228bc8;
            border-right: 2px solid #228bc8;
        }
    </style>
</head>
<body>
    <div class="title">
        <h1>Health Support</h1><p><p>
    </div>
    <div class="text">
        <h2>新規会員登録はこちら</h2><p>
    </div>
    <section>
        <a href="http://g079ff.php.xdomain.jp/signup_page.php" class="btn_03">新規登録</a>
    </section><p><p>
    <div class="text">
        <h2>アカウントをお持ちの方はこちら</h2><p>
    </div>
    <section>
          <a href="http://g079ff.php.xdomain.jp/login_page.php" class="btn_03">ログイン</a>
    </section>
</body>
</html>