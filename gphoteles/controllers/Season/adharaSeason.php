<?php 
require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/db.php");
include ("SeasonsController.php");

if ($_POST) {
	if (isset($_POST['price']) && isset($_POST['empieza']) && isset($_POST['termina']) && isset($_POST['extra']) && isset($_POST['mealAdult']) && isset($_POST['mealKid']) && isset($_POST['adhara'])) {
		$adharaId = 1;
		$validator = 0;
		foreach ($_POST['adhara'] as $room) {
			if ($room == 1) {
				
				$validator = 1;
				break;
			}
		}

		if ($validator == 1) {
			
			// cuando se selecciona la opcion de todas las habitaciones
			$seasonController = new SeasonsController();

			/* Habitacion Estandar EP  Adhara */
			$season = $seasonController->createEP($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra']);
			$newt = $seasonController->createSeason($season,$adharaId);
			if ($newt == 1) {
				$ep = "1";
			}
			else if($newt == 2){
				$ep = "2";
			}
			else
				$ep = "0";

			/* Habitacion Estandar BB con alimentos  Adhara */
			$season2 = $seasonController->createBB($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
			$newt = $seasonController->createSeason($season2,$adharaId);
			if ($newt == 1) {
				$bb = "1";
			}
			else if($newt == 2){
				$bb = "2";
			}
			else
				$bb = "0";

			/* Habitacion Estandar NR con alimentos  Adhara */
			$season3 = $seasonController->createNR($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra']);
			$newt = $seasonController->createSeason($season3,$adharaId);
			if ($newt == 1) {
				$nr = "1";
			}
			else if($newt == 2){
				$nr = "2";
			}
			else
				$nr = "0";

			/* Habitacion SUPERIOR SP con alimentos  Adhara */
			$season4 = $seasonController->createSP($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra']);
			$newt = $seasonController->createSeason($season4,$adharaId);
			if ($newt == 1) {
				$sp = "1";
			}
			else if($newt == 2){
				$sp = "2";
			}
			else
				$sp = "0";
			

			/* Habitacion EJECUTIVO EC Adhara */
			$season5 = $seasonController->createEC($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra']);
			$newt = $seasonController->createSeason($season5,$adharaId);
			if ($newt == 1) {
				$ec = "1";
			}
			else if($newt == 2){
				$ec = "2";
			}
			else
				$ec = "0";

			/* Habitacion EJECUTIVO EC con alimentos  Adhara */
			$season6 = $seasonController->createECNR($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra']);
			$newt = $seasonController->createSeason($season6,$adharaId);
			if ($newt == 1) {
				$ecNR = "1";
			}
			else if($newt == 2){
				$ecNR = "2";
			}
			else
				$ecNR = "0";

			$season7 = $seasonController->createECBB($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
			$newt = $seasonController->createSeason($season7,$adharaId);
			if ($newt == 1) {
				$ecBB = "1";
			}
			else if($newt == 2){
				$ecBB = "2";
			}
			else
				$ecBB = "0";

			/* Habitacion EJECUTIVO EC con alimentos  Adhara */
			$season8 = $seasonController->createSPNR($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra']);
			$newt = $seasonController->createSeason($season8,$adharaId);
			if ($newt == 1) {
				$spNR = "1";
			}
			else if($newt == 2){
				$spNR = "2";
			}
			else
				$spNR = "0";

			$season7 = $seasonController->createSPBB($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
			$newt = $seasonController->createSeason($season7,$adharaId);
			if ($newt == 1) {
				$spBB = "1";
			}
			else if($newt == 2){
				$spBB = "2";
			}
			else
				$spBB = "0";

			/* Habitacion ESTANDAR con Alimentos No Reembolsable  Adhara */
			$season10 = $seasonController->createEPBBNR($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
			$newt = $seasonController->createSeason($season10,$adharaId);
			if ($newt == 1) {
				$epBBNR = "1";
			}
			else if($newt == 2){
				$epBBNR = "2";
			}
			else
				$epBBNR = "0";


			/* Habitacion SUPERIOR con Alimentos No Reembolsable  Adhara */
			$season10 = $seasonController->createSPBBNR($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
			$newt = $seasonController->createSeason($season10,$adharaId);
			if ($newt == 1) {
				$spBBNR = "1";
			}
			else if($newt == 2){
				$spBBNR = "2";
			}
			else
				$spBBNR = "0";

			/* Habitacion EJECUTIVO con Alimentos No Reembolsable  Adhara */
			$season11 = $seasonController->createECBBNR($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
			$newt = $seasonController->createSeason($season11,$adharaId);
			if ($newt == 1) {
				$ecBBNR = "1";
			}
			else if($newt == 2){
				$ecBBNR = "2";
			}
			else
				$ecBBNR = "0";




			echo json_encode(array("type" => "m", "ep" => $ep,"bb" => $bb,"nr" => $nr,"sp" => $sp, "ec" => $ec, "ecNR" =>$ecNR,"ecBB" => $ecBB,"spNR" => $spNR,"spBB" => $spBB, "epBBNR" =>$epBBNR, "spBBNR" => $spBBNR, "ecBBNR" => $ecBBNR, "success" => "La temporada se agregó correctamente de la habitación", "error" => "Error al cargar la temporada en la habitación","repeat" => "Estas fechas ya estan en otra temporada para la habitación"));

		}
		else{

			foreach ($_POST['adhara'] as $room) {
				
				switch ($room) {
					case 2:
						
						/* Habitacion Estandar EP  Adhara */
						$seasonController = new SeasonsController();
						$season = $seasonController->createEP($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra']);
						$newt =$seasonController->createSeason($season,$adharaId);
						if ($newt == 1) {

							echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación EP se agregó correctamente."));
						}
						else if($newt == 2){

							echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación EP."));
						}
						else
							echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación EP."));

						break;

					case 3:
						
						/* Habitacion Estandar BB con alimentos  Adhara */
						$seasonController = new SeasonsController();
						$season2 = $seasonController->createBB($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
						$newt = $seasonController->createSeason($season2,$adharaId);
						if ($newt == 1) {

							echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación BB se agregó correctamente."));
						}
						else if($newt == 2){

							echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación BB."));
						}
						else
							echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación BB."));

						break;

					case 4:
						
						/* Habitacion Estandar NR con alimentos  Adhara */
						$seasonController = new SeasonsController();
						$season3 = $seasonController->createNR($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra']);
						$newt = $seasonController->createSeason($season3,$adharaId);
						if ($newt == 1) {

							echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación NR se agregó correctamente."));
						}
						else if($newt == 2){

							echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación NR."));
						}
						else
							echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación NR."));

						break;
					
					case 5:
						
						/* Habitacion SUPERIOR SP Adhara */
						$seasonController = new SeasonsController();
						$season4 = $seasonController->createSP($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra']);
						$newt = $seasonController->createSeason($season4,$adharaId);
						if ($newt == 1) {

							echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación SP se agregó correctamente."));
						}
						else if($newt == 2){

							echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación SP."));
						}
						else
							echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación SP."));

						break;

					case 6:
						
						/* Habitacion EJECUTIVO EC  Adhara */
						$seasonController = new SeasonsController();
						$season5 = $seasonController->createEC($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra']);
						$newt = $seasonController->createSeason($season5,$adharaId);
						if ($newt == 1) {

							echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación Ejec. se agregó correctamente."));
						}
						else if($newt == 2){

							echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación Ejec."));
						}
						else
							echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación Ejec."));

						break;

					case 7:
						
						/* Habitacion SUPERIOR NR  Adhara */
						$seasonController = new SeasonsController();
						$season6 = $seasonController->createSPNR($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra']);
						$newt = $seasonController->createSeason($season6,$adharaId);
						if ($newt == 1) {

							echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación Superior NR se agregó correctamente."));
						}
						else if($newt == 2){

							echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación Superior NR."));
						}
						else
							echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación Supeior NR."));

						break;

					case 8:
						
						/* Habitacion SUPERIOR BB  Adhara */
						$seasonController = new SeasonsController();
						$season6 = $seasonController->createSPBB($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
						$newt = $seasonController->createSeason($season6,$adharaId);
						if ($newt == 1) {

							echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación Superior BB se agregó correctamente."));
						}
						else if($newt == 2){

							echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación Superior BB."));
						}
						else
							echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación Superior BB."));

						break;

					case 9:
						
						/* Habitacion EJECUTIVO NR  Adhara */
						$seasonController = new SeasonsController();
						$season6 = $seasonController->createECNR($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra']);
						$newt = $seasonController->createSeason($season6,$adharaId);
						if ($newt == 1) {

							echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación Ejec. NR se agregó correctamente."));
						}
						else if($newt == 2){

							echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación Ejec. NR."));
						}
						else
							echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación Ejec. NR."));

						break;

					case 10:
						
						/* Habitacion EJECUTIVO BB  Adhara */
						$seasonController = new SeasonsController();
						$season6 = $seasonController->createECBB($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
						$newt = $seasonController->createSeason($season6,$adharaId);
						if ($newt == 1) {

							echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación Ejec. BB se agregó correctamente."));
						}
						else if($newt == 2){

							echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación Ejec. BB."));
						}
						else
							echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación Ejec. BB."));

						break;


					case 11:
						
						/* Habitacion ESTANDAR BB NR Adhara */
						$seasonController = new SeasonsController();
						$season = $seasonController->createEPBBNR($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
						$newt = $seasonController->createSeason($season,$adharaId);
						if ($newt == 1) {

							echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación Ejec. BB se agregó correctamente."));
						}
						else if($newt == 2){

							echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación Ejec. BB. NR."));
						}
						else
							echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación Ejec. BB."));

						break;

					case 12:
						
						/* Habitacion SUPERIOR BB NR Adhara */
						$seasonController = new SeasonsController();
						$season = $seasonController->createSPBBNR($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
						$newt = $seasonController->createSeason($season,$adharaId);
						if ($newt == 1) {

							echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación Ejec. BB se agregó correctamente."));
						}
						else if($newt == 2){

							echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación Ejec. BB."));
						}
						else
							echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación Ejec. BB."));

						break;

					case 13:
						
						/* Habitacion EJECUTIVO BB NR Adhara */
						$seasonController = new SeasonsController();
						$season = $seasonController->createECBBNR($_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
						$newt = $seasonController->createSeason($season,$adharaId);
						if ($newt == 1) {

							echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación Ejec. BB se agregó correctamente."));
						}
						else if($newt == 2){

							echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación Ejec. BB."));
						}
						else
							echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación Ejec. BB."));

						break;

					default:

						echo json_encode(array("type" => "s","estatus" => "error","message" => "Error comunicarse con el departamento de desarrollo."));
						break;

				}//end switch		

			}//end foreach
		}
		
	}
}


?>