<?php



	class registro_puntos
	{
		public $id;
		public $fecha;
		public $registroFiscal;
		public $rfc;
		public $referencia;
		public $puntos;
		public $idCliente;
		public $estado;

		public function setId($id){ $this->id = $id; }
		public function getId(){ return $this->id; }

		public function setFecha($fecha){ $this->fecha = $fecha; }
		public function getFecha(){ return $this->fecha; }

		public function setRegistroFiscal($registroFiscal){$this->registroFiscal=$registroFiscal;}
		public function getRegistroFiscal(){return $this->registroFiscal;}

		public function setRfc($rfc){ $this->rfc = $rfc; }
		public function getRfc(){ return $this->rfc; }

		public function setReferencia($referencia){ $this->referencia = $referencia; }
		public function getReferencia(){ return $this->referencia; }

		public function setPuntos($puntos){ $this->puntos = $puntos; }
		public function getPuntos(){ return $this->puntos; }

		public function setIdCliente($idCliente){ $this->idCliente = $idCliente; }
		public function getIdCliente(){ return $this->idCliente; }

		public function setEstado($estado){ $this->estado=$estado; }
		public function getEstado(){ return $this->estado; }

	}

?>