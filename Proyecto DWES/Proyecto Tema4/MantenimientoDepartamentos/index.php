<!DOCTYPE html>
<html>
<title> USED Rodrigo Gutierrez</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/DAW204/public_html/estilos2.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Tema 4<br/>Mantenimiento Departamentos</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="images/pagina-de-inicio.png"/>Inicio</a> 
    <a href="nuevo.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="images/005-anadir.png"/> Nuevo</a> 
    <a href="importar.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="images/004-importacion.png"/> Importar</a> 
    <a href="exportar.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img src="images/003-flecha-de-exportacion.png"/> Exportar</a>
	<a href="verCodigoMantenimiento.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="images/007-codificacion.png"/>Ver Codigo</a> 
	<a href="../tema4.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"><img class="w3-margin-right" src="/DAW204/public_html/Images/006-flecha-atras.png"/>volver</a>	
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Tema 4</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-xxxlarge"><b>Departamentos</b></h1>
  </div>
  <!-- Codigo PhP -->
  <?php 
				require '../../Proyecto Tema3/Libreria/FuncionesValidacion.php';
				require 'config.php';
				$noError=true;
				$codDepartamento="";								
				$mensajeError = array(
					"errorDescDepartamento"=>null,					
					);	
				if (isset($_POST['enviarBusqueda'])){											
					$mensajeError["errorDescDepartamento"]=comprobarAlfaNumerico($_POST['descDepartamento'],255);			
					foreach ($mensajeError as &$valor){					
						if ($valor!=null){
							$noError=false;
						}
					}					
				}
				if (isset($_POST['enviarBusqueda']) && !isset($_POST['salir']) && $noError==true){
					$descDepartamento=htmlspecialchars(strip_tags(trim($_POST['descDepartamento'])));							
					$descDepartamento="%".$descDepartamento."%";
					try{
						$conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password);					
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
						$consulta = "SELECT * FROM Departamento where DescDepartamento LIKE :descDepartamento";
						$sentencia = $conn->prepare($consulta); 
						$sentencia->bindParam(':descDepartamento', $descDepartamento);
						$sentencia->execute();					
						?>
						<div class="w3-container" id="contact" style="margin-top:75px;">
							<h1 class="w3-large w3-text-red"><b>Buscar</b></h1>
							<hr style="width:50px;border:5px solid red" class="w3-round">
							<form id="formulario" name="FormularioRegistro" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
								<div class="w3-section">
									<label class="w3-col">Descripcion</label>
									<input class="w3-input w3-border w3-half" type="text" name="descDepartamento" required value="<?php if(isset($_POST['descDepartamento'])){ echo $_POST['descDepartamento'];} ?>" >
									<span class="error"><?php echo $mensajeError['errorDescDepartamento']; ?></span>
								</div>      
								<button name="enviarBusqueda" type="submit" class="w3-button w3-block w3-quarter w3-red w3-margin-bottom w3-margin-left" value="Buscar">Buscar</button><br/>
							</form>  
							<div class="w3-margin-bottom w3-bar">
							<table class="w3-table w3-light-grey w3-center w3-bar w3-padding-large" >
								<tr>
									<th class="w3-dark-grey w3-xlarge w3-padding-32 " >Codigo</th>
									<th class="w3-red w3-xlarge w3-padding-32 " >Descripcion</th>
									<th class="w3-dark-grey w3-xlarge w3-padding-32 w3-center " >Modificaciones</th>
								</tr>
						<?php
							while ($departamento = $sentencia->fetch(PDO::FETCH_OBJ)) {						
							echo "<tr>";
								echo "<td>" . $departamento->CodDepartamento . "</td>"; 
								echo "<td>" . $departamento->DescDepartamento . "</td>";
								echo '<td class="w3-center"> <a href="editar.php?CodDepartamento='.$departamento->CodDepartamento.'&DescDepartamento='.$departamento->DescDepartamento.'"><img src="images/002-lapiz.png"/>editar</a>
						/<a href="borrar.php?CodDepartamento='.$departamento->CodDepartamento.'&DescDepartamento='.$departamento->DescDepartamento.'"><img src="images/001-cubo-de-basura.png"/>Borrar</a> </td>';
							echo "</tr>"; 
							}	
						$conn = null; 
					}
					catch (PDOException $e) {
						print "¡Error!: " . $e->getMessage() . "<br/>";
						die();
					}
				?>	
        </table>
      </div>
  </div>
				<?php }else{ ?>
  <!-- Contact -->
  <div class="w3-container" id="contact" style="margin-top:75px;">
		<h1 class="w3-xxlarge w3-text-red"><b>Buscar</b></h1>
		<hr style="width:50px;border:5px solid red" class="w3-round">
		<form id="formulario" name="FormularioRegistro" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
			<div class="w3-section">
									<label class="w3-col">Descripcion</label>
									<input class="w3-input w3-border w3-half" type="text" name="descDepartamento" required value="<?php if(isset($_POST['descDepartamento'])){ echo $_POST['descDepartamento'];} ?>" >
									<span class="error"><?php echo $mensajeError['errorDescDepartamento']; ?></span>
								</div>      
								<button name="enviarBusqueda" type="submit" class="w3-button w3-block w3-quarter w3-red w3-margin-bottom w3-margin-left" value="Buscar">Buscar</button><br/>
		</form>  
  <?php 
		try{
		$conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password);				
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$consulta = "SELECT * FROM Departamento";
		$sentencia = $conn->prepare($consulta); 					
		$sentencia->execute();
		?>
		<div class="w3-margin-bottom">
							<table class="w3-table w3-light-grey w3-center w3-bar w3-padding-large" >
								<tr>
									<th class="w3-dark-grey w3-xlarge w3-padding-32" >Codigo</th>
									<th class="w3-red w3-xlarge w3-padding-32" >Descripcion</th>
									<th class="w3-dark-grey w3-xlarge w3-padding-32 w3-center" >Modificaciones</th>
								</tr>
						<?php
							while ($departamento = $sentencia->fetch(PDO::FETCH_OBJ)) {						
							echo "<tr>";
								echo "<td>" . $departamento->CodDepartamento . "</td>"; 
								echo "<td>" . $departamento->DescDepartamento . "</td>";
								echo '<td class="w3-center"> <a href="editar.php?CodDepartamento='.$departamento->CodDepartamento.'&DescDepartamento='.$departamento->DescDepartamento.'"><img src="images/002-lapiz.png"/>editar</a>
						/<a href="borrar.php?CodDepartamento='.$departamento->CodDepartamento.'&DescDepartamento='.$departamento->DescDepartamento.'"><img src="images/001-cubo-de-basura.png"/>Borrar</a> </td>';
							echo "</tr>";  
							}	
						$conn = null; 
					}
					catch (PDOException $e) {
						print "¡Error!: " . $e->getMessage() . "<br/>";
						die();
					}
		}?>	
				</table>
			</div>
		</div>
 
<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">Powered by <a href="#" title="W3.CSS" target="_blank" class="w3-hover-opacity">Rodrigo Gutierrez</a></p></div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

</script>

</body>
</html>
