<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Paypal-cancel Adhara Cancún</title>
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

						if(isset($_GET['r'])){

						echo'
							<h1 style="font-weight: 400;margin-top: 15px;margin-bottom: 0px;" class="error-tittle">¡Gracias por comprar en <br> </h1>
							<h1 style="font-weight: 400;margin-top: 0px;margin-bottom: 45px;" class="error-tittle">Hotel Adhara Hacienda Cancún!</h1>
							<p class="error_" style="margin-bottom: 35px;">Hemos recibido su solicitud, en breve recibirá un correo con <br> información  detallada  sobre su reservación.</p>
							<p class="error_" style="margin-bottom: 60px;">El número de referencia es: <strong id="referencia">'.$_GET['r'].'</strong></p>';
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