<?php
require_once 'config/conexion.php';
require_once 'models/Usuario.php';
$method = $_SERVER['REQUEST_METHOD'];

if($method=='POST'){  
  if(isset($_POST['enviar']) && $_POST['enviar']=='si'){
$usario=new Usuario();
$usario->login();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
  <title>HelpDesk</title>
</head>
<body class="hold-transition login-page">

  <div class="login-box">
  <div class="login-logo">
    <a href="index.html"><b>Inicio de sesión</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>
      <div class="text-center mb-3">
        <img src="public/dist/img/logo_1.png" alt="" style="border-radius:50%; width:250px;">
      </div>
      <div id="mensaje_alerta">
        <?php
        if(isset($_GET['m'])){
        switch ($_GET['m']){
          case 1:
            echo '<div class="alert alert-danger text-center">
            <p><i class="icon fas fa-ban">Ingresa tus datos para continuar</i></p></div>';
            break;
          case 2:
            echo ' <div class="alert alert-danger text-center">
            <p><i class="icon fas fa-ban"> Usuario y/o Contraseña invalido</i></p></div>';
            break;
        }
      }
        ?>

      </div>

      <form id="login_form" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="correo" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control"  name="pass" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordar sesión
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="hidden" name="enviar" value="si">
            <button type="submit" class="btn btn-primary btn-block" id="btn_ingresar">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        <a href="forgot-password.html">Olvide mi contraseña</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Registrar nuevo usuario</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.min.js"></script>
</body>
</html>