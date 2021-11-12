<?php
session_start();
?>
<?php
function retrieve_shipping($id){
  $conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");
  if (!$conn){
    die("Connection failed ......".mysqli_connect_error());
  }
  $id=$_SESSION['email'];
  $sql = "SELECT Shipping_Method FROM f32ee.CustomerInfo WHERE Email = '$id'";
  if ($result = mysqli_query($conn, $sql)){
    $row = mysqli_fetch_row($result);
    $shipping_price = number_format($row[0],2,'.',',');
    //echo $shipping_price;
    //echo $row[0];
    return $row[0];
    //echo ($shipping_price + 1); //debugging
    // Note to dev: Need to calculate total cost of order by adding $shipping_price and then use number format to echo

  } else {
    echo 'Failed to retrieve data'. $conn->error;
  }
mysqli_close($conn);
}
