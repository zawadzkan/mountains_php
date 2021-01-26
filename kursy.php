<?php
session_start();

echo $_SESSION['zalogowany'];
if (!isset($_SESSION['zalogowany'])) {
    header('Location: logowanie.php');
    exit();
}

?>
<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Znajdź kurs</title>
    <link rel="stylesheet" href="main.css" />
</head>

<body>

    <?php require_once "menu.php"; ?>


    <!--     
    <?php

    echo "<p>Witaj " . $_SESSION['login'] . '! [<a href="wyloguj.php">Wyloguj się!</a>]</p>';

    $dataczas = new DateTime();
    echo $dataczas->format('Y-m-d H:i:s');



    ?>  -->


</body>

</html>