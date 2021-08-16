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
	public $alot_verify;
	public $capacidad_verify;
	public $kids_verify;
	public $pago_destino;
	public $stop_sale;
	public $price;
	public $promo;
	public $adults;
	public $kids;
	public $clubestrella;
	public $img;

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

	public function setAlotVerify($alot_verify){ $this->alot_verify = $alot_verify; }
	public function getAlotVerify(){ return $this->alot_verify; }

	public function setCapacidadVerify($capacidad_verify){ $this->capacidad_verify = $capacidad_verify; }
	public function getCapacidadVerify(){ return $this->capacidad_verify; }

	public function setKidsVerify($kids_verify){ $this->kids_verify = $kids_verify; }
	public function getKidsVerify(){ return $this->kids_verify; }

	public function setPagoDestino($pago_destino){ $this->pago_destino = $pago_destino; }
	public function getPagoDestino(){ return $this->pago_destino; }

	public function setStopSale($stop_sale){ $this->stop_sale = $stop_sale; }
	public function getStopSale(){ return $this->stop_sale; }

	public function setPrice($price){ $this->price = $price; }
	public function getPrice(){ return $this->price; }

	public function setPromo($promo){ $this->promo = $promo; }
	public function getPromo(){ return $this->promo; }

	public function setAdults($adults){ $this->adults = $adults; }
	public function getAdults(){ return $this->adults; }

	public function setKids($kids){ $this->kids = $kids; }
	public function getKids(){ return $this->kids; }

	public function setClubEstrella($clubestrella){ $this->clubestrella = $clubestrella; }
	public function getClubEstrella(){ return $this->clubestrella; }

	public function setImg($img){ $this->img = $img; }
	public function getImg(){ return $this->img; }



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