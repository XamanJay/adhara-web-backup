<?php 
require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/db.php");
include ("SeasonsController.php");

if ($_POST) {
	if (isset($_POST['price']) && isset($_POST['empieza']) && isset($_POST['termina']) && isset($_POST['extra']) && isset($_POST['mealAdult']) && isset($_POST['mealKid']))
	{
		$adharaId = 1;
		$margaritasId = 2;
		$validator = 0;
		if(isset($_POST['adhara'])){

			foreach ($_POST['adhara'] as $room) {
				if ($room == 1) {
					
					$validator = 1;
					break;
				}
			}

			if ($validator == 1) {
				
				// cuando se selecciona la opcion de todas las habitaciones
				$seasonController = new SeasonsController();

				/* Habitacion No Reembolsable con Alimentos Adhara */
				$season = $seasonController->createNRD(12,$_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
				$newt = $seasonController->createSeason($season,$adharaId);

				if ($newt == 1) {
					$nrD = "1";
				}
				else if($newt == 2){
					$nrD = "2";
				}
				else
					$nrD = "0";

				/* Habitacion No Reembolsable sin alimentos  Adhara */
				$season2 = $seasonController->createNRD(13,$_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],0,0);
				$newt = $seasonController->createSeason($season2,$adharaId);

				if ($newt == 1) {
					$nrS = "1";
				}
				else if($newt == 2){
					$nrS = "2";
				}
				else
					$nrS = "0";

				echo json_encode(array("type" => "m", "nrD" => $nrD,"nrS" => $nrS,"success" => "La temporada se agregó correctamente de la habitación", "error" => "Error al cargar la temporada en la habitación","repeat" => "Estas fechas ya estan en otra temporada para la habitación"));

			}
			else{

				foreach ($_POST['adhara'] as $room) {
					
					switch ($room) {
						case 12:
							
							/* Habitacion No Reembolsable con Alimentos Adhara */
							$seasonController = new SeasonsController();
							$season = $seasonController->createNRD(12,$_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
							$newt =$seasonController->createSeason($season,$adharaId);
							if ($newt == 1) {

								echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación NR con Desayuno se agregó correctamente."));
							}
							else if($newt == 2){

								echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación NR con Desayuno."));
							}
							else
								echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación NR con Desayuno."));

							break;

						case 13:
							
							/* Habitacion No Reembolsable sin Alimentos Adhara */
							$seasonController = new SeasonsController();
							$season2 = $seasonController->createNRD(13,$_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],0,0);
							$newt = $seasonController->createSeason($season2,$adharaId);
							if ($newt == 1) {

								echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación NR sin Desayuno se agregó correctamente."));
							}
							else if($newt == 2){

								echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación NR sin Desayuno."));
							}
							else
								echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación NR sin desayuno."));

							break;

						default:

							echo json_encode(array("type" => "s","estatus" => "error","message" => "Error comunicarse con el departamento de desarrollo."));
							break;

					}//end switch		

				}//end foreach
			}
		}

		if(isset($_POST['margara'])){

			foreach ($_POST['margara'] as $room) {
				if ($room == 1) {
					
					$validator = 1;
					break;
				}
			}

			if ($validator == 1) {
				
				// cuando se selecciona la opcion de todas las habitaciones
				$seasonController = new SeasonsController();

				/* Habitacion No Reembolsable con Alimentos Adhara */
				$season = $seasonController->createNRD(14,$_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
				$newt = $seasonController->createSeason($season,$margaritasId);

				if ($newt == 1) {
					$nrD = "1";
				}
				else if($newt == 2){
					$nrD = "2";
				}
				else
					$nrD = "0";

				/* Habitacion No Reembolsable sin alimentos  Adhara */
				$season2 = $seasonController->createNRD(15,$_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],0,0);
				$newt = $seasonController->createSeason($season2,$margaritasId);

				if ($newt == 1) {
					$nrS = "1";
				}
				else if($newt == 2){
					$nrS = "2";
				}
				else
					$nrS = "0";

				echo json_encode(array("type" => "m", "nrD" => $nrD,"nrS" => $nrS,"success" => "La temporada se agregó correctamente de la habitación", "error" => "Error al cargar la temporada en la habitación","repeat" => "Estas fechas ya estan en otra temporada para la habitación"));

			}
			else{

				foreach ($_POST['margara'] as $room) {
					
					switch ($room) {
						case 14:
							
							/* Habitacion No Reembolsable con Alimentos Adhara */
							$seasonController = new SeasonsController();
							$season = $seasonController->createNRD(14,$_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],$_POST['mealAdult'],$_POST['mealKid']);
							$newt =$seasonController->createSeason($season,$margaritasId);
							if ($newt == 1) {

								echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación NR con Desayuno se agregó correctamente."));
							}
							else if($newt == 2){

								echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación NR con Desayuno."));
							}
							else
								echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación NR con Desayuno."));

							break;

						case 15:
							
							/* Habitacion No Reembolsable sin Alimentos Adhara */
							$seasonController = new SeasonsController();
							$season2 = $seasonController->createNRD(15,$_POST['price'],$_POST['empieza'],$_POST['termina'],$_POST['extra'],0,0);
							$newt = $seasonController->createSeason($season2,$margaritasId);
							if ($newt == 1) {

								echo json_encode(array("type" => "s","estatus" => "success","message" => "La temporada de la habitación NR sin Desayuno se agregó correctamente."));
							}
							else if($newt == 2){

								echo json_encode(array("type" => "s","estatus" => "error","message" => "Estas fechas ya estan ocupadas para la habitación NR sin Desayuno."));
							}
							else
								echo json_encode(array("type" => "s","estatus" => "error","message" => "Error al cargar la temporada o fechas duplicadas de la habitación NR sin desayuno."));

							break;

						default:

							echo json_encode(array("type" => "s","estatus" => "error","message" => "Error comunicarse con el departamento de desarrollo."));
							break;

					}//end switch		

				}//end foreach
			}
		}
	}
}


?>