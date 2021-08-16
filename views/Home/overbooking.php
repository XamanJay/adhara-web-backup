<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Booking Adhara Cancún</title>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="css/404.min.css">

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
					if($_GET['r'] != 0){
						$hotelController = new hotelController();
						echo '<h1 style="font-weight: 400;margin-top: 15px;margin-bottom: 30px; text-align:center;font-size:60px;margin-bottom:20px;" class="f-tra">¡Opps!</h1>
						
						<div id="box_purple">
							<p>'.$_GLOBALS['error-p4'].'</p>
							<p>'.$_GLOBALS['error-p5'].'</p>
						</div>
						<img src="/img/items/shark_.png" class="img-fluid" style="display:block;margin:0px auto;margin-bottom:50px;" />
						<p class="error_ font_error">'.$_GLOBALS['error-p'].'</p>
						<p class="error_ font_error"><strong>'.$hotelController->getName($_GET['r']).'</strong></p>
						<p class="error_ font_error">'.$_GLOBALS['error-p2'].'</p>
						<p class="error_ font_error">'.$_GLOBALS['error-p3'].'</p>';
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