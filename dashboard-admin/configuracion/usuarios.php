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
                            <a class="active" href="usuarios.php"><strong>Usuarios</strong></a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            include("../../controlador/conexion.php");
            extract($_GET);
            $queryUsuario2 = mysqli_query($mysqli, "SELECT *FROM usuario");
            $usuario2 = mysqli_fetch_all($queryUsuario2, MYSQLI_ASSOC);
            $cantidadUsuario2 = mysqli_num_rows($queryUsuario2);
            ?>
            <div class="table-data">
                <div class="">
                    <form action="" enctype="multipart/form-data" method="post" class="formulario column column--50 bg-orange">
                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="formulario__label"><strong> TIPO DE USUARIO: </strong></label>
                                <select id="soporte" class="form-control border-primary" name="tipo_usuario" required="required">
                                    <option value="" selected="">Seleccione el tipo de usuario</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Docente">Docente</option>
                                    <option value="Alumno">Alumno</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="formulario__label">Username: </label>
                                <input type="text" name="usernameName" placeholder="Ingresa Username" class="form-control border-primary" required="required">
                            </div>
                            <div class="col">
                                <label for="" class="formulario__label">Contraseña: </label>
                                <input type="text" name="contraseName" placeholder="Ingresa Contraseña" class="form-control border-primary" required="required">
                            </div>

                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="formulario__label">DNI: </label>
                                <input type="number" name="dniName" placeholder="Ingresa DNI" class="form-control border-primary" required="required">
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
                                <label for="" class="formulario__label">Nombre: </label>
                                <input type="text" name="nombreName" placeholder="Ingresa nombre" class="form-control border-primary" required="required">
                            </div>
                            <div class="col">
                                <label for="" class="formulario__label">Apellido: </label>
                                <input type="text" name="apellidoName" placeholder="Ingresa apellido" class="form-control border-primary" required="required">
                            </div>
                            <div class="col">
                                <label for="" class="formulario__label">Correo: </label>
                                <input type="text" name="correoName" placeholder="Ingresa Correo" class="form-control border-primary" required="required">
                            </div>

                        </div>

                        <center>
                            <input type="submit" name="agregarUsuario" value="AGREGAR" style="width:180px; margin-top: 4px;" class="btn btn-primary">
                        </center>
                    </form>
                    <?php
                    if (isset($_POST['agregarUsuario'])) {
                        $tipo_usuario_option = $_POST['tipo_usuario'];
                        $username_Input = $_POST['usernameName'];
                        $contrase_Input = $_POST['contraseName'];
                        $dni_Input = $_POST['dniName'];
                        $direccion_Input = $_POST['direccionName'];
                        $celular_Input = $_POST['celularName'];
                        $nombre_Input = $_POST['nombreName'];
                        $apellido_Input = $_POST['apellidoName'];
                        $correo_Input = $_POST['correoName'];

                        $consultaContrase = mysqli_query($mysqli, "SELECT * FROM usuario where correo_usuario='$correo_Input' and username='$username_Input'");
                        $cantidadContrase = mysqli_num_rows($consultaContrase);
                        if (!empty($direccion_Input) && !empty($nombre_Input) && !empty($apellido_Input) && !empty($username_Input)) {
                            if ($celular_Input <= 999999999 && $celular_Input >= 900000000) {
                                if ($cantidadContrase > 0) {
                                    echo '<div class="alert alert-danger" role="alert">Ya existe el email y/o username desginado para un usuario</div>';
                                } else {
                                    $query = "INSERT INTO usuario (tipo_usuario, nombre_usuario, apellido_usuario, dni_usuario, direccion_usuario, celular_usuario, correo_usuario, username, contrasena) 
                VALUES('$tipo_usuario_option', '$nombre_Input', '$apellido_Input', '$dni_Input', '$direccion_Input', '$celular_Input', '$correo_Input', '$username_Input','$contrase_Input')";
                                    $resultado = $mysqli->query($query);
                                    if ($resultado) {
                                        echo '<div class="alert alert-primary" role="alert">Insertado con exito!. </div>';
                                        echo "<script>location.href='usuarios.php'</script>";
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

                    ?>
                </div>
                <div class="order">
                    <p> Usuarios existentes:<?php echo $cantidadUsuario2; ?></p>

                    <div class="container-fluid p-2">
                        <table class="table border-primary" style="border:2px solid blue;">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">DNI</th>
                                    <th scope="col">UserName</th>
                                    <th scope="col">Rol</th>

                                </tr>
                            </thead>
                            <?php

                            if ($cantidadUsuario2 > 0) {
                                foreach ($usuario2 as $rowUsuario) {
                                    $id_usuario = $rowUsuario['id_usuario'];
                                    $nombre_usuario = $rowUsuario['nombre_usuario'];
                                    $apellido_usuario = $rowUsuario['apellido_usuario'];
                                    $username_usuario = $rowUsuario['username'];
                                    $dni_usuario = $rowUsuario['dni_usuario'];
                                    $rol_usuario = $rowUsuario['tipo_usuario'];
                            ?>
                                    <tbody>
                                        <div class="container_card">
                                            <tr>
                                                <td style="vertical-align: middle;"><?php echo $id_usuario; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $nombre_usuario . ' ' . $apellido_usuario; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $dni_usuario; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $username_usuario; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $rol_usuario; ?></td>
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