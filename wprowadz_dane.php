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
// zaloguj($polaczenie, $login);

// logowanie - dodanie wpisu do tabeli zalogowani
// $query = "INSERT INTO zalogowani (`imie`, `nazwisko`, `login`, `haslo`,`email`)
// VALUES ('$imie','$nazwisko','$login','$haslo','$email')";
// $wynik_logowania = $polaczenie->query($query);

// if(!$wynik_logowania){
//     blad($polaczenie);
// }
// $polaczenie->close();
// $_SESSION['zalogowany'] = "true";

// header('Location: index.php');
// exit();




function zarejestruj($polaczenie, $imie, $nazwisko, $login, $haslo, $email){
    // rejestrowanie
    zwaliduj_dane_uzytkownika($polaczenie, $email, $login);
    echo "Gituwa";
    //zapisz_uzytkownika_do_bazy();



    // $query = "INSERT INTO uzytkownicy (`imie`, `nazwisko`, `login`, `haslo`, `email`)
    // VALUES ('$imie','$nazwisko','$login','$haslo','$email')";
    // $wynik = $polaczenie->query($query);
    // echo $wynik;
    // if(!$wynik){
    //     blad($polaczenie);
    // }
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

function pobierz_id_uzytkownika($polaczenie,$login){
    // $nazwa_uzytkownika_dla_sql = mysqli_real_escape_string($polaczenie,$login);
    // $query = sprintf("SELECT * FROM uzytkownicy WHERE login ='%s'",$nazwa_uzytkownika_dla_sql);
    // $wynik = $polaczenie->query($query);
   

   
   
    // echo "<br>";
    // echo "Ile wierszy ".$wynik->num_rows;
    // echo "<br>";

    // while($row = mysqli_fetch_array($wynik))
    // {
    //     $login_z_bazy = $row['login'];
    //     $haslo_z_bazy = $row['haslo'];
    //     $id = $row['id'];

    //     echo "$id $login_z_bazy $haslo_z_bazy";
    //     echo "<br>";

    // }
    // exit();
    // return 1;
}

function zaloguj($polaczenie, $login){
    // $id_uzytkownika = pobierz_id_uzytkownika($polaczenie, $login);
    // echo $id_uzytkownika;
    // zapisz_zalogowanie_w_bazie($id_uzytkownika);
    // zapisz_zalogowanie_w_sesji($id_uzytkownika);


}

?>