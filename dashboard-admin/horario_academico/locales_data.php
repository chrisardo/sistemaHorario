<?php
// locales_data.php
// This PHP script fetches the names of the locales from the database and returns the data as JSON

// Include the database connection code
include("../../controlador/conexion.php");

// Fetch the names and IDs of the locales from the database
$queryLocal2 = mysqli_query($mysqli, "SELECT id_local, nombre_local FROM locales");
$local2 = mysqli_fetch_all($queryLocal2, MYSQLI_ASSOC);

// Convert the $local2 array to JSON format
$localesJSON = json_encode($local2);

// Return the JSON data
header('Content-Type: application/json');
echo $localesJSON;
