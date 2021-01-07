<?php
require_once("../../config/query/Area.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objAreas = new Area();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $data = json_decode(file_get_contents("php://input"), true);
  $id =  trim($data['id_area']);

  if($delete  = $objAreas->delete_area($id)){
    // redireccionar
    echo json_encode(true);
  }else{
    // error al direccionar
    echo json_encode(false);
  }


}else{
  return  "no es por metodo post";
}
