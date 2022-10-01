
<?php
 
require_once '../../config/conexion.php';
if(isset($_SESSION["user_id"])){
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once '../MainHead/head.php';
?>
<title>Inicio</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include_once '../MainHeader/header.php';?>
<?php include_once '../MainAside/mainAside.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inicio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                Inicio
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row justify-content-between">
              <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 class="total-ticket"></h3>
                <p>Total Ticket's</p>
              </div>
              <div class="icon">
              <i class="fas fa-ticket-alt"></i>
              </div>
              <a href="../ConsultarTicket/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 class="total-ticket"></h3>
                <p>Ticket's Abiertos</p>
              </div>
              <div class="icon">
              <i class="far fa-flag"></i>
              </div>
              <a href="../ConsultarTicket/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 class="total-ticket"></h3>
                <p>Ticket's Cerrados</p>
              </div>
              <div class="icon">
              <i class="fas fa-thumbs-up"></i>
              </div>
              <a href="../ConsultarTicket/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
              </div>
                  <!-- DONUT CHART -->
                  <div class="col-lg-6 col-12">
             <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Grafico Ticket</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
                  </div>
            <!-- /.card -->
            </div>
            
          
          </div>
        </div>
        <!-- /.col-->
      </div>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  <?php include_once '../MainFooter/MainFooter.php';?>
</div>
<!-- ./wrapper -->
<?php include_once '../MainJs/js.php';?>
<script src="home.js"></script>
</body>
</html>
<?php

}else{
  header("Location:".Conectar::ruta()."index.php");
}
?>