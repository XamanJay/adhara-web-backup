<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Lobby Adhara Cancún</title>
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
						<h4 class="tittle">LOBBY BAR</h4>
						<p><?php echo $_GLOBALS['lobby-p']; ?></p>
						<p><?php echo $_GLOBALS['lobby-p2']; ?></p>

					</div>
				</div>

				<div class="wrapper_img" style="background-color: #F9EFE4;">
					<img src="/img/services/lobby/bar.png" alt="Transportacion" class="img-fluid">
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