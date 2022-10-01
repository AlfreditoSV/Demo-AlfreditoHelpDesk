<?php

class Ticket extends Conectar{
  public function altaTicket($user_id,$categoria_id,$titulo_ticket,$descripcion_ticket,$estado_ticket){
    $conexion=parent::Conexion();
    parent::set_name();
    $sql="INSERT INTO tm_ticket VALUES(NULL,?,?,?,?,?,now(),1)"; 
    $stm=$conexion->prepare($sql);
    $stm->bindValue(1,$user_id);
    $stm->bindValue(2,$categoria_id);
    $stm->bindValue(3,$titulo_ticket);
    $stm->bindValue(4,$descripcion_ticket);
    $stm->bindValue(5,$estado_ticket);
    $stm->execute();
    $lastId=$conexion->lastInsertId();
    return $lastId;
  }
  public function listaTicketUsuario($user_id){
    $conexion=parent::Conexion();
    parent::set_name();
    $sql="SELECT
    tm_ticket.ticket_id,
    tm_ticket.user_id,
    tm_ticket.categoria_id,
    tm_ticket.titulo_ticket,
    tm_ticket.descripcion_ticket,
    tm_ticket.estado_ticket,
    tm_ticket.fecha_creacion,
    tm_usuario.user_name,
    tm_usuario.user_surname,
    tm_categoria.nombre_categoria
    FROM
    tm_ticket
    INNER JOIN tm_categoria ON tm_ticket.categoria_id=tm_categoria.categoria_id
    INNER JOIN tm_usuario ON tm_ticket.user_id=tm_usuario.user_id WHERE tm_ticket.estatus= 1 AND tm_usuario.user_id=?
    "; 
    $stm=$conexion->prepare($sql);
    $stm->bindValue(1,$user_id);
    $stm->execute();
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $result=$stm->fetchAll();
    return $result;
  }

  public function listaTicket(){
    $conexion=parent::Conexion();
    parent::set_name();
    $sql="SELECT
    tm_ticket.ticket_id,
    tm_ticket.user_id,
    tm_ticket.categoria_id,
    tm_ticket.titulo_ticket,
    tm_ticket.descripcion_ticket,
    tm_ticket.estado_ticket,
    tm_ticket.fecha_creacion,
    tm_usuario.user_name,
    tm_usuario.user_surname,
    tm_categoria.nombre_categoria
    FROM
    tm_ticket
    INNER JOIN tm_categoria ON tm_ticket.categoria_id=tm_categoria.categoria_id
    INNER JOIN tm_usuario ON tm_ticket.user_id=tm_usuario.user_id WHERE tm_ticket.estatus= 1
    "; 
    $stm=$conexion->prepare($sql);
    $stm->execute();
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $result=$stm->fetchAll();
    return $result;
  }

  public function listaTicketDetalle_Ticket($ticket_id){
    $conexion=parent::Conexion();
    parent::set_name();
    $sql="SELECT 
    td_ticketdetalle.tkdetalle_id,
    td_ticketdetalle.tkdetalle_descripcion,
    td_ticketdetalle.fecha_creacion, 
    tm_usuario.user_name,
    tm_usuario.user_surname,
    tm_usuario.rol_id 
    FROM td_ticketdetalle 
    INNER JOIN tm_usuario ON td_ticketdetalle.user_id =tm_usuario.user_id 
    WHERE ticket_id=?
    "; 
    $stm=$conexion->prepare($sql);
    $stm->bindValue(1,$ticket_id);
    $stm->execute();
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $result=$stm->fetchAll();
    return $result;
  
}
public function infoTicket($ticket_id){
 $conexion=parent::Conexion();
 $sql="SELECT
 tm_ticket.ticket_id,
 tm_ticket.user_id,
 tm_ticket.categoria_id,
 tm_ticket.titulo_ticket,
 tm_ticket.descripcion_ticket,
 tm_ticket.estado_ticket,
 tm_ticket.fecha_creacion,
 tm_usuario.user_name,
 tm_usuario.user_surname,
 tm_categoria.nombre_categoria
 FROM
 tm_ticket
 INNER JOIN tm_categoria ON tm_ticket.categoria_id=tm_categoria.categoria_id
 INNER JOIN tm_usuario ON tm_ticket.user_id=tm_usuario.user_id WHERE tm_ticket.ticket_id= ?";
 $stm=$conexion->prepare($sql);
 $stm->bindValue(1,$ticket_id);
 $stm->execute();
 $stm->setFetchMode(PDO::FETCH_ASSOC);
 $result=$stm->fetch();
 return $result;
}

public function chatTicket($ticket_id,$user_id,$descripcion_ticket){
  $conexion=parent::Conexion();
  parent::set_name();
  $sql="INSERT INTO td_ticketdetalle VALUES(NULL,?,?,?,NOW(),1)"; 
  $stm=$conexion->prepare($sql);
  $stm->bindValue(1,$ticket_id);
  $stm->bindValue(2,$user_id);
  $stm->bindValue(3,$descripcion_ticket);
  $stm->execute();
  $stm->setFetchMode(PDO::FETCH_ASSOC);
  $result=$stm->fetch();
  return $result;
}

public function cerrarTicket($ticket_id){
  $conexion=parent::Conexion();
  parent::set_name();
  $sql="UPDATE tm_ticket SET estado_ticket= 'cerrado' WHERE ticket_id=? "; 
  $stm=$conexion->prepare($sql);
  $stm->bindValue(1,$ticket_id);
  $stm->execute();
  $stm->setFetchMode(PDO::FETCH_ASSOC);
  $result=$stm->fetch();
  return $result;
}

public function total_TicketUsuario($user_id){
  $conexion=parent::Conexion();
  parent::set_name();
  $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket WHERE user_id=?";
  $stm=$conexion->prepare($sql);
  $stm->bindValue(1,$user_id);
  $stm->execute();
  $stm->setFetchMode(PDO::FETCH_ASSOC);
  $result=$stm->fetchAll();
  return $result;
}
public function total_TicketUsuario_Abierto($user_id){
  $conexion=parent::Conexion();
  parent::set_name();
  $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket WHERE user_id=? AND estado_ticket='abierto'";
  $stm=$conexion->prepare($sql);
  $stm->bindValue(1,$user_id);
  $stm->execute();
  $stm->setFetchMode(PDO::FETCH_ASSOC);
  $result=$stm->fetchAll();
  return $result;
}
public function total_TicketUsuario_Cerrado($user_id){
  $conexion=parent::Conexion();
  parent::set_name();
  $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket WHERE user_id=? AND estado_ticket='cerrado'";
  $stm=$conexion->prepare($sql);
  $stm->bindValue(1,$user_id);
  $stm->execute();
  $stm->setFetchMode(PDO::FETCH_ASSOC);
  $result=$stm->fetchAll();
  return $result;
}
public function total_Ticket(){
  $conexion=parent::Conexion();
  parent::set_name();
  $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket";
  $stm=$conexion->prepare($sql);
  $stm->execute();
  $stm->setFetchMode(PDO::FETCH_ASSOC);
  $result=$stm->fetchAll();
  return $result;
}
public function total_Ticket_Abierto(){
  $conexion=parent::Conexion();
  parent::set_name();
  $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket WHERE estado_ticket='abierto'";
  $stm=$conexion->prepare($sql);
  $stm->execute();
  $stm->setFetchMode(PDO::FETCH_ASSOC);
  $result=$stm->fetchAll();
  return $result;
}
public function total_Ticket_Cerrado(){
  $conexion=parent::Conexion();
  parent::set_name();
  $sql="SELECT COUNT(*) as TOTAL FROM tm_ticket WHERE estado_ticket='cerrado'";
  $stm=$conexion->prepare($sql);
  $stm->execute();
  $stm->setFetchMode(PDO::FETCH_ASSOC);
  $result=$stm->fetchAll();
  return $result;
}
public function grafico_Ticket(){
  $conexion=parent::Conexion();
  parent::set_name();
  $sql="SELECT tm_categoria.nombre_categoria as Nombre,COUNT(*) as Total FROM tm_ticket JOIN tm_categoria ON tm_ticket.categoria_id= tm_categoria.categoria_id WHERE tm_ticket.estatus=1 GROUP BY tm_categoria.nombre_categoria ORDER BY Total DESC";
  $stm=$conexion->prepare($sql);
  $stm->execute();
  $stm->setFetchMode(PDO::FETCH_ASSOC);
  $result=$stm->fetchAll();
  return $result;
}

}
?>