<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8"/>
    <title>Górskie wędrówki</title>
    <link rel="stylesheet" href="main.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> 
</head>
<body>
<?php

session_start();
// if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
// {
//     header('Location: kursy.php');
//     exit();
// }
?>
    <div class="menu">
        <ul>
            <li><a href="index.php">Strona główna</a></li>
            <li><a href="wyprawy.php">Nasze wyprawy</a></li>
            <li><a href="kursy.php">Kursy</a></li>
            <li><a href="o_nas.php">O nas</a></li>
            <li><a href="logowanie.php">Zaloguj się</a></li>
        </ul>
    </div>

    <div class="box">
        <form name="logForm" action="zaloguj.php" method="post">
            <h2>Zaloguj się</h2>
            <input type="text" name="login" placeholder="Login">
            <input type="password" name="haslo" placeholder="Hasło">
            <input type="submit" value="Zaloguj się">
        </form>
    </div>
    <div class="rejestracja" action="rejestracja.php">
        <input type="submit" name="" value="Załóż darmowe konto! - Zarejestruj się">
    </div>

    <?php
            if (isset($_SESSION['blad']))
                echo $_SESSION['blad'];
            ?>



<div class="modal fade" id="rejestracjaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Uzupełnij dane, aby się zarejestrować</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> 
      <form action="wprowadz_dane.php" method="post">
      <div class="modal-body">
        <div class="form-rejestr">
            <label> Imię </label>
            <input type="text" name="imie" class="form-control" placeholder="Wpisz imię">
        </div>
        <div class="form-rejestr">
            <label> Nazwisko </label>
            <input type="text" name="nazwisko" class="form-control" placeholder="Wpisz nazwisko">
        </div>
        <div class="form-rejestr">
            <label> Login </label>
            <input type="text" name="login" class="form-control" placeholder="Wpisz login">
        </div>
        <div class="form-rejestr">
            <label> Hasło </label>
            <input type="password" name="haslo1" class="form-control" placeholder="Wpisz hasło">
        </div>
        <div class="form-rejestr">
            <label> Powtórz hasło </label>
            <input type="password" name="haslo2" class="form-control" placeholder="Powtórz hasło">
        </div>
        <div class="form-rejestr">
            <label> E-mail </label>
            <input type="text" name="email" class="form-control" placeholder="Wpisz adres e-mail">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
        <button type="submit" name="wprowadz" class="btn btn-primary">Zarejestruj</button>
      </div>
      </form>
     </div>
  </div>
</div>

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rejestracjaModal">
                        Zarejestruj się za darmo!
                    </button>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> 

</body>

</html>