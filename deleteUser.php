<?php

  session_start();
  require './UserController.php';

  $user = new UserController;

  $user->destroy($_GET["id"]);

?>