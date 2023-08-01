<div class="container">

    <br>
    <?php


    $querySemestre = mysqli_query($mysqli, "SELECT *FROM semestres where id_semestre='$semestreName'");
    $semestres = mysqli_fetch_all($querySemestre, MYSQLI_ASSOC);
    $cantidadSemestre = mysqli_num_rows($querySemestre);
    foreach ($semestres as $rowSemestre) {
        $id_semestre = $rowSemestre['id_semestre'];
        $semestreNombre = $rowSemestre['nombre_semestre'];
    }
    ?>
    <h3 style="margin-left: 26px;">Semestre: <?php echo $semestreNombre; ?></h3>
    <p style="margin-left: 26px;">Haga click en el boton para ver su horario academico:</p>

    <center>
        <div class="container-fluid p-2">
            <table class="table border-primary" style="border:2px solid blue;">
                <thead>
                    <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">Docente</th>
                        <th scope="col">horario</th>
                    </tr>
                </thead>
                <?php

                if ($cantidadDocente2 > 0) {
                    foreach ($docentes2 as $rowDocente) {
                        $id_docentes = $rowDocente['id_docente'];
                        $nombre_docente = $rowDocente['Nombre_docente'];
                        $apellido_docente = $rowDocente['apellido_docente'];
                        $dni_docente = $rowDocente['dni_docente'];


                ?>
                        <tbody>
                            <div class="container_card">
                                <tr>
                                    <td style="vertical-align: middle;"><?php echo $dni_docente; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $nombre_docente . " " . $apellido_docente; ?></td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                        //carga academica
                                        $queryCarga = mysqli_query($mysqli, "SELECT *FROM carga_academica where id_docente='$id_docentes' and id_semestre='$id_semestre'");
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
                                            <a href="registro_carga.php?id_docente=<?php echo $id_docentes; ?>&id_semestre=<?php echo $semestreName ?>" class="btn btn-warning">Asignar carga</a>
                                        <?php
                                        } else if ($id_semestre != $id_semestrecarga) {

                                            echo "No hay carga academica para este docente en este semestre";
                                        ?>
                                            <a href="registro_carga.php?id_docente=<?php echo $id_docente; ?>&id_semestre=<?php echo $semestreName ?>" class="btn btn-warning">Asignar carga</a>
                                        <?php
                                        } else {
                                            //Unir con la tabla horario academico por medio del id
                                            $queryHorario = mysqli_query($mysqli, "SELECT *FROM horario_academico where id_carga='$id_carga' ");
                                            $horario = mysqli_fetch_all($queryHorario, MYSQLI_ASSOC);
                                            $cantidadHorario = mysqli_num_rows($queryHorario);
                                        ?>
                                            <?php if ($cantidadHorario > 0) { ?>
                                                <a href="reportes/lista_reporte?id_docente=<?php echo $id_docentes; ?>&id_semestre=<?php echo    $semestreName; ?>" class="btn btn-primary">Ver horario</a>
                                            <?php } else {
                                                echo " No tiene horario aún"; ?>

                                            <?php
                                            } ?>
                                        <?php
                                        } ?>



                                    </td>
                                </tr>
                            </div>
                        </tbody>
                <?php
                    }
                } ?>
            </table>
        </div>
    </center>
</div>