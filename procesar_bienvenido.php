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

$tefono = $_POST['telefono'];
$paquete = $_POST['paquete'];    
$tarifa = $_POST['tarifa'];      
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = isset($_POST['serie']) ? $_POST['serie'] : 'N/A';





$equipo = $_POST['equipo'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$firmaBase64 = $_POST['firma'];

// Obtener la opción seleccionada
$opcionSeleccionada = $_POST['opciones'];

$contenido = $_POST['contenido'];
$contenido2 = $_POST['contenido2'];
$contenido2 = $_POST['contenido3'];

$fecha_2 = $_POST['fecha_2'];

$fechaObjeto = new DateTime($fecha_2);

// Mapear nombres de los meses en inglés a español
$mesesEspañol = array(
    'January' => 'enero',
    'February' => 'febrero',
    'March' => 'marzo',
    'April' => 'abril',
    'May' => 'mayo',
    'June' => 'junio',
    'July' => 'julio',
    'August' => 'agosto',
    'September' => 'septiembre',
    'October' => 'octubre',
    'November' => 'noviembre',
    'December' => 'diciembre'
);

// Obtener el nombre en español del mes
$mesEnEspañol = $mesesEspañol[$fechaObjeto->format('F')];

// Formatear la fecha con el día, nombre completo del mes y año en español
$fecha_2 = $fechaObjeto->format('d') . ' ' . $mesEnEspañol . ' ' . $fechaObjeto->format('Y');

// Ahora puedes usar $fecha_2 como lo necesites en tu código



$correo = $_POST['correo'];

if (!empty($correo)) {
    echo " $correo";
    $notificacion1 = 'X';
    $notificacion2 = 'X';
    $notificacion3 = 'X';
    // Aquí puedes realizar otras acciones con el correo electrónico
} else {
    echo "";
}

// Puedes agregar más palabras y posiciones según sea necesario




// Decodificar la firma base64 y guardarla en un archivo temporal
$firmaTmp = tempnam(sys_get_temp_dir(), 'firma');
file_put_contents($firmaTmp, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $firmaBase64)));


//---------------------------------------servicios adicionales-- despliege de cuestionario----------
$servicio1 = $_POST['servicio1'];
$descripcion1 = $_POST['descripcion1'];
$costo1 = $_POST['costo1'];

$servicio2 = $_POST['servicio2'];
$descripcion2 = $_POST['descripcion2'];
$costo2 = $_POST['costo2'];




// Mostrar la leyenda correspondiente en el PDF
if ($opcionSeleccionada === 'opcion1') {
    $contenido = 'Carnicería "Sadot"';
             $conte4 ='Av. 27 de septiembre #11 Terrenate' ;
              $conte5 = 'lunes a domingo 09:00 am a 05:00 pm';
                 $contenido2 = 'X';

} elseif ($opcionSeleccionada === 'opcion2') {
    $contenido = 'Yonatan Ugarte Juárez';
                 $conte6 = 'No. de cuenta: 0478144451';
                 $conte7 = 'Tarjeta: 4555113012650786';
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
$pdf->SetXY(91, 69); 
$pdf->Text(91, 69, $num_int);
$pdf->SetXY(106, 69); 
$pdf->Text(106, 69, $colonia);
$pdf->SetXY(132, 69); 
$pdf->Text(132, 69, $alcaldia_municipio);

$pdf->SetXY(162, 69); 
$pdf->Text(162, 69, $estado);
$pdf->SetXY(190, 69); 
$pdf->Text(190, 69, $cp);
$pdf->SetXY(85, 83); 
$pdf->Text(85, 83, $tefono);


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
$pdf->Text(150,162, $calle);
$pdf->SetXY(-50,-50);
$pdf->Text(-50,-50, $opcionSeleccionada);
//----------------------------------referencia transferencia---------
$pdf->SetXY(81,212);
$pdf->Text(81,212, $contenido);

$pdf->SetXY(81,216);
$pdf->Text(81,216, $conte4);
$pdf->SetXY(81,220);
$pdf->Text(81,220, $conte5);


$pdf->SetXY(81,216);
$pdf->Text(81,216, $conte6);
$pdf->SetXY(81,220);
$pdf->Text(81,220, $conte7);




$pdf->SetXY(81,218);
$pdf->Text(20,208, $contenido2);
$pdf->SetXY(81,218);
$pdf->Text(20,216, $contenido3);
$pdf->SetXY(150,161);

// Insertar la imagen de la firma en el PDF
$pdf->Image($firmaTmp, 90, 235, 35, 25);



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
// Insertar la imagen de la firma en el PDF
$pdf->Image($firmaTmp, 158, 97, 35, 25);

// Insertar la imagen de la firma en el PDF
$pdf->Image($firmaTmp, 50, 110, 35, 25);
$pdf->SetXY(88, 213); 
$pdf->Text(88, 213, $alcaldia_municipio);

$pdf->SetXY(113,213);
$pdf->Text(113,213, $fecha_2);
// Insertar la imagen de la firma en el PDF
$pdf->Image($firmaTmp, 112, 220, 50, 30);


$pdf->SetXY(42,100);
$pdf->Text(42,100, $notificacion1);
$pdf->SetXY(115,100);
$pdf->Text(115,100, $notificacion2);
$pdf->SetXY(177,100);
$pdf->Text(177,100, $notificacion3);




$pdf->SetXY(30,47);
$pdf->Text(30,47, $servicio1);

$pdf->SetXY(120,47);
$pdf->Text(120,47, $servicio2);

$pdf->SetXY(25,60);
$pdf->Text(25,60, $descripcion1);

$pdf->SetXY(115,60);
$pdf->Text(115,60, $descripcion2);

$pdf->SetXY(103,53);
$pdf->Text(103,53, $costo1);

$pdf->SetXY(190,53);
$pdf->Text(190,53, $costo2);









// Insertar imágenes
$imagenWidth = 85; // Ancho de las imágenes
$imagenHeight = 50; // Altura de las imágenes

///-----------------------------------------------------pagina 3----------------------------------

// Agregar una página
$pdf->AddPage();

// Configurar fuentes y letra
$pdf->SetFont('helvetica', '', 10);

// Cargar la plantilla como fondo 
$templateImg = 'contrato_en_img/3.jpg';  
$pdf->Image($templateImg, 15, 0, $pdf->getPageWidth()*1, $pdf->getPageHeight()-5, '', '', '', false, 300, '', false, false, 0);




//-------------------------------------------pagina 4--------------------------------


// Agregar una página
$pdf->AddPage();

// Configurar fuentes y letra
$pdf->SetFont('helvetica', '', 10);

// Cargar la plantilla como fondo 
$templateImg = 'contrato_en_img/4.jpg';  
$pdf->Image($templateImg, 15, 0, $pdf->getPageWidth()*1, $pdf->getPageHeight()-5, '', '', '', false, 300, '', false, false, 0);


//-------------------------------------------------pagina 5------------------------------------


// Agregar una página
$pdf->AddPage();

// Configurar fuentes y letra
$pdf->SetFont('helvetica', '', 10);

// Cargar la plantilla como fondo 
$templateImg = 'contrato_en_img/5.jpg';  
$pdf->Image($templateImg, 15, 0, $pdf->getPageWidth()*1, $pdf->getPageHeight()-5, '', '', '', false, 300, '', false, false, 0);

//-------------------------------------------------pagina 6------------------------------------


// Agregar una página
$pdf->AddPage();

// Configurar fuentes y letra
$pdf->SetFont('helvetica', '', 10);

// Cargar la plantilla como fondo 
$templateImg = 'contrato_en_img/6.jpg';  
$pdf->Image($templateImg, 15, 0, $pdf->getPageWidth()*1, $pdf->getPageHeight()-5, '', '', '', false, 300, '', false, false, 0);

//-------------------------------------------------pagina 5------------------------------------


// Agregar una página
$pdf->AddPage();

// Configurar fuentes y letra
$pdf->SetFont('helvetica', '', 10);

// Cargar la plantilla como fondo 
$templateImg = '';  
$pdf->Image($templateImg, 15, 0, $pdf->getPageWidth()*1, $pdf->getPageHeight()-5, '', '', '', false, 300, '', false, false, 0);






//------------------------------------insertar imagenes-------------------------------------
/// Obtener la primera fotografía del formulario
if (isset($_FILES['foto1']) && $_FILES['foto1']['error'] == 0) {
    $foto1Tmp = $_FILES['foto1']['tmp_name'];

    // Insertar la primera imagen en el PDF
    $pdf->Image($foto1Tmp, 10, 10, 120,80); // Ajusta las coordenadas y dimensiones según tu diseño
}

// Obtener la segunda fotografía del formulario
if (isset($_FILES['foto2']) && $_FILES['foto2']['error'] == 0) {
    $foto2Tmp = $_FILES['foto2']['tmp_name'];

    // Insertar la segunda imagen en el PDF
    $pdf->Image($foto2Tmp, 10, 100, 120, 80); // Ajusta las coordenadas y dimensiones según tu diseño
}

// Resto del código...

ob_start();
$pdf->Output($nombre. $apellido1. $apellido2.'Contrato.pdf', 'I');
ob_end_flush();

// Eliminar los archivos temporales de las fotos
unlink($firmaTmp);
unlink($foto1Tmp);
unlink($foto2Tmp);


