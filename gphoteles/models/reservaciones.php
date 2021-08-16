<?php 

class reservaciones{

/*Seccion de reservas */
public $id;
public $idCliente;
public $idTransaccion;
public $dateFrom;
public $dateTo;
public $cuartos;
public $detalles;
public $responsable;
public $notas;
public $servicio;
public $hotel;
public $isDeleted;
public $idOpera;

/* Seccion de clientes */
public $nombre;
public $apellido;
public $correo;
public $telefono;
public $pais;
public $ciudad;
public $comments;
public $isClub;

/* Seccion de transactions */

public $price;
public $costoProv;
public $currency;
public $formaPago;
public $cardType;
public $estatus;
public $date;

public function setId($id){$this->id = $id;}
public function getId(){return $this->id;}

public function setIdCliente($idCliente){$this->idCliente = $idCliente;}
public function getIdCliente(){return $this->idCliente;}

public function setIdTransaccion($idTransaccion){$this->idTransaccion = $idTransaccion;}
public function getIdTransaccion(){return $this->idTransaccion;}

public function setDateFrom($dateFrom){ $this->dateFrom = $dateFrom;}
public function getDateFrom(){ return $this->dateFrom;}

public function setDateTo($dateTo){$this->dateTo = $dateTo;}
public function getDateTo(){return $this->dateTo;}

public function setCuartos($cuartos){$this->cuartos = $cuartos;}
public function getCuartos(){return $this->cuartos;}

public function setDetalles($detalles){ $this->detalles = $detalles;}
public function getDetalles(){ return $this->detalles;}

public function setResponsable($responsable){ $this->responsable= $responsable; }
public function getResponsable(){ return $this->responsable; }

public function setNotas($notas){ $this->notas = $notas; }
public function getNotas(){ return $this->notas; }

public function setServicio($servicio){ $this->servicio = $servicio; }
public function getServicio(){ return $this->servicio; }

public function setHotel($hotel){ $this->hotel = $hotel; }
public function getHotel(){ return $this->hotel; }

public function setNombre($nombre){ $this->nombre = $nombre; }
public function getNombre(){ return $this->nombre; }

public function setApellido($apellido){ $this->apellido = $apellido; }
public function getApellido(){ return $this->apellido; }

public function setCorreo($correo){ $this->correo = $correo; }
public function getCorreo(){ return $this->correo; }

public function setTelefono($telefono){ $this->telefono = $telefono; }
public function getTelefono(){ return $this->telefono; }

public function setCiudad($ciudad){ $this->ciudad = $ciudad; }
public function getCiudad(){ return $this->ciudad; }

public function setPais($pais){ $this->pais = $pais; }
public function getPais(){ return $this->pais; }

public function setComments($comments){ $this->comments = $comments; }
public function getComments(){ return $this->comments; }

public function setIsClub($isClub){$this->isClub = $isClub;}
public function getIsClub(){return $this->isClub;}

public function setIsDeleted($isDeleted){$this->isDeleted = $isDeleted;}
public function getIsDeleted(){return $this->isDeleted;}

public function setPrice($price){ $this->price = $price; }
public function getPrice(){ return $this->price; }

public function setCostoProv($costoProv){ $this->costoProv = $costoProv; }
public function getCostoProv(){ return $this->costoProv; }

public function setCurrency($currency){ $this->currency = $currency; }
public function getCurrency(){ return $this->currency; }

public function setFormaPago($formaPago){ $this->formaPago= $formaPago; }
public function getFormaPago(){ return $this->formaPago; }

public function setCardType($cardType){ $this->cardType = $cardType; }
public function getCardType(){ return $this->cardType; }

public function setEstatus($estatus){ $this->estatus = $estatus; }
public function getEstatus(){ return $this->estatus; }

public function setDate($date){ $this->date = $date;}
public function getDate(){ return $this->date; }

public function setIdOpera($idOpera){ $this->idOpera = $idOpera;}
public function getIdOpera(){ return $this->idOpera; }

}

?>
