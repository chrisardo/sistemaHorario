<?php
// get_ciclos.php
// This file will receive the selected semestre ID as a parameter and return the corresponding ciclos options

// Assuming you have a database connection established
include("../../controlador/conexion.php");


// Obtener el ID del ciclo seleccionado
$semestre_Id = $_POST['semestre_id'];

// Consultar los cursos asociados al ciclo seleccionado
$sqlCiclos = mysqli_query($mysqli, "SELECT * FROM ciclo WHERE id_semestre = $semestre_Id");

$ciclos = mysqli_fetch_all($sqlCiclos, MYSQLI_ASSOC);

// Devolver los cursos como una respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($ciclos);
