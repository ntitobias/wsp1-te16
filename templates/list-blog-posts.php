<?php
/**
 * Mall för listning av blogginlägg
 */
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>De senaste blogginläggen - Läxhjälpen</title>
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' /> 
    <link href="css/laxhjalpen.css" rel="stylesheet" />
</head>
<body class="subpage">
<?php
    require "masthead.php";
    require "menu.php";
?>

    <div role="main">
        <h2>De senaste blogginläggen</h2>

<?php
    foreach($stmt as $blogpost){
        $blogpost['slug'] = urlencode($blogpost['slug']);
echo <<<ARTICLE
        <article class="blogpostlist">
            <h3><a href="blog.php?slug={$slug}">{$blogpost['title']}</a></h3>
            <p><small>Postad {$blogpost['pubdate']} av {$blogpost['username']}</small></p>
            <div class="blogtext">
                {$blogpost['text']}
            </div>
        </article>
ARTICLE;
    }
    echo "</div>\n";

    require "footer.php";
    ?>
</body>
</html>