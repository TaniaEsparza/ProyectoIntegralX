<?php 
$Id=$_GET['id'];
$NombreConcepto=$_GET['Concepto'];
$Monto = $_GET['Monto'];
$Estatus = $_GET['Estatus'];

include_once "../ConceptosdePago.php";
include_once "../SQLControlador.php";

$ConceptosdePago = new ConceptosdePago();
$ConceptosdePago->setidConceptoDePago($Id);
$ConceptosdePago->setNombreConcepto($NombreConcepto);
$ConceptosdePago->setMonto($Monto);
$ConceptosdePago->setEstatus($Estatus);

$SQLControlador = new SQLControlador();
echo $SQLControlador->ModificarConceptosPago($ConceptosdePago);

?>