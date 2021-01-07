<?php
require_once("../../config/query/Area.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objArea = new Area();




if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $data = json_decode(file_get_contents("php://input"), true);
  $area =  trim($data['area']);

  if($insert  = $objArea->insert_area($area)){
    // redireccionar
    echo true;
  }else{
    // error al direccionar
    echo false;
  }


}else{
  return  "no es por metodo post";
}
