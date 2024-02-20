<?php require_once('partial/dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="">
  

</head>
<style>
   
   .heading{
      background-color: black;
      color:aliceblue;
      padding-left: 5%;
      padding-top: 2%;
      padding-bottom: 20px;
   }
   .container{
      background-color: gainsboro;
      
   }
   .display-order{
      font-size: 40px;
      margin-left: 30%;
      padding-left: 20px;
   
   }
   .span1{
      background-color: darkgray;
      size: 40px;
      padding-top: 0.5%;
      padding-bottom: 0.5%;
      padding-left: 2%;
      padding-right: 2%;

   }
   .inputBox{
      font-size: 3vh;
      padding-left: 9%;
      color: black;
      font-size: x-large;
      padding-top: 1%;
      padding-bottom: 1%;

   }
   input[type=text],[type=number],[type=email],[type=method],  select {
  width: 100%;
  padding: 12px 20px;
  margin: 9px 100px;
   
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}
input[type=submit]{
   width: 50%;
  padding: 1% 20px;
  margin: 10px 100px;
  margin-left: 15%;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}
.form-row{
   display: flex;
   
}

  </style>
<body>
   

<!-- ?php include 'header.php'; ?> -->

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="razorpay-php-2.9.0/pay.php" method="post">

   <!-- <form action="bill_of_order.php" method="POST"> -->
   <div class="display-order">

      <?php
      session_start();
      $session_user = $_SESSION['username'];
      echo $session_user;
         $select_pdf=mysqli_query($conn ,"SELECT * FROM  `addtocart` where username_cart='$session_user'");
         // if(mysqli_num_rows($select_pdf) > 0){
         //    while($fetch_pdf = mysqli_fetch_assoc($select_pdf)){
         //          echo $fetch_pdf['pdfnamecart'];
         //     }} ?><?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `addtocart`");
         $total = 0;
         $grand_total = 0;
         if((mysqli_num_rows($select_cart) > 0)&&(mysqli_num_rows($select_pdf) > 0)){
            while(($fetch_cart = mysqli_fetch_assoc($select_cart))&&($fetch_pdf = mysqli_fetch_assoc($select_pdf))){
               $totpdf_order= $fetch_pdf['pdfnamecart'];
            $total_price =($fetch_cart['price'] * $fetch_cart['quatity']);
            $grand_total = $total += $total_price;
      ?>
      <span class="span1"><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quatity']; ?>)grand total : $<?= $grand_total; ?>/- </span>
      <input type="text" name="tot_pdf" value="<?php echo  $totpdf_order; ?>" style="width: 70%;"><br>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <!-- <span class="grand-total"> grand total : ?= $grand_total; ?>/- </span> -->
   </div> 
<!-- <table>

<tr> <span>your name</span></tr>
<td>  <input type="text" placeholder="enter your name" name="name" required></td>
<tr></tr>
<tr></tr>
</table> -->
<table>
   <tr>
      <td></td>
   </tr>
</table>

      <div class="form-row">
         <div class="inputBox">
            <span>your name</span><br>
            <input type="text" placeholder="enter your name" name="c_name" required>
         </div>
         <div class="inputBox">
            <span>your number</span><br>
            <input type="number" placeholder="enter your number" name="c_number" required>
         </div>
      </div>
      <div class="form-row">
         <div class="inputBox">
            <span>your email</span><br>
            <input type="email" placeholder="enter your email" name="c_email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span><br>
            <select class="method" name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
      </div>
      <div class="form-row">
         <div class="inputBox">
            <span>address line 1</span><br>
            <input type="text" placeholder="e.g. flat no." name="flat" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span><br>
            <input type="text" placeholder="e.g. street name" name="street" required>
         </div>
      </div>
      <div class="form-row">
      <div class="inputBox">
            <span>city</span><br>
            <input type="text" placeholder="e.g. mumbai" name="city" required>
         </div>
         <div class="inputBox">
            <span>state</span><br>
            <input type="text" placeholder="e.g. maharashtra" name="state" required>
         </div>
         
      </div>
      <div class="form-row">
         <div class="inputBox">
            <span>country</span><br>
            <input type="text" placeholder="e.g. india" name="country" required>
         </div>
         <div class="inputBox">
            <span>pin code</span><br>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
     
      <!-- <form action="" method="post">
         
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form> -->
   <!-- <form action="razorpay-php-2.9.0/pay.php" method="post"> -->

<input type="hidden" name="tot_product" value="<?php echo $totpdf_order;?>" style="width: 70%;"><br>
<input type="hidden" name="tot_price" value="<?php echo  $grand_total; ?>" style="width: 70%;"><br>

<!-- <input type="hidden" name="image_count" value="2"><br> -->

<input type="submit" class="btn" name="Check_Out" value="Proceed To Pay" class="btn btn-primary">
</form>
<!-- </form> -->
         <!-- php } ?> -->
</section>

</div>


   
</body>
</html>



<?php        


// if (isset($_POST['Check_Out'])) {
//    $cname = $_POST['c_name'];
//    $cemail = $_POST['c_email'];
//    $cphoneno = $_POST['c_number'];
//    $cmethod = $_POST['method'];
//    $cflat = $_POST['flat'];
//    $ccity = $_POST['city'];
//    $cstreet = $_POST['street'];
//    $cstate = $_POST['state'];
//    $ccountry = $_POST['country'];
//    $cpin_code = $_POST['pin_code'];
//    $cpdf = $_POST['tot_pdf'];
//    $ctotbook = $_POST['tot_product'];
//    $billamount = $_POST['tot_price'];
//    echo $ctotbook;
   
//    // $query = "INSERT INTO `book_order` (name,number,email, method, flat, street, city, state, country, pin_code, total_products, total_price)
//          //  VALUES ('$cname', '$cphoneno', '$cemail', '$cmethod', '$cflat', '$cstreet', '$ccity', '$cstate', '$ccountry', $cpin_code, '$ctotbook', '$billamount')or die('query failed');";
// $query ="INSERT INTO book_order(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price,username) 
// VALUES ('$cname', '$cphoneno', '$cemail', '$cmethod', '$cflat', '$cstreet', '$ccity', '$cstate', '$ccountry', $cpin_code, '$ctotbook', '$billamount','$$session_user')";
// $result = mysqli_query($conn, $query);

// if (!$result) {
//     die("Query failed: " . mysqli_error($conn));
// } else {
//     echo "Data inserted successfully";
// }

// }
?>