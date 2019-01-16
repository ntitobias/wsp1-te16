<?php
header("Content-type: text/html; charset=utf-8");
$dbh = new PDO('mysql:host=localhost;dbname=laxhjalpen;charset=utf8',
                'phpuser-te16', 'c9djhTQ8z5mOF9Nj');
if(! $dbh){
    echo "Kontakt ej etablerad";
    exit;
}
echo "<h1>Kontakt etablerad. Hurra!</h1>";

// Förbered en SQL-fråga att ställa till databasen
$sql = "SELECT *  FROM users ORDER BY lastname DESC";
$stmt = $dbh->prepare($sql);
//Utför frågan
$stmt->execute();
//Loopa igenom resultatet och dumpa varje rad.
while($user=$stmt->fetch()){
    var_dump($user);
}