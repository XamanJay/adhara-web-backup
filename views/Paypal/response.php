<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Paypal-cancel Adhara Cancún</title>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="/css/services/pool.css">

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
				<!-- Buscardor -->
				<?php include "views/partial_views/_search.php"; ?>

				<!-- test mobile -->
				<?php 	
					if($_GET){

						if($_GET == NULL){

						echo'
							<h1 style="font-weight: 400;margin-top: 15px;margin-bottom: 0px;" class="f-tra">¡Gracias por comprar en <br> </h1>
							<h1 style="font-weight: 400;margin-top: 0px;margin-bottom: 45px;" class="f-tra">Hotel Adhara Cancún!</h1>
							<p style="margin-bottom: 60px;">Hemos recibido su solicitud, en breve recibirá un correo con <br> información  detallada  sobre su reservación.</p>';
						}
					}
				?>

				
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