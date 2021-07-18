<?php
session_start();
if($_SESSION['id'] == NULL){
    header('Location: http://g079ff.php.xdomain.jp/Home.php');
}
$id = $_SESSION['id'];
$name = $_SESSION['name'];

$dsn =   'mysql:host=157.112.147.201;
          dbname=g079ff_2020';
$user =  'g079ff_ymgc';
$pass =  'kpEYZ8KU';
try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
}
        $sql = "SELECT * FROM food";
        $stmt = $dbh->query($sql);
        $i = 1;
		$k = 0;
        foreach($stmt as $row){
            $food[$i] = $row['name'];
			$i++;
        }
		for($j=1;$j<55;$j++){$food1[$k] = $food[$j]; $k++; } $k = 0;
		for($j=56;$j<70;$j++){$food2[$k] = $food[$j]; $k++; } $k = 0;
		for($j=70;$j<101;$j++){$food3[$k] = $food[$j]; $k++; } $k = 0;
		for($j=101;$j<114;$j++){$food4[$k] = $food[$j]; $k++; } $k = 0;
		for($j=114;$j<126;$j++){$food5[$k] = $food[$j]; $k++; } $k = 0;
		for($j=126;$j<194;$j++){$food6[$k] = $food[$j]; $k++; } $k = 0;
		for($j=194;$j<252;$j++){$food7[$k] = $food[$j]; $k++; } $k = 0;
		for($j=252;$j<322;$j++){$food8[$k] = $food[$j]; $k++; } $k = 0;
		for($j=322;$j<339;$j++){$food9[$k] = $food[$j]; $k++; } $k = 0;
		for($j=339;$j<372;$j++){$food10[$k] = $food[$j]; $k++; } $k = 0;
		for($j=372;$j<464;$j++){$food11[$k] = $food[$j]; $k++; } $k = 0;
		for($j=464;$j<526;$j++){$food12[$k] = $food[$j]; $k++; } $k = 0;
		for($j=526;$j<572;$j++){$food13[$k] = $food[$j]; $k++; } $k = 0;
		for($j=572;$j<581;$j++){$food14[$k] = $food[$j]; $k++; } $k = 0;
		for($j=581;$j<611;$j++){$food15[$k] = $food[$j]; $k++; } $k = 0;
		for($j=611;$j<657;$j++){$food16[$k] = $food[$j]; $k++; } $k = 0;

		$json_food1 = json_encode($food1,JSON_UNESCAPED_UNICODE);
		$json_food2 = json_encode($food2,JSON_UNESCAPED_UNICODE);
		$json_food3 = json_encode($food3,JSON_UNESCAPED_UNICODE);
		$json_food4 = json_encode($food4,JSON_UNESCAPED_UNICODE);
		$json_food5 = json_encode($food5,JSON_UNESCAPED_UNICODE);
		$json_food6 = json_encode($food6,JSON_UNESCAPED_UNICODE);
		$json_food7 = json_encode($food7,JSON_UNESCAPED_UNICODE);
		$json_food8 = json_encode($food8,JSON_UNESCAPED_UNICODE);
		$json_food9 = json_encode($food9,JSON_UNESCAPED_UNICODE);
		$json_food10 = json_encode($food10,JSON_UNESCAPED_UNICODE);
		$json_food11 = json_encode($food11,JSON_UNESCAPED_UNICODE);
		$json_food12 = json_encode($food12,JSON_UNESCAPED_UNICODE);
		$json_food13 = json_encode($food13,JSON_UNESCAPED_UNICODE);
		$json_food14 = json_encode($food14,JSON_UNESCAPED_UNICODE);
		$json_food15 = json_encode($food15,JSON_UNESCAPED_UNICODE);
		$json_food16 = json_encode($food16,JSON_UNESCAPED_UNICODE);


?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>投稿作成画面</title>
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
            table-layout: fixed;
        }
        .table td{
            word-wrap: break-word;
        }

		.form {
			height: 30px;
			width: 300px;
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
			background    : #000000;     /* 文字色     */
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
				printf("投稿画面")
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

			<h1>
				<?php
					printf("料理の投稿");
				?>
			</h1>
			<table class="table" border="1">
				
				<form action="postmenu.php" method="post" enctype="multipart/form-data">
				<div class="text">料理の写真</div>
				<input type="file" name="image"  onchange="previewImage(this);">
				<p>
				<div class="text">選択した画像：</div>
				<img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:400px;">
				</p>
				<script>
					function previewImage(obj){
						var fileReader = new FileReader();
						fileReader.onload = (function() {
							document.getElementById('preview').src = fileReader.result;
						});
						fileReader.readAsDataURL(obj.files[0]);
					}
				</script>
				<br><br><br>
				<tr>	
					<td><div class="text">料理の名前</div></td>
					<td><input type="text" name="foodname" placeholder="料理の名前" class="form"></td>
				</tr>
				<tr>
					<td><div class="text">レシピの概要</div></td>
					<td><textarea name="foodcomment" rows="8" cols="40"></textarea></td>
				</tr>
				<tr>
					<td><div class="text">ここから材料を選んでください→</div></td>
					<td><a href="javascript:void(0);" onclick="openwin();"><div class="text">材料の選択</div></a></td>
				</tr>
				<tr><td colspan="2"><div class="text2">※食材を手動で入力するとカロリーが計算できません</div></td></tr>
				<tr>
					<td><div class="text">材料1：</div><input type="text" name ="postfood1" id="postfood1" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood1" placeholder="(例)100" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料2：</div><input type="text" name ="postfood2" id="postfood2" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood2" placeholder="(例)100" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料3：</div><input type="text" name ="postfood3" id="postfood3" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood3" placeholder="(例)100" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料4：</div><input type="text" name ="postfood4" id="postfood4" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood4" placeholder="(例)100" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料5：</div><input type="text" name ="postfood5" id="postfood5" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood5" placeholder="(例)100" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料6：</div><input type="text" name ="postfood6" id="postfood6" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood6" placeholder="(例)100" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料7：</div><input type="text" name ="postfood7" id="postfood7" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood7" placeholder="(例)100" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料8：</div><input type="text" name ="postfood8" id="postfood8" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood8" placeholder="(例)100" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料9：</div><input type="text" name ="postfood9" id="postfood9" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood9" placeholder="(例)100" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料10：</div><input type="text" name ="postfood10" id="postfood10" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood10" placeholder="(例)100" class="form"><label>g</label></td>
				</tr>	
					<tr><td colspan="2"><input type="submit" value="投稿！" class="submitbutton"></td></tr>
					</form>
			</table>
			<script>
				function openwin(){
					window.open("./post_food.php","使用食材の選択","width=500,height=400")
				}
			</script>
			<br><br>
			<section>
				<a href="http://g079ff.php.xdomain.jp/mypage.php" class="btn_03">マイページに戻る</a>
			</section><p>
		</div>
	</main>
</body>
</html>