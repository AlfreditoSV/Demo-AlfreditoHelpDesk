<?php
include_once '../../config/conexion.php';
session_destroy();
header("Location:".Conectar::ruta()."index.php");
?>