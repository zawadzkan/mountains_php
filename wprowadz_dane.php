
<?php 
session_start();

require_once "connect.php";


if(!isset($_POST['wprowadz'])) 
{
    exit();
}

$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
if($polaczenie->connect_error!=0)
{
    echo "Error: ".$polaczenie->connect_error;
    exit();
}

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$login = $_POST['login'];
$haslo = $_POST['haslo1'];
$email = $_POST['email'];


// rejestrowanie
$query = "INSERT INTO uzytkownicy (`imie`, `nazwisko`, `login`, `haslo`, `email`)
 VALUES ('$imie','$nazwisko','$login','$haslo','$email')";
$wynik = $polaczenie->query($query);
echo $wynik;

if(!$wynik){
    blad($polaczenie);
}

// logowanie - dodanie wpisu do tabeli zalogowani
$query = "INSERT INTO zalogowani (`imie`, `nazwisko`, `login`, `haslo`,`email`)
VALUES ('$imie','$nazwisko','$login','$haslo','$email')";
$wynik_logowania = $polaczenie->query($query);

if(!$wynik_logowania){
    blad($polaczenie);
}
$polaczenie->close();
$_SESSION['zalogowany'] = "true";

header('Location: index.php');
exit();


function blad($polaczenie){
    $polaczenie->close();
    $_SESSION['blad'] = '<span style="color: red; font-size: 100px">Nieprawidłowy login lub hasło!</span>';
    exit();
}

?> 