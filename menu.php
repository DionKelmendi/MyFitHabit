
<?php include 'head.php';?>

<?php 

  require './ProductController.php';
  require './OrderController.php';

  $product = new ProductController;
  $order = new OrderController;

  if (!isset($_GET['t'])) {
    $_GET['t'] = "users";
  }

  if (isset($_SESSION['firstname'])) {
    $login = true;
  }

  if (!isset($_SESSION['role'])) {
    
    header("Location: index.php");
  }

  if ($_SESSION['role'] == "User") {
        
    header("Location: index.php");
  }

  if(isset($_POST['eUser'])) {
    $user->update($_POST);
  }

  if(isset($_POST['sProduct'])) {
    $product->store($_POST);
  }

  if(isset($_POST['eProduct'])) {
    $product->update($_POST);
  }

?>

  <!-- ------------------------- Header ------------------------- -->

<?php include 'header.php';?>

  <!-- ------------------------- Table ------------------------- -->

<section class="tableMenu">
    <div class="sidebarToggle" style="position: fixed;z-index: 999999; cursor:pointer;">
      <button class=""><i class="fa-solid fa-rotate-right"></i></button>
    </div>
  <div class="sidebar" style="margin-top: 96.5px">

    <a href="?t=users">Users</a>
    <a href="?t=products">Products</a>
    <a href="?t=orders">Orders</a>
  </div>
<div class="main-content">
  
  <h1>
    <?php
      if (isset($_GET['t'])) {
        switch ($_GET['t']) {
          case "users":
            $users = $user->all();
            echo "USER TABLE";
            break;
          case "products":
            $products = $product->all();
            echo "PRODUCT TABLE";
            break;
          case "orders":
            $orders = $order->all();
            echo "ORDER TABLE";
            break;
        }
      }
    ?>
  </h1>
  <table>

  <!-- ------------------------- User Table ------------------------- -->

    <?php if ($_GET['t'] == "users"):?>
    <thead>
      <tr>
        <th colspan=7 style="text-align: left"> <button><a href="createUser.php" id="cUser">Create a new User</a></button></th>
      </tr>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
        <th colspan=2 class="fillerth"></th>
      </tr>
    </thead>    

  <!-- ------------------------- User For Loop ------------------------- -->

    <?php foreach($users as $u): ?>
      <tr>
        <td class="td-id"><?php echo $u['id']; ?></td>
        <td class="td-firstName"><?php echo $u['firstname']; ?></td>
        <td class="td-lastName"><?php echo $u['lastname']; ?></td>
        <td class="td-email"><?php echo $u['email']; ?></td>
        <td class="td-role"><?php echo $u['role']?></td>
        <td><a href="#" name="eUserButton" id="eUser" class="eUserButton">Edit</a></td>
        <td><a href="deleteUser.php?id=<?php echo $u['id']; ?>" id="dUser">Delete</a></td>
      </tr>
    <?php endforeach; ?>
    <?php endif; ?>
  <!-- ------------------------- End of User Table ------------------------- -->
  <!-- ------------------------- Product Table ------------------------- -->

    <?php if ($_GET['t'] == "products"):?>
    <thead>
      <tr>
        <th colspan=7 style="text-align: left"><button id="cProduct" >Create a new Product</button></th>
      </tr>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Price</th>
        <th colspan=2 class="fillerth"></th>
      </tr>
    </thead>    

  <!-- ------------------------- Product For Loop ------------------------- -->

    <?php foreach($products as $p): ?>
      <tr>
        <td class="td-id"><?php echo $p['id']; ?></td>
        <td class="td-name" ><?php echo $p['name']; ?></td>
        <td class="td-desc" ><p style="width: 415px;overflow:hidden;"><?php echo $p['description']; ?></p></td>
        <td class="td-img"><img align="middle" src="images/<?php echo $p['img']; ?>"></td>
        <td class="td-price"><?php echo $p['price']?>$</td>
        <td><a href="#" id="eProduct" name="eProductButton" class="eProductButton">Edit</a></td>
        <td><a href="deleteProduct.php?id=<?php echo $p['id']; ?>" id="dProduct">Delete</a></td>
      </tr>
    <?php endforeach; ?>
    <?php endif; ?>
  <!-- ------------------------- End of Product Table ------------------------- -->
  
  <!-- ------------------------- Order Table ------------------------- -->

    <?php if ($_GET['t'] == "orders"):?>
    <thead>
      <tr>
        <th>ID</th>
        <th>User</th>
        <th>Products</th>
        <th>Total</th>
        <th></th>
      </tr>
    </thead>  

<!-- ------------------------- Order For Loop ------------------------- -->

    <?php foreach($orders as $o): ?>

      <?php 
        $userName = $user->get($o['user_id'])['firstname'].' '.$user->get($o['user_id'])['lastname'];
        $productData = explode("x",$o['products']);
        $productName = ($product->get($productData[1]))['name'];
      ?>
      <tr>
        <td class="" ><?php echo $o['id']; ?></td>
        <td class="" ><?php echo $userName ?></td>
        <td class="" ><?php echo $productData[0].'x'.$productName ?></td>
        <td class="" ><?php echo $o['total']; ?>$</td>
        <td><a href="deleteOrder.php?id=<?php echo $o['id']; ?>" id="dOrder">Delete</a></td>
      </tr>
    <?php endforeach; ?>
    <?php endif; ?>

  </table>  
  </div>
</section>

<!-- ------------------------- User Edit Window ------------------------- -->

<section id="eUserWindow" class="eUserWindow hidden window">

    <form action="" method="POST">
    <button style="float:right; background:none; border:0; color:white; cursor:pointer; font-weight:bold">X</button>
		
		<input type="hidden" class="eUserId" name="id" value="">

		<input type="text" class="eUserFirstName" name="firstName" placeholder="Name" value="">
		
    <input type="text" class="eUserLastName" name="lastName" placeholder="Last Name" value="">
		
		<input type="email" class="eUserEmail" name="email" placeholder="Email" value="">
		
		<input type="checkbox" class="eUserRole" name="role"> Is Admin? <br>

		<button type="submit" class="button" name="eUser">Edit</button>
    </form>
</section>
<!-- ------------------------- End of Edit User Window  ------------------------- -->

<!-- ------------------------- Product Create Window ------------------------- -->

<section id="cProductWindow" class="cProductWindow hidden window">
  <form action="" method="POST" enctype="multipart/form-data">
    <button id="closeButton" type="button" style="float:right; background:none; border:0; color:white; cursor:pointer; font-weight:bold">X</button>
		
		<input type="text" id="name" name="name" placeholder="Name" required>
		
		<input type="text" id="description" name="description" placeholder="Description" required>
		
		<input type="file" id="img" name="img" placeholder="Image" required>

		<input type="number" id="price" name="price" placeholder="Price" required>
    
		
		<button type="submit" class="button" name="sProduct" id="sProduct">Save</button>
    </form>
</section>
  <!-- ------------------------- End of Create Product Window  ------------------------- -->

<!-- ------------------------- Product Edit Window ------------------------- -->

<section id="eProductWindow" class="eProductWindow hidden window">

    <form action="" method="POST">
    <button style="float:right; background:none; border:0; color:white; cursor:pointer; font-weight:bold">X</button>
		
		<input type="hidden" class="eProductId" name="id" value="">

		<input type="text" class="eProductName" name="name" placeholder="Name" value="">
		
		<input type="text" class="eProductDesc" name="description" placeholder="Description" value="">
		
		<input type="file" class="eProductImg" id="img" name="img" placeholder="Image" value="">

		<input type="number" class="eProductPrice" name="price" placeholder="Price" value="">
    
		
		<button type="submit" class="button" name="eProduct">Edit</button>
    </form>
</section>
<!-- ------------------------- End of Edit Product Window  ------------------------- -->

<!-- ------------------------- Table Warning ------------------------- -->
 <section class="tableWarning">

 <h1>Rotate Phone to better see the tables, and to be able to edit them</h1>
 </section>

</body>
</html>

<script>

      const header = document.getElementById("header");
      header.classList.add('headerA');
			header.classList.remove('headerU');

      const dropContent = document.getElementById("dropContent");
      dropContent.classList.add('dropdownA');
      dropContent.classList.remove('dropdownU');

</script>