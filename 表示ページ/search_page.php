<?php
session_start();
if($_SESSION['id'] == NULL){
    header('Location: http://g079ff.php.xdomain.jp/Home.php');
}
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$searchword = $_SESSION['searchword'];
$searchword = $_POST['searchword'];
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>検索画面</title>
    <style>
		body {
            margin: 0 auto;
            width: 100%;
        }

        .text {
            text-align: center;
            font-size: 25px;
        }

        .table{
            width: 100%;
            display: table;
            table-layout: fixed;
        }
        .table td{
            word-wrap: break-word;
        }

		.form {
			height: 40px;
			width: 300px;
			padding: 0 16px;
			border-radius: 4px;
			border: none;
			box-shadow: 0 0 0 1px #ccc inset;
			appearance: none;
			-webkit-appearance: none;
			-moz-appearance: none;
			font-size: 25px;
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
			color: #000000;
			font-size: 33px;
			padding: 1.5rem .5rem;
			background-color: #00FFFF;
			text-align: center;
			text-decoration: none;
			transition-duration: 0.3s;
		}
		a.btn_02_a:hover {
			background: #00FFFF;
		}
		a.btn_02_a span {
			position: relative;
			padding-left: 36px;
		}
		a.btn_02_a span:before {
			content: '';
			width: 26px;
			height: 26px;
			background: #00FFFF;
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
			color         : #000000;    /* 文字色     */
			line-height   : 1em;         /* 1行の高さ  */
			transition    : .3s;         /* なめらか変化 */
			box-shadow    : 6px 6px 3px #666666;  /* 影の設定 */
			border        : 2px solid #6666ff;    /* 枠の指定 */
		}
		.submitbutton:hover {
			box-shadow    : none;        /* カーソル時の影消去 */
			color         : #6666ff;     /* 背景色     */
			background    : #000000;    /* 文字色     */
		}

		.grovalNavigation{
			height: 30%;
			text-align: center;
			background-color: #000000;
			color: #fff;
		}
		main{
			min-height: 100vh;
			display: flex;
			margin-top: 10px;
		}
		.content{
			flex: 1;
		    background-color: #E0FFFF;
			text-align: center;
			margin-left: 10px;
		}

		.localNavigation{
		    width: 20%;
		    text-align: center;
			vertical-align: middle;
		    background-color: #000000;
			color: #fff;
		}
	</style>
</head>
<body>
	<header class="grovalNavigation">
		<div class="title">
		<p class="name"><h1>
			<?php
				printf("検索")
			?>
		</h1></p>
		<p class="button"><section>
			<a href="http://g079ff.php.xdomain.jp/logout.php" class="btn_03">ログアウト</a>
		</section></p>
		</div>
	</header>

	<main>
		<div class="localNavigation">
					<br><br><br><br><br><br><br><br><br><br>
			<table align="center">
				<tr>
					<td><a href="http://g079ff.php.xdomain.jp/search_page.php" class="btn_02_a">検索</a></td>
				</tr>
				<tr>
					<p><td><a href="http://g079ff.php.xdomain.jp/myrecipe.php" class="btn_02_a">マイレシピ</a></td>
				</tr>
				<tr>
					<p><td><a href="http://g079ff.php.xdomain.jp/mypage.php" class="btn_02_a">マイページ</a></td>
				</tr>
			</table>
		</div>
		<div class="content">


			<h1>検索画面</h1>
			<form action = "search_page.php" method = "post">
			<input type="text" name="searchword" value="<?php echo $searchword ?>" placeholder="検索" class="form">
			<input type="submit" value="検索" class="submitbutton">
			</form>
			<br><br><br>

			<?php
			if($_POST['searchword'] != NULL){ 
					$word = $_POST['searchword'];

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

				$sql = "SELECT * FROM post WHERE name LIKE '%$word%' OR id LIKE '%$word%' OR recipename LIKE '%$word%' OR recipecomment LIKE '%$word%'";
       			$stmt = $dbh->query($sql);
				$i = 0;
				foreach($stmt as $row){
					$postnum[$i] = $row['num']; $postname[$i] = $row['name'];
					$postid[$i] = $row['id'];   $postdatetime[$i] = $row['datetime'];
					$recipename[$i] = $row['recipename']; $recipecomment[$i] = $row['recipecomment'];
					$calorie[$i] = $row['calorie']; $foodimage[$i] = $row['foodimage'];
					$i++;
				}
			}
			?>

	        <?php for($k=($i-1);$k>=0;$k--){ ?>

			<form method="post" action="detail_page.php">
			<input type="hidden" name="key<?php echo $k ?>" value="<?php echo $recipename[$k] ?>">
			<input type="hidden" name="sword" value="<?php echo $word ?>">
			<input type="submit" value="レシピの詳細を見る" class="submitbutton">
			</form>
			
            <table class="table" border="1">
                <tr>
                    <td><div class="text"><?php printf("レシピ名：%s",$recipename[$k]) ?></div></td>
                    <td><div class="text"><?php printf("%sさんのレシピ",$postname[$k]) ?></div></td>
                </tr>
                <tr>
                    <td rowspan="2"><img src="foodimages/<?php echo $foodimage[$k] ?>" width="380"></td>
                    <td><div class="text"><?php printf("推定カロリー：%s",$calorie[$k]) ?></div></td>
                </tr>
                <tr>
                    <td><div class="text"><?php printf("コメント：%s ",$recipecomment[$k]) ?></div></td>
                </tr>
            </table><br><br><br>
            <?php } ?>

		</div>
    </main>

</body>
</html>