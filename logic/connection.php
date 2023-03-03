<?php

  $conn = mysqli_connect("localhost", "root", "", "todolist");

  if (mysqli_connect_errno()) {
    echo "Ha ocurrido un error: " . mysqli_connect_errno();
  }

?>