<?php
session_start();

if (isset($_POST["submit_button"])) {
    require_once "connect.php";
    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
    if ($polaczenie->connect_error != 0) {
        echo "Error: " . $polaczenie->connect_error;
        exit();
    }

    $nazwa_kursu = $_POST["nazwa_kursu"];
    $imie_uczestnika = $_POST["imie_uczestnika"];
    $nazwisko_uczestnika = $_POST["nazwisko_uczestnika"];
    $email_uczestnika = $_POST["email_uczestnika"];
    $id_kupujacego = $_SESSION["id_uzytkownika"];

    if(isset($_POST["uwagi"]))
    {
        $uwagi = $_POST["uwagi"];
    }else{
        $uwagi = "";
    }
        
    $query = "INSERT INTO zakupienia (`nazwa_kursu`, `imie_uczestnika`, `nazwisko_uczestnika`, `email_uczestnika`, `id_kupujacego`, `uwagi`)
    VALUES ('$nazwa_kursu','$imie_uczestnika','$nazwisko_uczestnika','$email_uczestnika', '$id_kupujacego', '$uwagi')";

    echo $query;
    $wynik = $polaczenie->query($query);
        if (!$wynik) {
        echo "Error: " . $polaczenie->error;
        blad($polaczenie, "Nie udalo sie dodać zakupienia");
    }

    header('Location: moje_kursy.php');
}

function blad($polaczenie, $komunikat){
    $polaczenie->close();
    $_SESSION['blad'] = "<span class='blad'>$komunikat</span>";
    echo "<script>alert('$komunikat');</script>"; 
 }
?>


<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Znajdź kurs</title>
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
    <?php require_once "menu.php"; ?>

    <div style="margin: 250px">
        <?php $ids = array("Mały Tatromaniak", "Duży Tatromaniak", "Rysy 2021", "Królewna Śnieżka");
        foreach ($ids as $id) { ?>
            <div class="row" id="contact" style="margin: 10px;">
                <div class="col-lg-2" style="color: white;">
                    <?php echo $id ?>
                </div>
                <div class="col-lg-1">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contact-modal" data-nazwa-kursu="<?php echo $id; ?>">Kup teraz</button>
                </div>
            </div>
        <?php } ?>
    </div>

    <div id="contact-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>Zakup kurs</h3>
                </div>
                <form id="contactForm" name="contact" role="form" method="POST" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nazwa_kursu">Nazwa kursu</label>
                            <input id="nazwa_kursu" type="text" required name="nazwa_kursu" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Imię uczestnika</label>
                            <input type="text" required name="imie_uczestnika" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Nazwisko uczestnika</label>
                            <input type="text" required name="nazwisko_uczestnika" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required name="email_uczestnika" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message">Uwagi</label>
                            <textarea name="message" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit_button" class="btn btn-success" id="submit"> Wyślij </button>
                    </div>
                </form>
            </div>
        </div>

</body>
<script>
    //jQuery Library Comes First
    //Bootstrap Library
    $(document).ready(function() {
        $('#contact-modal').on('show.bs.modal', function(e) { //Modal Event
            var nazwaKursu = $(e.relatedTarget).data('nazwa-kursu');
            console.log(nazwaKursu);
            $(this).find("#nazwa_kursu").text(nazwaKursu);
            $(this).find("#nazwa_kursu").val(nazwaKursu);
        });
    });
</script>

</html>