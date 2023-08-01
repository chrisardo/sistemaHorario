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
                            <a class="active" href="ciclo.php"><strong>Ciclo</strong></a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            include("../../controlador/conexion.php");
            extract($_GET);
            $queryCiclo2 = mysqli_query($mysqli, "SELECT *FROM ciclo");
            $ciclos2 = mysqli_fetch_all($queryCiclo2, MYSQLI_ASSOC);
            $cantidadCiclo2 = mysqli_num_rows($queryCiclo2);
            if (!@empty($id_ciclos)) {
                $sqlCiclo =  mysqli_query($mysqli, "SELECT * FROM ciclo where id_ciclo='$id_ciclos'");
                $cantidadCiclos1 = mysqli_num_rows($sqlCiclo);
                $ciclos1 = mysqli_fetch_all($sqlCiclo, MYSQLI_ASSOC);
                foreach ($ciclos1 as $rowCiclo) {
                    $id_ciclo = $rowCiclo['id_ciclo'];
                    $nivel_ciclos = $rowCiclo['nivel_ciclo'];
                    $id_semestres = $rowCiclo['id_semestre']; //unir con la tabla semestres por medio de id_semestre
                    $querySemestre1 = mysqli_query($mysqli, "SELECT *FROM semestres where id_semestre='$id_semestres'");
                    $semestres1 = mysqli_fetch_all($querySemestre1, MYSQLI_ASSOC);
                    $cantidadSemestres1 = mysqli_num_rows($querySemestre1);
                    foreach ($semestres1 as $rowSemestre1) {
                        $id_semestre1 = $rowSemestre1['id_semestre'];
                        $nombre_semestre1 = $rowSemestre1['nombre_semestre'];
                    }
                }
            }
            ?>
            <div class="table-data">
                <div class="todo">
                    <form action="" enctype="multipart/form-data" method="post" class="formulario column column--50">
                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="formulario__label">Ciclo: </label>
                                <?php if (!@empty($id_ciclos)) { ?>
                                    <input type="text" name="cicloName" value="<?php echo $nivel_ciclos; ?>" class="form-control" required="required">
                                <?php } else { ?>
                                    <input type="text" name="cicloName" placeholder="Ingresa el ciclo" class="form-control" required="required">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label for="" class="formulario__label">Semestre al que pertenece: </label>
                                <?php if (!@empty($id_ciclos)) { ?>
                                    <select id="soporte" class="form-control" name="semestreName" required="required">
                                        <?php if ($cantidadSemestres1 > 0) {
                                        ?>
                                            <option value="<?php echo $id_semestre1; ?>" selected="<?php echo $id_semestre1; ?>">
                                                <?php echo $nombre_semestre1; ?>
                                            </option>
                                        <?php } ?>

                                        <?php
                                        //mostando la lista de semestres
                                        $sqlSemestre =  mysqli_query($mysqli, "SELECT * FROM semestres");
                                        $semestres = mysqli_fetch_all($sqlSemestre, MYSQLI_ASSOC);
                                        foreach ($semestres as $rowSemestre) {
                                            $id_semestres = $rowSemestre['id_semestre'];
                                            $nombre_semestres = $rowSemestre['nombre_semestre'];
                                        ?>
                                            <option value="<?php echo $id_semestres; ?>"><?php echo $nombre_semestres; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php } else { ?>
                                    <select id="soporte" class="form-control" name="semestreName" required="required">
                                        <option value="" selected="">Seleccione el semestre</option>
                                        <?php
                                        $sqlSemestres =  mysqli_query($mysqli, "SELECT * FROM semestres");

                                        $semestress = mysqli_fetch_all($sqlSemestres, MYSQLI_ASSOC);
                                        foreach ($semestress as $rowSemestres) {
                                            $id_semestres = $rowSemestres['id_semestre'];
                                            $nombre_semestres = $rowSemestres['nombre_semestre'];
                                        ?>
                                            <option value="<?php echo $id_semestres; ?>"><?php echo $nombre_semestres; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php } ?>
                            </div>
                        </div>

                        <center>
                            <?php if (!@empty($id_ciclo)) { ?>
                                <input type="submit" name="editarCiclo" value="EDITAR" style="width:180px; margin-top: 4px;" class="btn btn-primary">
                                <input type="submit" name="cancelarCiclo" value="CANCELAR" style="width:180px; margin-top: 4px;" class="btn btn-success">
                            <?php } else { ?>
                                <input type="submit" name="agregarCiclo" value="AGREGAR" style="width:180px; margin-top: 4px;" class="btn btn-primary">
                            <?php } ?>
                        </center>
                    </form>
                    <?php
                    if (isset($_POST['agregarCiclo'])) {
                        $ciclo_Imput = $_POST['cicloName'];
                        $semestre_Imput = $_POST['semestreName'];
                        if (!empty($semestre_Imput) && !empty($ciclo_Imput)) {
                            $query = "INSERT INTO ciclo (nivel_ciclo, id_semestre)
                VALUES('$ciclo_Imput', '$semestre_Imput')";
                            $resultado = $mysqli->query($query);
                            if ($resultado) {
                                echo '<div class="alert alert-primary" role="alert">Insertado con exito!. </div>';
                                echo "<script>location.href='ciclo.php'</script>";
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Hubo problemas al insertar. </div>';
                                //echo "<script>location.href='admregistorta.php'</script>";
                            }
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Te falta datos que completar. </div>';
                            //echo "<script>location.href='admregistorta.php'</script>";
                        }
                    } else  if (isset($_POST['editarCiclo'])) {
                        $ciclo_Imput = $_POST['cicloName'];
                        $semestre_Imput = $_POST['semestreName'];
                        if (!empty($semestre_Imput) && !empty($ciclo_Imput)) {
                            $query = "UPDATE ciclo 
                SET nivel_ciclo='$ciclo_Imput', id_semestre='$semestre_Imput' WHERE id_ciclo='$id_ciclo'";
                            $resultado = $mysqli->query($query);
                            if ($resultado) {
                                echo '<div class="alert alert-primary" role="alert">Actualizado con exito!. </div>';
                                echo "<script>location.href='ciclo.php'</script>";
                            } else {
                                echo "Error: " . $query . "<br>" . mysqli_error($mysqli);

                                echo '<div class="alert alert-danger" role="alert">Hubo problemas al insertar. </div>';
                                //echo "<script>location.href='admregistorta.php'</script>";
                            }
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Te falta datos que completar. </div>';
                            //echo "<script>location.href='admregistorta.php'</script>";
                        }
                    } else  if (isset($_POST['cancelarCiclo'])) {
                        echo "<script>location.href='ciclo.php'</script>";
                    }
                    $queryCiclo2 = mysqli_query($mysqli, "SELECT *FROM ciclo");
                    $ciclos2 = mysqli_fetch_all($queryCiclo2, MYSQLI_ASSOC);
                    $cantidadCiclo2 = mysqli_num_rows($queryCiclo2);
                    ?>
                </div>
                <div class="order">
                    <p> Ciclos existentes:<?php echo $cantidadCiclo2 ?></p>
                    <div class="container-fluid p-2">
                        <table class="table border-primary" style="border:2px solid blue;">
                            <thead>
                                <tr>
                                    <th scope="col">Ciclo</th>
                                    <th scope="col">Semestre</th>
                                </tr>
                            </thead>
                            <?php

                            if ($cantidadCiclo2 > 0) {
                                foreach ($ciclos2 as $rowCiclo2) {
                                    $id_ciclo2 = $rowCiclo2['id_ciclo'];
                                    $nivel_ciclo2 = $rowCiclo2['nivel_ciclo'];
                                    $id_semestre2 = $rowCiclo2['id_semestre'];
                                    $querySemestre2 = mysqli_query($mysqli, "SELECT *FROM semestres where id_semestre='$id_semestre2'");
                                    $semestres2 = mysqli_fetch_all($querySemestre2, MYSQLI_ASSOC);
                                    $cantidadSemestres2 = mysqli_num_rows($querySemestre2);
                                    foreach ($semestres2 as $rowSemestre2) {
                                        $id_semestre2 = $rowSemestre2['id_semestre'];
                                        $nombre_semestre2 = $rowSemestre2['nombre_semestre'];
                                    }
                            ?>
                                    <tbody>
                                        <div class="container_card">
                                            <tr>
                                                <td style="vertical-align: middle;"><?php echo $nivel_ciclo2; ?></td>
                                                <?php if ($cantidadSemestres2 > 0) { ?>
                                                    <td style="vertical-align: middle;"><?php echo $nombre_semestre2; ?></td>
                                                <?php } else { ?>
                                                    <td style="vertical-align: middle;">
                                                        Semestre no definido</td>
                                                <?php } ?>
                                                <?php if ($id_ciclo2 == @$id_ciclo) {
                                                } else { ?>
                                                    <td style="vertical-align: middle;"><a href="ciclo.php?id_ciclos=<?php echo $id_ciclo2; ?>" class="btn btn-primary">Editar</a> </td>
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