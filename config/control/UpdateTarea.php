<?php
require_once("../../config/query/Tarea.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objTasks = new Tarea();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $data = json_decode(file_get_contents("php://input"), true);
  $id =  trim($data['Id_tarea']);

  if($insert  = $objTasks->update_tarea($id)){
    // redireccionar
    echo json_encode(true);
  }else{
    // error al direccionar
    echo json_encode(false);
  }


}else{
  return  "no es por metodo post";
}
