<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../style.css">

    <title>AdminHub</title>
    <link rel="icon" href='../../img/semestre.png' sizes="32x32" type="img/jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
                <a href="../index.php">
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
            <li>
                <a href="../horario_academico.php">
                    <i class='bx'>
                        <img src="../../img/horario.png" style="width: 30px; height: 30px;">

                    </i>
                    <span class="text">Horario</span>
                </a>
            </li>
            <li class="active">
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
                            <a class="active" href="../reportes.php">Reporte</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <?php
                            extract($_GET);
                            include("../../controlador/conexion.php");
                            if (!@empty($id_ciclo)) {
                            ?>
                                <a class="active" href="lista_reporte.php?id_ciclo=<?php echo $id_semestre; ?>&id_semestre=<?php echo $id_semestre; ?>"><strong>Reporte por ciclo </strong></a>
                            <?php
                            } else if (!@empty($id_docente)) {
                            ?>
                                <a class="active" href="lista_reporte.php?id_docente=<?php echo $id_docente; ?>&id_semestre=<?php echo $id_semestre; ?>"><strong>Reporte por docente </strong></a>
                            <?php
                            } else if (!@empty($id_local)) {
                            ?>
                                <a class="active" href="lista_reporte.php?id_local=<?php echo $id_local; ?>&id_semestre=<?php echo $id_semestre; ?>"><strong>Reporte por local</strong></a>
                            <?php
                            }
                            ?>
                        </li>
                    </ul>
                </div>
                <!--<a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>-->
            </div>

            <?php
            if (!@empty($id_ciclo)) {
                //carga academica
                $queryCarga = mysqli_query($mysqli, "SELECT *FROM carga_academica where id_ciclo='$id_ciclo' and id_semestre='$id_semestre'");
                $carga = mysqli_fetch_all($queryCarga, MYSQLI_ASSOC);
                $cantidadCarga = mysqli_num_rows($queryCarga);
                foreach ($carga as $carga) {
                    $id_carga = $carga['id_carga'];
                    $id_semestrecarga = $carga['id_semestre'];
                }
                if ($cantidadCarga == 0) {
                    echo "No hay carga academica para este docente";
                } else if ($id_semestre != $id_semestrecarga) {
                    echo "No hay carga academica para este docente en este semestre";
                } else {
                    //Unir con la tabla horario academico por medio del id
                    $queryHorario = mysqli_query($mysqli, "SELECT *FROM horario_academico where id_carga='$id_carga' ");
                    //echo "<script>alert('Si hay carga academica para este docente');</script>";
                }
                //$queryHorario = mysqli_query($mysqli, "SELECT *FROM horario_academico where id_ciclo='$id_ciclo' and id_semestre='$id_semestre'");
            ?>
                <p style="margin-left: 26px;">Horario academico por: Ciclo</p>
            <?php
            } else if (!@empty($id_docente)) {
                //carga academica
                $queryCarga = mysqli_query($mysqli, "SELECT *FROM carga_academica where id_docente='$id_docente' and id_semestre='$id_semestre'");
                $carga = mysqli_fetch_all($queryCarga, MYSQLI_ASSOC);
                $cantidadCarga = mysqli_num_rows($queryCarga);
                foreach ($carga as $carga) {
                    $id_carga = $carga['id_carga'];
                    $id_semestrecarga = $carga['id_semestre'];
                }
                if ($cantidadCarga == 0) {
                    echo "No hay carga academica para este docente";
                } else if ($id_semestre != $id_semestrecarga) {
                    echo "No hay carga academica para este docente en este semestre";
                } else {
                    //Unir con la tabla horario academico por medio del id
                    $queryHorario = mysqli_query($mysqli, "SELECT *FROM horario_academico where id_carga='$id_carga' ");
                    //echo "<script>alert('Si hay carga academica para este docente');</script>";
                }

            ?>
                <p style="margin-left: 26px;">Horario academico por: Docente</p>
                <p style="margin-left: 26px;">Docente: <?php echo $id_carga; ?></p>
            <?php
            } else if (!@empty($id_local)) {
                $queryHorario = mysqli_query($mysqli, "SELECT *FROM horario_academico where id_local='$id_local' and id_semestre='$id_semestre'"); ?>
                <p style="margin-left: 26px;">Horario academico por: Local</p>
            <?php
            }

            $querySemestre = mysqli_query($mysqli, "SELECT *FROM semestres where id_semestre='$id_semestre'");
            $semestres = mysqli_fetch_all($querySemestre, MYSQLI_ASSOC);
            $cantidadSemestre = mysqli_num_rows($querySemestre);
            foreach ($semestres as $rowSemestre) {
                $id_semestre = $rowSemestre['id_semestre'];
                $semestreNombre = $rowSemestre['nombre_semestre'];
            }
            ?>
            <div class="container">
                <br>
                <h3 style="margin-left: 26px;">Semestre: <?php echo $semestreNombre; ?></h3>
                <center>
                    <div class="container-fluid p-2">
                        <table class="table border-primary" style="border:2px solid blue;">
                            <thead>
                                <tr>
                                    <th scope="col">Día</th>
                                    <th scope="col">hora</th>
                                    <th scope="col">Ciclo</th>
                                    <th scope="col">Curso</th>
                                    <th scope="col">Docente</th>
                                    <th scope="col">Local</th>
                                </tr>
                            </thead>
                            <?php
                            $horario_academico = mysqli_fetch_all($queryHorario, MYSQLI_ASSOC);
                            $cantidadHorario = mysqli_num_rows($queryHorario);
                            if ($cantidadHorario > 0) {
                                foreach ($horario_academico as $rowHorarioAcademico) {
                                    $id_horario = $rowHorarioAcademico['id_horario'];
                                    $dia_horario = $rowHorarioAcademico['dia'];
                                    $hora_horario = $rowHorarioAcademico['hora'];
                                    $id_local_horario = $rowHorarioAcademico['id_local'];
                                    $id_carga_horario = $rowHorarioAcademico['id_carga'];
                                    $queryCarga = mysqli_query($mysqli, "SELECT *FROM carga_academica where id_carga='$id_carga_horario'");
                                    $carga2 = mysqli_fetch_all($queryCarga, MYSQLI_ASSOC);
                                    $cantidadCarga2 = mysqli_num_rows($queryCarga);
                                    foreach ($carga2 as $rowCarga) {
                                        $id_carga = $rowCarga['id_carga'];
                                        $id_docente_carga = $rowCarga['id_docente'];
                                        $id_curso_carga = $rowCarga['id_curso'];
                                        $id_ciclo_carga = $rowCarga['id_ciclo'];
                                        $id_semestre = $rowCarga['id_semestre'];
                                    }
                                    //unir con la tabla ciclo por medio de su id_ciclo
                                    $queryCiclo = mysqli_query($mysqli, "SELECT *FROM ciclo where id_ciclo='$id_ciclo_carga'");
                                    $ciclos = mysqli_fetch_all($queryCiclo, MYSQLI_ASSOC);
                                    $cantidadCiclo = mysqli_num_rows($queryCiclo);
                                    foreach ($ciclos as $rowCiclo) {
                                        $id_ciclo = $rowCiclo['id_ciclo'];
                                        $nivel_ciclo = $rowCiclo['nivel_ciclo'];
                                    }
                                    //unir con la tabla curso por medio de id_curso
                                    $queryCurso = mysqli_query($mysqli, "SELECT * FROM cursos where id_curso='$id_curso_carga'");
                                    $cursos1 = mysqli_fetch_all($queryCurso, MYSQLI_ASSOC);
                                    $cantidadCurso = mysqli_num_rows($queryCurso);
                                    foreach ($cursos1 as $rowCursos) {
                                        $id_cursos = $rowCursos['id_curso'];
                                        $nombre_cursos = $rowCursos['nombre_curso'];
                                    }
                                    //unir con la tabla docente por medio de id_docente
                                    $queryDocente = mysqli_query($mysqli, "SELECT *FROM docentes where id_docente='$id_docente_carga'");
                                    $docentes = mysqli_fetch_all($queryDocente, MYSQLI_ASSOC);
                                    $cantidadDocente = mysqli_num_rows($queryDocente);
                                    foreach ($docentes as $rowDocente) {
                                        $id_docente = $rowDocente['id_docente'];
                                        $nombre_docente = $rowDocente['Nombre_docente'];
                                        $apellido_docente = $rowDocente['apellido_docente'];
                                    }
                                    //unir con la tabla local por medio de id_local
                                    $queryLocal = mysqli_query($mysqli, "SELECT *FROM locales where id_local='$id_local_horario'");
                                    $locales = mysqli_fetch_all($queryLocal, MYSQLI_ASSOC);
                                    $cantidadLocal = mysqli_num_rows($queryLocal);
                                    foreach ($locales as $rowLocal) {
                                        $id_local = $rowLocal['id_local'];
                                        $nombre_local = $rowLocal['nombre_local'];
                                    }
                            ?>
                                    <tbody>
                                        <div class="container_card">
                                            <tr>
                                                <td style="vertical-align: middle;"><?php echo $dia_horario; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $hora_horario; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $nivel_ciclo; ?> </td>
                                                <td style="vertical-align: middle;"><?php echo $nombre_cursos; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $nombre_docente . " " . $apellido_docente; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $nombre_local; ?></td>
                                            </tr>
                                        </div>
                                    </tbody>
                                <?php }
                            } else { ?>
                                <tbody>
                                    <div class="container_card">
                                        <tr>
                                            <td style="vertical-align: middle;">No hay reporte registrados para este semestre</td>
                                        </tr>
                                    </div>
                                </tbody>
                            <?php
                            } ?>
                        </table>
                    </div>
                </center>

            </div>

        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="script.js"></script>
</body>

</html>