
<?php 
# Cargamos la librería dompdf.
require_once 'core/dompdf/autoload.inc.php';

# Contenido HTML del documento que queremos generar en PDF.
$html='
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Ejemplo de Documento en PDF.</title>
</head>
<body>

<h2>Ingredientes para la realización de Postres.</h2>
<p>Ingredientes:</p>
<dl>
<dt>Chocolate</dt>
<dd>Cacao</dd>
<dd>Azucar</dd>
<dd>Leche</dd>
<dt>Caramelo</dt>
<dd>Azucar</dd>
<dd>Colorantes</dd>
</dl>

</body>
</html>';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('hello world');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'vertical');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();