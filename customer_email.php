<?php
session_start();
include "checkout4_retrieve.php";
 ?>

<!-- sends email to customer once they click "confirm order".
Page refreshes in 3 seconds and redirects users to order confirmation page -->

<!DOCTYPE html>
<html>
<body>
<h1>Order Confirmed!</h1>
<p>Thank you for your purchase. An email has been sent to <b><?php retrieve_email($id) ?></b> </p>

<?php
$to = 'f32ee@localhost';
$subject = 'Your Order is Confirmed!';
$message = 'Thank you for your purchase!';
$headers = 'From: f32ee@localhost' . "\r\n" .
'Reply-To: f32ee@localhost' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers,
'-ff32ee@localhost');
echo ("mail sent to : ".$to);
mysqli_close($conn);
header("refresh:2;url=http://192.168.56.2/f32ee/TO%20MERGE/stickiesUK/checkout4.php");
?>

</body>
</html>
