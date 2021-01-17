<?php
require_once("../../config/query/Cuenta.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objCuenta = new Cuenta();

if($select  = $objCuenta->listar_cuenta()){
  // redireccionar
  echo json_encode($select);
}else{
  // error al direccionar
  echo false;
}
