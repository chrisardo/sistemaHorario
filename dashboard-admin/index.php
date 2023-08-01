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
</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar" style="background-color: rgb(7, 66, 230);">
		<a href="#" class="brand">
			<img src="../img/semestre.png" style="width: 32px; height: 32px; margin-left: 10px;" alt="logo restaurantapp">
			<span class="text">Sistema de horario</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="carga_academica.php">
					<i class='bx '>
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
				<a href="../controlador/desconectar.php" class="logout">
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
							<a class="active" href="#">Inicio</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download'></i>
					<span class="text">Download PDF</span>
				</a>
			</div>
			<?php
			require("../controlador/conexion.php"); //requerir la conexion a la base de datos

			$querySemestre = mysqli_query($mysqli, "SELECT *FROM semestres");
			$semestres = mysqli_fetch_all($querySemestre, MYSQLI_ASSOC);
			$cantidadSemestres = mysqli_num_rows($querySemestre);
			$queryCursos2 = mysqli_query($mysqli, "SELECT *FROM cursos");
			$cursos2 = mysqli_fetch_all($queryCursos2, MYSQLI_ASSOC);
			$cantidadCursos2 = mysqli_num_rows($queryCursos2);
			$queryLocal2 = mysqli_query($mysqli, "SELECT *FROM locales");
			$local2 = mysqli_fetch_all($queryLocal2, MYSQLI_ASSOC);
			$cantidadLocal2 = mysqli_num_rows($queryLocal2);
			$queryDocentes = mysqli_query($mysqli, "SELECT *FROM docentes");
			$docentes2 = mysqli_fetch_all($queryDocentes, MYSQLI_ASSOC);
			$cantidadDocente2 = mysqli_num_rows($queryDocentes);
			$queryCiclo = mysqli_query($mysqli, "SELECT *FROM ciclo");
			$ciclo = mysqli_fetch_all($queryCiclo, MYSQLI_ASSOC);
			$cantidadCiclos = mysqli_num_rows($queryCiclo);
			$queryUsuarios = mysqli_query($mysqli, "SELECT *FROM usuario");
			$usuarios = mysqli_fetch_all($queryUsuarios, MYSQLI_ASSOC);
			$cantidadUsuarios = mysqli_num_rows($queryUsuarios);

			?>
			<ul class="box-info">
				<li style="border: 1px solid blue;">
					<i class='bx bxs-calendar-check'></i>
					<span class="text ">
						<h3><?php echo $cantidadSemestres ?></h3>
						<p>Semestres</p>
					</span>
				</li>
				<li style="border: 1px solid blue;">
					<i class='bx'>
						<img src="../img/cursos.png" style="width: 50px; height: 50px;">
					</i>
					<span class="text">
						<h3><?php echo $cantidadCursos2 ?></h3>
						<p>Asignaturas</p>
					</span>
				</li>
				<li style="border: 1px solid blue;">
					<i class='bx'>
						<img src="../img/local.png" style="width: 50px; height: 50px;">

					</i>
					<span class="text">
						<h3><?php echo $cantidadLocal2 ?></h3>
						<p>Aula</p>
					</span>
				</li>
			</ul>
			<ul class="box-info">
				<li style="border: 1px solid blue;">
					<i class='bx'>
						<img src="../img/docente.png" style="width: 50px; height: 50px;">
					</i>
					<span class="text ">
						<h3><?php echo $cantidadDocente2; ?></h3>
						<p>Docentes</p>
					</span>
				</li>
				<li style="border: 1px solid blue;">
					<i class='bx bxs-group'></i>
					<span class="text">
						<h3><?php echo $cantidadCiclos; ?></h3>
						<p>Ciclo</p>
					</span>
				</li>
				<li style="border: 1px solid blue;">
					<i class='bx '>
						<img src="../img/useregis.png" style="width: 50px; height: 50px;">
					</i>
					<span class="text">
						<h3><?php echo $cantidadUsuarios; ?></h3>
						<p>Usuarios</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order" style="border: 1px solid blue;">
					<div class="head">
						<h3>Usuarios</h3>
						<i class='bx bx-search'></i>
						<i class='bx bx-filter'></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Tipo</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($usuarios as $usuario) {
							?>
								<tr>
									<td>
										<!--<img src="../img/people.png">-->
										<p><?php echo $usuario['nombre_usuario'] . " " . $usuario['apellido_usuario'] ?></p>
									</td>
									<td><?php echo $usuario['tipo_usuario']; ?></td>
									<td><span class="status <?php echo $usuario['estado'] ?>"><?php echo $usuario['estado'] ?></span></td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
				<div class="todo" style="border: 1px solid blue;">
					<div class="head">
						<h3></h3>
						<i class='bx bx-plus'></i>
						<i class='bx bx-filter'></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<i class='bx'>
								<img src="../img/carga.png" style="width: 30px; height: 30px;">
							</i>
							<p>Carga academica</p>
							<i class="completed">
								<a href="carga_academica.php" style="border: 1px solid blue; border-radius: 8px;">
									<strong style="color: blue;">ver-></strong>
								</a>
							</i>
						</li>
						<li class="completed">
							<i class='bx'>
								<img src="../img/horario.png" style="width: 30px; height: 30px;">
							</i>
							<p>Horario</p>
							<i class="completed">
								<a href="horario_academico.php" style="border: 1px solid blue; border-radius: 8px;">
									<strong style="color: blue;">ver-></strong>
								</a>
							</i>
						</li>
						<li class="not-completed">
							<i class='bx'>
								<img src="../img/reporte.png" style="width: 30px; height: 30px;">
							</i>
							<p>Reportes</p>
							<i class="completed">
								<a href="reportes.php" style="border: 1px solid blue; border-radius: 8px;">
									<strong style="color: blue;">ver-></strong>
								</a>
							</i>
						</li>
						<li class="completed">
							<i class='bx bxs-cog'>
							</i>
							<p>Configuraciones</p>
							<!--agregar botton-->
							<i class="completed">
								<a href="configuraciones.php" style="border: 1px solid blue; border-radius: 8px;">
									<strong style="color: blue;">ver-></strong>
								</a>
							</i>
						</li>
					</ul>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script.js"></script>
</body>

</html>