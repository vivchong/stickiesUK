<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_GET["action"])) { //if $_GET["action"] is not empty i.e. user has executed an action
	// Uses switch control statment to execute actions

switch($_GET["action"]) {

	// ADD TO CART FUNCTION
	case "add":
		// Product ID and quantity is passed into PHP

		if(!empty($_POST["quantity"])) { // if quantity is not empty
			
			// $productByCode is an array which is the row of the selected product ProductID/id
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");  
			
			// itemArray of item that was added to cart
			// itemArray: ProductName, ProductID, quantity, Price, ImageLink
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) { // if cart_item (i.e. cart) is NOT empty (i.e. cart already has items in it)
				// check if same product is already in cart, by finding product code in the cart
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) { // check each product in cart
							if($productByCode[0]["code"] == $k) { // if product code of NEW product added matches an EXISTING product in cart
								if(empty($_SESSION["cart_item"][$k]["quantity"])) { // if EXISTING product quanitity is empty (was deleted before)
									$_SESSION["cart_item"][$k]["quantity"] = 0;     // set quanitity to 0
								}

								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"]; // Increment existing quantity with new input quantity
							}
					}
				} 
                else { // if match not found (i.e. user has not added this product before)
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray); // merge cart items array with new itemArray
				}
			}

            else { // if cart is empty (i.e. no items in cart)
				$_SESSION["cart_item"] = $itemArray; 
			}
		}
	break;
    
    // REMOVE FROM CART FUNCTION
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;

    // CLEAR CART FUNCTION
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>

<html lang="en">
<head>
<meta charset="utf-8">
<title>StickiesUK - Cart</title>
<link rel="stylesheet" href="styles.css" type="text/css"/>
<link rel="stylesheet" href="cart-styles.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="cart-styles-flex.css">
<!-- Fav icon -->
<link rel="shortcut icon" href="images/fav-icon.png">
<!-- Boxicons CSS -->
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<!-- JS for carousel -->
<script src="carousel.js" async></script>
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
            <li><a href="index.php">Home</a></li>
            <li><a>Shop<span><i class='bx bx-chevron-down'></i></span></a>
                <ul>
                  <li><a href="shop/shop-all.php">Shop All</a></li>
                  <li><a href="shop/florals-botanicals.php">Florals & Botanicals</a></li>
                  <li><a href="shop/glitter.php">Glitter</a></li>
                  <li><a href="shop/minimalist.php">Minimalist</a></li>
                </ul>
            </li>
            <!-- Shop Categories Sub-Menu -->
            <li><a href="sale.php">Sale</a></li>
            <li><a href="contact-us.php">Contact us</a></li>
        </ul>
        <div class="right-cart">
            <a href="cart.php">
                <!-- Cart Icon -->
                <i class='bx bx-cart sm'></i>
                
                <!-- Number of products in cart -->
                <?php
                    if(isset($_SESSION["cart_item"])){ // if there are items in the cart
                        $total_quantity = 0;
                        $total_price = 0;
                        foreach ($_SESSION["cart_item"] as $item){
                            $total_quantity += $item["quantity"]; // increment quantity in cart
                        }
                    }
                    else { // if cart is empty
                        $total_quantity = 0; // set quantity == 0
                    }
                        
                ?>
                <!-- HTML and echo quantity -->
                <span class="h4 cart-number"><?php echo $total_quantity; ?></span> 
                
            </a>
      </div>
    </div>
  </nav>

   
    
  <div class="cart-wrapper">
    <div class="page-title">
      <h1>Shopping Cart</h1>
    </div>
    
    <!-- <div class="sub-navigation">
      <ul>
        <li><a class="active" href="cart.php">Cart</a></li>
        <li><a href="#">></a></li>
        <li><a href="#">Information</a></li>
        <li><a href="#">></a></li>
        <li><a href="#">Shipping</a></li>
        <li><a href="#">></a></li>
        <li><a href="#">Payment</a></li>
        <li><a href="#">></a></li>
        <li><a href="#">Order Confirmation</a></li>
      </ul>
    </div> -->

    <div id="shopping-cart">
      <a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
      <?php
      if(isset($_SESSION["cart_item"])){
          $total_quantity = 0;
          $total_price = 0;
      ?>	

      <div class="cart-table-header">
        <div class="h4 product-header">Product</div>
        <div class="h4 qty-header">Quantity</div>
        <div class="h4 price-header">Unit Price</div>
        <div class="h4 price-header">Price</div>
        <div class="h4 remove-header">Remove</div>
      </div>

      <div class="cart-table-body">

      <?php		
          foreach ($_SESSION["cart_item"] as $item){
              $item_price = $item["quantity"]*$item["price"];
          ?>
        <div class="cart-row">
          <div class="row-first">
            <div class="row-image"> 
              <img src="<?php echo $item["image"]; ?>" class="row-image" />
            </div>
            <div class="row-name-price">
              <div class="h4"><?php echo $item["name"]; ?></div>
              <div class="body1"><?php echo "$ ".$item["price"]; ?></div>
            </div>
          </div>

          <div class="row-qty">
            <?php echo $item["quantity"]; ?>
          </div>

          <div class="row-price">
            <?php echo "$ ".$item["price"]; ?>
          </div>

          <div class="row-price">
            <?php echo "$ ". number_format($item_price,2); ?>
          </div>

          <div class="row-delete">
            <a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><i class='bx bx-trash'></i></a>
          </div>
        </div>
          <?php
              $total_quantity += $item["quantity"];
              $total_price += ($item["price"]*$item["quantity"]);
          }
          ?>
        <div class="cart-row">
          <div class="row-fist h4">Sub-total:</div>
          <div class="row-qty"><?php echo $total_quantity; ?></div>
          <div class="row-price"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></div>
        </div>

      </div>
      

      
      <table class="tbl-cart" cellpadding="10" cellspacing="1">
      <tbody>
      <tr>
      <th style="text-align:left;"></th>
      <th style="text-align:right;" width="5%"></th>
      <th style="text-align:right;" width="15%"></th>
      <th style="text-align:right;" width="15%"></th>
      <th style="text-align:center;" width="5%"></th>
      </tr>	
      <?php		
          foreach ($_SESSION["cart_item"] as $item){
              $item_price = $item["quantity"]*$item["price"];
          ?>
              <tr class="body1">
              <td class="h4"></td>
              <td style="text-align:right;"></td>
              <td  style="text-align:right;"></td>
              <td  style="text-align:right;"></td>
              <td style="text-align:center;"></td>
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

    </div>

    <div class="checkout-field">
        <form class="" action="checkout.php" method="post">
          
        <div class="checkbox-terms">
          <input type="checkbox" required name="accept" id="checkbox">
          <label style="padding-right:20px" for="accept" class="body1"> I accept the terms and conditions</label>
        </div>

        <input class="checkout-btn" type="submit" value="Proceed to Checkout">
        </form>
      </div>
    </div>
  </div>

  <footer>
    <div class="left body2">
        <!-- Logo -->
        <a href="index.php" class="logo">
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
            <li><a href="shop/shop-all.php">Shop All</a></li>
            <li><a href="shop/florals-botanicals.php">Florals and Botanicals</a></li>
            <li><a href="shop/glitter.php">Glitter</a></li>
            <li><a href="shop/minimalist.php">Minimalist</a></li>
            <li><a href="sale.php">Sale</a></li>
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
</div>
</body>
</html>
