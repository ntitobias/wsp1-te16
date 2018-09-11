<?php
/**
 * Slumpar ut en elev från Webbserverprogrammeringsgruppen.
 * 
 * [Förklara mer i detalj med fler meningar.]
 */

$alla_elever = array("Alex", "Dani", "Robert", "Fredrik",
"Edvin", "Adam", "Stefan", "DaWid", "David");

$random_key = array_rand($alla_elever);
$vald_elev = $alla_elever[$random_key];

header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elevslump - Wsp1</title>
</head>
<body>
    <h1>Wsp1 - Val av elev</h1>
<?php
echo "<p><strong>{$vald_elev}</strong> är utvald!</p>";
?>
</body>
</html>