<?php

include('login_check.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta tags and title -->
  <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="frontend/style.css">
        <link rel="stylesheet" href="frontend/cart.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="frontend/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="frontend/css/adminlte.min.css">
        <link rel="stylesheet" href="frontend/css/custom.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Include Slick Slider CSS and JS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
         <!-- bootstrap -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>
<body>
 <?php 
 
  include('header.php');
 
 ?>

<!-- slider -->
  <section class="slider-container m-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="slider" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider" data-slide-to="0" class="active"></li>
                        <li data-target="#slider" data-slide-to="1"></li>
                        <li data-target="#slider" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="frontend/img/add.jpg" alt="Ad 1" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="frontend/img/add1.jpg" alt="Ad 2" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="frontend/img/add2.jpg" alt="Ad 3" class="d-block w-100">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


  <!-- Subscribe section -->
  <section class="subscribe-section">
    <h2>Subscribe With Us</h2>
    <p>Stay Hydrated!</p>
    <a href="./subscribe.php" class="subscribe-button">Subscribe</a>
</section>

  <!-- Product listing section -->
<section class="product-listing">
    <h2>Product Listing</h2>
    <!-- Product 1 -->
    <div class="product">
      <img src="frontend/img/20 litter.jpg" alt="Product 1">
      <h3> 10 Liter Watter Bottle</h3>
      <p>10 Ltr.</p>
      <span>80 Taka</span>
      <button>Add to Cart</button>
    </div>

    <!-- Product 2 -->
    <div class="product">
      <img src="frontend/img/30 litter.jpg" alt="Product 2">
      <h3>30  Liter Water Can</h3>
      <p>30 Ltr</p>
      <span>90 Taka</span>
      <button>Add to Cart</button>
    </div>

    <!-- Product 3 -->
    <div class="product">
      <img src="frontend/img/40 litter.jpg" alt="Product 3">
      <h3>40 Liter Water Can</h3>
      <p>40 Ltr</p>
      <span>110Taka</span>
      <button>Add to Cart</button>
    </div>
    <!-- Product 4 -->
    <div class="product">
      <img src="frontend/img/1litter.jpg" alt="Product 3">
      <h3>1 liter Water Bottles</h3>
      <p>Case Of 9 Bottles</p>
      <span>225 Taka</span>
      <button>Add to Cart</button>
    </div>
    <div class="show-all-products">
      <a href="products.php">
        <button>Show All Products</button>
      </a>
    </div>
  </section>

  <!-- Stay Hydrated and Stay Fresh section -->
  <section class="stay-hydrated-section">
    <h2>Stay Hydrated and Stay Fresh – Throughout the Day!</h2>
    <p>
      With the world now purchasing everything online, we at Bisleri have made sure we have adapted with the times and started our very own Bisleri@doorstep platform to buy all our products, including mineral water and natural Spring Water online. Now, from the comfort of your sofa, you may order any of our products online. They will be delivered to your doorstep ensuring you remain indoors and safe.
    </p>
    <p>
      Sounds interesting? Well, it sure is.
    </p>
    <p>
      We offer online purchase and home delivery options in all major metro cities across India. Choose from a wide range of exclusive Bisleri products such as Bisleri Mineral Water, Vedica, Club Soda, Fonzo, Limonata, Spyci, hand sanitizers and so on.
    </p>
    <p>
      Here are three simple steps to avail the bisleri@doorstep service from the comfort of your own home:
    </p>
    <ol>
      <li>Select a product of your choice from our range of products.</li>
      <li>Select a plan - either a one-time delivery or subscription with Bisleri@doorstep and avail discounts.</li>
      <li>Get your order delivered at your home doorstep.</li>
    </ol>
  </section>

<

<!-- JavaScript -->
 <?php
    include('footer.php');
    ?>
</body>
</html>
