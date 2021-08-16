<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Somos Adhara Cancún</title>
	<?php include "views/partial_views/_styles.php"; ?>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="css/eventos.css">

	<link href="https://fonts.googleapis.com/css?family=Noto+Serif+SC" rel="stylesheet">

	<?php include "views/partial_views/_unitegallery.php"; ?>
	<style>
		#covid-19{
			display: none !important;
		}
	</style>

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
		<img src="<?php echo $_GLOBALS['room_service_adhara'] ?>" alt="Menu Adhara" class="img-responsive" style="width:100%;display: block;margin: 0px auto;margin-top: 60px;">
	</div>
	

</body>

<?php include "views/partial_views/_scripts.php"; ?>
</html>