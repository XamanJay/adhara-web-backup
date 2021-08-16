<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Banamex-response Adhara Cancún</title>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="/css/404.min.css">

</head>
<body style="background-image: url('/img/background.png');">

	<?php include "lang/languaje.php"; ?>	

	<!-- Navbar mobile -->
    <?php include "views/partial_views/_navbar_mobile.php"; ?>

	<!-- Redes Sociales -->
	<?php include "views/partial_views/_redes.php"; ?>

	<div id="general">
		<!-- Navbar -->
		<?php include "views/partial_views/_navbar.php"; ?>
		
		<div class="container">
			
			<div  id="wrapper-content" style="padding-top: 60px;">

				<!-- test mobile -->
				<?php 	
					if($_GET){

						if($_GET['estatus'] == "aceptado"){

							if($_GET['msg'] == "Cancelled"){

								echo '
								<h1 style="font-weight: 400;margin-top: 30px;margin-bottom: 0px;" class="error-tittle">¡Sigue navegando en <br> </h1>
								<h1 style="font-weight: 400;margin-top: 0px;margin-bottom: 45px;" class="error-tittle">Hotel Adhara Cancún!</h1>
								<p style="margin-bottom: 60px;" class="error_">El número de referencia es: <strong id="referencia">No se Generó</strong></p>
								<p style="margin-bottom: 60px;" class="error_">Mensaje: <strong id="referencia">Se canceló la transacción.</strong></p>';

							}
							else{

								echo '
								<h1 style="font-weight: 400;margin-top: 15px;margin-bottom: 0px;" class="error-tittle">¡Gracias por comprar en <br> </h1>
								<h1 style="font-weight: 400;margin-top: 0px;margin-bottom: 45px;" class="error-tittle">Hotel Adhara Cancún!</h1>
								<p style="margin-bottom: 60px;" class="error_">Hemos recibido su solicitud, en breve recibirá un correo con <br> información  detallada  sobre su reservación.</p>
								<p style="margin-bottom: 60px;" class="error_">El número de referencia es: <strong id="referencia">'.$_GET['order'].'</strong></p>
								<p style="margin-bottom: 60px;" class="error_">Mensaje: <strong id="referencia">'.$_GET['msg'].'</strong></p>
								';
								if($_GET['txn'] != "7" && $_GET['txn'] != "No Value Returned"){

									echo '
										<p style="margin-bottom: 60px;" class="error_">El número de autorización es: <strong id="referencia">'.$_GET['id'].'</strong></p>
									';
								}
							}
						}
						else{

							echo '
								<h1 style="font-weight: 400;margin-top: 40px;margin-bottom: 45px;" class="error-tittle">Ha ocurrido un problema</h1>
								<p style="margin-bottom: 40px;" class="error_">El cargo a su tarjeta fue rechazádo por el banco</p>
								<p style="margin-bottom: 60px;" class="error_">por favor verifique sus datos e intente de nuevo.</p>
								<p style="margin-bottom: 60px;" class="error_">Mensaje: <strong id="referencia">'.$_GET['msg'].'</strong></p>
							';
						}
					}
				?>

				<div class="wrapper_text" style="height: 300px;">
					<div class="error-text" id="adhara_text">
						<p>
							<a href="/"> <?php echo $_GLOBALS['home-return']; ?> </a>
						</p>
					</div>
				</div>
				
				<div id="wrapper_footer">
					<?php include "views/partial_views/_footer.php"; ?>
				</div>
			</div>
		</div>
	</div>
	 <!-- Site Overlay 
    <div class="site-overlay"></div>-->
	<!-- Preloading -->
	<!-- <?php include "views/partial_views/_preloading.php"; ?> -->

</body>

<?php include "views/partial_views/_scripts.php"; ?>


</html>