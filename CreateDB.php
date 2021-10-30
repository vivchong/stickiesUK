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
$sql = "CREATE TABLE IF NOT EXISTS DesignProject (
wrap_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
wrap_category VARCHAR(30),
wrap_name VARCHAR(30) NOT NULL,
wrap_price DOUBLE NOT NULL,
wrap_quantity INT UNSIGNED NOT NULL
)";

if(!mysqli_query($conn, $sql)){
  echo "Failed to create table. Please try again ......".mysqli_error($conn);
}
else{
  echo "Table DesignProject created successfully!<br>";
}
mysqli_close($conn);
?>
