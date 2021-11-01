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
			
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
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
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
  }
}
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>StickiesUK</title>
    <link rel="stylesheet" href="theme.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
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

    <div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><i class='bx bx-trash'></i></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
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
  </body>
</html>
