<?php
  session_start();
  include "checkout2_retrieve.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>StickiesUK</title>
    <link rel="stylesheet" href="theme.css">
    <script type="text/javascript" src="checkout2_validate.js">  </script>
  </head>
  <body>
  <!--main navigation bar-->
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
      <li><a href="checkout.php">Information</a></li>
      <li><a href="#">></a></li>
      <li><a class="active" href="checkout2.php">Shipping</a></li>
      <li><a href="#">></a></li>
      <li><a href="#">Payment</a></li>
      <li><a href="#">></a></li>
      <li><a href="#">Order Confirmation</a></li>
    </ul>
  </nav>
  <!--main body displaying 2 tables
    1. contact and shipping info, with shipping address editable
    2. shipping method for user to choose from-->
  <h1>Checkout</h1>
  <div class="container">
  <!--right column of the page-->
    <div class="right">
      <h3>Your Cart Items</h3>
      <div id="shipping-option">
        <table width="90%">
          <tr >
            <td><i>Shipping</i></td>
            <td style="float:right"><span id="local-shipping">$3.50</span> <span style="display:none" id="express-shipping">$15.00</span></td>
          </tr>
        </table>

      </div>

    </div>
  <!--left column of the page-->
    <div class="left">
    <!-- top table -->
      <table class="table1">
        <tr>
          <td style="font-weight: bold" width="75px">Contact</td>
          <td><span><?php echo $_SESSION['firstname'].'&nbsp'.$_SESSION['lastname'] ?></span></td>
          <td></td>
        </tr>
        <!--"Ship to row"-->
        <tr>
          <td style="font-weight: bold" width="75px">Ship to</td>
          <td><span><?php insert_new_address($id) ?></span></td>
          <td style="float:right"><input style="border:none; color:blue; width:75px; text-decoration:underline;" type="button" value="Change"onclick="TestsFunction2()"</td>
        </tr>
        <!--display form to change address.
        upon post, form will activate checkout2_validate.php
        which will post input to database table-->
        <tr>
          <td></td>
          <td><div id="TestsDiv2" style="display:none; line-height:20px;">
            <form action="checkout2_validate.php" method="post">
              <label for="new_address"><b>Address</b></label>
              <input style="width:100%; height:30px; padding:5px;" type="text" name="new_address" id="new_address" required placeholder="Enter your address"><br><br>
              <label for="new_zip"><b>Zip Code</b></label>
              <input style="width:100%; height:30px;padding:5px;" type="text" name="new_zip" id="new_zip" required placeholder="Enter your zip code">
              <br><br>
              <div class="submit-cancel" style="text-align:right" >
                <input style="background-color:black;color:white;border-radius:7px; margin-bottom:10px; width:35%; height:30px;" type="submit" name="Submit" value="Submit">
              </div>
            </form>
          </div></td>
        </tr>
      </table>
    </form>
    <!-- second form for shipping method
    on post, activates "insert_shipping_info.php"
    shipping value will be posted to table in database.
    this is important in calculating total cost later.-->
    <h3>Shipping Method</h3>
    <form action="insert_shipping_info.php" method="post">
      <table class="table2">
        <tr>
          <td><input type="radio" checked name="shipping" id="method1" value="3.50" onclick="ShippingOption(1)"><label>Local Courier</label></td>
          <td>$3.50</td>
        </tr>
        <tr>
          <td><input type="radio" name="shipping" id="method2" value="15" onclick="ShippingOption(2)"><label>1-Day Express Shipping</label></td>
          <td>$15.00</td>
        </tr>
      </table>
      <br>
      <div class="submit-group" style="display:flex">
        <input type="submit" value="Continue to Payment">
        <a style="padding-top:30px; color:black;text-decoration:none;" href="checkout.php">Return to Information</a>
      </div>
      </form>
      </div>
    </div>
    </div>
  </div>
  <!-- footer beings here -->
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
