
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
   

<!-- <?php include 'header.php'; ?> -->

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `addtocart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price =($fetch_cart['price'] * $fetch_cart['quatity']);
            $grand_total = $total += $total_price;
      ?>
      <span class="span1"><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quatity']; ?>)grand total : $<?= $grand_total; ?>/- </span>
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
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span><br>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
      </div>
      <div class="form-row">
         <div class="inputBox">
            <span>your email</span><br>
            <input type="email" placeholder="enter your email" name="email" required>
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
     
      <form action="" method="post">
         
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>
   <form action="razorpay-php-2.9.0/pay.php" method="post">
<input type="hidden" name="id" value="<?php echo  $row['no']; ?>"><br>
<input type="hidden" name="cust_name" value="<?php echo  $row['name']; ?>"><br>
<input type="hidden" name="cust_number" value="<?php echo  $row['number']; ?>"><br>
<input type="hidden" name="tot_products" value="<?php echo  $row['total_products']; ?>"><br>
<input type="hidden" name="email" value="<?php  echo $row['email']; ?>"><br>
<?php

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

   if(($cart_query && $detail_query)|| $detail_query==TRUE){
      
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
         if($detail_query==TRUE){
            
            $last_inserted_id=mysqli_insert_id($conn);
            $select_query=mysqli_query($conn,"SELECT  * FROM `book_order` WHERE no= $last_inserted_id");

            if($select_query && $row=mysqli_fetch_assoc($select_query)){
                     echo "ID:".$row['no'];
                     // echo "email=".$row['email'];


            }
            else{
               echo "error fetch data";
            }

         }
         else{
            echo "error insert data";
         }

   }

}

?> 

<input type="text" name="tot_price" value="<?php echo  $row['total_price'];  ?>" style="width: 70%;"><br>

<input type="hidden" name="image_count" value="2"><br>
<!-- <a href="admin_image_update.php?no=?php echo $row['id'];?>" class="btn btn-primary">update</a> -->
<input type="submit" class="btn" name="Check_Out" value="Proceed To Pay" class="btn btn-primary">

</form>
         <!-- php } ?> -->
</section>

</div>


   
</body>
</html>








































































































