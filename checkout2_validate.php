<?php
session_start();
 ?>

 <!-- this page validates the user's new input into the address section
  updates the table with the changed address -->

<?php
$conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");

if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
 return;
}

$new_firstname=$_POST['new_firstname'];
$new_lastname=$_POST['new_lastname'];
$new_address=$_POST['new_address'];
$new_zip=$_POST['new_zip'];

$sql = "UPDATE f32ee.CustomerInfo SET Address = '".$new_address."' WHERE Email='".$_SESSION['email']."'";
mysqli_query($conn, $sql);
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating address: " . $conn->error;
}
$sql = "UPDATE f32ee.CustomerInfo SET Zipcode = '".$new_zip."' WHERE Email='".$_SESSION['email']."'";
mysqli_query($conn, $sql);
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating zipcode: " . $conn->error;
}

mysqli_close($conn);
// return the original page //
header("refresh:0;url=http://192.168.56.2/f32ee/TO%20MERGE/stickiesUK/checkout2.php");
 ?>

