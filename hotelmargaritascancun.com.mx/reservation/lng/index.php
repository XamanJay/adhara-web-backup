<?php 
	require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/db.php");
	require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/hotel.php");
	require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/cliente.php");
	require(realpath($_SERVER['DOCUMENT_ROOT'])."/controllers/hotelController.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include "meta.php"; ?>
</head>
<body>


<?php include "../../lang/languaje.php"; ?>
<?php include "../../partial_views/navbar.php"; ?>
<?php include "../../partial_views/slider_home.php"; ?>
<div class="separador"></div>
<section id="disponibilidad">
	<?php 

		if (isset($_POST['dateTo']) && isset($_POST['dateFrom']) && isset($_POST['rooms']) && isset($_POST['adults']) && isset($_POST['kids']) && isset($_POST['reservar']) && isset($_POST['idRoom']) ) {
		
				$idHotel = 2;
				$hotelController = new hotelController();

				$dateTo = $_POST['dateTo'];				//Fecha inicial
				$dateFrom = $_POST['dateFrom'];			//Fecha final
				$rooms = $_POST['rooms'];			//Número de cuartos
				$idRoom = $_POST['idRoom'];
				$arrayAdults = json_decode($_POST['adults']);//Arreglo de enteros (adultos) -> adults[0], adults[1] y adults[2]
				$arrayKids = json_decode($_POST['kids']);	//Arreglo de enteros (kids) -> kids[0], kids[1] y kids[2]
				$pishiboton = $_POST['reservar']; 	//Este botón solo sirve para hacer el post
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
				$season = $hotelController->getSingleSeason($dateFrom,$idHotel,$idRoom);
				$promocion = $hotelController->getPromocion($dateTo);

				$cuarto = $hotelController->getRoom($season,$dateTo,$dateFrom,$idHotel);
				$pagoDestino = $hotelController->getPagoEnDestino($cuarto);

				$n_rooms = 0;
				$total = 0;
				$promo = 0;
				$price = 0;
				while ($n_rooms < $rooms) {

					$tarifas = $hotelController->getTarifas($cuarto,$arrayAdults[$n_rooms],$arrayKids[$n_rooms]);
					$tarifasPromo = $hotelController->getTarifasPromo($cuarto,$arrayAdults[$n_rooms],$arrayKids[$n_rooms]);

					foreach ($tarifas as $tarifa) {
						$total = $total+$tarifa;
					}

					if ($tarifasPromo==0) {//En caso de que no tenga promocion
						$promo = 0;
					}else{//En caso de que tenga promocion

						foreach ($tarifasPromo as $tarifaPromo) {
							$promo = $promo +$tarifaPromo;
						}
					}
					$n_rooms++;
				}

				if ($_COOKIE['lang'] == "es") {
					$price = $hotelController->getPesos($total);	
				}
				else{
					$price = $total;
				}
		}

	?>
	<div class="container" id="reservacion">
		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-6">
				<h2 style="margin-bottom: 40px; text-align: left;"><?php echo $_GLOBALS['reserva-h1']; ?></h2>
				<h6 style="font-weight: bolder;">
					<?php echo $_GLOBALS['reserva-rooms'].$rooms.$_GLOBALS['reserva-adults'].$adults.$_GLOBALS['reserva-kids'].$kids.$_GLOBALS['reserva-nights'].$noches." " ?>	
				</h6>
				<p style="margin-bottom:0px;"><?php echo $_GLOBALS['reserva-room-type'].$cuarto->getNombre(); ?></p>
				<?php 
					if (isset($_SESSION['cliente'])) {


						if($_SESSION['cliente']->getNumeroSocio() != 0){

							if($promocion != 0){

								$div = $promocion/100;

								$plus = $price*$div;
								$total = $price - $plus;

								$clubestrella = $hotelController->getPrecioClubestrella($total);

							}else{
								$clubestrella = $hotelController->getPrecioClubestrella($price);
							}

							echo '<p style="margin-bottom:0px;">'.$_GLOBALS['reserva-total-pay'].'<strong>'.$_GLOBALS['reserva-include-tax'].'</strong>: $ '.number_format(round($clubestrella), 0, '.', ',').' '.$_GLOBALS['reserva-currency'].'</p>';
						}
					}
					else{

						if($promocion != 0){

							$div = $promocion/100;
							$plus = $price*$div;
							$total = $price - $plus;
						}
						else{
							$total = $price;
						}

						echo '<p style="margin-bottom:0px;">'.$_GLOBALS['reserva-total-pay'].'<strong>'.$_GLOBALS['reserva-include-tax'].'</strong>: $ '.number_format(round($total), 0, '.', ',').' '.$_GLOBALS['reserva-currency'].'</p>';
					}

				?>
				<p style="margin-bottom: 0px;"><?php echo $_GLOBALS['reserva-text'].$semanaStart." ".$diaStart.$_GLOBALS['reserva-text-2'].$mesStart.$_GLOBALS['reserva-text-3'].$añoStart; ?></p>
				<p><?php echo $_GLOBALS['reserva-text-4'].$semanaEnd." ".$diaEnd.$_GLOBALS['reserva-text-2'].$mesEnd.$_GLOBALS['reserva-text-3'].$añoEnd; ?></p>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-6">
				<div class="row" style="text-align: center;">
					<!--<div class="col-xs-12 col-sm-12 col-md-12">
						<h2 style="margin-bottom: 20px; text-align: right;">Clubestrella</h2>
					</div>-->
					<div class="col-xs-12 col-sm-12 col-md-12">
						<ul id="clubMenu">
							<li style="margin-right: 20px;">
								<img src="/img/reservacion/clubestrella.png" alt="Club Estrella" style="width: 80px;">
							</li>
							<li>
								<a href="#" class="btnCustom" data-toggle="modal" data-target="#soyMiembro" data-backdrop="static" data-keyboard="false">
									<img src="/img/reservacion/member.png" alt="miembro" style="width: 40px;">
								</a>
								<p><strong><?php echo $_GLOBALS['reserva-clubestrella-member']; ?></strong></p>
							</li>
							<li>
								<a href="#" class="btnCustom" data-toggle="modal" data-target="#newMember" data-backdrop="static" data-keyboard="false">
									<img src="/img/reservacion/newmember.png" alt="Nuevo miembro" style="width: 40px;">
								</a>
								<p><strong><?php echo $_GLOBALS['reserva-clubestrella-new-member']; ?></strong></p>
							</li>
							<li>
								<a href="#" class="btnCustom" data-toggle="modal" data-target="#Passrecover" data-backdrop="static" data-keyboard="false">
									<img src="/img/reservacion/password.png" alt="Password" style="width: 40px;">
								</a>
								<p><strong><?php echo $_GLOBALS['reserva-clubestrella-recover']; ?></strong></p>
							</li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12" id="itinerario">
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<?php 

				if (isset($_SESSION["cliente"])) {
					echo "
						<form action='success.php' method='POST' id='conClubestrella'>
							<div class='form-row'>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label class='form-control-label' for='nombre'>".$_GLOBALS['reserva-clubestrella-name']."</label>
									<input type='text' class='form-control' id='nombreClub' name='nombre' placeholder='Example input' value='".$_SESSION['cliente']->getNombre()."'>
								</div>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label class='form-control-label' for='apellido'>".$_GLOBALS['reserva-clubestrella-lastname']."</label>
									<input type='text' class='form-control' id='apellidoClub' name='apellido' placeholder='Another input' value='".$_SESSION['cliente']->getApellidoPaterno()."'>
								</div>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label class='form-control-label' for='email'>".$_GLOBALS['reserva-clubestrella-email']."</label>
									<input type='email' class='form-control' id='emailClub' name='email' aria-describedby='emailHelp' placeholder='Enter email' value='".$_SESSION['cliente']->getEmail()."'>
									<small id='emailHelp' class='form-text text-muted'>".$_GLOBALS['reserva-clubestrella-email-label']."</small>
								</div>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label class='form-control-label' for='confirmEmail'>".$_GLOBALS['reserva-clubestrella-email-confirm']."</label>
									<input type='email' class='form-control' id='confirmEmailClub' name='confirmEmail' aria-describedby='emailHelp' value='".$_SESSION['cliente']->getEmail()."'>
									<small id='emailHelp' class='form-text text-muted'>".$_GLOBALS['reserva-clubestrella-email-label']."</small>
								</div>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label class='form-control-label' for='ciudad'>".$_GLOBALS['reserva-clubestrella-city']."</label>
									<input type='text' class='form-control' id='ciudadClub' name='ciudad' placeholder='Example input' value='".$_SESSION['cliente']->getCiudad()."'>
								</div>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label class='form-control-label' for='estado'>".$_GLOBALS['reserva-clubestrella-state']."</label>
									<input type='text' class='form-control' id='estadoClub' name='estado' placeholder='Another input' value='".$_SESSION['cliente']->getEstado()."' >
								</div>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label for='pais' class='form-control-label'>".$_GLOBALS['reserva-clubestrella-country']."</label>
			      					<input type='text' class='form-control' id='paisClub' name='pais' placeholder='Another input' value='".$_SESSION['cliente']->getPais()."' >
								</div>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label class='form-control-label' for='telefono'>".$_GLOBALS['reserva-clubestrella-numero']."</label>
									<input type='text' class='form-control' id='telefonoClub' name='telefono' placeholder='Telefono' value='".$_SESSION['cliente']->getTelefono()."'>

								</div>
								<div class='form-group col-xs-12 col-sm-12 col-md-12'>
								    <label for='comentarios'>".$_GLOBALS['reserva-clubestrella-comments']."</label>
								    <textarea class='form-control' id='comentariosClub' name='comentarios' rows='3'></textarea>

									<input type='text' class='invisible noPublic' id='dateTo' name='dateTo' value='".$dateTo."'>
									<input type='text' class='invisible noPublic' id='dateFrom' name='dateFrom' value='".$dateFrom."'>
									<input type='text' class='invisible noPublic' id='idRoom' name='idRoom' value='".$cuarto->getIdr()."'>
									<input type='text' class='invisible noPublic' id='rooms' name='rooms' value='".$rooms."'>
									<input type='text' class='invisible noPublic' id='adults' name='adults' value='".$jsonAdults."'>
									<input type='text' class='invisible noPublic' id='kids' name='kids' value='".$jsonKids."'>
									<input type='text' class='invisible noPublic' id='clubestrella' name='clubestrella' value='1'>
									<input type='number' class='invisible noPublic' name='isActive' value='1' readonly>
									<input type='text' class='invisible noPublic' name='service_name' value='club' readonly>
								</div>

								<div class='form-check'>
								  <label class='form-check-label'>
								    <input class='form-check-input' type='checkbox' value='1' name='terms'>
								    ".$_GLOBALS['reserva-terms']."
								  </label>
								  <p>".$_GLOBALS['reserva-terms-2']."</p>
								</div>
								
								<div class='form-check col-xs-6 col-sm-3 col-md-3'>
								  <label class='form-check-label equals' id='pagoPaypal'>
								    <input class='form-check-input equals' type='radio' name='metodoPago' id='metodoPago2Club' value='paypal'>
								  </label>
								  <img src='../../img/metodoPago/pagapaypal.png' alt='Paypal' class='img-fluid equals'>
								</div>";

					$today = date("Y-m-d");
					$date1=date_create($today);
					$date2=date_create($dateTo);
					$diff=date_diff($date1,$date2);

					if ($diff->format('%d')>2) {//en caso de que la reserva sea mayor de 2 dias apartir de hoy se habilita deposito bancario
						echo"

								<div class='form-check col-xs-6 col-sm-3 col-md-3'>
								  <label class='form-check-label equals' id='pagoBancario'>
								    <input class='form-check-input equals' type='radio' name='metodoPago' id='metodoPago3Club' value='pagoBancario'>
								  </label>
								  <p class='equals' style='text-align: center;margin-bottom: 0px;'>Depósito Bancario</p>
								  <p style='text-align: center;'>".$_GLOBALS['reserva-pay-bank']."</p>
								</div>
							";
					}
					if ($pagoDestino == 0) {
						if ($cuarto->getIdr()==3) {
						echo"   <div class='form-check col-xs-6 col-sm-3 col-md-3'></div>";
						}
						else{

						echo"
								<div class='form-check col-xs-6 col-sm-3 col-md-3'>
								  <label class='form-check-label equals' id='pagoHotel'>
								    <input class='form-check-input equals' type='radio' name='metodoPago' id='metodoPago3Club' value='pagoHotel'>
								  </label>
								  <p class='equals' style='text-align: center;'>".$_GLOBALS['reserva-pay-hotel']."</p>
								</div>	
						";
						}
					}
					else{
						echo"	<div class='form-check col-xs-6 col-sm-3 col-md-3'></div>";
					}

						echo"
								<div class='form-group col-xs-12 col-sm-12 col-md-12'>
									<button type='submit' class='btn btn-primary'>".$_GLOBALS['reserva-pay-button']."</button>
								</div>
							</div>
						</form>
					";
				}// fin del if
				else{

					echo "
						<form action='success.php' method='POST' id='sinClubestrella'>
							<div class='form-row'>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label class='form-control-label' for='nombre'>".$_GLOBALS['reserva-clubestrella-name']."</label>
									<input type='text' class='form-control' id='nombre' name='nombre' placeholder='Nombre'>
								</div>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label class='form-control-label' for='apellido'>".$_GLOBALS['reserva-clubestrella-lastname']."</label>
									<input type='text' class='form-control' id='apellido' name='apellido' placeholder='Apellido'>
								</div>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label class='form-control-label' for='email'>".$_GLOBALS['reserva-clubestrella-email']."</label>
									<input type='email' class='form-control' id='email' name='email' aria-describedby='emailHelp' placeholder='Enter email'>
									<small id='emailHelp' class='form-text text-muted'>".$_GLOBALS['reserva-clubestrella-email-label']."</small>
								</div>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label class='form-control-label' for='confirmEmail'>".$_GLOBALS['reserva-clubestrella-email-confirm']."</label>
									<input type='email' class='form-control' id='confirmEmail' name='confirmEmail' aria-describedby='emailHelp' placeholder='Enter email'>
									<small id='emailHelp' class='form-text text-muted'>".$_GLOBALS['reserva-clubestrella-email-label']."</small>
								</div>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label class='form-control-label' for='ciudad'>".$_GLOBALS['reserva-clubestrella-city']."</label>
									<input type='text' class='form-control' id='ciudad' name='ciudad' placeholder='Ciudad'>
								</div>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label class='form-control-label' for='estado'>".$_GLOBALS['reserva-clubestrella-state']."</label>
									<input type='text' class='form-control' id='estado' name='estado' placeholder='Estado/Región'>
								</div>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label for='pais' class='form-control-label'>".$_GLOBALS['reserva-clubestrella-country']."</label>
			      					<select id='pais' name='pais' class='form-control'>
										<option value=' selected='selected'>Seleccionar</option>
								  		<option value='MX' >Mexico</option>
								  		<option value='US' >United States</option>
								  		<option value=' >--</option>
								  		<option value='AF' >Afghanistan</option>
								  		<option value='AL' >Albania</option>
								  		<option value='DZ' >Algeria</option>
						              	<option value='AS' >American Samoa</option>
						              	<option value='AD' >Andorra</option>
						              	<option value='AO' >Angola</option>
						              	<option value='AI' >Anguilla</option>
						              	<option value='AQ' >Antarctica</option>
						              	<option value='AG' >Antigua and Barbuda</option>
						              	<option value='AR' >Argentina</option>
						              	<option value='AM' >Armenia</option>
						              	<option value='AW' >Aruba</option>
						              	<option value='AU' >Australia</option>
						              	<option value='AT' >Austria</option>
						              	<option value='AZ' >Azerbaidjan</option>
						              	<option value='BS' >Bahamas</option>
						              	<option value='BH' >Bahrain</option>
						              	<option value='BD' >Bangladesh</option>
						              	<option value='BB' >Barbados</option>
						              	<option value='BY' >Belarus</option>
						              	<option value='BE' >Belgium</option>
						              	<option value='BZ' >Belize</option>
						              	<option value='BJ' >Benin</option>
						              	<option value='BM' >Bermuda</option>
						              	<option value='BT' >Bhutan</option>
						              	<option value='BO' >Bolivia</option>
						              	<option value='BA' >Bosnia-Herzegovina</option>
						              	<option value='BW' >Botswana</option>
						              	<option value='BV' >Bouvet Island</option>
						              	<option value='BR' >Brazil</option>
						              	<option value='IO' >British Indian Ocean</option>
						              	<option value='BN' >Brunei Darussalam</option>
						              	<option value='BG' >Bulgaria</option>
						              	<option value='BF' >Burkina Faso</option>
						              	<option value='BI' >Burundi</option>
						              	<option value='KH' >Cambodia</option>
						              	<option value='CM' >Cameroon</option>
						              	<option value='CA' >Canada</option>
						              	<option value='CV' >Cape Verde</option>
						              	<option value='KY' >Cayman Islands</option>
						              	<option value='CF' >Central African Republic</option>
						              	<option value='CC' >Cocos (Keeling) Islands</option>
						              	<option value='CO' >Colombia</option>
						              	<option value='KM' >Comoros</option>
						              	<option value='CG' >Congo</option>
						              	<option value='CK' >Cook Islands</option>
						              	<option value='CR' >Costa Rica</option>
						              	<option value='HR' >Croatia</option>
						              	<option value='CU' >Cuba</option>
						              	<option value='CY' >Cyprus</option>
						              	<option value='CZ' >Czech Republic</option>
						              	<option value='TD' >Chad</option>
						              	<option value='CL' >Chile</option>
						              	<option value='CN' >China</option>
						              	<option value='CX' >Christmas Island</option>
						              	<option value='DK' >Denmark</option>
						              	<option value='DJ' >Djibouti</option>
						              	<option value='DM' >Dominica</option>
						              	<option value='DO' >Dominican Republic</option>
							            <option value='TP' >East Timor</option>
							            <option value='EC' >Ecuador</option>
							            <option value='EG' >Egypt</option>
							            <option value='SV' >El Salvador</option>
							            <option value='GQ' >Equatorial Guinea</option>
							            <option value='EE' >Estonia</option>
						    	        <option value='ET' >Ethiopia</option>
						        	    <option value='FK' >Falkland Islands</option>
						            	<option value='FO' >Faroe Islands</option>
						              	<option value='FJ' >Fiji</option>
						              	<option value='FI' >Finland</option>
						              	<option value='SU' >Former USSR</option>
						              	<option value='FR' >France</option>
						              	<option value='GF' >French Guyana</option>
						              	<option value='TF' >French Southern Territories</option>
						              	<option value='GA' >Gabon</option>
						              	<option value='GM' >Gambia</option>
						              	<option value='GE' >Georgia</option>
						              	<option value='DE' >Germany</option>
						              	<option value='GH' >Ghana</option>
						              	<option value='GI' >Gibraltar</option>
						              	<option value='GB' >Great Britain/UK</option>
						              	<option value='GR' >Greece</option>
						              	<option value='GL' >Greenland</option>
						              	<option value='GD' >Grenada</option>
						              	<option value='GP' >Guadeloupe (French)</option>
						              	<option value='GU' >Guam (USA)</option>
						              	<option value='GT' >Guatemala</option>
						              	<option value='GN' >Guinea</option>
						              	<option value='GW' >Guinea Bissau</option>
						              	<option value='GY' >Guyana</option>
						              	<option value='HT' >Haiti</option>
						              	<option value='HM' >Heard &amp; McDonald Islands</option>
						              	<option value='HN' >Honduras</option>
						              	<option value='HK' >Hong Kong</option>
						              	<option value='HU' >Hungary</option>
						              	<option value='IS' >Iceland</option>
						              	<option value='IN' >India</option>
						              	<option value='ID' >Indonesia</option>
						              	<option value='IR' >Iran</option>
						              	<option value='IQ' >Iraq</option>
						              	<option value='IE' >Ireland</option>
						              	<option value='IL' >Israel</option>
						              	<option value='IT' >Italy</option>
						              	<option value='CI' >Ivory Coast</option>
						              	<option value='JM' >Jamaica</option>
						              	<option value='JP' >Japan</option>
						              	<option value='JO' >Jordan</option>
						              	<option value='KZ' >Kazakhstan</option>
						              	<option value='KE' >Kenya</option>
						              	<option value='KI' >Kiribati</option>
						              	<option value='KW' >Kuwait</option>
						              	<option value='KG' >Kyrgyzstan</option>
						              	<option value='LA' >Laos</option>
						              	<option value='LV' >Latvia</option>
						              	<option value='LB' >Lebanon</option>
						              	<option value='LS' >Lesotho</option>
						              	<option value='LR' >Liberia</option>
						              	<option value='LY' >Libya</option>
						              	<option value='LI' >Liechtenstein</option>
						              	<option value='LT' >Lithuania</option>
						              	<option value='LU' >Luxembourg</option>
						              	<option value='MO' >Macau</option>
						              	<option value='MK' >Macedonia</option>
						              	<option value='MG' >Madagascar</option>
						              	<option value='MW' >Malawi</option>
						             	<option value='MY' >Malaysia</option>
						              	<option value='MV' >Maldives</option>
						             	<option value='ML' >Mali</option>
						              	<option value='MT' >Malta</option>
						             	<option value='MH' >Marshall Islands</option>
						              	<option value='MQ' >Martinique</option>
						              	<option value='MR' >Mauritania</option>
						              	<option value='MU' >Mauritius</option>
						              	<option value='YT' >Mayotte</option>
						              	<option value='MX' >Mexico</option>
						              	<option value='FM' >Micronesia</option>
						              	<option value='MD' >Moldavia</option>
						              	<option value='MC' >Monaco</option>
						              	<option value='MN' >Mongolia</option>
						              	<option value='MS' >Montserrat</option>
						              	<option value='MA' >Morocco</option>
						              	<option value='MZ' >Mozambique</option>
						              	<option value='MM' >Myanmar</option>
						              	<option value='NA' >Namibia</option>
						              	<option value='NR' >Nauru</option>
						              	<option value='NP' >Nepal</option>
						              	<option value='NL' >Netherlands</option>
						              	<option value='AN' >Netherlands Antillas</option>
						              	<option value='NT' >Neutral Zone</option>
						              	<option value='NC' >New Caledonia</option>
						              	<option value='NZ' >New Zealand</option>
						              	<option value='NI' >Nicaragua</option>
						             	<option value='NE' >Niger</option>
						              	<option value='NG' >Nigeria</option>
						              	<option value='NU' >Niue</option>
						              	<option value='NF' >Norfolk Island</option>
						              	<option value='KP' >North Corea</option>
						              	<option value='MP' >Northern Mariana Islands</option>
						              	<option value='NO' >Norway</option>
						              	<option value='OM' >Oman</option>
						              	<option value='PK' >Pakistan</option>
						              	<option value='PW' >Palau</option>
						              	<option value='PA' >Panama</option>
						              	<option value='PG' >Papua New Guinea</option>
						              	<option value='PY' >Paraguay</option>
						              	<option value='PE' >Peru</option>
						              	<option value='PH' >Philippines</option>
						              	<option value='PN' >Pitcairn Island</option>
						              	<option value='PL' >Poland</option>
						              	<option value='PF' >Polynesia</option>
						              	<option value='PT' >Portugal</option>
						              	<option value='PR' >Puerto Rico</option>
						              	<option value='QA' >Qatar</option>
						              	<option value='RE' >Reunion</option>
						              	<option value='RO' >Romania</option>
						              	<option value='RU' >Russian Federation</option>
						              	<option value='RW' >Rwanda</option>
						              	<option value='GS' >S. Georgia Is. </option>
						              	<option value='SH' >Saint Helena</option>
						              	<option value='KN' >Saint Kitts &amp; Nevis Anguilla</option>
						              	<option value='LC' >Saint Lucia</option>
						              	<option value='PM' >Saint Pierre and Miquelon</option>
						              	<option value='ST' >Saint Tome and Principe</option>
						              	<option value='VC' >Saint Vicent &amp; Grenadines</option>
						              	<option value='WS' >Samoa</option>
						              	<option value='SM' >San Marino</option>
						              	<option value='SA' >Saudi Arabia</option>
						              	<option value='SN' >Senegal</option>
						              	<option value='SC' >Seychelles</option>
						              	<option value='SL' >Sierra Leone</option>
						              	<option value='SG' >Singapore</option>
						              	<option value='SK' >Slovak Republic</option>
						              	<option value='SI' >Slovenia</option>
						              	<option value='SB' >Solomon Islands</option>
						              	<option value='SO' >Somalia</option>
						              	<option value='ZA' >South Africa</option>
						              	<option value='KR' >South Corea</option>
						              	<option value='ES' >Spain</option>
						              	<option value='LK' >Sri Lanka</option>
						              	<option value='SD' >Sudan</option>
						              	<option value='SR' >Suriname</option>
						              	<option value='SJ' >Svalvard &amp; Jan Mayen Is.</option>
						              	<option value='SZ' >Swaziland</option>
						              	<option value='SE' >Sweden</option>
						              	<option value='CH' >Switzerland</option>
						              	<option value='SY' >Syria</option>
						              	<option value='TJ' >Tadjikistan</option>
						              	<option value='TW' >Taiwan</option>
						              	<option value='TZ' >Tanzania</option>
						              	<option value='TH' >Thailand</option>
						              	<option value='TG' >Togo</option>
						              	<option value='TK' >Tokelau</option>
						              	<option value='TO' >Tonga</option>
						              	<option value='TT' >Trinidad and Tobago</option>
						              	<option value='TN' >Tunisia</option>
						              	<option value='TR' >Turkey</option>
						              	<option value='TM' >Turkmenistan</option>
						              	<option value='TC' >Turks and Caicos Islands</option>
						              	<option value='TV' >Tuvalu</option>
						              	<option value='UG' >Uganda</option>
						              	<option value='UA' >Ukraine</option>
						              	<option value='AE' >United Arab Emirates</option>
						              	<option value='US' >United States</option>
						              	<option value='UY' >Uruguay</option>
						              	<option value='MI' >USA Military</option>
						              	<option value='UM' >USA Minor Outlying Islands</option>
						              	<option value='UZ' >Uzbekistan</option>
						              	<option value='VU' >Vanuatu</option>
						              	<option value='VA' >Vatican City State</option>
						              	<option value='VE' >Venezuela</option>
						              	<option value='VN' >Vietnam</option>
						              	<option value='VG' >Virgin Islands (British)</option>
						              	<option value='VI' >Virgin Islands (USA)</option>
						              	<option value='WF' >Wallis and Futura Islands</option>
						              	<option value='EH' >Western Sahara</option>
						              	<option value='YE' >Yemen</option>
						              	<option value='YU' >Yugoslavia</option>
						              	<option value='ZR' >Zaire</option>
						              	<option value='ZM' >Zambia</option>
						              	<option value='ZW' >Zimbabwe</option>
			      					</select>
								</div>
								<div class='form-group col-xs-12 col-sm-6 col-md-6'>
									<label class='form-control-label' for='telefono'>".$_GLOBALS['reserva-clubestrella-numero']."</label>
									<input type='text' class='form-control' id='telefono' name='telefono' placeholder='Teléfono'>
								</div>
							
								<div class='form-group col-xs-12 col-sm-12 col-md-12'>
								    <label for='comentarios'>".$_GLOBALS['reserva-clubestrella-comments']."</label>
								    <textarea class='form-control' id='comentarios' name='comentarios' rows='3'></textarea>

								    <input type='text' class='invisible noPublic' id='dateTo' name='dateTo' value='".$dateTo."'>
									<input type='text' class='invisible noPublic' id='dateFrom' name='dateFrom' value='".$dateFrom."'>
									<input type='text' class='invisible noPublic' id='idRoom' name='idRoom' value='".$cuarto->getIdr()."'>
									<input type='text' class='invisible noPublic' id='rooms' name='rooms' value='".$rooms."'>
									<input type='text' class='invisible noPublic' id='adults' name='adults' value='".$jsonAdults."'>
									<input type='text' class='invisible noPublic' id='kids' name='kids' value='".$jsonKids."'>
									<input type='number' class='invisible noPublic' name='isActive' value='1' readonly>
									<input type='text' class='invisible noPublic' name='service_name' value='web' readonly>
								</div>

								<div class='form-check col-xs-12 col-sm-12 col-md-12'>
								  <label class='form-check-label'>
								    <input class='form-check-input' type='checkbox' value='1' name='terms'>
								    ".$_GLOBALS['reserva-terms']."
								  </label>
								  <p>".$_GLOBALS['reserva-terms-2']."</p>
								</div>

								
								<div class='form-check col-xs-6 col-sm-3 col-md-3'>
								  <label class='form-check-label equals' id='pagoPaypal'>
								    <input class='form-check-input equals' type='radio' name='metodoPago' id='metodoPago2' value='paypal'>
								  </label>
								  <img src='../../img/metodoPago/pagapaypal.png' alt='Paypal' class='img-fluid equals'>
								</div>";

					$today = date("Y-m-d");
					$date1=date_create($today);
					$date2=date_create($dateTo);
					$diff=date_diff($date1,$date2);
					if ($diff->format('%d')>2) {//en caso de que la reserva sea mayor de 2 dias apartir de hoy se habilita deposito bancario
						echo'

								<div class="form-check col-xs-6 col-sm-3 col-md-3">
								  <label class="form-check-label equals" id="pagoBancario">
								    <input class="form-check-input equals" type="radio" name="metodoPago" id="metodoPago3" value="pagoBancario">
								  </label>
								  <p class="equals" style="text-align: center;margin-bottom: 0px;">Depósito Bancario</p>
								  <p style="text-align: center;">'.$_GLOBALS['reserva-pay-bank'].'</p>
								</div>
							';
					}
					if ($pagoDestino == 0) {
						if ($cuarto->getIdr()==3) {
						echo'   <div class="form-check col-xs-6 col-sm-3 col-md-3"></div>';
						}
						else{

						echo'
								<div class="form-check col-xs-6 col-sm-3 col-md-3">
								  <label class="form-check-label equals" id="pagoHotel">
								    <input class="form-check-input equals" type="radio" name="metodoPago" id="exampleRadios4" value="pagoHotel">
								  </label>
								  <p class="equals" style="text-align: center;">'.$_GLOBALS['reserva-pay-hotel'].'</p>
								</div>	
						';
						}
					}
					else{
						echo'	<div class="form-check col-xs-6 col-sm-3 col-md-3"></div>';
					}

						echo'
								<div class="form-group col-xs-12 col-sm-12 col-md-12">
									<button type="submit" class="btn btn-primary" name="enviar">'.$_GLOBALS['reserva-pay-button'].'</button>
								</div>
							</div>
						</form>
					';
				}//fin del else
				
			?>
			
		</div>
	</div>

</section>
<!-- Modal Clubestrella user -->
<div class="modal fade" id="soyMiembro" tabindex="-1" role="dialog" aria-labelledby="SoyMiembro" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="SoyMiembro"><?php echo $_GLOBALS['reserva-clubestrella-sesion']; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="oldMember" method="POST" action="">
				<div class="modal-body">
					<div class="form-group">
						<label for="correo"><?php echo $_GLOBALS['reserva-clubestrella-email']; ?></label>
						<input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" placeholder="Enter email" required>
						<small id="emailHelp" class="form-text text-muted"><?php echo $_GLOBALS['reserva-clubestrella-email-label']; ?></small>
					</div>
					<div class="form-group">
						<label for="security"><?php echo $_GLOBALS['reserva-clubestrella-password']; ?></label>
						<input type="password" class="form-control" id="security" name="security" placeholder="Password" required>
					</div>
					<div class="form-group alert alert-danger invisible" role="alert" id="boxDanger" style="text-align: center;">
						<p id="messageD" style="margin-bottom: 0px;"></p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" id="ingresarUser"><?php echo $_GLOBALS['reserva-clubestrella-login']; ?></button>
					<div id="loading2" class="invisible">
						<img src="../../img/loading.gif" alt="loading..."  style="width: 60px; float: right;">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Clubestrella registro -->
<div class="modal fade" id="newMember" tabindex="-1" role="dialog" aria-labelledby="NewMember" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="NewMember"><?php echo $_GLOBALS['reserva-clubestrella-signup']; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="newUser" method="POST" action="">
				<div class="modal-body" id="registroBody">
					<div class="form-row" id="whenyouGone">	
						<div class="form-group col-xs-12 col-sm-6 col-md-6">
							<label class="form-control-label" for="username"><?php echo $_GLOBALS['reserva-clubestrella-apodo']; ?></label>
							<input type="text" class="form-control" id="username" placeholder="Username" name="username">
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6">
							<label class="form-control-label" for="nombre"><?php echo $_GLOBALS['reserva-clubestrella-name']; ?></label>
							<input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6">
							<label class="form-control-label" for="apellidoP"><?php echo $_GLOBALS['reserva-clubestrella-lastname']; ?></label>
							<input type="text" class="form-control" id="apellidoP" placeholder="Another input" name="apellidoP">
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6">
							<label class="form-control-label" for="apellidoM"><?php echo $_GLOBALS['reserva-clubestrella-lastname']; ?></label>
							<input type="text" class="form-control" id="apellidoM" placeholder="Another input" name="apellidoM">
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6">
							<label for="email"><?php echo $_GLOBALS['reserva-clubestrella-email']; ?></label>
							<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
							<!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6">
							<label class="form-control-label" for="empresa"><?php echo $_GLOBALS['reserva-clubestrella-company']; ?></label>
							<input type="text" class="form-control" id="empresa" placeholder="Another input" name="empresa">
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6">
							<label for="password2"><?php echo $_GLOBALS['reserva-clubestrella-password']; ?></label>
							<input type="password" class="form-control" id="password2" name="password2" placeholder="Password" required>
							<button type="button" id="eye">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</button>
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6">
							<label for="contraseña"><?php echo $_GLOBALS['reserva-clubestrella-password-confirm']; ?></label>
							<input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Password" required>
							<button type="button" id="eye2">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</button>
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6">
							<label class="form-control-label" for="telefono"><?php echo $_GLOBALS['reserva-clubestrella-phone']; ?></label>
							<input type="text" class="form-control" id="telefono" placeholder="Another input" name="telefono">
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6">
							<label class="form-control-label" for="pais"><?php echo $_GLOBALS['reserva-clubestrella-country']; ?></label>
							<input type="text" class="form-control" id="pais" placeholder="Another input" name="pais">
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6">
							<label class="form-control-label" for="ciudad"><?php echo $_GLOBALS['reserva-clubestrella-city']; ?></label>
							<input type="text" class="form-control" id="ciudad" placeholder="Another input" name="ciudad">
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6">
							<label class="form-control-label" for="estado"><?php echo $_GLOBALS['reserva-clubestrella-state']; ?></label>
							<input type="text" class="form-control" id="estado" placeholder="Another input" name="estado">
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6">
							<label class="form-control-label" for="codigoPostal"><?php echo $_GLOBALS['reserva-clubestrella-cp']; ?></label>
							<input type="text" class="form-control" id="codigoPostal" placeholder="Another input" name="codigoPostal">
						</div>
						<div class="form-group col-xs-12 col-sm-6 col-md-6">
							<label class="form-control-label" for="direccion"><?php echo $_GLOBALS['reserva-clubestrella-address']; ?></label>
							<input type="text" class="form-control" id="direccion" placeholder="Another input" name="direccion">
						</div>
						<div class="form-group alert  invisible" role="alert" id="boxDanger2" style="text-align: center;margin-left: auto;margin-right: auto;">
							<p id="messageD2" style="margin-bottom: 0px;"></p>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" id="ingresarNew"><?php echo $_GLOBALS['reserva-clubestrella-login']; ?></button>
					<div id="loading3" class="invisible">
						<img src="../../img/loading.gif" alt="loading..."  style="width: 60px; float: right;">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Clubestrella recuperar Password  -->
<div class="modal fade" id="Passrecover" tabindex="-1" role="dialog" aria-labelledby="MemberPass" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="MemberPass"><?php echo $_GLOBALS['reserva-clubestrella-recover-text']; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="recoverPass" method="POST" action="">
				<div class="modal-body">
					<div class="form-group">
						<label for="correoPass"><?php echo $_GLOBALS['reserva-clubestrella-email']; ?></label>
						<input type="email" class="form-control" id="correoPass" name="correoPass" aria-describedby="emailHelp" placeholder="Enter email" required>
						<small id="emailHelp" class="form-text text-muted"><?php echo $_GLOBALS['reserva-clubestrella-email-label']; ?></small>
					</div>

					<div class="form-group alert invisible" role="alert" id="boxDanger3" style="text-align: center;">
						<p id="messageD3" style="margin-bottom: 0px;"></p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" id="ingresar"><?php echo $_GLOBALS['reserva-clubestrella-login']; ?></button>
					<div id="loading" class="invisible">
						<img src="../../img/loading.gif" alt="loading..."  style="width: 60px; float: right;">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include "../../partial_views/footer.php"; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/scrollreveal.min.js"></script>
<script type="text/javascript" src="../../js/moment/moment.min.js"></script>
<script type="text/javascript" src="../../js/moment/locale/es.js"></script>
<script type="text/javascript" src="../../js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="../../js/jquery.validate.js"></script>


<script type="text/javascript">
	// JavaScript
	window.sr = ScrollReveal({ reset: true });
	// Customizing a reveal set
	sr.reveal('.view_360', { duration: 2000,delay:2,useDelay: 'always',mobile: true });

    $(document).ready(function(){

        $('#startDate').datetimepicker({
          format: 'YYYY-MM-DD'
        });

        $('#endDate').datetimepicker({
          format: 'YYYY-MM-DD',
          useCurrent: false //Important! See issue #1075
        });

        $("#startDate").on("dp.change", function (e) {
            $('#endDate').data("DateTimePicker").minDate(e.date);
        });

        /* Restricciones modal OldMember Clubestrella */
        $("#oldMember").validate({

        	rules: {
		            correo: { required:true, email: true},
		            security: { required:true, minlength: 3},   
		     },
	        messages: {
	            correo : "Debe introducir un email válido.",
	            security: "Introducir password.",
	        },
	        submitHandler: function(form){
	            var dataString = 'correo='+$('#correo').val()+'&security='+$('#security').val();
	            $.ajax({
	                type: "POST",
	                url:"../../controllers/loginController.php",
	                data: dataString,
	                beforeSend: function(){
						$("#ingresarUser").addClass("invisible");
						$("#loading2").removeClass("invisible");
					},
	                success: function(data){
	                	
	                	if (data==1) {

	                		window.location.reload();
	                	}
	                	else if (data==2) {

	                		$("#ingresarUser").removeClass("invisible");
							$("#loading2").addClass("invisible");
	                		$('#boxDanger').removeClass("invisible");
	                		$('#messageD').append("Email/Password incorrectos");
	                	}
	                   	
	                }
	            });
	        }
		});

        /* Restricciones modal recoverPass Clubestrella */
        $("#recoverPass").validate({

        	rules: {
		            correoPass: { required:true, email: true},   
		     },
	        messages: {
	            correoPass : "Debe introducir un email válido.",
	        },
	        submitHandler: function(form){

	            $.ajax({
	                type: "POST",
	                url:"../../controllers/recoverPassController.php",
	                data: $(form).serialize(),
	                beforeSend: function(){
						$("#ingresar").addClass("invisible");
						$("#loading").removeClass("invisible");
					},
	                success: function(data){
	                	console.log(data);
	                	if (data==1) {

	                		$("#ingresar").removeClass("invisible");
							$("#loading").addClass("invisible");
	                		$('#boxDanger3').removeClass("alert-danger");
	                		$('#messageD3').html("");
	                		$('#boxDanger3').addClass("alert-success");
	                		$('#boxDanger3').removeClass("invisible");
	                		$('#messageD3').append("Se ha enviado un email a tu correo!!");
	                	}
	                	else{

	                		$("#ingresar").removeClass("invisible");
							$("#loading").addClass("invisible");
	                		$('#boxDanger3').removeClass("alert-success");
	                		$('#messageD3').html("");
	                		$('#boxDanger3').addClass("alert-danger");
	                		$('#boxDanger3').removeClass("invisible");
	                		$('#messageD3').append("Email no se encuentra registrado en Clubestrella");
	                	}
	                   	
	                }
	            });
	        }
		});

		/* Restricciones para newMember Clubestrella */
		$("#newUser").validate({

        	rules: {
	            email: { required:true, email: true},
	            password2: { required:true, minlength: 3},   
	            contraseña: { required:true, minlength: 3, equalTo: "#password2"},   
	            nombre: { required:true, minlength: 3},   
	            apellidoP: { required:true, minlength: 3},   
	            apellidoM: { required:true, minlength: 3},   
	            username: { required:true, minlength: 3},   
	            empresa: { required:true, minlength: 3},   
	            telefono: { required:true, minlength: 3},   
	            pais: { required:true},   
	            ciudad: { required:true, minlength: 3},   
	            estado: { required:true, minlength: 3},   
	            codigoPostal: { required:true, minlength: 3},   
	            direccion: { required:true, minlength: 3},   
		     },
	        messages: {
	            email : "Debe introducir un email válido.",
	            password2: "Introducir password.",
	            contraseña: "Passwords no coinciden.",
	            nombre: "Introducir tu nombre.",
	            apellidoP: "Introducir tu apellido paterno.",
	            apellidoM: "Introducir tu apellido materno.",
	            username: "Introducir tu username.",
	            empresa: "Introducir tu empresa.",
	            telefono: "Introducir tu número de contacto.",
	            pais: "Introducir tu país.",
	            ciudad: "Introducir tu ciudad.",
	            estado: "Introducir tu estado.",
	            codigoPostal: "Introducir tu Código Postal.",
	            direccion: "Introducir tu dirección.",
	        },
	        submitHandler: function(form){

	            $.ajax({
	                type: "POST",
	                url:"../../controllers/registroController.php",
	                data: $(form).serialize(),
	                beforeSend: function(){
						$("#ingresarNew").addClass("invisible");
						$("#loading3").removeClass("invisible");
					},
	                success: function(data){
	                	
	                	var object = JSON.parse(data);
	                	if (object.type == "error") {

	                		$("#ingresarNew").removeClass("invisible");
							$("#loading3").addClass("invisible");

	                		$('#boxDanger2').removeClass("invisible");
	                		$('#boxDanger2').removeClass("alert-success");
	                		$('#boxDanger2').removeClass("alert-danger");
	                		$('#boxDanger2').addClass("alert-danger");
	                		$('#messageD2').html("");
	                		$('#messageD2').append(object.message);
	                	}
	                	else if(object.type == "success"){

	                		$("#ingresarNew").removeClass("invisible");
							$("#loading3").addClass("invisible");

	                		$('#boxDanger2').removeClass("invisible");
	                		$('#boxDanger2').removeClass("alert-danger");
	                		$('#boxDanger2').removeClass("alert-success");
	                		$('#boxDanger2').addClass("alert-success");
	                		$('#messageD2').html("");
	                		$('#messageD2').append(object.message);
	                	}
	          	
	                }
	            });
	        }
		});

		/* Restricciones para formulario SinClubestrella */
		$("#sinClubestrella").validate({

        	rules: {
	            nombre: { required:true, minlength: 3},
	            apellido: { required:true, minlength: 3},
	            email: { required:true, email: true},
	            confirmEmail: { equalTo: "#email"}, 
	            ciudad: { required:true, minlength: 3},   
	            estado: { required:true, minlength: 3},
	            pais: { required:true},   
	            telefono: { required:true, minlength: 3},
	            terms: { required:true},
	            metodoPago: { required:true},
		     },
	        messages: {
	        	nombre: "Introducir tu nombre.",
	        	apellido: "Introducir tu apellido.",
	            email : "Debe introducir un email válido.",
	            confirmEmail : "Debe introducir un email válido.",
	            ciudad: "Introducir tu ciudad.",
	            estado: "Introducir tu estado.",
	            pais: "Introducir tu país.",
	            telefono: "Introducir tu número de contacto.",
	            terms: "Debe aceptar terminos y condiciones para reservar.",
	            metodoPago: "Seleccione su metodo de Pago.",
	        }
		});


		$("#conClubestrella").validate({

        	rules: {
	            nombre: { required:true, minlength: 3},
	            apellido: { required:true, minlength: 3},
	            email: { required:true, email: true},
	            confirmEmail: { equalTo: "#emailClub"}, 
	            ciudad: { required:true, minlength: 3},   
	            estado: { required:true, minlength: 3},
	            pais: { required:true},   
	            telefono: { required:true, minlength: 3},
	            terms: { required:true},
	            metodoPago: { required:true},
		     },
	        messages: {
	        	nombre: "Introducir tu nombre.",
	        	apellido: "Introducir tu apellido.",
	            email : "Debe introducir un email válido.",
	            confirmEmail : "Debe introducir un email válido.",
	            ciudad: "Introducir tu ciudad.",
	            estado: "Introducir tu estado.",
	            pais: "Introducir tu país.",
	            telefono: "Introducir tu número de contacto.",
	            terms: "Debe aceptar terminos y condiciones para reservar.",
	            metodoPago: "Seleccione su metodo de Pago.",
	        }
		});


		function show() {
		    var p = document.getElementById('password2');
		    p.setAttribute('type', 'text');
		}

		function hide() {
		    var p = document.getElementById('password2');
		    p.setAttribute('type', 'password');
		}

		var pwShown = 0;

		document.getElementById("eye").addEventListener("click", function () {
		    if (pwShown == 0) {
		        pwShown = 1;
		        show();
		    } else {
		        pwShown = 0;
		        hide();
		    }
		}, false);

		function show2() {
		    var p = document.getElementById('contraseña');
		    p.setAttribute('type', 'text');
		}

		function hide2() {
		    var p = document.getElementById('contraseña');
		    p.setAttribute('type', 'password');
		}

		var pwShown2 = 0;

		document.getElementById("eye2").addEventListener("click", function () {
		    if (pwShown2 == 0) {
		        pwShown2 = 1;
		        show2();
		    } else {
		        pwShown2 = 0;
		        hide2();
		    }
		}, false);

	});


</script>


</body>
</html>