<?php

  require_once("./connection.php");

  // Validar que se hayan enviados los parametros
  if(isset($_POST['task_id']) && isset($_POST['task'])) {
    // Ejecutamos la query
    $id = $_POST['task_id'];
    $task = $_POST['task'];

    $query = "UPDATE task SET detail='$task' WHERE id='$id'";
    $result = $conn->query($query);
    if($result) {
      echo json_encode(array("error" => false, "message"=>"Tarea actualizada correctamente"));
    } else {
      echo json_encode(array("error" => true, "message"=>"No se ha podido actualizar la tarea"));
    }

  } else {
    echo json_encode(array("error" => "Datos no fueron enviados"));
  }


?>