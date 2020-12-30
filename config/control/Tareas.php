<?php
require_once("../../config/query/Tarea.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objTasks = new Tarea();

if($select = $objTasks->listar_tareas()){
  // redireccionar

  echo json_encode($select);


}else{
  // error al direccionar

  redireccionar('/404');

}

?>
