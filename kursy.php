<?php
session_start(); 
if (!isset($_SESSION['id_uzytkownika'])) {
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

</body>

</html>