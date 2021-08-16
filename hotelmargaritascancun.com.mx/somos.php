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
			<div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
				<h1 style="margin-bottom: 60px;"><?php echo $_GLOBALS['somos-h1']; ?></h1>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12" style="text-align: justify;">
				<p><?php echo $_GLOBALS['somos-p']; ?></p>
				<p><?php echo $_GLOBALS['somos-p2']; ?></p>
				<p><?php echo $_GLOBALS['somos-p3']; ?></p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
				<img src="img/somos/fachada.jpg" alt="Hotel Margaritas Cancún" class="img-fluid imgCenter">
			</div>
		</div>
	</div>
</section>
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