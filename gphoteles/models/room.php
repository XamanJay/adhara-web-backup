<?php 

class room{

public $id;
public $idHotel;
public $capMax;
public $enumType;
public $enumCategory;
public $priority;
public $descrip;
public $quantity;
public $kidsAllow;
public $isDeleted;
public $type;
public $category;

public function setId($id){ $this->id = $id;}
public function getId(){ return $this->id;}

public function setIdHotel($idHotel){ $this->idHotel = $idHotel;}
public function getIdHotel(){ return $this->idHotel;}

public function setCapMax($capMax){ $this->capMax = $capMax;}
public function getCapMax(){ return $this->capMax;}

public function setEnumType($enumType){ 

	$this->enumType = $enumType;
	$this->setType($enumType);

}
public function getEnumType(){ return $this->enumType;}

public function setEnumCategory($enumCategory){ 

	$this->enumCategory= $enumCategory;
	$this->setCategory($enumCategory);
}
public function getEnumCategory(){ return $this->enumCategory;}

public function setPriority($priority){ $this->priority = $priority;}
public function getPriority(){return $this->priority;}

public function setDescrip($descrip){ $this->descrip = $descrip;}
public function getDescrip(){return $this->descrip;}

public function setQuantity($quantity){ $this->quantity = $quantity;}
public function getQuantity(){ return $this->quantity;}

public function setKidsAllow($kidsAllow){ $this->kidsAllow = $kidsAllow;}
public function getKidsAllow(){ return $this->kidsAllow;}

public function setIsDeleted($isDeleted){ $this->isDeleted = $isDeleted;}
public function getIsDeleted(){ return $this->isDeleted;}

public function setType($enumType){

	switch ($enumType) {
		case 1:
			$this->type = "EP";//Habitacion Estandar
			break;
		case 2:
			$this->type = "BB"; // Habitacion Estandar con Desayuno
			break;
		case 3:
			$this->type = "NR"; //No Reembolsable
			break;
		case 4:
			$this->type = "EPS"; //Habitacion Superior
		case 5:
			$this->type = "EPE"; //Habitacion Ejecutivo 
		default:
			$this->type = "EP";
			break;
	}
}
public function getType(){return $this->type;}

public function setCategory($enumCategory){

	switch ($enumCategory) {
		case 1:
			$this->category = "Estandar";
			break;
		case 2:
			$this->category = "Superior";
			break;
		case 3:
			$this->category = "Ejecutivo";
			break;
		default:
			$this->category = "Estandar";
			break;
	}
}
public function getCategory(){return $this->category;}

}

?>