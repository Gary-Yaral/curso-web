<?php

  require_once("./connection.php");
  require_once("./create_session.php");

  $userExists = isset($_POST['user']);
  $passwordExists = isset($_POST['password']);

  if($userExists && $passwordExists) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    $query = "SELECT * from user where access_name='$user' AND password='$password'";
    $result = $conn->query($query)->fetch_all();

    if(count($result) > 0) {
      $data = $result[0];
      $session_data = array("id" => $data[0], "name" => $data[1]);
      create_session("access", $session_data);

      echo json_encode(array("access" => true));
    } else {
      echo json_encode(array("access" => false, "error" => "Usuario o contraseña incorrectos"));
    }

  } else {
    echo json_encode(array("error"=>"404"));
  }

?>