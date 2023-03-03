<?php

  function redirect_to(String $exists, String $not_exists = "") {
    session_start();
    if(isset($_SESSION["access"])) {
      header("Location:".$exists);
    } else {
      header("Location:".$not_exists);
    }
  }


?>