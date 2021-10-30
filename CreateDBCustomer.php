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

//create table DesignProject
$sql = "CREATE TABLE IF NOT EXISTS CustomerInfo (
Cust_ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(30),
Email VARCHAR(50) NOT NULL,
Billing_address VARCHAR(50) NOT NULL,
Shipping_address VARCHAR(50) NOT NULL,
Address VARCHAR(50) NOT NULL,
Zip_Code INT UNSIGNED
)";

if(!mysqli_query($conn, $sql)){
  echo "Failed to create table. Please try again ......".mysqli_error($conn);
}
else{
  echo "Table CustomerInfo created successfully!<br>";
}
mysqli_close($conn);
?>
