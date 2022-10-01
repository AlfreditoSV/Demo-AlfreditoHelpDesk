<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once '../MainHead/head.php';
?>
<title>Consultar Ticket</title>
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
            <h1>Consultar Ticket</h1>
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
                Consultar Ticket
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="ticket_table" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th scope="col" class=" col-1">No.Ticket</th>
                      <th scope="col" class=" col-1">Categoria</th>
                      <th scope="col" class=" col-2">Titulo</th>    
                      <th scope="col" class=" col-1">Estado</th>
                      <th scope="col" class=" col-2">Fecha</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              
          
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
<script src="consultarTicket.js"></script>
</body>
</html>
