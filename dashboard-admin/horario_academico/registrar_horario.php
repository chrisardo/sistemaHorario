<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../css/registrar_horario.css">

    <title>AdminHub</title>
    <link rel="icon" href='../../img/semestre.png' sizes="32x32" type="img/jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            var cursoContent = null;
            var locales; // Variable to store the locations data

            // Fetch the locations data from the PHP endpoint
            $.ajax({
                url: "locales_data.php",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // Store the fetched data in the 'locales' variable
                    locales = data;

                    // Call the function to populate the list of assigned courses
                    updateAssignedCoursesList();
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching locales data:", error);
                }
            });
            var assignedCourses = []; // Array to store assigned courses

            // Mapeo de índice de columna a día de la semana
            var daysOfWeek = ["", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo"];
            //Mapeo de indice de columna a hora
            var hoursOfDay = ["", "7:00-8:00", "8:00-9:00", "9:00-10:00", "10:00-11:00", "11:00-12:00", "12:00-1:00", "1:00-2:00", "2:00-3:00", "3:00-4:00", "4:00-5:00", "5:00-6:00", "6:00-7:00", "7:00-8:00", "8:00-9:00", "9:00-10:00"];
            // Función para actualizar la lista de horarios asignados
            function updateAssignedCoursesList() {
                var listTableBody = $('.horarios-asignados-list tbody');
                listTableBody.empty();
                // Llama a la función para mostrar u ocultar el botón de guardar
                toggleGuardarButton();

                // Recorre el array assignedCourses y actualiza la lista de la tabla
                assignedCourses.forEach(function(course) {
                    var newRow =
                        '<tr>' +
                        '<td><input type="text" name="dayName" placeholder="' + course.day + '" required="required" hidden  disabled>' + course.day + '</td>' +
                        '<td><input type="text" name="timeName" placeholder="' + course.time + '" required="required" hidden disabled>' + course.time + '</td>' +
                        '<td><input type="text" name="codigoName" placeholder="' + course.courseName + '" required="required" hidden disabled>' + course.courseName + '</td>' +
                        '<td><select class="form-control local-select" name="lugarName" id="lugarName" required="required"><option value="" selected="">Sleccione</option></select></td>' +
                        '/tr>';
                    listTableBody.append(newRow); //agrega una nueva fila a la tabla de horarios asignados
                });

                // Populate the options for the location dropdowns
                var localSelects = $('.local-select');
                /*localSelects.each(function() {
                    var select = $(this);

                    var options = '';
                    locales.forEach(function(local) {
                        options += '<option value="' + local.id_local + '" selected="' + local.id_local + '">' + local.nombre_local + '</option>';
                    });
                    select.html(options);
                });

                //agrega los valores seleccionados de los options del select "lugarName" al objeto correspondiente en el array "assignedCourses"
                localSelects.each(function(select) {
                    var select = $(this);
                    var localId = select.val();
                    var selectedLocalId = $(select).val();
                    assignedCourses[index].localId = selectedLocalId;
                });*/
                localSelects.each(function(index) {
                    var select = $(this);
                    var options = ''; //variable para almacenar las opciones del select
                    locales.forEach(function(local) { //recorre el array locales
                        options += '<option value="' + local.id_local + '" selected="' + local.id_local + '">' + local.nombre_local + '</option>';
                        //Guardar al JSON las opciones seleccionadas del select
                        select.html(options);

                    });
                    //agrega los valores seleccionados de los options del select "lugarName" al objeto correspondiente en el array "assignedCourses"
                    var localId = select.val();
                    var selectedLocalId = $(select).val();
                    assignedCourses[index].localId = selectedLocalId;

                });

            }


            // When clicking on the .codigoCurso element
            $('.codigoCurso').click(function() {
                // Store the content of the clicked .codigoCurso div
                cursoContent = $(this).html();
            });
            $('#btnGuardarHorario').click(function() {
                // Convertir el array a JSON
                var horariosAsignadosJSON = JSON.stringify(assignedCourses);
                // Agregar los locales seleccionados de la lista de curosos seleccionados al objeto JSON
                var localSelects = $('.local-select');

                localSelects.each(function(index) {
                    var select = $(this);
                    var options = '';
                    locales.forEach(function(local) {
                        options += '<option value="' + local.id_local + '" selected="' + local.id_local + '">' + local.nombre_local + '</option>';

                        options += '<option value="' + local.id_local + '">' + local.nombre_local + '</option>';
                        //Guardar al JSON las opciones seleccionadas del select
                        select.html(options);
                        assignedCourses[index].localId = select.val();
                    });

                });

                //convertir el array de locales a JSON
                //var localesAsignadosJSON = JSON.stringify(locales);
                //console.log("Horarios asignados JSON:", horariosAsignadosJSON);

                // Enviar el JSON a guardar_horario.php mediante una solicitud AJAX
                $.ajax({
                    url: 'guardar_horario.php',
                    type: 'POST',
                    data: {
                        horariosAsignados: horariosAsignadosJSON

                    },
                    success: function(response) {
                        // Maneja la respuesta enviada por guardar_horario.php
                        console.log("Response:", response);
                        // Aquí puedes realizar cualquier acción después de recibir la respuesta.
                        // Por ejemplo, mostrar una alerta o redireccionar a otra página.
                        alert("Horario guardado exitosamente");
                        //window.location.href = "otra_pagina.php";
                    },
                    error: function(xhr, status, error) {
                        // En caso de error, muestra una alerta o maneja el error de acuerdo a tus necesidades
                        console.error("Error al guardar horario:", error);
                        alert("Error al guardar horario: " + error);
                    }
                });
            });
            // Función para mostrar u ocultar el botón de guardar según si hay cursos programados o no
            function toggleGuardarButton() {
                var btnGuardarHorario = $('#btnGuardarHorario');
                if (assignedCourses.length > 0) {
                    btnGuardarHorario.show(); // Muestra el botón de guardar si hay cursos programados
                } else {
                    btnGuardarHorario.hide(); // Oculta el botón de guardar si no hay cursos programados
                }
            }
            // When clicking on any td within the .horas tbody
            $('.horas td').click(function() {
                if (cursoContent !== null) {
                    if ($(this).is(':empty')) {
                        // Move the content to the clicked td
                        $(this).html(cursoContent);

                        // Extrae el día, horario y numero de codigo del curso de cursoContent
                        var dayhora = $(this).closest('tr').find('th').text();
                        var dayIndex = $(this).index(); // Index of the column of the td cell
                        //obtiene el codigo del curso del div de la tabla de programacion y alamacena en la lista de cursos programados
                        var courseCode = $(this).find('.codigoCurso').text();

                        var courseName = $(this).closest('tr').find('.courseName').text();

                        console.log("Course Code:", cursoContent);
                        lugarName = $(this).closest('tr').find('.local-select').text();


                        // Actualiza el array assignedCourses
                        assignedCourses.push({
                            day: daysOfWeek[dayIndex],
                            time: dayhora,
                            courseName: cursoContent
                        });

                        // Actualiza la lista de horarios asignados
                        updateAssignedCoursesList();

                    } else {
                        // If the td is not empty, remove the content
                        cursoContent = $(this).html();
                        $(this).empty();
                        // Elimina el curso del array assignedCourses
                        var dayIndex = $(this).index(); // Índice de la columna de la celda td
                        var dayhora = $(this).closest('tr').find('th').text();
                        var indexToRemove = assignedCourses.findIndex(item => item.day === daysOfWeek[dayIndex] && item.time === dayhora);
                        if (indexToRemove !== -1) {
                            assignedCourses.splice(indexToRemove, 1);
                        }

                        // Actualiza la lista de horarios asignados
                        updateAssignedCoursesList();
                    }
                }
            });


        });
    </script>

</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar" style="background-color: rgb(7, 66, 230);">
        <a href="#" class="brand">
            <img src="../../img/semestre.png" style="width: 32px; height: 32px; margin-left: 10px;" alt="logo restaurantapp">
            <span class="text">Sistema de horario</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="index.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../carga_academica.php">
                    <i class='bx  '>
                        <img src="../../img/carga.png" style="width: 30px; height: 30px;">
                    </i>
                    <span class="text">Carga academica</span>
                </a>
            </li>
            <li class="active">
                <a href="../horario_academico.php">
                    <i class='bx'>
                        <img src="../../img/horario.png" style="width: 30px; height: 30px;">

                    </i>
                    <span class="text">Horario</span>
                </a>
            </li>
            <li>
                <a href="../reportes.php">
                    <i class='bx'>
                        <img src="../../img/reporte.png" style="width: 30px; height: 30px;">

                    </i>
                    <span class="text">Reportes</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="../configuraciones.php">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Configuraciones</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Salir</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link"></a>
            <form action="#">
                <div class="form-input">
                    <!--<input type="search" placeholder="Search...">

                    <<input type="checkbox" id="switch-mode" hidden>
                    <button type="submit" class="bx"><i class='bx'></i></button>-->
                </div>
            </form>
            <!--<label for="switch-mode" class="switch-mode"></label>-->
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="img/people.png">
            </a>
        </nav>
        <!-- NAVBAR -->
        <!-- MAIN -->
        <?php
        include("../../controlador/conexion.php");
        extract($_GET);
        $queryDocentes = mysqli_query($mysqli, "SELECT *FROM docentes where id_docente='$id_docente'");
        $docentes2 = mysqli_fetch_all($queryDocentes, MYSQLI_ASSOC);
        $cantidadDocente2 = mysqli_num_rows($queryDocentes);
        foreach ($docentes2 as $rowDocente) {
            $id_docente = $rowDocente['id_docente'];
            $nombre_docente = $rowDocente['Nombre_docente'];
            $apellido_docente = $rowDocente['apellido_docente'];
            $dni_docente = $rowDocente['dni_docente'];
        }
        //unir con la tabla semestre por medio de id_semestre
        $querySemestre = mysqli_query($mysqli, "SELECT *FROM semestres where id_semestre='$id_semestre'");
        $semestre2 = mysqli_fetch_all($querySemestre, MYSQLI_ASSOC);
        $cantidadSemestre2 = mysqli_num_rows($querySemestre);
        foreach ($semestre2 as $rowSemestre) {
            $id_semestre = $rowSemestre['id_semestre'];
            $nombre_semestre = $rowSemestre['nombre_semestre'];
        }
        $queryCarga = mysqli_query($mysqli, "SELECT *FROM carga_academica where id_docente='$id_docente' and id_semestre='$id_semestre'");
        $carga2 = mysqli_fetch_all($queryCarga, MYSQLI_ASSOC);
        $cantidadCarga2 = mysqli_num_rows($queryCarga);

        ?>
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="../horario_academico.php"><strong>Horario</strong></a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="registrar_horario.php?id_docente=<?php echo $id_docente; ?>&id_semestre=<?php echo $id_semestre; ?>"><strong>Registrar horario</strong></a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div><br>
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <h4>Programación de calendario de los cursos del semestre : <?php echo $nombre_semestre; ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 ">
                            <div style="width: 250px;">

                                <div class="" style="width: 90%; height:60px; margin-left: 16px;">
                                    <p><strong>Docente: <?php echo $nombre_docente . " " . $apellido_docente; ?></strong> </p>
                                </div>
                                <?php
                                if ($cantidadCarga2 > 0) {
                                    foreach ($carga2 as $rowCarga) {
                                        $id_docente = $rowCarga['id_docente'];
                                        $id_curso = $rowCarga['id_curso'];
                                        $id_ciclo = $rowCarga['id_ciclo'];
                                        $id_semestres = $rowCarga['id_semestre'];
                                        $queryCurso = mysqli_query($mysqli, "SELECT *FROM cursos where id_curso='$id_curso'");
                                        $cursos2 = mysqli_fetch_all($queryCurso, MYSQLI_ASSOC);
                                        // Create the mapping of course codes to course names
                                        $courseCodeToName = array();
                                        foreach ($cursos2 as $rowCursos) {
                                            $id_curso = $rowCursos['id_curso'];
                                            $nombre_curso = $rowCursos['nombre_curso'];
                                            $cod_curso = $rowCursos['codigo_curso'];
                                            $credito_curso = $rowCursos['credit_curso'];
                                        }

                                ?>
                                        <div class="card-body">
                                            <p><strong>Curso:<?php echo $nombre_curso; ?></strong> </p>
                                            <p style="font-size: 14px;"><strong>(H. Teorico: 3; H.Practico: 2)</strong> </p>
                                            <div style=" ">
                                                <p style="font-size: 14px; float:left;"><strong>Codigo: </strong> </p>
                                                <div class="codigoCurso" style="float:left; border:2px solid blue;" id="codigoCursoContent">
                                                    <?php echo $cod_curso; ?>
                                                </div>
                                            </div>

                                        </div>
                                    <?php }
                                } else { ?>
                                    <td style="vertical-align: middle;">No hay registro</td>
                                <?php } ?>

                            </div>
                            <div class="col">
                                <div style="width: 90%; height:60px; margin-left: 16px;">
                                    <center>
                                        <p style="font-size: 18px;"><strong>TABLA DE PROGRAMACIÓN DE CALENDARIO DE CURSOS</strong> </p>
                                    </center>
                                    <p>Asigna horario a los cursos por medio de su codigo del curso</p>
                                </div>
                                <table class="table">
                                    <thead class="dias">
                                        <tr class="border-primary">
                                            <th scope="row">Hora\dias</th> <!-- Celda vacía en la esquina superior izquierda -->
                                            <th>Lunes</th>
                                            <th>Martes</th>
                                            <th>Miércoles</th>
                                            <th>Jueves</th>
                                            <th>Viernes</th>
                                            <th>Sabados</th>
                                        </tr>
                                    </thead>
                                    <tbody class="horas">
                                        <tr>
                                            <th>7:00-8:00</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>8:00-9:00</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>9:00-10:00</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>10:00-11:00</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Mostrando la lista automaticamente  los crusos que se programan en la tabla de horarios por dia que se llevara ese curso, el horario de ese curso y el nombre del curso-->

            <div class="card">
                <div class="card-header">
                    <h4>Lista de cursos programados de la tabla del semestre : <?php echo $nombre_semestre;
                                                                                ?></h4>
                </div>
                <div class="card-body">
                    <!-- New container for the list of assigned courses -->
                    <div class="horarios-asignados-list">
                        <form action="" enctype="multipart/form-data" method="post" class="formulario column column--50 border-primary">
                            <table class="table border-primary" style="border:2px solid blue;">
                                <thead>
                                    <tr>
                                        <th scope="col">Dia</th>
                                        <th scope="col">Horario del curso</th>
                                        <th scope="col">Código del curso</th>
                                        <th scope="col">Lugar</th>
                                    </tr>
                                </thead>

                                <tbody id="assignedCoursesList">
                                    <!-- Content will be added dynamically using JavaScript -->
                                </tbody>

                            </table>
                            <center>
                                <input type="submit" name="guardarhorario" value="GUARDAR" style="width:180px; margin-top: 4px;" class="btn btn-primary guardarhorario" id="btnGuardarHorario">
                            </center>
                        </form>
                    </div>

                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="../script.js"></script>
</body>

</html>