<?php
header("Content-type: text/html; charset=utf-8");

require "../includes/settings.php";
require "../includes/global.inc.php";

$dbh = get_dbh();

// Förbered en SQL-fråga att ställa till databasen
$sql = "SELECT *  FROM users ORDER BY lastname DESC";
$stmt = $dbh->prepare($sql);
//Utför frågan
$stmt->execute();
//Loopa igenom resultatet och dumpa varje rad.
while($user=$stmt->fetch()){
    var_dump($user);
}