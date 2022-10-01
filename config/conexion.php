<?php
session_start();

class Conectar{
  protected $dbh;
  protected function Conexion(){
    try{
      $conexion=$this->dbh=new PDO("mysql:local=localhost;dbname=alfredito-hepdesk","root","mysql");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conexion;
    }catch(Exception $e){
      print_r("Error".$e->getMessage()."<br>") ;
      die();
    }
  }
  public function set_name(){
    return $this->dbh->query("SET NAMES 'utf8'");
  }
  public function ruta(){
    return "http://localhost/Personales/HELPDESK/help-desk-alfredito/";
  }

}

?>