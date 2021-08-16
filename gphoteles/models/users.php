<?php 

class users{

public $id;
public $correo;
public $nombre;

public function setId($id){$this->id = $id;}
public function getId(){return $this->id;}

public function setCorreo($correo){$this->correo = $correo;}
public function getCorreo(){return $this->correo;}

public function setAdmin($nombre){ $this->nombre = $nombre;}
public function getAdmin(){ return $this->nombre;}


}

?>