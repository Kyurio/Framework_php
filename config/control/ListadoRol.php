<?php
require_once("../../config/query/Roles.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objRoles = new Roles();

if($select  = $objRoles->listar_rol()){
  // redireccionar
  echo json_encode($select);
}else{
  // error al direccionar
  echo false;
}
