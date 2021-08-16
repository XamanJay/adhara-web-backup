<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Gym Adhara Cancún</title>
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
						<img src="/img/services/pool/pool-icon.png" alt="Gimnasio" id="pool_icon">
						<h4 class="tittle"><?php echo$_GLOBALS['gym-h']; ?></h4>
						<p><?php echo $_GLOBALS['gym-p']; ?></p>

					</div>
				</div>

				<div class="wrapper_img" style="background-color: #F9EFE4;">
					<div class="row" style="margin: 0px;">
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<img src="img/services/gym/gym_2021_big.png" alt="Gym Adhara Cancún" class="img-fluid desktop" style="margin: 0px auto;">
							<img src="img/services/gym/gym_2021_small.png" alt="Gym Adhara Cancún" class="img-fluid mobile" style="margin: 0px auto;">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6" style="padding-right: 3px;padding-top: 4px;padding-bottom: 4px;padding-left: 0px;">
							<img src="img/services/gym/gym-2.png" alt="Gym Adhara Cancún" class="img-fluid desktop">
							<img src="img/services/gym/gym-2-mob.png" alt="Gym Adhara Cancún" class="img-fluid mobile">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6" style="padding-left: 3px;padding-top: 4px;padding-bottom: 4px;padding-right: 0px;">
							<img src="img/services/gym/gym-3.png" alt="Gym Adhara Cancún" class="img-fluid desktop">
							<img src="img/services/gym/gym-3-mob.png" alt="Gym Adhara Cancún" class="img-fluid mobile">
						</div>
					</div>
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