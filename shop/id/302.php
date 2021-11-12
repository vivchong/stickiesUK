<?php
session_start();

require_once("../../dbcontroller.php");
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
<title>StickiesUK - Space Odyssey</title>
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
                        <li><a href="../shop-all.php">Shop All</a></li>
                        <li><a href="../florals-botanicals.php">Florals & Botanicals</a></li>
                        <li><a href="../glitter.php">Glitter</a></li>
                        <li><a href="../minimalist.php">Minimalist</a></li>
                    </ul>
                </li>
                <!-- Shop Categories Sub-Menu -->
                <li><a href="../../sale.php">Sale</a></li>
            </ul>
            <div class="right-cart">
                <a href="../../cart.php">
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

    <!-- Page Wrapper -->
    <div class="product-page">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs caption1">
            <a href ="../../index.php" class="prev">Home</a>
            <i class='bx bx-chevron-right bx-xs prev'></i>
            <a href ="../florals-botanicals.php" class="prev">Florals and Botanicals</a>
            <i class='bx bx-chevron-right bx-xs prev'></i>
            <a href ="#" class="current">Space Odyssey</a>
        </div>

        <!-- Product Overview: 2 column flexbox  -->
        <div class="product-overview">
            <!-- Left: Carousel -->
            <div class="carousel">
                <div class="carousel__item"><img src="../../images/category/302.png"/></div>
                <div class="carousel__item"><img src="../../images/category/302-2.png"/></div>
                <div class="carousel__item"><img src="../../images/category/000.png"/></div>

                <div class ="carousel__nav"> 
                    <span class="carousel__button"><img src="../../images/category/302.png"/></span>
                    <span class="carousel__button"><img src="../../images/category/302-2.png"/></span>
                    <span class="carousel__button"><img src="../../images/category/000.png"/></span>
                </div>
            </div>
            <!-- Right: Name, Price, Qty input, Add to Cart, Description -->
            <div class="product-details">
                <h2>Space Odyssey</h2>
                <div class="price subhead1">$15.00</div>
                
                <!-- ADD TO CART -->
                <?php
		            $product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC"); // Array of products ordered by id
                    if (!empty($product_array)) { 
                        foreach($product_array as $key=>$value){
                        }
                    }
                ?>
                <!-- Need to change this url here v -->
                <form method="post" action="302.php?action=add&code=302"> <!-- action == `add` & gets code of product added to cart -->
                        <!-- CART BUTTON -->
                        <div class="cart-action">
                            <div class="qty-field">
                                <label for="qty" class="subhead1">Quantity</label><br>
                                <input type="number" name="quantity" min="1" max="5" value="1" class="product-quantity"> <!-- quantity is passed -->
                            </div>
                            <input type="submit" value="Add to Cart" class="pri-auto-btn" /> <!-- execute script which passes product ProductID and qty to backend PHP script-->
                        </div>
				</form>
        

                <div class="description body2">
                    <div class="subhead1">Description</div>
                    Bursting with the lightness of spring, Space Odyssey is a fun set that beckons us to have the best manicure whenever life gives us lemons! Set on a base of negative space, Space Odyssey is so impossibly summer-appropriate, it couldn't have us more in the mood for a holiday!
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
