



<?php
include '../partial/dbconnect.php';
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
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}





if ($success === true)
{
    
    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $email = $_SESSION['c_email'];
    $price = $_SESSION['price'];
    $pdfname=$_SESSION['tot_pdf'];
    $sql = "INSERT INTO `orders` (`order_id`, `razorpay_payment_id`, `status`, `pdfname`,`email`, `price`) VALUES ('$razorpay_order_id', '$razorpay_payment_id', 'success','$pdfname','$email', '$price')";
    if(mysqli_query($conn, $sql)){
        echo "payment details inserted to db";
        $query = "select * from addtocart where username_cart='$'";

        $result = mysqli_query($conn, $query); 
        while ($row = mysqli_fetch_assoc($result)) {
            $BookID = $row['id'];
            $bookname = $row['name'];
            $bookimage = $row['image'];
            $bookquality = $row['quatity'];
            $bookprice = $row['price'];
            $pdfname=$row['pdfnamecart'];
            // echo $pdfname;
        }        
$files = array($pdfname);

$zipFileName = 'downloaded_files.zip';
$zip = new ZipArchive;

if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
    foreach ($files as $file) {
        $filePath = '../Admin/admin_pdf_uploads/' . $file;  // Replace with the actual path to your files
        $zip->addFile($filePath);
    }

    $zip->close();

    // Provide a link to download the ZIP file
    echo '<a href="' . $zipFileName . '" download>Download All Files</a>';
} else {
    echo 'Failed to create ZIP file';
}
            
    flush();      ?>
           
 
     
     
       
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