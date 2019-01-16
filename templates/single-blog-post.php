<?php
/**
 * Mall för visning av ett blogginlägg
 */
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo "{$blogpost['title']} - Läxhjälpens blogg"; ?></title>
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' /> 
    <link href="css/laxhjalpen.css" rel="stylesheet" />
</head>
<body class="subpage">
<?php
    require "masthead.php";
    require "menu.php";
    echo <<<MAIN

    <div role="main">
        <article class="singleblogpost">
            <h2>{$blogpost['title']}</h2>
            <p><small>Postad {$blogpost['pubdate']} av {$blogpost['username']}</small></p>
            <div class="blogtext">
                {$blogpost['text']}
            </div>
            <!-- Här ska kommentarer listas i framtiden, samt ett formulär för att skriva kommentarer finnas -->
        </article>
    </div>
MAIN;
    
    require "footer.php";
    ?>
</body>
</html>