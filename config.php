<?php

$routes = array(
  "login" => "login.php",
  "pane" => "pane.php"
);


define("URI", isset($_REQUEST['uri']) ? $_REQUEST['uri'] : "");
define("ROUTES", $routes);
define("NOT_FOUND", "404.php");
define("VIEWS", "views/");
define("ROOT", "todolist");

?>