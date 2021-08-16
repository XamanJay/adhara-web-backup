<?php 

class hotel{

public $id;
public $name;
public $address;
public $phone;

public function setId($id){ $this->id = $id;}
public function getId(){return $this->id;}

public function setName($name){ $this->name = $name;}
public function getName(){return $this->name;}

public function setAddress($address){ $this->address = $address;}
public function getAddress(){ return $this->address;}

public function setPhone($phone){$this->phone = $phone;}
public function getPhone(){return $this->phone;}

}

?>