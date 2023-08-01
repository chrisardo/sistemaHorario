<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">

    <title>AdminHub</title>
    <link rel="icon" href='../img/semestre.png' sizes="32x32" type="img/jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar" style="background-color: rgb(7, 66, 230);">
        <a href="#" class="brand">
            <img src="../img/semestre.png" style="width: 32px; height: 32px; margin-left: 10px;" alt="logo restaurantapp">
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
                <a href="carga_academica.php">
                    <i class='bx  '>
                        <img src="../img/carga.png" style="width: 30px; height: 30px;">
                    </i>
                    <span class="text">Carga academica</span>
                </a>
            </li>
            <li>
                <a href="horario_academico.php">
                    <i class='bx'>
                        <img src="../img/horario.png" style="width: 30px; height: 30px;">

                    </i>
                    <span class="text">Horario</span>
                </a>
            </li>
            <li class="active">
                <a href="reportes.php">
                    <i class='bx'>
                        <img src="../img/reporte.png" style="width: 30px; height: 30px;">

                    </i>
                    <span class="text">Reportes</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="configuraciones.php">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Configuraciones</span>
                </a>
            </li>
            <li>
                <a href="../controlador/desconectar.php" class="logout">
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
                            <a class="active" href="reportes.php"><strong>Reporte</strong></a>
                        </li>
                    </ul>
                </div>
                <!--<a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>-->
            </div>
            <?php
            require("../controlador/conexion.php"); //requerir la conexion a la base de datos
            ?>
            <div class="container">
                <form action="" method="POST">
                    <div class="row g-3">
                        <div class="col">
                            <label for="" class="formulario__label"><strong>Semestre:</strong></label>
                            <select id="semestreSelect" class="form-control" name="semestreName" required="required">
                                <option value="-" selected="">Seleccione el semstre</option>
                                <?php
                                $sqlSemestre = mysqli_query($mysqli, "SELECT * FROM semestres");

                                $semestres = mysqli_fetch_all($sqlSemestre, MYSQLI_ASSOC);
                                foreach ($semestres as $rowSemestre) {
                                    $id_semestre = $rowSemestre['id_semestre'];
                                    $nombre_semestre = $rowSemestre['nombre_semestre'];
                                ?>
                                    <option value="<?php echo $id_semestre; ?>"><?php echo $nombre_semestre; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="formulario__label"><strong>Tipo de reporte: </strong></label>

                            <select id="tipo_reporteSelect" class="form-control" name="tipo_reporteName" required="required">
                                <option value="-" selected="">Tipo de reporte </option>
                                <option value="docente">Docente</option>
                                <option value="aula">Aula</option>
                                <option value="ciclo">Ciclo</option>
                            </select>
                        </div>
                    </div>

                </form>
                <div id="errorMessageContainer"></div>
                <div id="reportContainer"></div>
                <script>
                    // Listen for changes in the select elements
                    document.getElementById('semestreSelect').addEventListener('change', function() {
                        const selectedSemestre = this.value;
                        const selectedReportType = document.getElementById('tipo_reporteSelect').value;
                        handleReportRequest(selectedSemestre, selectedReportType);
                    });

                    document.getElementById('tipo_reporteSelect').addEventListener('change', function() {
                        const selectedSemestre = document.getElementById('semestreSelect').value;
                        const selectedReportType = this.value;
                        handleReportRequest(selectedSemestre, selectedReportType);
                    });

                    function handleReportRequest(semestre, reportType) {
                        if (semestre === '-' || reportType === '-') {
                            // Clear the report container and show the error message
                            document.getElementById('reportContainer').innerHTML = '';
                            document.getElementById('errorMessageContainer').innerHTML = '<div class="alert alert-danger" role="alert">Por favor defina los parametros de las opciones.</div>';
                        } else {
                            // Send the selected semestre and report type to the server using AJAX
                            const xhr = new XMLHttpRequest();
                            xhr.open('POST', 'generate_report.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    // Update the report container with the content from the server
                                    if (reportType === 'docente') {
                                        // Show the report content for "docente" in the reportContainer
                                        document.getElementById('reportContainer').innerHTML = xhr.responseText;
                                    } else {
                                        // For other report types, update the reportContainer with the content from the server
                                        document.getElementById('reportContainer').innerHTML = xhr.responseText;
                                    }
                                    // Clear the error message container
                                    document.getElementById('errorMessageContainer').innerHTML = '';
                                }
                            };
                            xhr.send('semestreName=' + semestre + '&tipo_reporteName=' + reportType);
                        }
                    }

                    // Trigger the change event for the select elements on page load to load the initial content
                    document.getElementById('semestreSelect').dispatchEvent(new Event('change'));
                    document.getElementById('tipo_reporteSelect').dispatchEvent(new Event('change'));
                </script>
                <?php
                if (isset($_POST['reportesName'])) {
                    $semestreName = $_POST['semestreName'];
                    $tipo_reporteName = $_POST['tipo_reporteName'];
                    if ($semestreName == "-" && $tipo_reporteName == "-") {
                        echo '<div class="alert alert-danger" role="alert">Por favor defina los parametros de las opciones. </div>';
                    } else {
                        //condicion para escoger tipo de reporte
                        if ($tipo_reporteName == "docente") {
                            require("reportes/tipo_reporte_docente.php");
                        } elseif ($tipo_reporteName == "aula") {
                            require("reportes/tipo_reporte_aula.php");
                        } elseif ($tipo_reporteName == "ciclo") {
                            require("reportes/tipo_reporte_ciclo.php");
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Por favor defina los parametros de las opciones. </div>';
                        }
                    }
                }
                ?>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="script.js"></script>
</body>

</html>