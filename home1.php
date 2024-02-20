<?php

require_once('partial/dbconnect.php');
session_start();
$username_session=$_SESSION['username'];
if(isset($_SESSION['loggedin2']) && isset($_SESSION['username']) && $flag==true){
//   include('adminpartial/adminnav.php');
  require_once('partial/dbconnect.php');
  // $query = "select * from testimage";
  // $result = mysqli_query($adminconn, $query);
  ?>
  
 <?php
// include("partial/navigation.php"); 

if (isset($_POST['Add_To_Cart'])) {
    $b_name = $_POST['bookname'];
    $b_price = $_POST['bookprice'];
    $b_images = $_POST['bookimages'];
    $b_pdf=$_POST['pdfname'];
    $b_quantity = 1;
    // session_start();
    $session_user = $_SESSION['username'];
    $select_cart = mysqli_query($conn, "SELECT * FROM  `addtocart` WHERE name='$b_name'and username_cart='$session_user'");
    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'product all ready exit';
    } else {
        $insertquery = mysqli_query($conn, "INSERT INTO `addtocart`(name,price,image,pdfnamecart,quatity,username_cart)
         VALUES('$b_name','$b_price','$b_images','$b_pdf','$b_quantity','$username_session')");
        $message[] = 'product added to cart to sucessfully';
    }
}
?>



<?php
// session_start();99
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
//     header("locaiton: login.php");
//     exit;
// }
// if (!isset($_GET['id'])) {
//     header("locaiton: login.php");
//     exit;
// }
// else{
//     echo"not found";
// }


$query = "SELECT * FROM testimage";
$results = mysqli_query($conn, $query);


?>
<?php

if (isset($message)) {
    foreach ($message as $message) {
        echo '<div class="message"><span>' . $message . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

    <title>Ecommerce Website</title>
</head>
<style>
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    color: black;
}
html{
    font-size: 62.5%;
}
main{
    max-width: 1600px;
    width: 95%;
    margin: 30px auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: auto;
}

main .card{
    max-width: 300px;
    flex: 1 1 210px;
    text-align: center;
    height: 420px;
    border: 1px solid transparent;
    margin: 20px;
}

main .card .image{
   
    height: 50%;
    margin-bottom: 20px;
}

main .card .image img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

main .card .caption{
    padding-left: 1em;
    text-align: left;
    line-height:  3em;
    height: 25%;
}

main .card .caption p{
    font-size: 1.5rem;
}

del{
    text-decoration: line-through;
}

main .card .caption .rate{
    display: flex;
}

main .card .caption .rate i{
    color: gold;
    margin-left: 2px;
}

main .card a{
    width: 50%;
}

main .card button{
    border: 2px solid transparent;
    padding: 1em;
    width: 80%;
    cursor: pointer;
    margin-top: 2em;
    font-weight: bold;
    position: relative;
}

main .card button:before{
    
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    width: 0;
    background-color: black;
    transition: all .5s;
    margin: 0;
}

main .card button::after{
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 0;
    background-color: black;
    transition: all .5s;
}

main .card button:hover::before{
    width: 30%;
}

main .card button:hover::after{
    width: 30%;
}    
.r1 {
        background-color: #fff;
        margin-top: 10%;
        margin-left: 50%;
    }
    .search{
        background-color: #fff;
        margin-top: 10%;
        margin-left: 50%;   
        
    }
    footer {
            /* background-color: #333; */
            /* color: white; */
            text-align: center;
            /* padding: 1em; */
            position: relative;
            bottom: 0;
            width: 100%;
        }
</style>

<body>
    <?php include("partial/navigation.php"); ?>
    <!-- ?php include("partial/_nav.php");?> -->
 

    <div class="r1">
      
        <form method="post" action="home1.php">
            <label for="category" style="font-size: large;">Select a category:</label>
            <select name="category" id="category">
                <option value="">select categories</option>
                <?php
                require_once('partial/dbconnect.php');
                $sql = "SELECT DISTINCT bookcategories FROM testimage";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $category = $row['bookcategories'];
                        echo "<option value=\"$category\">$category</option>";
                    }
                } else {
                    echo "<option value=\"\">No categories found</option>";
                }
                ?>

                <input type="submit"  style="width: 250px;" value="Show Products" class="btn btn-info">
            </select>
        </form>
        
    </div>

    
    <main>
    <?php
if (isset($_POST["category"])) {
    $selectedCategory = $_POST["category"];
    $sql = "SELECT * FROM testimage WHERE bookcategories='$selectedCategory'";
    $result = $conn->query($sql);
    echo "<h2>Products in Category: $selectedCategory</h2>";
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo $row["pdfname"]; 
            ?>
              <form action="" method="post">
                <div class="container">
                    <div class="card">
                        
                        <div class="image">
                            <img src="Admin/adminupload/<?php echo $row['images1']; ?>" alt="">
                        </div>
                      
                        <div class="caption">
                            <p class="book_name">
                                <?php echo $row["bookname"]; ?>
                            </p>
                            <!-- <p class="pdf_name">
                             ?php  echo $row["pdfname"]; ?>
                            </p> -->
                            
                            <p class="book_desc">
                                <?php echo $row["bookdesc"]; ?>
                            </p>
                            <p class="book_price"><b>$
                                    <?php echo $row["bookprice"]; ?>
                                </b></p>
                            <p class="bookcate"><b><del>$
                                        <?php echo $row["bookcategories"]; ?>
                                    </del></b></p>
                                    
                                    
                        </div>
                        <!-- <p class="pdf"><b><del>
                                        ?php echo $row["pdfname"]; ?>
                                    </del></b></p> -->
                        <input type="hidden" name="bookname" value="<?php echo $row["bookname"]; ?>">
                        <input type="hidden" name="bookprice" value="<?php echo $row["bookprice"]; ?>">
                        <input type="hidden" name="bookimages" value="<?php echo $row['images1']; ?>">
                        <input type="hidden" name="pdfname" value="Admin/admin_pdf_uploads/<?php echo $row["pdfname"]; ?>">
                        <input type="submit" class="btn" name="Add_To_Cart" class="btn btn-info" value="Add To Cart">
                        </div>
                </div>
            </form>
            
           
        <?php
exit();
        }
        ?>
       </main>
    <?php
    } else {
        echo "<p>No products found for the selected category.</p>";
    }
    ?>

<?php
}
?>

<main>
    <?php
    while ($row = mysqli_fetch_assoc($results)) {
      ?>
        <form action="" method="post">
            <div class="container">
                <div class="card">
                    <div class="image">
                        <img src="Admin/adminupload/<?php echo $row['images1']; ?>" alt="">
                    </div>
                    <div class="caption">
                        <p class="book_name">
                            <?php echo $row["bookname"]; ?>
                        </p>
                        <p class="book_desc">
                            <?php echo $row["bookdesc"]; ?>
                        </p>
                        <p class="book_price"><b>$
                                <?php echo $row["bookprice"]; ?>
                            </b></p>
                        <p class="bookcate"><b><del>$
                                    <?php echo $row["bookcategories"]; ?>
                                </del></b></p>
                                
                        <!-- <p class="bookcate"><b><del>$
                                    ?php echo $row["pdfname"]; ?> -->
                                </del></b></p>
                    </div>
                    <input type="hidden" name="bookname" value="<?php echo $row["bookname"]; ?>">
                    <input type="hidden" name="bookprice" value="<?php echo $row["bookprice"]; ?>">
                    <input type="hidden" name="bookimages" value="<?php echo $row["images1"]; ?>">
                    <input type="hidden" name="pdfname" value="<?php echo $row["pdfname"]; ?>">
                    <input type="submit" class="btn" name="Add_To_Cart" class="btn btn-info" value="Add To Cart">
                  </div>
            </div>
        </form>

    <?php

    }

    ?><?php     
}else{
    header('location:login.php');
    echo "invalid";
    }
?>
</main>

<!-- ?php include 'partial/footer.php'?>  -->
<!-- </footer> -->
   </body>
   
</html>
<!-- ?php include 'partial/footer.php'?>  -->



