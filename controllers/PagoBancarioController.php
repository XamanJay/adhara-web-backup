<?php 

class PagoBancarioController{

	public function getIndex(){
		include "views/Pago_bancario/response.php";
	}

	public function postIndex(){
		include "views/404.php";
	}

	public function getErrormail(){
		include "views/Pago_bancario/errormail.php";
	}

	public function postErrormail(){
		include "views/404.php";
	}
}

?>