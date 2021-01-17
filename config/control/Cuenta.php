<?php
require_once("../../config/query/Cuenta.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objCuenta = new Cuenta();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $data = json_decode(file_get_contents("php://input"), true);
  $cuenta =  trim($data['cuenta']);
  if(!empty($cuenta)){

    if($insert  = $objCuenta->insert_cuenta($cuenta)){
      // redireccionar
      echo true;
    }else{
      // error al direccionar
      echo false;
    }


  }else {

    echo false;

  }


}else{
  return  "no es por metodo post";
}
