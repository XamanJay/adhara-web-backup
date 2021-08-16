<?php 
//require(realpath($_SERVER['DOCUMENT_ROOT']."/controllers/imgController.php"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "partial_views/styles.php" ?>
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
		if($_GET == NULL){

		?>
			<h1 style="font-weight: 400;margin-top: 15px;margin-bottom: 0px;" class="f-tra">¡Gracias por comprar en <br> </h1>
			<h1 style="font-weight: 400;margin-top: 0px;margin-bottom: 45px;" class="f-tra">Hotel Adhara Hacienda Cancún!</h1>
			<p style="margin-bottom: 60px;">Hemos recibido su solicitud, en breve recibirá un correo con <br> información  detallada  sobre su reservación.</p>
		<?php
		}
		else{
		?>
		<h1 style="font-weight: 400;margin-top: 15px;margin-bottom: 0px;" class="f-tra">¡Gracias por comprar en <br> </h1>
		<h1 style="font-weight: 400;margin-top: 0px;margin-bottom: 45px;" class="f-tra">Hotel Adhara Hacienda Cancún!</h1>
		<p style="margin-bottom: 35px;">Hemos recibido su solicitud, en breve recibirá un correo con <br> información  detallada  sobre su reservación.</p>
		<p style="margin-bottom: 60px;">El número de referencia es: <strong id="referencia"><?php echo $_GET['r']; ?></strong></p>
		<?php 
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