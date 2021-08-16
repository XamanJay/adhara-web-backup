<?php 
require(realpath($_SERVER['DOCUMENT_ROOT']."/controllers/imgController.php"));
require(realpath($_SERVER['DOCUMENT_ROOT']."/controllers/hotelController.php"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Adhara Hacienda Cancún</title>
	<link rel="shortcut icon" href="/img/favicon.ico" />
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-grid.css">
	<link rel="stylesheet" href="css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="css/jQueryUI/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/lightbox.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/glyphicons.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<!-- importante el orden de los scripts -->
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/cookie/js.cookie.js"></script>
	<script type="text/javascript" src="js/lang.js"></script>
	<style>
		#contenido {
	    	background-image: url(../img/plecas.png);
	    	background-size: cover;
		}
	</style>
</head>
<body>

<?php include "lang/languaje.php"; ?>
<?php include "partial_views/navbar.php" ?>
<?php include "partial_views/socialMedia.php" ?>
<?php include "partial_views/slider_home.php" ?>
<?php include "partial_views/buscador.php" ?>

<section id="contenido">
	<div class="container margenD" style="text-align: center;">
		<?php 	
		if($_GET['r'] != 0){
			$hotelController = new hotelController();
			echo '<h1 style="font-weight: 400;margin-top: 15px;margin-bottom: 0px;" class="f-tra">¡Opps lo sentimos por<br> </h1>
			<h1 style="font-weight: 400;margin-top: 0px;margin-bottom: 45px;" class="f-tra">los inconvenientes!</h1>
			<p style="margin-bottom: 60px;">La habitación <strong>'.$hotelController->getName($_GET['r']).'</strong> ya no cuenta con cuartos disponibles.</p>';
		}

		?>

		<a href="/" id="backHome">Regresar</a>
		
	</div>
</section>

<?php include "partial_views/footer.php" ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/scrollreveal.min.js"></script>
<script type="text/javascript" src="js/moment/moment.min.js"></script>
<script type="text/javascript" src="js/moment/locale/es.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/script-admin.js"></script>

</body>
</html>