<?php
session_start();
 ?>

<?php
$conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");

if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
 return;
}

$new_firstname=$_POST['new_firstname'];
$new_lastname=$_POST['new_lastname'];
$new_address=$_POST['billing_address'];
$new_zip=$_POST['billing_zip'];

$sql = "UPDATE f32ee.CustomerInfo SET Billing_Address = '".$new_address."' WHERE Email='".$_SESSION['email']."'";
mysqli_query($conn, $sql);
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating address: " . $conn->error;
}
$sql = "UPDATE f32ee.CustomerInfo SET Billing_Zip = '".$new_zip."' WHERE Email='".$_SESSION['email']."'";
mysqli_query($conn, $sql);
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating zipcode: " . $conn->error;
}

mysqli_close($conn);
// return the original page //
header("refresh:0;url=http://192.168.56.2/f32ee/Design%20Project/customer_email.php");
;
 ?>
