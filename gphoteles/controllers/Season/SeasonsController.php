<?php 

require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/season.php");
//require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/db.php");
//require("models/season.php");

class SeasonsController{

	public function anyIndex(){
		session_start();
		if (isset($_SESSION['user'])) {
			include "views/Seasons/index.php";
		}
		else
			include "views/Home/index.php";
	}

	public function getCreate(){
		session_start();
		if (isset($_SESSION['user'])) {
			include "views/Seasons/create.php";
		}
		else
			include "views/Home/index.php";
	}

	public function getManipulate(){
		session_start();
		if (isset($_SESSION['user'])) {
			include "views/Seasons/manipulate.php";
		}
		else
			include "views/Home/index.php";
	}

	public function getMagica(){
		session_start();
		if(isset($_SESSION['user']))
			include "views/Seasons/tarifa_magica.php";
		
		else
			header( "Location: /login" );
	}

	public function getAllotment(){
		session_start();
		if (isset($_SESSION['user'])) {
			include "views/Seasons/manipulate.php";
		}
		else
			include "views/Home/index.php";
	}

	public function getPagodestino(){
		session_start();
		if (isset($_SESSION['user'])) {
			include "views/Seasons/pagoDestino.php";
		}
		else
			include "views/Home/index.php";	
	}

	public function getPromociones(){
		session_start();	
		if (isset($_SESSION['user'])) {
			include "views/Seasons/promociones.php";
		}
		else
			include "views/Home/index.php";	
	}

	public function getTipodecambio(){
		session_start();	
		if (isset($_SESSION['user'])) {
			include "views/Seasons/tipodecambio.php";
		}
		else
			include "views/Home/index.php";
	}

	public function getGrupos(){

		session_start();
		if (isset($_SESSION['user'])) {
			include "views/Seasons/grupos.php";
		}
		else
			include "views/Home/index.php";
	}

	public function getReservas(){
		session_start();
		if (isset($_SESSION['user'])) {
			include "views/Seasons/reservas.php";
		}
		else
			include "views/Home/index.php";
	}

	public function getMultimedia(){
		session_start();
		if (isset($_SESSION['user'])) {
			include "views/Seasons/multimedia.php";
		}
		else
			include "views/Home/index.php";
	}

	public function getOffline(){
		session_start();
		if (isset($_SESSION['user'])) {
			include "views/Seasons/offline.php";
		}
		else
			include "views/Home/index.php";
	}

	public function postOffline(){

		if (isset($_POST)) {
	
			if (isset($_POST['name']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['ciudad']) && isset($_POST['estado']) && isset($_POST['pais']) && isset($_POST['telefono']) && isset($_POST['servicio']) && isset($_POST['llegada']) && isset($_POST['salida']) && isset($_POST['formaPago']) && isset($_POST['hotel']) && isset($_POST['moneda']) && isset($_POST['estatus']) && isset($_POST['habitacion']) && isset($_POST['num_rooms']) && isset($_POST['adultos']) && isset($_POST['kids']) && isset($_POST['total']) && isset($_POST['clubestrella'])) {
				
				try {

					$dateTransaction = date("Y-m-d H:i:s");
					$db = new db();
					$conn = $db->connection();
					$query = "INSERT INTO huespedes (nombre,apellido,correo,telefono,pais,ciudad,comments,isClub) VALUES (?,?,?,?,?,?,?,?);";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(1,$_POST['name']);
					$stmt->bindParam(2,$_POST['apellido']);
					$stmt->bindParam(3,$_POST['email']);
					$stmt->bindParam(4,$_POST['telefono']);
					$stmt->bindParam(5,$_POST['pais']);
					$stmt->bindParam(6,$_POST['ciudad']);
					if (isset($_POST['comentarios'])) {
						
						$stmt->bindParam(7,$_POST['comentarios']);//comentarios
					}
					else{

						$comentarios = "ninguno";
						$stmt->bindParam(7,$comentarios);
					}
					$stmt->bindParam(8,$_POST['clubestrella']);
					$stmt->execute();
					$count = $stmt->rowCount();
					if ($count > 0) {

						$lastId = $conn->lastInsertId();
						$conn2 = $db->connection();
						$query2 = "INSERT INTO transactions (id,price,costoProv,currency,formaPago,cardType,estatus,dateTransaction) VALUES (?,?,?,?,?,?,?,?);";
						$stmt2 = $conn2->prepare($query2);
						$stmt2->bindParam(1,$lastId);
						$stmt2->bindParam(2,$_POST['total']);
						$stmt2->bindParam(3,$_POST['total']);
						$stmt2->bindParam(4,$_POST['moneda']);
						$stmt2->bindParam(5,$_POST['formaPago']);
						$stmt2->bindParam(6,$_POST['formaPago']);
						$stmt2->bindParam(7,$_POST['estatus']);
						$stmt2->bindParam(8,$dateTransaction);
						$stmt2->execute();
						$count2 = $stmt2->rowCount();
						if ($count2 > 0) {
							
							$idLast = $conn2->lastInsertId();
							$isDeleted = FALSE;
							$responsable ="admin@admin.com";
							$detalles = "reserva offline.";
							$conn3 = $db->connection();
							$query3 = "INSERT INTO reservations (id,idClient,idTransaction,dateFrom,dateTo,idRoom,detalles,responsable,notas,servicio,hotel,isDeleted) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
							$stmt3 = $conn3->prepare($query3);
							$stmt3->bindParam(1,$lastId);
							$stmt3->bindParam(2,$lastId);
							$stmt3->bindParam(3,$idLast);
							$stmt3->bindParam(4,$_POST['llegada']);
							$stmt3->bindParam(5,$_POST['salida']);
							$stmt3->bindParam(6,$_POST['habitacion']);
							$stmt3->bindParam(7,$detalles);//detalles
							$stmt3->bindParam(8,$responsable);
							if (isset($_POST['comentarios'])) {

								$stmt3->bindParam(9,$_POST['comentarios']);//comentariod
							}
							else{

								$comentarios = "ninguno";
								$stmt3->bindParam(9,$comentarios);
							}
							$stmt3->bindParam(10,$_POST['servicio']);
							if ($_POST['hotel'] == 1) {
								
								$hotel = "Hotel Adhara Cancún";
								$stmt3->bindParam(11,$hotel);//id hotel
							}
							else{

								$hotel = "Hotel Margaritas Cancún";
								$stmt3->bindParam(11,$hotel);
							}
							$stmt3->bindParam(12,$isDeleted);
							$stmt3->execute();
							$count3 = $stmt3->rowCount();
							if ($count3 > 0) {

								$idReserve = $conn3->lastInsertId();
								$conn4 = $db->connection();
								$query4 = "INSERT INTO roomreserva (id,room_reserva,idRoom) VALUES (?,?,?);";
								$stmt4 = $conn4->prepare($query4);
								$stmt4->bindParam(1,$lastId);
								$stmt4->bindParam(2,$lastId);
								$stmt4->bindParam(3,$_POST['habitacion']);
								$stmt4->execute();
								$count4 = $stmt4->rowCount();
								if ($count4 > 0) {

									echo json_encode(array("type" => "success" , "message" => "La reserva se agregó exitosamente." ));
									//return $lastId;
								}
								else{

									echo json_encode(array("type" => "error" , "message" => "Error al agregar el cuarto."));
								}	
							}
							else{

								echo json_encode(array("type" => "error" , "message" => "Error al agregar la reservación."));
							}
						}
						else{

							echo json_encode(array("type" => "error" , "message" => "Error al agregar la transacción."));
						}
					}
					else{

						echo json_encode(array("type" => "error" , "message" => "Error al agregar información del huesped."));
					}

				} catch (Exception $e) {

					echo "Error al poner la reserva en el panel. <br>";
					print_r($e);
				}
			}
		}
	}

	function createSeason($season,$idHotel){


		try {
			
			$db = new db();
			$conn = $db->connection();
			$id = $season->getIdRoom();
			$startDate  = $season->getStartDate();
			$endDate = $season->getEndDate();
			$query = "SELECT * FROM seasons WHERE idRoom = $id AND('$startDate' BETWEEN startDate AND endDate OR '$endDate' BETWEEN startDate AND endDate) AND isDeleted = 0;";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count > 0) {
				return 2;
			}
			else{

				$query= "INSERT INTO seasons (idRoom,startDate,endDate,single,doble,triple,cuadra,extra,mealAdults,mealKids,kidsRate,minStay,idHotel) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$season->getIdRoom());
				$stmt->bindParam(2,$season->getStartDate());
				$stmt->bindParam(3,$season->getEndDate());
				$stmt->bindParam(4,$season->getSingle());
				$stmt->bindParam(5,$season->getDouble());
				$stmt->bindParam(6,$season->getTriple());
				$stmt->bindParam(7,$season->getCuadra());
				$stmt->bindParam(8,$season->getExtra());
				$stmt->bindParam(9,$season->getMealAdult());
				$stmt->bindParam(10,$season->getMealKid());
				$stmt->bindParam(11,$season->getKidsRate());
				$stmt->bindParam(12,$season->getMinStay());
				$stmt->bindParam(13,$idHotel);
				$stmt->execute();
				$count = $stmt->rowCount();
				if($count > 0){

					$conn = false;
					//echo "exito al cargar la temporada <br>";
					return 1;

				}
				else{

					return 0;
				}

			}
			
		} catch (Exception $e) {
			echo "error al cargar la temporada <br>";
			print_r($e);
		}
	}

	function findSeason($startDate,$idHotel){

		try {
		
			$db = new db();
			$conn = $db->connection();
			$query = "SELECT * FROM season WHERE ? BETWEEN startDate AND endDate  AND idHotel = ? AND isdeleted = ? ORDER BY priority;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$startDate);
			$stmt->bindParam(2,$idHotel);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count > 0) {
				
				$row = $stmt->fetch(PDO:: FETCH_ASSOC);
				$season = new season();	
				
				$season->setId($row['id']);
				$season->setIdRoom($row['idRoom']);
				$season->setStartDate($row['startDate']);
				$season->setEndDate($row['endDate']);
				$season->setSingle($row['single']);
				$season->setDouble($row['double']);
				$season->setTriple($row['triple']);
				$season->setCuadra($row['cuadra']);
				$season->setExtra($row['extra']);
				$season->setMealAdult($row['mealAdults']);
				$season->setMealKid($row['mealKids']);
				$season->setKidsRate($row['kidsRate']);
				$season->setMinStay($row['minStay']);
				$season->setIsDeleted($row['isDeleted']);

				$conn = null;
				return $season;
			}

		} catch (Exception $e) {
			
			echo "error al buscar la temporada <br>";
			print_r($e);
		}
	}

	function getDolar(){
		try {
			
			$db = new db();
			$conn = $db->connection();
			$query = "SELECT dolar FROM dolarvalue;";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count > 0) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$dolar = $row['dolar'];

				$conn = null;
				return $dolar;
			}
		} catch (Exception $e) {
			
		}
	}

	function createEP($base,$startDate,$endDate,$extraPerson){


		$price = $base+($base*0.19);
		$extra= $extraPerson+($extraPerson*0.19); //precios en dolares mas impuestos
        $kids= 0;
        $mealAdult = 0;
        $mealKid = 0;
        $minStay = 1; // reservar minimo 1 dia

        $season = new season();
        $single = $price;
        $double = $price;
        $triple = ($base+$extraPerson)+(($base+$extraPerson)*0.19);
        $cuadra = ($base+($extraPerson*2))+(($base+($extraPerson*2))*0.19);

        $season->setIdRoom(1);
        $season->setStartDate($startDate);
        $season->setEndDate($endDate);
        $season->setSingle($single);
        $season->setDouble($double);
        $season->setTriple($triple);
        $season->setCuadra($cuadra);
        $season->setExtra($extra);
        $season->setMealAdult($mealAdult);
        $season->setMealKid($mealKid);
        $season->setKidsRate($kids);
        $season->setMinStay($minStay);

        return $season;
	}

	function createEPBBNR($base,$startDate,$endDate,$extraPerson,$mealAdult,$mealKid){

		$price = $base+($base*0.19);
		$extra= $extraPerson+($extraPerson*0.19); //precios en dolares
        $foodAdult=$mealAdult+($mealAdult*0.19);//precios en dolares
        $foodKid=$mealAdult;//precios en dolares
        $kids= $mealKid+($mealKid*0.19);
        $minStay = 1; // reservar minimo 1 dia

        $season = new season();
        $single = ($price*0.90)+$foodAdult;
        $double = ($price*0.90)+($foodAdult*2);
        $triple = (($price+$extra)*0.90)+($foodAdult*3);
        $cuadra = (($price+(2*$extra))*0.90)+($foodAdult*4);

        $season->setIdRoom(16);
        $season->setStartDate($startDate);
        $season->setEndDate($endDate);
        $season->setSingle($single);
        $season->setDouble($double);
        $season->setTriple($triple);
        $season->setCuadra($cuadra);
        $season->setExtra($extra);
        $season->setMealAdult($foodAdult);
        $season->setMealKid($kids);
        $season->setKidsRate($kids);
        $season->setMinStay($minStay);

        return $season;
	}

	function createBB($base,$startDate,$endDate,$extraPerson,$mealAdult,$mealKid){

		$price = $base+($base*0.19);
		$extra= $extraPerson+($extraPerson*0.19); //precios en dolares
        $foodAdult=$mealAdult+($mealAdult*0.19);//precios en dolares
        $foodKid=$mealAdult;//precios en dolares
        $kids= $mealKid+($mealKid*0.19);
        $minStay = 1; // reservar minimo 1 dia

        $season = new season();
        $single = $price+$foodAdult;
        $double = $price+($foodAdult*2);
        $triple = $price+($extra)+($foodAdult*3);
        $cuadra = $price+(2*$extra)+($foodAdult*4);

        $season->setIdRoom(2);
        $season->setStartDate($startDate);
        $season->setEndDate($endDate);
        $season->setSingle($single);
        $season->setDouble($double);
        $season->setTriple($triple);
        $season->setCuadra($cuadra);
        $season->setExtra($extra);
        $season->setMealAdult($foodAdult);
        $season->setMealKid($kids);
        $season->setKidsRate($kids);
        $season->setMinStay($minStay);

        return $season;
	}

	function createNR($base,$startDate,$endDate,$extraPerson){

		$price = $base+($base*0.19);
		$extra= $extraPerson+($extraPerson*0.19); //precios en dolares
        $kids= 0;
        $mealAdult = 0;
        $mealKid = 0;
        $minStay = 1; // reservar minimo 1 dia

        $season = new season();
        $single = $price*0.90;
        $double = $price*0.90;
        $triple = (($price+$extra)*0.90);
        $cuadra = (($price+(2*$extra))*0.90);

        $season->setIdRoom(3);
        $season->setStartDate($startDate);
        $season->setEndDate($endDate);
        $season->setSingle($single);
        $season->setDouble($double);
        $season->setTriple($triple);
        $season->setCuadra($cuadra);
        $season->setExtra($extra);
        $season->setMealAdult($mealAdult);
        $season->setMealKid($mealKid);
        $season->setKidsRate($kids);
        $season->setMinStay($minStay);

        return $season;
	}

	function createSP($base,$startDate,$endDate,$extraPerson){

		$price=$base+($base*0.19);
		$extra= $extraPerson+($extraPerson*0.19); //precios en dolares
	    $kids= 0;
	    $mealAdult = 0;
        $mealKid = 0;
	    $minStay = 1; // reservar minimo 1 dia

	    $season = new season();
	    $single = $price+5+(5*0.19);
	    $double = $single;

	    $season->setIdRoom(4);
	    $season->setStartDate($startDate);
        $season->setEndDate($endDate);
	    $season->setSingle($single);
	    $season->setDouble($double);
	    $season->setTriple(0);
	    $season->setCuadra(0);
	    $season->setExtra($extra);
	    $season->setMealAdult($mealAdult);
        $season->setMealKid($mealKid);
	    $season->setKidsRate($kids);
	    $season->setMinStay($minStay);

	    return $season;
	}

	//Habitación No Reembolsable Ejecutiva
	function createSPNR($base,$startDate,$endDate,$extraPerson){

		$price = $base+($base*0.19);
		$extra= $extraPerson+($extraPerson*0.19); //precios en dolares
        $kids= 0;
        $mealAdult = 0;
        $mealKid = 0;
        $minStay = 1; // reservar minimo 1 dia

        $season = new season();
        $single = ($price+5+(5*0.19))*0.90;
        $double = $single;
        $triple = 0;
        $cuadra = 0;

        $season->setIdRoom(8);
        $season->setStartDate($startDate);
        $season->setEndDate($endDate);
        $season->setSingle($single);
        $season->setDouble($double);
        $season->setTriple($triple);
        $season->setCuadra($cuadra);
        $season->setExtra($extra);
        $season->setMealAdult($mealAdult);
        $season->setMealKid($mealKid);
        $season->setKidsRate($kids);
        $season->setMinStay($minStay);

        return $season;
	}

	function createSPBB($base,$startDate,$endDate,$extraPerson,$mealAdult,$mealKid){

		$price = $base+($base*0.19);
		$extra= $extraPerson+($extraPerson*0.19); //precios en dolares
        $foodAdult=$mealAdult+($mealAdult*0.19);//precios en dolares
        $plus = 5+(5*0.19);
        $foodKid=$mealAdult;//precios en dolares
        $kids= $mealKid+($mealKid*0.19);
        $minStay = 1; // reservar minimo 1 dia

        $season = new season();
        $single = $price+$plus+$foodAdult;
        $double = $price+$plus+($foodAdult*2);
        $triple = 0;
        $cuadra = 0;

        $season->setIdRoom(7);
        $season->setStartDate($startDate);
        $season->setEndDate($endDate);
        $season->setSingle($single);
        $season->setDouble($double);
        $season->setTriple($triple);
        $season->setCuadra($cuadra);
        $season->setExtra($extra);
        $season->setMealAdult($foodAdult);
        $season->setMealKid($kids);
        $season->setKidsRate($kids);
        $season->setMinStay($minStay);

        return $season;
	}

	function createSPBBNR($base,$startDate,$endDate,$extraPerson,$mealAdult,$mealKid){

		$price = $base+($base*0.19);
		$extra= $extraPerson+($extraPerson*0.19); //precios en dolares
        $foodAdult=$mealAdult+($mealAdult*0.19);//precios en dolares
        $plus = 5+(5*0.19);
        $foodKid=$mealAdult;//precios en dolares
        $kids= $mealKid+($mealKid*0.19);
        $minStay = 1; // reservar minimo 1 dia

        $season = new season();
        $single = (($price+$plus)*0.90)+$foodAdult;
        $double = (($price+$plus)*0.90)+($foodAdult*2);
        $triple = 0;
        $cuadra = 0;

        $season->setIdRoom(17);
        $season->setStartDate($startDate);
        $season->setEndDate($endDate);
        $season->setSingle($single);
        $season->setDouble($double);
        $season->setTriple($triple);
        $season->setCuadra($cuadra);
        $season->setExtra($extra);
        $season->setMealAdult($foodAdult);
        $season->setMealKid($kids);
        $season->setKidsRate($kids);
        $season->setMinStay($minStay);

        return $season;
	}

	function createEC($base,$startDate,$endDate,$extraPerson){

		$price=$base+($base*0.19);
		$extra= $extraPerson+($extraPerson*0.19); //precios en dolares
	    $kids= 0;
	    $mealAdult = 0;
        $mealKid = 0;
	    $minStay = 1; // reservar minimo 1 dia

	    $season = new season();
	    $single = $price+10+(10*0.19);
	    $double = $single;

	    $season->setIdRoom(5);
	    $season->setStartDate($startDate);
        $season->setEndDate($endDate);
	    $season->setSingle($single);
	    $season->setDouble($double);
	    $season->setTriple(0);
	    $season->setCuadra(0);
	    $season->setExtra($extra);
	    $season->setMealAdult($mealAdult);
        $season->setMealKid($mealKid);
	    $season->setKidsRate($kids);
	    $season->setMinStay($minStay);

	    return $season;
	}

	//Habitación No Reembolsable Ejecutiva
	function createECNR($base,$startDate,$endDate,$extraPerson){

		$price = $base+($base*0.19);
		$extra= $extraPerson+($extraPerson*0.19); //precios en dolares
        $kids= 0;
        $mealAdult = 0;
        $mealKid = 0;
        $minStay = 1; // reservar minimo 1 dia

        $season = new season();
        $single = ($price+10+(10*0.19))*0.90;
        $double = $single;
        $triple = 0;
        $cuadra = 0;

        $season->setIdRoom(10);
        $season->setStartDate($startDate);
        $season->setEndDate($endDate);
        $season->setSingle($single);
        $season->setDouble($double);
        $season->setTriple($triple);
        $season->setCuadra($cuadra);
        $season->setExtra($extra);
        $season->setMealAdult($mealAdult);
        $season->setMealKid($mealKid);
        $season->setKidsRate($kids);
        $season->setMinStay($minStay);

        return $season;
	}

	function createECBB($base,$startDate,$endDate,$extraPerson,$mealAdult,$mealKid){

		$price = $base+($base*0.19);
		$extra= $extraPerson+($extraPerson*0.19); //precios en dolares
        $foodAdult=$mealAdult+($mealAdult*0.19);//precios en dolares
        $plus = 10+(10*0.19);
        $foodKid=$mealAdult;//precios en dolares
        $kids= $mealKid+($mealKid*0.19);
        $minStay = 1; // reservar minimo 1 dia

        $season = new season();
        $single = $price+$plus+$foodAdult;
        $double = $price+$plus+($foodAdult*2);
        $triple = 0;
        $cuadra = 0;

        $season->setIdRoom(9);
        $season->setStartDate($startDate);
        $season->setEndDate($endDate);
        $season->setSingle($single);
        $season->setDouble($double);
        $season->setTriple($triple);
        $season->setCuadra($cuadra);
        $season->setExtra($extra);
        $season->setMealAdult($foodAdult);
        $season->setMealKid($kids);
        $season->setKidsRate($kids);
        $season->setMinStay($minStay);

        return $season;
	}

	function createECBBNR($base,$startDate,$endDate,$extraPerson,$mealAdult,$mealKid){

		$price = $base+($base*0.19);
		$extra= $extraPerson+($extraPerson*0.19); //precios en dolares
        $foodAdult=$mealAdult+($mealAdult*0.19);//precios en dolares
        $plus = 10+(10*0.19);
        $foodKid=$mealAdult;//precios en dolares
        $kids= $mealKid+($mealKid*0.19);
        $minStay = 1; // reservar minimo 1 dia

        $season = new season();
        $single = (($price+$plus)*0.90)+$foodAdult;
        $double = (($price+$plus)*0.90)+($foodAdult*2);
        $triple = 0;
        $cuadra = 0;

        $season->setIdRoom(18);
        $season->setStartDate($startDate);
        $season->setEndDate($endDate);
        $season->setSingle($single);
        $season->setDouble($double);
        $season->setTriple($triple);
        $season->setCuadra($cuadra);
        $season->setExtra($extra);
        $season->setMealAdult($foodAdult);
        $season->setMealKid($kids);
        $season->setKidsRate($kids);
        $season->setMinStay($minStay);

        return $season;
	}

	//Habitación Margaritas
	function createEPM($base,$startDate,$endDate,$extraPerson){


		$price = $base+($base*0.19);
		$extra= $extraPerson+($extraPerson*0.19); //precios en dolares
        $kids= 0;
        $mealAdult = 0;
        $mealKid = 0;
        $minStay = 1; // reservar minimo 1 dia

        $season = new season();
        $single = $price;
        $double = $price;
        $triple = ($base+$extraPerson)+(($base+$extraPerson)*0.19);
        $cuadra = ($base+($extraPerson*2))+(($base+($extraPerson*2))*0.19);

        $season->setIdRoom(6);
        $season->setStartDate($startDate);
        $season->setEndDate($endDate);
        $season->setSingle($single);
        $season->setDouble($double);
        $season->setTriple($triple);
        $season->setCuadra($cuadra);
        $season->setExtra($extra);
        $season->setMealAdult($mealAdult);
        $season->setMealKid($mealKid);
        $season->setKidsRate($kids);
        $season->setMinStay($minStay);

        return $season;
	}

	function createNRM($base,$startDate,$endDate,$extraPerson){

		$price = $base+($base*0.19);
		$extra= $extraPerson+($extraPerson*0.19); //precios en dolares
        $kids= 0;
        $mealAdult = 0;
        $mealKid = 0;
        $minStay = 1; // reservar minimo 1 dia

        $season = new season();
        $single = $price*0.90;
        $double = $single;
        $triple = (($price+$extra)*0.90);
        $cuadra = (($price+(2*$extra))*0.90);

        $season->setIdRoom(11);
        $season->setStartDate($startDate);
        $season->setEndDate($endDate);
        $season->setSingle($single);
        $season->setDouble($double);
        $season->setTriple($triple);
        $season->setCuadra($cuadra);
        $season->setExtra($extra);
        $season->setMealAdult($mealAdult);
        $season->setMealKid($mealKid);
        $season->setKidsRate($kids);
        $season->setMinStay($minStay);

        return $season;
	}

	function getEliminar($id){

		try {
			
			$db = new db();
			$conn = $db->connection();
			$query = "UPDATE seasons SET isDeleted = 1 WHERE id = ?;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam($id);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				echo json_encode(array("type" => "success" , "message" => "La temporada se eliminó exitosamente." ));
			}
			else
				echo json_encode(array("type" => "error" , "message" => "La temporada no se pudo eliminar." ));


		} catch (Exception $e) {
			echo json_encode(array("type" => "error" , "message" => "La temporada no se pudo eliminar." ));
			print_r($e);
		}

	}


	// Cuarto-> No Reembolsable con Desayuno o sin Desayuno
	function createNRD($idRoom,$base,$startDate,$endDate,$extraPerson,$mealAdult,$mealKid){

		$price = $base+($base*0.19);
		$extra = $extraPerson+($extraPerson*0.19);
		$foodAdult=$mealAdult+($mealAdult*0.19);//precios en dolares
        $foodKid=$mealAdult;//precios en dolares
        $kids= $mealKid+($mealKid*0.19);
        $minStay = 1; // reservar minimo 1 dia

        $season = new season();
        $single = $price+$foodAdult;
        $double = $price+($foodAdult*2);
        $triple = $price+($extra)+($foodAdult*3);
        $cuadra = $price+(2*$extra)+($foodAdult*4);

        $season->setIdRoom($idRoom);
        $season->setStartDate($startDate);
        $season->setEndDate($endDate);
        $season->setSingle($single);
        $season->setDouble($double);
        $season->setTriple($triple);
        $season->setCuadra($cuadra);
        $season->setExtra($extra);
        $season->setMealAdult($foodAdult);
        $season->setMealKid($kids);
        $season->setKidsRate($kids);
        $season->setMinStay($minStay);

        return $season;
	}

}




?>