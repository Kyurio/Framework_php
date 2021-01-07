<?php

require_once("../../config/core/Autoload.php");

class Rendicion extends Conexion{

  private $strFechaBoleta;
  private $intArea;
  private $floatMonto;
  private $floatPagoProveedores;
  private $intNumeroBoleta;
  private $intClasificacion;
  private $strUrl;

  function __construct(){
    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();
  }

  // insert
  public function insert_boleta(string $fecha_boleta, int $area, float $monto, float $pago_proveedor, int $n_boleta,	int $clasificacion, string $url){

    try {

      $this->strFechaBoleta = $fecha_boleta;
      $this->intArea = $area;
      $this->floatMonto = $monto;
      $this->floatPagoProveedores = $pago_proveedor;
      $this->intNumeroBoleta = $n_boleta;
      $this->intClasificacion = $clasificacion;
      $this->strUrl = $url;

      $sql = "INSERT INTO boleta(fecha_boleta, area, monto,	pago_proveedor, n_boleta,	clasificacion, url) VALUES (?,?,?,?,?,?,?)";
      $insert = $this->conexion->prepare($sql);
      $arrData = array($this->strFechaBoleta, $this->intArea, $this->floatMonto, $this->floatPagoProveedores, $this->intNumeroBoleta, $this->intClasificacion, $this->strUrl );
      $resInsert = $insert->execute($arrData);

      if($resInsert){

        return true;

      }else{

        return false;

      }

    } catch (\Exception $e) {

      echo "error";

    }


  }

  // select
  public function listar_boletas(){

    try {
      $sql  =  ("SELECT * FROM boleta ");
      $stmt =  $this->conexion->query($sql);
      $row  =  $stmt->fetchAll();
      if ($row ) {
        return $row;
      }else {
        return "error";
      }
    }catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

  }

  public function delete_area(int $id){

    try {

      $this->intIdArea = $id;

      $sql = "DELETE FROM area WHERE id_area = ?";
      $delete = $this->conexion->prepare($sql);
      $arrData = array($this->intIdArea);
      $resDelete = $delete->execute($arrData);

      if($resDelete){

        return true;

      }else{

        return false;

      }

    }catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }


  }

}
