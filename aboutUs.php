<?php
include('login_check.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="frontend/style.css"> -->
        <link rel="stylesheet" href="frontend/cart.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="frontend/plugins/fontawesome-free/css/all.min.css">
    
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./frontend/aboutus.css">
    <title>About Us - Water Selling</title>
</head>
<body>
 <?php
  include('header.php');
  ?>

    <main>
        <section class="motto">
            <h1>Welcome To AQUA DROPS</h1>
            <p>
                Welcome to AQUA DROPS! Your ultimate destination for premium water bottles delivered right to your doorstep. At AQUA DROPS, we understand the importance of staying hydrated on-the-go, which is why we offer an extensive range of water bottle sizes to cater to your every need. Whether you're headed to the gym, the office, or on a grand adventure, our collection has something for everyone. What sets us apart is our commitment to exceptional service – with our lightning-fast delivery within an hour, you won't have to wait long to quench your thirst. Join us in embracing a healthier lifestyle, one refreshing sip at a time.
                Discover convenience, quality, and hydration like never before with AQUA DROPS!</p>
        </section>

        <section class="collaborators">
            <h2>Meet Our Collaborators</h2>
            <div class="teammate">
                <img src="frontend/img/tanmoy.jpg" alt="Teammate 1" style="width: 180px;">
                <h3>Tanmoy Bhowmick</h3>
                <p>Co-Founder</p>
            </div>
            <div class="teammate">
                <img src="frontend/img/bonni.jpg" alt="Teammate 1" style="width: 180px;">

                <h3>Bonni Basak</h3>
                <p>Marketing Director</p>
            </div>
            <div class="teammate">
                <img src="frontend/img/dilan.jpg" alt="Teammate 1" style="width: 180px;">

                <h3>Farhan</h3>
                <p>Operations Manager</p>
            </div>
            <div class="teammate">
                <img src="frontend/img/shohan.png" alt="Teammate 1" style="width: 180px;">

                <h3>Shohan</h3>
                <p>System Director</p>
            </div>
        </section>
        <section class="contact-form">
            <h2>Contact Us</h2>
            <form method="POST" action="submit_contact.php">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
        </section>



        <section class="motto">
            <h1>Our Company Motto</h1>
            <p>We are dedicated to providing clean and refreshing water to our customers, ensuring their health and well-being.</p>
        </section>
    </main>

    <?php 
        include('footer.php');
        ?>
</body>
</html>
