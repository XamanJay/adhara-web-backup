<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Shuttle Adhara Cancún</title>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="css/services/pool.css">

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
				<div class="wrapper_text">
					<div class="pool-text">
						<img src="/img/services/pool/pool-icon.png" alt="Pool" id="pool_icon">
						<h4 class="tittle"><?php echo $_GLOBALS['home-magia-h3']; ?></h4>
						<p><?php echo $_GLOBALS['home-magia-p6']; ?></p>
					</div>
				</div>


				<div class="wrapper_img" style="background-color: #F9EFE4;">
					<!-- <img src="/img/services/shuttle/tittle.png" alt="Transportacion" class="img-fluid" style="display: block;margin: 0px auto;"> -->
					<img src="<?php echo $_GLOBALS['shuttle-img']; ?>" alt="Transportacion" class="img-fluid desktop" style="margin: 0px auto;">
					
					<!-- <img src="/img/services/shuttle/Transportation_esp_mobile.png" alt="Transportacion" class="img-fluid mobile" style="margin: 0px auto;"> -->

					<img src="<?php echo $_GLOBALS['shuttle-img-mob']; ?>" alt="Transportacion" class="img-fluid mobile" style="margin: 0px auto;">

					
					<!--div class="label-footer">
						<p>HOTEL - AEROPUERTO</p>
						<p style="margin-bottom: 60px;">6 AM / 7 AM / 8AM / 9AM / 11AM / 4PM / 7PM </p>
						<p><?php echo $_GLOBALS['home-magia-p4']; ?></p>
						<p><?php echo $_GLOBALS['home-magia-p5']; ?></p>
						<p><?php echo $_GLOBALS['home-magia-p7']; ?></p>
					</div-->
				</div>
				
				
				<div class="wrapper_text" style="height: 300px;">
					<div class="pool-text" id="adhara_text" style="text-align: center;">
						<a href="/" style="text-decoration: none;color: #473934;"> <?php echo $_GLOBALS['home-return']; ?> </a>
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