<?php
session_start();
// require_once("dbcontroller.php");
// $db_handle = new DBController();
include "checkout4_retrieve.php";
include "checkout3_retrieve.php";

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
  <!-- Nav Bar -->
  <nav>
    <div class="navigation">
        <!-- Logo -->
        <a href="index.php" class="logo">
            <img src="images/logo-black.png"/>
        </a>
        <ul class="menu">
            <li><a href="index.php?action=empty">Home</a></li>
            <li><a>Shop<span><i class='bx bx-chevron-down'></i></span></a>
                <ul>
                  <li><a href="shop/shop-all.php?action=empty">Shop All</a></li>
                  <li><a href="shop/florals-botanicals.php?action=empty">Florals & Botanicals</a></li>
                  <li><a href="shop/glitter.php?action=empty">Glitter</a></li>
                  <li><a href="shop/minimalist.php?action=empty">Minimalist</a></li>
                </ul>
            </li>
            <!-- Shop Categories Sub-Menu -->
            <li><a href="sale.php?action=empty">Sale</a></li>
        </ul>
        <div class="right-cart">
            <a href="cart.php?action=empty">
                <!-- Cart Icon -->
                <i class='bx bx-cart sm'></i>
                <span class="h4 cart-number">0</span>

            </a>
      </div>
    </div>
  </nav>
  <div class="confirm-wrapper">
  <div class="page-title">
      <h1>That's a Wrap!</h1>
  </div>
  <!--sub-navigation bar for checkout page-->

    <div class="final-main" style="text-align:center">
      <p>Hi <b><?php retrieve_name($id) ?></b>, thank you for supporting a small local business!
        Your order is confirmed, and an email has been sent to <b><?php retrieve_email($id) ?></b>. We will notify you when your order has been shipped out.</p>
      <h4 style="text-align:left; font-weight:bold;">Your Order<span id="OrderID"></span>
      </h4>
      <!-- insert the cart here  -->
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
          <td style="text-align:left;"><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
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
      <td align="right" colspan="3"><strong>$<?php echo retrieve_shipping($id); ?>  </strong></td>  <!-- This function is found in checkout3_retrieve.php -->
    </div>
  </tr>

  <tr >
    <td colspan="1" align="right">Total Cost:</td>
    <td align="right" colspan="3"><strong>
      <?php
        $shipping_price = retrieve_shipping($id);
        //$total_cart = number_format($total_price,2) + $shipping_price;
        echo "$".number_format($shipping_price + $total_price, 2);
        //echo "$ ".number_format($total_cart, 2);
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

      <!-- display customer information retrieved from database -->
      <h4 style="text-align:left; font-weight:bold;">Customer Information</h4>
      <div class="final-right">
        <b>Billing Address</b><br>
        <?php retrieve_name($id) ?><br>
        <?php retrieve_billing_address($id) ?><br>
        <?php retrieve_billing_zip($id) ?><br>
        <?php echo $_SESSION['country']; ?><br><br>
      </div>
      <div class="final-left">
        <b>Shipping Address</b><br>
        <?php retrieve_name($id) ?><br>
        <?php retrieve_address($id) ?>
        <?php retrieve_suite($id) ?><br>
        <?php retrieve_zip($id) ?><br>
        <?php echo $_SESSION['country']; ?>
      </div>


      <!-- exit button; continue shopping. directs back to home page  -->
      <div class="submit-group" style="text-align:center">
        <input type="button" onclick="location.href='index.php?action=empty';"value="Continue Shopping">
				<?php
					session_start();
					unset($_SESSION['email']);
					unset($_SESSION['firstname']);
					unset($_SESSION['lastname']);
					unset($_SESSION['address']);
					unset($_SESSION['country']);
					unset($_SESSION['zip']);
					unset($_SESSION['suite']);
					unset($_SESSION['method']);
					unset($_SESSION['price']);
			 	?>
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
