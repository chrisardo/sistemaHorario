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
            <li class="active">
                <a href="#">
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
            <li>
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
                            <a class="active" href="carga_academica.php"><strong>Carga academica</strong></a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>
            <div>
                <div style="margin-top: 16px;">
                    <a href="configuracion/semestre.php" class="btn btn-primary">Agregar semestre</a>
                </div><br>
                <?php
                require("../controlador/conexion.php"); //requerir la conexion a la base de datos
                $sqlSemestre = mysqli_query($mysqli, "SELECT * FROM semestres");
                $semestres = mysqli_fetch_all($sqlSemestre, MYSQLI_ASSOC);
                ?>
                <form action="" method="POST">
                    <!-- ... Your previous HTML code ... -->

                    <div class="row g-3">
                        <div class="col">
                            <select id="semestreSelect" class="form-control" name="semestreName" required="required">
                                <option value="-" selected="">Seleccione el semestre</option>
                                <?php
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
                    </div>

                    <!-- Container to load the content from carga_docentes.php -->
                    <div id="cargaDocentesContainer"></div>
                    <!-- Error message container -->
                    <div id="errorMessageContainer"></div>

                    <script>
                        // Listen for changes in the select element
                        document.getElementById('semestreSelect').addEventListener('change', function() {
                            const selectedSemestre = this.value;

                            if (selectedSemestre === '-') {
                                // Clear the container and show the error message
                                document.getElementById('cargaDocentesContainer').innerHTML = '';
                                document.getElementById('errorMessageContainer').innerHTML = '<div class="alert alert-danger" role="alert">Seleccione un semestre .</div>';
                            } else {
                                // Send the selected semestre ID to carga_docentes.php using AJAX
                                const xhr = new XMLHttpRequest();
                                xhr.open('POST', 'carga_docentes.php', true);
                                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                                xhr.onreadystatechange = function() {
                                    if (xhr.readyState === 4 && xhr.status === 200) {
                                        // Update the container with the content from carga_docentes.php
                                        document.getElementById('cargaDocentesContainer').innerHTML = xhr.responseText;

                                        // Clear the error message container
                                        document.getElementById('errorMessageContainer').innerHTML = '';
                                    }
                                };
                                xhr.send('semestreName=' + selectedSemestre);
                            }
                        });

                        // Trigger the change event for the select element on page load to load the initial content
                        document.getElementById('semestreSelect').dispatchEvent(new Event('change'));
                    </script>
                </form>

            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="script.js"></script>
</body>

</html>