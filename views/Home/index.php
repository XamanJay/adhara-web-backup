<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "views/partial_views/_styles.php"; ?> 
	
	<?php include "lang/languaje.php"; ?>	
	<meta name="keywords" content="<?php echo $_GLOBALS['keywords']; ?>">
	<title>Hotel Adhara Cancún</title>
	<link rel="stylesheet" href="/css/reloj.css">
	
</head>
<body>

	<!-- Navbar mobile -->
    <?php include "views/partial_views/_navbar_mobile.php"; ?>

	<!-- Redes Sociales -->
	<?php include "views/partial_views/_redes.php"; ?>

	<div id="general">
		<!-- Navbar -->
		<?php include "views/partial_views/_navbar.php"; ?>

		<!-- prueba timer -->
		<!-- <div class="reloj">
			<div class="row" style="margin:0px;">
				<div class="col-4 col-sm-6 col-md-4">
					
					<img src="img/buenfin.png" alt="Buen Fin" id="buen-fin">
				</div>
				<div class="col-8 col-sm-6 col-md-8">
					<p id="quedan" class="time-rest">FALTAN:</p>
					<div class="inline-block">
						<h2 class="counter1" id="dias">0</h2>
						<span class="pre block">días</span>
					</div>
					<div class="inline-block">
						<h2 class="counter" id="horas">0</h2>
						<span class="pre block">horas</span>
					</div>
					<div class="inline-block">
						<h2 class="counter" id="min">0</h2>
						<span class="pre block">min</span>
					</div>
					<div class="inline-block">
						<h2 class="counter" id="seg">0</h2>
						<span class="pre block">seg</span>
					</div>
				</div>
			</div>
			<div class="row" style="margin:0px;">
				<a hre f="https://api.whatsapp.com/send?phone=529981221861" target="_blank" style="margin: 0px auto;">
					<img src="/img/whats-buen-fin.png" alt="Buen fin" id="whats-fin">
				</a>
			</div>
		</div> -->
		<!-- END prueba timer -->

		<div class="contain" style="width: 100%; background-image: url('/img/background.png');">

			<div  id="wrapper-content">




	<script> 
		var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
		if(isMobile) {	 // document.write("Version mobile");  
		}
		else { document.write("<div id='hold-whats'> ");
			   document.write("<div id='todays-rate'><br> ");
			   document.write("<p style='margin-top: 20px;margin-bottom: 0px;'>¡Tarifa Especial!</p> ");
			   document.write("<div class='clearfix'></div> ");
			   document.write("<h4 id='price-up'>$ <?php echo number_format(ceil($room->price)).' '.$_GLOBALS['description_money'] ; ?></h4> ");
			   document.write("<p style='margin-bottom: 0px;margin-top: 10px;font-weight: bolder;color: white;'><?php echo $_GLOBALS['rates-taxes']; ?></p> ");			   document.write("</div>                     ");
			   document.write("<div id='hold-tarifa'>	Cotiza reserva y paga por</div> ");
			   document.write("<div id='label-info'> ");
			   document.write("<h2 style='text-align: center;font-weight: 800;'>Whatsapp</h2> ");
			   document.write("<p id='phone-label'>998 122 18 61</p> ");
			   document.write("<img src='img/icons/whats.png' alt=''> </div> </div>  "); }
			   
	</script> 
         
				<!-- Main img url-home- ٩͡[๏̯͡๏]۶ -->
				<br>
				<div id="main-img" style="margin-top:0px">
					<img src="<?php echo $_GLOBALS['url-home-500']; ?>" alt="Hotel Adhara Cancún" style="width: 100%;" height="415" id="img-small">
					
					<img src="<?php echo $_GLOBALS['url-home-800']; ?>" alt="Hotel Adhara Cancún" class="img-home" id="img-500"> 
					<img src="<?php echo $_GLOBALS['home-image']; ?>" alt="Hotel Adhara Cancun" style="width: 100%;" id="img-800"> 
					<!-- <img src="<?php // echo $_GLOBALS['home-image']; ?>" alt="Hotel Adhara Cancun" class="img-home" id="img-800"> -->
					<!--video src="/video/home.mp4" loop  autoplay style="display: block;margin: 0px auto;"></video-->
					<!-- Implementacion del buscador -->
					<br><br><br><br><br>
					
					<?php include "views/partial_views/_buscador.php"; ?>
					<!-- Fin de la implementacion -->
				</div>

				<!-- End Main Img -->


				<div class="wrapper_text">
					<div class="text_box">

						<h4 class="tittle" id="first_"><?php echo $_GLOBALS['home-tittle-2']; ?></h4>
						<p><?php echo $_GLOBALS['home-descrip']; ?></p>
						<p><?php echo $_GLOBALS['home-descrip2']; ?></p>

					</div>
				</div>
				<div class="wrapper_img">
					<img src="img/places/room.png" alt="Cuartos" class="img-fluid desktop">
					<img src="img/places/mobile/cuarto.png" alt="Cuartos" class="img-fluid mobile">
					<div class="row text_side">
						<div class="col-xs-12 col-sm-6 offset-sm-6 col-md-6 offset-md-6 box_" id="room_text">
							<div class="animation fadeIn-right" style="background-color: rgba(131, 92, 87, 0.7);">
								<div class="text_cage">
									<h2><?php echo $_GLOBALS['home-rooms']; ?></h2>
									<p><?php echo $_GLOBALS['rooms-p']; ?></p>

									<!-- En ingles no va esta parte de texto -->
									<p id="bye_r" style="margin-top: 30px;text-align: center;"><?php echo $_GLOBALS['rooms-p2']; ?></p>
									<a href="/showroom" ><?php echo $_GLOBALS['home-details']; ?></a>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="wrapper_text">
					<div class="text_box" id="flower_text">
						<p><?php echo $_GLOBALS['somos-p']; ?></p>
						<img src="img/items/flower.png" alt="Flower" class="img-fluid" style="width: 60px;">
					</div>
				</div>

				<div class="wrapper_img">
					<img src="img/places/pool_20211.png" alt="Alberca" class="img-fluid desktop">
					<img src="img/places/mobile/pool_2021.png" alt="Alberca" class="img-fluid mobile">
					<div class="row text_side">
						<div class="col-xs-12 col-sm-6 col-md-6 box_" id="pool_text">
							<div class="animation fadeIn-left" style="background-color: rgba(137, 44, 121, 0.7);">
								<div class="text_cage">
									<h2><?php echo $_GLOBALS['alberca-h']; ?></h2>
									<p><?php echo $_GLOBALS['alberca-p3']; ?></p>
									<a href="/pool" ><?php echo $_GLOBALS['home-details']; ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>  
				<div class="wrapper_text">
					<div class="text_box" id="bird_text">
						<p><?php echo $_GLOBALS['somos-p2']; ?></p>
						<img src="img/items/bird.png" alt="Bird" style="width: 60px;">
					</div>
				</div>

				<div class="wrapper_img">
					<img src="img/places/adhara_grill_desk_2021.png" alt="Adhara Grill" class="img-fluid desktop">
					<img src="img/places/mobile/adhara_grill_mob_2021.png" alt="Adhara Grill" class="img-fluid mobile">
					<div class="row text_side">
						<div class="col-xs-12 col-sm-6 offset-sm-6 col-md-6 offset-md-6 box_" id="grill_text">
							<div class="animation fadeIn-right" style="background-color: rgba(91, 26, 21, 0.7);">	
								<div class="text_cage">
									<h2><?php echo $_GLOBALS['restaurante-h']; ?></h2>
									<img src="img/logos/grill_logo.png" alt="Adhara Grill" id="grill-logo">
									<p><?php echo $_GLOBALS['restaurante-p']; ?></p>
									<a href="/adharagrill" ><?php echo $_GLOBALS['home-details']; ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="wrapper_text">
					<div class="text_box" id="adhara_text">
						<p><?php echo $_GLOBALS['somos-p4']; ?></p>
						<img src="img/items/star.png" alt="Adhara Cancun" style="width: 60px;">
					</div>
				</div>

				<div class="wrapper_img">
					<img src="img/places/beach.png" alt="Oktrip" class="img-fluid desktop">
					<img src="img/places/mobile/oktrip.png" alt="Oktrip" class="img-fluid mobile">
					<div class="row text_side">
						<div class="col-xs-12 col-sm-6 col-md-6 box_" id="oktrip_text">
							<div class="animation fadeIn-left" style="background-color: rgba(226, 123, 54, 0.7);">
								<div class="text_cage">
									<h2><?php echo $_GLOBALS['grupos-h']; ?></h2>
									<div class="row" style="margin: 0px;padding: 0px;">
										<div class="col-xs-12 col-sm-6 col-md-6">
											<img src="img/logos/oktrip_logo.png" id="oktrip_logo" alt="Oktrip">
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 no-mobile">
											<img src="img/logos/club_logo.png" id="club_logo" alt="Club Estrella">
										</div>
									</div>
									<p><?php echo $_GLOBALS['grupos_label']; ?></p>
									<a href="https://oktrip.mx/" target="_blank" ><?php echo $_GLOBALS['home-details']; ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>  

				<div class="wrapper_text">
					<div class="text_box" id="adhara_text">
						<p><?php echo $_GLOBALS['somos-p5']; ?></p>
						<img src="img/items/suitcase.png" alt="Oktrip" style="width: 40px;">
					</div>
				</div>

				<div class="wrapper_img">
					<img src="img/places/dinner.png" alt="Adhara Grill" class="img-fluid desktop">
					<img src="img/places/mobile/postre.png" alt="Adhara Grill" class="img-fluid mobile">
					<div class="row text_side">
						<div class="col-xs-12 col-sm-6 offset-sm-6 col-md-6 offset-md-6 box_" id="eventos_text">
							<div class="animation fadeIn-right" style="background-color: rgba(52, 22, 47, 0.7);">
								<div class="text_cage">
									<img src="img/logos/eventos_logo.png" alt="Eventos Adhara" id="eventos_logo">
									<p><?php echo $_GLOBALS['eventos-p']; ?></p>
									<a href="/eventos" ><?php echo $_GLOBALS['home-details']; ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="wrapper_text">
					<div class="text_box" id="event_text">
						<p style="margin-bottom: 15px;"><?php echo $_GLOBALS['home-magia-h2']; ?></p>
						<p><?php echo $_GLOBALS['home-magia-p2']; ?></p>
						<img src="img/items/light.png" alt="Eventos Adhara" style="width: 40px;">
					</div>
				</div>

				<div class="wrapper_img">
					<img src="<?php echo $_GLOBALS['club-img']; ?>" alt="Adhara Grill" class="img-fluid desktop">
					<img src="img/places/mobile/clubestrella.png" alt="Adhara Grill" class="img-fluid mobile">
					<div class="row text_side">
						<div class="col-xs-12 col-sm-6 col-md-6 box_" id="club_text">
							<div class="animation fadeIn-left" style="background-color: rgba(18, 17, 15, 0.7);">
								<div class="text_cage" id="club_">
									<h2><?php echo $_GLOBALS['clubestrella-h']; ?></h2>
									<img src="img/logos/club_logo_2021.png" alt="Club Estrella Grill" width="150" height="150" > 
									<br>
									<p class="text-cent"><?php echo $_GLOBALS['clubestrella-p']; ?></p><br>

									 <a href="http://clubestrella.mx/" target="_blank" ><?php echo $_GLOBALS['home-details']; ?></a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 box_" id="club_text">
							<div class="text_cage" id="estrella_"  >
								<div align="center" >
								<br><br>
								<p class="text-cent"><?php echo $_GLOBALS['clubestrella-hh7']; ?></p>
								<br>
								<br>
								<p class="text-cent"><?php echo $_GLOBALS['clubestrella-hh8']; ?></p> <br>
								<p class="text-cent"><?php echo $_GLOBALS['clubestrella-hh9']; ?></p> <br>
								<p class="text-cent"><?php echo $_GLOBALS['clubestrella-hh10']; ?></p> <br>
								<p class="text-cent"><?php echo $_GLOBALS['clubestrella-hh11']; ?></p> <br>
								<p class="text-cent"><?php echo $_GLOBALS['clubestrella-hh12']; ?></p> <br>
								<p class="text-cent"><?php echo $_GLOBALS['clubestrella-hh13']; ?></p> <br>
								<p class="text-cent"><?php echo $_GLOBALS['clubestrella-hh14']; ?></p> <br> <br>
								<script> 
									var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
									if(isMobile) {	 // document.write("Version mobile");  
									}
									else {document.write(" <img src='img/items/coffee_2021.png' alt='Club Estrella' width='410' Height='372' > <br>    ");	   }
								</script> 
								<p><?php echo $_GLOBALS['clubestrella-hh15']; ?> </p>
								</div>
							</div>
						</div> 
					</div>
				</div>


				<div class="wrapper_text">
					<div class="text_box" id="airplane_text">
						<p><?php echo $_GLOBALS['shuttle-p']; ?></p>
						<img src="img/items/airplane.png" alt="Transportacion" style="width: 40px;">
					</div>
				</div>
				<div class="wrapper_img">
					<img src="img/places/adhara_van_desk_2021.png" alt="Transportación" class="img-fluid desktop">
					<img src="img/places/mobile/adhara_van_mob_2021.png" alt="Transportación" class="img-fluid mobile">
					<div class="row text_side">
						<div class="col-xs-12 col-sm-6 offset-sm-6 col-md-6 offset-md-6 box_" id="plane_text">
							<div class="animation fadeIn-right" style="background-color: rgba(0, 33, 61, 0.7);">
								<div class="text_cage" >
									<h2><?php echo $_GLOBALS['home-magia-h3']; ?></h2>
									<p class="text-cent"><?php echo $_GLOBALS['home-magia-p3']; ?></p>
									<p class="text-cent"><?php echo $_GLOBALS['home-magia-p4']; ?></p>
									<a href="/shuttle" ><?php echo $_GLOBALS['home-details']; ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="wrapper_text" style="height: 300px;">
					<div class="text_box">
						<a href="https://www.tripadvisor.com.mx/Hotel_Review-g150807-d154412-Reviews-Adhara_Hacienda_Cancun-Cancun_Yucatan_Peninsula.html" target="_blank">
							<img src="img/logos/tripadvisor.png" id="trip_logo" alt="Tripadvisor">
						</a>
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