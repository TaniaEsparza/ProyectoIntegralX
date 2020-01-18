<?php
class AreasPlantel{
	private $idAreaPlantel;
	private $NombreArea;
	private $Edificio;
	private $Estatus;

	function __construct(){
			$this-> idAreasPlantel=0;
			$this-> NombreArea=null;
			$this-> Edificio=null;
			$this-> Estatus=null;
		}

		public function setidAreasPlantel($idAreaPlantel){
			$this -> idAreaPlantel = $idAreaPlantel;
		}
		public function setNombreArea($NombreArea){
			$this -> NombreArea = $NombreArea;
		}
		public function setEdificio($Edificio){
			$this -> Edificio = $Edificio;
		}
		public function setEstatus($Estatus){
			$this -> Estatus = $Estatus;
		}

		public function getidAreasPlantel(){
			return $this -> idAreaPlantel;
        }
        public function getNombreArea(){
			return $this -> NombreArea;
        }
        public function getEdificio(){
			return $this -> Edificio;
        }
        public function getEstatus(){
			return $this -> Estatus;
        }
}
?>