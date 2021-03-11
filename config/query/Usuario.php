<?php
require_once("../../config/core/Autoload.php");


class Usuario extends Conexion{

  private $strKey;
  private $strUsusario;
  private $strSeccion;
  private $intPass;

  function __construct(){

    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();

  }

  // insert
  public function insert_tarea(string $key, string $usuario, string $seccion, string $pass){

    try {

      $this->strUsuario= $usuario;
      $this->strPlazo = $plazo;
      $this->intEstado = 1;
      $this->intIdUsuario =1;
      $this->strKey = base64_decode

      // 1 activo - 0 inactivo;

      $sql = "INSERT INTO task(titulo, plazo, Estado, id_usuario) VALUES (?,?,?,?)";
      $insert = $this->conexion->prepare($sql);
      $arrData = array($this->strTitulo, $this->strPlazo, $this->intEstado, $this->intIdUsuario);
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
  public function listar_tareas(){

    try {
      $sql  =  ("SELECT * FROM task WHERE estado = 1");
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

  // update
  public function update_tarea(int $id){

    try{

      $this->intEstado = 0;
      $this->id = $id;
      // 1 activo - 0 inactivo;

      $sql = "UPDATE task SET estado = ? WHERE id = ?";
      $update = $this->conexion->prepare($sql);
      $arrData = array($this->intEstado, $this->id);
      $resInsert = $update->execute($arrData);

      if($resInsert){

        return true;

      }else{

        return false;

      }

    } catch (\Exception $e) {
      echo "errro 500";
    }

  }

  // delete
  public function delete_mapa(){}

  }
