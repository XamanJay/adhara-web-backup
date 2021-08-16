<?php 

class ReservasController{

	public $total;
	public $token;
	public $last_token;
	
	function __construct(){

		session_start();

		if(isset($_SESSION['csrf_token']))
			$this->last_token = $_SESSION['csrf_token'];

		else
			$this->last_token = "";


		$this->token = md5(uniqid(rand(), TRUE));
		$_SESSION['csrf_token'] = $this->token;

	}
	
	public function getIndex(){

		include ("views/404.php");
	}

	public function postIndex(){
		if($_POST){

			$hotelController = new hotelController();
			$semanaStart = $hotelController->convertDay($_POST['dateTo'],$_COOKIE['lang']);
			$mesStart = $hotelController->getMonth($_POST['dateTo'],$_COOKIE['lang']);
			$diaStart = $hotelController->getNumberDay($_POST['dateTo']);
			$añoStart = $hotelController->getYear($_POST['dateTo']);

			$semanaEnd = $hotelController->convertDay($_POST['dateFrom'],$_COOKIE['lang']);
			$mesEnd = $hotelController->getMonth($_POST['dateFrom'],$_COOKIE['lang']);
			$diaEnd = $hotelController->getNumberDay($_POST['dateFrom']);
			$añoEnd = $hotelController->getYear($_POST['dateFrom']);

			$today = date("Y-m-d");
			$date1=date_create($today);
			$date2=date_create($_POST['dateTo']);
			$diff=date_diff($date1,$date2);
			$price = 0;

			if (isset($_POST['csrf_token']) && $_POST['csrf_token'] == $this->last_token){
				$_SESSION['token_verify'] = $_POST['csrf_token'];

				$arrayAdults = json_decode($_POST['adults']);
				$arrayKids = json_decode($_POST['kids']);	
				$adult = 0;
				$kids = 0;
				for($i = 0; $i < $_POST['rooms']; $i++){
					$adult += $arrayAdults[$i];
					$kids += $arrayKids[$i];
				}

				

				$room = $hotelController->getRoom($_POST['idRoom'],$_POST['dateTo'],$_POST['dateFrom'],$_POST['rooms'],$arrayAdults,$arrayKids);
				$room = Img_room($room);

				$promocion = $hotelController->getPromocion($_POST['dateTo']);

				if($promocion != 0){

					$div = $promocion/100;
					if(isset($_SESSION['cliente'])){

						$plus_estrella = $room->clubestrella*$div;
						$price = $room->clubestrella - $plus_estrella;

					}else{

						$plus = $room->price*$div;
						$price = $room->price - $plus;
					}

				}else
					(isset($_SESSION['cliente'])) ? $price = $room->clubestrella : $price = $room->price;



				include ("views/Reservas/index.php");
			}
			else{

				if($_SESSION['token_verify'] == $_POST['csrf_token']){

					$arrayAdults = json_decode($_POST['adults']);
					$arrayKids = json_decode($_POST['kids']);	
					$adult = 0;
					$kids = 0;
					for($i = 0; $i < $_POST['rooms']; $i++){
						$adult += $arrayAdults[$i];
						$kids += $arrayKids[$i];
					}

					$room = $hotelController->getRoom($_POST['idRoom'],$_POST['dateTo'],$_POST['dateFrom'],$_POST['rooms'],$arrayAdults,$arrayKids);
					$room = Img_room($room);
					$promocion = $hotelController->getPromocion($_POST['dateTo']);

					if($promocion != 0){

						$div = $promocion/100;
						if(isset($_SESSION['cliente'])){

							$plus_estrella = $room->clubestrella*$div;
							$price = $room->clubestrella - $plus_estrella;

						}else{

							$plus = $room->price*$div;
							$price = $room->price - $plus;
						}

					}else
						(isset($_SESSION['cliente'])) ? $price = $room->clubestrella : $price = $room->price;

					include ("views/Reservas/index.php");
				}
			}

		}
		else{
			echo "Not of your bussiness";
		}
	}

	public function getBooking(){
		include "views/404.php";
	}

	public function postBooking(){
		if(isset($_POST)){
			
			$idHotel = 1; //id del Hotel Adhara Hacienda Cancún
			/*Estatus de una reserva
			Sin Confirmar : 1
			Pago Pendiente: 2
			Pagada: 3
			Declinada: 4
			Cancelada: 5*/
			$estatus = 1;
			$hotelController = new hotelController();
			$emailController = new emailController();
			$newAes = new AESCrypto();

			$nombreHotel= "Adhara Cancun";
			/*print_r($_POST);*/
			$nombre = trim($_POST['name']);
			$apellidos = trim($_POST['lastname']);
			$email = trim($_POST['email']);
			$ciudad = trim($_POST['city']);
			$estado = trim($_POST['state']);
			$pais = trim($_POST['country']);
			$telefono = trim($_POST['phone']);
			$isClub = TRUE;
			$dateTo = trim($_POST['dateTo']);
			$dateFrom = trim($_POST['dateFrom']);
			$idRoom = trim($_POST['idRoom']);
			$rooms = trim($_POST['rooms']);
			$arrayAdults = json_decode($_POST['adults']);
			$arrayKids = json_decode($_POST['kids']);
			$metodoPago = trim($_POST['payMethod']);
			($_COOKIE['lang'] == "es") ? $currency = "MXN" : $currency = "USD";
			$servicio = "hotel";
			$isDeleted = FALSE;
			$promotion = "Ninguna";

			$service = $hotelController->type_service($_POST['service_name'],$_POST['isActive']);


			$room = Room_booking($idRoom,$arrayAdults,$arrayKids,$dateTo,$dateFrom,$rooms);
			$promocion = $hotelController->getPromocion($_POST['dateTo']);


			//Información reserva
			$detalles = "<strong>Hotel:</strong>".$nombreHotel."<br />";
			$detalles = $detalles."<strong>Tipo de habitación: </strong>".$room['category_room']."<br>";
			$detalles = $detalles."<strong>Plan de alimentos: </strong>".$room['cuarto']->getNombre()."<br>";
			$detalles = $detalles."<strong>Fecha de llegada: </strong>". $dateTo."<br>";
			$detalles = $detalles."<strong>Fecha de salida: </strong>". $dateFrom."<br>";
			$detalles = $detalles."<strong>Hab. 1:</strong> ".$arrayAdults[0]." Adultos, ".$arrayKids[0]." Menores";

			if($rooms == 2){ // si son 2 cuartos
				$detalles = $detalles."\n<strong>Hab. 2:</strong> ".$arrayAdults[1]." Adultos, ".$arrayKids[1]." Menores";
			}   
			if($rooms == 3){ // si son 3 cuartos
			    $detalles = $detalles."\n<strong>Hab. 2:</strong> ".$arrayAdults[1]." Adultos, ".$arrayKids[1]." Menores";
				$detalles = $detalles."\n<strong>Hab. 3:</strong> ".$arrayAdults[2]." Adultos, ".$arrayKids[2]." Menores";
			} 

			$detalles = $detalles."<br><strong>Promocion Vigente:</strong> ".$promotion;

			(isset($_POST['comentarios'])) ? $comentarios = $_POST['comentarios'] : $comentarios = "ninguno";
			(trim($_POST['service_name']) == "club") ? $isClub = TRUE : $isClub = FALSE;

			//Se asignan los precios
			if (isset($_SESSION['cliente'])) {

				if ($room['cuarto']->getPromo() !=0) {		
					$pagoHotel = $room['cuarto']->getPromo();
					$price = round($room['cuarto']->getPromo());
					$amount = $room['cuarto']->getPromo();
					$pagoBancario = $room['cuarto']->getPromo();

				}
				else if($_SESSION['cliente']->getNumeroSocio() != 0){
					if($promocion !=0){

						$div = $promocion/100;
						$plus = $room['cuarto']->getClubEstrella()*$div;
						$result = round($room['cuarto']->getClubEstrella() - $plus);

						$pagoHotel = $result;
						$price = $result ;
						$amount = $result;
						$pagoBancario = $result;

					}else{

						$pagoHotel = round($room['cuarto']->getClubEstrella());
						$price = round($room['cuarto']->getClubEstrella() );
						$amount = round($room['cuarto']->getClubEstrella());
						$pagoBancario = round($room['cuarto']->getClubEstrella());
					}
				}
			}
			else{
				if($promocion != 0){

					$div = $promocion/100;
					$plus = $room['cuarto']->getPrice()*$div;
					$result = round($room['cuarto']->getPrice() - $plus);

					$pagoHotel = $result;
					$price = $result;
					$amount = $result;
					$pagoBancario = $result;
				}else{

					$pagoHotel = round($room['cuarto']->getPrice());
					$price = round($room['cuarto']->getPrice());
					$amount = round($room['cuarto']->getPrice());
					$pagoBancario = round($room['cuarto']->getPrice());
				}
			}

			$keys = getKeys();

			if (isset($_POST['csrf_token']) && $_POST['csrf_token'] == $this->last_token) {
				
				include "views/Reservas/booking.php";
			}
			else if($_SESSION['token_verify'] == $_POST['csrf_token']){
				include "views/404.php";
			}
		}
	}
}

function getKeys(){

	try {
		$db = new db();
		$conn = $db->connection();
		$query = "SELECT id_key, AES_DECRYPT(password,'adhara@-#') AS 'Password' FROM keys_ WHERE id_key LIKE 'AdharaKey_%';";
		$stmt = $conn->prepare($query);
		$stmt->execute();
		$keys=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $keys;
	} catch (Exception $e) {
		echo "Error al obtener las claves de acceso<br>";
		print_r($e);
		return NULL;
	}
}

function Img_room($cuarto){

	if($cuarto->categoria == 1)
		$cuarto->setImg("img/rooms/room_estandar.png");
	else if($cuarto->categoria == 2)
		$cuarto->setImg("img/rooms/room_superior.png");
	else
		$cuarto->setImg("img/rooms/room_ejecutive");

	return $cuarto;
}

function Room_booking($idRoom,$lista_adulto,$lista_kid,$llegada,$salida,$cuarto){

	$idHotel = 1;//Adhara Cancun
	$static_adults = array("0"=>1);
	$static_kids = array("0"=>0);
	$adulto = 0;
	$niño = 0;
	$room_simple= array();
	$room_superior = array();
	$room_ejecutive = array();
	/*For sirve para contar*/
	for($i = 0; $i < $cuarto; $i++){
		$adulto += $lista_adulto[$i];
		$niño += $lista_kid[$i];
	}
	
	$d=strtotime("tomorrow");
	$x=strtotime("+2 days");


	$dateTo = trim($llegada);
	$dateFrom = trim($salida);
	/*$dateTo = ($dateTo <= date("Y-m-d")) ? date("Y-m-d",$d) : $dateTo;
	$dateFrom = ($dateFrom <= date("Y-m-d")) ? date("Y-m-d",$x) : $dateFrom;*/
	


	$hotelController = new hotelController();

	$jsonKids = json_encode($lista_kid);
	$jsonAdults = json_encode($lista_adulto);

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
		$room = $hotelController->getRoom($idRoom,$dateTo,$dateFrom,$cuarto,$lista_adulto,$lista_kid);
		$categoria = $hotelController->getCategoria($room->getCategoria());


		return array("cuartos" => $cuarto,"adults" => $adulto,"kids" => $niño,"jsonKids" => $jsonKids,"jsonAdults" => $jsonAdults, "semana_checkin" => $semanaStart, "mes_checkin" => $mesStart, "dia_checkin" => $diaStart,"año_checkin" => $añoStart , "semana_checkout" => $semanaEnd, "mes_checkout" => $mesEnd, "dia_checkout" => $diaEnd, "año_checkout" => $añoEnd, "noches" => $noches, "promo_season" => $promoSeason, "cuarto" => $room,"category_room" => $categoria);
	}
	else
		return array("cuartos" => $cuarto,"adults" => $adulto,"kids" => $niño, "jsonKids" => $jsonKids,"jsonAdults" => $jsonAdults, "semana_checkin" => $semanaStart, "mes_checkin" => $mesStart, "dia_checkin" => $diaStart,"año_checkin" => $añoStart , "semana_checkout" => $semanaEnd, "mes_checkout" => $mesEnd, "dia_checkout" => $diaEnd, "año_checkout" => $añoEnd, "noches" => $noches, "promo_season" => $promoSeason,"cuarto" => $room,"category_room" => $categoria);
}


?>