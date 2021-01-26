<div class="menu">

    <ul>
        <li><a href="index.php">Strona główna</a></li>
        <li><a href="wyprawy.php">Nasze wyprawy</a></li>
        <li><a href="kursy.php">Kursy</a></li>
        <li><a href="o_nas.php">O nas</a></li>

        <?php if (isset($_SESSION['zalogowany'])    ) { ?>
            <li><a href="wyloguj.php">Wyloguj się</a></li>
        <?php } else { ?>
            <li><a href="logowanie.php">Zaloguj się</a></li>
        <?php } ?>

    </ul>
</div>
