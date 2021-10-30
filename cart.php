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
        <li><a class="active" href="cart.html">Cart</a></li>
        <li><a href="#">></a></li>
        <li><a href="#">Information</a></li>
        <li><a href="#">></a></li>
        <li><a href="#">Shipping</a></li>
        <li><a href="#">></a></li>
        <li><a href="#">Payment</a></li>
        <li><a href="#">></a></li>
        <li><a href="#">Order Confirmation</a></li>
      </ul>
    </nav>
    <div class="main">
      <h1>Shopping Cart</h1>
      <div style="padding-left:20px; padding-right:20px">
        <table class="cart-table" style="padding-left:50px" width="100%">
          <tr style="font-weight:bold; border-bottom: solid black 2pt;">
            <td width="55%">Product</td>
            <td width="17.5%">Quantity</td>
            <td width="17.5%">Total</td>
            <td></td>
          </tr>
          <tr class="user-order" style="border-bottom: solid gray 1pt">
            <td>sample</td>
            <td>sample</td>
            <td>sample</td>
            <td>trash icon</td>
          </tr>
        </table>
        <br>
        <br>
      </div>
      <div class="nextpage" style="text-align:right">
        <form class="" action="checkout.html" method="post">
          <input type="checkbox" required name="accept" id="checkbox">
          <label style="padding-right:20px" for="accept"> I accept the <a href="index.html" style="color:black;">terms and conditions</a></label><br><br>
          <input style="background-color:black; border-radius:7px; color:white; height:35px; width:250px; margin-right:15px" type="submit" value="Proceed to Checkout">
        </form>
      </div>
      </div>
    </div>
  </body>
</html>
