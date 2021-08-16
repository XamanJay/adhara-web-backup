<?php

require(realpath($_SERVER['DOCUMENT_ROOT']."/models/cliente.php"));

session_start();

if(!isset($_SESSION['cliente'])){

	header("Location: index.php");

	return false;

}



?>



<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Club estrella</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="css/styles.css">

	<link rel="icon" type="image/png" href="img/club.png" />

	<link rel="stylesheet" href="css/sweetalert.css">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Roboto:300,400,500,700" rel="stylesheet">

</head>

<body>

	<?php include("partialViews/navbar.php"); ?>

	<div class="container" >

		<div class="row" style="margin-top: 10px; margin-bottom: 10px;">

			<div class="col-md-12">

				<p class="text-center">

					Escanea tu código QR en la parte de abajo <br>

					(Espera unos segundos hasta que se tu código sea escaneado)



				</p>

				<p id="contador"></p>

				<p id="log"></p>

			</div>

		</div>

		<div class="row">

			<div class="col-md-6 col-md-offset-3">

				<div class="well center-block" style="width: 100%;height: auto;">

					<canvas style="width: 100%;" id="webcodecam-canvas"></canvas>

					<div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>

					<div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>

					<div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>

					<div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>

				</div>

			</div>

		</div>
		<div class="row">
			<div class="col-md-12">
				<p class="text-center">
					<b style="font-size: 16px;"">¡Importante!</b> <br>
					Al finalizar de escanear tus códigos, no olvides <span style="font-size: 16px; font-weight: 600;">Cerrar sesión</span> <br>
					donde dice tu nombre en la parte superior derecha, hacer click y cerrar sesión.
				</p>
			</div>
		</div>
		<div class="row hidden">

			<div class="col-md-6 col-md-offset-3">

				<div class="thumbnail" id="result">

					<div class="caption">

						<h3>Scanned result</h3>

						<input type="hidden" name="qr">

						<p id="scanned-QR"></p>

					</div>

				</div>

				<select class="hidden form-control" id="camera-select"></select>

			</div>

		</div>

	<!--script type="text/javascript">

		$(document).ready(function(){

			$(".reader").html5_qrcode(function(data){

				alert(data);

			},

			function(error){

				$(".read").html(error.name);

			},

			function(videoError){

				$(".read").html(videoError.name);

				console.log(videoError.name);

			});

		});

	</script-->

	

	<script type="text/javascript" src="js/jquery.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/sweetalert.min.js"></script>

	<script type="text/javascript" src="js/qrcodelib.js"></script>

	<script type="text/javascript" src="js/webcodecamjquery.js"></script>

	<script type="text/javascript" src="js/mainjquery.js"></script>

	<script type="text/javascript" src="js/Concurrent.Thread.js"></script> <!-- usar librería en caso de usar inactividad.js y cierre-forzoso.js -->

	<script type="text/javascript" src="js/cierre-forzoso.js"></script>

</body>

</html>