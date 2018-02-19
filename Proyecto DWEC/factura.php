
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
for ($i=0;$i<count($_SESSION['carrito'.$_SESSION['usuario']->getCodUsuario()]->getProductos());$i++){ 
            $productos=Producto::obtenerProductoCod($_SESSION['carrito'.$_SESSION['usuario']->getCodUsuario()]->getProductos()[$i]['codProducto']);
            $Marca[$i]=$productos->getMarca();
            $Nombre[$i]=$productos->getNombre();
            $Precio[$i]=$productos->getPrecio();
        }
ob_start(); //Start output buffer
for ($i=0;$i<count($_SESSION['carrito'.$_SESSION['usuario']->getCodUsuario()]->getProductos());$i++){
    echo "<tr>";
    echo "<td>$Marca[$i]</td>";
    echo "<td>$Nombre[$i]</td>";
    echo "<td>$Precio[$i]€</td>";
    echo "<td>".$_GET['cantidad'.$i]."</td>"; 
    echo "</tr>";
};
    echo "<tr>";
    echo '<td colspan="2" style="border: 1px transparent solid;background-color: white;"></td>';
    echo "<th>Total</th>";
    echo '<td style="color:red;border: 1px solid black;">'.$_GET['total'].'</td>';
    echo "<tr>";
$output = ob_get_contents(); //Grab output
ob_end_clean();
$html='<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Ejemplo de Documento en PDF.</title>
    <style>
        html {
            width: 210mm;
            height: 297mm;
        }

        body {
            width: 97%;
            margin: auto;
            height: 100%;
        }

        .cabezera {
            width: 97%;
            background-color: black;
            text-align: center;
            color: white;
            margin: auto;
        }

        .logoEmpresa {
            width: 65%;
            text-align: right;
            display: inline-block;
        }

        .Empresa {
            width: 100%;
            margin: auto;
            display: inline-block;
            text-align: right;
        }
        .main{
            width: 100%;
        }
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: lightgray;
        }

        .datos {
            width: 99%;
        }

        .productos {
            width: 100%;
            clear: both;
        }

        table#t01 tr:nth-child(even) {
            background-color: #eee;
        }

        table#t01 tr:nth-child(odd) {
            background-color: #fff;
        }

        table#t01 th {
            background-color: black;
            color: white;
        }

    </style>
</head>

<body>

    <div class="cabezera">
        <h1> Factura de Compra</h1>
    </div>
    <div class="main">
        <div class="Empresa">
            <p><strong> Tienda Rodrigo</strong></p>
            <p><strong> Calle Falsa 123</strong></p>
            <p><strong> Zamora, Benavente</strong></p>
            <p><strong> 980630000</strong></p>
        </div>
        <div class="LogoEmpresa">
            <img src="webroot/img/Razer-logo.png" height="152px" width="152px">
        </div>
        <div class="datos">
            <table style="width: 60%;">
                <caption>
                    <h2>Datos Facturacion</h2>
                </caption>
                <tr>
                    <th>Nombre</th>
                    <td>'.$nombre.'</td>
                </tr>
                <tr>
                    <th>Apellidos</th>
                    <td>'.$apellidos.'</td>
                </tr>
                <tr>
                    <th>Direccion</th>
                    <td>'.$direccion.'</td>
                </tr>
                <tr>
                    <th>Correo Electronico</th>
                    <td>'.$email.'</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="productos" style="margin-top:30px;">
        <table id="t01" style="width: 100%;">
            <caption>
                <h2>Productos</h2>
            </caption>
            <tr>
                <th>Marca</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
            '.$output.'
        </table>
    </div>
</body>

</html>

';
unset($_SESSION['carrito'.$_SESSION['usuario']->getCodUsuario()]);
//echo $html;
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

header("Location: index.php");       

