<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>404 Adhara Cancún</title>
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

				<img src="/img/404/404.png" alt="404 error" class="img-fluid" style="display: block;margin: 0px auto;margin-top: 50px;">
				<?php 
					($_COOKIE['lang'] == "es") ? $src = "img/404/sorry_esp.png" : $src = "img/404/sorry.png";

					echo "<img src= '".$src."' alt='' style='width:400px;display:block;margin:0px auto;'>"

				?>
				
				<p class="error_" style="margin-top: 50px;"><?php echo $_GLOBALS['404-p']; ?></p>
				<p class="error_"><?php echo $_GLOBALS['404-p2']; ?></p>
				<p class="error_"><?php echo $_GLOBALS['404-p3']; ?></p>

				
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