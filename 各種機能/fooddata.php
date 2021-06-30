<?php

$dsn =   'mysql:host=157.112.147.201;
          dbname=g079ff_2020';
$user =  'g079ff_ymgc';
$pass =  'kpEYZ8KU';
try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$f = fopen("./food.csv","r");

while($line = fgetcsv($f)){

echo"<table>";
    echo"<tr>";
    for($i=0;$i<count($line);$i++){
        echo"<td>" . $line[$i] . "</td>";
    }
    $sql = "INSERT INTO food (name,calorie) VALUES (:name,:calorie)";
    $stmt = $dbh->prepare($sql);
    $params = array(':name' => $line[0],':calorie' => $line[1]);
    $stmt->execute($params);
    echo "</tr>";
}
echo"</table>";

fclose($f);
?>