  <!-- ------------------------- Head ------------------------- -->

    <?php include 'head.php';?>

  <!-- ------------------------- Products ------------------------- -->

<?php 

  require './ProductController.php';
  $product = new ProductController; 
  $products = $product->all();

  if (isset($_GET['q'])) {
    $products = $product->find($_GET['q']);
  }

  if (isset($_GET['sP'])) {
    $products = $product->sortPrice($_GET['sP']);
  }

  if (isset($_GET['sN'])) {
    $products = $product->sortName($_GET['sN']);
  }

  if(isset($_POST['search'])) {
    header('Location: products.php?q='.$_POST['search']);
  }
?>

  <!-- ------------------------- Header ------------------------- -->
  
    <?php include 'header.php';?>

  <!-- ------------------------- Products Filler ------------------------- -->

<div class="sidebarToggle" style="position: fixed;z-index: 999999; top: 100px;">
  <button class="" style=" background:none; border:0; transform: scale(2); cursor:pointer;"><i class="fa-solid fa-rotate-right"></i></button>
</div>
  <div class="sidebar" style="height:100%; background: lightgray; width: 300px;text-align:center;z-index: 10;">
      <h3 style="margin-top: 200px;">Search for a product</h3><br>
      <form action="" method="post">
        <input type="text" name="search" id="" placeholder="Search..">
        <button id="searchButton" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
    <h3 href="?t=products">Sort By Price</h3>
    <button type=""><i class="fa-solid fa-sort-up"></i><b><a href="products.php?sP=asc" style="font-size: 12px;padding:0; display:inline">Ascending</a></b></button>
    <button type=""><i class="fa-solid fa-sort-down"></i></i><b><a href="products.php?sP=desc" style="font-size: 12px;padding:0; display:inline">Descending</a></b></button>

    <h3 href="?t=products">Sort By Name</h3>
    <button type=""><i class="fa-solid fa-sort-up"></i><b><a href="products.php?sN=asc" style="font-size: 12px;padding:0; display:inline">Ascending</a></b></button>
    <button type=""><i class="fa-solid fa-sort-down"></i></i><b><a href="products.php?sN=desc" style="font-size: 12px;padding:0; display:inline">Descending</a></b></button>

  </div>
  <div class="productMain">

    <div class="mainH">
      <div class="shopTitle">
        <h1> Shop </h1>
        <hr>
      </div>
    </div>

    <div class="container">

      <?php foreach ($products as $p): ?>
        <div class="item">
          <a href="item.php?id=<?php echo $p['id']?>">
            <img src="images/<?php echo $p['img'] ?>" alt="">
            <p> <?php echo $p['name'] ?> <span> <?php echo $p['price'] ?>$ </span> </p>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

  </div>

  <!-- ------------------------- Footer ------------------------- -->

  <?php include 'foot.php' ?>

</body>

</html>