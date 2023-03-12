  <!-- ------------------------- Head ------------------------- -->

<?php include 'head.php';?>

  <!-- ------------------------- Header ------------------------- -->

<?php include 'header.php';?>

<?php 

  require './ProductController.php';
  require './OrderController.php';

  $product = new ProductController;
  $order = new OrderController;
  $orders = $order->get($_SESSION['user_id']);
  $userName = $_SESSION['firstname'].' '.$_SESSION['lastname'];

?>

  <!-- ------------------------- Main Content ------------------------- -->
<section class="orderTable tableMenu">
<table>
    <thead>
      <tr>
        <th>User</th>
        <th>Products</th>
        <th>Total</th>
        <th></th>
      </tr>
    </thead>  

<!-- ------------------------- Order For Loop ------------------------- -->

    <?php foreach($orders as $o): ?>

      <?php 
        $productData = explode("x",$o['products']);
        $productName = ($product->get($productData[1]))['name'];
        
        ?>
      <tr>
        <td class="" ><?php echo $userName ?></td>
        <td class="" ><?php echo $productData[0].'x'.$productName ?></td>
        <td class="" ><?php echo $o['total']; ?>$</td>
        <td><a href="deleteOrder.php?id=<?php echo $o['id']; ?>" id="dOrder">Cancel Order</a></td>
      </tr>
      <?php endforeach; ?>

  </table>  
</section>
  <!-- ------------------------- Footer ------------------------- -->

  <?php include 'foot.php' ?>

  </body>

</html>