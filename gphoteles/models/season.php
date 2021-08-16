<?php

class season{

public $id;
public $idRoom;
public $startDate;
public $endDate;
public $single;
public $double;
public $triple;
public $cuadra;
public $extra;
public $mealAdult;
public $mealKid;
public $kidsRate;
public $minStay;
public $isDeleted;

public function setId($id){ $this->id = $id;}
public function getId(){ return $this->id;}

public function setIdRoom($idRoom){ $this->idRoom = $idRoom;}
public function getIdRoom(){ return $this->idRoom;}

public function setStartDate($startDate){ $this->startDate = $startDate;}
public function getStartDate(){ return $this->startDate;}

public function setEndDate($endDate){ $this->endDate = $endDate;}
public function getEndDate(){ return $this->endDate;}

public function setSingle($single){ $this->single = $single;}
public function getSingle(){ return $this->single;}

public function setDouble($double){ $this->double = $double;}
public function getDouble(){ return $this->double;}

public function setTriple($triple){ $this->triple = $triple;}
public function getTriple(){return $this->triple;}

public function setCuadra($cuadra){ $this->cuadra = $cuadra;}
public function getCuadra(){ return $this->cuadra;}

public function setExtra($extra){ $this->extra = $extra;}
public function getExtra(){return $this->extra;}

public function setMealAdult($mealAdult){ $this->mealAdult = $mealAdult;}
public function getMealAdult(){return $this->mealAdult;}

public function setMealKid($mealKid){$this->mealKid = $mealKid;}
public function getMealKid(){return $this->mealKid;}

public function setKidsRate($kidsRate){ $this->kidsRate = $kidsRate;}
public function getKidsRate(){ return $this->kidsRate;}

public function setMinStay($minStay){ $this->minStay = $minStay;}
public function getMinStay(){ return $this->minStay;}

public function setIsDeleted($isDeleted){ $this->isDeleted = $isDeleted;}
public function getIsDeleted(){ return $this->isDeleted;}


}

?>