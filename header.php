<header id="header" class="headerU">
  <ul>

    <div>
      <li class="logo">
        <a href="index.php">
          <img src="images/favicon.png" alt="" style="height: 30px;">
          My<span style="color: green;">Fit</span>Habit
        </a>
      </li>
    </div>

    <div>

      <?php 

        if (isset($_SESSION['role'])) {
          if ($_SESSION['role'] == "Admin") {
            
            echo "<li class=\"item list\">";
            echo "<a href=\"menu.php?t=users\">";
            echo "Menu";
            echo "</a></li>";
          }
        }
      ?>
      <li class="item list"><a href="about.php"> About Us </a></li>
      <li class="item list"><a href="products.php"> Products </a></li>
      
      <li class="item list">

      <?php if(!isset($_SESSION['firstname'])):?>

        <a href="login.php"><i class="fa-solid fa-users"></i>Log In</a>

      <?php else: ?>

        <div class="dropdown">
        <a class="dropbtn"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'] ?> <i class="fa-solid fa-caret-down"></i></a>
        <div id="dropContent" class="dropdown-content dropdownU">

        <a href="myOrders.php"><i class="fa-solid fa-truck-fast"></i><span  style="float: right;">My Orders</span></a>

        <a href="profile.php?id=<?php echo $_SESSION['user_id'] ?>"><i class="fa-solid fa-user-pen"></i><span  style="float: right;">Edit Profile</span></a>

        <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i><span  style="float: right;">Log Out</span></a>

        </div></div>

      <?php endif; ?>
      </li>

    </div>

  </ul>

  </header>
        <div class="burger" style="position: fixed;z-index: 999999">

        <button class="burgerToggle"><i class="fa-solid fa-bars"></i></button>
    </div>
  <div class="burgerList">
    <div class="container">  

      <?php if (isset($_SESSION['role'])): ?>
       <?php if ($_SESSION['role'] == "Admin"): ?>

          <a href="menu.php">Menu</a>

       <?php endif; ?>
      <?php endif; ?>
      <a href="about.php">About Us</a>
      <a href="products.php">Products</a>
      <?php if(isset($_SESSION['firstname'])):?>
        <a alt="#" class="burgerMiniToggle"><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']?></a>
        <div class="burgerMiniList">
          <a href="myOrders.php">My Orders</a> <br>
          <a href="profile.php?id=<?php echo $_SESSION['user_id'] ?>">Edit Profile</a> <br>
          <a href="logout.php">Log Out</a>
        </div>
      <?php else: ?>
        <a href="login.php">Log In</a>

        <?php endif; ?>
    </div>
  </div>