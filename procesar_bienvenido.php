<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

require_once('tcpdf/tcpdf.php');

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$numero = $_POST['numero'];
$casa = $_POST['casa'];

$imagenJPG = $_FILES['imagen_jpg']['tmp_name'];
$imagenPNG = $_FILES['imagen_png']['tmp_name'];

// Obtén la imagen capturada en formato base64 desde el campo oculto
$imagenCapturada = $_POST['imagen_capturada'];

// Obtén los datos de la firma en formato base64 desde el campo oculto
$firmaCapturada = $_POST['datos_firma'];

$pdfSalida = 'plantillas/CONTRATOEDITABLE.pdf';

// Crear instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establecer metadatos
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tlaxicom');
$pdf->SetTitle('Contrato');

// Agregar una página
$pdf->AddPage();

// Configurar fuentes y estilos
$pdf->SetFont('helvetica', '', 12);

// Configurar el color del texto a negro
$pdf->SetTextColor(0, 0, 0);

// Configurar el color de fondo de la celda a blanco
$pdf->SetFillColor(255, 255, 255);

// Rellenar campos de formulario
$pdf->SetXY($pdf->GetPageWidth() / 2, 40); // Centrar horizontalmente
$pdf->Cell(0, 10, $nombre, 0, 1, 'C', 1); // Centrar el texto y agregar fondo blanco

$pdf->SetXY($pdf->GetPageWidth() / 2, 50);
$pdf->Cell(0, 10, $correo, 0, 1, 'C', 1);

$pdf->SetXY($pdf->GetPageWidth() / 2, 60);
$pdf->Cell(0, 10, $numero, 0, 1, 'C', 1);

$pdf->SetXY($pdf->GetPageWidth() / 2, 70);
$pdf->Cell(0, 10, $casa, 0, 1, 'C', 1);

// Insertar imágenes
$imagenWidth = 85; // Ancho de las imágenes
$imagenHeight = 50; // Altura de las imágenes
$separacion = 10; // Separación entre las dos imágenes

// Insertar imagen JPG
if (!empty($imagenJPG)) {
    $pdf->Image($imagenJPG, 20, 90, $imagenWidth, $imagenHeight);
}

// Insertar imagen PNG con separación
if (!empty($imagenPNG)) {
    $pdf->Image($imagenPNG, 20 + $imagenWidth + $separacion, 90, $imagenWidth, $imagenHeight);
}

// Insertar la firma desde el campo oculto (en formato base64)
if (!empty($firmaCapturada)) {
    $pdf->Image('@' . $firmaCapturada, 20 + 2 * ($imagenWidth + $separacion), 90, $imagenWidth, $imagenHeight);
}

// Salvar el PDF al servidor o enviarlo al navegador
ob_start(); // Start output buffering
$pdf->Output($pdfSalida, 'I'); // 'I' para mostrar, 'F' para guardar en un archivo
ob_end_flush(); // Flush and end output buffering
?>
