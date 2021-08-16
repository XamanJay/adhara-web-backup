<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Rooms Adhara Cancún</title>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="css/services/room.css">

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
					<div class="room-text">
						<img src="/img/services/pool/pool-icon.png" alt="Gimnasio" id="pool_icon">
						<h4 class="tittle"><?php echo $_GLOBALS['rooms-h1']; ?></h4>
						<p><?php echo $_GLOBALS['rooms-p']; ?></p>

					</div>
				</div>

				<div class="wrapper_img" style="background-color: #F9EFE4;">
					<div class="row" style="margin: 0px;">
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<img src="img/rooms/fachada.png" alt="Hotel Adhara Cancún" class="img-fluid desktop">
							<img src="img/rooms/fachada_mob.png" alt="Hotel Adhara Cancún" class="img-fluid mobile">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0px;">
							<div class="wrapper_text" style="height: 300px;">
								<div class="room-text" id="adhara_text">
									<p> <?php echo $_GLOBALS['home-room-descrip']; ?> </p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0px;">
							<img src="img/rooms/generic.png" alt="Room Adhara Cancún" class="img-fluid">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12" style="padding:0px;">
							<div class="wrapper_text" style="height: 300px;">
								<div class="room-text" id="adhara_text">
									<p> Conoce nuestras habitaciones:</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin: 0px;">
					<div class="col-xs-12 col-sm-6 col-md-4">
						<img src="img/rooms/room_estandar.png" alt="Room Estandar" class="img-fluid">
						<ul class="meanities">
							<li style="text-align: center;"><h4 class="card-title"><?php echo $_GLOBALS['room-estandar-h']; ?></h4></li>
							<li>
								<p><img src="img/services/show_room/terrain.svg" class="features" alt="Medidas">28m^2</p>
							</li>
							<li>
								<p><i class="fas fa-tv"></i><?php echo $_GLOBALS['room-estandar-p']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/air-conditioner.svg" class="features" alt="Aire acondicionado"><?php echo $_GLOBALS['room-estandar-p2']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/bed.svg" class="features" alt="Cama"><?php echo $_GLOBALS['room-estandar-p3']; ?></p>
							</li>
							<li>
								<p><i class="fas fa-wifi"></i><?php echo $_GLOBALS['room-estandar-p4']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/safe-box.svg" class="features" alt="Caja de Seguridad"><?php echo $_GLOBALS['room-estandar-p5']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/sunbed.svg" class="features" alt="Traslado a la Playa"><?php echo $_GLOBALS['room-estandar-p6']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/iron.svg" class="features" alt="Kit de Planchado"><?php echo $_GLOBALS['room-estandar-p7']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/alarm-clock.svg" class="features" alt="Despertador"><?php echo $_GLOBALS['room-estandar-p8']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/coffee-machine.svg" class="features" alt="Cafetera"><?php echo $_GLOBALS['room-estandar-p99']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/hairdryer.svg" class="features" alt="Secadora de Cabello"><?php echo $_GLOBALS['room-estandar-p10']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/mirror.svg" class="features" alt="Espejo"><?php echo $_GLOBALS['room-estandar-p11']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/desk.svg" class="features" alt="Escritorio"><?php echo $_GLOBALS['room-estandar-p12']; ?></p>
							</li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<img src="img/rooms/room_superior.png" alt="Room Superior" class="img-fluid">
						<ul class="meanities">
							<li style="text-align: center;"><h4 class="card-title"><?php echo $_GLOBALS['room-superior-h']; ?></h4></li>
							<li>
								<p><img src="img/services/show_room/terrain.svg" class="features" alt="Medidas">34m^2</p>
							</li>
							<li>
								<p><i class="fas fa-tv"></i><?php echo $_GLOBALS['room-estandar-p']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/air-conditioner.svg" class="features" alt="Aire acondicionado"><?php echo $_GLOBALS['room-estandar-p2']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/bed.svg" class="features" alt="Cama"><?php echo $_GLOBALS['room-superior-p']; ?></p>
							</li>
							<li>
								<p><i class="fas fa-wifi"></i><?php echo $_GLOBALS['room-estandar-p4']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/safe-box.svg" class="features" alt="Caja de Seguridad"><?php echo $_GLOBALS['room-estandar-p5']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/sunbed.svg" class="features" alt="Traslado a la Playa"><?php echo $_GLOBALS['room-estandar-p6']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/iron.svg" class="features" alt="Kit de Planchado"><?php echo $_GLOBALS['room-estandar-p7']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/alarm-clock.svg" class="features" alt="Despertador"><?php echo $_GLOBALS['room-estandar-p8']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/coffee-machine.svg" class="features" alt="Cafetera"><?php echo $_GLOBALS['room-estandar-p9']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/hairdryer.svg" class="features" alt="Secadora de Cabello"><?php echo $_GLOBALS['room-estandar-p10']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/mirror.svg" class="features" alt="Espejo"><?php echo $_GLOBALS['room-estandar-p11']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/desk.svg" class="features" alt="Escritorio"><?php echo $_GLOBALS['room-estandar-p12']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/phone-call.svg" class="features" alt="Telefono"><?php echo $_GLOBALS['room-superior-p2']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/microwave.svg" class="features" alt="Microondas"><?php echo $_GLOBALS['room-ejecutivo-p8']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/kitchen-sink.svg" class="features" alt="Microondas"><?php echo $_GLOBALS['room-ejecutivo-p9']; ?></p>
							</li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<img src="img/rooms/room_ejecutive.png" alt="Room Ejecutivo" class="img-fluid">
						<ul class="meanities">
							<li style="text-align: center;"><h4 class="card-title"><?php echo $_GLOBALS['room-ejecutivo-h']; ?></h4></li>
							<li>
								<p><img src="img/services/show_room/terrain.svg" class="features" alt="Medidas">28m^2</p>
							</li>
							<li>
								<p><i class="fas fa-tv"></i><?php echo $_GLOBALS['room-ejecutivo-p']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/air-conditioner.svg" class="features" alt="Aire acondicionado"><?php echo $_GLOBALS['room-estandar-p2']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/bed.svg" class="features" alt="Cama"><?php echo $_GLOBALS['room-superior-p']; ?></p>
							</li>
							<li>
								<p><i class="fas fa-wifi"></i><?php echo $_GLOBALS['room-estandar-p4']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/safe-box.svg" class="features" alt="Caja de Seguridad"><?php echo $_GLOBALS['room-estandar-p5']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/sunbed.svg" class="features" alt="Traslado a la Playa"><?php echo $_GLOBALS['room-estandar-p6']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/iron.svg" class="features" alt="Kit de Planchado"><?php echo $_GLOBALS['room-estandar-p7']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/alarm-clock.svg" class="features" alt="Despertador"><?php echo $_GLOBALS['room-estandar-p8']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/coffee-machine.svg" class="features" alt="Cafetera"><?php echo $_GLOBALS['room-estandar-p9']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/hairdryer.svg" class="features" alt="Secadora de Cabello"><?php echo $_GLOBALS['room-estandar-p10']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/mirror.svg" class="features" alt="Espejo"><?php echo $_GLOBALS['room-estandar-p11']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/desk.svg" class="features" alt="Escritorio"><?php echo $_GLOBALS['room-estandar-p12']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/phone-call.svg" class="features" alt="Telefono"><?php echo $_GLOBALS['room-superior-p2']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/bathrobe.svg" class="features" alt="Batas de Baño"><?php echo $_GLOBALS['room-ejecutivo-p3']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/slippers.svg" class="features" alt="Pantuflas"><?php echo $_GLOBALS['room-ejecutivo-p4']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/pillow.svg" class="features" alt="Almohada"><?php echo $_GLOBALS['room-ejecutivo-p5']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/mattress.svg" class="features" alt="Colchon Ortopedico"><?php echo $_GLOBALS['room-ejecutivo-p6']; ?></p>
							</li>
							<li>
								<p><img src="img/services/show_room/fridge.svg" class="features" alt="Frigo bar"><?php echo $_GLOBALS['room-ejecutivo-p7']; ?></p>
							</li>
							
						</ul>
					</div>
				</div>
				
				<div class="wrapper_text" style="height: 300px;">
					<div class="room-text" id="adhara_text" style="text-align: center;">
						<a href="/" style="text-decoration: none;color: #473934;"><?php echo $_GLOBALS['home-return']; ?> </a>
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