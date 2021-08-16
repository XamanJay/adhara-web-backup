<?php
require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/db.php");
include ("SeasonsController.php"); 

if ($_POST) {

	if (isset($_POST['empiezaM']) && isset($_POST['terminaM']) && isset($_POST['priceM']) && isset($_POST['extraM'])) {
		
		$seasonController = new SeasonsController();
        $margaritasId= 2;

        /* Habitacion Estandar EP Margaritas */
        $seasonM = $seasonController->createEPM($_POST['priceM'],$_POST['empiezaM'],$_POST['terminaM'],$_POST['extraM']);
        if ($seasonController->createSeason($seasonM,$margaritasId)) {
        	$ep = 1;
        }
        else
        	$ep = 0;

        /* Habitacion Estandar NR Margaritas */
        $seasonNRM = $seasonController->createNRM($_POST['priceM'],$_POST['empiezaM'],$_POST['terminaM'],$_POST['extraM']);
        if ($seasonController->createSeason($seasonNRM,$margaritasId)) {
        	$nr = 1;
        }
        else
        	$nr = 0;

        echo json_encode(array("ep" => $ep, "nr" => $nr, "success" => "La temporada se agregó correctamente de la habitación", "error" => "Error al cargar la temporada en la habitación"));
	}
}

?>
