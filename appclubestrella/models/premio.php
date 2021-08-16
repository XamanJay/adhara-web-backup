<?php


 class premios
 {
 	public $id;
 	public $nombre;
 	public $puntos;
 	public $estado;

 	public function setId($id){ $this->id=$id; }
 	public function getId(){ return $this->id; }

 	public function setNombre($nombre){ $this->nombre=$nombre; }
 	public function getNombre(){ return $this->nombre; }

 	public function setPuntos($puntos){ $this->puntos=$puntos; }
 	public function getPuntos(){ return $this->puntos; }

 	public function setEstado($estado){ $this->estado=$estado; }
 	public function getEstado(){ return $this->estado; }
 }

?>