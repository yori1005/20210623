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
		for($j=1;$j<55;$j++){$food1[$k] =$food[$j]; $k++; } $k=0;
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
    <title></title>
	<style>
		.select{
			height:50px;
			width:300px;
			border :1px solid #eee;
			font-size :15px;
		}		
		.text{
			text-align:center;
			font-size:40px;
		}
	</style>
</head>
<body>
    <?php for($i=0;$i<10;$i++){ ?>
    <select name="genre" id="genre<?php echo $i ?>" class ="select" onchange="createMenu<?php echo $i ?>(this.value)">
        <option disabled selected>ジャンルを選択してください</option>
        <option value="food1">穀類</option>
        <option value="food2">芋類</option>
        <option value="food3">豆類</option>
        <option value="food4">木の実</option>
        <option value="food5">きのこ類</option>
        <option value="food6">魚類</option>
        <option value="food7">魚介類</option>
        <option value="food8">肉・卵類</option>
        <option value="food9">海藻類</option>
        <option value="food10">乳製品</option>
        <option value="food11">野菜</option>
        <option value="food12">調味料</option>
        <option value="food13">お菓子</option>
        <option value="food14">ジャム</option>
        <option value="food15">漬物</option>
        <option value="food16">果物</option>
    </select>
    <select name="menuList" class="select" id="menuList<?php echo $i ?>" disabled>
        <option disabled selected>食材を選択してください</option>
    </select>
    <p>
    <?php } ?>

    <a href="javascript:void(0);" onclick="returnWindow()"><div class="text">決定</div></a><p>

    <script>

        const foodMenu ={
        "food1": <?php echo $json_food1; ?>,
        "food2": <?php echo $json_food2; ?>,
        "food3": <?php echo $json_food3; ?>,
        "food4": <?php echo $json_food4; ?>,
        "food5": <?php echo $json_food5; ?>,
        "food6": <?php echo $json_food6; ?>,
        "food7": <?php echo $json_food7; ?>,
        "food8": <?php echo $json_food8; ?>,
        "food9": <?php echo $json_food9; ?>,
        "food10": <?php echo $json_food10; ?>,
        "food11": <?php echo $json_food11; ?>,
        "food12": <?php echo $json_food12; ?>,
        "food13": <?php echo $json_food13; ?>,
        "food14": <?php echo $json_food14; ?>,
        "food15": <?php echo $json_food15; ?>,
        "food16": <?php echo $json_food16; ?>
        };

        function createMenu0(selectGenre){

        let menuList0 = document.getElementById('menuList0');
        menuList0.disabled = false;
        menuList0.innerHTML = '';
        let option = document.createElement('option');
        option.innerHTML = '食材を選択してください';
        option.defaultSelected = true;
        option.disabled = true;
        menuList0.appendChild(option);

        foodMenu[selectGenre].forEach( menu => {
        let option = document.createElement('option');
        option.innerHTML = menu;
        menuList0.appendChild(option);
        });
        }

        function createMenu1(selectGenre){

        let menuList1 = document.getElementById('menuList1');
        menuList1.disabled = false;
        menuList1.innerHTML = '';
        let option = document.createElement('option');
        option.innerHTML = '食材を選択してください';
        option.defaultSelected = true;
        option.disabled = true;
        menuList1.appendChild(option);

        foodMenu[selectGenre].forEach( menu => {
        let option = document.createElement('option');
        option.innerHTML = menu;
        menuList1.appendChild(option);
        });
        }

        function createMenu2(selectGenre){

        let menuList2 = document.getElementById('menuList2');
        menuList2.disabled = false;
        menuList2.innerHTML = '';
        let option = document.createElement('option');
        option.innerHTML = '食材を選択してください';
        option.defaultSelected = true;
        option.disabled = true;
        menuList2.appendChild(option);

        foodMenu[selectGenre].forEach( menu => {
        let option = document.createElement('option');
        option.innerHTML = menu;
        menuList2.appendChild(option);
        });
        }

        function createMenu3(selectGenre){

        let menuList3 = document.getElementById('menuList3');
        menuList3.disabled = false;
        menuList3.innerHTML = '';
        let option = document.createElement('option');
        option.innerHTML = '食材を選択してください';
        option.defaultSelected = true;
        option.disabled = true;
        menuList3.appendChild(option);

        foodMenu[selectGenre].forEach( menu => {
        let option = document.createElement('option');
        option.innerHTML = menu;
        menuList3.appendChild(option);
        });
        }

        function createMenu4(selectGenre){

        let menuList4 = document.getElementById('menuList4');
        menuList4.disabled = false;
        menuList4.innerHTML = '';
        let option = document.createElement('option');
        option.innerHTML = '食材を選択してください';
        option.defaultSelected = true;
        option.disabled = true;
        menuList4.appendChild(option);

        foodMenu[selectGenre].forEach( menu => {
        let option = document.createElement('option');
        option.innerHTML = menu;
        menuList4.appendChild(option);
        });
        }

        function createMenu5(selectGenre){

        let menuList5 = document.getElementById('menuList5');
        menuList5.disabled = false;
        menuList5.innerHTML = '';
        let option = document.createElement('option');
        option.innerHTML = '食材を選択してください';
        option.defaultSelected = true;
        option.disabled = true;
        menuList5.appendChild(option);

        foodMenu[selectGenre].forEach( menu => {
        let option = document.createElement('option');
        option.innerHTML = menu;
        menuList5.appendChild(option);
        });
        }

        function createMenu6(selectGenre){

        let menuList6 = document.getElementById('menuList6');
        menuList6.disabled = false;
        menuList6.innerHTML = '';
        let option = document.createElement('option');
        option.innerHTML = '食材を選択してください';
        option.defaultSelected = true;
        option.disabled = true;
        menuList6.appendChild(option);

        foodMenu[selectGenre].forEach( menu => {
        let option = document.createElement('option');
        option.innerHTML = menu;
        menuList6.appendChild(option);
        });
        }

        function createMenu7(selectGenre){

        let menuList7 = document.getElementById('menuList7');
        menuList7.disabled = false;
        menuList7.innerHTML = '';
        let option = document.createElement('option');
        option.innerHTML = '食材を選択してください';
        option.defaultSelected = true;
        option.disabled = true;
        menuList7.appendChild(option);

        foodMenu[selectGenre].forEach( menu => {
        let option = document.createElement('option');
        option.innerHTML = menu;
        menuList7.appendChild(option);
        });
        }

        function createMenu8(selectGenre){

        let menuList8 = document.getElementById('menuList8');
        menuList8.disabled = false;
        menuList8.innerHTML = '';
        let option = document.createElement('option');
        option.innerHTML = '食材を選択してください';
        option.defaultSelected = true;
        option.disabled = true;
        menuList8.appendChild(option);

        foodMenu[selectGenre].forEach( menu => {
        let option = document.createElement('option');
        option.innerHTML = menu;
        menuList8.appendChild(option);
        });
        }

        function createMenu9(selectGenre){

        let menuList9 = document.getElementById('menuList9');
        menuList9.disabled = false;
        menuList9.innerHTML = '';
        let option = document.createElement('option');
        option.innerHTML = '食材を選択してください';
        option.defaultSelected = true;
        option.disabled = true;
        menuList9.appendChild(option);

        foodMenu[selectGenre].forEach( menu => {
        let option = document.createElement('option');
        option.innerHTML = menu;
        menuList9.appendChild(option);
        });
        }

        function returnWindow(){
            window.opener.document.getElementById("postfood1").value = document.getElementById("menuList0").value;
            window.opener.document.getElementById("postfood2").value = document.getElementById("menuList1").value;
            window.opener.document.getElementById("postfood3").value = document.getElementById("menuList2").value;
            window.opener.document.getElementById("postfood4").value = document.getElementById("menuList3").value;
            window.opener.document.getElementById("postfood5").value = document.getElementById("menuList4").value;
            window.opener.document.getElementById("postfood6").value = document.getElementById("menuList5").value;
            window.opener.document.getElementById("postfood7").value = document.getElementById("menuList6").value;
            window.opener.document.getElementById("postfood8").value = document.getElementById("menuList7").value;
            window.opener.document.getElementById("postfood9").value = document.getElementById("menuList8").value;
            window.opener.document.getElementById("postfood10").value = document.getElementById("menuList9").value;
            window.close();
        }
    </script>

</body>
</html>