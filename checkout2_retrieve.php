<?php
session_start();
?>

<!-- retrieves the first name and last name from table.
  displays name in the shipping / checkout2 page.
  uses the email as ID -->

<?php
function insert_new_name($id){
  $conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");
  if (!$conn){
    die("Connection failed ......".mysqli_connect_error());
  }
  $id=$_SESSION['email'];
  $sql = "SELECT First_name FROM f32ee.CustomerInfo WHERE Email = '$id'";
  if ($result = mysqli_query($conn, $sql)){
    $row = mysqli_fetch_row($result);
    echo $row[0]."&nbsp";
  } else {
    echo 'Failed to retrieve data'. $conn->error;
  }
  $sql2 = "SELECT Last_name FROM f32ee.CustomerInfo WHERE Email = '$id'";
  if ($result2 = mysqli_query($conn, $sql2)){
    $row2 = mysqli_fetch_row($result2);
    echo $row2[0];
  } else {
    echo 'Failed to retrieve data'. $conn->error;
  }
mysqli_close($conn);
}

/* retrieves the address and zip  from table.
  displays this in the shipping / checkout2 page.
  uses the email as ID */

function insert_new_address($id){
  $conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");
  if (!conn){
    die("Connection failed".mysqli_connect_error());
  }
  $id=$_SESSION['email'];
  $sql= "SELECT Address FROM f32ee.CustomerInfo WHERE Email = '$id'";
  if ($result=mysqli_query($conn,$sql)){
    $row=mysqli_fetch_row($result);
    echo $row[0].","."&nbsp";
  } else {
    echo 'failed to retrieve data'. $conn->error;
  }
  $sql2= "SELECT Zipcode FROM f32ee.CustomerInfo WHERE Email = '$id'";
  if ($result2=mysqli_query($conn,$sql2)){
    $row2=mysqli_fetch_row($result2);
    echo $row2[0];
  } else {
    echo 'failed to retrieve data'. $conn->error;
  }
mysqli_close($conn);
}

?>
