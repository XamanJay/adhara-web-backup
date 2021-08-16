<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Somos Adhara Cancún</title>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="css/somos.css">

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
					<div class="somos-text">
						<img src="img/somos/bird.png" alt="Adhara Grill">
						<h4 class="tittle"><?php echo $_GLOBALS['home-tittle-2']; ?></h4>
						<p style="margin-bottom: 0px;"><?php echo $_GLOBALS['somos-h']; ?></p>
						<p><?php echo $_GLOBALS['somos-h2']; ?></p>
				
					</div>
				</div>

				<div class="wrapper_img" style="background-color: #F9EFE4;">
					<div class="row" style="margin: 0px;">
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<img src="img/somos/fachada.png" alt="Cancun" class="img-fluid desktop">
							<img src="img/somos/fachada_mob.png" alt="Cancun" class="img-fluid mobile">
						</div>
					</div>
				</div>
				
				<div class="wrapper_text" style="height: 300px;">
					<div class="somos-text" id="adhara_text">
						<p><?php echo $_GLOBALS['somos-p2']; ?></p>
					</div>
				</div>

				<div class="wrapper_img" style="background-color: #F9EFE4;">
					<div class="row" style="margin: 0px;">
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<img src="img/somos/lobby.png" alt="Cancun" class="img-fluid desktop">
							<img src="img/somos/lobby_mob.png" alt="Cancun" class="img-fluid mobile">
						</div>
					</div>
				</div>

				<div class="wrapper_text" style="height: 300px;">
					<div class="somos-text" id="top_text">
						<p><?php echo $_GLOBALS['somos-p3']; ?></p>
					</div>
				</div>
				<div class="wrapper_img" style="background-color: #F9EFE4;">
					<div class="row" style="margin: 0px;">
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<img src="<?php echo $_GLOBALS['somos-img']; ?>" alt="Cancun" class="img-fluid desktop">
							<div class="mobile somos-text-mobile " style="background-image:url('/img/somos/cupula_mob.png');width: 100%;height: 360px;background-size:contain;padding-top: 120px;">
								<p>"<?php echo $_GLOBALS['somos-details']; ?>"</p>
								<p><?php echo $_GLOBALS['somos-po']; ?></p>
							</div>
						</div>
					</div>
				</div>

				<div class="wrapper_text" style="height: 300px;">
					<div class="somos-text" id="adhara_text">
						<p><?php echo $_GLOBALS['somos-p5']; ?></p>
					</div>
				</div>
				<div class="wrapper_img" style="background-color: #F9EFE4;">
					<div class="row" style="margin: 0px;">
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<img src="img/somos/entrada.png" alt="Cancun" class="img-fluid desktop">
							<img src="img/somos/entrada_mob.png" alt="Cancun" class="img-fluid mobile">
						</div>
					</div>
				</div>

				<!-- <div class="wrapper_text" style="height: 300px;">
					<div class="somos-text" id="top_text">
						<p><?php echo $_GLOBALS['somos-p6']; ?></p>
					</div>
				</div> -->

				<div class="wrapper_text" style="height: 300px;">
					<div class="somos-text" id="adhara_text" style="text-align: center;">
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

<script type="text/javascript">
	function sucursales() {
        // Create a map object and specify the DOM element for display.
        var nader = {lat: 21.168477, lng: -86.824236};
        var map_nader = new google.maps.Map(document.getElementById('nader'), {
          center: nader,
          zoom: 16
        });
        var marker_nader = new google.maps.Marker({
          position: {lat: 21.168477, lng: -86.824236},
          map: map_nader,
          //icon: 'img/marker_.png' // null = default icon
        });

        marker_nader.setAnimation(google.maps.Animation.BOUNCE);
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFWlA8W2jx51jbdNGby-6DcjSBZOdrQdQ&callback=sucursales"
    async defer></script>

</html>