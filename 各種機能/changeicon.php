<?php
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];

$dsn = 'mysql:host=157.112.147.201;
        dbname=g079ff_2020';
$user =  'g079ff_ymgc';
$pass = 'kpEYZ8KU';
try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
}
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $stmt = $dbh->query($sql);
        foreach($stmt as $row){
            $image = $row['image'];
        }
        $res = glob("./images/$image/");
        foreach($res as $f){
            if(is_file($f)){
                unlink($f);
            }
        }
        $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
        $file = "images/$image";
        $sql = "UPDATE user SET image = (:image) WHERE id='$id'";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
            move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $image);//imagesディレクトリにファイル保存
            if (exif_imagetype($file)) {//画像ファイルかのチェック
                $stmt->execute();
                header('Location: http://g079ff.php.xdomain.jp/mypage.php');
            }header('Location: http://g079ff.php.xdomain.jp/mypage.php');
        }header('Location: http://g079ff.php.xdomain.jp/mypage.php');

?>