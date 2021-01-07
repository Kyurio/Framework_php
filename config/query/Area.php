<?php

require_once("../../config/core/Autoload.php");

class Area extends Conexion{

  private $strArea;
  private $intIdArea;

  function __construct(){
    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();
  }

  // insert
  public function insert_area(string $area){

    try {

      $this->strArea = $area;

      $sql = "INSERT INTO area(area) VALUES (?)";
      $insert = $this->conexion->prepare($sql);
      $arrData = array($this->strArea);
      $resInsert = $insert->execute($arrData);

      if($resInsert){

        return true;

      }else{

        return false;

      }

    } catch (\Exception $e) {

      echo "errro";

    }


  }

  // select
  public function listar_area(){

    try {
      $sql  =  ("SELECT * FROM area ");
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
