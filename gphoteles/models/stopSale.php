<?php 

class stopSale{

public $id;
public $idCuarto;
public $startDate;
public $endDate;
public $isDeleted;

public function setId($id){ $this->id = $id;}
public function getId(){return $this->id;}

public function setIdCuarto($idCuarto){ $this->idCuarto = $idCuarto;}
public function getIdCuarto(){return $this->idCuarto;}

public function setStartDate($startDate){ $this->startDate = $startDate;}
public function getStartDate(){return $this->startDate;}

public function setEndDate($endDate){$this->endDate = $endDate;}
public function getEndDate(){return $this->endDate;}

public function setIsDeleted($isDeleted){$this->isDeleted = $isDeleted;}
public function getIsDeleted(){return $this->isDeleted;}

}

?>