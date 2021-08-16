<?php 

if ($cuarto->getIdr() == 11) {

	echo '
	<form action="reservation/lng/index.php" method="POST" id="room-0'.$cuarto->getTipo().'">
		<div class="form-row">
		<div class="col-xs-12 col-sm-12 col-md-12"><hr></div>
			<div class="col-xs-12 col-sm-12 col-md-12">';
				/*if($_COOKIE['lang'] == "es"){

					echo '<strong><p>'.$cuarto->getNombre().'</p></strong>';
				}
				else{
					echo '<strong><p>'.$cuarto->getName().'</p></strong>';	
				}*/
	echo'  </div>';
}
else{
	echo '
	<form action="reservation/lng/index.php" method="POST" id="room-0'.$cuarto->getIdr().'">
		<div class="form-row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="nameRoom">';
				if ($_COOKIE['lang'] == "es") {

					echo '<strong><p>'.$cuarto->getNombre().'</p></strong>';
				}
				else{
					echo '<strong><p>'.$cuarto->getName().'</p></strong>';	
				}
	echo '       </div>
			</div>';
}

$pagoDestino = $hotelController->getPagoEnDestino($cuarto);
if ($pagoDestino == 0) {

	if ($cuarto->getIdr() == 11) {
		echo '<div class="col-xs-12 col-sm-4 col-md-2" style="text-align:center;">';
			if($_COOKIE['lang'] == "es"){

					echo '<strong><p>'.$cuarto->getNombre().'</p></strong>';
				}
				else{
					echo '<strong><p>'.$cuarto->getName().'</p></strong>';	
				}
		echo'</div>';
	}
	else{
		echo' 
			<div class="col-xs-12 col-sm-4 col-md-2">
				<div class="form-check" id="pagoDestino">
				    <label class="form-check-label" >
				      <input type="checkbox" class="form-check-input" style="margin-left: -0.5rem;">
				      <br>
				      '.$_GLOBALS['disponibilidad-pago-destino'].'
				    </label>
				 </div>
			</div>';
	}

}
else{
	echo' 
	<div class="col-xs-12 col-sm-4 col-md-2">
	</div>';
}


$n_rooms=0;
$listAllotment = array();
$listCapacidad = array();
$listKidsAllow = array();
while ($n_rooms < $rooms) {

	$allotment = $hotelController->getAllotment($cuarto);
	$capacidad= $hotelController->getCapacity($cuarto,$arrayAdults[$n_rooms],$arrayKids[$n_rooms]);
	$kidsAllow = $hotelController->getKidsAllow($cuarto,$arrayKids[$n_rooms]);
	array_push($listAllotment,$allotment);
	array_push($listCapacidad, $capacidad);
	array_push($listKidsAllow, $kidsAllow);
	$n_rooms++;
}

foreach ($listCapacidad as $capacidad) {
	if ($capacidad == 1) {
		break;
	}
}
foreach ($listAllotment as $allotment) {
	if ($allotment==1) {
		break;
	}
}
foreach ($listKidsAllow as $kidsAllow) {
	if ($kidsAllow==1) {
		break;
	}
}

if ($allotment == 0) {// 0=positivo,1=negativo

	if ($capacidad == 0) {

		if ($kidsAllow == 0) {

			$stopsales= $hotelController->getStopSales($cuarto);
			if ($stopsales != 0) {

				echo'
				<div class="col-xs-6 col-sm-4 col-md-4">
					<p class="closeDate" style="margin-bottom:0px;">'.$_GLOBALS['disponibilidad-room-close'].'</p>
					<p class="closeDate">'.$stopsales.'</p>
				</div>';
			}
			else{

				$n_rooms = 0;
				$total = 0;
				$promo = 0;
				while ( $n_rooms < $rooms) {
					
					$tarifas = $hotelController->getTarifas($cuarto,$arrayAdults[$n_rooms],$arrayKids[$n_rooms]);
					$tarifasPromo = $hotelController->getTarifasPromo($cuarto,$arrayAdults[$n_rooms],$arrayKids[$n_rooms]);
					foreach ($tarifas as $tarifa) {
						$total = $total+$tarifa;
					}
					if ($tarifasPromo==0) {
						$promo = 0;
					}else{

						foreach ($tarifasPromo as $tarifaPromo) {
							$promo = $promo +$tarifaPromo;
						}
					}
					$n_rooms++;
				}

				if($_COOKIE['lang'] == "en"){

					if($promocion != 0){

						$estrella = $hotelController->getPrecioClubestrella($total);
						$div = $promocion/100;

						$plus = $total*$div;
						$price = $total - $plus;

						$plus_estrella = $estrella*$div;
						$clubestrella = $estrella - $plus_estrella;

						$plus_promo = $promo*$div;
						$pricePromo = $promo - $plus_promo;

					}else{

						$price = $total;
						$pricePromo = $promo;
						$clubestrella = $hotelController->getPrecioClubestrella($price);
					}
					
				}
				else{

					if($promocion != 0){

						$total = $hotelController->getPesos($total);
						$promo = $hotelController->getPesos($promo);
						$estrella = $hotelController->getPrecioClubestrella($total);
						$div = $promocion/100;
						

						$plus = $total*$div;
						$price = $total - $plus;

						$plus_estrella = $estrella*$div;
						$clubestrella = $estrella - $plus_estrella;

						$plus_promo = $promo*$div;
						$pricePromo = $promo - $plus_promo;

					}else{

						$price = $hotelController->getPesos($total);
						$pricePromo = $hotelController->getPesos($promo);
						$clubestrella = $hotelController->getPrecioClubestrella($price);
					}
				}

				echo'
				<div class="col-xs-6 col-sm-4 col-md-4">
					<p class="payAmount" style="margin-bottom:0px;">'.$_GLOBALS['disponibilidad-room-total'].'</p>
					<p class="payAmount">$ '.number_format(round($price), 0, '.', ',').' '.$_GLOBALS['disponibilidad-room-currency'].'</p>
				</div>';

				if ($promo !=0) { //En caso de que tenga promocion

					echo'
						<div class="col-xs-6 col-sm-4 col-md-4">
							<p class="clubestrellaTittle" style="margin-bottom:0px;">'.$_GLOBALS['disponibilidad-room-price-clubestrella'].'</p>
							<p class="clubestrellaTittle"><s> $'.number_format(round($clubestrella), 0, '.', ',').' '.$_GLOBALS['disponibilidad-room-currency'].'</s></p>
							<p class="payAmount">'.$_GLOBALS['disponibilidad-room-promocion'].' $ '.number_format(round($pricePromo), 0, '.', ',').' '.$_GLOBALS['disponibilidad-room-currency'].'</p>
						</div>';
				}
				else{// Si no hay promocion entonces precio Clubestrella

					echo'
						<div class="col-xs-6 col-sm-4 col-md-4">
							<p class="clubestrellaTittle" style="margin-bottom:0px;">'.$_GLOBALS['disponibilidad-room-price-clubestrella'].'</p>
							<p class="clubestrellaTittle">$ '.number_format(round($clubestrella), 0, '.', ',').' '.$_GLOBALS['disponibilidad-room-currency'].'</p>
						</div>';
				}

			}
		}
		else{
			echo'
				<div class="col-xs-6 col-sm-4 col-md-4">
					<p style="text-align:center;">'.$_GLOBALS['disponibilidad-only-adults'].'</p>
				</div>';
		}
	}
	else{
		echo'
			<div class="col-xs-6 col-sm-4 col-md-4">
				<p style="margin-bottom:0px;text-align:center;">'.$_GLOBALS['disponibilidad-room-capacity'].'</p>
				<p style="text-align:center;">Capacidad Maxima por cuarto: '.$cuarto->getCapacidad().'</p>
			</div>';
	}
}
else{
	echo'
		<div class="col-xs-6 col-sm-4 col-md-4">
			<p>'.$_GLOBALS['disponibilidad-room-no-aviable'].'</p>
		</div>';
}



if ($allotment !=0 || $capacidad !=0 || $kidsAllow !=0 || $stopsales!=0) {
	echo'
		<div class="col-xs-12 col-sm-4 col-md-2">
			<button type="button" class="btn btn-primary send disabled">'.$_GLOBALS['disponibilidad-room-button'].'</button>	
		</div>';
}
else{
	echo"
		<div class='col-xs-12 col-sm-4 col-md-2'>
			<button type='submit' class='btn btn-primary send' name='reservar'>".$_GLOBALS['disponibilidad-room-button']."</button>
			<input type='text' class='invisible teemo' name='dateTo' value='".$dateTo."'>
			<input type='text' class='invisible teemo' name='dateFrom' value='".$dateFrom."'>
			<input type='text' class='invisible teemo' name='rooms' value='".$rooms."'>
			<input type='text' class='invisible teemo' name='adults' value='".$jsonAdults."'>
			<input type='text' class='invisible teemo' name='kids' value='".$jsonKids."'>
			<input type='text' class='invisible teemo' name='idRoom' value='".$cuarto->getIdr()."'>
		</div>";
}
echo '		<div class="col-xs-12 col-sm-12 col-md-12"><hr></div>
		</div>
	</form>';

?>