<?php
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
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
$sql = "SELECT * FROM user WHERE id = '$id'";
$stmt = $dbh->query($sql);
foreach($stmt as $row){
	$comment = $row['comment']; $birth = $row['birth'];
}
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>プロフィール設定</title>
        <style>
 		body {
            margin: 0 auto;
            width: 100%;
        }

        .text {
            text-align: center;
            font-size: 20px;
        }

		.text2{
			text-align: center;
            font-size: 30px;
			color:rgb(255,0,0);
		}

        .table{
            width: 100%;
            display: table;
        }
        .table td{
            word-wrap: break-word;
			flex-shrink: 0;
        }

		.form {
			height: 30px;
			width: 500px;
			padding: 0 16px;
			border-radius: 4px;
			border: none;
			box-shadow: 0 0 0 1px #ccc inset;
			appearance: none;
			-webkit-appearance: none;
			-moz-appearance: none;
			font-size: 20px;
			text-align: center;
		}

		.form:focus {
			outline: 0;
			box-shadow: 0 0 0 2px rgb(33, 150, 243) inset;
		}

        section {
            max-width: 250px;
            margin: 0 auto;
        }

        .title {
            display: table;
            width: 100%
        }

        .name {
            display: table-cell;
            text-align: left;
        }

        .button {
            display: table-cell;
            text-align: right;
        }

        a.btn_03 {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 300px;
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


        a.btn_02_a {
            display: block;
            color: #fff;
            font-size: 16px;
            padding: 1.5rem .5rem;
            background-color: #e22939;
            text-align: center;
            text-decoration: none;
            transition-duration: 0.3s;
        }

            a.btn_02_a:hover {
                background: #000000;
            }

            a.btn_02_a span {
                position: relative;
                padding-left: 36px;
            }

                a.btn_02_a span:before {
                    content: '';
                    width: 26px;
                    height: 26px;
                    background: #ffffff;
                    border-radius: 50%;
                    position: absolute;
                    top: 50%;
                    left: 0;
                    margin-top: -13px;
                }

                a.btn_02_a span:after {
                    content: '';
                    width: 6px;
                    height: 6px;
                    border: 0;
                    border-top: 3px solid #e22939;
                    border-right: 3px solid #e22939;
                    transform: rotate(45deg);
                    position: absolute;
                    top: 50%;
                    left: 7px;
                    margin-top: -5px;
                }

            a.btn_02_a:hover span:after {
                border-top: 3px solid #000000;
                border-right: 3px solid #000000;
            }

		.submitbutton {
			display       : inline-block;
			border-radius : 20%;          /* 角丸       */
			font-size     : 15pt;        /* 文字サイズ */
			text-align    : center;      /* 文字位置   */
			cursor        : pointer;     /* カーソル   */
			padding       : 12px 30px;   /* 余白       */
			background    : #6666ff;     /* 背景色     */
			color         : #ffffff;     /* 文字色     */
			line-height   : 1em;         /* 1行の高さ  */
			transition    : .3s;         /* なめらか変化 */
			box-shadow    : 6px 6px 3px #666666;  /* 影の設定 */
			border        : 2px solid #6666ff;    /* 枠の指定 */
		}
		.submitbutton:hover {
			box-shadow    : none;        /* カーソル時の影消去 */
			color         : #6666ff;     /* 背景色     */
			background    : #ffffff;     /* 文字色     */
		}

        .grovalNavigation {
            height: 10%;
            text-align: center;
            background-color: #888;
            color: #fff;
        }

        main {
            min-height: 100vh;
            display: flex;
            margin-top: 10px;
        }

        .content {
            flex: 1;
            background-color: #eee;
            text-align: center;
            margin-left: 10px;
        }

        .localNavigation {
            width: 20%;
            text-align: center;
            vertical-align: middle;
            background-color: #888;
            color: #fff;
        }
        </style>
</head>
<body>
        <header class="grovalNavigation">
            <div class="title">
                <p class="name">
                    <h2>
                        <?php
                        printf("%s さん。のレシピ",$name,$id)
                        ?>
                    </h2>
                </p>
                <p class="button">
                    <section>
                        <a href="http://g079ff.php.xdomain.jp/logout.php" class="btn_03">ログアウト</a>
                    </section>
                </p>
            </div>
        </header>

        <main>
            <div class="localNavigation">
                <table align="center">
                    <tr>
                        <td><a href="http://g079ff.php.xdomain.jp/search_page.php" class="btn_02_a">検索</a></td>
                    </tr>
                    <tr>
                        <p>
                        <td><a href="http://g079ff.php.xdomain.jp/myrecipe.php" class="btn_02_a">マイレシピ</a></td>
                    </tr>
                    <tr>
                        <p>
                        <td><a href="http://g079ff.php.xdomain.jp/mypage.php" class="btn_02_a">マイページ</a></td>
                    </tr>
                </table>
            </div>
            <div class="content">

			<br><br><br>
			<table class="table" border="1">
				<tr>
					<td colspan="2"><div class="text">
					<?php
						printf("%sさんのプロフィールを設定できます。ID:%s",$name,$id);
					?>
					</div></td>
				</tr>
				<form action="profile.php" method="post">
				<tr>
					<td width="20%"><div class="text">名前</div></div>
					<td width="80%"><input type="text" name="changename" placeholder="名前" class="form" value="<?php echo $name ?>"></td>
				</tr>
				<tr>
					<td><div class="text">ID</div></td>
					<td><input type="text" name="changeid" placeholder="ID" class="form" value="<?php echo $id ?>"></td>
				</tr>
				<tr>
					<td><div class="text">一言</div></td>
					<td><input type="text" name="changecomment" placeholder="ひとこと" class="form" value="<?php echo $comment ?>"></td>
				</tr>
				<tr>
					<td><div class="text">生年月日</div></td>
					<td><input type="text" name="changebirth" placeholder="生年月日" class="form" value="<?php echo $birth ?>"></td>
				</td>
				<tr>
					<td colspan="2"><input type="submit" value="変更" class="submitbutton"></td>
				</tr>
				</form>
			</table>
			<br><br><br>
				<section>
					<a href="http://g079ff.php.xdomain.jp/mypage.php" class="btn_03">マイページに戻る</a>
				</section><p>
	</body>
</html>