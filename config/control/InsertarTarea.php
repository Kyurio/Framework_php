<?php
require_once("../../config/query/Tarea.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objTasks = new Tarea();




if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $data = json_decode(file_get_contents("php://input"), true);
  $titulo =  trim($data['title_task']);
  $plazo =  trim($data['date_task']);

  if($insert  = $objTasks->insert_tarea($titulo, $plazo)){
    // redireccionar
    echo true;
  }else{
    // error al direccionar
    echo false  ;
  }


}else{
  return  "no es por metodo post";
}
