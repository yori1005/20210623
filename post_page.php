<?php
session_start();
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
    <title>プロフィール設定</title>
    <style>
        body {
            margin: 0 auto;
            width: 60%;
        }

        .text {
            text-align: center;
            font-size: 20px;
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
        printf("料理の投稿");
        ?>
    </h1>
    <form action="post.php" method="post" enctype="multipart/form-data">
        <p>料理の写真</p>
        <input type="file" name="image">
        <p>
		<label>料理の名前</label><p>
		<input type="text" name="postname" placeholder="料理の名前">
		<p>
        <label>レシピの概要</label><p>
        <textarea name="postcomment" rows="8" cols="40"></textarea>
        <p>
        <label>材料</label>
		<p>
        <select name="genre" id="genre"　onchange="createMenu(this.value)">
			<option disabled selected>ジャンルを選択してください</option>
			<option value="gfood1">穀類</option>
			<option value="gfood2">芋類</option>
			<option value="gfood3">豆類</option>
			<option value="gfood4">木の実</option>
			<option value="gfood5">きのこ類</option>
			<option value="gfood6">魚類</option>
			<option value="gfood7">魚介類</option>
			<option value="gfood8">肉・卵類</option>
			<option value="gfood9">海藻類</option>
			<option value="gfood10">乳製品</option>
			<option value="gfood11">野菜</option>
			<option value="gfood12">調味料</option>
			<option value="gfood13">お菓子</option>
			<option value="gfood14">ジャム</option>
			<option value="gfood15">漬物</option>
			<option value="gfood16">果物</option>
		</select>
		<select name="menuList" id="menuList">
			<option disabled selected>食材を選択してください</option>
		</select>
    </form>

		<script>
			var food1 = <?php echo $json_food1; ?>;
			var food2 = <?php echo $json_food2; ?>;
			var food3 = <?php echo $json_food3; ?>;
			var food4 = <?php echo $json_food4; ?>;
			var food5 = <?php echo $json_food5; ?>;
			var food6 = <?php echo $json_food6; ?>;
			var food7 = <?php echo $json_food7; ?>;
			var food8 = <?php echo $json_food8; ?>;
			var food9 = <?php echo $json_food9; ?>;
			var food10 = <?php echo $json_food10; ?>;
			var food11 = <?php echo $json_food11; ?>;
			var food12 = <?php echo $json_food12; ?>;
			var food13 = <?php echo $json_food13; ?>;
			var food14 = <?php echo $json_food14; ?>;
			var food15 = <?php echo $json_food15; ?>;
			var food16 = <?php echo $json_food16; ?>;

			const foodMenu ={
				"gfood1": ["寿司","天ぷら","おでん"]/*food1*/,
				"gfood2": ["八宝菜"]/*food2*/,
				"gfood3": ["麻婆豆腐"]/*food3*/,
				"gfood4": ["エビチリ"]/*food4*/,
				"gfood5": ["パスタ"]/*food5*/,
				"gfood6": ["ピザ"]/*food6*/,
				"gfood7": ["ミネストローネ"]/*food7*/,
				"gfood8": ["魔剣伝説"]/*food8*/,
				"gfood9": ["しんのすけ"]/*food9*/,
				"gfood10": ["ヒカキン"]/*food10*/,
				"gfood11": ["セイキン"]/*food11*/,
				"gfood12": ["ナいチんげーる"]/*food12*/,
				"gfood13": ["ほげ"]/*food13*/,
				"gfood14": ["山口"]/*food14*/,
				"gfood15": ["シンジ"]/*food15*/,
				"gfood16": ["エヴァに乗りなさい"]/*food16*/
			};

			function createMenu(selectGenre){
  
				var menuList = document.getElementById('menuList');
				menuList.disabled = false;
				menuList.innerHTML = '';
				var option = document.createElement('option');
				option.innerHTML = '食材を選択してください';
				option.defaultSelected = true;
				option.disabled = true;
				menuList.appendChild(option);
  
				foodMenu[selectGenre].forEach( menu => {
    			var option = document.createElement('option');
				option.innerHTML = menu;
				menuList.appendChild(option);
				});
			}
		</script>

    <section>
        <a href="http://g079ff.php.xdomain.jp/mypage.php" class="btn_03">マイページに戻る</a>
    </section><p>
</body>
</html>