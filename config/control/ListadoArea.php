<?php
require_once("../../config/query/Area.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objAreas = new Area();

if($select  = $objAreas->listar_area()){
  // redireccionar
  echo json_encode($select);
}else{
  // error al direccionar
  echo false;
}
