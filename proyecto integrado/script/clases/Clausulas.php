<?php
class Clausulas{
	private $idClausulas;
	private $Numero;
	private $Asunto;
	private $Motivo;
	private $Documentacion;
	private $Estatus;

	function __construct(){
			$this-> idClausulas=0;
			$this-> Numero=0;
			$this-> Asunto=null;
			$this-> Motivo=null;
			$this-> Documentacion=null;
			$this-> Estatus=null;
		}

		public function setidClausulas($idClausulas){
			$this -> idClausulas = $idClausulas;
		}
		public function setNumero($Numero){
			$this -> Numero = $Numero;
		}
		public function setAsunto($Asunto){
			$this -> Asunto = $Asunto;
		}
		public function setMotivo($Motivo){
			$this -> Motivo = $Motivo;
		}
		public function setDocumentacion($Documentacion){
			$this -> Documentacion = $Documentacion;
		}
		public function setEstatus($Estatus){
			$this -> Estatus = $Estatus;
		}

		public function getidClausulas(){
			return $this -> idClausulas;
        }
        public function getNumero(){
			return $this -> Numero;
        }
        public function getAsunto(){
			return $this -> Asunto;
        }
        public function getMotivo(){
			return $this -> Motivo;
        }
        public function getDocumentacion(){
			return $this -> Documentacion;
        }
        public function getEstatus(){
			return $this -> Estatus;
        }
}
?>