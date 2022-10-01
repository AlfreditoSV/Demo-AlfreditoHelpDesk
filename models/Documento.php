<?php
class Documento extends Conectar{
  public function insertarDocumento($ticket_id,$nom_documento){
    $conexion=parent::Conexion();
    parent::set_name();
    $sql="INSERT INTO td_documentos VALUE(NULL,?,?,NOW(),1)";
    $stm=$conexion->prepare($sql);
    $stm->bindValue(1,$ticket_id);
    $stm->bindValue(2,$nom_documento);
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $result=$stm->fetchAll();
    return $result;
  }
  public function obtenrDocumento($ticket_id){
    $conexion=parent::Conexion();
    parent::set_name();
    $sql="SELECT * FROM td_documentos WHERE ticket_id=? ";
    $stm=$conexion->prepare($sql);
    $stm->bindValue(1,$ticket_id);
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $result=$stm->fetchAll();
    return $result;
  }
}
?>