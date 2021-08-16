<?php


 class canje
 {
 	public $fecha;
 	public $premio;
 	public $nota;
 	public $puntos;

 	public function setFecha($fecha){ $this->fecha = $fecha; }
 	public function getFecha(){ return $this->fecha; }

 	public function setPremio($premio){ $this->premio = $premio; }
 	public function getPremio(){ return $this->premio; }

 	public function setNota($nota){ $this->nota = $nota; }
 	public function getNota(){ return $this->nota; }

 	public function setPuntos($puntos){ $this->puntos = $puntos; }
 	public function getPuntos(){ return $this->puntos; }

 }

  class puntos
 {
 	public $fecha;
 	public $invoice;
 	public $rfc;
 	public $total;

 	public function setFecha($fecha){ $this->fecha = $fecha; }
 	public function getFecha(){ return $this->fecha; }

 	public function setInvoice($invoice){ $this->invoice = $invoice; }
 	public function getInvoice(){ return $this->invoice; }

 	public function setRfc($rfc){ $this->rfc = $rfc; }
 	public function getRfc(){ return $this->rfc; }

 	public function setTotal($total){ $this->total = $total; }
 	public function getTotal(){ return $this->total; }

 }


?>