<?php
require_once '../config/conexion.php';
require_once '../models/Ticket.php';
$ticket = new Ticket();

switch ($_POST['opcion']) {
  case "alta":
    $datos=$ticket->altaTicket($_POST['user_id'], $_POST['categoria'], $_POST['titulo'], $_POST['descripcion'], $_POST['estatus_ticket']);
    echo json_encode($datos);
    exit();
    break;
  case "listaTicketUsuario":
    $datos = $ticket->listaTicketUsuario($_POST['user_id']);
    $data = array();
    foreach ($datos as $fila) {
      $sub_array = array();
      $sub_array[] = $fila['ticket_id'];
      $sub_array[] = $fila['nombre_categoria'];
      $sub_array[] = $fila['titulo_ticket'];
      if ($fila['estado_ticket'] == "abierto") {
        $sub_array[] = '<span class="badge badge-success">Abierto</span>';
      } else {
        $sub_array[] = '<span class="badge badge-danger">Cerrado</span>';
      }
      $sub_array[] = date("d/m/Y H:i:s", strtotime($fila['fecha_creacion']));
      $sub_array[] = '<button type="button" onClick="ver(' . $fila["ticket_id"] . ')" id="' . $fila["ticket_id"] . '" class="btn btn-primary btn-sm"> <i class="fas fa-eye"></i></button>';
      $data[] = $sub_array;
    }
    $results = array(
      "sEcho" => 1,
      "iTotalRecords" => count($data),
      "iTotalDisplayRecords" => count($data),
      "aaData" => $data
    );
    echo json_encode($results);
    exit();
    break;

  case "listadoTicket":
    $datos = $ticket->listaTicket();
    $data = array();
    foreach ($datos as $fila) {
      $sub_array = array();
      $sub_array[] = $fila['ticket_id'];
      $sub_array[] = $fila['nombre_categoria'];
      $sub_array[] = $fila['titulo_ticket'];
      if ($fila['estado_ticket'] == "abierto") {
        $sub_array[] = '<span class="badge badge-success">Abierto</span>';
      } else {
        $sub_array[] = '<span class="badge badge-danger">Cerrado</span>';
      }
      $sub_array[] = date("d/m/Y H:i:s", strtotime($fila['fecha_creacion']));
      $sub_array[] = '<button type="button" onClick="ver(' . $fila["ticket_id"] . ')" id="' . $fila["ticket_id"] . '" class="btn btn-primary btn-sm"> <i class="fas fa-eye"></i></button>';
      $data[] = $sub_array;
    }
    $results = array(
      "sEcho" => 1,
      "iTotalRecords" => count($data),
      "iTotalDisplayRecords" => count($data),
      "aaData" => $data
    );
    echo json_encode($results);
    exit();
    break;

  case "listaDetalle":
    $datos = $ticket->listaTicketDetalle_Ticket($_POST['ticket_id']);
    foreach ($datos as $fila) {
      $hora = date("H:i:s", strtotime($fila['fecha_creacion']));
      $dia = date("d/m/Y", strtotime($fila['fecha_creacion']));
      echo <<<_END
          <!-- timeline time label -->
          <div class="time-label">
            <span class="bg-red">$dia</span>
          </div>
          <!-- /.timeline-label -->
          <!-- timeline item -->
          <div>
            <i class="fas fa-comments bg-blue"></i>
            <div class="timeline-item">
              <span class="time"><i class="fas fa-clock"></i> $hora</span>
              <h3 class="timeline-header">
_END;
      if ($fila['rol_id'] == 1) {
        echo '<a href="#">Soporte</a>';
      } else {
        echo '<a href="#">Usuario</a>';
      }
      echo <<<_END
              {$fila['user_name']} {$fila['user_surname']}</h3>

              <div class="timeline-body">
              {$fila['tkdetalle_descripcion']}
              </div>
            
            </div>
          </div>
          <!-- END timeline item -->

_END;
    }
    exit();
    break;

  case "mostrarInfoTicket":
    $datos = $ticket->infoTicket($_POST['ticket_id']);
    echo json_encode($datos);
    exit();
    break;

  case "chatTicket":
    $ticket->chatTicket($_POST['ticket_id'], $_POST['user_id'], $_POST['tkdetalle_descripcion']);
    exit();
    break;

  case "cerrarTicket":
    $description = "Ticket cerrado";
    $ticket->cerrarTicket($_POST['ticket_id']);
    $ticket->chatTicket($_POST['ticket_id'], $_POST['user_id'], $description);
    exit();
    break;
  case "mostrarTotalTicket":
    if ($_POST['rol_id'] == 1) {
      $datos = $ticket->total_Ticket();
      echo json_encode($datos);
      exit();
    } else {
      $datos = $ticket->total_TicketUsuario($_POST['user_id']);
      echo json_encode($datos);
      exit();
    }
    break;
  case "mostrarTotalTicket_Abierto":
    if ($_POST['rol_id'] == 1) {
      $datos = $ticket->total_Ticket_Abierto();
      echo json_encode($datos);
      exit();
    } else {
      $datos = $ticket->total_TicketUsuario_Abierto($_POST['user_id']);
      echo json_encode($datos);
      exit();
    }
    break;
  case "mostrarTotalTicket_Cerrado":
    if ($_POST['rol_id'] == 1) {
      $datos = $ticket->total_Ticket_Cerrado();
      echo json_encode($datos);
      exit();
    } else {
      $datos = $ticket->total_TicketUsuario_Cerrado($_POST['user_id']);
      echo json_encode($datos);
      exit();
    }
    break;
    case "graficoTicket":
      $datos=$ticket->grafico_Ticket();
      echo json_encode($datos);
      exit();
  }
