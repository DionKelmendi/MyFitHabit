  <!-- ------------------------- Head ------------------------- -->

<?php include 'head.php';?>

  <!-- ------------------------- Header ------------------------- -->

<?php include 'header.php';?>

  <!-- ------------------------- Products ------------------------- -->

<?php 

  require './ProductController.php';
  $product = new ProductController; 
  $products = $product->all();

?>
  <!-- ------------------------- Mask ------------------------- -->

<svg xmlns="http://www.w3.org/2000/svg">
  <mask id="mask1">
    <path fill="#FFFFFF"
      d="M53.5,-50.6C61.8,-32.3,55.6,-10.5,49.6,9.4C43.5,29.3,37.5,47.3,23.5,57.1C9.6,67,-12.2,68.7,-27,60.1C-41.9,51.4,-49.8,32.3,-52.4,13.9C-55,-4.4,-52.3,-22,-42.6,-40.5C-33,-59.1,-16.5,-78.8,3.1,-81.2C22.6,-83.7,45.3,-68.9,53.5,-50.6Z"
      transform="translate(0 0)" id="prova" />
  </mask>
  <image href="images\heroImage.jpg" alt="" mask="url(#mask1)" />
</svg>


  <!-- ------------------------- Hero ------------------------- -->
  <section class="hero">

    <div class="container">

      <img src="images\heroImage.jpg" alt="">

      <div class="subtext">
        <h1> My Fit Habit </h1>
        <p> Making you healthy one shake at a time </p>

        <a href="<?php if ($login) {echo "products.php";}else{echo "login.php";}?>"> <button class="smallButton"> Order Online </button> </a>
      </div>
    </div>

  </section>

  <!-- ------------------------- Filler Section / One Image ------------------------- -->
  <section class="filler filler1">

  </section>

  <!-- ------------------------- Product Slider ------------------------- -->
  <section class="product">

    <div>
      <h1> Our Products </h1> <br>
      <p> Lookie lookie at our collection of products. See one that you like? Then be sure to pick it up ;)</p>
    </div>

    <div id="controls"></div>

    <div class="slider">
      <button class="sliderButton" id="sliderLeft">
        < </button>

          <div class="container" id="slider">
            <?php foreach ($products as $p): ?>
              <div class="item" id="sliderItem">
                <a href="item.php?id=<?php echo $p['id']?>">
                  <img src="images/<?php echo $p['img']; ?>" alt="">
                  <p> <?php echo $p['name']?> </p>
                </a>
              </div>
            <?php endforeach; ?>
          </div>

          <button class="sliderButton" id="sliderRight"> > </button>
    </div>

    <div class="enjoy">
      <img src="images\temp.gif" alt="">
      <h1> Enjoy with friends! </h1> <br>
      <p> This company was made by a group of friends, so it makes sense to be enjoyed by a group of friends as well. </p> <br> <br>
      <a href="about.php"> <button class="smallButton"> Read More </button> </a>
    </div>

  </section>

  <!-- ------------------------- Filler Section / Two image ------------------------- -->
  <section class="filler filler2">

    <div></div>
    <div>
      <p class="hidden"> Indulge on your Fit Habit™ </p>
      <p class="hidden" style="text-align: justify;"> Our shakes are made by using high-quality, high-grade fruits and vegetables. Just the thing you need after a tough workout.
      </p>
    </div>

  </section>

  <!-- ------------------------- Filler Section / Benefits ------------------------- -->
  <section class="benefits">

    <h1> Benefits to eating healthy: </h1> <br>

    <div class="container">
      <div class="item">
        <img src="images\calendar.png" alt="">
        <h2> Live Longer </h2> <br>
        <h3> Scientists conclude that a sustained switch to an optimal diet from the age of 20 years could increase life expectancy by around 10.7 years for
          women and 13
          years for men. </h3>
      </div>
      <div class="item">
        <img src="images\strength.png" alt="">
        <h2> Keeps you stronger </h2> <br>
        <h3> Healthy eating support your muscles, greatly improving recovery. It also and strengthens your bones, and boosts your immune system, which protects your body from
          outside invaders.
        </h3>
      </div>
      <div class="item">
        <img src="images\graph.png" alt="">
        <h2> Lowers risk </h2> <br>
        <h3> People with a healthy diet have a lower risk of heart disease. type 2 diabetes and some cancers, helps maintain a healthy weight and supports healthy pregnancies.
        </h3>
      </div>
    </div>
    <br>
    <h1> Join us on our mission to make the world more healthy :)</h1> <br>

  </section>

  <!-- ------------------------- Footer ------------------------- -->

  <?php include 'foot.php' ?>

</body>

</html>

<script>

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      // console.log(entry)
      if (entry.isIntersecting) {
        entry.target.classList.add('show');
      } else {
        entry.target.classList.remove('show');
      }
    });
  });

  const hiddenElements = document.querySelectorAll('.hidden');
  hiddenElements.forEach((el) => observer.observe(el));
</script>