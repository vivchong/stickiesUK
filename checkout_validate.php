<?php
$email=GET_$['email'];
$name=GET_$['name'];

function store_information($id){
  $conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");
  if (!$conn){
    die("Connection failed ......".mysqli_connect_error());
  }
  $sql = "UPDATE f32ee.CustomerInfo SET Email = $email WHERE Cust_ID = $id;";
  mysqli_query($conn, $sql);
  $sql2 = "UPDATE f32ee.CustomerInfo SET Name = $name WHERE Cust_ID = $id;";
  mysqli_query($conn, $sql2);
}
mysqli_close($conn);
// return the original page //

store_information();
header("refresh:0;url=http://192.168.56.2/f32ee/DesignProject/checkout2.html");
 ?>
