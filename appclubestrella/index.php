<?php

session_start();

if(isset($_SESSION['cliente'])){

	header("Location: qrcode.php");

	return false;

}



?>

<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

	<link rel="stylesheet" type='text/css' href="css/bootstrap.min.css"/>

	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<link rel="icon" type="image/png" href="img/club.png" />

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Roboto:300,400,500,700" rel="stylesheet">

	<title>Clubestrella</title>

</head>

<body>

	<nav class="header"></nav>

	<div class="container">

		<section id="login">

			<div class="row">

				<div class="col-md-3">

					<img src="img/logo.png" class="img-responsive center-block" alt="Clubestrella">

				</div>

				<div class="col-md-9">

					<div class="row">

						<form action="main/success.php" method="POST">

							<div class="col-md-2">

								<div class="form-group middle" style="height: 34px;">

									<label for="" style="font-size: 13px;">Iniciar sesión </label>

								</div>

							</div>

							<div class="col-md-4 col-sm-6 col-xs-12 pd-without-r">

								<div class="form-group">

									<input type="text" class="form-control" name="username" placeholder="Usuario o correo" required>

								</div>

							</div>

							<div class="col-md-4 col-sm-6 col-xs-12 pd-without-l">

								<div class="form-group">

									<input type="password" class="form-control" name="password" placeholder="Contraseña" required>

								</div>

							</div>

							<div class="col-md-2 col-sm-12 col-xs-12">

								<button type="submit" class="btn btn-default form-control btn-login">Entrar</button>

							</div>

						</form>

					</div>

					<div class="row">

						<div class="col-md-12 text-justify">

							<p>Programa de recompensas para el viajero frecuente, creado para reconocer su preferencia mediante beneficios exclusivos.</p>
							<p><b>Impotante: </b> Si el navegador web te pide que guardes tu correo y contraseña elegir la opción <b>NUNCA</b> para evitar
							que tus datos sean expuestos. Acérquese al Área de Desarrollo si tiene alguna duda.</p>

						</div>

					</div>

					<!--div class="row">

						<div class="col-md-offset-6 col-md-3 col-xs-6">

							<p class="text-center">Aún no soy miembro</p>

						</div>

						<div class="col-md-3 col-xs-6">

							<a class="btn btn-default btn-registro form-control" href="registro/registro.php">Registrarse</a>

						</div>

					</div-->



				</div>

			</div>

		</div>

	</section>

</div>



<footer class="footer">

	<div class="container">

		<div class="row">

			<div class="col-md-12">

				<p class="text-center" style="font-size: 1em">&copy; Clubestrella<br>Todos los derechos reservados</p>

			</div>

		</div>

	</div>

</footer>



</body>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script src="js/bootstrap.min.js" type="text/javascript"></script>

</html>