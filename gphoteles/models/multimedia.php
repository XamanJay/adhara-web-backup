<?php 

class multimedia{

	public $id;
	public $idHotel;
	public $nombre;
	public $url;
	public $seccion;
	public $categoria;
	public $responsivo;
	public $idioma;
	public $isDeleted;

	public function setId($id){ $this->id = $id; }
	public function getId(){ return $this->id; }

	public function setIdHotel($idHotel){ $this->idHotel = $idHotel; }
	public function getIdHotel(){ return $this->idHotel; }

	public function setNombre($nombre){ $this->nombre = $nombre; }
	public function getNombre(){ return $this->nombre; }

	public function setUrl($url){ $this->url = $url; }
	public function getUrl(){ return $this->url; }

	public function setSeccion($seccion){ $this->seccion = $seccion; }
	public function getSeccion(){ return $this->seccion; }

	public function setCategoria($categoria){ $this->categoria = $categoria; }
	public function getCategoria(){ return $this->categoria; }

	public function setResponsivo($responsivo){ $this->responsivo = $responsivo; }
	public function getResponsivo(){ return $this->responsivo; }

	public function setIdioma($idioma){ $this->idioma = $idioma; }
	public function getIdioma(){ return $this->idioma; }

	public function setIsDeleted($isDeleted){ $this->isDeleted = $isDeleted; }
	public function getIsDeleted(){ return $this->isDeleted; }
}

?>