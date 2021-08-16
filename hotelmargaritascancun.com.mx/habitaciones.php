<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "partial_views/styles.php" ?>
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
				<h1 style="margin-bottom: 60px;text-align: center;"><?php echo $_GLOBALS['habitaciones-h']; ?></h1>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding: 10px;">
				<div class="card imgCenter" style="width: 20rem;">
					<img class="card-img-top" src="img/cuartos/sencilla_margaras.jpg" alt="Habitación Estandar">
					<div class="card-body">
						<h4 class="card-title"><?php echo $_GLOBALS['habitacion-room-h']; ?></h4>
						<div class="row">
							<div class="col-xs-3 col-sm-2 col-md-2">
								<i class="fa fa-television" aria-hidden="true"></i>
							</div>
							<div class="col-xs-9 col-sm-10 col-md-10">
								<p><?php echo $_GLOBALS['habitacion-room-p']; ?></p>
							</div>
							<div class="col-xs-3 col-sm-2 col-md-2">
								<img src="img/icons/air-conditioner.svg" class="features" alt="Aire acondicionado">
							</div>
							<div class="col-xs-9 col-sm-10 col-md-10">
								<p><?php echo $_GLOBALS['habitacion-room-p2']; ?></p>
							</div>
							<div class="col-xs-3 col-sm-2 col-md-2">
								<img src="img/icons/bed.svg" class="features" alt="Cama">
							</div>
							<div class="col-xs-9 col-sm-10 col-md-10">
								<p><?php echo $_GLOBALS['habitacion-room-p3']; ?></p>
							</div>
							<div class="col-xs-3 col-sm-2 col-md-2">
								<i class="fa fa-wifi" aria-hidden="true"></i>
							</div>
							<div class="col-xs-9 col-sm-10 col-md-10">
								<p><?php echo $_GLOBALS['habitacion-room-p4']; ?></p>
							</div>
							<div class="col-xs-3 col-sm-2 col-md-2">
								<img src="img/icons/safe-box.svg" class="features" alt="Caja de Seguridad">
							</div>
							<div class="col-xs-9 col-sm-10 col-md-10">
								<p><?php echo $_GLOBALS['habitacion-room-p5']; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding: 10px;">
				<div class="card imgCenter" style="width: 20rem;">
					<img class="card-img-top" src="img/cuartos/doble_margaras.jpg" alt="Habitación Superior">
					<div class="card-body">
						<h4 class="card-title"><?php echo $_GLOBALS['habitacion-room-h2']; ?></h4>
						<div class="row">
							<div class="col-xs-3 col-sm-2 col-md-2">
								<i class="fa fa-television" aria-hidden="true"></i>
							</div>
							<div class="col-xs-9 col-sm-10 col-md-10">
								<p><?php echo $_GLOBALS['habitacion-room-p']; ?></p>
							</div>
							<div class="col-xs-3 col-sm-2 col-md-2">
								<img src="img/icons/air-conditioner.svg" class="features" alt="Aire acondicionado">
							</div>
							<div class="col-xs-9 col-sm-10 col-md-10">
								<p><?php echo $_GLOBALS['habitacion-room-p2']; ?></p>
							</div>
							<div class="col-xs-3 col-sm-2 col-md-2">
								<img src="img/icons/bed.svg" class="features" alt="Cama">
							</div>
							<div class="col-xs-9 col-sm-10 col-md-10">
								<p><?php echo $_GLOBALS['habitacion-room-p7']; ?></p>
							</div>
							<div class="col-xs-3 col-sm-2 col-md-2">
								<i class="fa fa-wifi" aria-hidden="true"></i>
							</div>
							<div class="col-xs-9 col-sm-10 col-md-10">
								<p><?php echo $_GLOBALS['habitacion-room-p4']; ?></p>
							</div>
							<div class="col-xs-3 col-sm-2 col-md-2">
								<img src="img/icons/safe-box.svg" class="features" alt="Caja de Seguridad">
							</div>
							<div class="col-xs-9 col-sm-10 col-md-10">
								<p><?php echo $_GLOBALS['habitacion-room-p5']; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</section>
<div class="invisible">Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>

<?php include "partial_views/footer.php" ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/scrollreveal.min.js"></script>
<script type="text/javascript" src="js/moment/moment.min.js"></script>
<script type="text/javascript" src="js/moment/locale/es.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<script type="text/javascript" src="js/script-admin.js"></script>

</body>
</html>