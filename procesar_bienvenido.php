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
$paquete = $_POST['paquete'];    
$tarifa = $_POST['tarifa'];      
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = $_POST['serie'];
$equipo = $_POST['equipo'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$instalacion = $_POST['instalacion'];
// Obtener la opción seleccionada
$opcionSeleccionada = $_POST['opciones'];

$contenido = $_POST['contenido'];
$contenido2 = $_POST['contenido2'];
$contenido2 = $_POST['contenido3'];
$correo = $_POST['correo'];




// Mostrar la leyenda correspondiente en el PDF
if ($opcionSeleccionada === 'opcion1') {
    $contenido = 'Carnicería "Sadot" Av. 27 de septiembre #11 Terrenate De lunes a domingo 09:00 am a 05:00 pm';
                 $contenido2 = 'X';
} elseif ($opcionSeleccionada === 'opcion2') {
    $contenido = 'Yonatan Ugarte Juárez No. de cuenta: 0478144451 Tarjeta: 4555113012650786';
                  $contenido3 = 'X';
}



$plantillaPdf = 'CONTRATOEDITABLE.pdf';//----------------------------------plantilla
$pdfSalida = 'CONTRATOEDITABLE_CON_DATOS.pdf';//---------------------------Nombre del archivo

// Crear instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tlaxicom');
$pdf->SetTitle('Contrato');




// Agregar una página
$pdf->AddPage();

// fuentes y tamaño 
$pdf->SetFont('helvetica', '', 10);

// Cargar la plantilla como fondo
$templateImg = 'contrato_en_img/contrato1.jpg';  
$pdf->Image($templateImg, 15, 0, $pdf->getPageWidth()*1, $pdf->getPageHeight()-5, '', '', '', false, 300, '', false, false, 0);





// Configurar el color del texto a negro
$pdf->SetTextColor(22, 32, 42);

// Configurar el color de fondo de la celda a blanco
$pdf->SetFillColor(255, 255, 255);


$pdf->SetXY(30, 48);
$pdf->Text(30, 48, $nombre);
$pdf->SetXY(100, 48);
$pdf->Text(100, 48, $apellido1);
$pdf->SetXY(160, 48);
$pdf->Text(160, 48, $apellido2);
$pdf->SetXY(35, 69); 
$pdf->Text(35, 69, $calle);
$pdf->SetXY(82, 69); 
$pdf->Text(82, 69, $num_ext);
$pdf->SetXY(90, 69); 
$pdf->Text(90, 69, $num_int);
$pdf->SetXY(106, 69); 
$pdf->Text(106, 69, $colonia);
$pdf->SetXY(132, 69); 
$pdf->Text(132, 69, $alcaldia_municipio);
$pdf->SetXY(162, 69); 
$pdf->Text(162, 69, $estado);
$pdf->SetXY(190, 69); 
$pdf->Text(190, 69, $cp);
$pdf->SetXY(135, 83); 
$pdf->Text(135, 83, $rfc);
$pdf->SetXY(40, 125); 
$pdf->Text(40, 125, $paquete);
$pdf->SetXY(129, 115); 
$pdf->Text(129, 115, $tarifa);

////// Datos del equipo compra venta/////////////

$pdf->SetXY(60, 162); 
$pdf->Text(60, 162, $marca);
$pdf->SetXY(60, 168); 
$pdf->Text(60, 168, $modelo);
$pdf->SetXY(60, 174); 
$pdf->Text(60, 174, $serie);
$pdf->SetXY(60, 178); 
$pdf->Text(60, 178, $equipo);

////// instalacion de equipo/////////////


$pdf->SetXY(124, 168); 
$pdf->Text(124, 168, $fecha);
$pdf->SetXY(174, 168); 
$pdf->Text(174, 168, $hora);
$pdf->SetXY(150,162);
$pdf->Text(150,162, $instalacion);
$pdf->SetXY(0,0);
$pdf->Text(0,0, $opcionSeleccionada);
$pdf->SetXY(81,215);
$pdf->Text(81,215, $contenido);
$pdf->SetXY(81,218);
$pdf->Text(20,208, $contenido2);
$pdf->SetXY(81,218);
$pdf->Text(20,216, $contenido3);
$pdf->SetXY(150,161);


//=============================================PAGINA2=============================================================//

// Agregar una página
$pdf->AddPage();

// Configurar fuentes y letra
$pdf->SetFont('helvetica', '', 10);

// Cargar la plantilla como fondo 
$templateImg = 'contrato_en_img/2.jpg';  
$pdf->Image($templateImg, 15, 0, $pdf->getPageWidth()*1, $pdf->getPageHeight()-5, '', '', '', false, 300, '', false, false, 0);






$pdf->SetXY(77,105);
$pdf->Text(77,105, $correo);









// Insertar imágenes
$imagenWidth = 85; // Ancho de las imágenes
$imagenHeight = 50; // Altura de las imágenes




// Insertar imagen JPG
if (!empty($_FILES['imagen_jpg']['tmp_name'])) {
    $pdf->Image($_FILES['imagen_jpg']['tmp_name'], 50, 120, $imagenWidth, $imagenHeight);
}
if (!empty($_FILES['imagen_png']['tmp_name'])) {
    $pdf->Image($_FILES['imagen_png']['tmp_name'], 50 + $imagenWidth + 10, 120, $imagenWidth, $imagenHeight);
}


ob_start();
$pdf->Output('Contrato.pdf', 'I');  // Cambiado 'I' por 'D' para forzar la descarga
ob_end_flush();
?>