  <!-- ------------------------- Head ------------------------- -->

<?php include 'head.php';?>

  <!-- ------------------------- Header ------------------------- -->

<?php include 'header.php';?>

  <!-- ------------------------- Profile ------------------------- -->

<?php 

  if(isset($_POST['eUser'])) {
    $user->update($_POST);
  }

  if($_SESSION['user_id'] != $_GET['id']){
    header("Location: index.php");
  }

?>

<section class="profile">

  <form action="" method="post">

    <input type="hidden" name="id" value="<?php echo $_SESSION['user_id'] ?>">
    
    <div>
    <label for="firstname">Firstname</label> <br>
    <input type="text" name="firstName" value="<?php echo $_SESSION['firstname'] ?>" placeholder="Enter new Firstname" required> <br>
    </div>

    <div>
    <label for="lastname">Lastname</label> <br>
    <input type="text" name="lastName" value="<?php echo $_SESSION['lastname'] ?>" placeholder="Enter new Lastname" required> <br>
    </div>

    <hr>

    <div>
    <label for="email">Email</label> <br>
    <input type="email" name="email" value="<?php echo $_SESSION['email'] ?>" placeholder="Enter new Email" required> <br>
    </div>

    <hr>

    <div>
    <label for="password">New Password</label> <br>
    <input type="password" id="password" name="password" value="" placeholder="Enter new Password" oninput="validate()"> <br>
    <span id="spanPassword"></span>
    </div>

    <div>
    <label for="cpassword">Confirm Password</label> <br>
    <input type="password" id="cpassword" name="cpassword" value="" placeholder="Confirm Password" oninput="validate()"> <br> <br>
    </div>

		<button type="submit" id="eUserButton" class="button" name="eUser">Save Changes</button>

  </form>
  
</section>

</body>

</html>

<script>

  function validate(){

    password = document.getElementById('password').value;
    cpassword = document.getElementById('cpassword').value;
    span = document.getElementById('spanPassword');
    button = document.getElementById('eUserButton');
    const passPattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;

    
    if (password.length < 6) {
      span.innerText = "Password must be at least 6 characters";
    } else if (password.match(passPattern)) {
      button.disabled = false;
      button.style.backgroundColor = "#023020";
      span.innerText = "";      
    } else{
      span.innerText = "Needs a capital letter or a number";
    }
    
    if (password != cpassword) {
      button.disabled = true;
      button.style.backgroundColor = "#41524b";
    } else{
      button.disabled = false;
      button.style.backgroundColor = "#023020";
    }
  }
</script>