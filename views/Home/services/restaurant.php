<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Restaurant Adhara Cancún</title>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="css/services/grill.css">

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
					<div class="grill-text">
						<h4 class="tittle"><?php echo $_GLOBALS['restaurante-h']; ?></h4>
						<img src="img/services/restaurant/logo.png" alt="Adhara Grill">
						<p><?php echo $_GLOBALS['restaurante-p2']; ?></p>
						 

					</div>
				</div>

				<div class="wrapper_img desktop" style="background-color: #F9EFE4;">
					<div class="row" style="margin: 0px;">
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<img src="<?php echo $_GLOBALS['restaurante-img2']; ?>" alt="Adhara Grill" class="img-fluid">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding-top: 2px;padding-bottom: 2px;padding-right: 0px;padding-left: 0px;">
							<img src="img/services/restaurant/banner_2.png" alt="Adhara Grill" class="img-fluid">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding-top: 2px;padding-bottom: 2px;padding-right: 0px;padding-left: 0px;">
							<img src="<?php echo $_GLOBALS['restaurante-img3']; ?>" alt="Adhara Grill" class="img-fluid">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding-top: 2px;padding-bottom: 2px;padding-right: 0px;padding-left: 0px;">
							<div class="wrapper_text" style="height: 300px;">
								<div class="grill-text" id="adhara_text">
									<!-- centrar-->
									<!-- se quita en la version de ingles -->
									<p><?php echo $_GLOBALS['restaurante-postre']; ?></p>

								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<img src="img/services/restaurant/banner_1.png" alt="Adhara Grill" class="img-fluid">
						</div>
					</div>
				</div>

				<div class="hold-img mobile">
					<img src="<?php echo $_GLOBALS['restaurante-menu-mob']; ?>" alt="" class="img-fluid">
					<img src="img/services/restaurant/postres_mob.png" alt="" class="img-fluid">
				</div>
				
				
				<div class="wrapper_text" style="height: 300px;">
					<div class="grill-text" id="adhara_text" style="text-align: center;">
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