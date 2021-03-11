<?php

require_once("../../config/query/Usuario.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

// echo $_SERVER['PHP_SELF'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $objAreas = new Area();
  $key = base64_encode("123");

  if($select  = $objAreas->listar_area()){
    // redireccionar
    echo json_encode($select);

  }else{
    // error al direccionar
    echo false;
  }

}else{

  Err(500);

}
