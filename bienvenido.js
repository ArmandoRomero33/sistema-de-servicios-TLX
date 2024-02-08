// Crea una instancia de SignaturePad vinculada al canvas
var firmaCanvas = new SignaturePad(document.getElementById('firmaCanvas'));

// Función para borrar la firma
function borrarFirma() {
    firmaCanvas.clear();
}

// Función para obtener y almacenar los datos de la firma
function capturarFirma() {
    var datosFirma = firmaCanvas.toDataURL(); // Convertir la firma a datos URL
    document.getElementById('datos_firma').value = datosFirma;
}



