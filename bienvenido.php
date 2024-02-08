<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</title>
    <!-- Agrega la biblioteca signature_pad -->
    <script src="https://unpkg.com/signature_pad"></script>
    <link rel="stylesheet" href="styles/bienvenido.css">
    
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
<<<<<<< HEAD
  
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>

=======
>>>>>>> 2905028ec438c44af82327f2a3a67c7d9846b043

</head>
<body>
    
    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?>Te encuentras en el módulo de contratos es el primer paso hacia una experiencia única en conectividad.</h2>
 
    <p><a href="cerrar_sesion.php" class="logout-btn">Cerrar sesión</a></p>

    <form action="procesar_bienvenido.php" method="post" enctype="multipart/form-data">
    <h1> Suscriptor</h1>
        Nombre: <input type="text" name="nombre" required><br>
        Apellido Paterno: <input type="text" name="apellido1" required><br>
        Apellido Materno: <input type="text" name="apellido2" required><br>
      
        Calle: <input type="text" name="calle" required><br>
        #Ext: <input type="text" name="num_ext" required><br>
        #Int: <input type="text" name="num_int"><br>
        Colonia: <input type="text" name="colonia" required><br>
        Alcaldía/Municipio: <input type="text" name="alcaldia_municipio" required><br>
        Estado: <input type="text" name="estado" required><br>
        C.P: <input type="text" name="cp" required><br>
<<<<<<< HEAD
       
=======
        RFC: <input type="text" name="rfc" required><br>

>>>>>>> 2905028ec438c44af82327f2a3a67c7d9846b043
        Telefono: <input type="text" name="telefono" required><br>
        <h1>Servicio de Internet Fijo en Casa</h1>

        Paquete: <input type="text" name="paquete" required><br>
        Tarifa: <input type="text" name="tarifa" required><br>
     
     <h1>Datos del equipo Compra Venta</h1>

       Marca:<input type="text" name="marca" required><br>
       Modelo:<input type="text" name="modelo" required><br>
       Serie:<input type="text" name="serie" required><br>
       NO.Equipos:<input type="text" name="equipo" required><br>
       
     <h1>Instalacion del Equipo</h1>

 
     Fecha: <input type="date" name="fecha" require><br>
     Hora: <input type="time" name="hora" require><br>
     
<<<<<<< HEAD
     
=======
     Instalacion del equipo: <input type="text" name="instalacion" require><br>
>>>>>>> 2905028ec438c44af82327f2a3a67c7d9846b043


     


<h1>Metodos de Pago</h1>


     

<!-- ...............................(Metodos de pago Formulario)........................ -->

<label for="opciones">Seleccione un metodo de pago:</label>
<select id="opciones" name="opciones" require>
    <option value="opcion1">Efectivo</option>
    <option value="opcion2">Transferencia</option>
  
</select>


<!-- Contenedor para las leyendas (inicialmente oculto) -->
<div id="leyendas">
    <!-- Leyendas diferentes para cada respuesta seleccionada -->
    <p id="leyenda_opcion1" style="display: none;">Carniceria "Sadot" Av. 27 de septiembre #11 Terrenate De lunes a domingo 09:00 am a 05:00 pm</p>
    <p id="leyenda_opcion2" style="display: none;">Yonatan Ugarte Juárez No. de cuenta: 0478144451 Tarjeta: 4555113012650786</p>

</div>

<!-- Script JavaScript para manejar la visibilidad de las leyendas -->
<script>
    
    document.getElementById('opciones').addEventListener('change', function() {
        var seleccionado = this.value;
        var leyendas = document.getElementById('leyendas');

        // Muestra u oculta las leyendas según la respuesta seleccionada
        var leyendaOpcion1 = document.getElementById('leyenda_opcion1');
        var leyendaOpcion2 = document.getElementById('leyenda_opcion2');
       

        leyendaOpcion1.style.display = (seleccionado === 'opcion1') ? 'block' : 'none';
        leyendaOpcion2.style.display = (seleccionado === 'opcion2') ? 'block' : 'none';
     

        // Muestra el contenedor de leyendas
        leyendas.style.display = 'block';
    });
</script>
















    
    <!-- ....................... (Despliege de preguntas para servicios extra)............... -->

    <label for="opciones_servicios">¿Deseas agregar servicios adicionales?</label>
    <select id="opciones_servicios" name="opciones_servicios">
        <option value="no">No</option>
        <option value="si">Sí</option>
    </select>

    <!-- Contenedor para el nuevo cuestionario (inicialmente oculto) -->
    <div id="cuestionario_servicios" style="display: none;">
        <!-- Aquí coloca tu nuevo cuestionario -->
        <p>Servicio Adicional</p>
        Servicio1<input type="text" name="servicio1"><br>
        Descripcion: <input type="text" name="descripcion1"><br>
        Costo <input type="text" name="costo1"><br>

        <p>Servicio Adicional</p>
        Servicio2<input type="text" name="servicio2"><br>
        Descripcion: <input type="text" name="descripcion2"><br>
        Costo <input type="text" name="costo2"><br>
        
     
    </div>

    <!-- Botón para mostrar el cuestionario -->
    <button type="button" id="btn_mostrar_cuestionario">+Agrega Servicios adicionales.</button>

    <!-- Script JavaScript para manejar la visibilidad del cuestionario -->
    <script>
        document.getElementById('btn_mostrar_cuestionario').addEventListener('click', function() {
            var seleccionado = document.getElementById('opciones_servicios').value;
            var cuestionario = document.getElementById('cuestionario_servicios');

            // Muestra u oculta el cuestionario de servicios adicionales según la selección
            cuestionario.style.display = (seleccionado === 'si') ? 'block' : 'none';
        });
    </script>




<H1>EL SUSCRIPTOR AUTORIZA SE LE ENVIE POR CORREO ELECTRÓNICO:</H1>


¿Cuenta con correo electronico?  de no ser asi puede dejarlo en blanco.<input type="text" name="correo"><br>



<<<<<<< HEAD
Fecha del cotrato: <input type="date" name="fecha_2" require><br>
=======
Fecha: <input type="date" name="fecha_2" require><br>
>>>>>>> 2905028ec438c44af82327f2a3a67c7d9846b043






<h1>Fotografias del INE</h1>
<<<<<<< HEAD
<form method="post" action="procesar.php" enctype="multipart/form-data">
    <!-- Otros campos del formulario -->
    <label for="foto1">Foto 1:</label>
    <input type="file" name="foto1" accept="image/*" capture="camera">
    
    <label for="foto2">Foto 2:</label>
    <input type="file" name="foto2" accept="image/*" capture="camera">







     
 <!-------------------------------------------------------------------FIRMA---------------------------------------------------->
<h1>Firma del suscriptor</h1>

    <!-- Contenedor para el canvas de la firma -->
<div id="firmaContainer" style="border: 1px solid #000; width: 280px; height: 200px; position: relative;">
    <canvas id="firmaCanvas" width="280" height="200" style="border: 1px solid #000; position: absolute; left: 0; top: 0;"></canvas>
</div>
<br>

    <!-- Campo oculto para almacenar la firma como imagen base64 -->
    <input type="hidden" name="firma" id="firma">

    <!-- Botón para borrar la firma -->
    <button type="button" onclick="borrarFirma()">Borrar Firma</button><br>

    <!-- ... tu botón de submit u otros campos ... -->
    <input type="submit" value="Generar PDF">
    <!-- Script para gestionar la firma -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var firmaContainer = document.getElementById('firmaContainer');
            var firmaCanvas = document.getElementById('firmaCanvas');
            var firmaPad = new SignaturePad(firmaCanvas);

            firmaContainer.addEventListener('mousedown', function () {
                firmaPad.on();
            });

            firmaContainer.addEventListener('mouseup', function () {
                firmaPad.off();
            });
=======

     

     

        <!-- Campo de carga de archivos para imágenes -->
        INE_Frontal <input type="file" name="imagen_jpg" id="imagen_jpg"><br>
        INE_Trasero<input type="file" name="imagen_png"><br>


<h1>Firma del suscriptor</h1>
      




        <!-- Campo para dibujar la firma -->
        <label>Firma:</label>
        <canvas id="firmaCanvas" width="400" height="200" style="border:1px solid #000;"></canvas><br>

        <!-- Campo oculto para almacenar la firma como imagen base64 -->
        <input type="hidden" name="firma" id="firma">

        <!-- Botón para borrar la firma -->
        <button type="button" onclick="borrarFirma()">Borrar Firma</button><br>

        <!-- ... tu botón de submit u otros campos ... -->
        <input type="submit" value="Generar PDF">
    </form>

    <!-- Script para gestionar la firma -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var canvas = document.getElementById('firmaCanvas');
            var firmaPad = new SignaturePad(canvas);
>>>>>>> 2905028ec438c44af82327f2a3a67c7d9846b043

            // Almacena la firma como imagen base64 en el campo oculto
            document.querySelector('form').addEventListener('submit', function (event) {
                document.getElementById('firma').value = firmaPad.toDataURL();
            });
        });

        // Función para borrar la firma
        function borrarFirma() {
<<<<<<< HEAD
            var firmaCanvas = document.getElementById('firmaCanvas');
            var firmaPad = new SignaturePad(firmaCanvas);
            firmaPad.clear();
        }
    </script>
        


=======
            var canvas = document.getElementById('firmaCanvas');
            var firmaPad = new SignaturePad(canvas);
            firmaPad.clear();
        }
    </script>
>>>>>>> 2905028ec438c44af82327f2a3a67c7d9846b043
</body>
</html>