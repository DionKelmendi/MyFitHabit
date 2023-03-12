<?php

  require './ProductController.php';

  $product = new ProductController;

  $product->destroy($_GET["id"]);

  header("Location: menu.php?t=products");

?>
