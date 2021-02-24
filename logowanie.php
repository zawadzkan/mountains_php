<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Górskie wędrówki</title>
    <link rel="stylesheet" href="main.css" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <?php
    session_start();
    ?>
    <?php require_once "menu.php"; ?>
    <div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Zaloguj</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Zarejestruj</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="zaloguj.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="login" id="username" tabindex="1" class="form-control" placeholder="Login" value="">
									</div>
									<div class="form-group">
										<input type="password" name="haslo" id="password" tabindex="2" class="form-control" placeholder="Hasło">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Zaloguj się">
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="zarejstruj.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="imie" id="username" tabindex="1" class="form-control" placeholder="Wpisz imię" value="">
                                    </div>
                                    <div class="form-group">
										<input type="text" name="nazwisko" id="username" tabindex="1" class="form-control" placeholder="Wpisz nazwisko" value="">
                                    </div>
                                    <div class="form-group">
										<input type="text" name="login" id="username" tabindex="1" class="form-control" placeholder="Wpisz login" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Wpisz adres e-mail" value="">
									</div>
									<div class="form-group">
										<input type="password" name="haslo1" id="password" tabindex="2" class="form-control" placeholder="Wpisz hasło">
									</div>
									<div class="form-group">
										<input type="password" name="haslo2" id="confirm-password" tabindex="2" class="form-control" placeholder="Powtórz hasło">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="6Lf6Wy8aAAAAAERXd4f5DvqOlcbpLs4oPNsB5pYR"></div></br> 
                                        </div>
                                    </div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="wprowadz" tabindex="4" class="form-control btn btn-register" value="Zarejestruj">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
   
    <?php
    if (isset($_SESSION['blad']))
        echo $_SESSION['blad'];
    ?>


 
</body>
<script>


$('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
     $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});
$('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
     $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});


</script>
</html>