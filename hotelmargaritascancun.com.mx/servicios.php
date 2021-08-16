<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "partial_views/styles.php" ?>
	<style>
		@media(min-width: 200px){

		    #contenido{
				background-size: contain;
			}
		}

		@media(min-width: 600px){
		    #contenido{
				background-size: cover;
			}
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
	<div class="container">
		<div class="row margenD">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<h1 style="text-align: center;margin-bottom: 50px;"><?php echo $_GLOBALS['servicio-h']; ?></h1>
			</div>
			<div class="col-xs-12 col-sm-6 col-dm-6">
				<img src="img/servicios.jpg" alt="Hotel Margaritas Cancún" class="img-fluid">
			</div>
			<div class="col-xs-12 col-sm-6 col-dm-6">
				<p><img src="img/icons/bed.svg" class="services" alt="Cama"> <?php echo $_GLOBALS['servicio-p']; ?></p>
				<p><img src="img/icons/wifi.svg" class="services" alt="Sala de Juntas"></i> <?php echo $_GLOBALS['servicio-p1']; ?></p>
				<p><img src="img/icons/meeting-room.svg" class="services" alt="Sala de Juntas"> <?php echo $_GLOBALS['servicio-p2']; ?></p>
				<p><img src="img/icons/washing-machine.svg" class="services" alt="Lavanderia"> <?php echo $_GLOBALS['servicio-p3']; ?></p>
				<p><img src="img/icons/van.svg" class="services" alt="Transportación"> <?php echo $_GLOBALS['servicio-p4']; ?></p>
				<p><img src="img/icons/sunbed.svg" class="services" alt="Transportación"> <?php echo $_GLOBALS['servicio-p5']; ?></p>
				<p><img src="img/icons/parked-car.svg" class="services" alt="Transportación"> <?php echo $_GLOBALS['servicio-p6']; ?></p>
			</div>
		</div>
	</div>
</section>

<div class="invisible">Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>


<?php include "partial_views/footer.php" ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/moment/moment.min.js"></script>
<script type="text/javascript" src="js/moment/locale/es.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/script-admin.js"></script>

</body>
</html>