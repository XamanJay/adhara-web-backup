<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Cocodrillos Adhara Cancún</title>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="css/services/cocodrillos.css">

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
				<!-- <div class="wrapper_text">
					<div class="grill-text">
						<h4 class="tittle">Restaurante</h4>
						<img src="img/services/restaurant/logo.png" alt="Adhara Grill">
						<p>Conoce nuestro restaurante y degusta de la variedad de platillos con el toque mexicano que nos distingue. Disfruta también de nuestra variedad de postres y pan hecho en casa.</p>
				
					</div>
				</div> -->
				<div class="wrapper_img" style="background-color: #F9EFE4;">
					<div class="row" style="margin: 0px;">
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<img src="<?php echo $_GLOBALS['cocodrillos-bann']; ?>" alt="Cocodrillos" class="img-fluid desktop">
							<img src="<?php echo $_GLOBALS['cocodrillos-bann-mob']; ?>" alt="Cocodrillos" class="img-fluid mobile">
							
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding-top: 2px;padding-bottom: 2px;padding-right: 0px;padding-left: 0px;">
							<a href="http://cocodrillos.com/" target="_blank">
								<img src="img/services/cocodrillos/cocodrillos.png" alt="Cocodrillos" id="coco-web">
							</a>
							<ul style="list-style: none;display: flex;padding-left: 0px;" class="d-flex justify-content-center">
								<li>
									<a href="https://www.facebook.com/Cocodrillos-1200118276728539/" target="_blank">
										<img src="img/services/cocodrillos/facebook.png" alt="Facebook Cocodrillos" id="coco-face">
									</a>
								</li>
								<li>
									<a href="https://twitter.com/Cocodrillo_Cun" target="_blank">
										<img src="img/services/cocodrillos/twitter.png" alt="Twitter Cocodrillos" id="coco-twitter">
									</a>
								</li>
							</ul>
						</div>
					</div>
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