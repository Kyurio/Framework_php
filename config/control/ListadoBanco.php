<?php
require_once("../../config/query/Banco.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objBancos = new Banco();

if($select  = $objBancos->listar_Banco()){
  // redireccionar
  echo json_encode($select);
}else{
  // error al direccionar
  echo false;
}
