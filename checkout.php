<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>StickiesUK</title>
    <link rel="stylesheet" href="theme.css">
  </head>
  <body>
  <!--header with main navigation bar, "home" "shop" "sale" "contact us"-->
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
  <!--sub-navigation bar for checkout page-->
  <nav class="sub-navigation">
    <ul>
      <li><a href="cart.php">Cart</a></li>
      <li><a href="#">></a></li>
      <li><a class="active" href="checkout.php">Information</a></li>
      <li><a href="#">></a></li>
      <li><a href="#">Shipping</a></li>
      <li><a href="#">></a></li>
      <li><a href="#">Payment</a></li>
      <li><a href="#">></a></li>
      <li><a href="#">Order Confirmation</a></li>
    </ul>
  </nav>
  <!-- main body begins here-->
  <h1>Checkout</h1>
  <div class="container">
  <!-- displays the cart on the right hand side of the page.
  cart items are retrieved from cart table -->
    <div class="right">
      <table>
        Replace with table

      </table>
    </div>
  <!-- displays the forms in the contact page

    the entire form is given class = "contact form" so that its style
    can be modified in CSS script

    each div is given class = "form-group" for formatting in CSS script

    form action = "insert_cust_info.php"
      retrieves customer information from database
      form method = POST, to post to session -->
    <div class="left">
      <form class="contact-form" action="insert_cust_info.php" method="POST">
        <h3>Contact Information</h3>
        <div class="form-group">
          <label for="email">Email *</label>
          <input type="email" name="email" id="email" required placeholder="Enter your email address">
        </div>
        <br>
        <h3>Shipping Information</h3>
        <div class="form-group" style="display:flex;">
          <div style="width:50%; margin-right:25px">
            <label for="firstname">First name *</label>
            <input type="text" name="firstname" id="firstname" required placeholder="First name">
          </div>
          <div style="width:50%; float:right">
            <label for="lastname">Last name *</label>
            <input type="text" name="lastname" id="lastname" required placeholder="Last name">
          </div>
        </div>
        <div class="form-group">
          <label for="address">Address *</label>
          <input type="text" name="address" id="address" required placeholder="Enter your address">
        </div>
        <div class="form-group">
          <label for="address2">Apartment, suite, etc. (Optional)</label>
          <input type="text" name="suite" id="suite" placeholder="Apartment, suite, etc.">
        </div>
        <div class="form-group" style="display:flex;">
          <div style="width:50%; margin-right:25px">
            <label for="country">Country *</label><br>
            <select id="country" name="country" required>
              <option value="Singapore">Singapore</option>
              <option value="Malaysia">Malaysia</option>
              <option value="USA">USA</option>
            </select>
          </div>
          <div style="width:50%; float:right">
            <label for="zip">Zip code *</label>
            <input type="text" id="zip" name="zip" required placeholder="Enter your zip code">
          </div>
        </div>
        <div class="form-group">
          <label for="phone">Phone number (Optional)</label>
          <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" onkeypress="validatecard(event)">
        </div>
        <div class="submit-group" style="display:flex">
          <input type="submit" value="Continue to Shipping">
          <a style="color:black;text-decoration: none;padding-top:30px"href="cart.php">Return to Cart</a>
        </div>
      </form>
      <script type="text/javascript" src="checkout3_validate.js"></script>
      </div>
    <!--end of form -->
    </div>
    </div>
  </div>
  <!--footer begins here -->
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
