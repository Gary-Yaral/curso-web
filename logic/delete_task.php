<?php

  require_once("./connection.php");

  if(isset($_POST['task_id'])) {
    // Eliminamos la tarea
    $id = $_POST['task_id'];
    $query = "DELETE FROM task WHERE id='$id'";
    $result = $conn->query($query);
    if($result) {
      echo json_encode(array("error"=> false, "message"=>"Tarea eliminada correctamente"));
    } else {
      echo json_encode(array("error"=> true, "message"=>"Tarea no se ha podido eliminar"));
    }

  } else {
    echo json_encode(array("error" => "Datos no fueron enviados"));
  }




?>