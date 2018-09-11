<?php
header("Content-type: text/html; charset=utf-8");
if(empty($_GET['name'])){
    $name = 'du okände';
} else {
    $name = filter_input(INPUT_GET, 
        'name', FILTER_SANITIZE_SPECIAL_CHARS);
}
$lang = en;
$typ = "slut";
?>
<!DOCTYPE html>
<?php echo "<html lang=$lang>"; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hej</h1>
    <?php 
        
        /* En kommentar i php 
        på
        flera rader. */
        echo '<p>Hej ', $name, '</p>'; 
        echo "<p>Hej $name</p>";
        //Detta är en kommentar
        echo '<p>', $typ, 'månaden är... Tim O\'Reilly</p>'; 
        echo "<p>{$typ}månaden är... Tim O'Reilly \\säger \"Hej!\"</p>"
    ?>

</body>
</html>

