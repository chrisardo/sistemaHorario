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
            <li class="active">
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
                            <a class="active" href="../configuraciones.php">Configuraciones</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="cursos.php"><strong>Cursos</strong></a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            include("../../controlador/conexion.php");
            extract($_GET);
            $queryCursos2 = mysqli_query($mysqli, "SELECT *FROM cursos order by id_ciclo Asc");
            $cursos2 = mysqli_fetch_all($queryCursos2, MYSQLI_ASSOC);
            $cantidadCursos2 = mysqli_num_rows($queryCursos2);
            if (!@empty($id_curso)) {
                $queryCursos1 = mysqli_query($mysqli, "SELECT *FROM cursos where id_curso='$id_curso'");
                $cursos1 = mysqli_fetch_all($queryCursos1, MYSQLI_ASSOC);
                $cantidadCursos1 = mysqli_num_rows($queryCursos1);

                foreach ($cursos1 as $rowCursos) {
                    $id_curso = $rowCursos['id_curso'];
                    $nombre_curso = $rowCursos['nombre_curso'];
                    $codigo_curso = $rowCursos['codigo_curso'];
                    $credit_curso = $rowCursos['credit_curso'];
                    $id_ciclo = $rowCursos['id_ciclo'];
                    $sqlCiclo =  mysqli_query($mysqli, "SELECT * FROM ciclo where id_ciclo='$id_ciclo'");
                    $cantidadCiclos1 = mysqli_num_rows($sqlCiclo);
                    $ciclos1 = mysqli_fetch_all($sqlCiclo, MYSQLI_ASSOC);
                    foreach ($ciclos1 as $rowCiclo) {
                        $id_ciclo = $rowCiclo['id_ciclo'];
                        $nivel_ciclo1 = $rowCiclo['nivel_ciclo'];
                        $id_semestre = $rowCiclo['id_semestre'];
                    }
                    $sqlSemestre =  mysqli_query($mysqli, "SELECT * FROM semestres where id_semestre='$id_semestre'");
                    $cantidadSemestre1 = mysqli_num_rows($sqlSemestre);
                    $semestre1 = mysqli_fetch_all($sqlSemestre, MYSQLI_ASSOC);
                    foreach ($semestre1 as $rowSemestre) {
                        $id_semestre = $rowSemestre['id_semestre'];
                        $nombre_semestre = $rowSemestre['nombre_semestre'];
                    }
                }
            }
            ?>
            <div class="table-data">
                <div class="todo">
                    <form action="" enctype="multipart/form-data" method="post" class="formulario column column--50 bg-orange">
                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="formulario__label">Curso: </label>
                                <?php if (!@empty($id_curso)) { ?>
                                    <input type="text" name="cursosName" value="<?php echo $nombre_curso; ?>" class="form-control" required="required">
                                <?php } else { ?>
                                    <input type="text" name="cursosName" placeholder="Ingresa el curso" class="form-control" required="required">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="formulario__label">Codigo: </label>
                                <?php if (!@empty($id_curso)) { ?>
                                    <input type="text" name="codigoName" value="<?php echo $codigo_curso; ?>" class="form-control" required="required">
                                <?php } else { ?>
                                    <input type="text" name="codigoName" placeholder="Ingresa el codigo" class="form-control" required="required">
                                <?php } ?>
                            </div>
                            <div class="col">
                                <label for="" class="formulario__label">Credito: </label>
                                <?php if (!@empty($id_curso)) { ?>
                                    <input type="text" name="creditName" value="<?php echo $credit_curso; ?>" class="form-control" required="required">
                                <?php } else { ?>
                                    <input type="text" name="creditName" placeholder="Ingresa el codigo" class="form-control" required="required">

                                <?php } ?>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="formulario__label">Semestre al que pertenece: </label>
                                <?php if (!@empty($id_curso)) { ?>
                                    <select id="semestreSelect" class="form-control" name="semestreName" required="required">
                                        <?php if ($cantidadCiclos1 > 0) {
                                        ?>
                                            <option value="<?php echo $id_semestre; ?>" selected="<?php echo $id_semestre; ?>">
                                                <?php echo $nombre_semestre; ?>
                                            </option>
                                        <?php
                                        } ?>

                                        <?php
                                        $sqlSemestre =  mysqli_query($mysqli, "SELECT * FROM semestres");

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
                                <?php } else { ?>
                                    <select id="semestreSelect" class="form-control" name="semestreName" required="required">
                                        <option value="" selected="">Seleccione el ciclo</option>
                                        <?php
                                        $sqlSemestre =  mysqli_query($mysqli, "SELECT * FROM semestres");

                                        $semestres = mysqli_fetch_all($sqlSemestre, MYSQLI_ASSOC);
                                        foreach ($semestres as $rowSemestre) {
                                            $id_semestre = $rowSemestre['id_semestre'];
                                            $nombre_semestre = $rowSemestre['nombre_semestre'];
                                        ?>
                                            ?>
                                            <option value="<?php echo $id_semestre; ?>"><?php echo $nombre_semestre; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php } ?>
                            </div>
                            <div class="col">
                                <label for="" style="font-size: 14px;" class="formulario__label">
                                    <strong>Ciclo:</strong>
                                </label>
                                <select id="cicloSelect" class="form-control border-primary" name="cicloName" required="required">
                                    <option value="-" selected="">Seleccione el ciclo</option>
                                </select>
                            </div>
                        </div>

                        <center>
                            <?php if (!@empty($id_curso)) { ?>
                                <input type="submit" name="editarCurso" value="EDITAR" style="width:180px; margin-top: 4px;" class="btn btn-primary">
                                <input type="submit" name="cancelarCurso" value="CANCELAR" style="width:180px; margin-top: 4px;" class="btn btn-success">
                            <?php } else { ?>
                                <input type="submit" name="agregarCurso" value="AGREGAR" style="width:180px; margin-top: 4px;" class="btn btn-primary">
                            <?php } ?>
                        </center>
                    </form>
                    <!-- ... (your existing HTML code) ... -->

                    <script>
                        // Obtener referencia a los elementos select
                        const semestreSelect = document.getElementById('semestreSelect');
                        const cicloSelect = document.getElementById('cicloSelect');

                        // Evento de cambio en el select del ciclo
                        semestreSelect.addEventListener('change', function() {
                            const selectedSemestre = semestreSelect.value;

                            // Realizar una petición AJAX para obtener los cursos asociados al ciclo seleccionado
                            const xhr = new XMLHttpRequest();
                            xhr.open('POST', 'get_ciclos.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    // Limpiar las opciones actuales del select del curso
                                    cicloSelect.innerHTML = '';

                                    // Agregar las nuevas opciones al select del curso
                                    const ciclos = JSON.parse(xhr.responseText);
                                    ciclos.forEach(function(ciclo) {
                                        const option = document.createElement('option');
                                        option.value = ciclo.id_ciclo;
                                        option.textContent = ciclo.nivel_ciclo;
                                        cicloSelect.appendChild(option);
                                    });
                                }
                            };
                            xhr.send('semestre_id=' + selectedSemestre);
                        });
                    </script>

                    <!-- ... (your existing HTML code) ... -->

                    <?php
                    if (isset($_POST['agregarCurso'])) {
                        $curso_Imput = $_POST['cursosName'];
                        $codigo_Imput = $_POST['codigoName'];
                        $credito_Imput = $_POST['creditName'];
                        $ciclo_Imput = $_POST['cicloName'];
                        $consultaCursos = mysqli_query($mysqli, "SELECT * FROM cursos where codigo_curso='$codigo_Imput' and id_ciclo='$ciclo_Imput'");
                        $cantidadCursos = mysqli_num_rows($consultaCursos);
                        $cursoRow = mysqli_fetch_all($consultaCursos, MYSQLI_ASSOC);
                        if (!empty($curso_Imput) && !empty($ciclo_Imput) && !empty($credito_Imput)) {
                            if ($cantidadCursos > 0) {
                                echo '<div class="alert alert-danger" role="alert">Ya existe curso con el codigo: ' . $codigo_Imput . ' del ciclo: ' . $ciclo_Imput . '</div>';
                            } else {
                                $query = "INSERT INTO cursos (nombre_curso, codigo_curso, credit_curso, id_ciclo) 
                    VALUES('$curso_Imput', '$codigo_Imput', '$credito_Imput', '$ciclo_Imput')";
                                $resultado = $mysqli->query($query);
                                if ($resultado) {
                                    echo '<div class="alert alert-primary" role="alert">Insertado con exito!. </div>';
                                    echo "<script>location.href='cursos.php'</script>";
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">Hubo problemas al insertar. </div>';
                                    //echo "<script>location.href='admregistorta.php'</script>";
                                }
                            }
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Te falta datos que completar. </div>';
                            //echo "<script>location.href='admregistorta.php'</script>";
                        }
                    } else  if (isset($_POST['editarCurso'])) {
                        $curso_Imput = $_POST['cursosName'];
                        $codigo_Imput = $_POST['codigoName'];
                        $credit_Input = $_POST['creditName'];
                        $ciclo_Imput = $_POST['cicloName'];
                        $consultaCursos = mysqli_query($mysqli, "SELECT * FROM cursos where codigo_curso='$codigo_Imput'");
                        $cantidadCursos = mysqli_num_rows($consultaCursos);
                        $cursoRow = mysqli_fetch_all($consultaCursos, MYSQLI_ASSOC);
                        if (!empty($curso_Imput) && !empty($ciclo_Imput)  && !empty($credit_Input)) {
                            $query = "UPDATE cursos 
                SET cursos.nombre_curso = '$curso_Imput', cursos.codigo_curso='$codigo_Imput', 
                cursos.credit_curso='$credit_Input', cursos.id_ciclo='$ciclo_Imput'  
                WHERE cursos.id_curso='$id_curso'";
                            $resultado = $mysqli->query($query);
                            if ($resultado) {
                                echo '<div class="alert alert-primary" role="alert">Actualizado con exito!. </div>';
                                echo "<script>location.href='cursos.php'</script>";
                            } else {
                                echo "Error: " . $query . "<br>" . mysqli_error($mysqli);

                                echo '<div class="alert alert-danger" role="alert">Hubo problemas al insertar. </div>';
                                //echo "<script>location.href='admregistorta.php'</script>";
                            }
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Te falta datos que completar. </div>';
                            //echo "<script>location.href='admregistorta.php'</script>";
                        }
                    } else  if (isset($_POST['cancelarCurso'])) {
                        echo "<script>location.href='cursos.php'</script>";
                    }
                    ?>
                </div>
                <div class="order">
                    <p> Semestres existentes:<?php echo $cantidadCursos2 ?> </p>

                    <div class="container-fluid p-2">
                        <table class="table border-primary" style="border:2px solid blue;">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Curso</th>
                                    <th scope="col">Codigo curso</th>
                                    <th scope="col">Credito Curso</th>
                                    <th scope="col">Semestre </th>
                                    <th scope="col">Ciclo</th>
                                </tr>
                            </thead>
                            <?php

                            if ($cantidadCursos2 > 0) {
                                foreach ($cursos2 as $rowCurso) {
                                    $id_cursos = $rowCurso['id_curso'];
                                    $nombre_cursos = $rowCurso['nombre_curso'];
                                    $codigo_cursos = $rowCurso['codigo_curso'];
                                    $credito_cursos = $rowCurso['credit_curso'];
                                    $id_ciclo = $rowCurso['id_ciclo'];
                                    $sqlCiclo =  mysqli_query($mysqli, "SELECT * FROM ciclo where id_ciclo='$id_ciclo' order by id_semestre Asc");
                                    $cantidadCiclos1 = mysqli_num_rows($sqlCiclo);
                                    $ciclos1 = mysqli_fetch_all($sqlCiclo, MYSQLI_ASSOC);
                                    foreach ($ciclos1 as $rowCiclo) {
                                        $id_ciclo = $rowCiclo['id_ciclo'];
                                        $nivel_ciclo = $rowCiclo['nivel_ciclo'];
                                        $id_semestre = $rowCiclo['id_semestre'];

                                        //semestre
                                        $querySemestres = mysqli_query($mysqli, "SELECT * FROM semestres where id_semestre='$id_semestre'");
                                        $cantidadSemestres1 = mysqli_num_rows($querySemestres);
                                        $semestres1 = mysqli_fetch_all($querySemestres, MYSQLI_ASSOC);
                                        foreach ($semestres1 as $rowSemestres) {
                                            $id_semestres = $rowSemestres['id_semestre'];
                                            $nombre_semestres = $rowSemestres['nombre_semestre'];
                                        }
                                    }
                            ?>
                                    <tbody>
                                        <div class="container_card">
                                            <tr>
                                                <td style="vertical-align: middle;"><?php echo $id_cursos; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $nombre_cursos; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $codigo_cursos; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $credito_cursos; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $nombre_semestres; ?></td>
                                                <?php if ($cantidadCiclos1 > 0) { ?>
                                                    <td style="vertical-align: middle;"><?php echo $nivel_ciclo; ?></td>
                                                <?php } else { ?>
                                                    <td style="vertical-align: middle;">
                                                        Ciclo no definido</td>
                                                <?php } ?>
                                                <?php if ($id_cursos == @$id_curso) {
                                                } else { ?>
                                                    <td style="vertical-align: middle;"><a href="cursos.php?id_curso=<?php echo $id_cursos; ?>" class="btn btn-primary">Editar</a> </td>
                                                <?php } ?>
                                            </tr>
                                        </div>
                                    </tbody>
                            <?php }
                            } ?>
                        </table>
                    </div>
                </div>

            </div>

        </main>
        <!-- MAIN -->
        <div class="container">


        </div>

    </section>
    <!-- CONTENT -->


    <script src="script.js"></script>
</body>

</html>