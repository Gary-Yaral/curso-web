<?php

  class App {
    public function __construct()
    {
      if(isset(ROUTES[URI])) {
        require_once(VIEWS.ROUTES[URI]);
      } else {
        require_once(VIEWS.NOT_FOUND);
      }
    }
  }


?>