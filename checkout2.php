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
      <li><a class="active" href="checkout2.php">Shipping</a></li>
      <li><a href="#">></a></li>
      <li><a href="#">Payment</a></li>
      <li><a href="#">></a></li>
      <li><a href="#">Order Confirmation</a></li>
    </ul>
  </nav>
  <h1>Checkout</h1>
  <div class="container">
    <div class="right">
      <h3>Your Cart Items</h3>

    </div>
    <div class="border">

    </div>
    <div class="left">
    <form action="checkout3.html" method="post">
      <table class="table1" style="padding-left:10px">
        <tr>
          <td width="75px">Contact</td>
          <td>valerie</td>
          <td width="75px">change</td>
        </tr>
        <tr>
          <td width="75px">Ship to</td>
          <td>valerie</td>
          <td width="75px">change</td>
        </tr>
      </table>
      <h3>Shipping Method</h3>
      <table class="table1">
        <tr>
          <td width="30px"><input style="margin-bottom:5px" checked type="radio" name="method" value="local"></td>
          <td>Local Courier</td>
          <td width="75px">$3.50</td>
        </tr>
        <tr>
          <td width="30px"><input style="margin-bottom:5px" type="radio" name="method" value="express"></td>
          <td>1-Day Express Shipping</td>
          <td width="75px">$15.00</td>
        </tr>
      </table>
      <br>
      <div class="submit-group" style="display:flex">
        <input style="background-color:black; border-radius:7px; color:white; width:165px; margin-right:15px" type="submit" value="Continue to Payment">
        <a style="padding-top:20px" href="checkout.html">Return to Information</a>
      </div>
      </form>
      </div>
    </div>
    </div>
  </div>
  </body>
</html>
