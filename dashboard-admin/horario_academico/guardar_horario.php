<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['horariosAsignados'])) {
    // Obtener el JSON enviado desde la página HTML
    $horariosAsignadosJSON = $_POST['horariosAsignados'];
    //$localesAsignadosJSON = $_POST['localesAsignados'];


    // Decodificar el JSON a un array de PHP
    $horariosAsignados = json_decode($horariosAsignadosJSON, true);
    //$localesAsignados = json_decode($localesAsignadosJSON, true);

    //mostrar el array de horarios asignados en consola
    echo '<script>console.log(' . json_encode($horariosAsignados) . ');</script>';
    //echo '<script>console.log(' . json_encode($localesAsignados) . ');</script>';
    //mostrar el array de horarios asignados por medio del echo
    echo "<h2>Lista de Datos Obtenidos</h2><br>";
    // Iterar sobre los datos y mostrarlos en una tabla
    foreach ($horariosAsignados as $curso) {
        $dia = $curso['day'];
        $hora = $curso['time'];
        $codigo = $curso['courseName'];
        $lugar = $curso['localId'];

        // Aquí podrías escribir el código para guardar los datos en la base de datos.
        // Por ejemplo, realizar una inserción en la tabla de horarios con las variables $dia, $hora, $codigo y $lugar.
        // Dependiendo de tu configuración y estructura de base de datos, este proceso puede variar.

        // Puedes realizar cualquier otra acción que necesites con los datos recibidos.

        // En este ejemplo, simplemente mostraremos los datos obtenidos en la página.
        echo "Día: " . $dia . "<br>";
        echo "Horario: " . $hora . "<br>";
        echo "Código del curso: " . $codigo . "<br>";
        echo "Lugar: " . $lugar . "<br>";
        echo "<br>";
    }
    //iterar locales
    //foreach ($localesAsignados as $local) {

    //echo "Local: " . $local['nombre_local'] . "<br>";
    //}

    // Aquí podrías escribir el código para guardar los horarios asignados en la base de datos.
    // Dependiendo de tu configuración y estructura de base de datos, este proceso puede variar.

    // Una vez que los datos se hayan guardado exitosamente, puedes enviar una respuesta al cliente.
    // En este ejemplo, se enviará la cadena 'success' si todo sale bien.
    // Si ocurre algún error, puedes enviar 'error' o cualquier otro mensaje de tu elección.

    // En este ejemplo, simplemente devolveremos 'success' como respuesta.

    echo 'success';
} else {
    // Si no se reciben los datos adecuados, envía una respuesta de error.
    echo 'error';
}
