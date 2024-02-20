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
    $session_user = $_SESSION['username'];
    echo $session_user;
    $sql = "INSERT INTO `orders` (`order_id`, `razorpay_payment_id`, `status`, `pdfname`,`email`, `price`, `user`) VALUES ('$razorpay_order_id', '$razorpay_payment_id', 'success','$pdfname','$email', '$price',' $session_user')";
    if(mysqli_query($conn, $sql)){
        echo "payment details inserted to db";
        // session_start();
        $session_user = $_SESSION['username'];
echo $session_user;
        $query = "SELECT * FROM  `addtocart` where username_cart='$session_user'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $BookID = $row['id'];
            $bookname = $row['name'];
            $bookimage = $row['image'];
            $bookquality = $row['quatity'];
            $bookprice = $row['price'];
            $pdfname=$row['pdfnamecart'];
            $username=$row['username_cart'];
             
                    
 
            // echo $pdfname;
            $files = array($pdfname);
         
            print_r($files);
        

        }
        
$zipFileName = 'downloaded_files.zip';
$zip = new ZipArchive;
if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
    foreach ($files as $file) {
        $filePath = '../Admin/admin_pdf_uploads/ ' . $file;
        $zip->addFile($filePath);
    }
    $zip->close(); 
    // Rest of the code...


    



    //Provide a link to download the ZIP file
    echo '<a href="' . $zipFileName . '" download>Download All Files</a>';
} else {
    echo 'Failed to create ZIP file';
}
//  $zip->close(); 
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

