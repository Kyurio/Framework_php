<?php

require_once("../../config/core/Autoload.php");

class Cuenta extends Conexion{

  private $strCuenta;
  private $intIdCuenta;

  function __construct(){
    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();
  }

  // insert
  public function insert_cuenta(string $cuenta){

    try {

      $this->strCuenta = $cuenta;

      $sql = "INSERT INTO tipo_cuenta(tipo_cuenta) VALUES (?)";
      $insert = $this->conexion->prepare($sql);
      $arrData = array($this->strCuenta);
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
  public function listar_cuenta(){

    try {
      $sql  =  ("SELECT * FROM tipo_cuenta");
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

  // delete
  public function delete_cuenta(int $id){

    try {

      $this->intIdCuenta = $id;

      $sql = "DELETE FROM tipo_cuenta WHERE id_tipo_cuenta = ?";
      $delete = $this->conexion->prepare($sql);
      $arrData = array($this->intIdCuenta);
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
