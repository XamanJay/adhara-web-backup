<?php 

class transacciones{

public $id;
public $precio;
public $currency;
public $formaPago;
public $tipoTarjeta;
public $estatusPago;

public function setId($id){$this->id = $id;}
public function getId(){return $this->id;}

public function setPrecio($precio){$this->precio = $precio;}
public function getPrecio(){return $this->precio;}

public function setCurrency($currency){$this->currency = $currency;}
public function getCurrency(){return $this->currency;}

public function setFormaPago($formaPago){$this->formaPago = $formaPago;}
public function getFormaPago(){return $this->formaPago;}

public function setTipoTarjeta($tipoTarjeta){$this->tipoTarjeta = $tipoTarjeta;}
public function getTipoTarjeta(){return $this->tipoTarjeta;}

public function setEstatusPago($estatusPago){$this->estatusPago = $estatusPago;}
public function getEstatusPago(){return $this->estatusPago;}


}

?>