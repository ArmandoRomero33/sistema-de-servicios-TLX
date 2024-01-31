<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

require('tcpdf/tcpdf.php');

$nombre = $_POST['nombre'];
$apellido1 =$_POST['apellido1'];
$apellido2 = $_POST['apellido2'];


$calle = $_POST['calle'];
$num_ext = $_POST['num_ext'];
$num_int = $_POST['num_int'];
$colonia = $_POST['colonia'];
$alcaldia_municipio = $_POST['alcaldia_municipio'];
$estado = $_POST['estado'];
$cp = $_POST['cp'];
$rfc = $_POST['rfc'];
$tefono = $_POST['telefono'];
$paquete = $_POST['paquete'];    // Obtener el valor del campo "Paquete"
$tarifa = $_POST['tarifa'];      // Obtener el valor del campo "Tarifa"



// Ruta de la plantilla PDF
$plantillaPdf = 'CONTRATOEDITABLE.pdf';
$pdfSalida = 'CONTRATOEDITABLE_CON_DATOS.pdf';

// Crear instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establecer metadatos
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tlaxicom');
$pdf->SetTitle('Contrato');

// Agregar una página
$pdf->AddPage(1);

// Configurar fuentes y estilos
$pdf->SetFont('helvetica', '', 12);

// Cargar la plantilla como fondo y ajustar al tamaño de la página
$templateImg = 'contrato_en_img/contrato1.jpg';  // Cambia 'plantilla.png' por el nombre de tu plantilla
$pdf->Image($templateImg, 15, 0, $pdf->getPageWidth()*1, $pdf->getPageHeight()-5, '', '', '', false, 300, '', false, false, 0);





// Configurar el color del texto a negro
$pdf->SetTextColor(22, 32, 42);

// Configurar el color de fondo de la celda a blanco
$pdf->SetFillColor(255, 255, 255);

// Rellenar campos de formulario
$pdf->SetXY(30, 48); // Posición para el nombre
$pdf->Text(30, 48, $nombre);

// Rellenar campos de formulario
$pdf->SetXY(100, 48); // Posición para el nombre
$pdf->Text(100, 48, $apellido1);
// Rellenar campos de formulario
$pdf->SetXY(160, 48); // Posición para el nombre
$pdf->Text(160, 48, $apellido2);



// Rellenar campos de formulario
$pdf->SetXY(35, 69); // Posición para la calle
$pdf->Text(35, 69, $calle);

// Rellenar campos de formulario
$pdf->SetXY(82, 69); // Posición para el número exterior
$pdf->Text(82, 69, $num_ext);

// Rellenar campos de formulario
$pdf->SetXY(92, 69); // Posición para el número interior
$pdf->Text(92, 69, $num_int);

// Rellenar campos de formulario
$pdf->SetXY(106, 69); // Posición para la colonia
$pdf->Text(106, 69, $colonia);

// Rellenar campos de formulario
$pdf->SetXY(132, 69); // Posición para la alcaldía/municipio
$pdf->Text(132, 69, $alcaldia_municipio);

// Rellenar campos de formulario
$pdf->SetXY(162, 69); // Posición para el estado
$pdf->Text(162, 69, $estado);

// Rellenar campos de formulario
$pdf->SetXY(190, 69); // Posición para el código postal
$pdf->Text(190, 69, $cp);

// Rellenar campos de formulario
$pdf->SetXY(135, 83); // Posición para el RFC
$pdf->Text(135, 83, $rfc);



$pdf->SetXY(35, 93); // Posición para el Paquete
$pdf->Text(35, 93, $paquete);

$pdf->SetXY(129, 115); // Posición para la Tarifa
$pdf->Text(129, 115, $tarifa);





// Agregar una página
$pdf->AddPage(2);

// Configurar fuentes y estilos
$pdf->SetFont('helvetica', '', 12);

// Cargar la plantilla como fondo y ajustar al tamaño de la página
$templateImg = 'contrato_en_img/2.jpg';  // Cambia 'plantilla.png' por el nombre de tu plantilla
$pdf->Image($templateImg, 15, 0, $pdf->getPageWidth()*1, $pdf->getPageHeight()-5, '', '', '', false, 300, '', false, false, 0);





// Insertar imágenes
$imagenWidth = 85; // Ancho de las imágenes
$imagenHeight = 50; // Altura de las imágenes



// Insertar imagen JPG
if (!empty($_FILES['imagen_jpg']['tmp_name'])) {
    $pdf->Image($_FILES['imagen_jpg']['tmp_name'], 50, 120, $imagenWidth, $imagenHeight);
}

// Insertar imagen PNG con separación

if (!empty($_FILES['imagen_png']['tmp_name'])) {
    $pdf->Image($_FILES['imagen_png']['tmp_name'], 50 + $imagenWidth + 10, 120, $imagenWidth, $imagenHeight);
}




// 

// Salvar el PDF al servidor o enviarlo al navegador
ob_start(); // Iniciar el almacenamiento en búfer de salida
$pdf->Output($pdfSalida, 'I'); // 'I' para mostrar, 'F' para guardar en un archivo
ob_end_flush(); // Liberar el búfer de salida
?>
