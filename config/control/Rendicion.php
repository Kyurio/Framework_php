<?php
require_once("../../config/query/Rendicion.php");
require_once("../../config/core/Autoload.php");
require_once("../../extends/redirect.php");

$objBoleta = new Rendicion();




if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $data = json_decode(file_get_contents("php://input"), true);

  $area =  trim($data['area']);
  $fecha_boleta = trim($data['fecha_boleta']);
  $monto = trim($data['monto']);
  $pago_proveedor = trim($data['pago_proveedor']);
  $monto = trim($data['monto']);
  $clasificacion = trim($data['clasificacion']);
  $n_boleta = trim($data['n_boleta']);
  $url ="";


  $insert  = $objBoleta->insert_boleta($fecha_boleta, $area, $monto, $pago_proveedor, $n_boleta,	$clasificacion, $url);

  if($insert){
    // redireccionar
    echo true;
  }else{
    // error al direccionar
    echo false;
  }


}else{
  return  "no es por metodo post";
}
