<?php 

class PaypalController{
	
	public function getIndex(){
		include "views/404.php";
	}


	public function postIndex(){
		include "views/Paypal/index.php";
	}


	public function getResponse(){
		include "views/404.php";
	}


	public function postResponse(){
		include "views/Paypal/response.php";
	}


	public function getCancel(){
		include "views/Paypal/cancel.php";
	}


	public function postCancel(){
		
		include "views/404.php";
	}
}


?>