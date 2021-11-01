<?php
session_start();
include "checkout3_retrieve.php"
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>StickiesUK</title>
    <link rel="stylesheet" href="theme.css">
    <script type="text/javascript" src="checkout3_newaddress.js"></script>
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
  <!--sub-navigation menu-->
    <nav class="sub-navigation">
      <ul>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="#">></a></li>
        <li><a href="checkout.php">Information</a></li>
        <li><a href="#">></a></li>
        <li><a href="checkout2.php">Shipping</a></li>
        <li><a href="#">></a></li>
        <li><a class="active" href="checkout3.php">Payment</a></li>
        <li><a href="#">></a></li>
        <li><a href="#">Order Confirmation</a></li>
      </ul>
    </nav>
  <h1>Checkout</h1>
  <div class="container">
    <div class="right">
      <h3>Your Cart Items</h3>
      <table width="90%">
        <tr>
          <td><i>Shipping</i></td>
          <td style="float:right;"><?php retrieve_shipping($id) ?></td>
        </tr>
      </table>

    </div>
    <div class="left">
      <form class="contact-form" action="checkout3_validate.php" method="post">
        <h3>Payment</h3>
        <div class="form-group">
          <label for="cardname">Name on card *</label>
          <input type="text" name="cardname" required placeholder="Enter your name on card">
        </div>
        <div class="form-group">
          <label for="cardnumber">Card number *</label>
          <input type="text" id="cardnumber" required placeholder="Enter your card number" onkeypress="validatecard(event)">
        </div>
        <div class="form-group" style="display:flex;">
          <div style="width:47%; margin-right:25px">
            <label for="expirationdate">Expiration date *</label>
            <input type="date" name="Date" id="date" required onclick="validateDate()">
          </div>
          <div style="width:48%; float:right">
            <label for="CVV">CVV *</label>
            <input type="password" name="CVV" required placeholder="Enter your CVV">
          </div>
        </div>
        <br>
        <h3>Billing Address</h3>
        <table class="table3">
          <tr>
            <td><input type="radio" name="billing" id="samecheck" checked></td>
            <td><label for="billing">Same as shipping address</label></td>
          </tr>
          <tr>
            <td><input type="radio" name="billing" id="differentcheck" onclick="TestsFunction()"></td>
            <td><label for="billing"> Different from shipping address</label></td>
          </tr>
          <tr>
            <td></td>
            <td><div id="TestsDiv" style="display:none; line-height:20px; width:90%">
              <form action="checkout3_validate.php" method="post">
                <label for="new_address"><b>Billing Address</b></label>
                <input style="width:100%; height:30px; padding:5px;" type="text" name="billing_address" id="billing_address" placeholder="Enter your address"><br><br>
                <label for="new_zip"><b>Zip Code</b></label>
                <input style="width:100%; height:30px;padding:5px;" type="text" name="billing_zip" id="billing_zip" placeholder="Enter your zip code">
                <br><br>
                <!--div class="submit-cancel" style="text-align:right" >
                  <input style="background-color:black;color:white;border-radius:7px; margin-bottom:10px; width:35%; height:30px;" type="submit" name="Submit" value="Submit">
                </div-->
              </form>
            </div></td>
          </tr>
        </table>
        <div class="submit-group" style="display:flex">
          <input type="submit" value="Confirm Order">
          <a style="padding-top:30px; color:black; text-decoration:none;" href="checkout2.php">Return to Shipping</a>
        </div>
      </form>
      <script type="text/javascript" src="checkout3_validate.js"></script>
      </div>
    </div>
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
