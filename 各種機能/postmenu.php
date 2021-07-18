<?php
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$recipename = $_POST['foodname'];
$recipecomment = $_POST['foodcomment'];
$food1 = $_POST['postfood1']; $volfood1 = $_POST['volfood1'];
$food2 = $_POST['postfood2']; $volfood2 = $_POST['volfood2'];
$food3 = $_POST['postfood3']; $volfood3 = $_POST['volfood3'];
$food4 = $_POST['postfood4']; $volfood4 = $_POST['volfood4'];
$food5 = $_POST['postfood5']; $volfood5 = $_POST['volfood5'];
$food6 = $_POST['postfood6']; $volfood6 = $_POST['volfood6'];
$food7 = $_POST['postfood7']; $volfood7 = $_POST['volfood7'];
$food8 = $_POST['postfood8']; $volfood8 = $_POST['volfood8'];
$food9 = $_POST['postfood9']; $volfood9 = $_POST['volfood9'];
$food10 = $_POST['postfood10']; $volfood10 = $_POST['volfood10'];


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

    $sql = "INSERT INTO foodstuff(food1,food2,food3,food4,food5,food6,food7,food8,food9,food10,volfood1,volfood2,volfood3,volfood4,volfood5,volfood6,volfood7,volfood8,volfood9,volfood10,recipename,id)
     VALUES (:food1,:food2,:food3,:food4,:food5,:food6,:food7,:food8,:food9,:food10,:volfood1,:volfood2,:volfood3,:volfood4,:volfood5,:volfood6,:volfood7,:volfood8,:volfood9,:volfood10,:recipename,:id)";
    $stmt = $dbh->prepare($sql);
    $params = array(':food1' => $food1,':food2' => $food2,':food3' => $food3,':food4' => $food4,':food5' => $food5,':food6' => $food6,':food7' => $food7,':food8' => $food8,':food9' => $food9,':food10' => $food10,
                    ':volfood1' => $volfood1,':volfood2' => $volfood2,':volfood3' => $volfood3,':volfood4' => $volfood4,':volfood5' => $volfood5,':volfood6' => $volfood6,':volfood7' => $volfood7,':volfood8' => $volfood8,
                    ':volfood9' => $volfood9,':volfood10' => $volfood10,':recipename' => $recipename,':id' => $id);
    $stmt->execute($params); 

for($i=1;$i<=10;$i++){
    $sql = "SELECT * FROM food WHERE name='${food.$i}'";
    $stmt = $dbh->query($sql);
    foreach($stmt as $row){
        $cal[$i] = $row['calorie'];
    } 
    $foodcalorie[$i] = (int)${volfood.$i}*($cal[$i] /100) ;
    $calorie = $foodcalorie[$i] + $calorie;
}



	$sql = "INSERT INTO post (id,name,datetime,recipename,recipecomment,calorie,foodimage) VALUES (:id,:name,now(),:recipename,:recipecomment,:calorie,:foodimage)";
	$stmt = $dbh->prepare($sql);
    $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
    $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
    $file = "foodimages/$image";
	$params = array(':id' => $id,':name' => $name,':recipename' => $recipename,':recipecomment' => $recipecomment,':calorie' => $calorie,':foodimage' => $image);
	$stmt->execute($params);

    if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
		if($_FILES['image']['size'] > 1048576){
	    $file1 = $_FILES['image']['tmp_name'];                        //　元画像ファイル
		$file2 = "foodimages/$image";                                //　画像保存先
		$in = ImageCreateFromJPEG($file1);                        //　元画像ファイル読み込み
		$size = GetImageSize($file1);                            //　元画像サイズ取得
		$width = $size[0] / 3;                                //　生成する画像サイズ（横）
		$height = $size[1] / 3;                                //　生成する画像サイズ（縦）
		$out = ImageCreateTrueColor($width, $height);                    //　画像生成
		ImageCopyResampled($out, $in, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);    //　サイズ変更・コピー
		ImageJPEG($out, $file2);                            //　画像保存
		ImageDestroy($in);
		ImageDestroy($out);
		}
		else {
        move_uploaded_file($_FILES['image']['tmp_name'], './foodimages/' . $image);//imagesディレクトリにファイル保存 
		}
        header('Location: http://g079ff.php.xdomain.jp/myrecipe.php');
    }header('Location: http://g079ff.php.xdomain.jp/myrecipe.php');

?>