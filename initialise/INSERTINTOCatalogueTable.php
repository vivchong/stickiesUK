<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$dbname = "f32ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/* The SQL query must be quoted in PHP
String values inside the SQL query must be quoted
Numeric values must not be quoted
The word NULL must not be quoted*/

// Database Schema:
// Catalogue (ProductID, ProductName, Category, onSale, Price)

//ProductID is 3 digits: First digit is category number, last 2 digits are the item sequence —> ProductID of 302 —> Category 3, 2nd item added to Cat3

    // Category 1: Florals
    // Category 2: Glitter
    // Category 3: Solids

// onSale is Boolean —> 1 for onSale, 0 not onSale

// ImageLink path needs to be in this form: images/101.png

$sql = "INSERT INTO Catalogue (ProductID, ProductName, Category, onSale, Price, ImageLink)
VALUES (101, 'Floral Symphony', 'Florals', 0, 15.00, 'images/101.png')";

$sql = "INSERT INTO Catalogue (ProductID, ProductName, Category, onSale, Price, ImageLink)
VALUES (102, 'Beleaf in Yourself', 'Florals', 0, 15.00, 'images/102.png')";

$sql = "INSERT INTO Catalogue (ProductID, ProductName, Category, onSale, Price, ImageLink)
VALUES (103, 'Summer Lemonade', 'Florals', 0, 15.00, 'images/103.png')";

$sql = "INSERT INTO Catalogue (ProductID, ProductName, Category, onSale, Price, ImageLink)
VALUES (201, 'Lake Celestine', 'Glitter', 0, 15.00, 'images/201.png')";

$sql = "INSERT INTO Catalogue (ProductID, ProductName, Category, onSale, Price, ImageLink)
VALUES (202, 'Champagne Glow', 'Glitter', 0, 15.00, 'images/202.png')";

$sql = "INSERT INTO Catalogue (ProductID, ProductName, Category, onSale, Price, ImageLink)
VALUES (301, 'Tangerine Bloom', 'Minimalist', 0, 15.00, 'images/301.png')";

$sql = "INSERT INTO Catalogue (ProductID, ProductName, Category, onSale, Price, ImageLink)
VALUES (302, 'Suspended in a Sunbeam', 'Minimalist', 0, 15.00, 'images/302.png')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
}

else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>