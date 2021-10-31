<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$database = "f32ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
echo "Connected .......<br>";
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//select database
$sql = "use f32ee";
if (!mysqli_query($conn, $sql)) {
	echo "failed to connect to f32ee";
	mysqli_close($conn);
}
else{
  echo "f32ee database connected......<br>";
}

//create table Cart
$sql = "CREATE TABLE IF NOT EXISTS Cart (
ProductID INT(6) UNSIGNED NOT NULL,
Qty INT(6) UNSIGNED
)";

// Cart (ProductID, Qty)

if(!mysqli_query($conn, $sql)){
  echo "Failed to create table. Please try again ......".mysqli_error($conn);
}

else{
  echo "Table CustomerInfo created successfully!<br>";
}

mysqli_close($conn);
?>
