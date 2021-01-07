<?php
require_once("../../config/query/Area.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objBoleta = new Rendicion();

if($select  = $objBoleta->listar_boletas()){
  // redireccionar
  echo json_encode($select);
}else{
  // error al direccionar
  echo false;
}
