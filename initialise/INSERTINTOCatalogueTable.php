<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$dbname = "f32ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "use f32ee";
if (!mysqli_query($conn, $sql)) {
	echo "failed to connect to f32ee";
	mysqli_close($conn);
}
else{
  echo "f32ee database connected......<br>";
}
/* The SQL query must be quoted in PHP
String values inside the SQL query must be quoted
Numeric values must not be quoted
The word NULL must not be quoted*/

// Database Schema:
// tblproduct (ProductID, ProductName, Category, onSale, Price)

// ImageLink path needs to be in this form: images/101.png

$sql = "INSERT INTO tblproduct (id, name, code, image, price)
VALUES (101, 'Floral Symphony', 101, 'images/101.png', 15.00)";

$sql = "INSERT INTO tblproduct (id, name, code, image, price)
VALUES (102, 'Beleaf in Yourself', 102, 'images/102.png', 15.00)";

$sql = "INSERT INTO tblproduct (id, name, code, image, price)
VALUES (103, 'Summer Lemonade', 103, 'images/103.png', 15.00)";

$sql = "INSERT INTO tblproduct (id, name, code, image, price)
VALUES (201, 'Lake Celestine', 201, 'images/201.png', 15.00)";

$sql = "INSERT INTO tblproduct (id, name, code, image, price)
VALUES (202, 'Champagne Glow', 202, 'images/202.png', 15.00)";

$sql = "INSERT INTO tblproduct (id, name, code, image, price)
VALUES (301, 'Tangerine Bloom', 301, 'images/301.png', 15.00)";

$sql = "INSERT INTO tblproduct (id, name, code, image, price)
VALUES (302, 'Suspended in a Sunbeam', 302, 'images/302.png', 15.00)";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
}

else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>