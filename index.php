<?php
session_start();
echo $_SESSION['zalogowany']; ?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Górskie wędrówki</title>
    <link rel="stylesheet" href="main.css" />
</head>


<body>
    <h1>Zdobywaj szczyty</h1>

    <!-- <?php require_once "menu.php"; ?> -->
    <div class="menu">
        <ul>
            <li><a href="index.php">Strona główna</a></li>
            <li><a href="wyprawy.php">Nasze wyprawy</a></li>
            <li><a href="kursy.php">Kursy</a></li>
            <li><a href="o_nas.php">O nas</a></li>

            <?php if (isset($_SESSION['zalogowany'])) { ?>
                <li><a href="wyloguj.php">Wyloguj się</a></li>
            <?php } else { ?>
                <li><a href="logowanie.php">Zaloguj się</a></li>
            <?php } ?>

        </ul>
    </div>

</body>

</html>