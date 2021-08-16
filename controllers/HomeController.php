<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use ipinfo\ipinfo\IPinfo;
require_once 'vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php';

class HomeController
{

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

		$geoplugin = new geoPlugin();
		//locate the IP
		$geoplugin->locate();
		
		if($_COOKIE['lang'] == NULL ){
			if($geoplugin->countryCode == "US"){
				setcookie("lang", "es");
			}
			else{
				setcookie("lang", "es");
			}
			
			header("Refresh:0");
			die();
		}
		if(!file_exists("log_ips.txt")){
			$file = fopen("log_ips.txt", "w");
			fwrite($file, "---- Inicio de log de registo de las IP´s ---- \n\n" . PHP_EOL);
			fclose($file);
		}

		$msg= "\n--------------------------\n\n Fecha: ".date("Y-m-d H:i:s")."\n\n Ip: ".$geoplugin->ip."\n"."\n City: ".$geoplugin->city."\n"."\n Country: ".$geoplugin->countryName."\n"."\n TimeZone: ".$geoplugin->timezone."\n\n Region: ".$geoplugin->region."\n\n RegionCode: ".$geoplugin->regionCode."\n\n ContryCode: ".$geoplugin->countryCode." ";

		$file = fopen("log_ips.txt", "a");
		fwrite($file, $msg . PHP_EOL);
		fclose($file);

	}

	public function getIndex()
	{
		$detect = new Mobile_Detect;
		$display = "display: none";
		$d=strtotime("tomorrow");
		$x=strtotime("+2 days");
		$today = date("Y-m-d",$d);
		$tomorrow = date("Y-m-d",$x);

		$room = Price_quick($today,$tomorrow);

		include("views/Home/index.php");
	}

	public function getHome(){
		
		$detect = new Mobile_Detect;
		$display = "display: none";
		$d=strtotime("tomorrow");
		$x=strtotime("+2 days");
		$today = date("Y-m-d",$d);
		$tomorrow = date("Y-m-d",$x);

		$room = Price_quick($today,$tomorrow);
		
		include("views/Home/index.php");
	}

	public function getContacto(){
		
		include("views/Home/contacto.php");
	}

	public function getPool(){


		include ("views/Home/services/pool.php");
	}

	public function getShuttle(){

		include ("views/Home/services/shuttle.php");
	}

	public function getLobby(){
		include ("views/Home/services/lobby.php");
	}

	public function getGym(){
		include ("views/Home/services/gym.php");
	}

	public function getBussiness_center(){
		include ("views/Home/services/bussiness_center.php");
	}

	public function getRoom(){

		include ("views/Home/room.php");
	}

	public function postRoom(){
		
		//usar trim() para quitar los espacios en blanco
		$d=strtotime("tomorrow");
		$x=strtotime("+2 days");
		$dateFrom = date("Y-m-d",$d);
		$dateTo = date("Y-m-d",$x);
		$result = "";

		$startDate = (isset($_POST['startDate'])) ? trim($_POST['startDate']) : $dateFrom;
		$startDate = ($startDate == "") ? $dateFrom : $startDate;
		$endDate = (isset($_POST['endDate'])) ? trim($_POST['endDate']) : $dateTo;
		$endDate = ($endDate == "") ? $dateTo : $endDate;
		$rooms = (isset($_POST['rooms'])) ? trim($_POST['rooms']) : 1;
		$adults = (isset($_POST['adults'])) ? trim($_POST['adults']) : 1;
		$kids = (isset($_POST['kids'])) ? trim($_POST['kids']) : 0;
		$room_1_adults = (isset($_POST['room_1_adults'])) ? trim($_POST['room_1_adults']) : 1;
		$room_1_kids = (isset($_POST['room_1_kids'])) ? trim($_POST['room_1_kids']) : 0;
		$room_2_adults = (isset($_POST['room_2_adults'])) ? trim($_POST['room_2_adults']) : 1;
		$room_2_kids = (isset($_POST['room_2_kids'])) ? trim($_POST['room_2_kids']) : 0;
		$room_3_adults = (isset($_POST['room_3_adults'])) ? trim($_POST['room_3_adults']) : 1;
		$room_3_kids = (isset($_POST['room_3_kids'])) ? trim($_POST['room_3_kids']) : 0;
		$arrayAdults = array();
		$arrayKids = array();
		switch ($rooms) {
			case 1:
				array_push($arrayAdults, $room_1_adults);
				array_push($arrayKids, $room_1_kids);
				break;
			case 2:
				array_push($arrayAdults, $room_1_adults,$room_2_adults);
				array_push($arrayKids, $room_1_kids,$room_2_kids);
				break;
			
			default:
				array_push($arrayAdults, $room_1_adults,$room_2_adults,$room_3_adults);
				array_push($arrayKids, $room_1_kids,$room_2_kids,$room_3_kids);
				break;
		}
		/*---------------  Se verifica el token  ---------------*/
		if (isset($_POST['csrf_token']) && $_POST['csrf_token'] == $this->last_token) {

			$_SESSION['token_verify'] = $_POST['csrf_token'];
	
			$result = Room_complete($arrayAdults,$arrayKids,$startDate,$endDate,$rooms,$adults,$kids);
			//print_r($result);
			include ("views/Home/room.php");			
						
		}
		/*---------------  Cuando se recarga la pagina  ---------------*/
		else{

			$result = Room_complete($arrayAdults,$arrayKids,$startDate,$endDate,$rooms,$adults,$kids);
			//print_r($result);
			include ("views/Home/room.php");	

		}
		
	}

	public function getError(){
		include "views/404.php";
	}


	public function getAdharagrill(){
		include "views/Home/services/restaurant.php";
	}

	public function getShowroom(){
		include "views/Home/services/show_room.php";
	}

	public function getCoco(){
		include "views/Home/services/cocodrillos.php";
	}

	public function getSomos(){
		include "views/Home/somos.php";
	}

	public function getGrupos(){
		include "views/Home/grupos.php";
	}

	public function getEstrella(){
		include "views/Home/clubestrella.php";
	}

	public function getEventos(){
		$d=strtotime("tomorrow");
		$x=strtotime("+2 days");
		$today = date("Y-m-d",$d);
		$tomorrow = date("Y-m-d",$x);
		include "views/Home/eventos.php";
	}

	public function postEventos(){
		/*print_r($_POST);*/
		$Subject  =  "Solicitud de Evento";
		$From = trim($_POST['email']);
		$name = trim($_POST['nombre']);
		$To = "eventos1@gphoteles.com";

		(isset($_POST['message'])) ? $message = $_POST['message'] : $message= "no comentarios";

		(isset($_POST['Servicios_Audio'])) ? $audio ="Audio" : $audio ="vacio";

		(isset($_POST['Servicios_Pantalla'])) ? $pantalla ="Pantalla" : $pantalla ="";

		(isset($_POST['Servicios_Proyector'])) ? $proyector ="Proyector" : $proyector ="";

		(isset($_POST['Servicios_Tarima'])) ? $tarima ="Tarima" : $tarima ="";

		(isset($_POST['Servicios_Rotafolio'])) ? $rotafolio ="Rotafolio" : $rotafolio ="";

		(isset($_POST['Alimentos_Desayuno'])) ? $desayuno ="Desayuno" : $desayuno ="";

	    (isset($_POST['Alimentos_Cafe'])) ? $cafe ="Estacion de Cafe" : $cafe ="";

		(isset($_POST['Alimentos_Comida'])) ? $comida ="Comida" : $comida ="";

		(isset($_POST['Alimentos_Canapes'])) ? $canapes ="Canapes" : $canapes ="";

		(isset($_POST['Alimentos_Cena'])) ? $cena ="Cena" : $cena ="";


		$Message = "<!DOCTYPE html>
		<html>
		<head>
			<title>Eventos Adhara</title>
			<meta charset='UTF-8'>
		</head>
		<body style='font-family: sans-serif;'>
			<div style='width: 400px;'>
				<h3 style='text-align: center; width: 100%;'>La persona ".$name."</h3>
				<p>Solicito una cotizacion para evento</p>
				<h4>Servicios:</h4>
				<p>".$audio."</p>
				<p>".$proyector."</p>
				<p>".$rotafolio."</p>
				<p>".$pantalla."</p>
				<p>".$tarima."</p>
				<h4>Alimentos/Bebidas</h4>
				<p>".$desayuno."</p>
				<p>".$comida."</p>
				<p>".$cena."</p>
				<p>".$cafe."</p>
				<p>".$canapes."</p>
				<br><br>
				<p>El telefono para comunicarse con el cliente es: ".$_POST['telefono']."</p>
				<p>El correo del cliente es: ".$_POST['email']."</p>
				<p>El numero de personas que desea en el evento es de : ".$_POST['pax']."</p>
				<p>El tipo de evento que desea es: ".$_POST['tipo_evento']."</p>
				<p>Comentarios: ".$_POST['coments']."</p>
			</div>
		</body>
		</html>";
		($_COOKIE['lang'] == "es") ? $success_message = "Su mensaje se envio correctamente." : $success_message = "Your message was successfully sent";
		($_COOKIE['lang'] == "es") ? $error_message = "Error inesperado intente de nuevo." : $error_message = "Unknown error try again";

		try {
			$mail = new PHPMailer(true);
			$mail->isSMTP();
			$mail->Host     = 'okcloud.arvixecloud.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'noreply@animate.adharacancun.com';
			$mail->Password = 'Na_xJiira3$.';
			$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
			$mail->Port       = 587;  
			$mail->setFrom($From,$name);
			$mail->AddAddress($To);
			$mail->addBCC('eventos3@gphoteles.com');
			$mail->WordWrap = 50; 
			$mail->IsHTML(true);  
			$mail->Subject = $Subject;
			$mail->Body = $Message;
			if($mail->Send()){
				echo json_encode(array("type" => "success","message"=> $success_message));
			}
			else
				echo json_encode(array("type" => "error","message" => $error_message));

		} catch (Exception $e) {
			echo json_encode(array("type" => "error","message" => $error_message));
		}
	}


}

function Price_quick($llegada,$salida){
	$idHotel = 1;
	$static_adults = array("0"=>1);
	$static_kids = array("0"=>0);
	$rooms = 1;
	$idR = 3;

	$hotelController = new hotelController();

	$room = $hotelController->getRoom($idR,$llegada,$salida,$rooms,$static_adults,$static_kids);
	return $room;

}

function Room_complete($arrayAdults,$arrayKids,$startDate,$endDate,$rooms,$adults,$kids){

	$idHotel = 1;//Adhara Cancun
	$room_simple= array();
	$room_superior = array();
	$room_ejecutive = array();
	$tarifa_magica = array();


	$hotelController = new hotelController();

	$jsonAdults = json_encode($arrayAdults);
	$jsonKids = json_encode($arrayKids);

	/* Fechas version en Ingles */
	$dateLargeTo = strftime("%A, %d de %B de %Y",strtotime($startDate));
	$dateLargeFrom = strftime("%A, %d de %B de %Y",strtotime($endDate)); 

	/* Fechas version en español */

	$semanaStart = $hotelController->convertDay($startDate,$_COOKIE['lang']);
	$mesStart = $hotelController->getMonth($startDate,$_COOKIE['lang']);
	$diaStart = $hotelController->getNumberDay($startDate);
	$añoStart = $hotelController->getYear($startDate);

	$semanaEnd = $hotelController->convertDay($endDate,$_COOKIE['lang']);
	$mesEnd = $hotelController->getMonth($endDate,$_COOKIE['lang']);
	$diaEnd = $hotelController->getNumberDay($endDate);
	$añoEnd = $hotelController->getYear($endDate);

	$noches = $hotelController->getNights($startDate,$endDate);
	$dateDiff = date_diff(date_create($startDate), date_create($endDate));
	$season = $hotelController->getSeason($startDate,$endDate,$idHotel);

	$promocion = $hotelController->getPromocion($startDate);

	if($season != 0){
		$promoSeason = $hotelController->getPromoSeason($startDate,$idHotel);
		$cuartos = $hotelController->getRooms($season,$startDate,$endDate,$idHotel,$rooms,$arrayAdults,$arrayKids);
		
		foreach ($cuartos as $room) {
			if($room->categoria == 1){
				array_push($room_simple, $room);
			}
			else if($room->categoria == 2){
				array_push($room_superior, $room);
			}
			else if($room->categoria == 3){
				array_push($room_ejecutive, $room);
			}
			else{
				array_push($tarifa_magica, $room);
			}
		}

		return array("cuartos" => $rooms,"adults" => $adults,"kids" => $kids,"jsonKids" => $jsonKids,"jsonAdults" => $jsonAdults, "semana_checkin" => $semanaStart, "mes_checkin" => $mesStart, "dia_checkin" => $diaStart,"año_checkin" => $añoStart , "semana_checkout" => $semanaEnd, "mes_checkout" => $mesEnd, "dia_checkout" => $diaEnd, "año_checkout" => $añoEnd, "noches" => $noches, "promo_season" => $promoSeason, "cuarto_simple" => $room_simple,"cuarto_superior" => $room_superior,'cuarto_ejecutivo' => $room_ejecutive, 'tarifa_magica' => $tarifa_magica,'promocion' => $promocion);
	}
	else
		return array("cuartos" => $rooms,"adults" => $adults,"kids" => $kids, "jsonKids" => $jsonKids,"jsonAdults" => $jsonAdults, "semana_checkin" => $semanaStart, "mes_checkin" => $mesStart, "dia_checkin" => $diaStart,"año_checkin" => $añoStart , "semana_checkout" => $semanaEnd, "mes_checkout" => $mesEnd, "dia_checkout" => $diaEnd, "año_checkout" => $añoEnd, "noches" => $noches, "promo_season" => $promoSeason,"cuarto_simple" => $room_simple,"cuarto_superior" => $room_superior,'cuarto_ejecutivo' => $room_ejecutive,'tarifa_magica' => $tarifa_magica,'promocion' => $promocion);
}

?>
