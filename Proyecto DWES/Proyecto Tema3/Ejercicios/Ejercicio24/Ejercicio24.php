<!DOCTYPE html>
<html lang="es">
	<head>
		<title> USED Rodrigo Gutierrez </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="../estilosEjer.css">
	</head>
	<body>
		<h1>Ejercicio 24</h1>
		<h2>24. Trabajar en PlantillaFormulario.php mi plantilla para hacer formularios como churros.</h2>	
		<div id="ejercicio">
		<?php
				require '../../Libreria/FuncionesValidacion.php';
				$noError=true;
				$Alfabetico="";
				$AlfaNumerico="";
				$Integer="";
				$Float="";
				$Fecha="";
				$email="";
				$RadioButton="";
				$CheckBox="";
				$Select="";
				$Password="";								
				$mensajeError = array(
					"errorAlfabetico"=>null,
					"errorAlfanumerico"=>null,
					"errorInteger"=>null,
					"errorFloat"=>null,
					"errorFecha"=>null,	
					"errorEmail"=>null,
					"errorPassword"=>null,					
					);				
				if (isset($_POST['enviarFormulario'])){						
					$mensajeError["errorAlfabetico"]=comprobarTexto($_POST['alfabetico'],50);	
					$mensajeError["errorAlfanumerico"]=comprobarAlfaNumerico($_POST['alfaNumerico'],50,4);		
					$mensajeError["errorInteger"]=comprobarEntero($_POST['integer']);					
					$mensajeError["errorFloat"]=comprobarFloat($_POST['float']);										
					$mensajeError["errorFecha"]=validarFecha($_POST['fecha']);
					$mensajeError["errorEmail"]=validarEmail($_POST['email']);
					$mensajeError["errorPassword"]=comprobarAlfaNumerico($_POST['password'],8,4);										
					foreach ($mensajeError as &$valor){					
						if ($valor!=null){
							$noError=false;
						}
					}																		
				}
				if (isset($_POST['enviarFormulario']) && $noError==true){
					$alfabetico=htmlspecialchars(strip_tags(trim($_POST['alfabetico'])));
					$alfaNumerico=htmlspecialchars(strip_tags(trim($_POST['alfaNumerico'])));
					$integer=htmlspecialchars(strip_tags(trim($_POST['integer'])));					
					$float=htmlspecialchars(strip_tags(trim($_POST['float'])));					
					$fecha=$_POST['fecha'];
					$radioButton=$_POST['radioButtom'];
					$password=htmlspecialchars(strip_tags(trim($_POST['password'])));					
					$checkBox=$_POST['checkBox'];
					$select=$_POST['select'];
					$email=$_POST['email'];
					
					echo "<h1> Plantilla </h1>";
					echo "<p> Alfabetico: $alfabetico </p>";
					echo "<p> AlfaNumerico: $alfaNumerico </p>";
					echo "<p> Integer: $integer </p>";	
					echo "<p> Float: $float </p>";
					echo "<p> Fecha: $fecha </p>";
					echo "<p> RadioButton: $radioButton </p>";
					echo "<p> Password:  $password</p>";
					echo "<p> Email: $email </p>";					
					echo "<p> CheckBox </p>";
					echo "<p> Opcion1 </p>";
					if ($checkBox[0]==true){
						echo "<p> Seleccionado </p>";
					}else{
						echo "<p> No seleccionado </p>";
					}
					echo "<p> Opcion2 </p>";
					if (empty($checkBox[1])==true){
						$checkBox[1]=false;
					}
					if ($checkBox[1]==true){
						echo "<p> Seleccionado </p>";
					}else{
						echo "<p> No seleccionado </p>";
					}
					echo "<p> Opcion3 </p>";
					if (empty($checkBox[2])==true){
						$checkBox[2]=false;
					}
					if ($checkBox[2]==true){
						echo "<p> Seleccionado </p>";
					}else{
						echo "<p> No seleccionado </p>";
					}
					echo "<p> Select: $select </p>";	
				}
				else{					
					?>
					<form id="formulario" name="FormularioRegistro" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
						<p>Alfabetico : <input type="text" name="alfabetico" required 
						<?php if(isset($_POST['alfabetico']) && empty($mensajeError['errorAlfabetico'])){ echo 'value="',$_POST['alfabetico'],'"';}?>/>
						<span class="error"><?php echo $mensajeError['errorAlfabetico']; ?></span></p>
						<p>Alfanumerico : <input type="text" name="alfaNumerico" required
						<?php if(isset($_POST['alfaNumerico']) && empty($mensajeError['errorAlfanumerico'])){ echo 'value="',$_POST['alfaNumerico'],'"';}?>						>
						<span class="error"><?php echo $mensajeError['errorAlfanumerico']; ?></span></p>						
						<p>Integer: <input type="number" name="integer"  required 
						<?php if(isset($_POST['integer']) && empty($mensajeError['errorInteger'])){ echo 'value="',$_POST['integer'],'"';}?>/>
						<span class="error"><?php echo $mensajeError['errorInteger']; ?></span></p>	
						<p>Float: <input type="number" name="float" step="0.01"  required 
						<?php if(isset($_POST['float']) && empty($mensajeError['errorFloat'])){ echo 'value="',$_POST['float'],'"';}?>/>
						<span class="error"><?php echo $mensajeError['errorFloat']; ?></span></p>						
						<p>Fecha: <input type="date" name="fecha" required max="<?php echo date("Y-m-d");?>" min="1900-01-01"
						<?php if(isset($_POST['fecha']) && empty($mensajeError['errorFecha'])){ echo 'value="',$_POST['fecha'],'"';}?>>
						<span class="error"><?php echo $mensajeError['errorFecha']; ?></span></p>
						<p> Radio Buttom:<br/>
							<input type="radio" name="radioButtom" value="si"
							<?php if(!isset($_POST['radioButtom'])){ echo "checked";}?>
							<?php if(isset($_POST['radioButtom']) && $_POST['radioButtom']=="si" ){ echo "checked";}?>>
							Si<br/>
							<input type="radio" name="radioButtom" value="no"
							<?php if(isset($_POST['radioButtom']) && $_POST['radioButtom']=="no" ){ echo "checked";}?>>
							No<br/>
						</p>						
						<p>Correo electronico :<input type="email" name="email"
						<?php if(isset($_POST['email']) && empty($mensajeError['errorEmail'])){ echo 'value="',$_POST['email'],'"';}?>>
						<span class="error"><?php echo $mensajeError['errorEmail']; ?></span></p>
						<p> Contraseña : <input type="password" name="password"><span class="error"><?php echo $mensajeError['errorPassword']; ?></span></p>						
						<p> CheckBox<br/>
						<?php if(isset($_POST['checkBox'])){ $checkBox=$_POST['checkBox'];} ?>
						<input type="checkbox" name="checkBox[]" value="true"   
						<?php if(isset($checkBox[0]) && $checkBox[0]==true){ echo "checked";} ?>/>
						Opcion 1<br/>
						<input type="checkbox" name="checkBox[]" value="true" 
						<?php if(isset($checkBox[1]) && $checkBox[1]==true){ echo "checked";} ?>/>
						Opcion 2<br/>
						<input type="checkbox" name="checkBox[]" value="true" 
						<?php if(isset($checkBox[2]) && $checkBox[2]==true){ echo "checked";} ?>/>
						Opcion 3<br/></p>
						<p> Como conociste la pagina:
							<select name="select">
							  <option value="opcion1"
							  <?php if(isset($_POST['select']) && $_POST['select']=="opcion1"){ echo "selected";} ?>>
							  Opcion 1</option>
							  <option value="opcion2"
							  <?php if(isset($_POST['select']) && $_POST['select']=="opcion2"){ echo "selected";} ?>>
							  Opcion 2</option>
							  <option value="opcion3" 
							  <?php if(isset($_POST['select']) && $_POST['select']=="opcion3"){ echo "selected";} ?>>
							  Opcion 3</option>							  
							</select>
						</p>			
						<p><input name="enviarFormulario" type="submit" value="Enviar" /><input type="reset" /></p>				
					</form>
			<?php	}
				?>
		</div>	
	</body>
</html>

















