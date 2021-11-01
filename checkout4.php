<?php
  session_start();
  include "checkout4_retrieve.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>StickiesUK</title>
    <link rel="stylesheet" href="theme.css">
  </head>
  <body>
  <!--header-->
    <header>
      <nav>
        <div class="navigation">
            <!-- Logo -->
            <a href="#" class="logo">
                <img src="images/logo-black.png"/>
            </a>
            <ul class="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Shop<span><i class='bx bx-chevron-down'></i></span></a>
                    <ul>
                        <li><a href="shop/shop-all.html">Shop All</a></li>
                        <li><a href="shop/florals-botanicals.html">Florals & Botanicals</a></li>
                        <li><a href="shop/glitter.html">Glitter</a></li>
                        <li><a href="shop/minimalist.html">Minimalist</a></li>
                    </ul>
                </li>
                <!-- Shop Categories Sub-Menu -->
                <li><a href="sale.html">Sale</a></li>
                <li><a href="contact-us.html">Contact us</a></li>
            </ul>
            <div class="right-cart">
                <a href="#">
                    <!-- Cart Icon -->
                    <i class='bx bx-cart'></i>
                        <!-- Number of items in cart -->
                        <span id="cart-number" class="h4">0</span>
                </a>
            </div>
        </div>
      </nav>
    </header>
  <!--body-->
  <nav class="sub-navigation">
    <ul>
      <li><a href="cart.php">Cart</a></li>
      <li><a href="#">></a></li>
      <li><a href="checkout.php">Information</a></li>
      <li><a href="#">></a></li>
      <li><a href="checkout2.php">Shipping</a></li>
      <li><a href="#">></a></li>
      <li><a href="checkout3.php">Payment</a></li>
      <li><a href="#">></a></li>
      <li><a class="active" href="checkout4.php">Order Confirmation</a></li>
    </ul>
  </nav>
    <div class="final-main" style="text-align:center">
      <h1>That's a Wrap!</h1>
      <p>Hi <b><?php retrieve_name($id) ?></b>, thank you for supporting a small local business!
        Your order is confirmed, and an email has been sent to <b><?php retrieve_email($id) ?></b>. We will notify you when your order has been shipped out.</p>
      <h4 style="text-align:left; font-weight:bold;">Order #<span id="OrderID"></span>
      </h4>
      <!-- insert the cart here  -->
      <!-- display customer information retrieved from database -->
      <h4 style="text-align:left; font-weight:bold;">Customer Information</h4>
      <div class="final-right">
        <b>Billing Address</b><br>
        <?php retrieve_name($id) ?><br>
        <?php retrieve_billing_address($id) ?><br>
        <?php retrieve_billing_zip($id) ?><br>
        <?php echo $_SESSION['country']; ?><br><br>
      </div>
      <div class="final-left">
        <b>Shipping Address</b><br>
        <?php retrieve_name($id) ?><br>
        <?php retrieve_address($id) ?>
        <?php retrieve_suite($id) ?><br>
        <?php retrieve_zip($id) ?><br>
        <?php echo $_SESSION['country']; ?>
      </div>


      <!-- exit button; continue shopping. directs back to home page  -->
      <div class="submit-group" style="text-align:center">
        <input type="button" onclick="location.href='index.html';"value="Continue Shopping">
      </div>
    </div>
    <footer>
      <div class="left body2">
          <!-- Logo -->
          <a href="#" class="logo">
              <img src="images/logo-white.png"/>
          </a>

          <!-- Tagline -->
          <div class="body2">Nails for everyone.</div>

          <!-- Legalese -->
          <div class="legal1">Copyright © 2021, Stickies SG.</div>
      </div>
      <div class="sitemap body2">
          <div class="body2">
              Categories
          </div>
          <ul>
              <li><a href="#">Shop All</a></li>
              <li><a href="#">Florals and Botanicals</a></li>
              <li><a href="#">Glitter</a></li>
              <li><a href="#">Solids</a></li>
              <li><a href="#">Sale</a></li>
          </ul>
      </div>
      <div class="sitemap body2">
          <div class="body2">
              Information
          </div>
          <ul>
              <li><a href="#">Contact Us</a></li>
          </ul>
      </div>
    </footer>

  </body>
</html>
