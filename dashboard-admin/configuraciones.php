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
            <li>
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
            <li class="active">
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
                            <a class="active" href="configuraciones.php"><strong>Configuraciones</strong></a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
        <!-- MAIN -->
        <div class="container">
            <div class="card-body">
                <div class="row g-3 ">
                    <div class="col">
                        <div class="card border-primary">
                            <img src="../img/semestre.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Semestres</h5>

                            </div>
                            <div class="card-footer bg-transparent border-primary">
                                <a href="configuracion/semestre.php">
                                    <button type="button" class="btn btn-outline-primary">Ver -></button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-primary">
                            <img src="../img/cursos.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Asignaturas</h5>

                            </div>
                            <div class="card-footer bg-transparent border-primary">
                                <a href="configuracion/cursos.php">
                                    <button type="button" class="btn btn-outline-primary">Ver -></button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-primary">
                            <img src="../img/local.png" class="card-img-top img-thumbnail rounded" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Aula</h5>

                            </div>
                            <div class="card-footer bg-transparent border-primary">
                                <a href="configuracion/locales.php">
                                    <button type="button" class="btn btn-outline-primary">Ver -></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="row g-3">
                    <div class="col col-border-primary">
                        <div class="card border-primary">
                            <img src="../img/docente.png" class="card-img-top img-thumbnail rounded" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Docentes</h5>

                            </div>
                            <div class="card-footer bg-transparent border-primary">
                                <a href="configuracion/verdocentes.php">
                                    <button type="button" class="btn btn-outline-primary">Ver -></button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-border-primary">
                        <div class="card border-primary">
                            <img src="../img/useregis.png" class="card-img-top img-thumbnail rounded" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Usuarios</h5>

                            </div>
                            <div class="card-footer bg-transparent border-primary">
                                <a href="configuracion/usuarios.php">
                                    <button type="button" class="btn btn-outline-primary">Ver -></button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-border-primary">
                        <div class="card border-primary">
                            <img src="../img/ciclo.png" class="card-img-top img-thumbnail rounded" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Ciclo</h5>

                            </div>
                            <div class="card-footer bg-transparent border-primary">
                                <a href="configuracion/ciclo.php">
                                    <button type="button" class="btn btn-outline-primary">Ver -></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3">

                </div>
            </div>

        </div>

    </section>
    <!-- CONTENT -->


    <script src="script.js"></script>
</body>

</html>