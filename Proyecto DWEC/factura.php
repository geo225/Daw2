
<?php 
# Cargamos la librería dompdf.
require_once 'core/dompdf/autoload.inc.php';
require_once ('model/Producto.php'); //incluimos el Modelo
    require_once ('model/Usuario.php');
    require_once ('model/Carrito.php');
session_start();
# Contenido HTML del documento que queremos generar en PDF.
$nombre=$_SESSION['usuario']->getCodUsuario();
$apellidos=$_SESSION['usuario']->getApellidos();
$direccion=$_SESSION['usuario']->getDireccion();
$email=$_SESSION['usuario']->getEmail();
for ($i=0;$i<count($_SESSION['carrito']->getProductos());$i++){
            $productos=Producto::obtenerProductoCod($_SESSION['carrito']->getProductos()[$i]['codProducto']);
            $Marca[$i]=$productos->getMarca();
            $Nombre[$i]=$productos->getNombre();
            $Precio[$i]=$productos->getPrecio();
        }
ob_start(); //Start output buffer
for ($i=0;$i<count($_SESSION['carrito']->getProductos());$i++){
    echo "<p> Marca:  $Marca[$i]</p>";
    echo "<p> Nombre: $Nombre[$i]</p>";
    echo "<p> Precio: $Precio[$i]€</p>";
    echo "<p> Cantidad: ".$_GET['cantidad'.$i]."</p>";    
};
    echo '<p style="color:red"> Total:'.$_GET['total'].'</p>';
$output = ob_get_contents(); //Grab output
ob_end_clean();
$html='
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Ejemplo de Documento en PDF.</title>
</head>
<body style="width:100%;margin:auto;text-align:center">

<h2>Datos Personales:</h2>
<p>Nombre: '.$nombre.'</p>
<p>Apellidos: '.$apellidos.'</p>
<p>Direccion: '.$direccion.'</p>
<p>Correo Electronico: '.$email.'
<h2>Productos:</h2>    
'.$output.'    
</body>
</html>';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'vertical');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('factura.pdf');