<?php
class AreaPlantel{
	private $idAreaPlantel;
	private $NombreArea
	private $Edificio;
	private $Estatus;

	function __construct(){
			$this-> idAreaPlantel=0;
			$this-> NombreArea=0;
			$this-> Edificio=null;
			$this-> Motivo=null;
			$this-> Documentacion=null;
			$this-> Estatus=null;
		}

		public function setidAreaPlantel($idAreaPlantel){
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

		public function getidAreaPlantel(){
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