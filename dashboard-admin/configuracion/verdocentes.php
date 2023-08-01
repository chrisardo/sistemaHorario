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
                            <a class="active" href="verdocentes.php"><strong>Docentes</strong></a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            include("../../controlador/conexion.php");
            extract($_GET);
            $queryDocentes = mysqli_query($mysqli, "SELECT *FROM docentes");
            $docentes2 = mysqli_fetch_all($queryDocentes, MYSQLI_ASSOC);
            $cantidadDocente2 = mysqli_num_rows($queryDocentes);
            ?>
            <div class="table-data">
                <div class="">
                    <p>Ingrese los datos del docente que desea registrar</p>
                    <form action="" enctype="multipart/form-data" method="post" class="formulario column column--50">
                        <div class=" row g-3">
                            <div class="col">
                                <label for="" class="formulario__label">Nombre: </label>
                                <input type="text" name="nombreName" placeholder="Ingresa nombre" class="form-control border-primary" required="required">
                            </div>
                            <div class="col">
                                <label for="" class="formulario__label">Apellido: </label>
                                <input type="text" name="apellidoName" placeholder="Ingresa apellido" class="form-control border-primary" required=" required">
                            </div>


                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="formulario__label">DNI: </label>
                                <input type="number" name="dniName" placeholder="Ingresa DNI" class="form-control border-primary" required="required">
                            </div>
                            <div class="col">
                                <label for="" class="formulario__label">Grado: </label>
                                <input type="text" name="gradoName" placeholder="Ingresa grado" class="form-control border-primary" required="required">
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="formulario__label">Correo: </label>
                                <input type="text" name="correoName" placeholder="Ingresa Correo" class="form-control border-primary" required="required">
                            </div>
                            <div class="col">
                                <label for="" class="formulario__label">Direccion: </label>
                                <input type="text" name="direccionName" placeholder="Ingresa Direccion" class="form-control border-primary" required="required">
                            </div>
                            <div class="col">
                                <label for="" class="formulario__label">Celular: </label>
                                <input type="number" name="celularName" placeholder="Ingresa Celular" class="form-control border-primary" required="required">
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="formulario__label"><strong>CATEGORIA: </strong></label>
                                <select id="soporte" class="form-control" name="categoria_docente" required="required">
                                    <option value="" selected="">Seleccione categoria</option>
                                    <option value="Auxiliar">Auxiliar</option>
                                    <option value="Asociado">Asociado</option>
                                    <option value="Principal">Principal</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="" class="formulario__label"><strong>CONDICION: </strong></label>
                                <select id="soporte" class="form-control" name="condicion_docente" required="required">
                                    <option value="" selected="">Seleccione condicion</option>
                                    <option value="Contratado">Contratado</option>
                                    <option value="Nombrado">Nombrado</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="" class="formulario__label"><strong>DEDICACION: </strong></label>
                                <select id="soporte" class="form-control" name="dedicacion_docente" required="required">
                                    <option value="" selected="">Seleccione dedicacion</option>
                                    <option value="Parcial">Parcial</option>
                                    <option value="TiempoCompleto">Tiempo completo</option>
                                    <option value="Exclusiva">Exclusiva</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="" class="formulario__label"><strong>Autoridad: </strong></label>
                                <select id="soporte" class="form-control" name="autoridad_docente" required="required">
                                    <option value="" selected="">Seleccione autoridad</option>
                                    <option value="si">Sí</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <center>
                            <input type="submit" name="guardarDocente" value="REGISTRAR" style="width:180px; margin-top: 4px;" class="btn btn-primary">
                        </center>
                    </form>
                    <?php
                    if (isset($_POST['guardarDocente'])) {
                        $dni_Input = $_POST['dniName'];
                        $nombre_Input = $_POST['nombreName'];
                        $apellido_Input = $_POST['apellidoName'];
                        $direccion_Input = $_POST['direccionName'];
                        $celular_Input = $_POST['celularName'];
                        $grado_Input = $_POST['gradoName'];
                        $correo_Input = $_POST['correoName'];
                        $categoria_Input = $_POST['categoria_docente'];
                        $condicion_Input = $_POST['condicion_docente'];
                        $dedicacion_Input = $_POST['dedicacion_docente'];
                        $autoridad_Input = $_POST['autoridad_docente'];

                        $consultaContrase = mysqli_query($mysqli, "SELECT * FROM docentes where correo_docente='$correo_Input'");
                        $cantidadContrase = mysqli_num_rows($consultaContrase);
                        if (!empty($direccion_Input) && !empty($nombre_Input) && !empty($apellido_Input) && !empty($grado_Input)) {
                            if ($celular_Input <= 999999999 && $celular_Input >= 900000000) {
                                if ($cantidadContrase > 0) {
                                    echo '<div class="alert alert-danger" role="alert">Ya existe el email y/o username desginado para un usuario</div>';
                                } else {
                                    $query = "INSERT INTO docentes 
        (dni_docente, Nombre_docente, apellido_docente, celular_docente, correo_docente, grado_docente, categoria_docente, condicion_docente, dedicacion_docente, autoridad, fecha_nacimiento) 
    VALUES('$dni_Input', '$nombre_Input', '$apellido_Input', '$celular_Input', '$correo_Input', '$grado_Input', '$categoria_Input', '$condicion_Input', '$dedicacion_Input', '$autoridad_Input', now())";
                                    $resultado = $mysqli->query($query);
                                    if ($resultado) {
                                        echo '<div class="alert alert-primary" role="alert">Insertado con exito!. </div>';
                                        echo "<script>location.href='verdocentes.php'</script>";
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert">Hubo problemas al insertar. </div>';
                                        //echo "<script>location.href='admregistorta.php'</script>";
                                    }
                                }
                            } else {
                                echo '<div class="alert alert-danger" role="alert">
El numero de celular tiene que ser de 9 digitos.
</div>';
                                //echo "<script>location.href='registro.php'</script>";
                            }
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Te falta datos que completar. </div>';
                            //echo "<script>location.href='admregistorta.php'</script>";
                        }
                    }
                    $queryUsuario2 = mysqli_query($mysqli, "SELECT *FROM usuario");
                    $usuario2 = mysqli_fetch_all($queryUsuario2, MYSQLI_ASSOC);
                    $cantidadUsuario2 = mysqli_num_rows($queryUsuario2);
                    ?>
                </div>
                <div class="order">
                    <p> Lista de todos los docentes: <?php echo $cantidadDocente2; ?></p>
                    <center>
                        <div class="container-fluid p-2">
                            <table class="table border-primary" style="border:2px solid blue;">
                                <thead>
                                    <tr>
                                        <th scope="col">DNI</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Grado</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Condicion</th>
                                        <th scope="col">Dedicacion</th>
                                        <th scope="col">Autoridad</th>
                                    </tr>
                                </thead>
                                <?php

                                if ($cantidadDocente2 > 0) {
                                    foreach ($docentes2 as $rowDocente) {
                                        $id_docente = $rowDocente['id_docente'];
                                        $nombre_docente = $rowDocente['Nombre_docente'];
                                        $apellido_docente = $rowDocente['apellido_docente'];
                                        $celular_docente = $rowDocente['celular_docente'];
                                        $correo_docente = $rowDocente['correo_docente'];
                                        $grado_docente = $rowDocente['grado_docente'];
                                        $categoria_docente = $rowDocente['categoria_docente'];
                                        $condicion_docente = $rowDocente['condicion_docente'];
                                        $dedicacion_docente = $rowDocente['dedicacion_docente'];
                                        $autoridad_docente = $rowDocente['autoridad'];
                                        $dni_docente = $rowDocente['dni_docente'];
                                ?>
                                        <tbody>
                                            <div class="container_card">
                                                <tr>
                                                    <td style="vertical-align: middle;"><?php echo $dni_docente; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $nombre_docente; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $apellido_docente; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $celular_docente; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $correo_docente; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $grado_docente; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $categoria_docente; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $condicion_docente; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $dedicacion_docente; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $autoridad_docente; ?></td>
                                                </tr>
                                            </div>
                                        </tbody>
                                <?php }
                                } ?>
                            </table>
                        </div>
                    </center>
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