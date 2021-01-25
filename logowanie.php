<!-- <?php
    session_start();

    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
    {
        header('Location: kursy.php');
        exit();
    }
?> -->
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>Górskie wędrówki</title>
    <link rel="stylesheet"  href="main.css" />
</head>

<body>

<div class="menu">
    <ul>
        <li><a href="index.php">Strona główna</a></li>
        <li><a href="wyprawy.php">Nasze wyprawy</a></li>
        <li><a href="kursy.php">Kursy</a></li>
        <li><a href="o_nas.php">O nas</a></li>
        <li><a href="logowanie.php">Zaloguj się</a></li>
    </ul>
</div>

<form class="box" action="zaloguj.php" method="post">
    <h2>Zaloguj się</h2>
    <input type="text" name="login" placeholder="Login">
    <input type="password" name="haslo" placeholder="Hasło">
    <input type="submit" name="" value="Zaloguj się">
</form>

<div class="rejestracja"  action="rejestracja.php">
    <input type="submit" name="" value="Załóż darmowe konto! - Zarejestruj się">
</div>

<!-- <?php
    if(isset($_SESSION['blad']))
    echo $_SESSION['blad'];
?> -->

</body>
</html>