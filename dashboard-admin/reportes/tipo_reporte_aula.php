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
                        <th scope="col">Local</th>
                        <th scope="col">horario</th>
                    </tr>
                </thead>
                <?php

                if ($cantidadLocales > 0) {
                    foreach ($locales as $rowLocal) {
                        $id_Local = $rowLocal['id_local'];
                        $nombre_Local = $rowLocal['nombre_local'];


                        $queryHorario = mysqli_query($mysqli, "SELECT *FROM horario_academico where id_local='$id_Local' and id_semestre='$id_semestre'");
                        $horario = mysqli_fetch_all($queryHorario, MYSQLI_ASSOC);
                        $cantidadHorario = mysqli_num_rows($queryHorario);
                ?>
                        <tbody>
                            <div class="container_card">
                                <tr>
                                    <td style="vertical-align: middle;"><?php echo $nombre_Local; ?></td>
                                    <td style="vertical-align: middle;">
                                        <?php if ($cantidadHorario > 0) { ?>
                                            <a href="reportes/lista_reporte?id_local=<?php echo $id_Local; ?>&id_semestre=<?php echo $id_semestre; ?>" class="btn btn-primary">Ver horario</a>
                                        <?php } else { ?>
                                            No tiene horario aún
                                        <?php } ?>
                                    </td>
                                </tr>
                            </div>
                        </tbody>
                <?php }
                } ?>
            </table>
        </div>
    </center>
</div>