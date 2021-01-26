<?php
session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
  header('Location: logowanie.php');
  exit();
}

require_once "connect.php";
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
if($polaczenie->connect_error!=0)
{
    echo "Error: ".$polaczenie->connect_error;
    exit();
}

  $login = $_POST['login'];
  $haslo = $_POST['haslo'];
  $login = htmlentities($login, ENT_QUOTES, "UTF-8");
  
  echo $login;

  $query = sprintf("SELECT * FROM zalogowani WHERE login ='%s'",
  mysqli_real_escape_string($polaczenie,$login));

  $wynik = $polaczenie->query($query);

  while($row = mysqli_fetch_array($wynik))
  {
    $login_z_bazy = $row['login'];
    $haslo_z_bazy = $row['haslo'];

    if($login_z_bazy === $login && $haslo_z_bazy === $haslo){
      echo "Natalka to parówa";
      $_SESSION['zalogowany'] = "true";
      echo "jest oki";
     
      unset($_SESSION['blad']);
      header('Location: kursy.php');
      exit();
      
    }
  }
  $polaczenie->close();
  $_SESSION['blad'] = '<span style="color: red; font-size: 100px">Nieprawidłowy login lub hasło!</span>';
  header('Location: logowanie.php');
  exit();
?> 