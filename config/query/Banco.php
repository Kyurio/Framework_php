<?php

require_once("../../config/core/Autoload.php");

class Banco extends Conexion{

  private $strBanco;
  private $intIdBanco;

  function __construct(){
    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();
  }

  // insert
  public function insert_banco(string $banco){

    try {

      $this->strBanco = $banco;

      $sql = "INSERT INTO banco(banco) VALUES (?)";
      $insert = $this->conexion->prepare($sql);
      $arrData = array($this->strBanco);
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
  public function listar_banco(){

    try {
      $sql  =  ("SELECT * FROM banco ");
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

  public function delete_banco(int $id){

    try {

      $this->intIdRol = $id;

      $sql = "DELETE FROM banco WHERE id_banco = ?";
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
