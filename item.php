  <!-- ------------------------- Head ------------------------- -->

<?php include 'head.php';?>

  <!-- ------------------------- Header ------------------------- -->

<?php include 'header.php';?>

  <!-- ------------------------- Getting Product  ------------------------- -->

<?php

  require './ProductController.php';
  require './OrderController.php';
  $product = new ProductController;
  $order = new OrderController;

  $p = $product->get($_GET['id']);

  if (isset($_POST['buy'])) {
    $order->store($_POST);
  }

  if (!isset($_SESSION['role'])) {
    
    header("Location: index.php");
  }

?>

  <section class="smoothie">
  
  <div class="item">

  <img src="images/<?php echo $p['img'] ?>" alt="">

  </div>
  <div class="desc">
<form action="" method="POST">

      <h1><?php echo $p['name'] ?></h1>
      <hr>
      <p><?php echo $p['description'] ?></p>
      <hr>
      <h1>Quantity: <input type="number" name="number" id="" min="1" value="1"></h1>
      <hr>
      <div class="payment">
        <h1> Price: <?php echo $p['price'] ?>$ </h1>
        <div>
          <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
          <input type="hidden" name="product_id" value="<?php echo $p['id'] ?>">
          <input type="hidden" name="price" value="<?php echo $p['price'] ?>">
          <a href=""><button type="submit" class="buyNow" style="" name="buy">  Buy Now <i class="fa-solid fa-money-bill"></i> </button></a>  <br>
          <button class="addCart">Add to Cart<i class="fa-solid fa-cart-shopping"></i></button>
        </div>
      </div>
</form>
      <hr>
      <p>
        Shipping:
        US $65.00 FedEx International Economy®. See details for shipping
        International shipment of items may be subject to customs processing and additional charges.
        Located in: Las Vegas, Nevada, United States 
      </p> <br>
      <p>
        Delivery:
        Estimated between Thu, Mar 30 and Wed, Apr 26 to 1001
        Please note the delivery estimate is greater than 10 business days.
        Please allow additional time if international delivery is subject to customs processing. 
      </p><br>
      <p> 
        Returns:
        30 day returns. Buyer pays for return shipping. See details
      </p>
    </div>

  </section>

  <!-- ------------------------- Footer ------------------------- -->

  <?php include 'foot.php' ?>
  
  </body>

</html>