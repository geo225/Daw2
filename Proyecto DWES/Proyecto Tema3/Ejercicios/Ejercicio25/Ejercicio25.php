<!DOCTYPE html>
<html lang="es">
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1> Codigo Ejercicio 25 </h1>
		<h2>25. Probar la plantilla anterior desarrollando un formulario que recoja la temperatura y 
		la presión atmosférica en una serie de fechas y (cuando el usuario lo decida) genere un 
		informe con los datos recibidos y un promedios, mínimos y máximos de temperatura 
		y presión atmosférica.</h2>		
		<div id="ejercicio">
		<?php
				require '../../Libreria/FuncionesValidacion.php';
				$noError=true;
				$archivo = "contador.txt";
				$fp = fopen($archivo,"r");
				$contador = fgets($fp, 26);
				fclose($fp);
				session_start();				
				$registro=array();				
				$registro[$contador]=array (
								'fecha' => "",
								'temperatura' => "",
								'presion' => "",								
								);	
				$mensajeError = array(
					"errorPresion"=>"",
					"errorTemperatura"=>"",
					"errorFecha"=>"",					
					);		
				if (isset($_POST['registro'])){
						$mensajeError["errorPresion"]=comprobarEntero($_POST['presion']);					
						$mensajeError["errorTemperatura"]=comprobarFloat($_POST['temperatura']);										
						$mensajeError["errorFecha"]=validarFecha($_POST['fecha']);		
					foreach ($mensajeError as &$valor){					
						if ($valor!=null){
							$noError=false;
						}
					}																			
				}
				if (isset($_POST['registro']) && $noError==true){
					$_SESSION["registro"]=$registro[$contador]=array (
											'fecha' => $_POST['fecha'],
											'temperatura' => htmlspecialchars(strip_tags(trim($_POST['temperatura']))),
											'presion' => htmlspecialchars(strip_tags(trim($_POST['presion']))),								
											);
					++$contador; 
					$fp = fopen($archivo,"w+"); 
					fwrite($fp, $contador, 26); 
					fclose($fp);
				}	
				if (isset($_POST['calculo']) && $noError==true)
				{	
					$_SESSION["registro"]=$registro[$contador]=array (
								'fecha' => $_POST['fecha'],
								'temperatura' => htmlspecialchars(strip_tags(trim($_POST['temperatura']))),
								'presion' => htmlspecialchars(strip_tags(trim($_POST['presion']))),								
								);	
					echo $contador;
					echo "<p> Fecha <p>";
					for ($i = 0 ; $i <= $contador ; $i++){
					echo $_SESSION["registro"]['fecha'];
					}
					echo "<p> Temperatura </p>";
						for ($i = 0 ; $i <= $contador ; $i++){
					echo$_SESSION["registro"][$i]['temperatura'];
					}
					echo "<p> Presión </p>";
					for ($i = 0 ; $i <= $contador ; $i++){
						echo $_SESSION["registro"][$i]['presion'];
					}
					echo "<p> Temperatura Maxima </p> ";
					for ($i = 0 ; $i <= $contador ; $i++){
						$tempMax=0;
						if ($tempMax<=max(array($_SESSION["registro"][$i]['temperatura'])))
						{
						$tempMax=max(array($_SESSION["registro"][$i]['temperatura']));
						}
					}
					echo $tempMax;
					echo "<p> Temperatura Minima </p>";
					for ($i = 0 ; $i <= $contador ; $i++){
						$tempMin=0;
						if ($tempMin<=min(array($_SESSION["registro"][$i]['temperatura'])))
						{
						$tempMin=min(array($_SESSION["registro"][$i]['temperatura']));
						}
					}
					echo $tempMin;
					echo "<p> Promedio Temperatura </p>";
					// echo array_sum(array($registro['temperatura']))/count(array($registro['temperatura']));
					echo "<p> Presion Maxima </p> ";
					for ($i = 0 ; $i <= $contador ; $i++){
						$preMax=0;
						if ($tempMax<=max(array($_SESSION["registro"][$i]['presion'])))
						{
						$tempMax=max(array($_SESSION["registro"][$i]['presion']));
						}
					}
					echo $preMax;
					echo "<p> Presion Minima </p>";
					for ($i = 0 ; $i <= $contador ; $i++){
						$tempMin=0;
						if ($tempMin<=min(array($_SESSION["registro"][$i]['presion'])))
						{
						$tempMin=min(array($_SESSION["registro"][$i]['presion']));
						}
					}
					echo $tempMin;
					echo "<p> Promedio Presion </p>";
					// echo array_sum(array($registro['presion']))/count(array($registro['temperatura']));
					$fp = fopen($archivo,"w+"); 
					fwrite($fp, 0, 26); 
					fclose($fp);
					unset($_SESSION["registro"]);
				}	
				else{					
					?>
					<form id="formulario" name="FormularioRegistro" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
						<p>Fecha: <input type="date" name="fecha"  max="<?php echo date("Y-m-d");?>" min="1900-01-01"
						<?php if(isset($_POST['fecha']) && empty($mensajeError['errorFecha'])){ echo 'value="',$_POST['fecha'],'"';}?>>
						<span class="error"><?php echo $mensajeError['errorFecha']; ?></span></p>					
						<p>Temperatura: <input type="number" name="temperatura" step="0.01" max="50" min="-30"  
						<?php if(isset($_POST['temperatura']) && empty($mensajeError['errorTemperatura'])){ echo 'value="',$_POST['temperatura'],'"';}?>/>
						<span class="error"><?php echo $mensajeError['errorTemperatura']; ?></span></p>
						<p>Presion: <input type="number" name="presion" max="1050" min="950"  
						<?php if(isset($_POST['presion']) && empty($mensajeError['errorPresion'])){ echo 'value="',$_POST['presion'],'"';}?>/>
						<span class="error"><?php echo $mensajeError['errorPresion']; ?></span></p>	
						<p><input name="registro" type="submit" value="Registro" /><input name="calculo" type="submit" value="calculo" /><input type="reset" /></p>				
					</form>
			<?php	}
				?>
		</div>	
	</body>
</html>
