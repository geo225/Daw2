<html>
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 4</h1>
		<h2>4. Mostrar en tu página index la fecha y hora actual en Oporto formateada en portugués.</h2>
		<div id="ejercicio">
			<?php
				date_default_timezone_set('Europe/Lisbon');
				$hora = date("G:i");
				$diaNumero = date("j");
				$dia = null;
				$mes = null;
				$anio = date("Y");
				switch ( date("D")) {
					case 'Mon':					
						$dia="Lunes";
						break;					
					case "Tue":					
						$dia="Martes";
						break;					
					case "Wed":					
						$dia="Miercoles";
						break;					
					case "Thu":					
						$dia="Jueves";
						break;					
					case "Fri":					
						$dia="Viernes";
						break;
				}
				switch ( date("M")) {
					case 'Jan':					
						$mes="Enero";
						break;					
					case "Feb":					
						$mes="Febrero";
						break;					
					case "Mar":					
						$mes="Marzo";
						break;					
					case "Apr":					
						$mes="Abril";
						break;					
					case "May":					
						$mes="Mayo";
						break;
					case "Jun":					
						$mes="Junio";
						break;
					case "Jul":					
						$mes="Julio";
						break;
					case "Aug":					
						$mes="Agosto";
						break;
					case "Sep":					
						$mes="Septiembre";
						break;
					case "Oct":					
						$mes="Octubre";
						break;
					case "Nov":					
						$mes="Noviembre";
						break;
					case "Dec":					
						$mes="Diciembre";
						break;
					
				}				
				echo $hora,' ',$dia,' ',$diaNumero,' de ',$mes,' del ',$anio;
			?>
		</div>	
	</body>
</html>