<!DOCTYPE html>
<html lang="en">
<head>

	<?php include "views/partial_views/_styles.php"; ?> 

	<title>Pool Adhara Cancún</title>
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
						<h4 class="tittle"><?php echo $_GLOBALS['alberca-h']; ?></h4>
						<p><?php echo $_GLOBALS['alberca-p']; ?></p>

						<p><?php echo $_GLOBALS['alberca-p2']; ?></p>

						<p><?php echo $_GLOBALS['alberca-p3']; ?></p>

					</div>
				</div>

				<div class="wrapper_img">
					<img src="/img/services/pool/pool.png" alt="Cuartos" class="img-fluid desktop">
					<img src="/img/services/pool/pool_mobile.png" alt="Cuartos" class="img-fluid mobile">
				</div>

				<div class="wrapper_text">
					<div class="pool-text">
						<img src="img/services/pool/fork-icon.png" id="fork-icon" alt="Adhara Hacienda Cancun" style="width: 60px;">
						<p> <?php echo $_GLOBALS['alberca-p4']; ?></p>
						<p> <?php echo $_GLOBALS['alberca-p5']; ?></p>
					</div>
				</div>

				<div class="wrapper_img">
					<img src="img/services/pool/food.png" alt="Food" class="img-fluid desktop">
					<img src="img/services/pool/tortilla-mob.png" alt="Food" class="img-fluid mobile">
					<img src="img/services/pool/carne-mob.png" alt="Food" class="img-fluid mobile">
					<img src="img/services/pool/bebida-mob.png" alt="Food" class="img-fluid mobile">
				</div>


				
				<div class="wrapper_text" style="height: 300px;">
					<div class="pool-text" id="adhara_text" style="text-align: center;">
						<a href="/" style="text-decoration: none;color: #473934;"> <?php echo $_GLOBALS['home-return']; ?></a>
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