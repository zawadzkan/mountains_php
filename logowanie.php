<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Górskie wędrówki</title>
    <link rel="stylesheet" href="main.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
									<!-- <div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Zapamiętaj</label>
									</div> -->
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Zaloguj się">
											</div>
										</div>
									</div>
									<!-- <div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div> -->
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
    <!-- <div class="container"> -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rejestracjaModal">
            Zarejestruj się
        </button> -->
        <!-- <div class="box">
            <form name="logForm" action="zaloguj.php" method="post">
                <h2>Zaloguj się</h2>
                <input type="text" name="login" placeholder="Login">
                <input type="password" name="haslo" placeholder="Hasło">
                <input type="submit" value="Zaloguj się">
            </form>
        </div> -->

        <!-- <div class="modal fade" id="rejestracjaModal" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" ></button>
                    </div>
                    <form action="zarejstruj.php" method="post">
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
                            <br>
                                <div class="g-recaptcha" data-sitekey="6Lf6Wy8aAAAAAERXd4f5DvqOlcbpLs4oPNsB5pYR"></div></br> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                            <button type="submit" name="wprowadz" class="btn btn-primary">Zarejestruj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['blad']))
        echo $_SESSION['blad'];
    ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->

</body>
<script>
    $(function() {

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

});
</script>
</html>