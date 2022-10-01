<?php
require_once '../config/conexion.php';
require_once '../models/Categorias.php';
$categoria=new Categoria();
switch($_POST['opcion']){
case "combo":
  $datos=$categoria->getCategoria();
  if(is_array($datos)==true && count($datos)>0){
    foreach($datos as $filas){
      $tag_option.='<option value='.'"'.$filas['categoria_id'].'"'.'>'.$filas['nombre_categoria'].'</option>';
    }
    echo $tag_option;
  }
  exit();
  break;
}
?>