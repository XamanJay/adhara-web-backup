<!DOCTYPE html>
<html lang="es">
<head>
	<?php include "lang/languaje.php"; ?>	
	<?php include "partial_views/styles.php" ?>
	<meta name="keywords" content="<?php echo $_GLOBALS['keywords']; ?>">
</head>
<body>

<?php include "partial_views/navbar.php" ?>
<?php include "partial_views/socialMedia.php" ?>
<?php include "partial_views/slider_home.php" ?>
<?php include "partial_views/buscador.php" ?>

<section id="contenido">
	<div class="container" id="about">
		<h1> <?php echo $_GLOBALS['home-h1']; ?> </h1>
		<p style="margin-bottom: 30px;"><?php echo $_GLOBALS['home-p']; ?></p>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="margaritaBox">
					<img src="img/room_single.jpg" alt="Habitación Sencilla" class="img-fluid imgCenter">
				</div>
				<h3 style="text-align: center;margin-top: 20px;"><?php echo $_GLOBALS['home-room-estandar']; ?></h3>
				<p style="text-align: center;margin-bottom: 0px;"><?php echo $_GLOBALS['home-room-p']; ?> </p>
				<p style="text-align: center;"><?php echo $_GLOBALS['home-room-p2']; ?></p>
				
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="margaritaBox">
					<img src="img/servicios.jpg" alt="Habitación Sencilla" class="img-fluid imgCenter">
				</div>
				<h3 style="text-align: center;margin-top: 20px;"><?php echo $_GLOBALS['home-room-double']; ?></h3>
				<p style="text-align: center;margin-bottom: 0px;"><?php echo $_GLOBALS['home-room-p3']; ?> </p>
				<p style="text-align: center;"><?php echo $_GLOBALS['home-room-p4']; ?></p>
			</div>
		</div>
		<hr style="width: 80%;background-color:#c27fa9;height: 4px;color: white; border-top-color: white;">
	</div>
	<div class="container" id="magia">
		
		<img src="img/sedirecto.jpg" alt="Reserva Directo" class="img-fluid" style="margin-left: auto;margin-right: auto;display: block;">

		<h1><?php echo $_GLOBALS['home-h2']; ?></h1>
		<p style="margin-bottom: 30px;"><?php echo $_GLOBALS['home-p2']; ?></p>

		<div class="row">
			<!-- seccion de carouse -->
			<div id="clubestrellaPromos" class="carousel slide desktop" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#clubestrellaPromos" data-slide-to="0" class="active"></li>
					<li data-target="#clubestrellaPromos" data-slide-to="1"></li>
					<li data-target="#clubestrellaPromos" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" id="innerSpecial">
					<div class="carousel-item active">
						<img class="d-block w-100" src="<?php echo $_GLOBALS['club-desk'] ?>" alt="Viajes en Grupos">
					</div>
					<!--div class="carousel-item">
						<img class="d-block w-100" src="<?php echo $_GLOBALS['club-desk2'] ?>" alt="Meses sin Intereses">
					</div-->
				</div>
				<a class="carousel-control-prev" href="#clubestrellaPromos" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#clubestrellaPromos" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!-- fin de carousel -->
			<!-- seccion de carouse -->
			<div id="clubestrellaPromosMob" class="carousel slide mobile" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#clubestrellaPromosMob" data-slide-to="0" class="active"></li>
					<li data-target="#clubestrellaPromosMob" data-slide-to="1"></li>
					<li data-target="#clubestrellaPromosMob" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" id="innerSpecial">
					<div class="carousel-item active">
						<img class="d-block w-100" src="<?php echo $_GLOBALS['club-mob'] ?>" alt="Viajes en Grupos">
					</div>
					<!--div class="carousel-item">
						<img class="d-block w-100" src="<?php echo $_GLOBALS['club-mob2'] ?>" alt="Meses sin Intereses">
					</div-->
				</div>
				<a class="carousel-control-prev" href="#clubestrellaPromosMob" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#clubestrellaPromosMob" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!-- fin de carousel -->
		</div>
	</div>

</section>

<?php include "partial_views/footer.php" ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/moment/moment.min.js"></script>
<script type="text/javascript" src="js/moment/locale/es.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/script-admin.js"></script>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '322333031458441'); 
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1" 
src="https://www.facebook.com/tr?id=322333031458441&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

</body>
</html>