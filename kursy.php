<!-- <?php
session_start();

if (!isset($_SESSION['zalogowany']))
{
    header('Location: logowanie.php');
    exit();
}

?> -->
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>Znajdź kurs</title>
    <link rel="stylesheet"  href="main.css" />
</head>

<body>
    

    <ul>
    <li><a href="index.php">Strona główna</a></li>
    <li><a href="wyprawy.php">Nasze wyprawy</a></li>
    <li><a href="kursy.php">Kursy</a></li>
    <li><a href="o_nas.php">O nas</a></li>
    <li><a href="logowanie.php">Zaloguj się</a></li>
    </ul>

<!--     
    <?php

    echo "<p>Witaj ".$_SESSION['login'].'! [<a href="wyloguj.php">Wyloguj się!</a>]</p>';

    $dataczas = new DateTime();
    echo $dataczas->format('Y-m-d H:i:s');



?>  -->


</body>
</html>