<?php
  require_once("./connection.php");

  if(isset($_POST['idTask'])) {
    // REALIZAMOS EL CAMBIO DE ESTADO
    $id = $_POST['idTask'];
    
  } else {
    // ESTO DEVOLVEMOS ERROR CUANDO NO ENVIA EL ID
    echo json_encode(array("error"=> "No has enviado los datos"));
  }



?>