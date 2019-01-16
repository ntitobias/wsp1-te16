<?php
/**
 * En utf8-funktion som vänder på en textsträng.
 * 
 * Denna funktion liknar PHP:s inbyggda funktion 
 * strrev(), men förutsätter att teckenkodningen är
 * utf-8 och inte win-1252/ISO-8859-1. 
 * @param string $str En utf-8 kodad sträng.
 * @return string Strängen i omvänd ordning.
 */

function utf8_strrev($str){
    //Namnet baklänges
    preg_match_all('/./us', $str, $temp_arr);
    return join('', array_reverse($temp_arr[0]));
}

//Hämta data från formuläret
$submitted_name = filter_input(INPUT_POST, 'name', 
    FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW);

//En variabel som håller reda på om vi har fått något
//användbart. Vi börjar med att förutsätta att så inte
//är fallet.
$namedata = false;
if(!empty($submitted_name)){
    //Ta bort onödiga tomma tecken i början och på slutet.
    $submitted_name = trim($submitted_name);
    //Säkra namnet för HTML_output
    $output_name = htmlspecialchars($submitted_name, ENT_QUOTES);
    //Antal tecken i namnet
    $charcount = mb_strlen($submitted_name);
    //Namnet baklänges
    $name_reversed = utf8_strrev($submitted_name);
    //Säkra för html-output
    $name_reversed=htmlspecialchars($name_reversed, ENT_QUOTES);
    $namedata=true;
} 
header("Content-type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Namntest</title>
</head>
<body>
    <h1>Avsnitt 2.3: Namntest</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label for="name">Vad heter du?</label>
            <input type="text" name="name" id="name" 
                placeholder="ex. Åke Svensson" />
        </p>
        <p>
            <input type="submit" value="Testa namnet" />
        </p>
    </form>
<?php
if($namedata){
echo <<<DATA
    <dl>
        <dt>Namn</dt>
        <dd>{$output_name}</dd>
        <dt>Antal tecken (inklusive ev. mellanslag i mitten)</dt>
        <dd>{$charcount}</dd>
        <dt>Namnet baklänges</dt>
        <dd>{$name_reversed}</dd>
    </dl>
DATA;
}
?>
</body>
</html>