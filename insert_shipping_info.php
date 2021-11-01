<!-- pass the session variables to be stored -->

<?php
   session_start();
   $_SESSION['method']=$_POST['shipping'];
   $_SESSION['price']=$_POST['price'];

 ?>

<?php
  // create short variable names
  $method=$_POST['shipping'];
  $price=$_POST['price'];

  @ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $query = "UPDATE f32ee.CustomerInfo SET Shipping_Method=$method WHERE Email='".$_SESSION['email']."'" ;
  $result = $db->query($query);

  if ($result) {
      echo  $db->affected_rows." new customer inserted into database.";
  } else {
  	  echo "An error has occurred.  The customer was not added.";
  }

  $db->close();
header("refresh:0;url=http://192.168.56.2/f32ee/Design%20Project/checkout3.php");
?>
