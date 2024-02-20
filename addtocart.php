<?php
require_once('partial/dbconnect.php');
session_start();

if(isset($_SESSION['loggedin2']) && isset($_SESSION['username']) && $flag==true){
?>
  
<?php
// require_once('partial/dbconnect.php');
echo $_SESSION['username'];
// $session_user=$_SESSION['username'];
// // echo $session_user;
// $session_user=$_SESSION['username'];
// echo $session_user;
// $query = "select  * FROM addtocart where username_cart='jigisha'";
// $result = mysqli_query($conn, $query);
// echo $session_user;
$session_user = $_SESSION['username'];
echo $session_user;
$query = "SELECT * FROM addtocart WHERE username_cart='$session_user'";
$result = mysqli_query($conn, $query);

if(isset($_POST['update_update_btn'])){
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    
   
    $update_quantity_query = mysqli_query($conn, "UPDATE `addtocart` SET quatity = '$update_value' WHERE id = '$update_id'");
    if($update_quantity_query){
       header('location:addtocart.php');
    };
 };
 if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `addtocart` WHERE id = '$remove_id'");
    header('location:cart.php');
 };

 if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `addtocart`");
    header('location:addtocart.php');
 }
 
 ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="">
</head>
<style>
.container{
  margin-top: 5%;
  
}
.table {
  color: black;

}
.thead{
  color:  chartreuse;
}
</style>
<body>
<?php include("partial/navigation.php")?>
  <div class="container">
  <section class="shopping-cart">

<h1 class="heading">shopping cart</h1>

    <table class="table">
      
      <thead>
        <tr>
          <th>id</th>
          <th>Bookname</th>
          <th>Bookimage</th>
          <th>Book price</th>
          <th>Book quality</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
        //  $query = "SELECT * FROM addtocart WHERE id IN (SELECT username FROM signup WHERE username = '$session_user')";
        $query = "SELECT * FROM addtocart WHERE username_cart='$session_user'";
        

        $result = mysqli_query($conn, $query);        
        $grand_total=0;
        while ($row = mysqli_fetch_assoc($result)) {
          $BookID = $row['id'];
          $bookname = $row['name'];
          $bookimage = $row['image'];
          $bookquality = $row['quatity'];
          $bookprice = $row['price'];
          $pdfname=$row['pdfnamecart'];
          ?>
          <tr>
           
            <td><?php echo $BookID ?></td>
            <td><?php echo $bookname ?></td>
            <td> <img src="Admin/adminupload/<?php echo $row["image"]; ?>" width="100%" height="60%" ></td>
            <!-- <td><img src="Admin/adminupload/?php echo $row['images1']; ?>"> -->
           </td>
          
            <td><?php echo $bookprice ?></td>
            <td><?php echo $bookquality ?></td>
            <td><?php echo $pdfname?></td>
            
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $row['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $row['quatity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo $sub_total = ($row['price'] * $row['quatity']); ?>
             <?php $sub_total=($row['price'] * $row['quatity']); 
            
             ?>
            <td><a href="addtocart.php?remove=<?php echo $row['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
            </tr>
            </form>
          </tr>
          <?php
         $grand_total =$grand_total+ $sub_total;
        }
    
        ?>
      </tbody>
      <tr class="table-bottom">
        <tr>
            <td><a href="product.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
          <td colspan="4">  <td colspan="1">grand total</td></td>
            <td>$<?php echo $grand_total; ?>/-</td>
            <td><a href="addtocart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
        
          </tr>
        
    </table>
    <div class="checkout-btn">
      
     <a href="bill_of_order.php" name ="checkout" onclick="" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
     <!-- ?php include("pay.php");
     ?>-->
   </div> 
   </section>

  </div>
</body>

</html>

<!-- ?php     
}else{
    header('location:login.php');
    }
?> -->
<?php     
}else{
    header('location:login.php');
    }
?>

