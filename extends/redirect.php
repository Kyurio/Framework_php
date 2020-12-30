<?php

require_once("../../config/config.php");

function redireccionar($pagina){
  header('location: ' . RUTA_URL . $pagina );
}



?>
