<?php

class cuarto
{

	public $idr;
	public $idh;
	public $nombre;
	public $name;
	public $tipo;
	public $categoria;
	public $prioridad;
	public $alotment;
	public $capacidad;
	public $kidsAllow;
	public $fechaEntrada;
	public $fechaSalida;
	public $noches;

	function __construct(){}

	public function setIdr($idr){ $this->idr = $idr; }
	public function getIdr(){ return $this->idr; }

	public function setIdh($idh){ $this->idh = $idh; }
	public function getIdh(){ return $this->idh; }

	public function setNombre($nombre){ $this->nombre = $nombre;}
	public function getNombre(){ return $this->nombre;}

	public function setName($name){ $this->name = $name;}
	public function getName(){ return $this->name;}

	public function setTipo($tipo){ $this->tipo = $tipo; }
	public function getTipo() {return $this->tipo; }

	public function setCategoria($categoria){ $this->categoria = $categoria; }
	public function getCategoria(){ return $this->categoria; }

	public function setPrioridad($prioridad){ $this->prioridad = $prioridad; }
	public function getPrioridad(){ return $this->prioridad; }

	public function setAlotment($alotment){ $this->alotment = $alotment; }
	public function getAlotment(){return $this->alotment; }

	public function setCapacidad($capacidad){ $this->capacidad = $capacidad; }
	public function getCapacidad(){ return $this->capacidad; }

	public function setKidsAllow($kidsAllow){ $this->kidsAllow = $kidsAllow; }
	public function getKidsAllow(){ return $this->kidsAllow; }

	public function setFechaEntrada($fechaEntrada){ $this->fechaEntrada = $fechaEntrada; }
	public function getFechaEntrada(){ return $this->fechaEntrada; }

	public function setFechaSalida($fechaSalida){ $this->fechaSalida = $fechaSalida; }
	public function getFechaSalida(){ return $this->fechaSalida; }

	public function setNoches($noches){ $this->noches = $noches; }
	public function getNoches(){ return $this->noches; }



}

class categoria{

	public $categoria;
	public $imagen;

	public function setCategoria($categoria){ $this->categoria = $categoria;}
	public function getCategoria(){ return $this->categoria; }

	public function setImagen($imagen){ $this->imagen = $imagen; }
	public function getImagen(){ return $this->imagen; }
}

class season{

	public $idRoom;

	public function setIdRoom($idRoom){ $this->idRoom = $idRoom; }
	public function getIdRoom(){ return $this->idRoom; }
}

?>