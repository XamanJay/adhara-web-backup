<?php 

	require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/db.php");
	require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/hotel.php");
	require(realpath($_SERVER['DOCUMENT_ROOT'])."/controllers/hotelController.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include "partial_views/styles.php" ?>
	<style rel="stylesheet">
		
	#logo-buenfin{
		width: 300px;
		display: block;
		float: right;
	}

	@media(min-width: 1200px){
		#logo-buenfin{
			width: 400px;
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

<section id="disponibilidad">
	<?php 

		if (isset($_POST['empieza']) && isset($_POST['termina']) && isset($_POST['rooms']) && isset($_POST['adults']) && isset($_POST['kids']) && isset($_POST['btnSearch']) ) {
		
				$idHotel = 2;
				$hotelController = new hotelController();

				$dateTo = $_POST['empieza'];				//Fecha inicial
				$dateFrom = $_POST['termina'];			//Fecha final
				$rooms = $_POST['rooms'];			//Número de cuartos
				$arrayAdults = $_POST['adults'];	//Arreglo de enteros (adultos) -> adults[0], adults[1] y adults[2]
				$arrayKids = $_POST['kids']; 		//Arreglo de enteros (kids) -> kids[0], kids[1] y kids[2]
				$pishiboton = $_POST['btnSearch']; 	//Este botón solo sirve para hacer el post
				$adults = 0;
				$kids = 0;

				/*For sirve para contar*/

				for($i = 0; $i < $rooms; $i++){
					$adults += $arrayAdults[$i];
					$kids += $arrayKids[$i];
				}
				$jsonKids = json_encode($arrayKids);
				$jsonAdults = json_encode($arrayAdults);

				/* Fechas version en Ingles */
				$dateLargeTo = strftime("%A, %d de %B de %Y",strtotime($dateTo));
				$dateLargeFrom = strftime("%A, %d de %B de %Y",strtotime($dateFrom)); 

				/* Fechas version en español */

				$semanaStart = $hotelController->convertDay($dateTo,$_COOKIE['lang']);
				$mesStart = $hotelController->getMonth($dateTo,$_COOKIE['lang']);
				$diaStart = $hotelController->getNumberDay($dateTo);
				$añoStart = $hotelController->getYear($dateTo);

				$semanaEnd = $hotelController->convertDay($dateFrom,$_COOKIE['lang']);
				$mesEnd = $hotelController->getMonth($dateFrom,$_COOKIE['lang']);
				$diaEnd = $hotelController->getNumberDay($dateFrom);
				$añoEnd = $hotelController->getYear($dateFrom);

				$noches = $hotelController->getNights($dateTo,$dateFrom);
				$dateDiff = date_diff(date_create($dateTo), date_create($dateFrom));
				$season = $hotelController->getSeason($dateTo,$dateFrom,$idHotel);
				if($season != 0){
					$promoSeason = $hotelController->getPromoSeason($dateTo,$idHotel);
					$cuartos = $hotelController->getRooms($season,$dateTo,$dateFrom,$idHotel);
				}
				$promocion = $hotelController->getPromocion($dateTo);
		}

	?>
	<div class="container-fluid" id="disponibilidad">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-4">
				<h2>Hotel Margaritas Cancún</h2>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-8">
				<h2 id="impuestos"><?php echo $_GLOBALS['disponibilidad-taxes']; ?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-4">
				<h5><?php echo $_GLOBALS['disponibilidad-rooms'].$rooms.$_GLOBALS['disponibilidad-adults'].$adults.$_GLOBALS['disponibilidad-kids'].$kids.$_GLOBALS['disponibilidad-nights'].$noches." "; ?></h5>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-8" id="itinerario">
				<p style="margin-bottom: 0px;">
					<?php echo $_GLOBALS['disponibilidad-text']; ?>
					<?php echo $semanaStart." ".$diaStart; ?>
					<?php echo $_GLOBALS['disponibilidad-text-2']; ?>
					<?php echo $mesStart; ?>
					<?php echo $_GLOBALS['disponibilidad-text-3']; ?>
					<?php echo $añoStart; ?>	
				</p>
				<p><?php echo $_GLOBALS['disponibilidad-text-4'].$semanaEnd." ".$diaEnd.$_GLOBALS['disponibilidad-text-2'].$mesEnd.$_GLOBALS['disponibilidad-text-3'].$añoEnd; ?></p>
				<?php 
				if($promocion != 0){

					echo "<img src='/img/logo-buenfin.png' id='logo-buenfin' />";
				}

				?>
			</div>
		</div>
		<div class="row">

			<!-- Empieza Categoria Tarifa Magica -->
			<div class="col-xs-12 col-sm-5 col-md-5 roomsType">
				<div class="boxTittle">
					<h5><?php echo $_GLOBALS['disponibilidad-room-magica']; ?></h5>
				</div>
				<?php 
					if($promocion != 0){

						echo "<img src='/img/icon-buenfin.png' class='img-fluid' style='position:absolute;right:0px;margin-top:-30px;' />";
					}
				?>
				<img src="img/cuartos/margaras_disponibilidad.jpg" class="img-fluid" alt="Habitación Estandar">
				<p><?php echo $_GLOBALS['disponibilidad-room-estandar-text']; ?></p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 roomsType">
				<?php 
					if($season == 0){

						echo "<p class='defaultD' > ".$_GLOBALS['defaultD']." </p>";
					}
					else{

						foreach ($cuartos as $cuarto) {
							if ($cuarto->getCategoria()==4) {

								include"cuarto.php";
							}// fin del if cuarto por categoria
						}// fin del for cuartos
					}
				?>
			</div>

			<!-- Empieza Categoria Estandar -->
			<div class="col-xs-12 col-sm-5 col-md-5 roomsType">
				<div class="boxTittle">
					<h5><?php echo $_GLOBALS['disponibilidad-room-estandar']; ?></h5>
				</div>
				<?php 
					if($promocion != 0){

						echo "<img src='/img/icon-buenfin.png' class='img-fluid' style='position:absolute;right:0px;margin-top:-30px;' />";
					}
				?>
				<img src="img/cuartos/margaras_disponibilidad.jpg" class="img-fluid" alt="Habitación Estandar">
				<p><?php echo $_GLOBALS['disponibilidad-room-estandar-text']; ?></p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 roomsType">
				<?php 
					if($season == 0){

						echo "<p class='defaultD' > ".$_GLOBALS['defaultD']." </p>";
					}
					else{

						foreach ($cuartos as $cuarto) {
							if ($cuarto->getCategoria()==1) {

								include"cuarto.php";
							}// fin del if cuarto por categoria
						}// fin del for cuartos
					}
				?>
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
<script type="text/javascript" src="js/script-admin.js"></script>


<script type="text/javascript">
	// JavaScript
	window.sr = ScrollReveal({ reset: true });
	// Customizing a reveal set
	sr.reveal('.view_360', { duration: 2000,delay:2,useDelay: 'always',mobile: true });

</script>


</body>
</html>