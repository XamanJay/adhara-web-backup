<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Grupos Adhara Cancún</title>
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
						<img src="img/grupos/suitcase.png" alt="Adhara Grupos">
						<h4 class="tittle"><?php echo $_GLOBALS['grupos-h']; ?></h4>
						<p><?php echo $_GLOBALS['grupos_tittle']; ?></p>
				
					</div>
				</div>

				<div class="wrapper_img" style="background-color: #F9EFE4;">
					<div class="row" style="margin: 0px;">
						<div class="col-xs-12 col-sm-6 col-md-6 desktop" style="padding:0px;">
							<img src="<?php echo $_GLOBALS['grupos_img']; ?>" alt="Cancun" class="img-fluid">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 desktop" style="padding:0px;">
							<img src="img/grupos/derecha.png" alt="Cancun" class="img-fluid">
						</div>
						<div class="col-xs-12 col-sm-12 mobile">
							<img src="img/grupos/grupos_mob.png" alt="Grupos" class="img-fluid">
						</div>
					</div>
				</div>
				
				<a href="https://api.whatsapp.com/send?phone=529983021988" target="_blank"><img src="<?php echo $_GLOBALS['grupos_whatsapp']; ?>" alt="Whatsapp" style="width: 300px;display: block;margin:0px auto;margin-top: 100px;"></a>

				<div class="wrapper_text" style="height: 300px;">
					<div class="contacto-text" id="adhara_text" style="text-align: center;">
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