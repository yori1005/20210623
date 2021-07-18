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

$sql = "SELECT * FROM post WHERE id = '$id'";
$stmt = $dbh->query($sql);
$i = 0;
foreach($stmt as $row){
    $postnum[$i] = $row['num']; $postname[$i] = $row['name'];
    $postid[$i] = $row['id'];   $postdatetime[$i] = $row['datetime'];
    $recipename[$i] = $row['recipename']; $recipecomment[$i] = $row['recipecomment'];
    $calorie[$i] = $row['calorie']; $foodimage[$i] = $row['foodimage'];
    $i++;
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
            <a href="http://g079ff.php.xdomain.jp/post_page.php" class="btn_03">レシピを投稿する</a><p>
            <?php for($k=($i-1);$k>=0;$k--){ ?>

			<form method="post" action="mydetail_page.php">
			<input type="hidden" name="key<?php echo $k ?>" value="<?php echo $recipename[$k] ?>">
			<input type="submit" value="レシピの詳細を見る">
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