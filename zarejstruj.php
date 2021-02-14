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

zarejestruj($polaczenie, $imie, $nazwisko, $login, $haslo, $email);
zaloguj($polaczenie, $login);
zakoncz($polaczenie);

function zakoncz($polaczenie){
    $polaczenie->close();
    header('Location: index.php');
    exit();
}

function zarejestruj($polaczenie, $imie, $nazwisko, $login, $haslo, $email){
    zwaliduj_dane_uzytkownika($polaczenie, $email, $login);
    zapisz_uzytkownika_do_bazy($polaczenie, $imie, $nazwisko, $login, $haslo, $email);
}

function zapisz_uzytkownika_do_bazy($polaczenie, $imie, $nazwisko, $login, $haslo, $email){
    $query = "INSERT INTO uzytkownicy (`imie`, `nazwisko`, `login`, `haslo`, `email`)
    VALUES ('$imie','$nazwisko','$login','$haslo','$email')";
    $wynik = $polaczenie->query($query);

    if(!$wynik){
        blad($polaczenie, "Nie udalo sie dodać uzytkownika");
    }   
}

function zwaliduj_dane_uzytkownika($polaczenie, $email, $login){
    $mail_zajety = sprawdz_czy_mail_zajety($polaczenie, $email);
    $login_zajety = sprawdz_czy_login_zajety($polaczenie, $login);

    if($mail_zajety || $login_zajety){
        wyswietl_blad_danych($mail_zajety, $login_zajety, $polaczenie);
    }
}

function wyswietl_blad_danych($mail_zajety, $login_zajety, $polaczenie){
    $komunikat = "";
    if($mail_zajety){
        $komunikat = $komunikat."Mail zajety. ";
    }

    if($login_zajety){
        $komunikat = $komunikat."Login zajety.";
    }

    blad($polaczenie, $komunikat);
}

function blad($polaczenie, $komunikat){
    $polaczenie->close();
    $_SESSION['blad'] = "<span class='blad'>$komunikat</span>";
    header('Location: logowanie.php');
    exit();
}

function sprawdz_czy_login_zajety($polaczenie, $login){
    $wynik = $polaczenie->query("SELECT id FROM uzytkownicy WHERE login='$login'");
    $ile_takich_loginow = $wynik->num_rows;

    if($ile_takich_loginow > 0)
    {
        return true;       
    }
    return false;
}

function sprawdz_czy_mail_zajety($polaczenie, $email){
    $wynik = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
    $ile_takich_maili = $wynik->num_rows;

    if($ile_takich_maili > 0)
    {
        return true;       
    }
    return false;
}

function zaloguj($polaczenie, $login){
    $id_uzytkownika = pobierz_id_uzytkownika_z_bazy($polaczenie, $login);
    zapisz_zalogowanie_w_sesji($id_uzytkownika);
}

function zapisz_zalogowanie_w_sesji($id_uzytkownika){
    $_SESSION['id_uzytkownika'] = $id_uzytkownika;
    unset($_SESSION['blad']);
}

function pobierz_id_uzytkownika_z_bazy($polaczenie,$login){
    $query = sprintf("SELECT * FROM uzytkownicy WHERE login ='%s'",$login);
    $wynik = $polaczenie->query($query);
    $ile_wierszy = $wynik->num_rows;

    if ($ile_wierszy != 1){
        blad($polaczenie, "Wystapil blad. Nieprawidlowa liczba uzytkownikow ".$ile_wierszy);
    }

    while($row = mysqli_fetch_array($wynik))
    {
        $id = $row['id'];
        return $id;
    }
}
?>