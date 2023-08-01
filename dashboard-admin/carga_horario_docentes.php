<div class="container">
    <br>
    <?php
    require("../controlador/conexion.php"); //requerir la conexion a la base de datos

    // Check if the semestreName is set in the POST request
    if (isset($_POST['semestreName'])) {
        $semestreName = $_POST['semestreName'];

        $queryDocentes = mysqli_query($mysqli, "SELECT *FROM docentes");
        $docentes2 = mysqli_fetch_all($queryDocentes, MYSQLI_ASSOC);
        $cantidadDocente2 = mysqli_num_rows($queryDocentes);
    ?>

        <h3 style="margin-left: 26px;">Lista de todos los docentes: <?php echo $cantidadDocente2; ?></h3>
        <p style="margin-left: 26px;">Haga click en el boton para asignar a cada docente su carga academica</p>

        <center>
            <div class="container-fluid p-2">
                <table class="table border-primary" style="border:2px solid blue;">
                    <thead>
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Grado</th>
                            <th scope="col">Condicion</th>
                            <th scope="col">Dedicacion</th>
                            <th scope="col">Autoridad</th>
                            <th scope="col">Carga academica</th>
                        </tr>
                    </thead>
                    <?php

                    if ($cantidadDocente2 > 0) {
                        foreach ($docentes2 as $rowDocente) {
                            $id_docente = $rowDocente['id_docente'];
                            $nombre_docente = $rowDocente['Nombre_docente'];
                            $apellido_docente = $rowDocente['apellido_docente'];
                            $grado_docente = $rowDocente['grado_docente'];
                            $condicion_docente = $rowDocente['condicion_docente'];
                            $dedicacion_docente = $rowDocente['dedicacion_docente'];
                            $autoridad_docente = $rowDocente['autoridad'];
                            $dni_docente = $rowDocente['dni_docente'];

                            /*$queryCarga = mysqli_query($mysqli, "SELECT *FROM carga_academica where id_docente='$id_docente' and id_semestre='$semestreName'");
                            $carga2 = mysqli_fetch_all($queryCarga, MYSQLI_ASSOC);
                            $cantidadCarga2 = mysqli_num_rows($queryCarga);
                            foreach ($carga2 as $rowCarga) {
                                $id_carga = $rowCarga['id_carga'];
                                $id_semestre = $rowCarga['id_semestre'];
                            }*/
                    ?>
                            <tbody>
                                <div class="container_card">
                                    <tr>
                                        <td style="vertical-align: middle;"><?php echo $dni_docente; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $nombre_docente . " " . $apellido_docente; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $grado_docente; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $condicion_docente; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $dedicacion_docente; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $autoridad_docente; ?></td>
                                        <!--<td style="vertical-align: middle;">
                                            <?php /*if ($cantidadCarga2 > 0) { ?>
                                                <a href="registro_carga.php?id_docente=<?php echo $id_docente; ?>&id_semestre=<?php echo $semestreName ?>" class="btn btn-primary">Ver carga</a>
                                            <?php } else { ?>
                                                <a href="registro_carga.php?id_docente=<?php echo $id_docente; ?>&id_semestre=<?php echo $semestreName ?>" class="btn btn-primary">Asignar carga</a>
                                            <?php }*/ ?>
                                        </td>-->
                                        <td style="vertical-align: middle;">
                                            <?php
                                            //carga academica
                                            $queryCarga = mysqli_query($mysqli, "SELECT *FROM carga_academica where id_docente='$id_docente' and id_semestre='$semestreName'");
                                            $carga = mysqli_fetch_all($queryCarga, MYSQLI_ASSOC);
                                            $cantidadCarga = mysqli_num_rows($queryCarga);
                                            foreach ($carga as $carga) {
                                                $id_carga = $carga['id_carga'];
                                                $id_semestrecarga = $carga['id_semestre'];
                                                $queryHorario = mysqli_query($mysqli, "SELECT *FROM horario_academico where id_carga='$id_carga' ");
                                            }
                                            if ($cantidadCarga == 0) {
                                                echo "No hay carga academica para este docente";
                                            ?>
                                                <a href="registro_carga.php?id_docente=<?php echo $id_docente; ?>&id_semestre=<?php echo $semestreName ?>" class="btn btn-danger">Asignar carga</a>
                                            <?php
                                            } else if ($semestreName != $id_semestrecarga) {

                                                echo "No hay carga academica para este docente en este semestre";
                                            ?>
                                                <a href="registro_carga.php?id_docente=<?php echo $id_docente; ?>&id_semestre=<?php echo $semestreName ?>" class="btn btn-danger">Asignar carga</a>
                                            <?php
                                            } else {
                                                //Unir con la tabla horario academico por medio del id
                                                $queryHorario = mysqli_query($mysqli, "SELECT *FROM horario_academico where id_carga='$id_carga' ");
                                                $horario = mysqli_fetch_all($queryHorario, MYSQLI_ASSOC);
                                                $cantidadHorario = mysqli_num_rows($queryHorario);
                                            ?>
                                                <?php if ($cantidadHorario > 0) { ?>
                                                    <a href="reportes/lista_reporte?id_docente=<?php echo $id_docente; ?>&id_semestre=<?php echo    $semestreName; ?>" class="btn btn-primary">Ver horario</a>
                                                <?php } else {
                                                    echo " No tiene horario aún"; ?>
                                                    <a href="horario_academico/registrar_horario.php?id_docente=<?php echo $id_docente; ?>&id_semestre=<?php echo    $semestreName; ?>" class="btn btn-warning">Registrar Horario</a>
                                                <?php
                                                } ?>
                                            <?php
                                            } ?>



                                        </td>

                                    </tr>
                                </div>
                            </tbody>
                    <?php }
                    } ?>
                </table>
            </div>
        </center>
    <?php
    } else {
        // Display an error message or perform any other action
        echo '<p>Seleccione un semestre para ver los docentes.</p>';
    }
    ?>
</div>