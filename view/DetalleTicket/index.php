<?php
require_once '../../config/conexion.php';
if(isset($_SESSION["user_id"])){
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once '../MainHead/head.php';
?>
<title>Detalle del Ticket</title>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include_once '../MainHeader/header.php'; ?>
    <?php include_once '../MainAside/mainAside.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 id="h1_IdTicket">Detalles de Ticket #</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Timeline</li>
              </ol>
            </div>
            <div class="col-12">
            <span class="badge badge-success" id="lb_EstatusTicket">Estatus</span>
            <span class="badge badge-info"    id="lb_NombUsuario">Nombre Usuario</span>
            <span class="badge badge-dark"    id="lb_FechaCreate">00/00/0000</span>
            </div>

              <div class="col-6">
              <div class="mb-3">
                <label for="" class="form-label">Título</label>
                <input type="text" class="form-control" name="" id="dticket_titulo" aria-describedby="titulo_ticket" readonly>
                <small id="helpId" class="form-text text-muted">Título del ticket</small>
              </div>
              </div>
              <div class="col-6">
              <div class="mb-3">
                <label for="" class="form-label">Categoria</label>
                <input type="text" class="form-control" name="" id="dticket_categoria" aria-describedby="titulo_ticket" readonly>
                <small id="helpId" class="form-text text-muted">Categoria del ticket</small>
              </div>
              </div>
              <div class="col-12">
              <div class="mb-3">
                <label for="" class="form-label">Descripción</label>
                <textarea class="form-control" name="" id="dticket_descripcion" rows="3" readonly></textarea>
              </div>
              </div>
          
          </div>
        </div><!-- /.container-fluid -->
      </section>

     <!-- Main content -->
     <section class="content">
            <div class="container-fluid">
    
              <!-- Timelime example  -->
              <div class="row">
                <div class="col-md-12">
                  <!-- The time line -->
                  <div class="timeline" id="cont_timeline">
                
                
                  </div>
               
                </div>
                <div class="timeline">

                <div>
                      <i class="fas fa-clock bg-gray"></i>
                      </div>
                    </div>
                <!-- /.col -->
              </div>
            </div>
            <!-- /.timeline -->
    
          </section>
          <!-- /.content -->
          <!-- chat-ticket -->
          <div class="card-body" id="cont_ChatTicket">
          <h4>Chat de Ticket</h4>
         <form action="" id="form_ChatTicket">
           <input type="hidden" name="estatus_ticket" value="abierto">
            <div class="mb-3">
              <label for="tkdetalle_descripcion" class="form-label"></label>
              <textarea class="form-control" name="tkdetalle_descripcion" id="tkdetalle_descripcion" rows="3" require></textarea>
            </div>
    <div class="mb-3">
    <button type="button" class="btn btn-primary" id="btn_EnviarTicket">Enviar</button>
    <button type="button" class="btn btn-danger" id="btn_CerrarTicket">Cerrar Ticket</button>
    </div>          
    </form>
            </div>
            <!-- .end chat-ticket -->
     
    </div>
    <!-- /.content-wrapper -->

    <?php include_once '../MainFooter/MainFooter.php'; ?>
  </div>
  <!-- ./wrapper -->
  <?php include_once '../MainJs/js.php'; ?>
  <script src="detallesTicket.js"></script>
</body>

</html>
<?php

}else{
  header("Location:".Conectar::ruta()."index.php");
}
?>