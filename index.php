<?php
session_start();
include("dbcontroller.php");
require_once("dbcontroller.php");
$db_handle = new DBController();


if(!empty($_GET["action"])) { //if $_GET["action"] is not empty i.e. user has executed an action
	// Uses switch control statment to execute actions

switch($_GET["action"]) {

	// ADD TO CART FUNCTION
	case "add":
		// Product ID and quantity is passed into PHP

		if(!empty($_POST["quantity"])) { // if quantity is not empty
			
			// $productByID is an array which is the row of the selected product ProductID/id
			$productByID = $db_handle->runQuery("SELECT * FROM Catalogue WHERE ProductID='" . $_GET["ProductID"] . "'");  
			
			// itemArray of item that was added to cart
			// itemArray: ProductName, ProductID, quantity, Price, ImageLink
			$itemArray = array($productByID[0]["ProductID"]=>array('ProductName'=>$productByID[0]["ProductName"], 'ProductID'=>$productByID[0]["ProductID"], 'quantity'=>$_POST["quantity"], 'Price'=>$productByID[0]["Price"], 'ImageLink'=>$productByID[0]["ImageLink"]));
			
			if(!empty($_SESSION["cart_item"])) { // if cart already has items in it
				// check if same product is already in cart
				if(in_array($productByID[0]["ProductID"],array_keys($_SESSION["cart_item"]))) { // match
					foreach($_SESSION["cart_item"] as $k => $v) { // for each unique item in cart
						if($productByID[0]["ProductID"] == $k) { // if product ID matches 
							if(empty($_SESSION["cart_item"][$k]["quantity"])) { // if qty = 0 in cart
									$_SESSION["cart_item"][$k]["quantity"] = 0; // set qty = 0
							}
							$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"]; //increment by quantity passed
						}
					}
				} 
				else { // if cart doesn't already have this item, just merge
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else { // if cart is empty
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["ProductID"] == $k)
						unset($_SESSION["cart_item"][$k]);				
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

<html lang="en">
<head>
<meta charset="utf-8">
<title>StickiesUK</title>
<link rel="stylesheet" href="styles.css">
<!-- Fav icon -->
<link rel="shortcut icon" href="images/fav-icon.png">
<!-- Boxicons CSS -->
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!-- Nav Bar -->
    <nav>
        <div class="navigation">
            <!-- Logo -->
            <a href="#" class="logo">
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
                    <i class='bx bx-cart'></i>
                        <!-- Number of products in cart -->
                        <span class="cart-number h4">0</span>

                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Banner -->
    <div class="hero-banner-box hero-slide-1">
        <!-- Hero Banner Text-->
        <div class="hero-banner-text">
            <h1>Welcome!</h1>
        </div>
            <a href="#" class="pri-auto-btn">Shop Now</a>
    </div>

    <!-- Feaured Collection -->
    <div class="featured-collection-section">

        <!-- Section Header  -->
        <div class="text-container-center">
            <div><h2>Featured Collection</h2></div>
            <div class="body1">Spice up your nails with these bold designs that exude personality and class.</div>
        </div>

        <!-- "Grid" of Featured Products -->
        <div class="collection-large">

            <div class="product-large">
                <a href="#" class="img-large">
                    <img src="images/category/101.png"/>
                </a>
               <div class="label">
                    <a href="#">
                        <h3>Floral Symphony</h3>
                        $15.00
                    </a>
               </div>
            </div>

            <div class="product-large">

                <a href="#" class="img-large">
                    <img src="images/category/301.png"/>
                </a>

                <div class="label">
                     <a href="#">
                         <h3>Tangerine Bloom</h3>
                         $15.00
                     </a>
                </div>
            </div>

            <div class="product-large">

                <a href="#" class="img-large">
                    <img src="images/category/102.png"/>
                </a>

                <div class="label">
                     <a href="#">
                         <h3>Beleaf in Yourself</h3>
                         $15.00
                     </a>
                </div>
            </div>

        </div>

        <!-- CTA Button -->
        <a href="shop/shop-all.php" class="pri-stretch-btn">View all</a>
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

<script type="text/javascript">
    /* Fix menu when scrolling DOESN'T WORK. maybe because you used default nav? */

</script>
</body>
</html>