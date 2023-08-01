<?php
session_start(); //inciar session
require("controlador/conexion.php"); //requerir la conexion a la base de datos
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" href='img/reserv.png' sizes="32x32" type="img/jpg">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
    <nav style="width: 100%; height: 50px;" class="fixed-top bg-primary">
        <div class="">
            <a class="" style="font-size: 22px; margin-top: 12px; color:white; margin-left: 16px;">
                <img src="img/reserv.png" style="width: 35px; height: 34px;" alt="logo horario">
                <strong>Sistema horario</strong>
            </a>
        </div>
    </nav>
    <?php
    ?>
    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <center>
                        <div class="panel-title" style="color:blue;">Iniciar Sesi&oacute;n</div>
                    </center>
                </div>
                <div style="padding-top:20px" class="panel-body">
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="form-login" class="formulario column" action="" method="post">
                        <!-- id="form-login"-->
                        <label style="font-size: 14pt; color:#000;"><b>Usaername:</b></label>
                        <!--Etiqueta correo con estilo de tamaño de fuente:14pt de color blanco-->
                        <input type="text" name="username" class="form-control" placeholder="Ingrese su nombre de usuario" required><br>
                        <!--Entrada clase "inp" de tipo "texto" con un nombre "mail" de valor "nulo" con marcador de posicion "email"-->
                        <label style="font-size: 14pt; color:#000;"><b>Contraseña:</b></label>
                        <div style="width: 100%;">
                            <input type="password" name="pass" ID="txtPassword" class="form-control" style="float: left; width: 85%;" placeholder="Ingrese su contraseña" required>
                            <button id="show_password" class="btn btn-primary" style="float:left;height: 34px; margin-left: 3px;" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                        </div>
                        <div>
                            <center>
                                <input class="btn btn-primary" type="submit" name="inicio" style="margin-top: 10px;" value="Iniciar Sesión">
                            </center><br>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['inicio'])) {
                        $nombreusuario = $_POST['username']; //mail es el nombre del cuadro de texto del input
                        $contrase = $_POST['pass']; //recoge el password que ingresamos
                        //para el administrador
                        $sql = mysqli_query($mysqli, "SELECT * FROM usuario WHERE username='$nombreusuario' and contrasena='$contrase'"); //guardar la toda consulta seleccionada de la tabla login donde la columna email sera asignado por el mail del formulario
                        $cantusu = mysqli_num_rows($sql);
                        if ($use = mysqli_fetch_assoc($sql)) {
                            $tipo_usuario = $use['tipo_usuario'];
                            if ($contrase == $use['contrasena']) {
                                if ($tipo_usuario == "Administrador") {
                                    $_SESSION['idusu'] = $use['id_usuario'];
                                    echo "<script>location.href='dashboard-admin/index.php'</script>";
                                } else {
                                    echo "<div class='alert alert-danger' role='alert'>$nombreusuario no eres administrador.</div>";
                                }
                            } else {
                                echo "<div class='alert alert-danger' role='alert'>$nombreusuario su contraseña es incorrecta.</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>$nombreusuario no existe.</div>";
                        }
                    }
                    ?>
                    <script>
                        function mostrarPassword() {
                            var cambio = document.getElementById("txtPassword");

                            if (cambio.type == "password") {
                                cambio.type = "text";
                                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                            } else {
                                cambio.type = "password";
                                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                            }
                        }
                        $(document).ready(function() {
                            $('#usernam').on('input change', function() { //El boton se habilita cuando se escribe el formulario nombre
                                if ($(this).val() != '') {
                                    $('#entrar').prop('disabled', false);
                                } else {
                                    $('#entrar').prop('disabled', true);
                                }
                            });
                            //CheckBox mostrar contraseña
                            $('#ShowPassword').click(function() {
                                $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>

</html>