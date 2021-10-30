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
      <li><a class="active" href="checkout.html">Information</a></li>
      <li><a href="#">></a></li>
      <li><a href="#">Shipping</a></li>
      <li><a href="#">></a></li>
      <li><a href="#">Payment</a></li>
      <li><a href="#">></a></li>
      <li><a href="#">Order Confirmation</a></li>
    </ul>
  </nav>
  <h1>Checkout</h1>
  <div class="container">
    <div class="right">
      <table>
        <tr>
          <td>Items in Cart</td>
          <td></td>
          <td>Quantity</td>
          <td>Subtotal</td>
        </tr>
      </table>
      <hr>
      <table>

      </table>
    </div>
    <div class="left">
      <form class="contact-form" action="checkout_validate.php" method="GET">
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
            <input type="text" name="firstname" id="name" required placeholder="First name">
          </div>
          <div style="width:50%; float:right">
            <label for="lastname">Last name *</label>
            <input type="text" name="lastname" required placeholder="Last name">
          </div>
        </div>
        <div class="form-group">
          <label for="address">Address *</label>
          <input type="text" name="address" required placeholder="Enter your address">
        </div>
        <div class="form-group">
          <label for="address2">Apartment, suite, etc. (Optional)</label>
          <input type="text" name="address" placeholder="Apartment, suite, etc.">
        </div>
        <div class="form-group" style="display:flex;">
          <div style="width:50%; margin-right:25px">
            <label for="country">Country *</label>
            <select id="country" name="country" required>
              <option value="Singapore">Singapore</option>
              <option value="Malaysia">Malaysia</option>
              <option value="USA">USA</option>
            </select>
          </div>
          <div style="width:50%; float:right">
            <label for="zip">Zip code *</label>
            <input type="text" name="zip" required placeholder="Enter your zip code">
          </div>
        </div>
        <div class="form-group">
          <label for="phone">Phone number (Optional)</label>
          <input type="tel" name="phone" placeholder="Enter your phone number">
        </div>
        <div class="submit-group" style="display:flex">
          <input style="background-color:black; border-radius:7px; color:white; width:175px; margin-right:15px" type="submit" value="Continue to Shipping">
          <a style="padding-top:20px" href="cart.html">Return to Cart</a>
        </div>
      </form>
      </div>
    </div>
    </div>
  </div>
  </body>
</html>
