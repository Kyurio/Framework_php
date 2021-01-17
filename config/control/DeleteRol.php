<?php
require_once("../../config/query/Roles.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objRoles = new Roles();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $data = json_decode(file_get_contents("php://input"), true);
  $id =  trim($data['id_rol']);

  if($delete  = $objRoles->delete_rol($id)){
    // redireccionar
    echo json_encode(true);
  }else{
    // error al direccionar
    echo json_encode(false);
  }


}else{
  return  "no es por metodo post";
}
