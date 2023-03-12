<?php
    session_start();
    require './UserController.php';

    $user = new UserController;

    if(isset($_POST['submitted'])) {
        $user->store($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/f4fb5010ea.js" crossorigin="anonymous"></script>
  <title>MyFit Login</title>
</head>
<body style="background: url(images/veggies.jpg); height: 100vh;background-size: cover;">
	
	<?php include 'header.php';?>

  <form action="" method="POST">
		
		<input type="text" id="firstname" name="firstname" placeholder="First Name" required>
		
		<input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
		
		<label class="emailBox">
			<input type="text" id="email" name="email" placeholder="Email" required>
			<span class="emailText"></span>
		</label>
		
		<label class="passwordBox">
			<input type="password" id="password" name="password" placeholder="Password" required>
			<span class="passwordText"></span>
		</label>
		
		<label class="cPasswordBox">
			<input type="password" id="cPassword" name="cPassword" placeholder="Confirm Password" required>
			<span class="cPasswordText"></span>
		</label>
		
		<input type="checkbox" name="role"> Is Admin? <br>
		
		<button type="submit" class="button" name="submitted" id="submit">Save</button>

      <?php
        if(isset($_GET['error'])){
            echo '<p>Email is already in use</p>';
        }
      ?>
  </form>

	<script>
		const email = document.getElementById("email");
		const password = document.getElementById("password");
		const button = document.getElementById("submit");

		firstname.addEventListener('input', ()=>{

			const fnBox = document.querySelector('.fnBox');
			const fnText = document.querySelector('.fnText');

			if (!firstname) {
				
				fnBox.classList.add('valid');
				fnBox.classList.remove('invalid');
				fnText.innerHTML = "Your email address is valid";
			}
		});

		email.addEventListener('input',()=>{
			
			const emailBox = document.querySelector('.emailBox');
			const emailText = document.querySelector('.emailText');
			const emailPattern = /[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$/;

			if(email.value.match(emailPattern)){
				
				emailBox.classList.add('valid');
				emailBox.classList.remove('invalid');
				emailText.innerHTML = "Your email address is valid";
				document.getElementById("submit").disabled = false;
				document.getElementById("submit").style.backgroundColor = "#023020";
			}else{

				emailBox.classList.add('invalid');
				emailBox.classList.remove('valid');
				emailText.innerHTML = "Must be a valid email address.";
				document.getElementById("submit").disabled = true;
				document.getElementById("submit").style.backgroundColor = "#41524b";
			}
		});

		password.addEventListener('input',()=>{

			const passwordBox = document.querySelector('.passwordBox');
			const passwordText = document.querySelector('.passwordText');
			const passPattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;

			if(password.value.match(passPattern)){

				passwordBox.classList.add('valid');
				passwordBox.classList.remove('invalid');
				passwordText.innerHTML = "Your password is valid";
				document.getElementById("submit").disabled = false;
				document.getElementById("submit").style.backgroundColor = "#023020";
			}else{
			
				passwordBox.classList.add('invalid');
				passwordBox.classList.remove('valid');
				passwordText.innerHTML = "Your password must be at least 6 characters as well as contain at least one uppercase, one lowercase, and one number.";
				document.getElementById("submit").disabled = true;
				document.getElementById("submit").style.backgroundColor = "#41524b";

			}
		});

		cPassword.addEventListener('input',()=>{

			const cPasswordBox = document.querySelector('.cPasswordBox');
			const cPasswordText = document.querySelector('.cPasswordText');

			if(cPassword.value == password.value){
				cPasswordBox.classList.add('valid');
				cPasswordBox.classList.remove('invalid');
				cPasswordText.innerHTML = "Your password is valid";
				document.getElementById("submit").disabled = false;
				document.getElementById("submit").style.backgroundColor = "#023020";
			}else{
				cPasswordBox.classList.add('invalid');
				cPasswordBox.classList.remove('valid');
				cPasswordText.innerHTML = "Please write password correctly";
				document.getElementById("submit").disabled = true;
				document.getElementById("submit").style.backgroundColor = "#41524b";
			}
		});

	</script>
</body>
</html>
