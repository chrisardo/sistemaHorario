<?php
// Realizar la conexión a la base de datos
include("../controlador/conexion.php");
// Obtener el ID del ciclo seleccionado
$cicloId = $_POST['ciclo_id'];

// Consultar los cursos asociados al ciclo seleccionado
$sqlCurso = mysqli_query($mysqli, "SELECT * FROM cursos WHERE id_ciclo = $cicloId");

$cursos = mysqli_fetch_all($sqlCurso, MYSQLI_ASSOC);

// Devolver los cursos como una respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($cursos);
