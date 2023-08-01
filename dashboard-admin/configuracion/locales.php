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
                            <a class="active" href="locales.php"><strong>Locales</strong></a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            include("../../controlador/conexion.php");
            extract($_GET);
            $queryLocal2 = mysqli_query($mysqli, "SELECT *FROM locales");
            $local2 = mysqli_fetch_all($queryLocal2, MYSQLI_ASSOC);
            $cantidadLocal2 = mysqli_num_rows($queryLocal2);
            ?>
            <div class="table-data">
                <div class="todo">
                    <form action="" enctype="multipart/form-data" method="post" class="formulario column column--50 bg-orange">
                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="formulario__label">Aula: </label>
                                <?php if (!@empty($id_local)) {
                                    $queryLocal1 = mysqli_query($mysqli, "SELECT *FROM locales where id_local='$id_local'");
                                    $local1 = mysqli_fetch_all($queryLocal1, MYSQLI_ASSOC);
                                    $cantidadLocal1 = mysqli_num_rows($queryLocal1);
                                    if ($cantidadLocal1 > 0) {
                                        foreach ($local1 as $rowLocal) {
                                            $id_Local = $rowLocal['id_local'];
                                            $nombre_Local = $rowLocal['nombre_local'];
                                ?>
                                            <input type="text" name="localName" value="<?php echo $nombre_Local; ?>" class="form-control border-primary" required="required">
                                    <?php
                                        }
                                    } ?>
                                <?php } else { ?>
                                    <input type="text" name="localName" placeholder="Ingresa el local" class="form-control border-primary" required="required">
                                <?php } ?>
                            </div>
                        </div>

                        <center>
                            <?php if (!@empty($id_local)) { ?>
                                <input type="submit" name="editarLocal" value="EDITAR" style="width:180px; margin-top: 4px;" class="btn btn-primary">
                                <input type="submit" name="cancelarLocal" value="CANCELAR" style="width:180px; margin-top: 4px;" class="btn btn-success">
                            <?php } else { ?>
                                <input type="submit" name="agregarLocal" value="AGREGAR" style="width:180px; margin-top: 4px;" class="btn btn-primary">
                            <?php } ?>
                        </center>
                    </form>
                    <?php
                    if (isset($_POST['agregarLocal'])) {
                        $local_Imput = $_POST['localName'];

                        $consultaLocal = mysqli_query($mysqli, "SELECT * FROM locales where nombre_local='$local_Imput'");
                        $cantidadLocal = mysqli_num_rows($consultaLocal);
                        if (!empty($local_Imput)) {
                            if ($cantidadLocal > 0) {
                                echo '<div class="alert alert-danger" role="alert">Ya existe el local: ' . $local_Imput . '</div>';
                            } else {
                                $query = "INSERT INTO locales (nombre_local) VALUES('$local_Imput')";
                                $resultado = $mysqli->query($query);
                                if ($resultado) {
                                    echo '<div class="alert alert-primary" role="alert">Insertado con exito!. </div>';
                                    echo "<script>location.href='locales.php'</script>";
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">Hubo problemas al insertar. </div>';
                                    //echo "<script>location.href='admregistorta.php'</script>";
                                }
                            }
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Te falta datos que completar. </div>';
                            //echo "<script>location.href='admregistorta.php'</script>";
                        }
                    } else  if (isset($_POST['editarLocal'])) {
                        $local_Imput = $_POST['localName'];

                        $consultaLocal = mysqli_query($mysqli, "SELECT * FROM locales where nombre_local='$local_Imput'");
                        $cantidadLocal = mysqli_num_rows($consultaLocal);
                        $localRow = mysqli_fetch_all($consultaLocal, MYSQLI_ASSOC);
                        if (!empty($local_Imput)) {
                            $query = "UPDATE locales SET locales.nombre_local = '$local_Imput' WHERE locales.id_local='$id_local'";
                            $resultado = $mysqli->query($query);
                            if ($resultado) {
                                echo '<div class="alert alert-primary" role="alert">Actualizado con exito!. </div>';
                                echo "<script>location.href='locales.php'</script>";
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Hubo problemas al insertar. </div>';
                                //echo "<script>location.href='admregistorta.php'</script>";
                            }
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Te falta datos que completar. </div>';
                            //echo "<script>location.href='admregistorta.php'</script>";
                        }
                    } else  if (isset($_POST['cancelarLocal'])) {
                        echo "<script>location.href='locales.php'</script>";
                    }
                    ?>
                </div>
                <div class="order">
                    <p> Aulas existentes:<?php echo $cantidadLocal2 ?></p>

                    <div class="container-fluid p-2">
                        <table class="table border-primary" style="border:2px solid blue;">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Aula</th>

                                </tr>
                            </thead>
                            <?php

                            if ($cantidadLocal2 > 0) {
                                foreach ($local2 as $rowLocal) {
                                    $id_locales = $rowLocal['id_local'];
                                    $nombre_local = $rowLocal['nombre_local'];
                            ?>
                                    <tbody>
                                        <div class="container_card">
                                            <tr>
                                                <td style="vertical-align: middle;"><?php echo $id_locales; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $nombre_local; ?></td>

                                                <?php if ($id_locales == @$id_local) {
                                                } else { ?>
                                                    <td style="vertical-align: middle;"><a href="locales.php?id_local=<?php echo $id_locales; ?>" class="btn btn-primary">Editar</a> </td>
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