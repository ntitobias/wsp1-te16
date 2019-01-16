<?php
/**
 * 2.1 Visa Datum, månad, tid, etc
 * 
 * [Förklara mer i detalj med fler meningar.]
 */
/*
date_default_timezone_set("Europe/Stockholm");
setlocale(LC_ALL, "sv_SE", "Swedish");
date_default_timezone_set("America/Los_Angeles");
setlocale(LC_ALL, "en_US", "English");
*/

$CURLOCALE = setlocale(LC_ALL, 'sv_SE', 'sv_SE.utf8', 
'swedish', 'sve');
if(!strlen($CURLOCALE)){
    user_error('Locale inte inställd!', E_USER_WARNING);
}

$TZ_SET = date_default_timezone_set('Europe/Stockholm');
if(!strlen($TZ_SET)){
    user_error('Tidszon inte inställd!', E_USER_WARNING);
}

header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2.1 Tid</title>
</head>
<body>
    <h1>2.1 Visa datum, månad, tid, etc.</h1>
<?php
echo "<p>" . strftime("%c") . "</p>\n";
echo "<p>" . strftime("%Y-%m-%d") . "</p>\n";
echo "<p>" . strftime("%A, %d %B %Y") . "</p>\n";
echo "<p>" . strftime("Klockan %H:%M:%S") . "</p>\n";
echo "<p>" . strftime("Klockan %T") . "</p>\n";
echo "<p>" . strftime("Klockan %R") . "</p>\n";
echo "<p>" . strftime("Veckonummer: %V") . "</p>\n";
?>
</body>
</html>