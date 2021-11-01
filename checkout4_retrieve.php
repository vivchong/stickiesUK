<?php
session_start();
?>
<?php
function retrieve_name($id){
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

function retrieve_address($id){
  $conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");
  if (!conn){
    die("Connection failed".mysqli_connect_error());
  }
  $id=$_SESSION['email'];
  $sql= "SELECT Address FROM f32ee.CustomerInfo WHERE Email = '$id'";
  if ($result=mysqli_query($conn,$sql)){
    $row=mysqli_fetch_row($result);
    echo $row[0]."&nbsp";
  } else {
    echo 'failed to retrieve data'. $conn->error;
  }
mysqli_close($conn);
}

function retrieve_zip($id){
  $conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");
  if (!conn){
    die("Connection failed".mysqli_connect_error());
  }
  $id=$_SESSION['email'];
  $sql="SELECT City FROM f32ee.CustomerInfo WHERE Email='$id'";
  if ($result=mysqli_query($conn,$sql)) {
    $row=mysqli_fetch_row($result);
    echo $row[0]."&nbsp";
  }
  else {
    echo 'failed to retrieve data';
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

function retrieve_suite($id){
  $conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");
  if (!conn){
    die("Connection failed".mysqli_connect_error());
  }
  $id=$_SESSION['email'];
  $sql="SELECT Apartment_suite FROM f32ee.CustomerInfo WHERE Email='$id'";
  if ($result=mysqli_query($conn,$sql)) {
    $row=mysqli_fetch_row($result);
    echo $row[0];
  }
  else {
    echo 'failed to retrieve data';
  }
  mysqli_close($conn);
}

function retrieve_billing_address($id){
  $conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");
  if (!conn){
    die("Connection failed".mysqli_connect_error());
  }
  $id=$_SESSION['email'];
  $sql="SELECT IFNULL(NULLIF(Billing_Address, ''), Address) AS Billing_Address FROM f32ee.CustomerInfo WHERE Email='$id'";
  if ($result=mysqli_query($conn,$sql)) {
    $row=mysqli_fetch_row($result);
    echo $row[0]."&nbsp";
  }
  else {
    echo 'failed to retrieve data'.$conn->error;
  }
  mysqli_close($conn);
}

function retrieve_billing_zip($id){
  $conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");
  if (!conn){
    die("Connection failed".mysqli_connect_error());
  }
  $id=$_SESSION['email'];
  $sql="SELECT City FROM f32ee.CustomerInfo WHERE Email='$id'";
  if ($result=mysqli_query($conn,$sql)) {
    $row=mysqli_fetch_row($result);
    echo $row[0]."&nbsp";
  }
  else {
    echo 'failed to retrieve data';
  }
  $sql2="SELECT IFNULL(NULLIF(Billing_Zip, ''), Zipcode) AS Billing_Zip FROM f32ee.CustomerInfo WHERE Email='$id'";
  if ($result2=mysqli_query($conn,$sql2)){
    $row2=mysqli_fetch_row($result2);
    echo $row2[0];
  } else {
    echo 'failed to retrieve data'.$conn->error;
  }
  mysqli_close($conn);
}

function retrieve_email($id){
  $conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");
  if (!conn){
    die("Connection failed".mysqli_connect_error());
  }
  $id=$_SESSION['email'];
  $sql="SELECT Email FROM f32ee.CustomerInfo WHERE Email='$id'";
  if ($result=mysqli_query($conn,$sql)) {
    $row=mysqli_fetch_row($result);
    echo $row[0];
  }
  else {
    echo 'failed to retrieve data';
  }
  mysqli_close($conn);
}
?>
