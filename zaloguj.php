<!-- <?php

session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
  header('Location: logowanie.php');
  exit();
}

require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect.erno;
}
else 
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    
    
    if ($rezultat = @$polaczenie->query(
      sprintf("SELECT * FROM zalogowani WHERE login ='%s'",
      mysqli_real_escape_string($polaczenie,$login))))
    {
      $ilu_userow = $rezultat->num_rows;
      if($ilu_userow>0)
      {
        $wiersz = $rezultat->fetch_assoc();
        if (password_verify($haslo, $wiersz['haslo']))
        {
          $_SESSION['zalogowany'] = true;
          $_SESSION['id'] = $wiersz['id'];
          $_SESSION['login']= $wiersz['login'];

          unset($_SESSION['blad']);
          $rezultat->free_result();
          header('Location: kursy.php');
        }
        else {

          $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
          header('Location: logowanie.php');
        }


      }  else {

          $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
          header('Location: logowanie.php');
        
      }
    }

    $polaczenie->close();
}


?> -->
<!-- <?php

  $login = $_POST['login'];
  $haslo = $_POST['haslo'];

  echo $login."<br/>";
  echo $haslo;


?> -->