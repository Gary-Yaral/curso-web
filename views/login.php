<?php 
  if(!defined("ROOT")) {
    require_once("../config.php");
    require_once("../logic/redirect.php");
  }

  redirect_to("/".ROOT."/pane");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/<?= ROOT ?>/assets/css/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>Inicio | Sesion</title>
</head>
<body class="container">
  <form class="form" id="form-login">
    <h3>Iniciar Sesión</h3>
    <label for="user">Usuario</label>
    <input type="text" name="user" id="user" required>
    <sub id="error-user"></sub>
    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" required>
    <sub id="error-password"></sub>
    <input type="submit" value="Acceder">
    <sub id="error-form"></sub>
  </form>
  <script src="/<?= ROOT ?>/assets/js/login.js" type="module"></script>
</body>
</html>