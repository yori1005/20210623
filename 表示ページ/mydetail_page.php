<?php
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
for($i=0;$i<50;$i++){
$keyword = "key".$i;
if($_POST[$keyword] != NULL){
    $key = $_POST[$keyword];
}
}

$dsn = 'mysql:host=157.112.147.201;
        dbname=g079ff_2020';
$user =  'g079ff_ymgc';
$pass = 'kpEYZ8KU';
try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
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
    <title></title>
    <style>
        body {
            margin: 0 auto;
            width: 100%;
        }

        .text {
            text-align: center;
            font-size: 20px;
        }

        .table{
            width: 100%;
            display: table;
            table-layout: fixed;
        }
        .table td{
            word-wrap: break-word;
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
                <table class="table" border="1">
                <tr>
                    <td><div class="text"><?php printf("レシピ名：%s",$recipename) ?></div></td>
                    <td><div class="text"><?php printf("%sさんのレシピ",$postname) ?></div></td>
                </tr>
                <tr>
                    <td rowspan="2"><img src="foodimages/<?php echo $foodimage ?>" width="380" height="285"></td>
                    <td><div class="text"><?php printf("推定カロリー：%s",$calorie) ?></div></td>
                </tr>
                <tr>
                    <td><div class="text"><?php printf("コメント：%s ",$recipecomment) ?></div></td>
                </tr>
            </table><br><br><br>
            <table class="table" border="1">
                <tr>
                    <td><div class="text"><?php printf("材料名") ?></div></td>
                    <td><div class="text"><?php printf("分量") ?></div></td>
                </tr>
                <?php for($i=1;$i<11;$i++){ 
                        if(${volfood.$i} != 0){ ?>
                <tr>
                    <td><div class="text"><?php printf("材料$i ：%s",${food.$i}) ?></div></td>
                    <td><div class="text"><?php printf("分量：%s",${volfood.$i}) ?></div></td>
                </tr>
                <?php    } 
                        }?>
            </table><br><br><br>

            <form method="post" action="repost_page.php">
			<input type="hidden" name="key" value="<?php echo $recipename ?>">
			<input type="submit" value="レシピを編集する">
			</form>
        </div>
    </main>
</body>
</html>