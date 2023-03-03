<?php

  require_once("./connection.php");

  if(isset($_POST['token']) && isset($_POST['user_id'])) {
    $id = $_POST['user_id'];
    $query = "SELECT * FROM task WHERE user_id = '$id'";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

    echo json_encode(array("tasks" => $result));
  }





?>