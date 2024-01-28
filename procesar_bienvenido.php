<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

require_once('tcpdf/tcpdf.php');

// Recoge los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$numero = $_POST['numero'];
$casa = $_POST['casa'];

// Rutas de las imágenes
$imagenJPG = $_FILES['imagen_jpg']['tmp_name'];
$imagenPNG = $_FILES['imagen_png']['tmp_name'];

// Ruta del archivo PDF de salida
$pdfSalida = 'formulario_contrato.pdf';

// Crear instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establecer metadatos
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Formulario Contrato');

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
$imagenWidth = 50; // Ancho de las imágenes
$imagenHeight = 50; // Altura de las imágenes

// Insertar imagen JPG
if (!empty($imagenJPG)) {
    $pdf->Image($imagenJPG, 20, 90, $imagenWidth, $imagenHeight);
}

// Insertar imagen PNG
if (!empty($imagenPNG)) {
    $pdf->Image($imagenPNG, 90, 90, $imagenWidth, $imagenHeight);
}

// Salvar el PDF al servidor o enviarlo al navegador
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename=' . $pdfSalida);
$pdf->Output($pdfSalida, 'I'); // 'I' para mostrar, 'F' para guardar en un archivo
?>
