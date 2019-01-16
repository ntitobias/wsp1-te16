<?php
/**
 * Page controler för bloggfunktionen
 * 
 * Nu med databasuppkoppling
 */

$h1span="Blogg"; //För masthead-mallen.

require "../includes/settings.php";
require "../includes/global.inc.php";

// Förbered en SQL-fråga att ställa till databasen
$sql = "SELECT * FROM articles ORDER BY pubdate DESC LIMIT 0,5";
$stmt = $dbh->prepare($sql);
$stmt->execute();

$template = 'list-blog-posts';

//Provisorisk angivelse av teckenkodning under tiden vi testar
header("Content-type: text/html; charset=utf-8");

require "../templates/{$template}.php";



/*
//Läs av GET-parametern
$slug = filter_input(INPUT_GET, 'slug', FILTER_SANITIZE_URL);

if(empty($slug)){
    //Ingen enskild sida är vald
    $template = 'list-blog-posts';
} elseif(array_key_exists($slug, $temporary)){
    //Ett befintligt inlägg har valts, visa det
    $blogpost = $temporary[$slug];
    $template = 'single-blog-post';
} else {
    //Ett ogiltigt val har gjorts
    header("HTTP/1.0 404 Not Found");
    $template = 'not-found';
}

*/