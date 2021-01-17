<?php
require_once("../../config/query/Roles.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objRol = new Roles();




if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $data = json_decode(file_get_contents("php://input"), true);
  $rol =  trim($data['rol']);

  if($insert  = $objRol->insert_rol($rol)){
    // redireccionar
    echo true;
  }else{
    // error al direccionar
    echo false;
  }


}else{
  return  "no es por metodo post";
}
