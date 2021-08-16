<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "views/partial_views/_styles.php"; ?> 
	
	<?php include "lang/languaje.php"; ?>	
	<meta name="keywords" content="<?php echo $_GLOBALS['keywords']; ?>">
	<title>Hotel Adhara Cancún</title>
	<link rel="stylesheet" href="/css/covid-19.css">
	
</head>
<body>

	<!-- Navbar mobile -->
    <?php include "views/partial_views/_navbar_mobile.php"; ?>

	<!-- Redes Sociales -->
	<?php include "views/partial_views/_redes.php"; ?>

	<div id="general">
		<!-- Navbar -->
		<?php include "views/partial_views/_navbar.php"; ?>

		<div class="contain" style="width: 100%;background-image: url('/img/background.png');">

			<div  id="wrapper-content">

				

				<!-- Main img -->
				<div id="main-img">
					<img src="<?php echo $_GLOBALS['covid-home-mob']; ?>" alt="Hotel Adhara Cancún" class="img-covid" id="img-small">
					<img src="<?php echo $_GLOBALS['covid-home']; ?>" alt="Hotel Adhara Cancún" class="img-covid" id="img-500">
					<img src="<?php echo $_GLOBALS['covid-home']; ?>" alt="Hotel Adhara Cancun" class="img-covid" id="img-800">
				</div>

				<!-- End Main Img -->
				


				<div class="margin-covid-text">
					<h2 class="tittle">AVALADOS Y CERTIFICADOS </h2>
					<h4 class="tittle">POR LOS PROTOCOLOS CRISTAL </h4>
				</div>
				
				<img src="/img/covid/logo_cristal.png" alt="Mantente a salvo" id="stay-safe">
				<img src="/img/covid/iconos_cristal.png" alt="Mantente a salvo" id="stay-safe">

				<div class="margin-covid-text">
					<ul class="list-covid">
						<li><?php echo $_GLOBALS['covid-home-text']; ?></li>
					</ul>
				</div>

				<img src="/img/covid/clean_icon.png" alt="Mantente a salvo" id="stay-safe">

				
				<!--   SECCION DE BIENVENIDA -->
				<div class="margin-covid-text">
					<h4 class="tittle">BIENVENIDA</h4>
					<ul class="list-covid">
						<li><?php echo $_GLOBALS['covid-welcome-p1']; ?></li>
						<li><?php echo $_GLOBALS['covid-welcome-p2']; ?></li>
						<li><?php echo $_GLOBALS['covid-welcome-p3']; ?></li>
						<li><?php echo $_GLOBALS['covid-welcome-p4']; ?></li>
						<li><?php echo $_GLOBALS['covid-welcome-p5']; ?></li>
						<li><?php echo $_GLOBALS['covid-welcome-p6']; ?></li>
					</ul>
				</div>


				<!--   SECCION DE AREAS DE COMFORT -->
				<div class="margin-covid-text">
					<h4 class="tittle">ÁREAS DE COMFORT</h4>
					<ul class="list-covid">
						<li><?php echo $_GLOBALS['covid-areas-p1']; ?></li>
						<li><?php echo $_GLOBALS['covid-areas-p2']; ?></li>
						<li><?php echo $_GLOBALS['covid-areas-p3']; ?></li>
						<li><?php echo $_GLOBALS['covid-areas-p4']; ?></li>
						<li><?php echo $_GLOBALS['covid-areas-p5']; ?></li>
					</ul>
				</div>

				<!--   SECCION DE HABITACIONES -->
				<div class="margin-covid-text">
					<h4 class="tittle">HABITACIONES</h4>
					<ul class="list-covid">
						<li><?php echo $_GLOBALS['covid-habitaciones-p1']; ?></li>
						<li><?php echo $_GLOBALS['covid-habitaciones-p2']; ?></li>
						<li><?php echo $_GLOBALS['covid-habitaciones-p3']; ?></li>
						<li><?php echo $_GLOBALS['covid-habitaciones-p4']; ?></li>
						<li><?php echo $_GLOBALS['covid-habitaciones-p5']; ?></li>
					</ul>
				</div>


				<!--   SECCION DE RESTAURANTE & BAR -->
				<div class="margin-covid-text">
					<h4 class="tittle">RESTAURANTE & BAR</h4>
					<ul class="list-covid">
						<li><?php echo $_GLOBALS['covid-restaurante-p1']; ?></li>
						<li><?php echo $_GLOBALS['covid-restaurante-p2']; ?></li>
						<li><?php echo $_GLOBALS['covid-restaurante-p3']; ?></li>
						<li><?php echo $_GLOBALS['covid-restaurante-p4']; ?></li>
						<li><?php echo $_GLOBALS['covid-restaurante-p5']; ?></li>
						<li><?php echo $_GLOBALS['covid-restaurante-p6']; ?></li>
					</ul>
				</div>


				<!--   SECCION DE SERVICIO DE TRANSPORTACIÓN DEL HOTEL -->
				<div class="margin-covid-text">
					<h4 class="tittle">SERVICIO DE TRANSPORTACIÓN DEL HOTEL</h4>
					<ul class="list-covid">
						<li><?php echo $_GLOBALS['covid-transporte-p1']; ?></li>
						<li><?php echo $_GLOBALS['covid-transporte-p2']; ?></li>
						<li><?php echo $_GLOBALS['covid-transporte-p3']; ?></li>
					</ul>
				</div>


				<!--   SECCION DE NUESTROS COLABORADORES -->
				<div class="margin-covid-text">
					<h4 class="tittle">NUESTROS COLABORADORES</h4>
					<ul class="list-covid">
						<li><?php echo $_GLOBALS['covid-colaborador-p1']; ?></li>
						<li><?php echo $_GLOBALS['covid-colaborador-p2']; ?></li>
						<li><?php echo $_GLOBALS['covid-colaborador-p3']; ?></li>
						<li><?php echo $_GLOBALS['covid-colaborador-p4']; ?></li>
						<li><?php echo $_GLOBALS['covid-colaborador-p5']; ?></li>
					</ul>
				</div>


				<!--   SECCION DE GIMNASIO -->
				<div class="margin-covid-text">
					<h4 class="tittle">GIMNASIO</h4>
					<ul class="list-covid">
						<li><?php echo $_GLOBALS['covid-gym-p1']; ?></li>
						<li><?php echo $_GLOBALS['covid-gym-p2']; ?></li>
					</ul>
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

	function dateCheck() {

        var checkin = new Date(quickSearch.checkin.value);
        var checkout = new Date(quickSearch.checkout.value);
        var today = new Date();
        console.log(today);
        console.log(checkin);
        console.log(checkout);
        if(checkin >= checkout || checkout <= checkin){
         	$("#warning").css("display","block");
         	$("#warning").html("");
         	$("#warning").append("<p style='margin-bottom:0px;'>Fechas Incorrectas</p>");
         	//console.log("Error fechas malas");
         	return false;
        }
        else if(checkin <= today || checkout <= today){
        	$("#warning").css("display","block");
         	$("#warning").html("");
         	$("#warning").append("<p style='margin-bottom:0px;'>La fecha debe ser mayor a hoy</p>");
         	return false;
        }
        else{
         	//console.log("All good");
         	return true
        }
	}
	
	$(document).ready(function(){

		$(window).scroll(function(){

	        if($("#room_text").visible(true)){
	        	$("#room_text").addClass("letGo");
	        }
	        else{
	        	$("#room_text").removeClass("letGo");
	        }

	        if($("#pool_text").visible(true)){
	        	$("#pool_text").addClass("letGo");
	        }
	        else{
	        	$("#pool_text").removeClass("letGo");
	        }
	        if($("#grill_text").visible(true)){
	        	$("#grill_text").addClass("letGo");
	        }
	        else{
	        	$("#grill_text").removeClass("letGo");
	        }

	        if($("#oktrip_text").visible(true)){
	        	$("#oktrip_text").addClass("letGo");
	        }
	        else{
	        	$("#oktrip_text").removeClass("letGo");
	        }

	        if($("#eventos_text").visible(true)){
	        	$("#eventos_text").addClass("letGo");
	        }
	        else{
	        	$("#eventos_text").removeClass("letGo");
	        }

	        if($("#club_text").visible(true)){
	        	$("#club_text").addClass("letGo");
	        }
	        else{
	        	$("#club_text").removeClass("letGo");
	        }

	        if($("#plane_text").visible(true)){
	        	$("#plane_text").addClass("letGo");
	        }
	        else{
	        	$("#plane_text").removeClass("letGo");
	        }
    	});


	});

</script>

</html>