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
    <link rel="stylesheet" href="bienvenidos.css">
    
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
<!-- #regi-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">


</head>
<body>
<nav>
        <!-- Puedes agregar enlaces u otros elementos aquí -->
        <ul>
        <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
         
        <li style="float: right; margin-top: -76.5px;"><img src="img/tlax_com_2.png" width="280"></li>


          
        </ul>
    </nav>
    
  
    
   
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
       
        Telefono: <input type="text" name="telefono" required><br>
        <h1>Servicio de Internet Fijo en Casa</h1>

        Paquete: <input type="text" name="paquete" required><br>
      
        <div style="display: flex; align-items: center;">
  Tarifa:<input type="number" name="tarifa" required>
  <span style="margin-left: 5px;">$</span>
</div>
     
     <h1>Datos del equipo Compra Venta</h1>

       Marca:<input type="text" name="marca" required><br>
       Modelo:<input type="text" name="modelo" required><br>
       Serie:<input type="text" name="serie" ><br>

       
       NO.Equipos:<input type="number" name="equipo" required><br>
       
     <h1>Instalacion del Equipo</h1>

 
     Fecha: <input type="date" name="fecha" required><br>
     Hora: <input type="time" name="hora" required><br>
     
     


     


<h1>Metodos de Pago</h1>


     

<!-- ...............................(Metodos de pago Formulario)........................ -->

<label for="opciones">Seleccione un metodo de pago:</label>
<select id="opciones" name="opciones" require>
<option value="">---seleccione una opcion---</option>
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
<select id="opciones_servicios" name="opciones_servicios" required>
    <option value="">---seleccione una opcion---</option>
    <option value="no">No</option>
    <option value="si">Sí</option>
</select>

<!-- Contenedor para el nuevo cuestionario (inicialmente oculto) -->
<div id="cuestionario_servicios" style="display: none;">
    <!-- Aquí coloca tu nuevo cuestionario -->
    <p>Servicio Adicional</p>
    Servicio1<input type="text" name="servicio1" value="-------------------------------------------------------------------"><br>
    Descripcion: <input type="text" name="descripcion1" value="----------------------------------------------------------------------"><br>
    
    <div style="display: flex; align-items: center;">
  Tarifa:<input type="number" name="costo1" >
  <span style="margin-left: 5px;">$</span>
</div>

    <p>Servicio Adicional</p>
    Servicio2<input type="text" name="servicio2" value="--------------------------------------------------------------------"><br>
    Descripcion: <input type="text" name="descripcion2" value="-----------------------------------------------------------------------"><br>
    <div style="display: flex; align-items: center;">
  Tarifa:<input type="number" name="costo2" >
  <span style="margin-left: 5px;">$</span>
</div>
</div>

<!-- Botón para mostrar el cuestionario -->


<!-- Script JavaScript para manejar la visibilidad y valores predeterminados del cuestionario -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ejecuta la lógica al cargar la página
        mostrarOcultarCuestionario();

        // Agrega un evento al cambio de selección
        document.getElementById('opciones_servicios').addEventListener('change', mostrarOcultarCuestionario);

        // Agrega un evento al botón para mostrar el cuestionario
        document.getElementById('btn_mostrar_cuestionario').addEventListener('click', mostrarOcultarCuestionario);
    });

    function mostrarOcultarCuestionario() {
        var seleccionado = document.getElementById('opciones_servicios').value;
        var cuestionario = document.getElementById('cuestionario_servicios');

        // Muestra u oculta el cuestionario de servicios adicionales según la selección
        cuestionario.style.display = (seleccionado === 'si') ? 'block' : 'none';

        // Establece valores predeterminados cuando la opción seleccionada es "No"
        if (seleccionado === 'no') {
            document.querySelector('#cuestionario_servicios [name="servicio1"]').value = '-------';
            document.querySelector('#cuestionario_servicios [name="descripcion1"]').value = '-------';
            document.querySelector('#cuestionario_servicios [name="costo1"]').value = '-------';

            document.querySelector('#cuestionario_servicios [name="servicio2"]').value = '-------';
            document.querySelector('#cuestionario_servicios [name="descripcion2"]').value = '-------';
            document.querySelector('#cuestionario_servicios [name="costo2"]').value = '-------';
        }
    }
</script>





<H1>EL SUSCRIPTOR AUTORIZA SE LE ENVIE POR CORREO ELECTRÓNICO:</H1>


¿Cuenta con correo electronico?  de no ser asi puede dejarlo en blanco.<input type="text" name="correo"><br>



Fecha del cotrato: <input type="date" name="fecha_2" required><br>






<h1>Fotografias del INE</h1>
<form method="post" action="procesar.php" enctype="multipart/form-data">
    <!-- Otros campos del formulario -->
    <label for="foto1">Foto 1:</label>
    <input type="file" name="foto1" accept="image/*" capture="camera" required>
    
    <label for="foto2">Foto 2:</label>
    <input type="file" name="foto2" accept="image/*" capture="camera" required>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"]:hover {
            border-color: #333;
        }

        input[type="file"]:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    
    






     
 <!-------------------------------------------------------------------FIRMA---------------------------------------------------->
<h1>Firma del suscriptor</h1>

    <!-- Contenedor para el canvas de la firma -->
<div id="firmaContainer" style="border: 1px solid #000; width: 320px; height: 200px; position: relative;">
    <canvas id="firmaCanvas" width="320" height="200" style="border: 1px solid #000; position: absolute; left: 0; top: 0;"></canvas>
</div>
<br>

    <!-- Campo oculto para almacenar la firma como imagen base64 -->
    <input type="hidden" name="firma" id="firma" required>

    <!-- Botón para borrar la firma -->
    <button type="button" onclick="borrarFirma()">Borrar Firma</button><br>
    <style>
  /* Estilos para el botón */
  button {
    background-color: #ff0000; /* Color de fondo rojo */
    color: #ffffff; /* Color del texto blanco */
    border: 1px solid #ff0000; /* Borde rojo */
    padding: 10px 20px; /* Ajusta el espaciado interno según sea necesario */
    cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
    border-radius: 5px; /* Añade esquinas redondeadas */
  }

  /* Cambia el color del texto cuando se pasa el ratón sobre el botón */
  button:hover {
    color: #ff0000;
    background-color: #ffffff;
  }
</style>

    <!-- ... tu botón de submit u otros campos ... -->
    <input type="submit" value="Generar PDF">
    <style>
           input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border-top: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin: 0 auto; /* Centra el botón horizontalmente */
            display: block; /* Hace que el botón ocupe el ancho completo disponible */
        }
        </style>

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

            // Almacena la firma como imagen base64 en el campo oculto
            document.querySelector('form').addEventListener('submit', function (event) {
                document.getElementById('firma').value = firmaPad.toDataURL();
            });
        });

        // Función para borrar la firma
        function borrarFirma() {
            var firmaCanvas = document.getElementById('firmaCanvas');
            var firmaPad = new SignaturePad(firmaCanvas);
            firmaPad.clear();
        }
    </script>
        


</body>
</html>