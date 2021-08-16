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
							<h1 style="font-weight: 400;margin-top: 15px;margin-bottom: 0px;color:red;" class="error-tittle">¡Sentimos los inconvenientes!</h1>
							<p class="error_" style="margin-bottom: 35px;">Se ha presentado un error a la hora de mandar un email a su correo electronico.</p>
							<p class="error_" style="margin-bottom: 60px;">El número de referencia de su reservacion es: <strong id="referencia">'.$_GET['r'].'</strong></p>
							<p class="error_" style="margin-bottom: 60px;">Favor de contactarnos a los telefonos del hotel para que podamos mandarle su informacion.</strong></p>';
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