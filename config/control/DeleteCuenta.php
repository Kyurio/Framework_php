<?php
require_once("../../config/query/Cuenta.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objCuenta= new Cuenta();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $data = json_decode(file_get_contents("php://input"), true);
  $id =  trim($data['id_cuenta']);

  if(!empty($id)){

    if($delete  = $objCuenta->delete_cuenta($id)){
      // redireccionar
      echo json_encode(true);
    }else{
      // error al direccionar
      echo json_encode(false);
    }


  }else{

    echo false;

  }



}else{
  return  "no es por metodo post";
}
