<?php
require_once '../config/conexion.php';
require_once '../models/Usuario.php';
$usuario=new Usuario();
switch ($_POST['opcion']) {
  case "altayactualizar":
    if(empty($_POST['usu_id'])){
    $usuario->alta_Usuario($_POST['user_name'],$_POST['user_surname'],$_POST['user_email'],$_POST['user_pass'],$_POST['user_rol']);
exit();
    }else{
  $usuario->actualizar_Usuario($_POST['usu_id'],$_POST['user_name'],$_POST['user_surname'],$_POST['user_email'],$_POST['user_pass'],$_POST['user_rol']);
  exit();
  
}
break;
case "eliminar":
  $usuario->eliminar_Usuario($_POST['user_id']);
  exit();
  break;
  
  case "listaUsuarios":
    $datos = $usuario->lista_Usuarios();
    $data = array();
    foreach ($datos as $fila) {
      $sub_array = array();
      $sub_array[] = $fila['user_id'];
      $sub_array[] = $fila['user_name'];
      $sub_array[] = $fila['user_surname'];
      $sub_array[] = $fila['user_email'];
      if ($fila['rol_id'] == 1) {
        $sub_array[] = '<span class="badge badge-primary">Soporte</span>';
      } else {
        $sub_array[] = '<span class="badge badge-info">Usuario</span>';
      }

      $sub_array[] = date("d/m/Y H:i:s", strtotime($fila['fecha_create']));
      if ($fila['user_status'] == 1) {
        $sub_array[] = '<span class="badge badge-success">Activo</span>';
      } else {
        $sub_array[] = '<span class="badge badge-secondary">Desactivado</span>';
      }
      $sub_array[] = '<button type="button" onClick="get_Registro(' . $fila["user_id"] . ')" id="' . $fila["user_id"] . '" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#moda-NuevoRegistro"> <i class="fas fa-edit"></i></button>
      <button type="button" onClick="eliminar(' . $fila["user_id"] . ')" id="' . $fila["user_id"] . '" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i></button>';
      
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
  
  case "mostrarUsuario":
    $datos = $usuario->lista_UsuariosId($_POST['user_id']);
    $data = array();
    foreach ($datos as $fila) {
      $sub_array = array();
      $sub_array[] = $fila['user_name'];
      $sub_array[] = $fila['user_surname'];
      $sub_array[] = $fila['user_email'];
      $sub_array[] = $fila['user_pass'];
      $sub_array[] = $fila['rol_id'];
      $sub_array[] = $fila['user_id'];      
      $data[] = $sub_array;
    }
    echo json_encode($data);
    exit();
    break;



  }
?>