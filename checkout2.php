<?php
session_start();
// require_once("dbcontroller.php");
// $db_handle = new DBController();

include "checkout2_retrieve.php";


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
  <script type="text/javascript" src="checkout2_validate.js">  </script>
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
  <!--right column of the page-->
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
          <tr>
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
  <td colspan="1" align="right">Sub-total:</td>
  <td align="right"><?php echo $total_quantity; ?></td>
  <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
  </tr>

   
  <tr > 
    <div id="shipping-option">
      <td colspan="1" align="right">Shipping:</td>
      <td align="right" colspan="3"><strong><span id="local-shipping">$3.50</span> <span style="display:none" id="express-shipping">$15.00</span></strong></td>
    </div>
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
          <td style="float:right"><input style="border:none; color:blue; width:75px; text-decoration:underline; background-color: white;" type="button" value="Change"onclick="TestsFunction2()"</td>
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
