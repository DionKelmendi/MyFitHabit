<?php
    session_start();
    require './UserController.php';

    $user = new UserController;

    if(isset($_POST['submitted'])) {
        $user->login($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/f4fb5010ea.js" crossorigin="anonymous"></script>
  <title>MyFit Login</title>
</head>
<body style="background: url(images/veggies.jpg); height: 100vh;background-size: cover;">
	
	<?php include 'header.php';?>

	<form method="POST" action="">
		<h3>Log in</h3>

			<input type="text" id="email" name="email" placeholder="Email" required>

			<input type="password" id="password" name="password" placeholder="Password">

		<button type="submit" class="button" name="submitted" id="submit">Log in</button>

		<p>Dont have an account? You can <a href="register.php"> register </a> here!</p>
	</form>

	
</body>
</html>
