<?php
require_once("../../config/query/Banco.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objBanco = new Banco();




if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $data = json_decode(file_get_contents("php://input"), true);
  $banco =  trim($data['banco']);
  if(!empty($banco)){

    if($insert  = $objBanco->insert_banco($banco)){
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
