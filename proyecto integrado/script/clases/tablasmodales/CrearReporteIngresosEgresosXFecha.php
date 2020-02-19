<?php 
	class CrearReporteIngresosEgresosXFecha{
		public function CrearReporte($FechaInicial, $FechaFinal){
		echo "<script language='javascript'>window.open ('../../reportes/IngresosEgresosFecha.php?FechaInicial=".$FechaInicial."&FechaFinal=".$FechaFinal."','_blank')</script>";
		echo "<script language='javascript'>window.location = '../../formularios/administrativo/ConsultaGeneralIngresosEgresosFecha.php'</script>";
		}
	}		
 ?>