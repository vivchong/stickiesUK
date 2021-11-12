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

//create table tblproduct
$sql = "CREATE TABLE IF NOT EXISTS tblproduct (
id INT(8) UNSIGNED NOT NULL PRIMARY KEY,
name VARCHAR(255) NOT NULL,
code VARCHAR(255) NOT NULL,
image VARCHAR(255) NOT NULL
price double(10,2) NOT NULL,
)";

//tblproduct (id, name, code, image, price)


if(!mysqli_query($conn, $sql)){
  echo "Failed to create table. Please try again ......".mysqli_error($conn);
}

else{
  echo "Table CustomerInfo created successfully!<br>";
}

mysqli_close($conn);
?>
