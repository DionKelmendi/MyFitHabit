<?php

  require './OrderController.php';

  $order = new OrderController;

  $order->destroy($_GET["id"]);

  header("Location: menu.php?t=orders");

?>
