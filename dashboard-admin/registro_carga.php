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

                    <input type="checkbox" id="switch-mode" hidden>
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
                            <a class="active" href="carga_academica.php">Carga academica</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#"><strong>Carga docente</strong></a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>
            <br>
            <?php
            include("../controlador/conexion.php");
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

            <div class="table-data">
                <div class="todo">
                    <div style="margin-left: 16px;">
                        <p><strong>Docente: <?php echo $nombre_docente . " " . $apellido_docente; ?></strong></p>
                        <p>D.N.I: <?php echo $dni_docente; ?></p>
                    </div>
                    <form action="" enctype="multipart/form-data" method="post" class="formulario column column--50 border-primary">
                        <div class="row g-3">
                            <div class="col">
                                <label for="" style="font-size: 14px;" class="formulario__label">
                                    <strong>CICLO:</strong>
                                </label>
                                <select id="cicloSelect" class="form-control border-primary" name="cicloName" required="required">
                                    <option value="-" selected="">Seleccione el ciclo</option>
                                    <?php
                                    $sqlCiclo = mysqli_query($mysqli, "SELECT * FROM ciclo where id_semestre='$id_semestre'");

                                    $ciclos = mysqli_fetch_all($sqlCiclo, MYSQLI_ASSOC);
                                    foreach ($ciclos as $rowCiclo) {
                                        $id_ciclo = $rowCiclo['id_ciclo'];
                                        $nivel_ciclo = $rowCiclo['nivel_ciclo'];
                                    ?>
                                        <option value="<?php echo $id_ciclo; ?>"><?php echo $nivel_ciclo; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="" style="font-size: 14px;" class="formulario__label">
                                    <strong>CURSO:</strong>
                                </label>
                                <select id="cursoSelect" class="form-control border-primary" name="cursoName" required="required">
                                    <option value="-" selected="">Seleccione el curso</option>
                                </select>
                            </div>
                        </div>
                        <center><br>
                            <input type="submit" name="agregarCarga" value="ASIGNAR" style="width:180px;" class="btn btn-primary">
                        </center>
                    </form>
                    <script>
                        // Obtener referencia a los elementos select
                        const cicloSelect = document.getElementById('cicloSelect');
                        const cursoSelect = document.getElementById('cursoSelect');

                        // Evento de cambio en el select del ciclo
                        cicloSelect.addEventListener('change', function() {
                            const selectedCiclo = cicloSelect.value;

                            // Realizar una petición AJAX para obtener los cursos asociados al ciclo seleccionado
                            const xhr = new XMLHttpRequest();
                            xhr.open('POST', 'obtener_cursos.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    // Limpiar las opciones actuales del select del curso
                                    cursoSelect.innerHTML = '';

                                    // Agregar las nuevas opciones al select del curso
                                    const cursos = JSON.parse(xhr.responseText);
                                    cursos.forEach(function(curso) {
                                        const option = document.createElement('option');
                                        option.value = curso.id_curso;
                                        option.textContent = curso.nombre_curso;
                                        cursoSelect.appendChild(option);
                                    });
                                }
                            };
                            xhr.send('ciclo_id=' + selectedCiclo);
                        });
                    </script>
                    <?php
                    if (isset($_POST['agregarCarga'])) {
                        $ciclo_Input = $_POST['cicloName'];
                        $curso_Imput = $_POST['cursoName'];
                        if (!empty($ciclo_Input) && !empty($curso_Imput)) {
                            $consultarCarga = mysqli_query($mysqli, "SELECT *FROM carga_academica where id_docente='$id_docente' and id_curso='$curso_Imput'");
                            $cargas2 = mysqli_fetch_all($consultarCarga, MYSQLI_ASSOC);
                            $cantidadCargas = mysqli_num_rows($consultarCarga);
                            if ($cantidadCargas  > 0) {
                                echo '<div class="alert alert-danger" role="alert">El docente ya tiene asignado este curso. </div>';
                            } else {
                                $query = "INSERT INTO carga_academica (id_docente, id_curso, id_ciclo, 	fecha_registro, id_semestre) 
                        VALUES('$id_docente', '$curso_Imput', '$ciclo_Input', now(), '$id_semestre')";
                                $resultado = $mysqli->query($query);
                                if ($resultado) {
                                    echo '<div class="alert alert-primary" role="alert">Insertado con exito!. </div>';
                                    echo "<script>location.href='registro_carga.php?id_docente=$id_docente&id_semestre=$id_semestre'</script>";
                                } else {
                                    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
                                    echo '<div class="alert alert-danger" role="alert">Hubo problemas al insertar. </div>';
                                    //echo "<script>location.href='admregistorta.php'</script>";
                                }
                            }
                        }
                    }
                    ?>
                    <br>
                    <?php
                    ?>

                </div>
                <div class="order">
                    <p style="margin-left: 26px;">Carga academica del semestre: <?php echo $nombre_semestre ?> </p>
                    <div class="container-fluid p-2">
                        <table class="table border-primary" style="border:2px solid blue;">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo curso</th>
                                    <th scope="col">Nombre del curso</th>
                                    <th scope="col">Creditos</th>
                                    <th scope="col">Ciclo al que pertenece</th>
                                </tr>
                            </thead>
                            <?php
                            if ($cantidadCarga2 > 0) {
                                foreach ($carga2 as $rowCarga) {
                                    $id_docente = $rowCarga['id_docente'];
                                    $id_curso = $rowCarga['id_curso'];
                                    $id_ciclo = $rowCarga['id_ciclo'];
                                    $id_semestre = $rowCarga['id_semestre'];
                                    $queryCiclo = mysqli_query($mysqli, "SELECT *FROM ciclo where id_ciclo='$id_ciclo'");
                                    $ciclo2 = mysqli_fetch_all($queryCiclo, MYSQLI_ASSOC);
                                    foreach ($ciclo2 as $rowCiclo) {
                                        $id_ciclo = $rowCiclo['id_ciclo'];
                                        $nivel_ciclo = $rowCiclo['nivel_ciclo'];
                                    }
                                    $queryCurso = mysqli_query($mysqli, "SELECT *FROM cursos where id_curso='$id_curso'");
                                    $cursos2 = mysqli_fetch_all($queryCurso, MYSQLI_ASSOC);
                                    foreach ($cursos2 as $rowCursos) {
                                        $id_curso = $rowCursos['id_curso'];
                                        $nombre_curso = $rowCursos['nombre_curso'];
                                        $cod_curso = $rowCursos['codigo_curso'];
                                        $credito_curso = $rowCursos['credit_curso'];
                                    }
                            ?>
                                    <tbody>

                                        <div class="container_card">

                                            <tr></tr>
                                            <td style="vertical-align: middle;"><?php echo $cod_curso; ?></td>
                                            <td style="vertical-align: middle;"><?php echo $nombre_curso; ?></td>
                                            <td style="vertical-align: middle;"><?php echo $credito_curso; ?></td>
                                            <td style="vertical-align: middle;"><?php echo $nivel_ciclo; ?></td>
                                            </tr>
                                        </div>
                                    </tbody>
                                <?php }
                            } else { ?>
                                <tbody>
                                    <div class="container_card">
                                        <td style="vertical-align: middle;">No hay registro</td>
                                    </div>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="script.js"></script>
</body>

</html>