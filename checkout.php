<?php
session_start();
// require_once("dbcontroller.php");
// $db_handle = new DBController();


if(!empty($_GET["action"])) { //if $_GET["action"] is not empty i.e. user has executed an action
	// Uses switch control statment to execute actions

switch($_GET["action"]) {

	// ADD TO CART FUNCTION
	case "add":
		// Product ID and Qty is passed into PHP

		if(!empty($_POST["quantity"])) { // if quantity is not empty
			
			// $productByCode is an array which is the row of the selected product code/id
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");  
			
      // $itemArray is the product you added into cart
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) { //if cart is not empty
        // check if the product selected is already inside
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) { 
          // foreach item in cart
					foreach($_SESSION["cart_item"] as $k => $v) {
              // if there is a match (i.e. you added an item that's already inside)
							if($productByCode[0]["code"] == $k) {
                // and if the quantity is empty, then set the quantity == 0
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
                // if quanitity is not empty, then increment by the quanitity that is input by user
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} 
        else { // else, if product you selected is not already inside (and cart is not empty): merge current item array with the empty cart array
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} 
      
      else { // else, if cart is empty: merge current item array with the empty cart array
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;

	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);	//unset this particular item

					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}

	break;

	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
  }
}
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
  <!-- displays the cart on the right hand side of the page.
  cart items are retrieved from cart table -->
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
      <th style="text-align:right;" width="15%">Unit Price</th>
      <th style="text-align:right;" width="15%">Price</th>
      </tr>	
      <?php		
          foreach ($_SESSION["cart_item"] as $item){
              $item_price = $item["quantity"]*$item["price"];
          ?>
              <tr class="body1">
              <td class="h4"><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
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
      <td colspan="1" align="right" class="h4">Sub-total:</td>
      <td align="right"><?php echo $total_quantity; ?></td>
      <td align="right" colspan="3"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>

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


    </div> <!-- end of div class right -->
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

  
  </div>
</body>
</html>
