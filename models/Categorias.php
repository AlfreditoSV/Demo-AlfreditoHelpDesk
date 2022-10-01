<?php

class Categoria extends Conectar{
  public function getCategoria(){
    $conexion=parent::Conexion();
    parent::set_name();
    $sql="SELECT * FROM tm_categoria WHERE estado=1"; 
    $stm=$conexion->prepare($sql);
    $stm->execute();
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $result=$stm->fetchAll();
    return $result;
  }
}
?>