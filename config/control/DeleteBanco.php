<?php
require_once("../../config/query/Banco.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objBancos = new Banco();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $data = json_decode(file_get_contents("php://input"), true);
  $id =  trim($data['id_banco']);

  if(!empty($id)){

    if($delete  = $objBancos->delete_banco($id)){
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
