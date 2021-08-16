<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reservation Adhara Cancún</title>
	<link rel="icon" type="image/png" href="img/items/star.png" />

	<link rel="stylesheet" href="css/font-awesome/css/all.min.css">
	<link rel="stylesheet" href="css/jqueryUI/jquery-ui.min.css">

	<link rel="stylesheet" href="css/booty.min.css">
	<link rel="stylesheet" href="css/site.min.css">
	<!-- Estilos Seccion de reservas -->
	<link rel="stylesheet" href="css/reservation.min.css">

	<!-- Google icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<!-- menu mobile -->
	<link rel="stylesheet" href="css/offsidejs/offside.min.css">
	<link rel="stylesheet" href="css/offsidejs/demo.min.css">

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/cookie/js.cookie.js"></script>
	<script type="text/javascript" src="js/lang.js"></script>

	<!-- hover animation navbar -->
	<link rel="stylesheet" type="text/css" href="css/hover/default.min.css" />
	<link rel="stylesheet" type="text/css" href="css/hover/component.min.css" />
	<script src="/js/hover/modernizr.custom.js"></script>
	

</head>
<body style="background-image: url('/img/background.png');">

	<?php include "lang/languaje.php"; ?>	

	<!-- Navbar mobile -->
    <?php include "views/partial_views/_navbar_mobile.php"; ?>

	<!-- Redes Sociales -->
	<!-- <?php include "views/partial_views/_redes.php"; ?> -->

	<div id="general">
		<!-- Navbar -->
		<?php include "views/partial_views/_navbar.php"; ?>
		
		<div class="container" id="reserva-container">
			
			<div  id="wrapper-content" style="padding-top: 35px;color: black;">
				<!-- Categoria de Habitaciones 1: Solo Habitacion, 2: Habitacion Superior, 3: Habitacion Ejecutiva -->
				<div class="container" id="room-section">
					<div class="row" style="margin:0px;">
						<div class="col-xs-12 col-sm-6 col-md-6 almost-padd">
							<table id="resume-room">
								<tr>
									<td>
										<img src="<?php echo $room->img; ?>.png" alt="<?php echo $room->nombre ?>" style="width: 160px;">
									</td>
									<td style="padding-left: 6px;">
										<p><?php echo ($_COOKIE['lang'] == "en") ? $room->name : $room->nombre;  ?></p>
										<?php 
											$i = 1;
											$aux = 0;
											$adults = json_decode($_POST['adults']);
											$kids = json_decode($_POST['kids']);
											while($i<=$_POST['rooms']){
												echo "<p>".$_GLOBALS['reserva-rooms']." ".$i.": ".$_GLOBALS['reserva-adults']." ".$adults[$aux]."/ ".$_GLOBALS['reserva-kids']." ".$kids[$aux]."</p>";
												//echo "<br>";
												$aux++;
												$i++;
											}
										?>
										<p style="margin-bottom: 0px;"><?php echo $_GLOBALS['reserva-nights']." ".$room->noches; ?></p>
									</td>
								</tr>
							</table>
							<p><?php echo $_GLOBALS['reserva-text']." ".$mesStart."-".$diaStart."-".$añoStart; ?><br> <?php echo $_GLOBALS['reserva-text-4']." ".$mesEnd."-".$diaEnd."-".$añoEnd; ?></p>
							
							<p><?php echo $_GLOBALS['reserva-total-pay']." $ <span id='price-room'>".number_format(round($price), 0, '.', ',')."</span> ".$_GLOBALS['reserva-currency']; ?> &nbsp;&nbsp;<strong><?php echo $_GLOBALS['reserva-include-tax']; ?></strong></p>
							<!-- <p><i class='material-icons' style='color:red;font-size: 18px;margin-right: 10px;'>local_offer</i>Promoción vigente: <strong><?php echo $_GLOBALS['quick-offer']; ?></strong></p>
							<p style="font-size: 12px;margin-bottom: 5px;">El canje de desayunos se hace valido en recepción mostrando comprobante de la reservacion.</p>
							<p style="font-size: 12px;margin-top: 5px;">Apartir de la tercer persona el desayuno tendrá un costo.Válido hasta agotar existencias.</p> -->
							
							

							
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 nopadd" style="text-align: center;">
							<p> <img src="img/clubestrella/logo.png" alt="Club Estrella" style="width: 60px;margin-right: 10px;">
								<?php echo (isset($_SESSION['cliente'])) ? $_GLOBALS['clubestrella-welcome'].$_SESSION['cliente']->getNombre() : $_GLOBALS['clubestrella-label']; ?>
							</p>
							<?php 

								if(isset($_SESSION['cliente'])){
									
									echo '<form action="/clubestrella/logoff" method="POST" id="logoff">
											<input type="hidden" name="clientEmail" id="clientEmail" value="'.$_SESSION['cliente']->getEmail().'">
											<button type="submit" class="btn"><i class="fas fa-sign-out-alt"></i> '.$_GLOBALS['reserva-clubestrella-logoff'].'.</button>
											<div class="alert alert-danger" role="alert" id="alert-log" style="width:300px;display:none;margin:0px auto;"></div>
										</form>';
								}
								else{
									echo '<ul id="club-stuff">
											<li>
												<a href="#" data-toggle="modal" data-target="#soyMiembro">
													<img src="img/clubestrella/member.png" alt="Soy usuario"> 
													<p>'.$_GLOBALS['reserva-clubestrella-member'].'</p>
												</a>
											</li>
											<li>
												<a href="#" data-toggle="modal" data-target="#newMember">
													<img src="img/clubestrella/newmember.png" alt="Nuevo usuario">
													<p>'.$_GLOBALS['reserva-clubestrella-new-member'].'</p>
												</a>
											</li>
											<li>
												<a href="#" data-toggle="modal" data-target=#pass-recover>
													<img src="img/clubestrella/password.png" alt="Recuperar contraseña">
													<p>'.$_GLOBALS['reserva-clubestrella-recover'].'</p>
												</a>
											</li>
										</ul>';
								}
							?>
							
						</div>

						<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 25px;">
							<form action="/reservas/booking" method="POST" id="set-reserv">
								<div class="row" style="margin:0px;">
									<div class="row col-xs-12 col-sm-6 col-md-6" style="margin-right: 0px;margin-left: 0px;padding-left: 0px;">
										<label for="name"><?php echo $_GLOBALS['reserva-clubestrella-name'] ?></label>
										<div class="input-group ">
											<input type="text" class="form-control" id="name" name="name" value="<?php echo (isset($_SESSION['cliente'])) ? $_SESSION['cliente']->getNombre() : "";?>">
										</div>
										<label for="email"><?php echo $_GLOBALS['reserva-clubestrella-email'] ?></label>
										<div class="input-group">
											<input type="email" class="form-control" id="email" name="email" value="<?php echo (isset($_SESSION['cliente'])) ? $_SESSION['cliente']->getEmail() : "";?>">
										</div>
										<label for="city"><?php echo $_GLOBALS['reserva-clubestrella-city'] ?></label>
										<div class="input-group">
											<input type="text" class="form-control" id="city" name="city" value="<?php echo (isset($_SESSION['cliente'])) ? $_SESSION['cliente']->getCiudad() : "";?>">
										</div>
										<label for="country"><?php echo $_GLOBALS['reserva-clubestrella-country'] ?></label>
										<div class="input-group">
											<input type="text" class="form-control" id="country" name="country" value="<?php echo (isset($_SESSION['cliente'])) ? $_SESSION['cliente']->getPais() : "";?>">
										</div>
									</div>
									<div class="row col-xs-12 col-sm-6 col-md-6" style="margin-right: 0px;margin-left: 0px; padding-left: 0px;">
										<label for="lastname"><?php echo $_GLOBALS['reserva-clubestrella-lastname'] ?></label>
										<div class="input-group ">
											<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo (isset($_SESSION['cliente'])) ? $_SESSION['cliente']->getApellidoPaterno() : "";?>">

											<label class="error" for="lastname"></label>
										</div>
										<label for="emailVerify"><?php echo $_GLOBALS['reserva-clubestrella-email-confirm'] ?></label>
										<div class="input-group">
											<input type="email" class="form-control" id="emailVerify" name="emailVerify" value="<?php echo (isset($_SESSION['cliente'])) ? $_SESSION['cliente']->getEmail() : "";?>">
										</div>
										<label for="state"><?php echo $_GLOBALS['reserva-clubestrella-state'] ?></label>
										<div class="input-group">
											<input type="text" class="form-control" id="state" name="state" value="<?php echo (isset($_SESSION['cliente'])) ? $_SESSION['cliente']->getEstado() : "";?>">
										</div>
										<label for="phone"><?php echo $_GLOBALS['reserva-clubestrella-numero'] ?></label>
										<div class="input-group">
											<input type="text" class="form-control" id="phone" name="phone" value="<?php echo (isset($_SESSION['cliente'])) ? $_SESSION['cliente']->getTelefono() : "";?>">
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12" style="margin-right: 0px;margin-left: 0px;padding-left: 0px;">
										<label for="comments"><?php echo $_GLOBALS['reserva-clubestrella-comments'] ?></label>
										<div class="input-group">
											<textarea name="comments" id="comments" cols="30" rows="6" style="resize: none;" class="form-control"></textarea>
											<input type='hidden' id='dateTo' name='dateTo' value="<?php echo $_POST['dateTo']; ?>" readonly>
											<input type='hidden' id='dateFrom' name='dateFrom' value="<?php echo $_POST['dateFrom']; ?>" readonly>
											<input type='hidden' id='idRoom' name='idRoom' value="<?php echo $room->getIdr();?>" readonly>
											<input type='hidden' id='rooms' name='rooms' value='<?php echo $_POST['rooms']; ?>' readonly>
											<input type='hidden' id='adults' name='adults' value='<?php echo $_POST['adults']; ?>' readonly>
											<input type='hidden' id='kids' name='kids' value='<?php echo $_POST['kids']; ?>' readonly>
											<input type='hidden' name='isActive' value='1' readonly>
											<input type='hidden' name='service_name' value="<?php echo (isset($_SESSION['cliente'])) ? 'club' : 'web'; ?>" readonly>
											<input type="hidden" value="<?php echo $_SESSION['csrf_token']; ?>" readonly name="csrf_token">
										</div>
										<div class="input-group" style="margin-top: 10px;">
											<div class="input-group-prepend" style="width: 40px;">
												<input type="checkbox"  name='terms' aria-label="Checkbox for following text input" style="margin-top: 5px;margin-right: 10px;">
											</div>
											<span><?php echo $_GLOBALS['reserva-terms']; ?></span> <br>
											<span>* <?php echo $_GLOBALS['reserva-terms-2']; ?></span>
											<label for="terms" class="error"></label>
										</div>
									</div>
									<div class="col-xs-12 col-sm-3 col-md-3" style="text-align: center; margin-top: 15px;">
										<label for="payMethod" class="error"></label>
										<input type="radio" name="payMethod"  value="pagoSeguro">
										<img src="img/metodo_pago/tarjeta.png" alt="Pago Seguro" style="width: 100%;">
									</div>
									<div class="col-xs-12 col-sm-3 col-md-3" style="text-align: center; margin-top: 40px;">
										<input type="radio" name="payMethod"  value="paypal">
										<img src="img/metodo_pago/paypal.png" alt="" style="width: 160px;">
									</div>
									<?php 
										if($diff->format('%d')>2){
											echo '<div class="col-xs-12 col-sm-3 col-md-3" style="text-align: center; margin-top: 40px;">
													<input type="radio" name="payMethod"  value="deposito">
													<p style="margin-top: 15px;margin-bottom: 6px;">'.$_GLOBALS['reserva-pay-bank2'].'</p>
													<p style="margin-top: 0px;margin-bottom: 0px;">'.$_GLOBALS['reserva-pay-bank'].'</p>
												</div>';
										}
										if ($room->getPagoDestino() == 0) {
											if ($room->getIdr()==3) {
											echo'   <div class="form-check col-xs-6 col-sm-3 col-md-3"></div>';
											}
											else{

											echo'
												<div class="col-xs-12 col-sm-3 col-md-3" style="text-align: center; margin-top: 40px;">
													<input type="radio" name="payMethod"  value="pago_hotel">
													<p style="margin-top: 15px;margin-bottom: 6px;">'.$_GLOBALS['reserva-pay-hotel'].'</p>
												</div>';
											}
										}
										else{
											echo'<div class="form-check col-xs-6 col-sm-3 col-md-3"></div>';
										}
									?>
									<div class="form-group col-xs-12 col-sm-12 col-md-12">
										<button type="submit" class="btn" id="sendPayment" name="enviar"><?php echo $_GLOBALS['reserva-pay-button']; ?></button>
									</div>
									
								</div>
							</form>
						</div>
							
					</div>
				</div>
				
				
				<div id="wrapper_footer" style="margin-top: 100px;">
					<?php include "views/partial_views/_footer.php"; ?>
				</div>
			</div>
		</div>
	</div>
	 <!-- Site Overlay 
    <div class="site-overlay"></div>-->
	<!-- Preloading -->
	<!-- <?php include "views/partial_views/_preloading.php"; ?> -->

	<!-- Inicio de Sesión -->
	<div class="modal fade" id="soyMiembro" tabindex="-1" role="dialog" aria-labelledby="oldMemeberLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="oldMemeberLabel"><?php echo $_GLOBALS['reserva-clubestrella-sesion']; ?></h5>
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
						<button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $_GLOBALS['reserva-clubestrella-cancel'] ?></button>
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
	<div class="modal fade" id="newMember" tabindex="-1" role="dialog" aria-labelledby="newMemberLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newMemberLabel"><?php echo $_GLOBALS['reserva-clubestrella-signup']; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="newUser" method="POST" action="">
					<div class="modal-body" id="registroBody">
						<div class="form-row" id="whenyouGone">	
							<div class="form-group col-xs-12 col-sm-6 col-md-6">
								<label class="form-control-label" for="username"><?php echo $_GLOBALS['reserva-clubestrella-nickname']; ?></label>
								<input type="text" class="form-control" id="username" placeholder="Username" name="username">
							</div>
							<div class="form-group col-xs-12 col-sm-6 col-md-6">
								<label class="form-control-label" for="nombre"><?php echo $_GLOBALS['reserva-clubestrella-name']; ?></label>
								<input type="text" class="form-control" id="nombreR" placeholder="Nombre" name="nombre">
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
								<input type="email" class="form-control" id="emailR" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
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
								<input type="text" class="form-control" id="telefonoR" placeholder="Another input" name="telefono">
							</div>
							<div class="form-group col-xs-12 col-sm-6 col-md-6">
								<label class="form-control-label" for="pais"><?php echo $_GLOBALS['reserva-clubestrella-country']; ?></label>
								<input type="text" class="form-control" id="paisR" placeholder="Another input" name="pais">
							</div>
							<div class="form-group col-xs-12 col-sm-6 col-md-6">
								<label class="form-control-label" for="ciudad"><?php echo $_GLOBALS['reserva-clubestrella-city']; ?></label>
								<input type="text" class="form-control" id="ciudadR" placeholder="Another input" name="ciudad">
							</div>
							<div class="form-group col-xs-12 col-sm-6 col-md-6">
								<label class="form-control-label" for="estado"><?php echo $_GLOBALS['reserva-clubestrella-state']; ?></label>
								<input type="text" class="form-control" id="estadoR" placeholder="Another input" name="estado">
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
						<button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $_GLOBALS['reserva-clubestrella-cancel'] ?></button>
						<button type="submit" class="btn btn-primary" id="ingresarNew"><?php echo $_GLOBALS['reserva-clubestrella-login2']; ?></button>
						<div id="loading3" class="invisible">
							<img src="../../img/loading.gif" alt="loading..."  style="width: 60px; float: right;">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Clubestrella recuperar Password  -->
	<div class="modal fade" id="pass-recover" tabindex="-1" role="dialog" aria-labelledby="pass-recover-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="pass-recover-label"><?php echo $_GLOBALS['reserva-clubestrella-recover-text']; ?></h5>
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
						<button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $_GLOBALS['reserva-clubestrella-cancel'] ?></button>
						<button type="submit" class="btn btn-primary" id="ingresar"><?php echo $_GLOBALS['reserva-clubestrella-login3']; ?></button>
						<div id="loading" class="invisible">
							<img src="../../img/loading.gif" alt="loading..."  style="width: 60px; float: right;">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>

<script type="text/javascript" src="js/pooper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/moment/moment.min.js"></script>
<script type="text/javascript" src="js/moment/locale/es.js"></script>
<script type="text/javascript" src="/js/daterangepicker.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
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

		$("#logoff").validate({
		  	rules: {
		            clientEmail: { required:true, email: true}, 
		     },
	        messages: {
	            clientEmail : "Debe introducir un email válido.",
	        },
	        submitHandler: function(form){
	            //var dataString = 'correo='+$('#correo').val()+'&security='+$('#security').val();
	            $.ajax({
	                type: form.method,
	                url: form.action,
	                data: $(form).serialize(),
	                beforeSend: function(){

					},
	                success: function(data){
	                	console.log(data);
	                	var object = JSON.parse(data);
	                	if (object.type == "success") {

	                		window.location.reload();
	                	}
	                	else{

	                		$("#alert-log").html("");
	                		$("#alert-log").append(object.message);
	                	}
	                   	
	                }
	            });
	        }
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
	            //var dataString = 'correo='+$('#correo').val()+'&security='+$('#security').val();
	            $.ajax({
	                type: "POST",
	                url:"/clubestrella/login",
	                data: $(form).serialize(),
	                beforeSend: function(){
						$("#ingresarUser").addClass("invisible");
						$("#loading2").removeClass("invisible");
					},
	                success: function(data){
	                	//console.log(data);
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
	                url:"/clubestrella/recover",
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
	                url:"/clubestrella/register",
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

		//formulario de envio
		$("#set-reserv").validate({

        	rules: {
	            name: { required:true, minlength: 3},
	            lastname: { required:true, minlength: 3},
	            email: { required:true, email: true},
	            emailVerify: { equalTo: "#email"}, 
	            city: { required:true, minlength: 3},   
	            state: { required:true, minlength: 3},
	            country: { required:true},   
	            phone: { required:true, minlength: 3},
	            terms: { required:true},
	            payMethod: { required:true},
	            csrf_token: {required: true}
		     },
	        messages: {
	        	name: "Introducir tu nombre.",
	        	lastname: "Introducir tu apellido.",
	            email : "Debe introducir un email válido.",
	            emailVerify : "Los correos deben de coincidir.",
	            city: "Introducir tu ciudad.",
	            state: "Introducir tu estado.",
	            country: "Introducir tu país.",
	            phone: "Introducir tu número de contacto.",
	            terms: "Debe aceptar terminos y condiciones para reservar.",
	            payMethod: "Seleccione su metodo de Pago.",
	            csrf_token: "Error fatal"
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


</html>