<?php 


class canjes
{

	public $idCliente;
	public $id;
	public $fecha;
	public $estado;
	public $puntos;
	public $representante;
	public $nota;

	public function setIdCliente($idCliente){  $this->idCliente=$idCliente; }
	public function getIdCliente(){ return $this->idCliente; }

	public function setId($id){  $this->id=$id; }
	public function getid(){ return $this->id; }

	public function setFecha($fecha){  $this->fecha=$fecha; }
	public function getFecha(){ return $this->fecha; }

	public function setEstado($estado){ $this->estado=$estado; }
	public function getEstado(){ return $this->estado; }

	public function setPuntos($puntos){ $this->puntos=$puntos; }
	public function getpuntos(){ return $this->puntos; }

	public function setRepresentante($representante){ $this->representante= $representante;}
	public function getRepresentante(){return $this->representante;}

	public function setNota($nota){$this->nota=$nota;}
	public function getNota(){return $this->nota;}

	
}


?>