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
First_name VARCHAR(30) NOT NULL,
Last_name VARCHAR(30) NOT NULL,
Email VARCHAR(50) NOT NULL,
Address VARCHAR(50) NOT NULL,
Apartment_suite VARCHAR(30) NOT NULL,
Zipcode VARCHAR(30) NOT NULL,
City VARCHAR(50) NOT NULL,
Phone_number VARCHAR(30) NOT NULL,
Shipping_Method VARCHAR(30) NOT NULL,
Shipping_Price VARCHAR(30) NOT NULL,
Billing_Address VARCHAR(30) NOT NULL,
Billing_Zip VARCHAR(30) NOT NULL
)";

if(!mysqli_query($conn, $sql)){
  echo "Failed to create table. Please try again ......".mysqli_error($conn);
}
else{
  echo "Table CustomerInfo created successfully!<br>";
}
mysqli_close($conn);
?>
