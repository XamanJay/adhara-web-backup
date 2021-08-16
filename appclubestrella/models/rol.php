<?php

class rol
{
	
	public $id;
	public $rol;

	function __construct(){ }

	public function getId(){ return $this->id; }
	public function setId($id){ $this->id = $id; }

	public function getRol(){ return $this->rol; }
	public function setRol($rol){ $this->rol = $rol; }

}
?>