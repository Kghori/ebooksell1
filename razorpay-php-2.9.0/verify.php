

<?php 

function generateUniqueID() {
    // Generate a unique ID using uniqid and additional entropy
    $uniqueID = uniqid('', true);

    // Use md5 to hash the unique ID
    $hashedID = md5($uniqueID);

    // Take the first 15 characters of the hashed ID
    $result = substr($hashedID, 0, 15);

    return $result;
}
?>
<?php
include '../partial/dbconnect.php';
//  include("../partial/navigation.php");
require('config.php');
session_start();
//db connection
// $conn = mysqli_connect($host, $username, $password, $dbname);

require('Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            // 'razorpay_signature' => $_POST['razorpay_signature']
        );
    $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .container1{
        background-color: darkgrey;
        margin: 10%;
        padding-left: 10%;

    }
    .button {
margin: 1%;
  display: inline-block;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  background-color: #3498db; /* Button color */
  color: #ffffff; /* Text color */
  border-radius: 5px; /* Rounded corners */
  border: 2px solid #2980b9; /* Border color */
  transition: background-color 0.3s; /* Smooth transition for hover effect */
}
.button:hover {
  background-color: transparent; /* Change color on hover */
}
</style>
<body>

<?php 


if ($success === true)
{
    
    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $email = $_SESSION['c_email'];
    $price = $_SESSION['price'];
    $pdfname=$_SESSION['tot_pdf'];
    $session_user = $_SESSION['username'];
    $sql = "INSERT INTO `orders` (`order_id`, `razorpay_payment_id`, `status`, `pdfname`,`email`, `price`,`user`) VALUES ('$razorpay_order_id', '$razorpay_payment_id', 'success','$pdfname','$email', '$price','$session_user')";
    if(mysqli_query($conn, $sql)){
        echo "<h1>Payment details inserted to the database</h1>";
        $query = "select * from addtocart WHERE username_cart='$session_user'";
        $result = mysqli_query($conn, $query); 
        while ($row = mysqli_fetch_assoc($result)) {
            $BookID = $row['id'];
            $bookname = $row['name'];
            $bookimage = $row['image'];
            $bookquality = $row['quatity'];
            $bookprice = $row['price'];
            $pdfname = $row['pdfnamecart'];
            $files[] = $pdfname;

        }        
// $files = array($pdfname);

print_r($files);
$id=generateUniqueID();
$zipFileName = $id.'.zip';
$zip = new ZipArchive;

if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
    foreach ($files as $file) {
        
        $filePath = '../Admin/admin_pdf_uploads/'. $file;  // Replace with the actual path to your files
        if (file_exists($filePath)) {
            
        $zip->addFile($filePath);
    }
    }
    $zip->close();
    ?>
    <div class="container1">
    <?php
    // echo '<a href="' . $zipFileName . '"  class="btn-primary">Download All Files</a>';
 ?>

 <h1> Downlod pdf
<a href="<?php echo $zipFileName; ?>"  class="button">Download All Files</a></h1>
<h1> Downlod pdf

<form action="downinvoice.php" method="post">
    <button   type="submit" name="invoice" class="button">Download invoice</button></h1>
</form>

 <?php  

 
//   $delete=mysqli_query($conn,"DELETE FROM addtocart WHERE username_cart='$session_user'");
//     $result = mysqli_query($conn, $query); 
} else {
    echo 'Failed to create ZIP file';
}
    flush();   
?>
<?php

    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";

}

}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
?>
</div>    
</body>
</html>
















