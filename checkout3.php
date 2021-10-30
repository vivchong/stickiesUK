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
      <nav class="navigation-bar">
        <ul>
          <li><a href="index.html"><img class="logo" src="logo.png"> </li>
          <li><a href="index.html">Home</a></li>
          <li><a href="shop.html">Shop</a></li>
          <li><a href="sale.html">Sale</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
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
      <li><a class="active" href="checkout3.php">Payment</a></li>
      <li><a href="#">></a></li>
      <li><a href="#">Order Confirmation</a></li>
    </ul>
  </nav>
  <h1>Checkout</h1>
  <div class="container">
    <div class="right">
      <h3>Your Cart Items</h3>

    </div>
    <div class="left">
      <form class="contact-form" action="checkout4.html" method="post">
        <h3>Payment</h3>
        <div class="form-group">
          <label for="cardname">Name on Card *</label>
          <input type="text" name="cardname" required placeholder="Enter your name on card">
        </div>
        <div class="form-group">
          <label for="cardnumber">Card Number *</label>
          <input type="text" name="cardnumber" required placeholder="Enter your card number">
        </div>
        <div class="form-group" style="display:flex;">
          <div style="width:47%; margin-right:25px">
            <label for="expirationdate">Expiration Date *</label>
            <input type="date" name="Date" required>
          </div>
          <div style="width:48%; float:right">
            <label for="CVV">CVV *</label>
            <input type="password" name="CVV" required placeholder="Enter your CVV">
          </div>
        </div>
        <h3>Billing Address</h3>
        <table class="table1">
          <tr>
            <td width="30px"><input style="margin-bottom:5px" type="radio" name="shipping" value="same"></td>
            <td>Same as shipping address</td>
          </tr>
          <tr>
            <td width="30px"><input style="margin-bottom:5px" type="radio" name="shipping" value="different"></td>
            <td>Different from shipping address</td>
          </tr>
        </table>
        <br>
        <div class="submit-group" style="display:flex">
          <input style="background-color:black; border-radius:7px; color:white; width:175px; margin-right:15px" type="submit" value="Confirm Order">
          <a style="padding-top:20px" href="cart.html">Return to Payment</a>
        </div>
      </form>
      </div>
    </div>
    </div>
  </div>
  </body>
</html>
