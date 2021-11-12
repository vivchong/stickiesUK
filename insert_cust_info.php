
<?php
  // pass the session variables to be stored
   session_start();
   $_SESSION['email']=$_POST['email'];
   $_SESSION['firstname']=$_POST['firstname'];
   $_SESSION['lastname']=$_POST['lastname'];
   $_SESSION['address']=$_POST['address'];
   $_SESSION['country']=$_POST['country'];
   $_SESSION['zip']=$_POST['zip'];
   $_SESSION['phone']=$_POST['phone'];
   $_SESSION['suite']=$_POST['suite'];
   $_SESSION['method']=$_POST['method'];
   $_SESSION['price']=$_POST['price'];

 ?>

<?php
  // create short variable names
  $Email=$_POST['email'];
  $First_name=$_POST['firstname'];
  $Last_name=$_POST['lastname'];
  $Address=$_POST['address'];
  $City=$_POST['country'];
  $Zipcode=$_POST['zip'];
  $Phone=$_POST['phone'];
  $Suite=$_POST['suite'];
  $method=$_POST['method'];
  $price=$_POST['price'];

  // connect to database
  @ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');
  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  // insert the posted information into table = CustomerInfo
  $query = "INSERT INTO CustomerInfo(Email, First_name, Last_name, Address, Apartment_suite, Zipcode, City, Phone_number, Shipping_Method, Shipping_Price) VALUES
            ('".$Email."', '".$First_name."', '".$Last_name."', '".$Address."','".$Suite."', '".$Zipcode."', '".$City."', '".$Phone."','".$method."','".$price."')";
  $result = $db->query($query);

  if ($result) {
      echo  $db->affected_rows." new customer inserted into database.";
  } else {
  	  echo "An error has occurred.  The customer was not added.";
  }

  $db->close();

// loads the next page within 0 seconds once button is clicked.
header("refresh:0;url=http://192.168.56.2/f32ee/TO%20MERGE/stickiesUK/checkout2.php");
?>
