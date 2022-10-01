<?php
require_once '../../config/conexion.php';
if (isset($_SESSION["user_id"])) {
?>
  <!DOCTYPE html>
  <html lang="en">
  <?php
  include_once '../MainHead/head.php';
  ?>
  <title>Nuevo Ticket</title>
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
                <h1>Nuevo Ticket</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="../HOME/">Home</a></li>
                  <li class="breadcrumb-item active">Text Editors</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-outline card-info">
                <div class="card-header">
                  <h3 class="card-title">
                    Nuevo Ticket
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="" id="form_AltaTicket">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                    <input type="hidden" name="opcion" value="alta">
                    <input type="hidden" name="estatus_ticket" value="abierto">
                    <div class="mb-3">
                      <label for="categoria" class="form-label">Categoria</label>
                      <select class="form-control" name="categoria" id="categoria">
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="titulo" class="form-label">Ingresa el título</label>
                      <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Título" require>
                      <small id="helpId" class="form-text text-muted">Ingresa el título del ticket</small>
                    </div>                
                    <div class="mb-3">
                    <label for="document" class="form-label">Documentos</label>
                      <input type="file" name="document" class="" id="document" multiple>                     
                    </div>          
                    <div class="mb-3">
                      <label for="" class="form-label"></label>
                      <textarea class="form-control" name="descripcion" id="ticket_descripcion" rows="3" require></textarea>
                    </div>
                    <div class="mb-3">
                      <button type="button" class="btn btn-primary" id="btn_GuardarTicket">Guardar</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
            <!-- /.col-->
          </div>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <?php include_once '../MainFooter/MainFooter.php'; ?>
    </div>
    <!-- ./wrapper -->
    <?php include_once '../MainJs/js.php'; ?>
    <script src="nuevoTicket.js"></script>
  </body>

  </html>
<?php

} else {
  header("Location:" . Conectar::ruta() . "index.php");
}
?>