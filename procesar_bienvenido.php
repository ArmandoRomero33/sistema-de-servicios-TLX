<?php
require_once('tcpdf/tcpdf.php');

// Recoge los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
// Recoge más datos según sea necesario

// Crear instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establecer metadatos
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Formulario Relleno');

// Agregar una página
$pdf->AddPage();

// Configurar fuentes y estilos
$pdf->SetFont('helvetica', '', 12);

// Rellenar campos de formulario
$pdf->SetXY(10, 20);
$pdf->Cell(0, 10, 'Nombre: ' . $nombre, 0, 1);

$pdf->SetXY(10, 30);
$pdf->Cell(0, 10, 'Correo: ' . $correo, 0, 1);

// Rellenar más campos según sea necesario

// Salvar el PDF al servidor o enviarlo al navegador
$pdf->Output('formulario_rellenado.pdf', 'I');
