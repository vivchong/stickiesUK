<?php

function imagecreatefromfile( $filename ) {
    if (!file_exists($filename)) {
        throw new InvalidArgumentException('File "'.$filename.'" not found.');
    }
    switch ( strtolower( pathinfo( $filename, PATHINFO_EXTENSION ))) {
        case 'jpeg':
        case 'jpg':
            return imagecreatefromjpeg($filename);
        break;

        case 'png':
            return imagecreatefrompng($filename);
        break;

        case 'gif':
            return imagecreatefromgif($filename);
        break;

        default:
            throw new InvalidArgumentException('File "'.$filename.'" is not valid jpg, png or gif image.');
        break;
    }
  mysqli_close($conn);
}

function retrieve_product($id){
  $conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");
  if (!$conn){
    die("Connection failed ......".mysqli_connect_error());
  }
  $sql = "SELECT ImageLink FROM f32ee.Cart WHERE ProductID = '$id'";
  if ($result = mysqli_query($conn, $sql)){
    $row = mysqli_fetch_row($result);
    echo $row[0];
    imagecreatefromfile($row[0]);
  } else {
    echo 'Failed to retrieve data'. $conn->error;
}
mysqli_close($conn);
}


function retrieve_qty($id){
  $conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");
  if (!$conn){
    die("Connection failed ......".mysqli_connect_error());
  }
  $sql = "SELECT Qty FROM f32ee.Cart WHERE ProductID = '$id'";
  if ($result = mysqli_query($conn, $sql)){
    $row = mysqli_fetch_row($result);
    echo $row[0];
  } else {
    echo 'Failed to retrieve data'. $conn->error;
}
mysqli_close($conn);
}

function calculate_subtotal($id){
  $conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");
  if (!$conn){
    die("Connection failed ......".mysqli_connect_error());
  }
  $sql = "SELECT Qty FROM f32ee.Cart WHERE ProductID = '$id'";
  if ($result = mysqli_query($conn, $sql)){
    $row = mysqli_fetch_row($result);
  } else {
    echo 'Failed to retrieve data'. $conn->error;
  }
  $sql2 = "SELECT Price FROM f32ee.Cart WHERE ProductID = '$id'";
  if ($result2 = mysqli_query($conn, $sql2)){
    $row2 = mysqli_fetch_row($result2);
    echo number_format($row[0]*$row2[0],2,'.',',');
  } else {
    echo 'Failed to retrieve data'. $conn->error;
  }
  mysqli_close($conn);
}
?>
