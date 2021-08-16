<?php 

class BanamexController{

	public function getIndex(){
		include "views/404.php";
	}


	public function postIndex(){
		include "secure/banamex/PHP_VPC_3Party_Super_Order_DO.php";
	}

	public function getResponse(){
		//Respuesta de Banamex
		include "secure/banamex/index.php";
	}

	public function postResponse(){
		include "views/404.php";
	}


	public function getAmex(){
		include ("views/Banamex/responseamex.php");
	}
	public function postAmex(){
		include "views/404.php";
	}
}


?>