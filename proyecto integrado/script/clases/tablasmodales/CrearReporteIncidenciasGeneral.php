<?php 
	class CrearReporteIncidenciasGeneral{
		public function CrearReporte($FechaInicial, $FechaFinal){
		echo "<script language='javascript'>alert('¡¡Entre!!')</script>";

		echo "<script language='javascript'>window.open ('../../reportes/IncidenciasFecha.php?FechaInicial=".$FechaInicial."&FechaFinal=".$FechaFinal."','_blank')</script>";
		echo "<script language='javascript'>window.location = '../../formularios/administrativo/ConsultaGeneralIncidencia.php'</script>";

		}
	}		
 ?>