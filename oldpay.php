

<!-- 


?php

require_once('partial/dbconnect.php');

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `addtocart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quatity'] .') ';
         $product_price = ($product_item['price'] * $product_item['quatity']);
         $price_total =$price_total+  $product_price;
      };
   };

//    $total_product = count($product_name);
$total_product = implode(', ',$product_name);
 
   $detail_query = mysqli_query($conn, "INSERT INTO `book_order`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) 
   VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='home1.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?> -->









<?php

// include '../partials/connection.php';
// include 'constants.php';
// include 'connection.php';
// include '../config/DBconfig.php';
include '../Admin/adminpartial/admindbconnect.php';
require('config.php');
require('Razorpay.php');
// session_start();
// Create the Razorpay Order
if(isset($_POST['Check_Out'])){
   $id=$_POST['id'];
   $name=$_POST['cust_name'];
   $cemail=$_POST['email'];
   $cphoneno=$_POST['cust_number'];
   $ctotbook=$_POST['tot_products'];
   $billamount=$_POST['tot_price'];
}

use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);

// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders

if($_SERVER['REQUEST_METHOD'] == 'POST')
{  
   
   echo $billamount;
  $price = $billamount;
  $_SESSION['price'] = $price;

  $email = $_POST['email'];
  $_SESSION['email'] = $email;

  $count = $_POST['image_count'];
  $_SESSION['image_count'] = $count;
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
    "name"              => $customername,
    "email"             => $email,
    "contact"           => $contactno,
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
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script>
  Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="shopping_order_id" value="3456">
</form>