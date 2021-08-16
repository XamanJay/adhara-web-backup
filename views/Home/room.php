<!DOCTYPE html>
<html lang="en">
<head>

	<?php include "views/partial_views/_styles.php"; ?> 
	<title>Rooms Adhara Cancún</title>
	<!-- Estilos Seccion de Cuartos -->
	<link rel="stylesheet" href="css/room.css">
	<!-- Google icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="css/services/pool.min.css">

	<style rel="stylesheet">
		
	#logo-buenfin{
		width: 300px;
	}

	@media(min-width: 1200px){
		#logo-buenfin{
			width: 400px;
		}
	}

	.search-box{
		margin-bottom: 30px;
	    max-height: 300px;
	    width: 100%;
	    background-image: url(/img/rooms/background.png);
	    display: block;
	    height: 300px;
	    background-position: top;
	    background-size: cover;
	}
	#delimiter-box{
		margin-bottom: 40px;
		margin-top: -200px;
	}
	@media (min-width: 1200px)
	{
		#delimiter-box {
		    margin-top: -150px;
		}
	}
	</style>
	


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
		
		<div class="container" id="contenedor-room">
			
			<div  id="wrapper-content" style="padding-top: 55px;">
				<!-- Buscardor -->
				<div class="search-box"></div>
				<?php include "views/partial_views/_buscador.php"; ?>
				<!-- Categoria de Habitaciones 1: Solo Habitacion, 2: Habitacion Superior, 3: Habitacion Ejecutiva -->
				<div class="container" id="room-section">
					<?php
						if($_POST){
							/*print_r($result);*/
							$rooms = $result['cuartos'];
							$adults = $result['adults'];
							$kids = $result['kids'];
							$jsonKids = $result['jsonKids'];
							$jsonAdults = $result['jsonAdults'];
							$semana_start = $result['semana_checkin'];
							$mes_start = $result['mes_checkin'];
							$dia_start = $result['dia_checkin'];
							$año_start = $result['año_checkin'];
							$semana_end = $result['semana_checkout'];
							$mes_end = $result['mes_checkout'];
							$dia_end = $result['dia_checkout'];
							$año_end = $result['año_checkout'];
							$nights = $result['noches'];
							$room_simple= array();
							$room_superior = array();
							$room_ejecutive = array();

							echo "<div class='row'>
									<div class='col-xs-12 col-sm-6 col-md-6'>
										<p style='margin-bottom: 5px;'>
											<i class='material-icons icon-right'>flight_land</i>
											".$_GLOBALS['room-text']." ".$semana_start." ".$dia_start." ".$_GLOBALS['room-text-2']." ".$mes_start." ".$_GLOBALS['room-text-3']." ".$año_start."
										</p>
										<p>
											<i class='material-icons icon-right'>flight_takeoff</i>
											".$_GLOBALS['room-text-4']." ".$semana_end." ".$dia_end." ".$_GLOBALS['room-text-2']." ".$mes_end." ".$_GLOBALS['room-text-3']." ".$año_end."
										</p>
										<ul id='info-reserve'>
											<li><i class='material-icons' data-toggle='tooltip' data-placement='bottom' title='".$_GLOBALS['room-label']."'>hotel</i></li>
											<li>: ".$rooms." </li>
											<li><i class='fas fa-male' data-toggle='tooltip' data-placement='bottom' title='".$_GLOBALS['room-adults']."'></i></li>
											<li>: ".$adults."</li>
											<li><i class='fas fa-child' data-toggle='tooltip' data-placement='bottom' title='".$_GLOBALS['room-kids']."'></i></li>
											<li>: ".$kids."</li>
										</ul>
									</div>
									<div class='col-xs-12 col-sm-6 col-md-6'>
										<h4 id='taxes'>".$_GLOBALS['room-taxes']."</h4>";

									if($result['promocion'] != 0){

										echo "<img src='/img/logo-buenfin.png' id='logo-buenfin' />";
									}
							echo "  </div>
								</div>
								<div class='row' style='margin-top:40px;'>";
                        	
							echo"		
									
									<div class='col-xs-12 col-sm-4 col-m-4' style='margin-bottom:50px;'>
										<h4 style='margin-bottom:15px;'>".$_GLOBALS['home-room-estandar']."</h4>
										<img src='img/rooms/room_estandar.png' class='img-fluid' alt='Habitación Estandar'>";
										if($result['promocion'] != 0){

											echo "<img src='/img/icon-buenfin.png' class='img-fluid' style='position:absolute;right:0px;margin-top:-30px;' />";
										}
							echo"		<ul class='room-facilities'>
											<li><img src='img/icons/wifi.png' data-toggle='tooltip' data-placement='bottom' title='".$_GLOBALS['room-feature']."'></li>
											<li><img src='img/icons/coffee-maker.png' data-toggle='tooltip' data-placement='bottom' title='".$_GLOBALS['room-feature-2']."'></li>
											<li><img src='img/icons/serving-dish.png' data-toggle='tooltip' data-placement='bottom' title='".$_GLOBALS['room-feature-3']."'></li>
											<li><a data-toggle='collapse' data-target='#estandar-facilities'>+ ".$_GLOBALS['room-feature-plus']."</a></li>
										</ul>

										<div id='estandar-facilities' class='collapse'>
											<ul class='plus-facilities'>
												<li>28^m2</li>
												<li>".$_GLOBALS['room-estandar-p2']."</li>
												<li>".$_GLOBALS['room-estandar-p3']."</li>
												<li>".$_GLOBALS['room-estandar-p4']."</li>
												<li>".$_GLOBALS['room-estandar-p5']."</li>
												<li>".$_GLOBALS['room-estandar-p6']."</li>
												<li>".$_GLOBALS['room-estandar-p7']."</li>
											</ul>
										</div>

									</div>
									<div class='col-xs-12 col-sm-8 col-m-8' style='margin-bottom:50px;'>
										<div class='row' id='estandar-room'>";
										$x = 1;
										foreach ($result['cuarto_simple'] as $room) {
											$room_name = "";
											($_COOKIE['lang'] == "es") ? $room_name = $room->nombre : $room_name = $room->name;
											if($room->stop_sale != 0){
												//Cuando el cuarto tiene StopSale
												echo "<div class='col-xs-6 col-sm-3 col-md-3 room-bottom'>
															<strong>".$room_name."</strong>
														</div>
														<div class='col-xs-6 col-sm-9 col-md-9 room-bottom'>
															<h4>".$_GLOBALS['disponibilidad-room-no-aviable']."</h4>
															<p>".$_GLOBALS['disponibilidad-room-no-aviable-date']." ".$room->stop_sale."</p>
														</div><hr>";
											}
											else{
												//Cuando el cuarto no tiene StopSale
												if($room->alot_verify != 0){
													//Cuando no hay cuartos disponibles
													echo "<div class='col-xs-6 col-sm-3 col-md-3 room-bottom'>
																<strong>".$room_name."</strong>
															</div>
															<div class='col-xs-6 col-sm-9 col-md-9 room-bottom'> <h4>".$_GLOBALS['disponibilidad-room-no-aviable']."</h4> </div><hr>";
												}
												else{
													//Cuando tenemos cuartos disponibles
													if($room->capacidad_verify !=0){
														//Cuando el num. de personas es mas que la hab.
														echo "<div class='col-xs-6 col-sm-3 col-md-3 room-bottom'>
																	<strong>".$room_name."</strong>
																</div>
																<div class='col-xs-6 col-sm-9 col-md-9 room-bottom'> <h4>".$_GLOBALS['disponibilidad-room-max-capacity']."</h4> </div><hr>";
													}
													else{
														//Cuando el num. de personas concuerda con el de la hab.
														if($room->kids_verify !=0){
															//Cuando el cuarto no permite niños
															echo "<div class='col-xs-6 col-sm-3 col-md-3 room-bottom'>
																	<strong>".$room_name."</strong>
																</div>
																<div class='col-xs-6 col-sm-9 col-md-9 room-bottom'> <h4>".$_GLOBALS['disponibilidad-room-only-adults']."</h4> </div><hr>";
														}
														else{
															//Cuando el cuarto permite niños
															if($result['promocion'] != 0){

																$div = $result['promocion']/100;

																$plus = $room->price*$div;
																$price = $room->price - $plus;

																$plus_estrella = $room->clubestrella*$div;
																$estrella = $room->clubestrella - $plus_estrella;

															}else{
																$price = $room->price;
																$estrella = $room->clubestrella;
															}

															$layout = "";
															$small = "";
															$style = "";
															($x == 1) ? $layout = "<img src='/img/icons/wand.png' class='wand' />" : "";
															($x == 2) ? $layout = "Tarifa Magica" : "";
															($x == 2) ? $small = "No reembolsable" : "";
															($x == 3) ? $layout = "Tarifa Regular" : "";
															($x == 3) ? $style = "style='padding-top:20px;'" : "";
															($x == 4) ? $small = "Reembolsable" : "";

															if($room->idr == 3){
																echo"
																<div class='col-xs-12 col-sm-3 col-md-3 room-bottom'>
																		<p ".$style."><strong>".$layout."</strong></p>
																		<small>".$small."</small>
																	</div>

																	<div class='col-xs-12 col-sm-3 col-md-3 room-bottom lrbox'>
																		<p>".$room_name."</p>
																		<span>$ ".number_format(round($price), 0, '.', ',')." ".$_GLOBALS['disponibilidad-room-currency']."</span>
																	</div>

																	<div class='col-xs-12 col-sm-3 col-md-3 room-bottom'>
																		<p>".$_GLOBALS['disponibilidad-room-price-clubestrella']."</p>
																		<span>$ ".number_format(round($estrella), 0, '.', ',')." ".$_GLOBALS['disponibilidad-room-currency']."</span>
																	</div>
																	<div class='col-xs-12 col-sm-3 col-md-3 room-bottom'>
																		<form action='/reservas' method='POST'>
																			<button type='submit' class='btn btn-primary send smbutton' name='reservar'>
																				".$_GLOBALS['disponibilidad-room-button']."
																			</button>
																			<input type='hidden' readonly name='dateTo' value='".$room->fechaEntrada."'>
																			<input type='hidden' readonly name='dateFrom' value='".$room->fechaSalida."'>
																			<input type='hidden' readonly name='rooms' value='".$rooms."'>
																			<input type='hidden' readonly name='adults' value='".$jsonAdults."'>
																			<input type='hidden' readonly name='kids' value='".$jsonKids."'>
																			<input type='hidden' readonly name='idRoom' value='".$room->idr."'>
																			<input type='hidden' readonly name='csrf_token' value='".$_SESSION['csrf_token']."'>
																		</form>
																	</div>
																	";
															}
															else{

															echo"
															<div class='col-xs-12 col-sm-3 col-md-3 room-bottom'>
																	<p ".$style."><strong>".$layout."</strong></p>
																		<small>".$small."</small>
																</div>

																<div class='col-xs-12 col-sm-3 col-md-3 room-bottom lrbox'>
																	<p>".$room_name."</p>
																	<span>$ ".number_format(round($price), 0, '.', ',')." ".$_GLOBALS['disponibilidad-room-currency']."</span>
																</div>

																<div class='col-xs-12 col-sm-3 col-md-3 room-bottom'>
																	<p>".$_GLOBALS['disponibilidad-room-price-clubestrella']."</p>
																	<span>$ ".number_format(round($estrella), 0, '.', ',')." ".$_GLOBALS['disponibilidad-room-currency']."</span>
																</div>
																<div class='col-xs-12 col-sm-3 col-md-3 room-bottom'>
																	<form action='/reservas' method='POST'>
																		<button type='submit' class='btn btn-primary send smbutton' name='reservar'>
																			".$_GLOBALS['disponibilidad-room-button']."
																		</button>
																		<input type='hidden' readonly name='dateTo' value='".$room->fechaEntrada."'>
																		<input type='hidden' readonly name='dateFrom' value='".$room->fechaSalida."'>
																		<input type='hidden' readonly name='rooms' value='".$rooms."'>
																		<input type='hidden' readonly name='adults' value='".$jsonAdults."'>
																		<input type='hidden' readonly name='kids' value='".$jsonKids."'>
																		<input type='hidden' readonly name='idRoom' value='".$room->idr."'>
																		<input type='hidden' readonly name='csrf_token' value='".$_SESSION['csrf_token']."'>
																	</form>
																</div>
																";
															}
															echo ($x % 2 ? "<div style='width:69%;margin-left:26%;border-bottom:2px solid #7F5986;margin-top:5px;margin-bottom:5px; '></div>" : "");
															echo ($x == 2 ? '<div class="clearfix" style="width:100%;"></div><br><br>' : '');
														}
													}

												}
											}
											$x++;
										}
							echo"		</div>
									</div>
									<div class='col-xs-12 col-sm-4 col-m-4' style='margin-bottom:50px;'>
										<h4 style='margin-bottom:15px;'>".$_GLOBALS['home-room-ejecutivo']."</h4>
										<img src='img/rooms/room_superior.png' class='img-fluid' alt='Habitacion Superior'>";
									if($result['promocion'] != 0){

										echo "<img src='/img/icon-buenfin.png' class='img-fluid' style='position:absolute;right:0px;margin-top:-30px;' />";
									}

							echo"		<ul class='room-facilities'>
											<li><img src='img/icons/wifi.png' data-toggle='tooltip' data-placement='bottom' title='".$_GLOBALS['room-feature']."'></li>
											<li><img src='img/icons/microwave.png' data-toggle='tooltip' data-placement='bottom' title='".$_GLOBALS['room-ejecutivo-p8']."'></li>
											<li><img src='img/icons/serving-dish.png' data-toggle='tooltip' data-placement='bottom' title='".$_GLOBALS['room-feature-3']."'></li>
											<li><a data-toggle='collapse' data-target='#superior-facilities'>+ ".$_GLOBALS['room-feature-plus']."</a></li>
										</ul>

										<div id='superior-facilities' class='collapse'>
											<ul class='plus-facilities'>
												<li>34^m2</li>
												<li>".$_GLOBALS['room-estandar-p2']."</li>
												<li>".$_GLOBALS['room-superior-p']."</li>
												<li>".$_GLOBALS['room-superior-p2']."</li>
												<li>".$_GLOBALS['room-estandar-p10']."</li>
												<li>".$_GLOBALS['room-ejecutivo-p9']."</li>
												<li>".$_GLOBALS['room-estandar-p7']."</li>
											</ul>
										</div>
									</div>
									<div class='col-xs-12 col-sm-8 col-m-8' style='margin-bottom:50px;'>
										<div class='row' id='superior-room'>";
										$x = 1;
										foreach ($result['cuarto_ejecutivo'] as $room) {
											$room_name = "";
											($_COOKIE['lang'] == "es") ? $room_name = $room->nombre : $room_name = $room->name;
											if($room->stop_sale != 0){
												//Cuando el cuarto tiene StopSale
												echo "<div class='col-xs-6 col-sm-3 col-md-3 room-bottom'>
															<strong>".$room_name."</strong>
														</div>
														<div class='col-xs-6 col-sm-9 col-md-9 room-bottom'>
															<h4>".$_GLOBALS['disponibilidad-room-no-aviable']."</h4>
															<p>".$_GLOBALS['disponibilidad-room-no-aviable-date']." ".$room->stop_sale."</p>
														</div><hr>";
											}
											else{
												//Cuando el cuarto no tiene StopSale
												if($room->alot_verify != 0){
													//Cuando no hay cuartos disponibles
													echo "<div class='col-xs-6 col-sm-3 col-md-3 room-bottom'>
																<strong>".$room_name."</strong>
															</div>
															<div class='col-xs-6 col-sm-9 col-md-9 room-bottom'> <h4>".$_GLOBALS['disponibilidad-room-no-aviable']."</h4> </div><hr>";
												}
												else{
													//Cuando tenemos cuartos disponibles
													if($room->capacidad_verify !=0){
														//Cuando el num. de personas es mas que la hab.
														echo "<div class='col-xs-6 col-sm-3 col-md-3 room-bottom'>
																	<strong>".$room_name."</strong>
																</div>
																<div class='col-xs-6 col-sm-9 col-md-9 room-bottom'> <h4>".$_GLOBALS['disponibilidad-room-max-capacity']."</h4> </div><hr>";
													}
													else{
														//Cuando el num. de personas concuerda con el de la hab.
														if($room->kids_verify !=0){
															//Cuando el cuarto no permite niños
															echo "<div class='col-xs-6 col-sm-3 col-md-3 room-bottom'>
																	<strong>".$room_name."</strong>
																</div>
																<div class='col-xs-6 col-sm-9 col-md-9 room-bottom'> <h4>".$_GLOBALS['disponibilidad-room-only-adults']."</h4> </div><hr>";
														}
														else{
															//Cuando el cuarto permite niños
															if($result['promocion'] != 0){

																$div = $result['promocion']/100;

																$plus = $room->price*$div;
																$price = $room->price - $plus;

																$plus_estrella = $room->clubestrella*$div;
																$estrella = $room->clubestrella - $plus_estrella;

															}else{
																$price = $room->price;
																$estrella = $room->clubestrella;
															}

															$layout = "";
															$small = "";
															$style = "";
															($x == 1) ? $layout = "<img src='/img/icons/wand.png' class='wand' />" : "";
															($x == 2) ? $layout = "Tarifa Magica" : "";
															($x == 2) ? $small = "No reembolsable" : "";
															($x == 3) ? $layout = "Tarifa Regular" : "";
															($x == 3) ? $style = "style='padding-top:20px;'" : "";
															($x == 4) ? $small = "Reembolsable" : "";

															echo"<div class='col-xs-12 col-sm-3 col-md-3 room-bottom'>
																	<p ".$style."><strong>".$layout."</strong></p>
																	<small>".$small."</small>
																</div>

																<div class='col-xs-12 col-sm-3 col-md-3 room-bottom lrbox'>
																	<p>".$room_name."</p>
																	<span>$ ".number_format(round($price), 0, '.', ',')." ".$_GLOBALS['disponibilidad-room-currency']."</span>
																</div>

																<div class='col-xs-12 col-sm-3 col-md-3 room-bottom'>
																	<p>".$_GLOBALS['disponibilidad-room-price-clubestrella']."</p>
																	<span>$ ".number_format(round($estrella), 0, '.', ',')." ".$_GLOBALS['disponibilidad-room-currency']."</span>
																</div>
																<div class='col-xs-12 col-sm-3 col-md-3 room-bottom'>
																	<form action='/reservas' method='POST'>
																		<button type='submit' class='btn btn-primary send smbutton' name='reservar'>
																			".$_GLOBALS['disponibilidad-room-button']."
																		</button>
																		<input type='hidden' readonly name='dateTo' value='".$room->fechaEntrada."'>
																		<input type='hidden' readonly name='dateFrom' value='".$room->fechaSalida."'>
																		<input type='hidden' readonly name='rooms' value='".$rooms."'>
																		<input type='hidden' readonly name='adults' value='".$jsonAdults."'>
																		<input type='hidden' readonly name='kids' value='".$jsonKids."'>
																		<input type='hidden' readonly name='idRoom' value='".$room->idr."'>
																		<input type='hidden' readonly name='csrf_token' value='".$_SESSION['csrf_token']."'>
																	</form>
																</div>
																";
														}
														echo ($x % 2 ? "<div style='width:69%;margin-left:26%;border-bottom:2px solid #7F5986;margin-top:5px;margin-bottom:5px; '></div>" : "");
														echo ($x == 2 ? '<div class="clearfix" style="width:100%;"></div><br><br>' : '');
													}

												}
											}
											$x++;									
							
										}			
							echo"		</div>
									</div>
									<div class='col-xs-12 col-sm-4 col-m-4'>
										<h4 style='margin-bottom:15px;'>".$_GLOBALS['home-room-junior']."</h4>
										<img src='img/rooms/room_ejecutive.png' class='img-fluid' alt='Habitacion Ejecutiva'>";
									if($result['promocion'] != 0){

										echo "<img src='/img/icon-buenfin.png' class='img-fluid' style='position:absolute;right:0px;margin-top:-30px;' />";
									}
							echo"		<ul class='room-facilities'>
											<li><img src='img/icons/wifi.png' data-toggle='tooltip' data-placement='bottom' title='".$_GLOBALS['room-feature']."'></li>
											<li><img src='img/icons/refrigerator.png' data-toggle='tooltip' data-placement='bottom' title='".$_GLOBALS['room-ejecutivo-p7']."'></li>
											<li><img src='img/icons/serving-dish.png' data-toggle='tooltip' data-placement='bottom' title='".$_GLOBALS['room-feature-3']."'></li>
											<li><a data-toggle='collapse' data-target='#ejecutive-facilities'>+ ".$_GLOBALS['room-feature-plus']."</a></li>
										</ul>

										<div id='ejecutive-facilities' class='collapse'>
											<ul class='plus-facilities'>
												<li>28^m2</li>
												<li>".$_GLOBALS['room-estandar-p2']."</li>
												<li>".$_GLOBALS['room-superior-p']."</li>
												<li>".$_GLOBALS['room-superior-p2']."</li>
												<li>".$_GLOBALS['room-ejecutivo-p3']."</li>
												<li>".$_GLOBALS['room-ejecutivo-p4']."</li>
												<li>".$_GLOBALS['room-ejecutivo-p5']."</li>
											</ul>
										</div>
									</div>
									<div class='col-xs-12 col-sm-8 col-m-8'>
										<div class='row' id='ejecutive-room'>";
										$x = 1;
										foreach ($result['cuarto_superior'] as $room) {
											$room_name = "";
											($_COOKIE['lang'] == "es") ? $room_name = $room->nombre : $room_name = $room->name;
											if($room->stop_sale != 0){
												//Cuando el cuarto tiene StopSale
												echo "<div class='col-xs-6 col-sm-3 col-md-3 room-bottom'>
															<strong>".$room_name."</strong>
														</div>
														<div class='col-xs-6 col-sm-9 col-md-9 room-bottom'>
															<h4>".$_GLOBALS['disponibilidad-room-no-aviable']."</h4>
															<p>".$_GLOBALS['disponibilidad-room-no-aviable-date']." ".$room->stop_sale."</p>
														</div><hr>";
											}
											else{
												//Cuando el cuarto no tiene StopSale
												if($room->alot_verify != 0){
													//Cuando no hay cuartos disponibles
													echo "<div class='col-xs-6 col-sm-3 col-md-3 room-bottom'>
																<strong>".$room_name."</strong>
															</div>
															<div class='col-xs-6 col-sm-9 col-md-9 room-bottom'> <h4>".$_GLOBALS['disponibilidad-room-no-aviable']."</h4> </div><hr>";
												}
												else{
													//Cuando tenemos cuartos disponibles
													if($room->capacidad_verify !=0){
														//Cuando el num. de personas es mas que la hab.
														echo "<div class='col-xs-6 col-sm-3 col-md-3 room-bottom'>
																<strong>".$room_name."</strong>
															</div>
															<div class='col-xs-6 col-sm-9 col-md-9 room-bottom'> <h4>".$_GLOBALS['disponibilidad-room-max-capacity']."</h4> </div><hr>";
													}
													else{
														//Cuando el num. de personas concuerda con el de la hab.
														if($room->kids_verify !=0){
															//Cuando el cuarto no permite niños
															echo "<div class='col-xs-6 col-sm-3 col-md-3 room-bottom'>
																<strong>".$room_name."</strong>
																</div>
																<div class='col-xs-6 col-sm-9 col-md-9 room-bottom'> <h4>".$_GLOBALS['disponibilidad-room-only-adults']."</h4> </div><hr>";
														}
														else{
															//Cuando el cuarto permite niños
															if($result['promocion'] != 0){

																$div = $result['promocion']/100;

																$plus = $room->price*$div;
																$price = $room->price - $plus;

																$plus_estrella = $room->clubestrella*$div;
																$estrella = $room->clubestrella - $plus_estrella;

															}else{
																$price = $room->price;
																$estrella = $room->clubestrella;
															}

															$layout = "";
															$small = "";
															$style = "";
															($x == 1) ? $layout = "<img src='/img/icons/wand.png' class='wand' />" : "";
															($x == 2) ? $layout = "Tarifa Magica" : "";
															($x == 2) ? $small = "No reembolsable" : "";
															($x == 3) ? $layout = "Tarifa Regular" : "";
															($x == 3) ? $style = "style='padding-top:20px;'" : "";
															($x == 4) ? $small = "Reembolsable" : "";

															echo"<div class='col-xs-12 col-sm-3 col-md-3 room-bottom'>
																	<p ".$style."><strong>".$layout."</strong></p>
																	<small>".$small."</small>
																</div>

																<div class='col-xs-12 col-sm-3 col-md-3 room-bottom lrbox'>
																	<p>".$room_name."</p>
																	<span>$ ".number_format(round($price), 0, '.', ',')." ".$_GLOBALS['disponibilidad-room-currency']."</span>
																</div>

																<div class='col-xs-12 col-sm-3 col-md-3 room-bottom'>
																	<p>".$_GLOBALS['disponibilidad-room-price-clubestrella']."</p>
																	<span>$ ".number_format(round($estrella), 0, '.', ',')." ".$_GLOBALS['disponibilidad-room-currency']."</span>
																</div>
																<div class='col-xs-12 col-sm-3 col-md-3 room-bottom'>
																	<form action='/reservas' method='POST'>
																		<button type='submit' class='btn btn-primary send smbutton' name='reservar'>
																			".$_GLOBALS['disponibilidad-room-button']."
																		</button>
																		<input type='hidden' readonly name='dateTo' value='".$room->fechaEntrada."'>
																		<input type='hidden' readonly name='dateFrom' value='".$room->fechaSalida."'>
																		<input type='hidden' readonly name='rooms' value='".$rooms."'>
																		<input type='hidden' readonly name='adults' value='".$jsonAdults."'>
																		<input type='hidden' readonly name='kids' value='".$jsonKids."'>
																		<input type='hidden' readonly name='idRoom' value='".$room->idr."'>
																		<input type='hidden' readonly name='csrf_token' value='".$_SESSION['csrf_token']."'>
																	</form>
																</div>
																";
														}
														echo ($x % 2 ? "<div style='width:69%;margin-left:26%;border-bottom:2px solid #7F5986;margin-top:5px;margin-bottom:5px; '></div>" : "");
														echo ($x == 2 ? '<div class="clearfix" style="width:100%;"></div><br><br>' : '');
													}

												}
											}
											$x++;									
							
										}
							echo"		</div>
									</div>

								</div>";

							
						}
						else
							echo "no here"; 

					?>

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

<script type="text/javascript" src="js/pooper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/moment/moment.min.js"></script>
<script type="text/javascript" src="js/moment/locale/es.js"></script>
<script type="text/javascript" src="/js/daterangepicker.js"></script>
<script type="text/javascript" src="js/search.js"></script>
<script type="text/javascript" src="js/offside.js"></script>
<script src="js/hover/toucheffects.js"></script>
<script src="js/jquery.visible.js"></script>
 

<script type="text/javascript">

	$(window).on('load', function(){
	  setTimeout(removeLoader, 2000); //wait for page load PLUS two seconds.
	});
	function removeLoader(){
	    $( "#loadingDiv" ).fadeOut(500, function() {
	      // fadeOut complete. Remove the loading div
	      $( "#loadingDiv" ).remove(); //makes page more lightweight 
	  });  
	}
	$(document).ready(function(){

		 $('[data-toggle="tooltip"]').tooltip();

		var offsideMenu1 = offside( '#menu-1', {

		    slidingElementsSelector:'#general',
		    buttonsSelector: '.menu-btn-1, .menu-btn-1--close',
		    slidingSide: 'left',
		    afterOpen: function(){console.log("afterOffsideOpen")},
		});
		/* var overlay = document.querySelector('.site-overlay')
                .addEventListener( 'click', offside.factory.closeOpenOffside );*/


		// Select all links with hashes
		$('a[href*="#"]')
		  // Remove links that don't actually link to anything
		  .not('[href="#"]')
		  .not('[href="#0"]')
		  .click(function(event) {
		    // On-page links
		    if (
		      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
		      && 
		      location.hostname == this.hostname
		    ) {
		      // Figure out element to scroll to
		      var target = $(this.hash);
		      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		      // Does a scroll target exist?
		      if (target.length) {
		        // Only prevent default if animation is actually gonna happen
		        event.preventDefault();
		        $('html, body').animate({
		          scrollTop: target.offset().top
		        }, 1000, function() {
		          // Callback after animation
		          // Must change focus!
		          var $target = $(target);
		          $target.focus();
		          if ($target.is(":focus")) { // Checking if the target was focused
		            return false;
		          } else {
		            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
		            $target.focus(); // Set focus again
		          };
		        });
		      }
		    }
		  });

	});
	

</script>


</html>
