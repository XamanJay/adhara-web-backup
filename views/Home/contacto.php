
<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Contacto Adhara Cancún</title>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="css/contacto.min.css">

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
					<div class="contacto-text">
						<img src="img/contacto/icono.png" alt="Adhara Grill">
						<h4 class="tittle"><?php echo $_GLOBALS['contacto-h2']; ?></h4>
						<p><?php echo $_GLOBALS['contacto-p7'] ?></p>
				
					</div>
				</div>

				<div class="wrapper_img" style="background-color: #F9EFE4;">
					<div class="row" style="margin: 0px;">
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<img src="img/contacto/banner.png" alt="Cancun" class="img-fluid desktop">
							<img src="img/contacto/banner_mob.png" alt="Cancun" class="img-fluid mobile">
						</div>
					</div>
				</div>
				
				<div class="wrapper_text" >
					<div class="contacto-text" id="adhara_text">
						<p><?php echo $_GLOBALS['contacto-p8'] ?></p>
					</div>
				</div>

				<div class="wrapper_img" style="background-color: #F9EFE4;">
					<div class="row" style="margin: 0px;">
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<img src="<?php echo $_GLOBALS['contacto-img']; ?>" alt="Cancun" class="img-fluid desktop">
							<img src="img/contacto/map_mob.png" alt="Cancun" class="img-fluid mobile">
						</div>
					</div>
				</div>

				<div class="wrapper_text" >
					<div class="contacto-text">
						<p><?php echo $_GLOBALS['somos-p3']; ?></p>
					</div>
				</div>

				<div class="wrapper_text" style="height: 300px;padding-top: 0px;">
					<div class="contacto-text">
						<p><?php echo $_GLOBALS['contacto-p10']; ?></p>
					</div>
				</div>
				<div class="row" id="contact-info" align="center">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<!-- <h4 style="text-align: center;margin-bottom: 50px;"><?php echo $_GLOBALS['contacto-h']; ?></h4> -->
					</div>
					<div class="col-sm-6" >
						<a href="https://api.whatsapp.com/send?phone=529981221861" target="_blank"><img src="<?php echo $_GLOBALS['contacto-whats']; ?>" alt="Whatsapp" style="width: 350px;float: right;"></a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<h4 style="margin-bottom: 50px;"><?php echo $_GLOBALS['contacto-h']; ?></h4>
						<p><?php echo $_GLOBALS['contacto-p']; ?></p>
						<!-- <p><?php echo $_GLOBALS['contacto-p11']; ?></p> -->
						<p><?php echo $_GLOBALS['contacto-p2']; ?></p>
						<p><?php echo $_GLOBALS['contacto-p3']; ?></p>
						<p><?php echo $_GLOBALS['contacto-p4']; ?></p>
						<p><a href="mailto:">reservaciones@gphoteles.com</a></p>
						<p><a href="mailto:">grupos@gphoteles.com</a></p>
						<p><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3629.7166056839046!2d-86.82406719724726!3d21.168055077748352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1ses-419!2smx!4v1607713477910!5m2!1ses-419!2smx" width="350" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>   </p>
						<div id="nader"></div>
						
					</div>
				</div>

				<div class="row">
				<div class="col-sm-12">
				<div align="center">  </div>
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