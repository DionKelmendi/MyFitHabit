<!DOCTYPE html>

<?php 

session_start();
  require './UserController.php';

  $user = new UserController;

  if (isset($_SESSION['firstname'])) {
    $login = true;
  }
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Page</title>

    <link rel="stylesheet" href="style.css?v=1.0">
  <link rel="icon" type="image/png" href="images/favicon.png" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="main.js"></script>
  <script src="https://kit.fontawesome.com/f4fb5010ea.js" crossorigin="anonymous"></script>
</head>

<body>
