<?php
// generate_report.php

// Check if the AJAX request contains the required parameters
if (isset($_POST['semestreName']) && isset($_POST['tipo_reporteName'])) {
    $semestreName = $_POST['semestreName'];
    $tipo_reporteName = $_POST['tipo_reporteName'];

    // Connect to the database and perform your queries based on the report type
    require("../controlador/conexion.php");

    if ($tipo_reporteName === 'docente') {
        // Fetch data for "docente" report type
        $queryDocentes = mysqli_query($mysqli, "SELECT *FROM docentes");
        $docentes2 = mysqli_fetch_all($queryDocentes, MYSQLI_ASSOC);
        $cantidadDocente2 = mysqli_num_rows($queryDocentes);
        $output = '';

        if ($cantidadDocente2 > 0) {

            require("reportes/tipo_reporte_docente.php");
        } else {
            $output .= '<div class="alert alert-info" role="alert">No hay datos disponibles para el reporte "docente".</div>';
        }
    } elseif ($tipo_reporteName === 'aula') {
        $queryLocal = mysqli_query($mysqli, "SELECT *FROM locales");
        $locales = mysqli_fetch_all($queryLocal, MYSQLI_ASSOC);
        $cantidadLocales = mysqli_num_rows($queryLocal);

        $output = '';
        if ($cantidadLocales > 0) {
            require("reportes/tipo_reporte_aula.php");
        } else {
            $output .= '<div class="alert alert-info" role="alert">No hay datos disponibles para el reporte "aula".</div>';
        }
    } elseif ($tipo_reporteName === 'ciclo') {
        $queryCiclo = mysqli_query($mysqli, "SELECT *FROM ciclo where id_semestre='$semestreName'");
        $ciclos = mysqli_fetch_all($queryCiclo, MYSQLI_ASSOC);
        $cantidadCiclos = mysqli_num_rows($queryCiclo);
        $output = '';
        if ($cantidadCiclos > 0) {
            require("reportes/tipo_reporte_ciclo.php");
        } else {
            $output .= '<div class="alert alert-info" role="alert">No hay datos disponibles para el reporte "ciclo".</div>';
        }
    } else {
        // Invalid report type
        echo '<div class="alert alert-danger" role="alert">Tipo de reporte inválido.</div>';
    }
} else {
    // Invalid request or missing parameters
    echo '<div class="alert alert-danger" role="alert">Por favor defina los parametros de las opciones.</div>';
}
