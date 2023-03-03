<?php

  function create_session(String $key, Array $data) {
    session_start();
    $_SESSION[$key] = $data;
  }


?>