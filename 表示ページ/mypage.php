<?php
session_start();
if($_SESSION['id'] == NULL){
    header('Location: http://g079ff.php.xdomain.jp/Home.php');
}
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
	$comment = $row['comment']; $birth = $row['birth']; $image = $row['image'];
}

$sql = "SELECT * FROM weight WHERE id = '$id' ORDER BY num DESC";
$stmt = $dbh->query($sql);
$i = 0;
foreach($stmt as $row){
	$dbw[$i] = $row['weight']; $wdate[$i] = $row['wdate'];
	$i++;
}
$l = 0;
for($k=($i-1);$k>=0;$k--){
	$weightdate[$l] = date('Y-m-d',strtotime($wdate[$k]));
	$dbweight[$l] = $dbw[$k];
	$l++;
}

$s = $l - 1;

if((double)$dbw[0] > (double)$dbw[1]){
	$flag = 1;
}
elseif((double)$dbw[0] < (double)$dbw[1]){
	$flag = 2;
}

$json_weight = json_encode($dbweight);
$json_date = json_encode($weightdate);

?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <style>
		body{
			margin: 0 auto;
			width: 100%;
		}
        .text {
            text-align: left;
            font-size: 30px;
        }
		.text2{
			text-align: center;
			font-size: 30px;
			background: #FF6347;
		}
		.text3{
			text-align: center;
			font-size: 30px;
			background: #FFFF00;
		}


		.m-form-text {
			height: 60px;
			width: 200px;
			padding: 0 16px;
			border-radius: 4px;
			border: none;
			box-shadow: 0 0 0 1px #ccc inset;
			appearance: none;
			-webkit-appearance: none;
			-moz-appearance: none;
			font-size: 30px;
			text-align: center;
		}

		.m-form-text:focus {
			outline: 0;
			box-shadow: 0 0 0 2px rgb(33, 150, 243) inset;
		}

        section {
            max-width: 250px;
            margin: 0 auto;
        }

		.title{display: table; width: 100%}
		.name{display: table-cell; text-align: left;}
		.button{display: table-cell; text-align: right;}

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
			color         : #000000;     /* 文字色     */
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
    <title>マイページ</title>
</head>
<body>
	<header class="grovalNavigation">
		<div class="title">
		<p class="name"><h1>
			<?php
				printf("\n %s さん。ようこそ！ID：%s",$name,$id)
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
			<table width="700px" border="1" align="center">
				<tr>
					<td><div class="text">画像をタップでアイコンを変更</div></td>
				</tr>
				<tr>
					<td><a href="http://g079ff.php.xdomain.jp/changeicon_page.php"><img src="images/<?php echo $image ?>" width="400" height="400"></a></td>
				</tr>
				<tr>
					<td><div class="text"><?php printf("名前 : %s",$name); ?></div></td>
				</tr>
				<tr>
					<td><div class="text"><?php printf("ID : %s",$id); ?></div></td>
				</tr>
				<tr>
					<td><div class="text"><?php printf("一言 : %s",$comment); ?></div></td>
				</tr>
				<tr>
					<td><div class="text"><?php printf("生年月日 : %s",$birth); ?></div></td>
				</tr>
				<tr>
					<td><section>
						<a href="http://g079ff.php.xdomain.jp/profile_page.php" class="btn_03">プロフィールの編集</a>
					</section></td>
				</tr>
			</table>
			<br><br><br>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.js" integrity="sha512-lUsN5TEogpe12qeV8NF4cxlJJatTZ12jnx9WXkFXOy7yFbuHwYRTjmctvwbRIuZPhv+lpvy7Cm9o8T9e+9pTrg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<canvas id="myChart" width="400" height="400"></canvas>
			<script>
				var i = <?php echo $i; ?>;
				var weight = <?php echo $json_weight; ?>;
				var wdate = <?php echo $json_date; ?>;
				
				var ctx = document.getElementById('myChart').getContext('2d');
				var data = {
					labels: wdate,
					datasets: [{
						label: '体重',
						data: weight,
						borderColor: 'rgba(255, 100, 100, 1)',
						lineTension: 0,
						fill: false,
						borderWidth: 3
					}]
				};

				var options = {};

				var myChart = new Chart(ctx, {
					type: 'line',
					data: data,
					options: options
				});
			</script>
			<br><br><br>
			<?php if($flag == 1){ ?>
				<div class="text2"><?php echo 昨日より体重が増えています！ ?></div>
				<?php } ?>
			<?php if($flag == 2){ ?> 
				<div class="text3"><?php echo 昨日より体重が減っています！ ?></div>
				<?php } ?>

				<br><br><br>
			<table width="500px" border="1" align="center">
				<tr>
					<td><div class="text2">毎日の体重を記録できます。</div></td>
				</tr>
				<form action="weight.php" method="post" enctype="multipart/form-data">
				<tr>
					<td><input type="text" name="weight" placeholder="体重を記入" class="m-form-text"></td>
				</tr>
				<tr>
					<td><input type="submit" value="記録！"class="submitbutton"></td>
				</tr>
				</form>
			</table>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</main>

</body>
</html>