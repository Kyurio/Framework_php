<?php

require_once("../../config/core/Autoload.php");

class Roles extends Conexion{

  private $strRol;
  private $intIdRol;

  function __construct(){
    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();
  }

  // insert
  public function insert_rol(string $rol){

    try {

      $this->strRol = $rol;

      $sql = "INSERT INTO rol(rol) VALUES (?)";
      $insert = $this->conexion->prepare($sql);
      $arrData = array($this->strRol);
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
  public function listar_rol(){

    try {
      $sql  =  ("SELECT * FROM rol ");
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

  public function delete_rol(int $id){

    try {

      $this->intIdRol = $id;

      $sql = "DELETE FROM rol WHERE id = ?";
      $delete = $this->conexion->prepare($sql);
      $arrData = array($this->intIdRol);
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
