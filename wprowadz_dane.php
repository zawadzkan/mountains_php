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
$sekret = "6Lf6Wy8aAAAAABbGkT-5W8FJAIxGpIbyM4IiqvX1";
$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
$odpowiedz = json_decode($sprawdz); 


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
    $_SESSION['blad'] = '<span class="blad">Nieprawidłowy login lub hasło!</span>';
    exit();
}

?>  

