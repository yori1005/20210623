<?php
session_start();
if($_SESSION['id'] == NULL){
    header('Location: http://g079ff.php.xdomain.jp/Home.php');
}
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$key = $_POST['key'];
$dsn='mysql:host=157.112.147.201;
     dbname=g079ff_2020' ;
$user='g079ff_ymgc' ;
$pass='kpEYZ8KU' ;
try {
    $dbh=new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo $e->
    getMessage();
    }

    $sql = "SELECT * FROM post WHERE recipename = '$key' AND id = '$id'";
    $stmt = $dbh->query($sql);
    $i = 0;
    foreach($stmt as $row){
    $postnum = $row['num']; $postname = $row['name'];
    $postid = $row['id'];   $postdatetime = $row['datetime'];
    $recipename = $row['recipename']; $recipecomment = $row['recipecomment'];
    $calorie = $row['calorie']; $foodimage = $row['foodimage'];
    $i++;
    }

    $sql = "SELECT * FROM foodstuff WHERE recipename = '$key' AND id = '$id'";
    $stmt = $dbh->query($sql);
    $i = 0;
    foreach($stmt as $row){
    $food1 = $row['food1']; $volfood1 = $row['volfood1'];
    $food2 = $row['food2']; $volfood2 = $row['volfood2'];
    $food3 = $row['food3']; $volfood3 = $row['volfood3'];
    $food4 = $row['food4']; $volfood4 = $row['volfood4'];
    $food5 = $row['food5']; $volfood5 = $row['volfood5'];
    $food6 = $row['food6']; $volfood6 = $row['volfood6'];
    $food7 = $row['food7']; $volfood7 = $row['volfood7'];
    $food8 = $row['food8']; $volfood8 = $row['volfood8'];
    $food9 = $row['food9']; $volfood9 = $row['volfood9'];
    $food10 = $row['food10']; $volfood10 = $row['volfood10'];
    }

    ?>
    <!DOCTYPE html>

    <html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title>投稿の編集画面</title>
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
                <p class="name">
                    <h1>
                        <?php
                        printf("%s さん。のレシピの編集",$name,$id)
                        ?>
                    </h1>
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
			<br><br><br><br><br><br><br><br><br><br>
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
			<h1>
				<?php
					printf("投稿の編集");
				?>
			</h1>
			<table class="table" border="1">
				
                <div class="text">変更前の画像：</div>
                <img src="foodimages/<?php echo $foodimage ?>" width="400" height="300">
				<form action="repostmenu.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="imagename" value="<?php echo $foodimage ?>">

				<div class="text">料理の写真</div>
				<input type="file" name="image"  onchange="previewImage(this);">
				<p>
				<div class="text">変更後の画像：</div>
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
					<td><input type="text" name="foodname"  class="form" value="<?php echo $recipename ?>"></td>
				</tr>
				<tr>
					<td><div class="text">レシピの概要</div></td>
					<td><textarea name="foodcomment" rows="8" cols="40"><?php echo $recipecomment ?></textarea></td>
				</tr>
				<tr>
					<td><div class="text">ここから材料を選んでください→</div></td>
					<td><a href="javascript:void(0);" onclick="openwin();"><div class="text">材料の選択</div></a></td>
				</tr>
				<tr><td colspan="2"><div class="text2">※食材を手動で入力するとカロリーが計算できません</div></td></tr>
				<tr>
					<td><div class="text">材料1：</div><input type="text" name ="postfood1" id="postfood1" value="<?php echo $food1 ?>" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood1" placeholder="(例)100" value="<?php echo $volfood1 ?>" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料2：</div><input type="text" name ="postfood2" id="postfood2" value="<?php echo $food2 ?>" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood2" placeholder="(例)100" value="<?php echo $volfood2 ?>" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料3：</div><input type="text" name ="postfood3" id="postfood3" value="<?php echo $food3 ?>" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood3" placeholder="(例)100" value="<?php echo $volfood3 ?>" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料4：</div><input type="text" name ="postfood4" id="postfood4" value="<?php echo $food4 ?>" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood4" placeholder="(例)100" value="<?php echo $volfood4 ?>" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料5：</div><input type="text" name ="postfood5" id="postfood5" value="<?php echo $food5 ?>" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood5" placeholder="(例)100" value="<?php echo $volfood5 ?>" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料6：</div><input type="text" name ="postfood6" id="postfood6" value="<?php echo $food6 ?>" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood6" placeholder="(例)100" value="<?php echo $volfood6 ?>" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料7：</div><input type="text" name ="postfood7" id="postfood7" value="<?php echo $food7 ?>" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood7" placeholder="(例)100" value="<?php echo $volfood7 ?>" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料8：</div><input type="text" name ="postfood8" id="postfood8" value="<?php echo $food8 ?>" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood8" placeholder="(例)100" value="<?php echo $volfood8 ?>" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料9：</div><input type="text" name ="postfood9" id="postfood9" value="<?php echo $food9 ?>" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood9" placeholder="(例)100" value="<?php echo $volfood9 ?>" class="form"><label>g</label></td>
				</tr>
				<tr>
					<td><div class="text">材料10：</div><input type="text" name ="postfood10" id="postfood10"  value="<?php echo $food10 ?>" class="form"></td><td><label><div class="text">分量：</div></label><input type="text" name="volfood10" placeholder="(例)100" value="<?php echo $volfood10 ?>" class="form"><label>g</label></td>
				</tr>	
					<tr><td colspan="2"><input type="submit" value="編集内容の確定" class="submitbutton"></td></tr>
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
