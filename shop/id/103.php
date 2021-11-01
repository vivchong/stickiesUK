<?php
session_start();
//include("dbcontroller.php");
//require_once("dbcontroller.php");
//$db_handle = new DBController();


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
<title>StickiesUK - Summer Lemonade</title>
<link rel="stylesheet" href="../../styles.css" type="text/css"/>
<link rel="stylesheet" href="../shop-styles.css">
<!-- Fav icon -->
<link rel="shortcut icon" href="../../images/fav-icon.png">
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
            <a href="../../index.php" class="logo">
                <img src="../../images/logo-black.png"/>
            </a>
            <ul class="menu">
                <li><a href="../../index.php">Home</a></li>
                <li><a>Shop<span><i class='bx bx-chevron-down'></i></span></a>
                    <ul>
                        <li><a href="../shop/shop-all.php">Shop All</a></li>
                        <li><a href="../shop/florals-botanicals.php">Florals & Botanicals</a></li>
                        <li><a href="../shop/glitter.php">Glitter</a></li>
                        <li><a href="../shop/minimalist.php">Minimalist</a></li>
                    </ul>
                </li>
                <!-- Shop Categories Sub-Menu -->
                <li><a href="../../sale.php">Sale</a></li>
                <li><a href="../../contact-us.php">Contact us</a></li>
            </ul>
            <div class="right-cart">
                <a href="../../cart.php">
                    <!-- Cart Icon -->
                    <i class='bx bx-cart sm'></i>
                    <!-- Number of products in cart -->
                    <span class="h4 cart-number">0</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Page Wrapper -->
    <div class="product-page">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs caption1">
            <a href ="../../index.php" class="prev">Home</a>
            <i class='bx bx-chevron-right bx-xs prev'></i>
            <a href ="../florals-botanicals.php" class="prev">Florals and Botanicals</a>
            <i class='bx bx-chevron-right bx-xs prev'></i>
            <a href ="#" class="current">Summer Lemonade</a>
        </div>

        <!-- Product Overview: 2 column flexbox  -->
        <div class="product-overview">
            <!-- Left: Carousel -->
            <div class="carousel">
                <div class="carousel__item"><img src="../../images/category/103.png"/></div>
                <div class="carousel__item"><img src="../../images/category/103-2.png"/></div>
                <div class="carousel__item"><img src="../../images/category/000.png"/></div>

                <div class ="carousel__nav"> 
                    <span class="carousel__button"><img src="../../images/category/103.png"/></span>
                    <span class="carousel__button"><img src="../../images/category/103-2.png"/></span>
                    <span class="carousel__button"><img src="../../images/category/000.png"/></span>
                </div>
            </div>
            <!-- Right: Name, Price, Qty input, Add to Cart, Description -->
            <div class="product-details">
                <h2>Summer Lemonade</h2>
                <div class="price subhead1">$15.00</div>

                <!-- <form method="post" action="103.php?action=add&code=< ?php echo $product_array[$key]["code"]; ?>">
                    
                    <input type="submit" class="pri-auto-btn" value="Add to cart">
                </form> -->
                
                <form method="post" action="103.php?action=add&ProductID=<?php echo $product_array[$key]["ProductID"]; ?>"> <!-- action == `add` & gets ProductID of product added to cart -->
                        <!-- CART BUTTON -->
                        <div class="cart-action">
                            <div class="qty-field">
                                <label for="qty" class="subhead1">Quantity</label><br>
                                <input type="number" name="quantity" min="1" max="5" value="1" class="product-quantity"> <!-- quantity is passed -->
                            </div>
                            <input type="submit" value="Add to Cart" class="pri-auto-btn" /> <!-- execute script which passes product ProductID and qty to backend PHP script-->
                        </div>
                    </div>
				</form>

                <div class="description body2">
                    <div class="subhead1">Description</div>
                    Bursting with the lightness of spring, Summer Lemonade is a fun set that beckons us to have the best manicure whenever life gives us lemons! Set on a base of negative space, Summer Lemonade is so impossibly summer-appropriate, it couldn't have us more in the mood for a holiday!
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="left body2">
            <!-- Logo -->
            <a href="../../index.php" class="logo">
                <img src="../../images/logo-white.png"/>
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
                <li><a href="../shop-all.php">Shop All</a></li>
                <li><a href="../florals-botanicals.php">Florals and Botanicals</a></li>
                <li><a href="../glitter.php">Glitter</a></li>
                <li><a href="../minimalist.php">Minimalist</a></li>
                <li><a href="../../sale.php">Sale</a></li>
            </ul>
        </div>
    
        <div class="sitemap body2">
            <div class="body2">
                Information
            </div>
            <ul>
                <li><a href="../../contact-us.php">Contact Us</a></li>
            </ul>
        </div>
    
    </footer>



</body>
</html>
