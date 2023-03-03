<?php

  require_once("./connection.php");

  if(isset($_POST['user_id']) && isset($_POST['task'])) {
    $id = $_POST['user_id'];
    $task = $_POST['task'];
    $status = 1;
    $currentDate = date("Y-m-d h:i:s");

    $query = "INSERT INTO task(user_id, detail, status, created) VALUES('$id','$task','$status','$currentDate')";
    $result = $conn->query($query);

    if($result) {
      echo json_encode(array("error" => false, "message" => "Tarea guardada correctamente"));
    } else {
      echo json_encode(array("error" => true, "message" => "No se ha podido guarda la tarea"));
    }

  } else {
    echo json_encode(array("error" => "Datos no han sido enviados"));
  }


?>