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
    <title></title>
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
            font-size: 40px;
        }

        .form {
            width: 500px;
            height: 70px;
            font-size: 20px;
            text-align: center;
        }

        .button {
            display: inline-block;
            margin: 0px auto;
            border-radius: 24%; /* 角丸       */
            font-size: 24pt; /* 文字サイズ */
            text-align: center; /* 文字位置   */
            cursor: pointer; /* カーソル   */
            padding: 18px 41px; /* 余白       */
            background: #6666ff; /* 背景色     */
            color: #ffffff; /* 文字色     */
            line-height: 1em; /* 1行の高さ  */
            transition: .3s; /* なめらか変化 */
            box-shadow: 5px 5px 3px #666666; /* 影の設定 */
            border: 2px solid #6666ff; /* 枠の指定 */
        }

        .button:hover {
            box-shadow: none; /* カーソル時の影消去 */
            color: #6666ff; /* 背景色     */
            background: #ffffff; /* 文字色     */
        }
    </style>
</head>
<body>
    <div class="text">
        <h1>ログイン画面</h1>
    </div>
    <form action="login.php" method="post">
        <label>　　　　ユーザーＩＤ　</label>
        <input type="text" name="id" placeholder="ユーザーID" class="form">
        <p>
            <label>　　　　パスワード　　</label>
            <input type="password" name="pass" placeholder="パスワード" class="form">
        <p>
            <label>　　　　　　　　　　　　　　　　　　</label>
            <input type="submit" value="ログイン" class="button">
        <p>
    </form>
</body>
</html>