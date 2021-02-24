<?php
session_start();
if (!isset($_SESSION['id_uzytkownika'])) {
    header('Location: logowanie.php');
    exit();
}
require_once "connect.php";
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
if ($polaczenie->connect_error != 0) {
    echo "Error: " . $polaczenie->connect_error;
    exit();
}

$id_uzytkownika =  $_SESSION['id_uzytkownika'];
$zakupienia = pobierz_zakupienia_z_bazy($id_uzytkownika, $polaczenie);


function pobierz_zakupienia_z_bazy($id_uzytkownika, $polaczenie)
{
    $query = sprintf("SELECT * FROM zakupienia WHERE id_kupujacego ='%s'", $id_uzytkownika);
    $wynik = $polaczenie->query($query);
    return $wynik;
}
?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Moje kursy</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="main.css" />

</head>

<body>
    <?php require_once "menu.php"; ?>
    <div class="moje-kursy" style="font-family: 'Lato', Arial, sans-serif; text-transform: uppercase; white-space:nowrap;  width: 1500px;">
    <div class="row" style="margin-top: 50px; margin-left: 300px; font-size:20px;">
        <div class="col-lg-2"> Nazwa kursu</div>
        <div class="col-lg-2"> Imie uczestnika</div>
        <div class="col-lg-3"> Nazwisko uczestnika</div>
    </div>
    
    
    <?php
    while ($zakupienie = mysqli_fetch_array($zakupienia)) { ?>
        <div class="row" style="margin-top: 20px; margin-left: 300px">
            <div class="col-lg-2"> <?php echo $zakupienie["nazwa_kursu"]; ?></div>
            <div class="col-lg-2" style="font-size: 15px;"> <?php echo $zakupienie["imie_uczestnika"]; ?></div>
            <div class="col-lg-3" style="font-size: 15px;"> <?php echo $zakupienie["nazwisko_uczestnika"]; ?></div>
        </div>
    <?php } ?>
    </div>

</body>

</html>