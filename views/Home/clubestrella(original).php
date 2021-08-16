<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Cocodrillos Adhara Cancún</title>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="css/clubestrella.min.css">

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

				
				<div class="wrapper_text" style="background-color: transparent;">
					<div class="club-text">
						<h4 class="tittle"><?php echo $_GLOBALS['clubestrella-h']; ?></h4>
						<h2 class="tittle"><?php echo $_GLOBALS['clubestrella-h2']; ?></h2>
						<img src="img/clubestrella/logo.png" alt="Club Estrella" id="logo_img">
						<h4 class="tittle"><?php echo $_GLOBALS['clubestrella-h3']; ?></h4>
						<h4 class="tittle"><?php echo $_GLOBALS['clubestrella-h4']; ?></h4>
				
					</div>
				</div>
				<div class="wrapper_img">
					<div class="row" style="margin: 0px;">
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<img src="<?php echo $_GLOBALS['clubestrella-img']; ?>" alt="Club Estrella Card" id="club_card">
							
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding-top: 2px;padding-bottom: 2px;padding-right: 0px;padding-left: 0px;">
							<img src="<?php echo $_GLOBALS['clubestrella-img2']; ?>" alt="Club Estrella" id="club_subscribe">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<div class="d-flex align-items-center justify-content-center club_box">
								<p style="margin:0px;"><?php echo $_GLOBALS['clubestrella-h5']; ?></p>

							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding-left:30px;padding-right: 30px;">
							<img src="img/clubestrella/items_.png" alt="Club Estrella" class="img-fluid" style="display: block;margin:0px auto;">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<div class="d-flex align-items-center justify-content-center club_box">
								<p style="margin:0px;"><?php echo $_GLOBALS['clubestrella-h6']; ?></p>

							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:50px;">
							<img src="<?php echo $_GLOBALS['clubestrella-img3']; ?>" alt="Club Estrella" class="img-fluid" style="display: block;margin:0px auto;margin-bottom: 80px;">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
							<a href="https://clubestrella.mx/" target="_blank"><img src="<?php echo $_GLOBALS['clubestrella-img4']; ?>" alt="Subscribete" class="img-fluid" style="display: block;margin:0px auto;margin-bottom: 80px;margin-top: 80px;"></a>
						</div>
					</div>
				</div>
				
				
				<div class="wrapper_text" style="height: 300px;">
					<div class="club-text" id="adhara_text" style="text-align: center;">
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