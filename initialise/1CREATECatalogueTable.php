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

//create table Catalogue
$sql = "CREATE TABLE IF NOT EXISTS Catalogue (
ProductID INT(6) UNSIGNED NOT NULL PRIMARY KEY,
ProductName VARCHAR(30) NOT NULL,
Category VARCHAR(30) NOT NULL,
onSale TINYINT NOT NULL,
Price FLOAT(5,2) NOT NULL,
ImageLink VARCHAR(100) NOT NULL
)";

//Catalogue (ProductID, ProductName, Category, onSale, Price, ImageLink)

//ProductID is 3 digits: First digit is category number, last 2 digits are the item sequence —> ProductID of 302 —> Category 3, 2nd item added to Cat3

// Category 1: Florals
// Category 2: Glitter
// Category 3: Solids

// onSale is "Boolean" (TINYINT) —> 1 for onSale, 0 not onSale

if(!mysqli_query($conn, $sql)){
  echo "Failed to create table. Please try again ......".mysqli_error($conn);
}

else{
  echo "Table CustomerInfo created successfully!<br>";
}

mysqli_close($conn);
?>
