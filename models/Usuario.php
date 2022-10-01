<?php
class Usuario extends Conectar{
  public function login(){
    $conexion=parent::Conexion();
    if (isset ($_POST['enviar'])){
      $correo=$_POST['correo'];
      $pass=$_POST['pass'];
      if(empty($correo) && empty($pass)){
        header("Location:".Conectar::ruta()."index.php?m=1");
        exit();
      }else{
        $sql="SELECT * FROM tm_usuario WHERE user_email= ? AND user_status=1";
        $stm=$conexion->prepare($sql);
        $stm->bindValue(1,$correo);
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $result=$stm->fetch();
        if(password_verify($pass,$result['user_pass']) && is_array($result) && count($result)>0){
          $_SESSION["user_id"]=$result['user_id'];
          $_SESSION["user_name"]=$result['user_name'];
          $_SESSION["user_surname"]=$result['user_surname'];
          $_SESSION["rol_id"]=$result['rol_id'];
          header("Location:".Conectar::ruta()."view/HOME/");
          exit();

        }else{
          header("Location:".Conectar::ruta()."index.php?m=2");
          exit();
        }
      }
    }
  }
  public function alta_Usuario($user_name,$user_surname,$user_email,$user_pass,$user_rol){
    $conexion=parent::Conexion();
    parent::set_name();

    $sql="INSERT INTO tm_usuario VALUES(NULL,?,?,?,?,?,NOW(),NULL,NULL,1)"; 
    $stm=$conexion->prepare($sql);
    $stm->bindValue(1,$user_name);
    $stm->bindValue(2,$user_surname);
    $stm->bindValue(3,$user_email);
    $stm->bindValue(4,password_hash($user_pass,PASSWORD_DEFAULT));
    $stm->bindValue(5,$user_rol);
    $stm->execute();
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $result=$stm->fetchAll();
    return $result;
  }
   
  
  public function actualizar_Usuario($user_id,$user_name,$user_surname,$user_email,$user_pass,$user_rol){
    $conexion=parent::Conexion();
    parent::set_name();
    $sql="UPDATE tm_usuario 
    SET 
    user_name=?,
    user_surname=?,
    user_email=?,
    user_pass=?,
    rol_id=?,
    fecha_mod=NOW()
    WHERE user_id=?"; 
    $stm=$conexion->prepare($sql);
    $stm->bindValue(1,$user_name);
    $stm->bindValue(2,$user_surname);
    $stm->bindValue(3,$user_email);
    $stm->bindValue(4,password_hash($user_pass,PASSWORD_DEFAULT));
    $stm->bindValue(5,$user_rol);
    $stm->bindValue(6,$user_id);
    $stm->execute();
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $result=$stm->fetchAll();
    return $result;
   
  }
  public function eliminar_Usuario($user_id){
    $conexion=parent::Conexion();
    parent::set_name(); 
    $sql='UPDATE tm_usuario SET fecha_delete=NOW(), user_status=0 WHERE user_id=?'; 
    $stm=$conexion->prepare($sql);
    $stm->bindValue(1,$user_id);
    $stm->execute();
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $result=$stm->fetchAll();
    return $result;
   
  }
  public function lista_Usuarios(){
    $conexion=parent::Conexion();
    parent::set_name();
    $sql="SELECT * FROM tm_usuario WHERE user_status=1"; 
    $stm=$conexion->prepare($sql);
    $stm->execute();
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $result=$stm->fetchAll();
    return $result;
   
  }
  public function lista_UsuariosId($user_id){
    $conexion=parent::Conexion();
    parent::set_name();
    $sql="SELECT * FROM tm_usuario WHERE user_id=?"; 
    $stm=$conexion->prepare($sql);
    $stm->bindValue(1,$user_id);
    $stm->execute();
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $result=$stm->fetchAll();
    return $result;
  }


}
?>