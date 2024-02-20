



<?php

// include '../partials/connection.php';
// include 'constants.php';
// include 'connection.php';
// include '../config/DBconfig.php';
include '../Admin/adminpartial/admindbconnect.php';
// include '../partial/dbconnect.php';
require('config.php');
require('Razorpay.php');
require_once('../partial/dbconnect.php');
session_start();

// Create the Razorpay Order
if(isset($_POST['Check_Out'])){
  $session_user = $_SESSION['username'];
echo $session_user;
  $query = "SELECT * FROM  `addtocart` where username_cart='$session_user'";
  $result = mysqli_query($adminconn, $query); 
  if(mysqli_num_rows($result) > 0){
  while ($row = mysqli_fetch_assoc($result)) {
          $cpdf=$row['pdfnamecart'];
          echo $cpdf;
  }}?><br>  
<?php

  $cname = $_POST['c_name'];
  $cemail = $_POST['c_email'];
  $cphoneno = $_POST['c_number'];
  $cmethod = $_POST['method'];
  $cflat = $_POST['flat'];
  $ccity = $_POST['city'];
  $cstreet = $_POST['street'];
  $cstate = $_POST['state'];
  $ccountry = $_POST['country'];
  $cpin_code = $_POST['pin_code'];
  $cpdf = $_POST['tot_pdf'];
  $ctotbook = $_POST['tot_product'];
  $billamount = $_POST['tot_price'];
  echo $ctotbook;
  
  // $query = "INSERT INTO `book_order` (name,number,email, method, flat, street, city, state, country, pin_code, total_products, total_price)
        //  VALUES ('$cname', '$cphoneno', '$cemail', '$cmethod', '$cflat', '$cstreet', '$ccity', '$cstate', '$ccountry', $cpin_code, '$ctotbook', '$billamount')or die('query failed');";
$query ="INSERT INTO book_order(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price,username) 
VALUES ('$cname', '$cphoneno', '$cemail', '$cmethod', '$cflat', '$cstreet', '$ccity', '$cstate', '$ccountry', $cpin_code, '$ctotbook', '$billamount','$session_user')";
$result = mysqli_query($conn, $query);

if (!$result) {
   die("Query failed: " . mysqli_error($conn));
} else {
   echo "Data inserted successfully";
}

}?><?php





use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);


// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders

if($_SERVER['REQUEST_METHOD'] == 'POST')
{  
   
   echo $billamount;
   echo $cemail;
  
   
  $price = $billamount;
  $_SESSION['price'] = $price;
  
  
  $email = $_POST['c_email'];
  $_SESSION['c_email'] = $email;

  $count = $_POST['tot_pdf'];
  $_SESSION['tot_pdf'] = $count;
  // echo $email;
  // echo $price;
  // $user_email = $_POST['email'];
  
  // $select_user_sql ="SELECT * FROM `user_data` where `email` = '$email' ";
 
  // execute the query
  // $result = mysqli_query($conn, $select_user_sql) or die(mysqli_error());
  $result = TRUE;
  
  if ($result == TRUE) 
  {
    // $count = mysqli_num_rows($result);
    // $rows=mysqli_fetch_assoc($result);
    
    $fname = "fname";
    $lname = "lname";
    $customername = $fname.$lname;
    $contactno = "9925884555";    
    // $fname = $rows['fname'];
    // $lname = $rows['lname'];
    // $customername = $fname.$lname;
    // $contactno = $rows['mobileno'];    
  } 
}

// $contactno = $_POST['contactno'];
$orderData = [
    'receipt'         => "3456",
    'amount'          => $billamount * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);
    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,        
    "name"              => "ebook-selling ",
    "description"       => "ebook for everyone",
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => $cname,
    "email"             => $cemail,
    "contact"           => $cphoneno,
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);
?>

<form action="verify.php" method="POST">
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount'];?>"
    data-currency="INR"
    data-name="<?php echo $data['name']?>"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.name="<?php echo $data['prefill']['name']?>"
    data-prefill.email="<?php echo $data['prefill']['email']?>"
    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
    data-notes.shopping_order_id="3456"
    data-order_id=""
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script>
  <!--Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="shopping_order_id" value="3456">
</form>