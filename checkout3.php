<?php
session_start();
// require_once("dbcontroller.php");
// $db_handle = new DBController();
include "checkout3_retrieve.php";

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>StickiesUK</title>
  <link rel="stylesheet" href="theme.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="cart-styles.css">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <script type="text/javascript" src="checkout3_newaddress.js"></script>

</head>

<body>
  <div class="checkout-wrapper">
  <div class="page-title">
      <h1>Checkout</h1>
  </div>
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
  <div class="container">
    <div class="right">
    <div id="shopping-cart">

        <?php
        if(isset($_SESSION["cart_item"])){
            $total_quantity = 0;
            $total_price = 0;
        ?>	
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
        <tr>
        <th style="text-align:left;">Name</th>
        <th style="text-align:right;" width="5%">Quantity</th>
        <th style="text-align:right;" width="10%">Unit Price</th>
        <th style="text-align:right;" width="10%">Price</th>
        </tr>	
  <?php		
      foreach ($_SESSION["cart_item"] as $item){
          $item_price = $item["quantity"]*$item["price"];
      ?>
          <tr>
          <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
          <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
          <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
          <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
          </tr>
          <?php
          $total_quantity += $item["quantity"];
          $total_price += ($item["price"]*$item["quantity"]);
      }
      ?>

  <tr>
  <td colspan="1" align="right">Sub-total:</td>
  <td align="right"><?php echo $total_quantity; ?></td>
  <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
  </tr>

   
  <tr > 
    <div id="shipping-option">
      <td colspan="1" align="right">Shipping:</td>
      <td align="right" colspan="3"><strong>$<?php echo number_format(retrieve_shipping($id),2); ?>  </strong></td>  <!-- This function is found in checkout3_retrieve.php -->
    </div>
  </tr>

  <tr > 
    <td colspan="1" align="right">Total Cost:</td>
    <td align="right" colspan="3"><strong>
      <?php 
        $shipping_price = retrieve_shipping($id);
        echo "$".number_format($shipping_price + $total_price, 2);
      ?>
    </strong></td>
  </tr>

  </tbody>
  </table>		
    <?php
  } 
  else {
  ?>
  <div class="no-records">Your Cart is Empty</div>
  <?php 
  }
  ?>
</div> <!-- end of div id=shopping-cart -->

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
          <input type="submit" value="Confirm & Pay">
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
