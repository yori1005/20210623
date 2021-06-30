<?php
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>プロフィール設定</title>
        <style>
            body{
			    margin: 0 auto;
			    width: 60%;
		    }
            .text {
                text-align: center;
                 font-size: 20px;
            }

		    .title{display: table; width: 100%}
		    .name{display: table-cell; text-align: left;}
		    .button{display: table-cell; text-align: right;}

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
    <h1>
        <?php
        printf("%sさんのプロフィールを設定できます。ID:%s",$name,$id);
        ?>
    </h1>
    <form action="profile.php" method="post">
        <label>名前</label>
        <input type="text" name="changename" placeholder="名前" class="form">
        <p>
        <label>ID</label>
        <input type="text" name="changeid" placeholder="ID" class="form">
        <p>
        <label>一言</label>
        <input type="text" name="changecomment" placeholder="ひとこと" class="form">
        <p>
        <label>生年月日</label>
        <input type="text" name="changebirth" placeholder="生年月日" class="form">
        <p>
        <input type="submit" value="変更">
    </form>

    <section>
        <a href="http://g079ff.php.xdomain.jp/mypage.php" class="btn_03">マイページに戻る</a>
    </section><p>
</body>
</html>