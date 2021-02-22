

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>menu</title>
        <link rel="stylesheet" href="main.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Górskie wędrówki</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="index.php">Strona główna</a></li>
            <li><a href="wyprawy.php">Nasze wyprawy</a></li>
            <li><a href="kursy.php">Kursy</a></li>
            <?php if (isset($_SESSION['id_uzytkownika'])    ) { ?> 
                <li><a href="moje_kursy.php">Moje Kursy</a></li>
            <?php }  ?>
            <li><a href="o_nas.php">O nas</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['id_uzytkownika'])    ) { ?>
            <li><a href="wyloguj.php">Wyloguj się</a></li>
        <?php } else { ?>
            <li><a href="logowanie.php"><span class="glyphicon glyphicon-log-in"></span>Zaloguj się</a></li>
        <?php } ?>
        </ul>
    </div>
    </div>
    </nav>
    </body>
</html>
